<?php
include('db.php');
ob_start();
session_start();
$uid=$_SESSION['uid'];
$name=$_SESSION['name'];
$typeid=$_SESSION['typeid'];
$q2="SELECT * FROM user_type WHERE typeid='$typeid'";
$r2=mysqli_query($dbc,$q2);
if($row2=mysqli_fetch_array($r2))
{
$tid=$row2['user_type'];
}
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $c=$_POST['company'];
    $ce=$_POST['company_email'];
    $cp=$_POST['company_phone'];
    $d=$_POST['designation'];
    $a=$_POST['address'];
    $q="INSERT INTO clients (name, email, password, usid,phone,company,company_email,company_phone,designation,address) VALUES ('$name', '$email', '$password', '$uid','$phone','$c','$ce','$cp','$d','$a')";
    $r=mysqli_query($dbc,$q);
    header('Location:manage_client.php');
}
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <title>New Client | CRM</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="css/datepicker3.css" />
    <link type="text/css" rel="stylesheet" href="css/materialadmin.css" />

    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />

    <link type="text/css" rel="stylesheet" href="css/material-design-iconic-font.min.css" />


    <!-- END STYLESHEETS -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5shiv.js"></script>
    <script type="text/javascript" src="js/respond.min.js"></script>
    <![endif]-->
</head>






<body class="menubar-hoverable header-fixed menubar-pin ">
<!-- BEGIN HEADER-->
<header id="header" >



    <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="header-nav-brand" >
                    <div class="brand-holder">
                        <a href="#">
                            <span class="text-lg text-bold text-primary">TEST CRM</span>
                        </a>
                    </div>
                </li>
                <li>
                    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="headerbar-right">

            <ul class="header-nav header-nav-profile">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
					<span class="profile-info" style="margin-top:14px;">
						<?php echo $name;?>
						<?php if(isset($_SESSION['uid']))
{
?>
<small>-<?php echo $tid;?></small>
<?php
}
?>	
				</span>
                    </a>
                    <ul class="dropdown-menu animation-dock">
                        <li><a href="logout.php"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
            </ul><!--end .header-nav-profile -->
        </div><!--end #header-navbar-collapse -->
    </div>
</header>
<!-- END HEADER-->

<!-- BEGIN BASE-->
<div id="base">
<!-- BEGIN OFFCANVAS LEFT -->
<div class="offcanvas">
</div><!--end .offcanvas-->
<!-- END OFFCANVAS LEFT -->

<div id="content">
<section class="style-default-bright">
<div class="section-header">
    <h2 class="text-primary">New Client</h2>
</div>
<form class="form-horizontal" role="form" action="new_client.php" method="POST">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name*</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email*</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password*</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="password" pattern=".{6,}"  required title="6 characters minimum">
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-sm-2 control-label">Phone*</label>
                <div class="col-sm-10">
                    <input type="text" name="phone" class="form-control" id="phone" required>
                </div>
            </div>
            <div class="form-group">
                <label for="company" class="col-sm-2 control-label">Company Name*</label>
                <div class="col-sm-10">
                    <input type="text" name="company" class="form-control" id="company" required>
                </div>
            </div>
            <div class="form-group">
                <label for="company_email" class="col-sm-2 control-label">Company Email*</label>
                <div class="col-sm-10">
                    <input type="email" name="company_email" class="form-control" id="company_email" required>
                </div>
            </div>
            <div class="form-group">
                <label for="company_phone" class="col-sm-2 control-label">Company Phone*</label>
                <div class="col-sm-10">
                    <input type="text" name="company_phone" class="form-control" id="company_phone" required>
                </div>
            </div>
            <div class="form-group">
                <label for="designation" class="col-sm-2 control-label">Designation*</label>
                <div class="col-sm-10">
                    <input type="text" name="designation" class="form-control" id="designation" required>
                </div>
            </div>
            <div class="form-group">
                <label for="Address" class="col-sm-2 control-label">Address*</label>
                <div class="col-sm-10">
                    <textarea  name="address" class="form-control" id="address" required></textarea>
                </div>
            </div>

            <div class="form-group text-right">
                <button name="submit" value="submit" class="btn ink-reaction btn-raised btn-primary">submit</button>
            </div>
        </div>
    </div>
