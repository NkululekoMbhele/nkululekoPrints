<?php

require_once('../class.user.php');
$user = new USER();

if (isset($_POST['btn-signup'])) {
	$uname = strip_tags($_POST['txt_uname']);
	$umail = strip_tags($_POST['txt_umail']);
	$upass = strip_tags($_POST['txt_upass']);


	if ($uname == "") {
		$error[] = "<b><font color='red'>provide username !</font></b>";
	} else if ($umail == "") {
		$error[] = "<b><font color='red'>provide email id !";
	} else if (!filter_var($umail, FILTER_VALIDATE_EMAIL)) {  // name@example.com
		$error[] = "<b><font color='red'>Please enter a valid email address !</font></b>";
	} else if ($upass == "") {
		$error[] = "<b><font color='red'>provide password !</font></b>";
	} else if (strlen($upass) < 6) {
		$error[] = "<b><font color='red'>Password must be atleast 6 characters</font></b>";
	} else {
		try {
			$stmt = $user->runQuery("SELECT user_name, user_email FROM users WHERE user_name=:uname OR user_email=:umail");
			$stmt->execute(array(':uname' => $uname, ':umail' => $umail));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($row['user_name'] == $uname) {
				$error[] = "<b><font color='red'>sorry username already taken !</font></b>";
			} else if ($row['user_email'] == $umail) {
				$error[] = "<b><font color='red'>sorry email id already taken !</font></b>";
			} else {
				if ($user->register($uname, $umail, $upass)) {
					$user->redirect('sign-up.php?joined');
				}
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}

?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PDO : Sign up</title>
</head>

<style>
body {
    background-color: #001d3d;
}

#adminAdd {
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

#adminAdd h1 {
    text-transform: uppercase;
    font-size: 5rem;
    color: #fff;
    opacity: .8;
    margin-bottom: 15px;
}

#adminAdd p a {
    color: #FFD200;
    font-weight: 500;
}

#adminAdd p {
    color: #fff;
    margin-bottom: 20px;
    margin-top: 10px;
}

.addUserForm {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}


.addUserForm input {
    display: block;
    border-radius: 3px;
    width: 400px;
    padding: 10px;
    margin: 20px 0;
    outline: none;
    font-size: 1.2rem;
    color: #000;
    position: relative;
    left: 50%;
    right: 50%;
    transform: translateX(-50%);
}

.addUserForm textarea {
    display: block;
    border-radius: 3px;
    width: 400px;
    padding: 10px;
    margin: 20px 0;
    outline: none;
    font-size: 1.2rem;
    color: #000;
    position: relative;
    left: 50%;
    right: 50%;
    transform: translateX(-50%);
}

.button {
    width: 60px;
    background-color: #FFD200;
    border: none;
    color: #fff;
    border-radius: 3px;
    cursor: pointer;
}
</style>

<body>

    <div id="adminAdd">


        <form class="addUserForm" method="post">
            <h1>Add User</h1>
            <?php
			if (isset($error)) {
				foreach ($error as $error) {
			?>
            <div class="alert alert-danger">
                <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
            </div>
            <?php
				}
			} else if (isset($_GET['joined'])) {
				?>
            <div class="alert alert-info">
                <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='login.php'>login</a>
                here
            </div>
            <?php
			}
			?>

            <input type="text" class="form-control" name="txt_uname" placeholder="Username" value="<?php if (isset($error)) {
																										echo $uname;
																									} ?>" />


            <input type="text" class="form-control" name="txt_umail" placeholder="Email" value="<?php if (isset($error)) {
																									echo $umail;
																								} ?>" />


            <input type="password" class="form-control" name="txt_upass" placeholder="Password" />


            <input value="SIGN UP" type="submit" class="button" name="btn-signup">


            <p>Have an account ! <a href="login.php">SIGN IN</a></p>
        </form>


    </div>

</body>

</html>