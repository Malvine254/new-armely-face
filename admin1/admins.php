<?php
require 'php/check_session.php';
include 'php/header_footer.php';
include 'php/users.php';

// Load admins from database with stats
$admins = [];
$totalAdmins = 0;
$pendingInvites = 0;
$uniqueRoles = [];

if (isset($conn)) {
	try {
		$result = $conn->query("SELECT * FROM admin ORDER BY id DESC");
		if ($result && $result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$role = $row['role'] ?? 'Admin';
				$status = $row['status'] ?? 'active';
				
				$admins[] = [
					'id'     => $row['id'] ?? null,
					'name'   => $row['name'] ?? 'Unknown',
					'email'  => $row['email'] ?? '',
					'role'   => $role,
					'status' => $status,
					'joined' => $row['joined_date'] ?? '—'
				];
				
				$totalAdmins++;
				if (strtolower($status) === 'pending') {
					$pendingInvites++;
				}
				if (!in_array($role, $uniqueRoles)) {
					$uniqueRoles[] = $role;
				}
			}
		}
	} catch (Exception $e) {
		error_log('Admins load failed: ' . $e->getMessage());
	}
}

// Calculate new admins this month
$newThisMonth = 0;
if (isset($conn)) {
	try {
		$firstDayOfMonth = date('Y-m-01');
		$stmt = $conn->prepare("SELECT COUNT(*) as count FROM admin WHERE joined_date >= ?");
		$stmt->bind_param("s", $firstDayOfMonth);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$newThisMonth = $row['count'] ?? 0;
		$stmt->close();
	} catch (Exception $e) {
		error_log('New admins count failed: ' . $e->getMessage());
	}
}

$rolesDisplay = count($uniqueRoles) > 0 ? implode(', ', $uniqueRoles) : 'Admin';

// Fallback in case user details did not load
if (!isset($name) || $name === '') {
	$name = isset($_SESSION['email']) ? $_SESSION['email'] : 'Admin';
}
?>

<?php echo getHeader("Manage Admins", $name); ?>

