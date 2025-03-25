<?php
header("Content-Type: application/json"); // Assure que la réponse est bien en JSON

$host = "localhost";
$user = "root";
$pass = "";
$db = "ecoimpact_";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data["goal"])) {
    echo json_encode(["success" => false, "message" => "No goal provided"]);
    exit;
}

$goal = $conn->real_escape_string($data["goal"]);
$sql = "INSERT INTO goals (goal) VALUES ('$goal')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true, "message" => "Goal saved"]);
} else {
    echo json_encode(["success" => false, "message" => "Database error"]);
}

$conn->close();

?>
