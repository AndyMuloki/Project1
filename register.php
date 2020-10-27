<!DOCTYPE html>
<html>
<head>
	<title>Personal Details form</title>
	<link rel="stylesheet" type="text/css" href="reg.css">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head>
<body>

	
	<form action="reg.php" method="POST">
		<div class="form_title">Sign Up</div>	

		<div class="form_item">
		
				<!-- The "id" via input type must have the same value as the label "for" value -->			
				<label for ="fullName" class="form_label">Full Name</label>
				<input type="text" class="form_input" name="fName" id="fullName" placeholder="Enter full name">			
			
				<label for ="username" class="form_label">User Name</label>
				<input type="text" class="form_input" name="userName" id="username" placeholder="Enter your username">	
			
				<label for="email_add" class="form_label">Email</label>
				<input type="email" class="form_input" name="email" placeholder="food@example.com">			
			
				<label for="city" class="form_label">City of Residence</label>
				<input type="text" class="form_input" name="city_of_residence" id="city">

				<label for="pword" class="form_label">Password</label>
				<input type="password" class="form_input" name="password">

				<label for="picture" class="form_label">Input your profile photo</label>
				<input type="file" name="pic" id="picture">	
						
		</div>
				<button class="B1" type="submit" name="register">Sign Up</button>
	</form>
</body>
</html>