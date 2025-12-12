<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);

session_start();
require '../../php/config.php';

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    http_response_code(401);
    exit('Unauthorized');
}

// Check if action is to export report
$action = $_GET['action'] ?? $_POST['action'] ?? '';

if ($action === 'export_pdf') {
    // Get report type
    $reportType = $_GET['report'] ?? $_POST['report'] ?? 'activity';
    
    try {
        // Fetch data based on report type
        $data = [];
        
        if ($reportType === 'activity') {
            // Get recent activity from all sources
            $recentActivity = [];
            
            // Recent consultations
            $result = $conn->query("SELECT 'Consultation' as type, name, email, service_name as detail, date_now as created_at FROM consultation ORDER BY date_now DESC LIMIT 10");
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $recentActivity[] = $row;
                }
            }
            
            // Recent contacts
            $result = $conn->query("SELECT 'Contact' as type, name, email, subject as detail, sent_date as created_at FROM contacts ORDER BY sent_date DESC LIMIT 10");
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $recentActivity[] = $row;
                }
            }
            
            // Recent job applications
            $result = $conn->query("SELECT 'Job Application' as type, name, email, position as detail, application_date as created_at FROM job_applications ORDER BY application_date DESC LIMIT 10");
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $recentActivity[] = $row;
                }
            }
            
            // Recent campaigns
            $result = $conn->query("SELECT 'Campaign' as type, full_name as name, business_email as email, company_name as detail, sent_date as created_at FROM campaigns ORDER BY sent_date DESC LIMIT 10");
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $recentActivity[] = $row;
                }
            }
            
            $data = $recentActivity;
        } 
        else if ($reportType === 'admins') {
            // Get all admins
            $result = $conn->query("SELECT id, name, email, role, status, joined_date FROM admin ORDER BY id DESC");
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }
        }
        
        // Generate HTML for PDF
        $html = generatePDF($reportType, $data);
        
        // Output as PDF
        outputPDF($html);
        exit;
        
    } catch (Exception $e) {
        http_response_code(500);
        exit('Error: ' . $e->getMessage());
    }
}

/**
 * Generate HTML template for PDF
 */
