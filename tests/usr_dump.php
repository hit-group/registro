<!DOCTYPE html>
<html>
<body>

<?php
require_once 'db_credentials.php';

// Create connection
$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
      echo '<table border="1px solid black">';

      echo "<tr>";
      echo "<th>Nome</th><th>Cognome</th><th>Classe</th><th>username</th><th>email</th>";
      echo "</tr>";

     while($row = $result->fetch_assoc()) {
       echo "<tr>";
       echo "<td>". $row["nome"]. "</td><td>". $row["cognome"]. "</td><td>". $row["classe"]. "</td><td>" . $row["username"] . "</td><td>". $row["email"] ."</td>";
       echo "</tr>";
     }

     echo "</table>";

} else {
     echo "0 results";
}

$conn->close();
?>

</body>
</html>
