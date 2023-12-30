<?php
include 'connection.php';
$id = $_GET['id'];
$sql = "SELECT * FROM form WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['Name'];
    $email = $row['Email'];
    $message = $row['Message'];
    $date = $row['Date'];
    $gender = $row['Gender'];
} else {
    echo "No record found";
}
$conn->close();
?>

<form action="" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br><br>
    
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="<?php echo $email; ?>"><br><br>
    
    <label for="message">Message:</label>
    <input type="text" id="message" name="message" value="<?php echo $message; ?>"><br><br>
    
    <label for="date">Date</label>
    <input type="date" id="date" name="date" value="<?php echo $date; ?>"><br><br>
    
    <label>Gender</label><br>
    <input type="radio" id="male" name="gender" value="M" checked>
    <label for="male">Male</label><br>
    <input type="radio" id="female" name="gender" value="F">
    <label for="female">Female</label><br>
    <input type="radio" id="other" name="gender" value="O">
    <label for="other">Other</label><br><br>	
    
    <input type="submit" value="Update" name="update">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connection.php';
    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $date = $_POST['date'];
        $gender = $_POST['gender'];
        $sql = "UPDATE form SET Name='$name', Email='$email', Message='$message', Date='$date', Gender='$gender' WHERE id=$id";
	if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header("Location: process.php");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    $conn->close();
}
?>