<div class="content-area">
	<div class="container-fluid">
		<!-- Stats Cards Row -->
		<div class="row mb-4">
			<div class="col-md-4 mb-3">
				<div class="card h-100 shadow-sm">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div class="flex-grow-1">
								<h6 class="text-muted mb-1">Total Admins</h6>
								<h2 class="mb-0"><?= $totalAdmins ?></h2>
								<small class="text-success"><i class="fas fa-arrow-up"></i> +<?= $newThisMonth ?> new this month</small>
							</div>
							<div class="ms-3">
								<i class="fas fa-users fa-2x text-primary opacity-50"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-3">
				<div class="card h-100 shadow-sm">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div class="flex-grow-1">
								<h6 class="text-muted mb-1">Pending Invites</h6>
								<h2 class="mb-0"><?= $pendingInvites ?></h2>
								<small class="text-warning">Awaiting acceptance</small>
							</div>
							<div class="ms-3">
								<i class="fas fa-envelope fa-2x text-warning opacity-50"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-3">
				<div class="card h-100 shadow-sm">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div class="flex-grow-1">
								<h6 class="text-muted mb-1">Active Roles</h6>
								<h2 class="mb-0"><?= count($uniqueRoles) ?></h2>
								<small class="text-muted"><?= $rolesDisplay ?></small>
							</div>
							<div class="ms-3">
								<i class="fas fa-user-shield fa-2x text-info opacity-50"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Admin Directory Card -->
		<div class="card shadow-sm mb-4">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
					<div>
						<h5 class="mb-1">Admin Directory</h5>
						<small class="text-muted">Manage access, reset passwords, or invite new team members.</small>
					</div>
					<div class="gap-2 d-flex">
						<button class="btn btn-primary" type="button">
							<i class="fas fa-user-plus me-2"></i>Invite Admin
						</button>
						<button class="btn btn-outline-primary" type="button" id="exportAdminsPdf">
							<i class="fas fa-file-pdf me-1"></i>Export PDF
						</button>
					</div>
				</div>

				<!-- Filter Section -->
				<div class="row g-2 mb-3">
					<div class="col-md-5">
						<input type="text" class="form-control" id="searchAdmin" placeholder="🔍 Search by name or email...">
					</div>
					<div class="col-md-3">
						<select class="form-select" id="filterRole">
							<option value="">All Roles</option>
							<?php foreach ($uniqueRoles as $role): ?>
								<option value="<?= htmlspecialchars($role) ?>"><?= htmlspecialchars($role) ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-4">
						<select class="form-select" id="filterStatus">
							<option value="">All Statuses</option>
							<option value="active">Active</option>
							<option value="pending">Pending</option>
							<option value="suspended">Suspended</option>
						</select>
					</div>
				</div>

				<div class="table-responsive">
					<table class="table align-middle table-hover" id="adminsTable">
						<thead class="table-light">
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Role</th>
								<th>Status</th>
								<th>Joined Date</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php if (count($admins) === 0): ?>
								<tr>
									<td colspan="6" class="text-center text-muted py-4">
										<i class="fas fa-users fa-3x mb-2 opacity-25"></i>
										<p class="mb-0">No admins found.</p>
									</td>
								</tr>
							<?php else: ?>
								<?php foreach ($admins as $admin): 
									$status = strtolower($admin['status']);
									$badgeClass = $status === 'active' ? 'bg-success' : ($status === 'pending' ? 'bg-warning text-dark' : 'bg-secondary');
									?>
									<tr data-admin-id="<?= htmlspecialchars($admin['id']) ?>" data-name="<?= htmlspecialchars($admin['name']) ?>" data-email="<?= htmlspecialchars($admin['email']) ?>" data-role="<?= htmlspecialchars($admin['role']) ?>" data-status="<?= htmlspecialchars($status) ?>">
										<td>
											<div class="d-flex align-items-center">
												<div class="avatar-circle bg-primary text-white me-2">
													<?= strtoupper(substr($admin['name'], 0, 1)) ?>
												</div>
												<strong><?= htmlspecialchars($admin['name']) ?></strong>
											</div>
										</td>
										<td class="text-muted"><?= htmlspecialchars($admin['email']) ?></td>
										<td>
											<span class="badge bg-light text-dark border"><?= htmlspecialchars($admin['role']) ?></span>
										</td>
										<td><span class="badge <?= $badgeClass ?>"><?= ucfirst($status) ?></span></td>
										<td class="text-muted"><?= htmlspecialchars($admin['joined']) ?></td>
										<td>
											<div class="d-flex gap-1 justify-content-center">
												<button class="btn btn-sm btn-outline-primary btn-edit-admin" title="Edit Admin">
													<i class="fas fa-edit"></i>
												</button>
												<?php if ($status === 'pending'): ?>
													<button class="btn btn-sm btn-outline-warning btn-resend-admin" title="Resend Invite">
														<i class="fas fa-paper-plane"></i>
													</button>
												<?php else: ?>
													<button class="btn btn-sm btn-outline-secondary btn-suspend-admin" title="Suspend Admin">
														<i class="fas fa-ban"></i>
													</button>
												<?php endif; ?>
												<button class="btn btn-sm btn-outline-danger btn-remove-admin" title="Remove Admin">
													<i class="fas fa-trash"></i>
												</button>
											</div>
										</td>
									</tr>
								<?php endforeach; ?>
							<?php endif; ?>
						</tbody>
					</table>
				</div>

				<!-- Pagination Controls -->
				<div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
					<div>
						<small class="text-muted">Showing <strong><span id="showingStart">0</span> to <span id="showingEnd">0</span></strong> of <strong><span id="totalRecords"><?= count($admins) ?></span></strong> admins</small>
					</div>
					<div class="btn-group">
						<button class="btn btn-outline-primary btn-sm" id="prevPage" disabled>
							<i class="fas fa-chevron-left"></i> Previous
						</button>
						<button class="btn btn-outline-primary btn-sm" id="nextPage">
							Next <i class="fas fa-chevron-right"></i>
						</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Quick Actions Card -->
		<div class="card shadow-sm">
			<div class="card-body">
				<h5 class="mb-3">Quick Actions</h5>
				<div class="row g-3">
					<div class="col-md-4">
						<div class="p-3 border rounded h-100 bg-light">
							<div class="d-flex align-items-center mb-2">
								<i class="fas fa-envelope text-primary me-2"></i>
								<h6 class="mb-0">Invite via email</h6>
							</div>
							<p class="text-muted small mb-3">Send an invite link to create a new admin account.</p>
							<div class="input-group">
								<input type="email" class="form-control" placeholder="email@armely.com">
								<button class="btn btn-primary" type="button">Send</button>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="p-3 border rounded h-100 bg-light">
							<div class="d-flex align-items-center mb-2">
								<i class="fas fa-shield-alt text-info me-2"></i>
								<h6 class="mb-0">Roles & permissions</h6>
							</div>
							<p class="text-muted small mb-3">Review who can publish, edit, or manage users.</p>
							<button class="btn btn-outline-info btn-sm" type="button">
								<i class="fas fa-eye me-1"></i>View roles
							</button>
						</div>
					</div>
					<div class="col-md-4">
						<div class="p-3 border rounded h-100 bg-light">
							<div class="d-flex align-items-center mb-2">
								<i class="fas fa-lock text-success me-2"></i>
								<h6 class="mb-0">Security</h6>
							</div>
							<p class="text-muted small mb-3">Enforce 2FA and password rules for admins.</p>
							<button class="btn btn-outline-success btn-sm" type="button">
								<i class="fas fa-cog me-1"></i>Review policies
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<?php echo getFooter(); ?>

