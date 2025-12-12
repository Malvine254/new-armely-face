<?php 
// ✅ CHAT ISOLATION: Redirect chat requests to proper API endpoint
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
	header('Location: /admin1/api/chat.php', true, 307);
	exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_REQUEST['chat'])) {
	header('Location: /admin1/api/chat.php', true, 307);
	exit;
}

require 'php/check_session.php'; 
require '../php/config.php';
include 'php/header_footer.php'; 
include 'php/users.php';

// Initialize stats
$stats = [
	'total_consultations' => 0,
	'total_contacts' => 0,
	'total_job_apps' => 0,
	'total_campaigns' => 0,
	'consultations_today' => 0,
	'consultations_this_week' => 0,
	'contacts_today' => 0,
	'job_apps_this_month' => 0,
	'total_admins' => 0,
	'active_admins' => 0
];

// Load stats from database with optimized queries and prepared statements
if (isset($conn)) {
	try {
		$today = date('Y-m-d');
		$weekAgo = date('Y-m-d', strtotime('-7 days'));
		$monthAgo = date('Y-m-d', strtotime('-30 days'));
		
		// ✅ Total consultations
		$result = $conn->query("SELECT COUNT(*) as count FROM consultation LIMIT 1");
		if ($result) {
			$row = $result->fetch_assoc();
			$stats['total_consultations'] = $row['count'] ?? 0;
		}
		
		// ✅ Consultations today (using prepared statement)
		$stmt = $conn->prepare("SELECT COUNT(*) as count FROM consultation WHERE DATE(date_now) = ?");
		$stmt->bind_param("s", $today);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result) {
			$row = $result->fetch_assoc();
			$stats['consultations_today'] = $row['count'] ?? 0;
		}
		$stmt->close();
		
		// ✅ Consultations this week (using prepared statement)
		$stmt = $conn->prepare("SELECT COUNT(*) as count FROM consultation WHERE date_now >= ?");
		$stmt->bind_param("s", $weekAgo);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result) {
			$row = $result->fetch_assoc();
			$stats['consultations_this_week'] = $row['count'] ?? 0;
		}
		$stmt->close();
		
		// ✅ Total contacts
		$result = $conn->query("SELECT COUNT(*) as count FROM contacts LIMIT 1");
		if ($result) {
			$row = $result->fetch_assoc();
			$stats['total_contacts'] = $row['count'] ?? 0;
		}
		
		// ✅ Contacts today (using prepared statement)
		$stmt = $conn->prepare("SELECT COUNT(*) as count FROM contacts WHERE DATE(sent_date) = ?");
		$stmt->bind_param("s", $today);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result) {
			$row = $result->fetch_assoc();
			$stats['contacts_today'] = $row['count'] ?? 0;
		}
		$stmt->close();
		
		// ✅ Total job applications
		$result = $conn->query("SELECT COUNT(*) as count FROM job_applications LIMIT 1");
		if ($result) {
			$row = $result->fetch_assoc();
			$stats['total_job_apps'] = $row['count'] ?? 0;
		}
		
		// ✅ Job apps this month (using prepared statement)
		$stmt = $conn->prepare("SELECT COUNT(*) as count FROM job_applications WHERE application_date >= ?");
		$stmt->bind_param("s", $monthAgo);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result) {
			$row = $result->fetch_assoc();
			$stats['job_apps_this_month'] = $row['count'] ?? 0;
		}
		$stmt->close();
		
		// ✅ Total campaigns
		$result = $conn->query("SELECT COUNT(*) as count FROM campaigns LIMIT 1");
		if ($result) {
			$row = $result->fetch_assoc();
			$stats['total_campaigns'] = $row['count'] ?? 0;
		}
		
		// ✅ Total admins
		$result = $conn->query("SELECT COUNT(*) as count FROM admin LIMIT 1");
		if ($result) {
			$row = $result->fetch_assoc();
			$stats['total_admins'] = $row['count'] ?? 0;
		}
		
		// ✅ Active admins (using prepared statement)
		$stmt = $conn->prepare("SELECT COUNT(*) as count FROM admin WHERE status = ?");
		$status = 'active';
		$stmt->bind_param("s", $status);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result) {
			$row = $result->fetch_assoc();
			$stats['active_admins'] = $row['count'] ?? 0;
		}
		$stmt->close();
		
	} catch (Exception $e) {
		error_log("Error loading dashboard stats: " . $e->getMessage());
		// Set all stats to 0 on error to prevent display issues
		foreach ($stats as $key => $value) {
			$stats[$key] = 0;
		}
	}
}

