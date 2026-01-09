<?php
// 1. Database Connection
$conn = mysqli_connect("localhost", "root", "", "testdb");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// 2. Insert Data
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];

  $sql = "INSERT INTO students (name, email) VALUES ('$name', '$email')";
  mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Student Registration</title>
</head>
<body>

<h2>Insert Student Data</h2>

<form method="post">
  Name: <br>
  <input type="text" name="name" required><br><br>

  Email: <br>
  <input type="email" name="email" required><br><br>

  <input type="submit" name="submit" value="Insert">
</form>

<hr>

<h2>Student Details</h2>

<?php
// 3. Retrieve Data
$result = mysqli_query($conn, "SELECT * FROM students");

while ($row = mysqli_fetch_assoc($result)) {
  echo "ID: " . $row['id'] . "<br>";
  echo "Name: " . $row['name'] . "<br>";
  echo "Email: " . $row['email'] . "<br><br>";
}

// 4. Close Connection
mysqli_close($conn);
?>

</body>
</html>
 Data base connection
