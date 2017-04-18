<?php
include('db.php');
ob_start();
session_start();

function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

if (isset($_POST['login'])) {
    $email = sanitizeInput($_POST['email']);
    $password = sanitizeInput($_POST['password']);
    $type1 = $_POST['type1'];
    if ($type1 == 4) {

        $query1 = "SELECT * FROM clients WHERE email ='$email' AND password = '$password'";
        $result1 = mysqli_query($dbc, $query1);
        $_SESSION = mysqli_fetch_array($result1, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result1);
        if ($count == 1) {
            header('Location: user_list.php');
        } else {
            header('Location: index.php?error=1');
        }
    } else {
        $query1 = "SELECT * FROM users WHERE email ='$email' AND password = '$password' AND typeid = '$type1'";
        $result1 = mysqli_query($dbc, $query1);
        $_SESSION = mysqli_fetch_array($result1, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result1);
        if ($count == 1) {

            header('Location: new_user.php');
        } else {
            header('Location: index.php?error=1');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRM - Login</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet'
          type='text/css'/>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>

    <link type="text/css" rel="stylesheet" href="css/materialadmin.css"/>

    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css"/>

    <link type="text/css" rel="stylesheet" href="css/material-design-iconic-font.min.css"/>


    <!-- END STYLESHEETS -->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5shiv.js"></script>
    <script type="text/javascript" src="js/respond.min.js"></script>
    <![endif]-->
</head>


<body class="menubar-hoverable header-fixed ">

<!-- BEGIN LOGIN SECTION -->
<section class="section-account">
    <div class="img-backdrop" style="background-image: url('img/img16.jpg')"></div>
    <div class="spacer"></div>
    <div class="card contain-sm style-transparent">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <br/>
                    <h2 style="padding-left: 270px;">Mavericks CRM !</h2><br/><br/><br/>
                    <span class="text-lg text-primary" style="color : #2B323A; padding-left: 233px;">Sign in to start your session</span>
                    <br/><br/>
                    <form class="form floating-label" action="index.php" accept-charset="utf-8" method="post">
                        <div class="form-group">
                            <select id="type1" name="type1" class="form-control" required>
                                <option value="">&nbsp;</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                                <!--				<option value="4">Client</option>-->
                            </select>
                            <label for="usertype">Type</label>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" required>
                            <label for="password">Password</label>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-xs-6 text-right">
                                <input type="submit" class="btn btn-primary btn-raised" name="login" id="login"
                                       style="background-color : #2B323A; border-color : #2B323A;" Value="Login"/>

                                <a href="askemail.php">forgot password</a>
                            </div><!--end .col -->
                        </div><!--end .row -->
                    </form>
                </div><!--end .col -->

            </div><!--end .row -->
        </div><!--end .card-body -->
    </div><!--end .card -->
</section>
<!-- END LOGIN SECTION -->


<!-- BEGIN JAVASCRIPT -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/spin.min.js"></script>
<script src="js/jquery.autosize.min.js"></script>
<script src="js/jquery.nanoscroller.min.js"></script>
<script src="js/63d0445130d69b2868a8d28c93309746.js"></script>
<script src="js/Demo.js"></script>


<!-- END JAVASCRIPT -->


</body>
</html>