// Get recent activity with safety limits
$recentActivity = [];
if (isset($conn)) {
	try {
		// Prevent infinite loops - set max result limit
		$maxResults = 50;
		
		// Get recent consultations (safely)
		$result = $conn->query("SELECT 'Consultation' as type, name, email, service_name as detail, date_now as created_at FROM consultation ORDER BY date_now DESC LIMIT 5");
		if ($result && $result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				if (count($recentActivity) >= $maxResults) break; // Safety check
				$recentActivity[] = $row;
			}
		}
		
		// Get recent contacts (safely)
		$result = $conn->query("SELECT 'Contact' as type, name, email, subject as detail, sent_date as created_at FROM contacts ORDER BY sent_date DESC LIMIT 5");
		if ($result && $result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				if (count($recentActivity) >= $maxResults) break; // Safety check
				$recentActivity[] = $row;
			}
		}
		
		// Sort by date (safely with error checking)
		if (!empty($recentActivity)) {
			usort($recentActivity, function($a, $b) {
				$timeA = @strtotime($a['created_at'] ?? '');
				$timeB = @strtotime($b['created_at'] ?? '');
				
				// Handle invalid dates
				if ($timeA === false) $timeA = 0;
				if ($timeB === false) $timeB = 0;
				
				return $timeB - $timeA;
			});
		}
		
		// Keep only top 8 (safety limit)
		$recentActivity = array_slice($recentActivity, 0, 8);
		
	} catch (Exception $e) {
		error_log("Error loading recent activity: " . $e->getMessage());
		$recentActivity = []; // Reset on error to prevent display issues
	}
}

// ✅ Get monthly trend data for charts (last 12 months)
$monthlyData = [
	'labels' => [],
	'consultations' => [],
	'contacts' => [],
	'job_applications' => []
];

if (isset($conn)) {
	try {
		// Set timeout and limits for chart queries
		$maxRecordsPerQuery = 10000; // Limit records scanned per query
		$lookbackMonths = 24; // Only look at last 24 months of data
		
		// Generate last 12 months labels
		for ($i = 11; $i >= 0; $i--) {
			$monthlyData['labels'][] = date('M', strtotime("-$i months"));
		}
		
		// Get monthly consultations count
		for ($i = 11; $i >= 0; $i--) {
			$monthStart = date('Y-m-01', strtotime("-$i months"));
			$monthEnd = date('Y-m-t', strtotime("-$i months"));
			
			// ✅ Added ORDER BY and LIMIT to prevent excessive scanning
			$stmt = $conn->prepare("SELECT COUNT(*) as count FROM (SELECT date_now FROM consultation WHERE STR_TO_DATE(date_now, '%d %b %Y') BETWEEN ? AND ? ORDER BY id DESC LIMIT ?) AS limited_data");
			$stmt->bind_param("ssi", $monthStart, $monthEnd, $maxRecordsPerQuery);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$monthlyData['consultations'][] = intval($row['count'] ?? 0);
			$stmt->close();
		}
		
		// Get monthly contacts count
		for ($i = 11; $i >= 0; $i--) {
			$monthStart = date('Y-m-01', strtotime("-$i months"));
			$monthEnd = date('Y-m-t', strtotime("-$i months"));
			
			// ✅ Added ORDER BY and LIMIT to prevent excessive scanning
			$stmt = $conn->prepare("SELECT COUNT(*) as count FROM (SELECT sent_date FROM contacts WHERE STR_TO_DATE(sent_date, '%d %b %Y') BETWEEN ? AND ? ORDER BY id DESC LIMIT ?) AS limited_data");
			$stmt->bind_param("ssi", $monthStart, $monthEnd, $maxRecordsPerQuery);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$monthlyData['contacts'][] = intval($row['count'] ?? 0);
			$stmt->close();
		}
		
		// Get monthly job applications count
		for ($i = 11; $i >= 0; $i--) {
			$monthStart = date('Y-m-01', strtotime("-$i months"));
			$monthEnd = date('Y-m-t', strtotime("-$i months"));
			
			// ✅ Added ORDER BY and LIMIT to prevent excessive scanning
			$stmt = $conn->prepare("SELECT COUNT(*) as count FROM (SELECT application_date FROM job_applications WHERE STR_TO_DATE(application_date, '%d %b %Y') BETWEEN ? AND ? ORDER BY id DESC LIMIT ?) AS limited_data");
			$stmt->bind_param("ssi", $monthStart, $monthEnd, $maxRecordsPerQuery);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$monthlyData['job_applications'][] = intval($row['count'] ?? 0);
			$stmt->close();
		}
		
	} catch (Exception $e) {
		error_log("Error loading monthly chart data: " . $e->getMessage());
		// Use default empty data on error
		$monthlyData = [
			'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			'consultations' => array_fill(0, 12, 0),
			'contacts' => array_fill(0, 12, 0),
			'job_applications' => array_fill(0, 12, 0)
		];
	}
}