</form>


<!-- BEGIN MENUBAR-->
<div id="menubar" class="menubar-inverse ">
<div class="menubar-fixed-panel">
    <div>
        <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
            <i class="fa fa-bars"></i>
        </a>
    </div>
</div>
<div class="menubar-scroll-panel">
    <!-- BEGIN MAIN MENU -->




    <ul id="main-menu" class="gui-controls">

        <!-- BEGIN EMAIL -->
        <li class="gui-folder">
            <a>
                <div class="gui-icon"><i class="md md-mail"></i></div>
                <span class="title">Chatbox</span>
            </a>
            <!--start submenu -->
            <ul>
                <li><a href="inbox.php" ><span class="title">Inbox</span></a></li>

                <li><a href="sent_mail.php" ><span class="title">Sent</span></a></li>

                <li><a href="compose.php" ><span class="title">Compose</span></a></li>

            </ul><!--end /submenu -->
        </li><!--end /menu-li -->
        <!-- END EMAIL -->

        <!-- BEGIN EMAIL -->
        <li class="gui-folder">
            <a>
                <div class="gui-icon"><i class="md md-account-circle"></i></div>
                <span class="title">Clients</span>
            </a>
            <!--start submenu -->
            <ul>
                <li><a href="new_client.php" ><span class="title">New Client</span></a></li>

                <li><a href="manage_client.php" ><span class="title">Manage Client</span></a></li>

            </ul><!--end /submenu -->
        </li><!--end /menu-li -->
        <!-- END EMAIL -->

        <!-- BEGIN EMAIL -->
        <li class="gui-folder">
            <a>
                <div class="gui-icon"><i class="md md-wallet-travel"></i></div>
                <span class="title">Projects</span>
            </a>
            <!--start submenu -->
            <ul>
                <li><a href="new_project.php" ><span class="title">New Project</span></a></li>

                <li><a href="projects_list.php" ><span class="title">Projects List</span></a></li>

            </ul><!--end /submenu -->
        </li><!--end /menu-li -->
        <!-- END EMAIL -->

        <!-- BEGIN EMAIL -->
        <li class="gui-folder">
            <a>
                <div class="gui-icon"><i class="md md-person"></i></div>
                <span class="title">Users</span>
            </a>
            <!--start submenu -->
            <ul>
                <li><a href="new_user.php" ><span class="title">New User</span></a></li>

                <li><a href="user_list.php" ><span class="title">User  List</span></a></li>

            </ul><!--end /submenu -->
        </li><!--end /menu-li -->
        <!-- END EMAIL -->



        <!-- BEGIN EMAIL -->
        <li class="gui-folder">
            <a href="logout.php">
                <div class="gui-icon"><i class="md md-person"></i></div>
                <span class="title">Logout</span>
            </a>
        </li><!--end /menu-li -->
        <!-- END EMAIL -->


    </ul><!--end .main-menu -->
    <!-- END MAIN MENU -->

    <div class="menubar-foot-panel">
        <small class="no-linebreak hidden-folded">
            <span class="opacity-75">Copyright &copy; 2017</span> <strong></strong>
        </small>
    </div>
</div><!--end .menubar-scroll-panel-->
</div><!--end #menubar-->
<!-- END MENUBAR -->


</div><!--end #base-->
<!-- END BASE -->


<!-- BEGIN JAVASCRIPT -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/spin.min.js"></script>
<script src="js/jquery.autosize.min.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/bootstrap-tagsinput.min.js"></script>
<script src="js/jquery.multi-select.js"></script>
<script src="js/jquery.inputmask.bundle.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/bootstrap-colorpicker.min.js"></script>
<script src="js/typeahead.bundle.min.js"></script>
<script src="js/dropzone.min.js"></script>
<script src="js/jquery.nanoscroller.min.js"></script>
<script src="js/63d0445130d69b2868a8d28c93309746.js"></script>
<script src="js/Demo.js"></script>
<script src="js/DemoFormComponents.js"></script>



<!-- END JAVASCRIPT -->



</body>
</html>