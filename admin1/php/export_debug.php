<?php
// Debug the PDF export
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/export_debug.log');

// Start session
session_start();
$_SESSION['email'] = 'test@armely.com';
$_SESSION['name'] = 'Admin User';

// Connect to database
require __DIR__ . '/../../php/config.php';

if (!$conn) {
    die(json_encode(['status' => 'error', 'message' => 'Database connection failed']));
}

// Get action
$action = $_GET['action'] ?? $_POST['action'] ?? '';
$report = $_GET['report'] ?? $_POST['report'] ?? 'activity';

if ($action !== 'export_pdf') {
    die(json_encode(['status' => 'error', 'message' => 'Invalid action']));
}

try {
    // Fetch activity data
    $data = [];
    
    // Get recent consultations
    $result = $conn->query("SELECT 'Consultation' as type, name, email, service_name as detail, date_now as created_at FROM consultation ORDER BY date_now DESC LIMIT 10");
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    
    // Get recent contacts
    $result = $conn->query("SELECT 'Contact' as type, name, email, subject as detail, sent_date as created_at FROM contacts ORDER BY sent_date DESC LIMIT 10");
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    
    error_log("Total records fetched: " . count($data));
    
    // Check if TCPDF is available
    $autoloadPath = __DIR__ . '/../../vendor/autoload.php';
    $tcpdfPath = __DIR__ . '/../../vendor/tecnickcom/tcpdf/tcpdf.php';
    
    error_log("Autoload path exists: " . (file_exists($autoloadPath) ? 'YES' : 'NO'));
    error_log("TCPDF path exists: " . (file_exists($tcpdfPath) ? 'YES' : 'NO'));
    
    if (file_exists($autoloadPath)) {
        require_once $autoloadPath;
        error_log("Autoload loaded successfully");
    }
    
    // Create simple HTML
    $html = '<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Armely Report</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 20px;">
    <h1>Armely Activity Report</h1>
    <p>Generated on ' . date('F j, Y g:i A') . '</p>
    <p>Total Records: ' . count($data) . '</p>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #2f5597; color: white;">
                <th style="border: 1px solid #ddd; padding: 8px;">Date</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Type</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Person</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Email</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Detail</th>
            </tr>
        </thead>
        <tbody>';
    
    foreach ($data as $row) {
        $html .= '<tr>
            <td style="border: 1px solid #ddd; padding: 8px;">' . htmlspecialchars(date('M d, Y H:i', strtotime($row['created_at']))) . '</td>
            <td style="border: 1px solid #ddd; padding: 8px;">' . htmlspecialchars($row['type']) . '</td>
            <td style="border: 1px solid #ddd; padding: 8px;">' . htmlspecialchars($row['name']) . '</td>
            <td style="border: 1px solid #ddd; padding: 8px;">' . htmlspecialchars($row['email']) . '</td>
            <td style="border: 1px solid #ddd; padding: 8px;">' . htmlspecialchars(substr($row['detail'], 0, 50)) . '</td>
        </tr>';
    }
    
    $html .= '</tbody>
    </table>
    <p style="margin-top: 20px; font-size: 12px; color: #999;">Automatically generated report</p>
</body>
</html>';
    
    error_log("HTML generated, length: " . strlen($html));
    
    // Try TCPDF
    try {
        require_once __DIR__ . '/../../vendor/tecnickcom/tcpdf/tcpdf.php';
        
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetCreator('Armely System');
        $pdf->SetAuthor('Armely System');
        $pdf->SetTitle('Activity Report');
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetAutoPageBreak(TRUE, 15);
        $pdf->SetFont('helvetica', '', 9);
        $pdf->AddPage();
        
        $pdf->writeHTML($html, true, false, true, false, '');
        
        error_log("PDF generated successfully");
        
        $filename = 'Report_' . date('Y-m-d_His') . '.pdf';
        $pdf->Output($filename, 'D');
        exit;
    } catch (Exception $e) {
        error_log("TCPDF Error: " . $e->getMessage());
        error_log("Stack trace: " . $e->getTraceAsString());
        die("Error: " . $e->getMessage());
    }
    
} catch (Exception $e) {
    error_log("General Error: " . $e->getMessage());
    die("Error: " . $e->getMessage());
}
?>
