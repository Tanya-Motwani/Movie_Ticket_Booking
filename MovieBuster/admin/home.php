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
                                            <a href="logout.php">
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
                                    <li class="active pcoded-trigger">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
            								<span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                            <span class="pcoded-mtext">Dashboard</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class=" ">
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
                                        <i class="feather icon-home bg-c-blue"></i>
                                        <div class="d-inline">
                                            <h5>Dashboard</h5>
                                            <span>Welcome Admin</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="home.php"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Dashboard</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <!-- [ page content ] start -->
                                        <div class="row">
                                            <!-- sale 2 card start -->
                                            <div class="col-md-12 col-xl-4">
                                                <div class="card card-blue text-white">
                                                    <div class="card-block p-b-0">
                                                        <div class="row m-b-50">
                                                            <div class="col">
                                                                <h6 class="m-b-5">Sales In April</h6>
                                                                <h5 class="m-b-0 f-w-700">₹26655.00</h5>
                                                            </div>
                                                            <div class="col-auto text-center">
                                                                <p class="m-b-5">Direct Sale</p>
                                                                <h6 class="m-b-0">₹17608</h6>
                                                            </div>

                                                            <div class="col-auto text-center">
                                                                <p class="m-b-5">Referal</p>
                                                                <h6 class="m-b-0">₹8972</h6>
                                                            </div>
                                                        </div>

                                                        <div id="sec-ecommerce-chart-line" class="" style="height:60px"></div>
                                                        <div id="sec-ecommerce-chart-bar" style="height:195px"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-12">
                                                <div class="card latest-update-card">
                                                    <div class="card-header">
                                                        <h5>OnGoing Movies</h5>
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
                                                        <div class="scroll-widget">
                                                            <?php 
                                                                $sql1 = "SELECT movie_name,movie_lang,photo FROM movie_details";
                                                                $result1 = mysqli_query($conn, $sql1);
                                                             ?>
                                                            <div class="latest-update-box">
                                                                <?php
                                                                while($row1 = mysqli_fetch_assoc($result1)) {
                                                                ?>
                                                                <div class="row p-t-20 p-b-30">
                                                                    <div class="col-auto text-right update-meta p-r-0">
                                                                        <img <?php echo "src='img/".$row1['photo']."'" ?> alt="user image" class="img-radius img-40 align-top m-r-15 update-icon">
                                                                    </div>
                                                                    <div class="col p-l-5">
                                                                        <a href="#!"><h6><?php echo $row1['movie_name']; ?></h6></a>
                                                                        <p class="text-muted m-b-0"><?php echo $row1['movie_lang']; ?>  </p>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="card latest-update-card">
                                                    <div class="card-header">
                                                        <h5>UpComing Movies</h5>
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
                                                        <div class="scroll-widget">
                                                            <div class="latest-update-box">
                                                                <div class="row p-t-20 p-b-30">
                                                                    <div class="col-auto text-right update-meta p-r-0">
                                                                        <img src="img/movie7.jpg" alt="user image" class="img-radius img-40 align-top m-r-15 update-icon">
                                                                    </div>
                                                                    <div class="col p-l-5">
                                                                        <a href="#!"><h6>Avengers: Endgame</h6></a>
                                                                        <p class="text-muted m-b-0">Fantasy/Science Fiction ‧ 3h 1m</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row p-b-30">
                                                                    <div class="col-auto text-right update-meta p-r-0">
                                                                        <img src="img/movie8.jpg" alt="user image" class="img-radius img-40 align-top m-r-15 update-icon">
                                                                    </div>
                                                                    <div class="col p-l-5">
                                                                        <a href="#!"><h6>Pokémon: Detective Pikachu</h6></a>
                                                                        <p class="text-muted m-b-0">Fantasy/Mystery ‧ 1h 44m</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row p-b-30">
                                                                    <div class="col-auto text-right update-meta p-r-0"><img src="img/movie9.jpg" alt="user image" class="img-radius img-40 align-top m-r-15 update-icon">
                                                                    </div>
                                                                    <div class="col p-l-5">
                                                                        <a href="#!"><h6>Student of the Year 2</h6></a>
                                                                        <p class="text-muted m-b-0">2019 ‧ Drama/Romance</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row p-b-30">
                                                                    <div class="col-auto text-right update-meta p-r-0">
                                                                        <img src="img/movie10.jpg" alt="user image" class="img-radius img-40 align-top m-r-15 update-icon">
                                                                    </div>
                                                                    <div class="col p-l-5">
                                                                        <a href="#!"><h6>The Hustle</h6></a>
                                                                        <p class="text-muted m-b-0">2019 ‧ Comedy ‧ 1h 34m</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row p-b-30">
                                                                    <div class="col-auto text-right update-meta p-r-0">
                                                                        <img src="img/movie11.jpg" alt="user image" class="img-radius img-40 align-top m-r-15 update-icon">
                                                                    </div>
                                                                    <div class="col p-l-5">
                                                                        <a href="#!"><h6>2019 ‧ Comedy ‧ 1h 34m</h6></a>
                                                                        <p class="text-muted m-b-0">Thriller/Mystery ‧ 2h 23m</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-auto text-right update-meta p-r-0">
                                                                        <img src="img/movie12.jpg" alt="user image" class="img-radius img-40 align-top m-r-15 update-icon">
                                                                    </div>
                                                                    <div class="col p-l-5">
                                                                        <a href="#!"><h6>De De Pyaar De</h6></a>
                                                                        <p class="text-muted m-b-0">Romance/Comedy ‧ 2h 30m</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- sale 2 card end -->

                                            <!-- testimonial and top selling start -->
                                            <div class="col-md-12">
                                                <div class="card table-card">
                                                    <div class="card-header">
                                                        <h5>In Theater</h5>
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
                                                    <div class="card-block p-b-0">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover m-b-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Language</th>
                                                                        <th>Theater</th>
                                                                        <th>Status</th>
                                                                        <th>Rating</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                                        $sql3 = "SELECT movie_name,movie_lang,theater_name,rating,seat_booked from movie_details";
                                                                        $result3 = mysqli_query($conn, $sql3);
                                                                        while($row3 = mysqli_fetch_assoc($result3)) {
                                                                     ?>
                                                                    <tr>
                                                                        <td><?php echo $row3['movie_name']; ?></td>
                                                                        <td><?php echo $row3['movie_lang']; ?></td>
                                                                        <td><?php echo $row3['theater_name']; ?></td>
                                                                        <td><?php 
                                                                        if ($row3['seat_booked']<50){
                                                                            echo "<label class='label label-success'>Available</label>";
                                                                        }
                                                                        else {
                                                                            echo "<label class='label label-danger'>Sold Out</label>";   
                                                                        } ?></td>
                                                                        <td>
                                                                            <?php echo $row3['rating']; ?>
                                                                            <!-- <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                                            <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                                            <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                                            <a href="#!"><i class="fa fa-star f-12 text-default"></i></a>
                                                                            <a href="#!"><i class="fa fa-star f-12 text-default"></i></a> -->
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- testimonial and top selling end -->



                                            <!-- lettest acivity and statustic card start -->

                                            <!-- lettest acivity and statustic card end -->

                                        </div>
                                        <!-- [ page content ] end -->
                                    </div>
                                </div>
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
    </div>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade
            <br/>to any of the following web browsers to access this website.
        </p>
        <div class="iew-container">
            <ul class="iew-download">
                <li>
                    <a href="http://www.google.com/chrome/">
                        <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="../files/assets/images/browser/opera.png" alt="Opera">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="../files/assets/images/browser/safari.png" alt="Safari">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="../files/assets/images/browser/ie.png" alt="">
                        <div>IE (9 & above)</div>
                    </a>
                </li>
            </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script data-cfasync="false" src="js/email-decode.min.js"></script>
    <script type="0ae58cb367065bb61d97e9c1-text/javascript" src="../files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="0ae58cb367065bb61d97e9c1-text/javascript" src="../files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="0ae58cb367065bb61d97e9c1-text/javascript" src="../files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="0ae58cb367065bb61d97e9c1-text/javascript" src="../files/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- waves js -->
    <script src="../files/assets/pages/waves/js/waves.min.js" type="0ae58cb367065bb61d97e9c1-text/javascript"></script>
    <!-- jquery slimscroll js -->
    <script type="0ae58cb367065bb61d97e9c1-text/javascript" src="../files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- Float Chart js -->
    <script src="../files/assets/pages/chart/float/jquery.flot.js" type="0ae58cb367065bb61d97e9c1-text/javascript"></script>
    <script src="../files/assets/pages/chart/float/jquery.flot.categories.js" type="0ae58cb367065bb61d97e9c1-text/javascript"></script>
    <script src="../files/assets/pages/chart/float/curvedLines.js" type="0ae58cb367065bb61d97e9c1-text/javascript"></script>
    <script src="../files/assets/pages/chart/float/jquery.flot.tooltip.min.js" type="0ae58cb367065bb61d97e9c1-text/javascript"></script>
    <!-- Chartlist charts -->
    <script src="../files/bower_components/chartist/js/chartist.js" type="0ae58cb367065bb61d97e9c1-text/javascript"></script>
    <!-- amchart js -->
    <script src="../files/assets/pages/widget/amchart/amcharts.js" type="0ae58cb367065bb61d97e9c1-text/javascript"></script>
    <script src="../files/assets/pages/widget/amchart/serial.js" type="0ae58cb367065bb61d97e9c1-text/javascript"></script>
    <script src="../files/assets/pages/widget/amchart/light.js" type="0ae58cb367065bb61d97e9c1-text/javascript"></script>
    <!-- Custom js -->
    <script src="../files/assets/js/pcoded.min.js" type="0ae58cb367065bb61d97e9c1-text/javascript"></script>
    <script src="../files/assets/js/vertical/vertical-layout.min.js" type="0ae58cb367065bb61d97e9c1-text/javascript"></script>
    <script type="0ae58cb367065bb61d97e9c1-text/javascript" src="../files/assets/pages/dashboard/custom-dashboard.min.js"></script>
    <script type="0ae58cb367065bb61d97e9c1-text/javascript" src="../files/assets/js/script.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="js/google-js.js" type="0ae58cb367065bb61d97e9c1-text/javascript"></script>
<script type="0ae58cb367065bb61d97e9c1-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="js/rocket-loader.min.js" data-cf-settings="0ae58cb367065bb61d97e9c1-|49" defer=""></script></body>
<?php
mysqli_close($conn); 
?>
</html>
