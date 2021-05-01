<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<form action="./sql/save.php" method="POST" onsubmit="return verify(this)">
		<label for=fname>First Name: </label>
		<input type="text" name="fname" id="fname">
		<br><br>
		<label for=l_name>Last Name: </label>
		<input type="text" name="lname" id="lname">
		<br><br>
		<label for=dob>DOB: </label>
		<input type="date" name="dob" id="dob">
		<br><br>
		<label>Gender: </label><br>
		<input type="radio" name="gender" value="male" id="male">
		<label for="male">Male</label><br>
		<input type="radio" name="gender" value="female" id="female">
		<label for="female">Female</label><br>
		<input type="radio" name="gender" value="other" id="other">
		<label for="other">Other</label><br>
		<br><br>
		<label for=email>Email: </label>
		<input type="email" name="email" id="email">
		<br><br>
		<label for=password>Password: </label>
		<input type="password" name="password" id="password">
		<label id="warning"></label>
		<br><br>
		<input type="submit" value="Register">
		<input type="reset">
	</form>
	<script type="text/javascript">
		function verify(arg){
			var element = document.getElementById("password").value;
			console.log(element);
			if(element.length < 8){
				document.getElementById("warning").innerHTML = `Min 8 Chars`;
				return false;
			}
			return true;
		}
	</script>
</body>
</html>