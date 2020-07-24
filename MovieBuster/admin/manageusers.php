<?php
// Start the session
session_start();
include '../connect.php';   

if (!isset($_SESSION['uname'])) {
    $_SESSION['login_error_msg'] = "Please Login First!!";
    header('location:index.php');
}

// echo $_SESSION['uname'];

$sql = "select name from user_details where email_id='".$_SESSION['uname']."'";
$result = mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title>Movie-Buster Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../files/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="../files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/feather/css/feather.css">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="../files/assets/css/font-awesome-n.min.css">
    <!-- Chartlist chart css -->
    <link rel="stylesheet" href="../files/bower_components/chartist/css/chartist.css" type="text/css" media="all">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/css/widget.css">
</head>


<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>
    <!-- [ Pre-loader ] end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <!-- [ Header ] start -->
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a href="home.php">
                            <span style="font-size: 1.5em;color: #fdcc52">Movie Buster</span>
                        </a>
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu icon-toggle-right"></i>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close">
                                        <i class="feather icon-x input-group-text"></i>
                                    </span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn">
                                        <i class="feather icon-search input-group-text"></i>
                                    </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">

                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="../files/assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                        <?php 
                                            while($row = mysqli_fetch_assoc($result)) {
                                         ?>
                                        <span><?php echo $row['name']; ?></span>
                                        <?php } ?>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="auth-sign-in-social.php">
                                            <i class="feather icon-log-out"></i> Logout

                                        </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!-- [ navigation menu ] start -->
                    <nav class="pcoded-navbar">
                        <div class="nav-list">
                            <div class="pcoded-inner-navbar main-menu">
                                <div class="pcoded-navigation-label">Main Menu</div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="">
                                        <a href="home.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                            <span class="pcoded-mtext">Dashboard</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-trigger active ">
                                        <a href="manageusers.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-hash"></i>
                                            </span>
                                            <span class="pcoded-mtext">ManageUsers</span>
                                        </a>
                                    </li>
                                    <li class=" ">
                                        <a href="managemovies.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-hash"></i>
                                            </span>
                                            <span class="pcoded-mtext">ManageMovies</span>
                                        </a>
                                    </li>
                                    <li class=" ">
                                        <a href="add_movie.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-clipboard"></i>
                                            </span>
                                            <span class="pcoded-mtext">AddMovie</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="edit_user.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-clipboard"></i>
                                            </span>
                                            <span class="pcoded-mtext">EditUser</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="edit_movie.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-clipboard"></i>
                                            </span>
                                            <span class="pcoded-mtext">EditMovies</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- [ navigation menu ] end -->
                    <div class="pcoded-content">
                        <!-- [ breadcrumb ] start -->
                        <div class="page-header card">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="feather icon-layers bg-c-blue"></i>
                                        <div class="d-inline">
                                            <h5>User Data</h5>
                                            <span>Here You Can Manage User And It's Information</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="home.php"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">ManageUsers</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">

                                            <!-- Customer overview start -->
                                            <div class="col-md-12">
                                                <div class="card table-card">
                                                    <div class="card-header">
                                                        <h5>Users Data</h5>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                                                <li><i class="feather icon-refresh-cw reload-card"></i></li>
                                                                <li><i class="feather icon-trash close-card"></i></li>
                                                                <li><i class="feather icon-chevron-left open-card-option"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover m-b-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sr No.</th>
                                                                        <th>User Name</th>
                                                                        <th>Email</th>
                                                                        <th>Password</th>
                                                                        <th>History</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                                        $sql1 = "SELECT user_id,name,email_id,password,history FROM user_details";
                                                                        $result1 = mysqli_query($conn, $sql1);
                                                                        $count =0;
                                                                        while($row1 = mysqli_fetch_assoc($result1)) {
                                                                     ?>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>
                                                                            <div class="d-inline-block align-middle">
                                                                                <div class="d-inline-block">
                                                                                    <h6><?php echo $row1['name']; ?></h6>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td><?php echo $row1['email_id']; ?></td>
                                                                        <td><?php echo $row1['password']; ?></td>
                                                                        <td><?php echo $row1['history']; ?></td>
                                                                        <td><a <?php echo "href='edit_user.php?id=".$row1['user_id']."'" ?>><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a><a <?php echo "href='delete_user.php?id=".$row1['user_id']."' onclick='return confirmDelete()'" ?>><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a></td>
                                                                    </tr>
                                                                     <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Customer overview end -->
                                            <script type="text/javascript">
                                                function confirmDelete() {
                                                    var txt;
                                                    var r = confirm("Are You Sure?");
                                                    if (r == true) {
                                                      return true;
                                                    } else {
                                                      return false;
                                                    }  
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Page-body end -->
                        </div>
                    </div>
                </div>
                <!-- [ style Customizer ] start -->
                <div id="styleSelector">
                </div>
                <!-- [ style Customizer ] end -->
            </div>
        </div>
    </div>
    <!-- Required Jquery -->
    <script data-cfasync="false" src="js/email-decode.min.js"></script><script type="2b7a769bd9693924b478f7c7-text/javascript" src="../files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="2b7a769bd9693924b478f7c7-text/javascript" src="../files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="2b7a769bd9693924b478f7c7-text/javascript" src="../files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="2b7a769bd9693924b478f7c7-text/javascript" src="../files/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- waves js -->
    <script src="../files/assets/pages/waves/js/waves.min.js" type="2b7a769bd9693924b478f7c7-text/javascript"></script>
    <!-- jquery slimscroll js -->
    <script type="2b7a769bd9693924b478f7c7-text/javascript" src="../files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- Float Chart js -->
    <script src="../files/assets/pages/chart/float/jquery.flot.js" type="2b7a769bd9693924b478f7c7-text/javascript"></script>
    <script src="../files/assets/pages/chart/float/jquery.flot.categories.js" type="2b7a769bd9693924b478f7c7-text/javascript"></script>
    <script src="../files/assets/pages/chart/float/curvedLines.js" type="2b7a769bd9693924b478f7c7-text/javascript"></script>
    <script src="../files/assets/pages/chart/float/jquery.flot.tooltip.min.js" type="2b7a769bd9693924b478f7c7-text/javascript"></script>
    <!-- todo js -->
    <script type="2b7a769bd9693924b478f7c7-text/javascript" src="../files/assets/pages/todo/todo.js"></script>
    <!-- Google map js -->
    <script src="../../../../developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js" type="2b7a769bd9693924b478f7c7-text/javascript"></script>
    <script type="2b7a769bd9693924b478f7c7-text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="2b7a769bd9693924b478f7c7-text/javascript" src="../files/assets/pages/google-maps/gmaps.js"></script>
    <!-- Custom js -->
    <script src="../files/assets/js/pcoded.min.js" type="2b7a769bd9693924b478f7c7-text/javascript"></script>
    <script src="../files/assets/js/vertical/vertical-layout.min.js" type="2b7a769bd9693924b478f7c7-text/javascript"></script>
    <script type="2b7a769bd9693924b478f7c7-text/javascript" src="../files/assets/pages/widget/widget-data.js"></script>
    <script type="2b7a769bd9693924b478f7c7-text/javascript" src="../files/assets/js/script.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="js/google-js.js" type="2b7a769bd9693924b478f7c7-text/javascript"></script>
<script type="2b7a769bd9693924b478f7c7-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="js/rocket-loader.min.js" data-cf-settings="2b7a769bd9693924b478f7c7-|49" defer=""></script></body>

<?php
mysqli_close($conn); 
?>
</html>
