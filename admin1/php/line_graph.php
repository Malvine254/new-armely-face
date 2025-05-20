<?php
include '../../php/config.php';

$query = "
  SELECT 
    DATE_FORMAT(STR_TO_DATE(date, '%M %D, %Y'), '%M %Y') AS month_label,
    title,
    clicks
  FROM blogs
  ORDER BY STR_TO_DATE(date, '%M %D, %Y') ASC
";

$monthlyData = [];

$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    $month = $row['month_label'];

    if (!isset($monthlyData[$month])) {
        $monthlyData[$month] = [
            'total_clicks' => 0,
            'titles' => []
        ];
    }

    $monthlyData[$month]['total_clicks'] += (int) $row['clicks'];
    $monthlyData[$month]['titles'][] = $row['title'];
}

// Prepare final structure for chart
$labels = [];
$data = [];
$titlesPerMonth = [];

foreach ($monthlyData as $month => $info) {
    $labels[] = $month;
    $data[] = $info['total_clicks'];
    $titlesPerMonth[] = $info['titles']; // Array of titles
}

header('Content-Type: application/json');
echo json_encode([
    'labels' => $labels,
    'data' => $data,
    'titles' => $titlesPerMonth
]);

$conn->close();
?>
