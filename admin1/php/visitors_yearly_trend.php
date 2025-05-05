<?php
include '../../php/config.php';

$labels = [];
$data = [];

$stmt = $conn->prepare("
    SELECT YEAR(date_tracked) AS year, COUNT(*) AS visitors 
    FROM analytics 
    WHERE date_tracked IS NOT NULL 
    GROUP BY year 
    ORDER BY year ASC
");

if ($stmt) {
    $stmt->execute();
    $stmt->bind_result($year, $visitors);

    while ($stmt->fetch()) {
        $labels[] = $year;
        $data[] = (int) $visitors;
    }

    $stmt->close();
}

header('Content-Type: application/json');
echo json_encode([
    'labels' => $labels,
    'data' => $data
]);

$conn->close();
?>