echo getHeader("Dashboard", $name); 
?>

<?php
// Optional DB debug: visit this page with ?debug=db to verify live data
if (isset($_GET['debug']) && $_GET['debug'] === 'db' && isset($conn)) {
	echo '<div class="container my-3"><div class="alert alert-info"><strong>DB Debug:</strong> Live counts and samples from tables.</div>';
	$tables = [
		['name' => 'consultation', 'date_col' => 'date_now', 'select' => 'id, name, email, service_name, date_now'],
		['name' => 'contacts', 'date_col' => 'sent_date', 'select' => 'id, name, email, subject, sent_date'],
		['name' => 'job_applications', 'date_col' => 'application_date', 'select' => 'id, name, email, position, application_date'],
		['name' => 'campaigns', 'date_col' => null, 'select' => 'id']
	];
	foreach ($tables as $t) {
		$table = $t['name'];
		echo '<div class="card mb-3"><div class="card-body">';
		echo '<h6 class="mb-2">Table: ' . htmlspecialchars($table) . '</h6>';
		// Count
		if ($result = $conn->query("SELECT COUNT(*) AS c FROM `$table`")) {
			$row = $result->fetch_assoc();
			echo '<div><strong>Count:</strong> ' . intval($row['c'] ?? 0) . '</div>';
		} else {
			echo '<div class="text-danger">Count query failed: ' . htmlspecialchars($conn->error) . '</div>';
		}
		// Sample rows
		$orderBy = $t['date_col'] ? $t['date_col'] : 'id';
		$sqlSample = "SELECT {$t['select']} FROM `$table` ORDER BY `$orderBy` DESC LIMIT 5";
		if ($sample = $conn->query($sqlSample)) {
			if ($sample->num_rows > 0) {
				echo '<pre class="mt-2" style="white-space:pre-wrap">' . htmlspecialchars(json_encode($sample->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT)) . '</pre>';
			} else {
				echo '<div class="text-muted mt-2">No rows</div>';
			}
		} else {
			echo '<div class="text-danger mt-2">Sample query failed: ' . htmlspecialchars($conn->error) . '</div>';
		}
		echo '</div></div>';
	}
	echo '</div>';
}
?>

