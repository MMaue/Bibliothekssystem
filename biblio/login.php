<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		echo "here:  ".$password.'---';

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from leser where vorname = '$user_name' limit 1";
			// $result = mysqli_query($con, $query);
			$result = $con->query($query);
			print_r($result);
			echo "---".mysqli_num_rows($result)."---";
			if(mysqli_num_rows($result) > 0)
			{
				$user_data = mysqli_fetch_assoc($result);
				print_r($user_data);
				//Array ( [id] => 8 [vorname] => miguelmmm [name] => name [geburtsdatum] => 2003-06-14 [mail] => mail@gmail.com [mahnungen] => 0 [pwhash] => mypass )
					
				if($user_data['password'] === $password)
				{
					echo "success";
					$_SESSION['user_id'] = $user_data['user_id'];
					header("Location: index.php");
					die;
				}
			}
			
			
			echo "wrong uuusername or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html lang="de">
	<meta charset="utf-8">
	<link href='style.css' rel='stylesheet' type='text/css'>
<head>
	<title>Login</title>
</head>
<header role="banner">
    <div >
        <table border="0">
            <tr>
              <th><a href="https://github.com/MMaue/Bibliothekssystem" aria-label="Homepage ">
  		            <svg height="32" aria-hidden="true" viewBox="0 0 16 16" version="1.1" width="32" data-view-component="true" class="octicon octicon-mark-github v-align-middle">
    		            <path style="fill:#335ECB;" fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
		            </svg>
		        </a>___</th>
              <td><a href="index.php">Index</a></td>
              <td><a href="search.php">Suchen</a></td>
              <td><a href="execsql.php">SQL ausführen</a></td>
              <td><a href="verliehen.php">Verliehen</a></td>
              <td><a href="login.php">History</a></td>
              <td><a href="mahnungen.php">Mahnungen</a></td>
              <td><a href="signup.php">Registrieren</a></td>
              <td><a href="login.php">Einloggen</a></td>
              <td><a href="logout.php">Ausloggen</a></td>
            </tr>
        </table>
    </div>
</header>
<body>
	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>