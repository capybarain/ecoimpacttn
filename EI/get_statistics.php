<?php
$host = "localhost";
$user = "root";  
$pass = "";  
$db = "ecoimpact_";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die(json_encode([]));
}

// Get total number of goals chosen
$totalQuery = "SELECT COUNT(*) AS total FROM goals";
$totalResult = $conn->query($totalQuery);
$totalRow = $totalResult->fetch_assoc();
$total = $totalRow['total'];

if ($total == 0) {
    echo json_encode([]);
    exit;
}

// Get count of each goal
$goalQuery = "SELECT goal, COUNT(*) AS count FROM goals GROUP BY goal";
$goalResult = $conn->query($goalQuery);

$stats = [];
while ($row = $goalResult->fetch_assoc()) {
    $percentage = round(($row['count'] / $total) * 100, 2);
    $stats[] = ["goal" => $row['goal'], "percentage" => $percentage];
}

echo json_encode($stats);

$conn->close();

?>

