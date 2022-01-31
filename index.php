<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Chat App | CreativeMinds Graphics</title>
	<link rel="stylesheet"  href="style.css">
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>
<body>
	<div class="wrapper">
		<section class="form signup">
			<header>Chat App</header>
			<form action="#" enctype="multipart/form-data">
				<div class="error-txt"></div>
				<div class="name-details">
					<div class="field input">
						<label>First Name</label>
						<input type="text" name="fname" placeholder="First Name" required>
					</div>
					<div class="field input">
						<label>Last Name</label>
						<input type="text" name="lname" placeholder="Last Name" required>
					</div>
					<div class="field input">
						<label>Email Address</label>
						<input type="text" name="email" placeholder="Enter Email" required>
					</div>
					<div class="field input">
						<label>Password</label>
						<input type="password" name="password" placeholder="Enter Password" required>
						<i class="fas fa-eye"></i>
					</div>
					<div class="field image">
						<label>Select Image</label>
						<input type="file" name="image" required>
					</div>
					<div class="field button">
						
						<input type="submit" value="Continue to chat">
					</div>
				</div>
			</form>	
			<div class="link">Already a member? <a href="#">Login now</a></div>		
		</section>
		
	</div>
	<script src="JavaScript/pass-show-hide.js"></script>
	<script src="JavaScript/signup.js"></script>
</body>
</html>