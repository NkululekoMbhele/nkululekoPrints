<?php

require_once("../session.php");

require_once("../class.user.php");
$auth_user = new USER();


$user_id = $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id" => $user_id));

$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
$id = $userRow['user_id'];
if ($id == 1) {
} else {
	header("location: ../member/home.php");
}

if (!$_SESSION['user_session']) {

	header("location: ../login/denied.php");
}

?>

<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Add New Product</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css" />

</head>
<style>
#main2 {
    display: flex;
    width: 100%;

    align-items: center;
    flex-direction: column;
    background-color: #001d3d;
    padding-bottom: 30px;
    height: 100vh;
    padding-top: 50px;
}

#main2 h1 {
    text-transform: uppercase;
    font-size: 2rem;
    color: #fff;
    margin-bottom: 30px;
}

#main2 p a {
    color: #FFD200;
    font-weight: 500;
}

#main2 p {
    color: #fff;
    margin-bottom: 20px;
    margin-top: 10px;
}


.login-form input {
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

.login-form textarea {
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

#login-button {
    width: 150px;
    padding: 5px 10px;
    background-color: #FFD200;
    border: none;
    color: #fff;
    border-radius: 3px;
    cursor: pointer;
}
</style>

<body>

    <div id="main2">
        <form class="login-form" method='post' action="create.php" enctype="multipart/form-data">

            <table class='table table-bordered'>

                <tr>
                    <td colspan="2">
                        <h1> Add New Product</h1>
                    </td>
                </tr>


                <tr>
                    <td>Product Image</td>
                    <td> <input type="file" name="fileToUpload" id="fileToUpload"></td>
                </tr>



                <tr>
                    <td>Name</td>
                    <td><input type='text' name='name' placeholder='' required /></td>
                </tr>

                <input type='hidden' name='cdate' value="<?php echo date('Y-m-d'); ?>" class='form-control'
                    placeholder=''>


                <tr>
                    <td>Description</td>
                    <td><textarea type='text' name='des' placeholder='Add Description'></textarea></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type='text' name='pr' class='form-control' placeholder='Add Price'>
                </tr>




                <tr>
                    <td></td>
                    <td>
                        <button type="submit" id="login-button" class="button">
                            ADD PRODUCT
                        </button>
                    </td>
                </tr>

            </table>
        </form>

    </div>

    </div>
</body>

</html>