<style>
.dashboard-header {
	background: linear-gradient(135deg, #2f5597 0%, #1e3a6b 100%);
	color: white;
	padding: 2rem 0;
	margin-bottom: 2rem;
	border-radius: 0 0 15px 15px;
	box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.stat-card {
	background: white;
	border-radius: 12px;
	padding: 1.5rem;
	box-shadow: 0 2px 8px rgba(0,0,0,0.08);
	transition: all 0.3s ease;
	border-left: 4px solid transparent;
	height: 100%;
}

.stat-card:hover {
	transform: translateY(-5px);
	box-shadow: 0 8px 16px rgba(0,0,0,0.12);
}

.stat-card.primary { border-left-color: #2f5597; }
.stat-card.success { border-left-color: #28a745; }
.stat-card.info { border-left-color: #17a2b8; }
.stat-card.warning { border-left-color: #ffc107; }

.stat-icon {
	width: 60px;
	height: 60px;
	border-radius: 12px;
	display: flex;
	align-items: center;
	justify-content: center;
	font-size: 1.8rem;
	margin-bottom: 1rem;
}

.stat-icon.primary { background: linear-gradient(135deg, #2f5597 0%, #4a6fb5 100%); color: white; }
.stat-icon.success { background: linear-gradient(135deg, #28a745 0%, #34ce57 100%); color: white; }
.stat-icon.info { background: linear-gradient(135deg, #17a2b8 0%, #20c9e0 100%); color: white; }
.stat-icon.warning { background: linear-gradient(135deg, #ffc107 0%, #ffcd39 100%); color: #333; }

.stat-value {
	font-size: 2rem;
	font-weight: bold;
	margin: 0.5rem 0;
	color: #2c3e50;
}

.stat-label {
	color: #6c757d;
	font-size: 0.9rem;
	text-transform: uppercase;
	letter-spacing: 0.5px;
	margin-bottom: 0.25rem;
}

.stat-change {
	font-size: 0.85rem;
	margin-top: 0.5rem;
}

.stat-change.positive { color: #28a745; }

.chart-card {
	background: white;
	border-radius: 12px;
	padding: 1.5rem;
	box-shadow: 0 2px 8px rgba(0,0,0,0.08);
	height: 420px;
}

.chart-card h5 {
	color: #2f5597;
	font-weight: 600;
	margin-bottom: 1.5rem;
	border-bottom: 2px solid #e9ecef;
	padding-bottom: 0.75rem;
}

.activity-card {
	background: white;
	border-radius: 12px;
	padding: 1.5rem;
	box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.activity-item {
	padding: 1rem;
	border-left: 3px solid #e9ecef;
	margin-bottom: 1rem;
	background: #f8f9fa;
	border-radius: 0 8px 8px 0;
	transition: all 0.2s ease;
}

.activity-item:hover {
	background: #e9ecef;
	border-left-color: #2f5597;
	transform: translateX(5px);
}

.activity-type {
	display: inline-block;
	padding: 4px 12px;
	border-radius: 20px;
	font-size: 0.75rem;
	font-weight: 600;
	text-transform: uppercase;
}

.activity-type.consultation { background: #2f5597; color: white; }
.activity-type.contact { background: #17a2b8; color: white; }
.activity-type.job { background: #ffc107; color: #333; }
.activity-type.campaign { background: #28a745; color: white; }

.quick-action-btn {
	padding: 1rem;
	border-radius: 10px;
	border: 2px solid #e9ecef;
	background: white;
	transition: all 0.3s ease;
	text-decoration: none;
	display: block;
	text-align: center;
}

.quick-action-btn:hover {
	border-color: #2f5597;
	background: #f8f9fa;
	transform: translateY(-3px);
	box-shadow: 0 4px 12px rgba(47, 85, 151, 0.15);
}

.quick-action-btn i {
	font-size: 2rem;
	margin-bottom: 0.5rem;
	color: #2f5597;
}

.section-title {
	color: #2c3e50;
	font-weight: 600;
	margin-bottom: 1.5rem;
	display: flex;
	align-items: center;
	gap: 0.5rem;
}

.section-title i {
	color: #2f5597;
}
</style>

<div class="content-area">
	<!-- Dashboard Header -->
	<div class="dashboard-header">
		<div class="container">
			<h1 class="mb-2"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</h1>
			<p class="mb-0">Welcome back, <?= htmlspecialchars($name) ?>! Here's your overview for today.</p>
			<small class="text-white-50"><i class="far fa-clock me-1"></i><?= date('l, F j, Y - g:i A') ?></small>
		</div>
	</div>

	<div class="container">
		<!-- Stats Cards Row -->
		<div class="row g-3 mb-4">
			<div class="col-xl-3 col-md-6">
				<div class="stat-card primary">
					<div class="stat-icon primary">
						<i class="fas fa-handshake"></i>
					</div>
					<div class="stat-label">Total Consultations</div>
					<div class="stat-value"><?= number_format($stats['total_consultations']) ?></div>
					<div class="stat-change positive">
						<i class="fas fa-arrow-up me-1"></i>
						<?= $stats['consultations_this_week'] ?> this week
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6">
				<div class="stat-card success">
					<div class="stat-icon success">
						<i class="fas fa-envelope"></i>
					</div>
					<div class="stat-label">Contact Messages</div>
					<div class="stat-value"><?= number_format($stats['total_contacts']) ?></div>
					<div class="stat-change positive">
						<i class="fas fa-arrow-up me-1"></i>
						<?= $stats['contacts_today'] ?> today
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6">
				<div class="stat-card warning">
					<div class="stat-icon warning">
						<i class="fas fa-briefcase"></i>
					</div>
					<div class="stat-label">Job Applications</div>
					<div class="stat-value"><?= number_format($stats['total_job_apps']) ?></div>
					<div class="stat-change positive">
						<i class="fas fa-arrow-up me-1"></i>
						<?= $stats['job_apps_this_month'] ?> this month
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6">
				<div class="stat-card info">
					<div class="stat-icon info">
						<i class="fas fa-bullhorn"></i>
					</div>
					<div class="stat-label">Campaign Submissions</div>
					<div class="stat-value"><?= number_format($stats['total_campaigns']) ?></div>
					<div class="stat-change">
						<i class="fas fa-chart-line me-1"></i>
						Total entries
					</div>
				</div>
			</div>
		</div>

		<!-- Charts Row -->
		<div class="row g-3 mb-4">
			<div class="col-lg-8">
				<div class="chart-card">
					<h5><i class="fas fa-chart-line me-2"></i>Activity Trends</h5>
					<canvas id="lineChart" ></canvas>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="chart-card">
					<h5><i class="fas fa-chart-pie me-2"></i>Activity Distribution</h5>
					<canvas id="pieChart"></canvas>
				</div>
			</div>
		</div>

		<!-- Quick Actions & Recent Activity Row -->
		<div class="row g-3 mb-4">
			<div class="col-lg-4">
				<div class="activity-card">
					<h5 class="section-title">
						<i class="fas fa-bolt"></i>
						Quick Actions
					</h5>
					<div class="row g-2">
						<div class="col-6">
							<a href="reports.php" class="quick-action-btn">
								<i class="fas fa-chart-bar"></i>
								<div class="fw-bold">Reports</div>
								<small class="text-muted">View analytics</small>
							</a>
						</div>
						<div class="col-6">
							<a href="admins.php" class="quick-action-btn">
								<i class="fas fa-users-cog"></i>
								<div class="fw-bold">Admins</div>
								<small class="text-muted">Manage team</small>
							</a>
						</div>
						<div class="col-6">
							<a href="tables.php" class="quick-action-btn">
								<i class="fas fa-table"></i>
								<div class="fw-bold">Tables</div>
								<small class="text-muted">View data</small>
							</a>
						</div>
						<div class="col-6">
							<a href="career.php" class="quick-action-btn">
								<i class="fas fa-user-tie"></i>
								<div class="fw-bold">Careers</div>
								<small class="text-muted">Manage jobs</small>
							</a>
						</div>
					</div>

					<hr class="my-3">

					<h6 class="section-title mb-3">
						<i class="fas fa-user-shield"></i>
						Admin Overview
					</h6>
					<div class="d-flex justify-content-between mb-2">
						<span class="text-muted">Total Admins</span>
						<strong><?= $stats['total_admins'] ?></strong>
					</div>
					<div class="d-flex justify-content-between">
						<span class="text-muted">Active Admins</span>
						<strong class="text-success"><?= $stats['active_admins'] ?></strong>
					</div>
				</div>
			</div>

			<div class="col-lg-8">
				<div class="activity-card">
					<h5 class="section-title">
						<i class="fas fa-history"></i>
						Recent Activity
					</h5>
					<?php if (!empty($recentActivity)): ?>
						<?php foreach ($recentActivity as $activity): ?>
							<?php
								$type = strtolower($activity['type']);
								$typeClass = match($type) {
									'consultation' => 'consultation',
									'contact' => 'contact',
									'job application' => 'job',
									'campaign' => 'campaign',
									default => 'contact'
								};
								
								$icon = match($type) {
									'consultation' => 'fa-handshake',
									'contact' => 'fa-envelope',
									'job application' => 'fa-briefcase',
									'campaign' => 'fa-bullhorn',
									default => 'fa-circle'
								};
								
								$timeAgo = date('M d, g:i A', strtotime($activity['created_at']));
							?>
							<div class="activity-item">
								<div class="d-flex justify-content-between align-items-start mb-2">
									<div>
										<span class="activity-type <?= $typeClass ?>">
											<i class="fas <?= $icon ?> me-1"></i><?= htmlspecialchars($activity['type']) ?>
										</span>
									</div>
									<small class="text-muted">
										<i class="far fa-clock me-1"></i><?= $timeAgo ?>
									</small>
								</div>
								<div class="fw-bold text-dark"><?= htmlspecialchars($activity['name']) ?></div>
								<div class="text-muted small"><?= htmlspecialchars($activity['email']) ?></div>
								<div class="text-secondary small mt-1">
									<i class="fas fa-info-circle me-1"></i><?= htmlspecialchars(substr($activity['detail'], 0, 60)) ?><?= strlen($activity['detail']) > 60 ? '...' : '' ?>
								</div>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="text-center text-muted py-4">
							<i class="fas fa-inbox fa-3x mb-3 opacity-25"></i>
							<p>No recent activity</p>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo getFooter(); ?>

<script>
// Wait for Chart.js to load from footer before initializing charts
(function() {
	if (window.chartsInitialized) return;
	window.chartsInitialized = true;
	
		// ✅ DEBUG: Log the actual data from database
		console.log('=== CHART DATA FROM DATABASE ===');
		console.log('Labels:', <?= json_encode($monthlyData['labels']) ?>);
		console.log('Consultations:', <?= json_encode($monthlyData['consultations']) ?>);
		console.log('Contacts:', <?= json_encode($monthlyData['contacts']) ?>);
		console.log('Job Applications:', <?= json_encode($monthlyData['job_applications']) ?>);
		console.log('================================');
	
	// Line Chart - Activity Trends
	const lineCtx = document.getElementById('lineChart');
	if (lineCtx) {
		new Chart(lineCtx.getContext('2d'), {
			type: 'line',
			data: {
				labels: <?= json_encode($monthlyData['labels']) ?>,
				datasets: [
					{
						label: 'Consultations',
						data: <?= json_encode($monthlyData['consultations']) ?>,
						borderColor: '#2f5597',
						backgroundColor: 'rgba(47, 85, 151, 0.1)',
						tension: 0.4,
						fill: true,
						pointRadius: 5,
						pointHoverRadius: 7,
						pointBackgroundColor: '#2f5597',
						pointBorderColor: '#fff',
						pointBorderWidth: 2
					},
					{
						label: 'Contacts',
						data: <?= json_encode($monthlyData['contacts']) ?>,
						borderColor: '#17a2b8',
						backgroundColor: 'rgba(23, 162, 184, 0.1)',
						tension: 0.4,
						fill: true,
						pointRadius: 5,
						pointHoverRadius: 7,
						pointBackgroundColor: '#17a2b8',
						pointBorderColor: '#fff',
						pointBorderWidth: 2
					},
					{
						label: 'Job Applications',
						data: <?= json_encode($monthlyData['job_applications']) ?>,
						borderColor: '#ffc107',
						backgroundColor: 'rgba(255, 193, 7, 0.1)',
						tension: 0.4,
						fill: true,
						pointRadius: 5,
						pointHoverRadius: 7,
						pointBackgroundColor: '#ffc107',
						pointBorderColor: '#fff',
						pointBorderWidth: 2
					}
				]
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				plugins: {
					legend: {
						position: 'top',
						labels: {
							usePointStyle: true,
							padding: 15,
							font: { size: 12, weight: '600' }
						}
					},
					tooltip: {
						backgroundColor: 'rgba(0, 0, 0, 0.8)',
						padding: 12,
						titleFont: { size: 14, weight: 'bold' },
						bodyFont: { size: 13 },
						cornerRadius: 8
					}
				},
				scales: {
					y: {
						beginAtZero: true,
						grid: {
							color: 'rgba(0, 0, 0, 0.05)'
						},
						ticks: {
							font: { size: 11 }
						}
					},
					x: {
						grid: {
							display: false
						},
						ticks: {
							font: { size: 11 }
						}
					}
				}
			}
		});
	}

	// Pie Chart - Activity Distribution
	const pieCtx = document.getElementById('pieChart');
	if (pieCtx) {
		new Chart(pieCtx.getContext('2d'), {
			type: 'doughnut',
			data: {
				labels: ['Consultations', 'Contacts', 'Job Applications', 'Campaigns'],
				datasets: [{
					data: [<?= $stats['total_consultations'] ?>, <?= $stats['total_contacts'] ?>, <?= $stats['total_job_apps'] ?>, <?= $stats['total_campaigns'] ?>],
					backgroundColor: [
						'#2f5597',
						'#17a2b8',
						'#ffc107',
						'#28a745'
					],
					borderWidth: 3,
					borderColor: '#fff',
					hoverOffset: 10
				}]
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				plugins: {
					legend: {
						position: 'bottom',
						labels: {
							padding: 15,
							usePointStyle: true,
							font: { size: 12, weight: '600' }
						}
					},
					tooltip: {
						backgroundColor: 'rgba(0, 0, 0, 0.8)',
						padding: 12,
						titleFont: { size: 14, weight: 'bold' },
						bodyFont: { size: 13 },
						cornerRadius: 8,
						callbacks: {
							label: function(context) {
								const label = context.label || '';
								const value = context.parsed || 0;
								const total = context.dataset.data.reduce((a, b) => a + b, 0);
								const percentage = ((value / total) * 100).toFixed(1);
								return `${label}: ${value} (${percentage}%)`;
							}
						}
					}
				}
			}
		});
	}
})();
</script>