<!-- Edit Admin Modal -->
<div class="modal fade" id="editAdminModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Admin</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="editAdminForm">
					<input type="hidden" name="admin_id" id="editAdminId">
					<div class="mb-3">
						<label class="form-label">Name</label>
						<input type="text" class="form-control" name="name" id="editAdminName" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Email</label>
						<input type="email" class="form-control" name="email" id="editAdminEmail" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Role</label>
						<select class="form-select" name="role" id="editAdminRole">
							<option>Super Admin</option>
							<option>Editor</option>
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Status</label>
						<select class="form-select" name="status" id="editAdminStatus">
							<option value="active">Active</option>
							<option value="pending">Pending</option>
							<option value="suspended">Suspended</option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="saveAdminBtn">Save changes</button>
			</div>
		</div>
	</div>
</div>

<script>
	$(function() {
		const endpoint = 'php/admin_actions.php';
		let currentPage = 1;
		const rowsPerPage = 5;
		let filteredRows = [];

		// Initialize pagination
		function initPagination() {
			filteredRows = $('#adminsTable tbody tr:visible');
			showPage(1);
		}

		function showPage(page) {
			currentPage = page;
			const start = (page - 1) * rowsPerPage;
			const end = start + rowsPerPage;
			
			filteredRows.hide();
			filteredRows.slice(start, end).show();
			
			// Update pagination info
			const total = filteredRows.length;
			const showingStart = total > 0 ? start + 1 : 0;
			const showingEnd = Math.min(end, total);
			
			$('#showingStart').text(showingStart);
			$('#showingEnd').text(showingEnd);
			$('#totalRecords').text(total);
			
			// Update button states
			$('#prevPage').prop('disabled', page === 1);
			$('#nextPage').prop('disabled', end >= total);
			
			// Re-attach event handlers to visible rows
			attachRowHandlers();
		}

		$('#prevPage').on('click', function() {
			if (currentPage > 1) {
				showPage(currentPage - 1);
			}
		});

		$('#nextPage').on('click', function() {
			const maxPage = Math.ceil(filteredRows.length / rowsPerPage);
			if (currentPage < maxPage) {
				showPage(currentPage + 1);
			}
		});

		// Filter functionality
		function applyFilters() {
			const searchTerm = $('#searchAdmin').val().toLowerCase();
			const roleFilter = $('#filterRole').val().toLowerCase();
			const statusFilter = $('#filterStatus').val().toLowerCase();

			$('#adminsTable tbody tr').each(function() {
				const row = $(this);
				const name = row.data('name').toString().toLowerCase();
				const email = row.data('email').toString().toLowerCase();
				const role = row.data('role').toString().toLowerCase();
				const status = row.data('status').toString().toLowerCase();

				const matchesSearch = searchTerm === '' || name.includes(searchTerm) || email.includes(searchTerm);
				const matchesRole = roleFilter === '' || role === roleFilter;
				const matchesStatus = statusFilter === '' || status === statusFilter;

				if (matchesSearch && matchesRole && matchesStatus) {
					row.show();
				} else {
					row.hide();
				}
			});

			initPagination();
		}

		$('#searchAdmin, #filterRole, #filterStatus').on('input change', applyFilters);

		// Attach event handlers to table rows
		function attachRowHandlers() {
			// Open edit modal
			$('.btn-edit-admin').off('click').on('click', function() {
				const row = $(this).closest('tr');
				$('#editAdminId').val(row.data('admin-id'));
				$('#editAdminName').val(row.data('name'));
				$('#editAdminEmail').val(row.data('email'));
				$('#editAdminRole').val(row.data('role'));
				$('#editAdminStatus').val(row.data('status'));
				$('#editAdminModal').modal('show');
			});

			// Remove admin
			$('.btn-remove-admin').off('click').on('click', function(){
				const row = $(this).closest('tr');
				const id = row.data('admin-id');
				if (!confirm('Remove this admin?')) return;
				$.post(endpoint, { action: 'remove_admin', admin_id: id })
					.done(function(){
						row.fadeOut(200, function(){ 
							$(this).remove(); 
							initPagination();
						});
					})
					.fail(function(){
						alert('Failed to remove admin.');
					});
			});

			// Suspend admin
			$('.btn-suspend-admin').off('click').on('click', function(){
				const row = $(this).closest('tr');
				const id = row.data('admin-id');
				$.post(endpoint, { action: 'suspend_admin', admin_id: id })
					.done(function(){
						row.data('status','suspended');
						row.find('td:nth-child(4) .badge').attr('class','badge bg-secondary').text('Suspended');
						// Replace suspend button with resend button
						$(this).removeClass('btn-suspend-admin').addClass('btn-resend-admin').text('Resend');
						attachRowHandlers();
					}.bind(this))
					.fail(function(){ alert('Failed to suspend admin.'); });
			});

			// Resend invite
			$('.btn-resend-admin').off('click').on('click', function(){
				const row = $(this).closest('tr');
				const id = row.data('admin-id');
				$.post(endpoint, { action: 'resend_invite', admin_id: id })
					.done(function(){ alert('Invite resent.'); })
					.fail(function(){ alert('Failed to resend invite.'); });
			});
		}

		// Save admin via AJAX
		$('#saveAdminBtn').on('click', function() {
			const payload = $('#editAdminForm').serialize() + '&action=update_admin';
			$.post(endpoint, payload)
				.done(function(resp){
					// On success, update row UI without reload
					const id = $('#editAdminId').val();
					const row = $('tr[data-admin-id="' + id + '"]');
					const newName = $('#editAdminName').val();
					const newEmail = $('#editAdminEmail').val();
					const newRole = $('#editAdminRole').val();
					const newStatus = $('#editAdminStatus').val();
					
					row.data('name', newName);
					row.data('email', newEmail);
					row.data('role', newRole);
					row.data('status', newStatus);
					row.find('td:nth-child(1)').text(newName);
					row.find('td:nth-child(2)').text(newEmail);
					row.find('td:nth-child(3)').text(newRole);
					
					const badge = newStatus === 'active' ? 'bg-success' : newStatus === 'pending' ? 'bg-warning text-dark' : 'bg-secondary';
					row.find('td:nth-child(4) .badge').attr('class', 'badge ' + badge).text(newStatus.charAt(0).toUpperCase() + newStatus.slice(1));
					
					$('#editAdminModal').modal('hide');
					applyFilters();
				})
				.fail(function(){
					alert('Failed to update admin.');
				});
		});

		// Initialize on page load
		initPagination();

		// PDF Export Handler for Admins
		$('#exportAdminsPdf').on('click', function(e) {
			e.preventDefault();
			
			// Show loading state
			var btn = $(this);
			var originalHtml = btn.html();
			btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-1"></i>Generating...');
			
			// Create form and submit for PDF download
			var form = $('<form/>', {
				'method': 'GET',
				'action': 'php/export_report.php',
				'target': '_blank'
			});
			
			form.append($('<input/>', {
				'type': 'hidden',
				'name': 'action',
				'value': 'export_pdf'
			}));
			
			form.append($('<input/>', {
				'type': 'hidden',
				'name': 'report',
				'value': 'admins'
			}));
			
			$('body').append(form);
			form.submit();
			form.remove();
			
			// Restore button state
			setTimeout(function() {
				btn.prop('disabled', false).html(originalHtml);
			}, 1000);
		});
	});
</script>