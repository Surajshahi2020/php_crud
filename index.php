<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD operation</title>
</head>
<body>
	<h1>User Information Form</h1>
	<form action="process.php" method="post">
	<label for="name">Name</label><br>
	<input type="text" id="name" name="name" required><br><br>
	<label for="email">Email</label><br>
	<input type="email" id="email" name="email" required><br><br>
	<label for="message">Message</label><br>
	<textarea type="text" id="message" name="message" rows="4" cols="50" required></textarea><br><br>
	<label for="date">Date</label><br>
	<input type="date" id="date" name="date" required><br><br>
	 <label>Gender</label><br>
	 <input type="radio" id="male" name="gender" value="M" checked>
	 <label for="male">Male</label><br>
	 <input type="radio" id="female" name="gender" value="F">
	 <label for="female">Female</label><br>
	 <input type="radio" id="other" name="gender" value="O">
	 <label for="other">Other</label><br><br>
	 <label for="country">Choose a Country</label><br>
	 <select id="country" name="country">
	 	<option value="Nepal" selected>Nepal</option>
	 	<option value="India">India</option>
	 	<option value="China">China</option>
	 	<option value="USA">USA</option>
	 	<option value="Russia">Russia</option>
	 </select><br><br>
	<input type="submit" value="Submit">
	</form>
</body>
</html>

