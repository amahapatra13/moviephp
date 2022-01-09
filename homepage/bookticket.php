<?php 
include('../conn/conn.php');
include('includes/session.php');
?>
<?php 
if(isset($_POST['submit'])){
    $movie = $_POST['movie'];
    $location = $_POST['location'];
    $theatre_name = $_POST['theatre_name'];
    $timing = $_POST['timing'];

    $val = "select id, movie, timing, location, theatre_name from tickets where movie = $movie and timing = $timing
            and location = $location and theatre_name = $theatre_name and active = 'Y' ";
    $valreturn = mysqli_query($conn, $val);
    $row = mysqli_fetch_assoc($valreturn);
    if($row){
        $tickets_id = $row['id'];
        $query_trans = "insert into transaction (movie_name, location, timing, theatre_name, tickets_id, user_id)
                        values ($movie,$location,$timing,$theatre_name,$tickets_id,$id)";
    
        $retval = mysqli_query($conn,$query_trans);
        if (!$retval)
        echo "<script type ='text/javascript'> alert('Please try again'); </script>";
        else
        echo "<script type ='text/javascript'> alert('Ticket successfully Booked'); window.location.href='index.php';</script>";
    }else{
        echo "<script type ='text/javascript'> alert('Movie not available at that time or location or theatre '); </script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Movie Booking system</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive/responsive.css" rel="stylesheet">

</head>

<body>
    <!-- Preloader Start -->




    <!-- ****** Top Header Area Start ****** -->
    <div class="top_header_area">
        <div class="container">
            <div class="row">
                <div class="col-5 col-sm-6">
                    <!--  Top Social bar start -->
                    <div class="top_social_bar">
                        <h6>Hello User</h6>
                        <a href="#"><i aria-hidden="true"></i></a>
                        <a href="#"><i aria-hidden="true"></i></a>
                        <a href="#"><i aria-hidden="true"></i></a>
                        <a href="#"><i aria-hidden="true"></i></a>
                        <a href="#"><i aria-hidden="true"></i></a>
                    </div>
                </div>
                <!--  Login Register Area -->
                <div class="col-7 col-sm-6">
                    <div class="signup-search-area d-flex align-items-center justify-content-end">
                        <div class="login_register_area d-flex">
                            <div class="login">
                                <a href="logout.php">Sign out</a>
                            </div>
                            <div class="register">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Top Header Area End ****** -->

    <!-- ****** Header Area Start ****** -->
    <header class="header_area">
        <div class="container">
            <div class="row">
                <!-- Logo Area Start -->
                <div class="col-12">
                    <div class="logo_area text-center">
                        <a href="index.php" class="yummy-logo">Book your movie ticket</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#yummyfood-nav" aria-controls="yummyfood-nav" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button>
                        <!-- Menu Area Start -->
                        <div class="collapse navbar-collapse justify-content-center" id="yummyfood-nav">
                            <ul class="navbar-nav" id="yummy-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="bookinghistory.php">Booking History</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="bookticket.php">Book movie ticket</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ****** Header Area End ****** -->

    <div class="breadcumb-nav">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Book your ticket</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-area section_padding_80">
        <div class="container">
            <div class="contact-form-area">
                <div class="row">
                    <!--div class="col-12 col-md-5">
                        <div class="contact-form-sidebar item wow fadeInUpBig" data-wow-delay="0.3s" style="background-image: url(img/bg-img/contact.jpg);">
                        </div>
                    </div-->
                    <div class="col-12 col-md-7 item">
                        <div class="contact-form wow fadeInUpBig" data-wow-delay="0.6s">
                            <h2 class="contact-form-title mb-30">Book your ticket now</h2>
                            <!-- Contact Form -->
                            <form method="POST">
                                <div class="form-group">
                                <label> Movie Name</label>
                                <select name="movie" id="movie" class="form-control">
                                    <?php 
                                        $query = "select id, name from movies where active='Y'";
                                        $q = mysqli_query($conn,$query);
                                    ?>
                                    <option value="">--select Movie name--</option>
                                    <?php while($row= mysqli_fetch_assoc($q)) { ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name']?></option>
                                    <?php }?>
                                </select><br />
                                </div>
                                <div class="form-group">
                                    <label> Location</label>
                                    <select name="location" id="location" class="form-control">
                                        <?php 
                                            $query = "select id, name from location where active='Y'";
                                            $q = mysqli_query($conn,$query);
                                        ?>
                                        <option value="Delhi">--Select Location--</option>
                                        <?php while($row= mysqli_fetch_assoc($q)) { ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name']?></option>
                                        <?php }?>
                                    </select><br />
                                </div>
                                <div class="form-group">
                                    <label> Theatre Name</label>
                                    <select name="theatre_name" id="theatre_name" class="form-control">
                                        <?php 
                                            $query = "select id, value from theatre_name where active='Y'";
                                            $q = mysqli_query($conn,$query);
                                        ?>
                                        <option value="PVR">--Select Location--</option>
                                        <?php while($row= mysqli_fetch_assoc($q)) { ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['value']?></option>
                                        <?php }?>
                                    </select><br />
                                </div>
                                <div class="form-group">
                                    <label> Timings </label>
                                    <select name="timing" id="timing" class="form-control">
                                        <?php 
                                            $query = "select id, timing from timing where active='Y'";
                                            $q = mysqli_query($conn,$query);
                                        ?>
                                        <option value="">--Select Location--</option>
                                        <?php while($row= mysqli_fetch_assoc($q)) { ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['timing']?></option>
                                        <?php }?>
                                    </select><br />
                                </div>
                                <button type="submit" id="submit" name="submit" class="btn contact-btn">Book Your Ticket</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ****** Contact Area End ****** -->

    <!-- ****** Instagram Area Start ****** -->
    <!--div class="instargram_area owl-carousel section_padding_100_0 clearfix" id="portfolio"-->

        <!-- Instagram Item -->
        <!--div class="instagram_gallery_item"-->
            <!-- Instagram Thumb -->
            <!--img src="" alt=""-->
            <!-- Hover -->
            <!--div class="hover_overlay">
                <div class="yummy-table">
                    <div class="yummy-table-cell">
                        <div class="follow-me text-center">
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                        </div>
                    </div>
                </div>
            </div>
        </div-->

        <!-- Instagram Item -->
       

    </div>

    <!-- ****** Footer Social Icon Area End ****** -->

    <!-- ****** Footer Menu Area Start ****** -->
    <footer class="footer_area">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Copywrite Text -->
                    <div class="copy_right_text text-center">
                        <p>Developed By Ashutosh, Iraa , Avinash and Prachi</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ****** Footer Menu Area End ****** -->

    <!-- Jquery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap-4 js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins JS -->
    <script src="js/others/plugins.js"></script>
    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s"></script>
    <script src="js/google-map/map-active.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>
</body>
