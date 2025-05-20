<?php
include '../../php/config.php';

$query = "
  SELECT author, COUNT(*) AS article_count 
  FROM blogs 
  GROUP BY author 
  ORDER BY article_count DESC
";

$result = $conn->query($query);

$labels = [];
$data = [];

while ($row = $result->fetch_assoc()) {
    $labels[] = $row['author'];
    $data[] = (int)$row['article_count'];
}

header('Content-Type: application/json');
echo json_encode([
    'labels' => $labels,
    'data' => $data
]);

$conn->close();
?>