function generatePDF($type, $data) {
    $html = '<style>
        body { font-family: helvetica; }
        table { border-collapse: collapse; width: 100%; margin: 10px 0; }
        th { 
            background-color: #2f5597; 
            color: #ffffff; 
            padding: 10px 8px; 
            text-align: left; 
            font-weight: bold; 
            font-size: 11px;
            border: 1px solid #1e3a6b;
        }
        td { 
            padding: 8px; 
            font-size: 10px; 
            border: 1px solid #cccccc;
            color: #333333;
        }
        tr:nth-child(even) { background-color: #f5f5f5; }
        tr:nth-child(odd) { background-color: #ffffff; }
        .header-box { 
            background-color: #2f5597; 
            color: #ffffff; 
            padding: 15px; 
            margin-bottom: 15px;
            border-radius: 3px;
        }
        .meta-box { 
            background-color: #e8f0f8; 
            padding: 10px; 
            margin-bottom: 15px;
            border-left: 4px solid #2f5597;
        }
        .summary-box { 
            background-color: #f9f9f9; 
            padding: 12px; 
            margin-bottom: 15px; 
            border: 1px solid #ddd;
        }
        .badge { 
            padding: 4px 8px; 
            border-radius: 3px; 
            font-weight: bold; 
            font-size: 9px;
            display: inline-block;
        }
        .badge-primary { background-color: #2f5597; color: #ffffff; }
        .badge-info { background-color: #17a2b8; color: #ffffff; }
        .badge-warning { background-color: #ffc107; color: #000000; }
        .badge-success { background-color: #28a745; color: #ffffff; }
        .badge-secondary { background-color: #6c757d; color: #ffffff; }
        h1 { font-size: 22px; margin: 0; }
        h3 { font-size: 14px; color: #2f5597; margin: 0 0 8px 0; }
        p { font-size: 10px; margin: 3px 0; }
        strong { font-weight: bold; }
    </style>
    
    <div class="header-box">
        <h1>Armely Report</h1>
        <p style="color: #ffffff;">Generated on ' . date('F j, Y \a\t g:i A') . '</p>
    </div>
    
    <div class="meta-box">
        <p><strong>Report Type:</strong> ' . ucfirst(str_replace('_', ' ', $type)) . '</p>
        <p><strong>Total Records:</strong> ' . count($data) . '</p>
    </div>';
    
    if ($type === 'activity' && !empty($data)) {
        $html .= '
    <div class="summary-box">
        <h3>Recent Activity Summary</h3>
        <p>This report shows recent activities from consultations, contacts, job applications, and campaigns.</p>
    </div>
    
    <table cellpadding="8" cellspacing="0" border="1" style="border-color: #cccccc;">
        <thead>
            <tr style="background-color: #2f5597;">
                <th style="color: #ffffff; width: 18%;">Date</th>
                <th style="color: #ffffff; width: 15%;">Type</th>
                <th style="color: #ffffff; width: 20%;">Person</th>
                <th style="color: #ffffff; width: 22%;">Email</th>
                <th style="color: #ffffff; width: 25%;">Detail</th>
            </tr>
        </thead>
        <tbody>';
        
        $rowNum = 0;
        foreach ($data as $activity) {
            $rowNum++;
            $actType = $activity['type'] ?? 'Unknown';
            $badgeClass = match($actType) {
                'Consultation' => 'badge-primary',
                'Contact' => 'badge-info',
                'Job Application' => 'badge-warning',
                'Campaign' => 'badge-success',
                default => 'badge-secondary'
            };
            
            $bgColor = ($rowNum % 2 == 0) ? '#f5f5f5' : '#ffffff';
            $date = isset($activity['created_at']) ? date('M d, Y H:i', strtotime($activity['created_at'])) : date('M d, Y');
            $detail = isset($activity['detail']) ? substr($activity['detail'], 0, 100) : '—';
            
            $html .= '
            <tr style="background-color: ' . $bgColor . ';">
                <td style="border: 1px solid #cccccc;">' . htmlspecialchars($date) . '</td>
                <td style="border: 1px solid #cccccc;"><span class="badge ' . $badgeClass . '">' . htmlspecialchars($actType) . '</span></td>
                <td style="border: 1px solid #cccccc;"><strong>' . htmlspecialchars($activity['name'] ?? 'Unknown') . '</strong></td>
                <td style="border: 1px solid #cccccc;">' . htmlspecialchars($activity['email'] ?? '—') . '</td>
                <td style="border: 1px solid #cccccc;">' . htmlspecialchars($detail) . '</td>
            </tr>';
        }
        
        $html .= '
        </tbody>
    </table>';
    } 
    else if ($type === 'admins' && !empty($data)) {
        $html .= '
    <div class="summary-box">
        <h3>Admin Directory Report</h3>
        <p>This report lists all administrators in the Armely system with their roles and status.</p>
    </div>
    
    <table cellpadding="8" cellspacing="0" border="1" style="border-color: #cccccc;">
        <thead>
            <tr style="background-color: #2f5597;">
                <th style="color: #ffffff; width: 8%;">ID</th>
                <th style="color: #ffffff; width: 22%;">Name</th>
                <th style="color: #ffffff; width: 28%;">Email</th>
                <th style="color: #ffffff; width: 15%;">Role</th>
                <th style="color: #ffffff; width: 12%;">Status</th>
                <th style="color: #ffffff; width: 15%;">Joined</th>
            </tr>
        </thead>
        <tbody>';
        
        $rowNum = 0;
        foreach ($data as $admin) {
            $rowNum++;
            $statusBadge = ($admin['status'] === 'active') ? 'badge-success' : 'badge-secondary';
            $joinDate = isset($admin['joined_date']) ? date('M d, Y', strtotime($admin['joined_date'])) : '—';
            $bgColor = ($rowNum % 2 == 0) ? '#f5f5f5' : '#ffffff';
            
            $html .= '
            <tr style="background-color: ' . $bgColor . ';">
                <td style="border: 1px solid #cccccc; text-align: center;"><strong>' . htmlspecialchars($admin['id']) . '</strong></td>
                <td style="border: 1px solid #cccccc;"><strong>' . htmlspecialchars($admin['name']) . '</strong></td>
                <td style="border: 1px solid #cccccc;">' . htmlspecialchars($admin['email']) . '</td>
                <td style="border: 1px solid #cccccc;">' . htmlspecialchars($admin['role']) . '</td>
                <td style="border: 1px solid #cccccc;"><span class="badge ' . $statusBadge . '">' . htmlspecialchars(ucfirst($admin['status'])) . '</span></td>
                <td style="border: 1px solid #cccccc;">' . htmlspecialchars($joinDate) . '</td>
            </tr>';
        }
        
        $html .= '
        </tbody>
    </table>';
    }
    
    $html .= '
    <p style="margin-top: 20px; text-align: center; color: #999999; font-size: 9px; border-top: 1px solid #ddd; padding-top: 10px;">
        This is an automatically generated report from Armely Management System<br/>
        Report ID: ' . uniqid() . ' | Generated by: ' . ($_SESSION['name'] ?? 'Admin') . '
    </p>';
    
    return $html;
}

/**
 * Output PDF using TCPDF
 */
function outputPDF($html) {
    // Load TCPDF
    if (file_exists(__DIR__ . '/../../vendor/autoload.php')) {
        require_once __DIR__ . '/../../vendor/autoload.php';
    } else {
        require_once __DIR__ . '/../../vendor/tecnickcom/tcpdf/tcpdf.php';
    }
    
    // Create PDF object
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    
    // Set document properties
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetCreator('Armely System');
    $pdf->SetAuthor('Armely System');
    $pdf->SetTitle('Armely Report');
    $pdf->SetSubject('Activity Report');
    $pdf->SetMargins(10, 10, 10);
    $pdf->SetAutoPageBreak(true, 15);
    
    // Set font
    $pdf->SetFont('helvetica', '', 9);
    
    // Add page
    $pdf->AddPage();
    
    // Write HTML
    $pdf->writeHTML($html, true, false, true, false, '');
    
    // Output PDF
    $filename = 'Report_' . date('Y-m-d_His') . '.pdf';
    $pdf->Output($filename, 'D');
}
?>
