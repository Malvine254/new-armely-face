<?php
// Simple test to verify PDF generation works
session_start();
$_SESSION['email'] = 'test@armely.com';

// Test the export report
require '../../php/config.php';
include 'export_report.php';

// Test with activity report
$_GET['action'] = 'export_pdf';
$_GET['report'] = 'activity';

// Manually call the PDF generation (simulate the export)
if (!isset($conn)) {
    die('Database connection failed');
}

try {
    $recentActivity = [];
    
    // Get sample data
    $result = $conn->query("SELECT 'Test' as type, 'John Doe' as name, 'john@example.com' as email, 'Test Detail' as detail, NOW() as created_at LIMIT 1");
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $recentActivity[] = $row;
        }
    }
    
    $html = generatePDF('activity', $recentActivity);
    
    // Set proper headers
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="test_report.pdf"');
    
    // Output using TCPDF
    outputPDF($html);
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
