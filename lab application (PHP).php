


<?php
$host = 'localhost'
$db   = 'test'; 
$user = 'root'; 
$pass = '';  
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];

    // Prepare SQL statement
    $sql = "INSERT INTO students (full_name, email, gender) VALUES (?, ?, ?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$full_name, $email, $gender]);

    echo "<p>Record inserted successfully</p>";
}


$sql = "SELECT * FROM students";
$result = $pdo->query($sql);


while ($row = $result->fetch())
{
    echo $row['full_name'] . ", " . $row['email'] . ", " . $row['gender'] . "<br>";
}
?>



