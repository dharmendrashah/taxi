<?php
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">
	
	<div id="main-wrapper">
		<center>
			<h2>Registration Form</h2>
			<img src="imgs/avatar.png" class="avatar"/>
		</center>
	
		<form class="myform" action="register.php"method="post">
		<input name="username" type ="text" class="inputvalues" placeholder="type your unique username" required/></br>
			<input name="name" type="text" class="inputvalues" placeholder="Type your Full Name" required/><br>
			
			<input name="phone_no" type="number" class="inputvalues" placeholder="Type your phone no." required/><br>
			<input name="email_id" type="text" class="inputvalues" placeholder="Type your email-id" /><br>
			<input name="home" type="text" class="inputvalues" placeholder="Type your Address" required/><br>
			<input name="district" type="text" class="inputvalues" placeholder="Type your District" required/><br>
			<input name="state" type="text" class="inputvalues" placeholder="Type your state" required/><br>
			<label><b>Country</b></label>
			<select class="qualification" name="country">
			  <option value="india">india</option>
			  <option value="usa">USA</option>
			  <option value="china">china</option>
			  <option value="russia">russia</option>
			</select><br>
			<input name="taxi_no" type="text" class="inputvalues" placeholder="Type your taxi no." required/><br/>
			
			
			<input name="password" type="password" class="inputvalues" placeholder="Your password" required/><br>
			<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br>
			<label><b>Driving licence valid till</b></label>
			<input name="valid_lic" type="date" class="inputvalues" placeholder="" required/><br>

			<input name="submit_btn" type="submit" id="signup_btn" value="submit"/><br>
			<a href="index.php"><input type="button" id="back_btn" value="Back"/></a>
		</form>
		
		<?php
			if(isset($_POST['submit_btn'])
			)
			{
				//echo '<script type="text/javascript"> alert("Sign Up button clicked") </script>';
				@$username = $_post['username'];
				@$name =$_POST['name'];
				
				@$phone_no = $_POST['phone_no'];
				@$email_id = $_POST['email_id'];
				@$home = $_POST['home'];
				@$district = $_POST['district'];
				@$state = $_POST['state'];
				@$country = $_POST['country'];
				@$taxi_no = $_post['taxi_no'];
				
				@$password = $_POST['password'];
				@$cpassword = $_post['cpassword'];
				@$valid_lic = $_post['valid_lic'];


				//echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
				//echo '<script type="text/javascript"> alert("'.$username.'<br/>'.$name.' <br/>'.$phone_no.' <br/> '.$email_id.' <br/> '.$home.' <br/> '
				//.$district.'<br/>'.$state.'<br/>'.$country.'<br/>'.$taxi_no.'<br/>'.$valid_lic.'"  ) </script>';

				if($password==$cpassword)
				{
					$query= "select * from driver where username='$username'";
					$query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
						// there is already a user with the same username
						echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
					}
					else
					{
						$query= "insert into driver values(',','$username','$name','$phone_no','$email_id','$home','$district','$state','$country','$taxi_no','$password','$valid_lic')";
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login") </script>';
						}
						else
						{
							echo '<script type="text/javascript"> alert("'.mysqli_error($con).'") </script>';
						}
					}
					
					
				}
				else{
				echo '<script type="text/javascript"> alert("error!") </script>';	
				}
				
				
				
				
			}
		?>
	</div>
</body>
</html>