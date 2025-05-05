<?php
include '../../php/config.php';

$countryVisits = [];

$stmt = $conn->prepare("SELECT country, COUNT(*) as total_visits FROM analytics GROUP BY country");

if ($stmt) {
    $stmt->execute();
    $stmt->bind_result($country, $total_visits);

    while ($stmt->fetch()) {
        $countryVisits[$country] = (int) $total_visits;
    }

    $stmt->close();
}

arsort($countryVisits); // Sort by descending visit count

$labels = [];
$data = [];
$otherTotal = 0;
$count = 0;

foreach ($countryVisits as $country => $visits) {
    if ($count < 5) {
        $labels[] = $country;
        $data[] = $visits;
    } else {
        $otherTotal += $visits;
    }
    $count++;
}

if ($otherTotal > 0) {
    $labels[] = 'Other';
    $data[] = $otherTotal;
}

header('Content-Type: application/json');
echo json_encode([
    'labels' => $labels,
    'data' => $data
]);

$conn->close();
?>
