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
    $country = $row["Country"];
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
    <input type="radio" id="male" name="gender" value="M" <?php if ($gender === 'M') echo 'checked'; ?>>
    <label for="male">Male</label><br>
    <input type="radio" id="female" name="gender" value="F" <?php if ($gender === 'F') echo 'checked' ?>>
    <label for="female">Female</label><br>
    <input type="radio" id="other" name="gender" value="O" <?php if ($gender === 'O') echo 'checked' ?> >
    <label for="other">Other</label><br><br>	
    <label for="country">Choose a Country</label><br>
    <select id="country" name="country">
	<option value="Nepal" <?php if ($country === 'Nepal') echo 'selected'; ?>>Nepal</option>
	<option value="India" <?php if ($country === 'India') echo 'selected'; ?>>India</option>
	<option value="China" <?php if ($country === 'China') echo 'selected'; ?>>China</option>
	<option value="USA" <?php if ($country === 'USA') echo 'selected'; ?>>USA</option>
	<option value="Russia" <?php if ($country === 'Russia') echo 'selected'; ?>>Russia</option>
     </select><br><br>    
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
        $country = $_POST['country'];
        $sql = "UPDATE form SET Name='$name', Email='$email', Message='$message', Date='$date', Gender='$gender', Country='$country' WHERE id=$id";
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

