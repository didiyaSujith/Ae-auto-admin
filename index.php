<?php include 'dbconnection.php';

session_start();

if(isset($_SESSION['login_id']))
{
    header("location: dashboard");
}

if(isset($_POST['btnSignIn']))
{
    $username  = mysqli_real_escape_string($con, $_POST['username']);
    $password  = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = mysqli_query($con, "SELECT * FROM `tbl_login` WHERE username = '$username' AND password = '$password' AND role ='0'");

    if(mysqli_num_rows($login_query) > 0)
    {
        $login_data = mysqli_fetch_assoc($login_query);
    

        $_SESSION['login_id']   = $login_data['login_id'];
        $_SESSION['login_role'] = $login_data['role']; 

        header("location: dashboard");
    }

    else
    {
        $_SESSION['login_error'] = "Invalid username or password!";

        header("location: index");
    }

}

 ?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Login</title>

<?php include 'includes/header_css.php'; ?>

</head>
<body class="login-page">
    
    <div class="page-container">
        <div class="login-branding">
            <h3><a href="index.php">ADMIN PANEL</a></h3>
        </div>
        <div class="login-container">
            <h4>AE AUTO</h4>
            <img class="login-img-card" src="images/avatar/jaman-01.png" alt="login thumb" />
            <form method="post" class="form-signin">
                <input type="text" id="username" onkeyup="clearErr('unameErr');" name="username" class="form-control floatlabel" placeholder="Username" autofocus >
                <span style="color: red;" id="unameErr"></span>
                <input type="password" id="password" onkeyup="clearErr('pwordErr');" name="password" class="form-control floatlabel" placeholder="Password">
                <span style="color: red;" id="pwordErr"></span>

                 
                <button name="btnSignIn" onclick="return login_validation();" class="btn btn-primary btn-block btn-signin" type="submit">Sign In</button>

                <?php if(isset($_SESSION['login_error'])) { ?>
                    <br>
                <span style="color: red;"><?php echo $_SESSION['login_error']; ?></span>
                <?php } ?>
            </form>

             
        </div>         

    </div>

    <?php include 'includes/scripts.php'; ?>

    <script type="text/javascript">
        function login_validation()
        {
            var username = jQuery("#username").val().trim();
            var password = jQuery("#password").val().trim();

            if(username=="")
            {                 
                jQuery("#unameErr").html("Username required!");

                return false;
            }

            if(password=="")
            {
                jQuery("#pwordErr").html("Password required!");
                return false;
            }
             
        }

        function clearErr(span)
        {
            jQuery('span').html("");

        }        
    </script>

</body>
</html>