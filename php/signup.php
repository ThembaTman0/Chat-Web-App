<?php
// DATABASE stores user_id, unique_id, fname, lname, email, password, img, status	
	session_start();
	include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

	if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
		// ChECK if user EMAIl is valid or not
		if(filter_var($email,FILTER_VALIDATE_EMAIL)){//if email is valid
			// CHECK if email already exists in the database
			$sql=mysqli_query($conn,"SELECT email FROM users WHERE email='{$email}'");
			if(mysqli_num_rows($sql)>0){// if email already exist
				echo "$email - This email already exist!";

			}else{
				if(isset($_FILES['image'])){//if file is uploaded
					$img_name=$_FILES['image']['name'];//get user uploaded img name
					$tmp_name=$_FILES['image']['tmp_name'];//this tempory name is used to save/move file in our folder

					// let's explode image and get the last extension like jpg png
					$img_explode=explode('.', $img_name);
					$img_ext=end($img_explode); //here we get the extension of an img file

					$extensions=['png','jpeg','jpg'];//we store these in array

					if(in_array($img_ext,$extensions)===true){// if user uploaded img ext is matched with an array extension
						$time=time();//get current time to rename the imported images(always has unique names) before storing the img into folder
						$new_img_name=$time.$img_name;
						if (move_uploaded_file($tmp_name, "images/".$new_img_name)) {//if user uploads img move to our folder successfully
							$status="Active now";
							$random_id=rand(time(),10000000);
							// INSERT all user data into Table
							$sql2=mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
												VALUES({$random_id}, '{$fname}','{$lname}','{$email}','{$password}','{$new_img_name}','{$status}')");
							if ($sql2) {// if these data inserted
								$sql3=mysqli_query($conn,"SELECT * FROM users WHERE email ='{$email}'");
								if(mysqli_num_rows($sql3)>0){
									$row=mysqli_fetch_assoc($sql3);
									$_SESSION['unique_id']=$row['unique_id'];
									echo "success";
								}
							}else{
								echo "Something wnet wrong!";
							}
						}
						

					}else{
						echo "Please select an Image file - png, jpeg, or jpg";
					}
				}else{
					echo "Please select an Image file!";
				}

			}


		}else{
			echo "$email - This is not a valid email!";
		}
	}else{
		echo "All input field are required";
	}
?>