<?php 
include('../conn/conn.php');
include('includes/session.php');
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
    <link href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="yummy-load"></div>
    </div>


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
                                <a href="register.html"></a>
                            </div>
                            <div class="register">
                                <a href="logout.php">Sign Out</a>
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
                        <a href="index.php" class="yummy-logo">Movie Ticket Booking</a>
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
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="bookinghistory.php">Booking History</a>
                                </li>   
                                <li class="nav-item">
                                    <a class="nav-link" href="bookticket.php">Book a new Ticket</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ****** Header Area End ****** -->

    <!-- ****** Welcome Post Area Start ****** -->
    <section class="welcome-post-sliders owl-carousel">

    <?php 
    $query = "select name, image from movies where active='Y'";
    $query_t = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($query_t)) {            
    ?>

        <!-- Single Slide -->
        <div class="welcome-single-slide">
            <!-- Post Thumb -->
            <img src="../images/<?php echo $row['image']?>.jpg" alt="">
            <!-- Overlay Text -->
            <div class="project_title">
                <div class="post-date-commnents d-flex">
                    <a href="#">2020</a>
                    <a href="#"><?php echo $row['name'] ?></a>
                </div>
                <a href="#">
                    <h5>Recent Releases</h5>
                </a>
            </div>
        </div>
    <?php } ?>

    </section><br /><br />

    <table style="width:100%;" id="datatable">
        <thead>
            <tr>
                <th>Sl no.</th>
                <th>Movie Name</th>
                <th>Location</th>
                <th>Theatre Name</th>
                <th>Timing</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $i=1;
            $query = "select t.id ,t.value, t.movie, t.location,t.timing,t.theatre_name, th.id, th.value as tname , m.id,m.name as movie
                        ,l.id, l.name as loc, ti.id, ti.timing, p.id , p.price from tickets t, location l, theatre_name th, 
                        timing ti, pricing p, movies m where t.movie = m.id and t.id = p.id and t.location = l.id and t.theatre_name= th.id and
                        t.timing = ti.id and t.active ='Y'";
            $query_t = mysqli_query($conn, $query);
            while($row = mysqli_fetch_assoc($query_t)) {
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['movie'];?></td>
                <td><?php echo $row['loc']; ?> </td>
                <td><?php echo $row['tname'];?></td>
                <td><?php echo $row['timing'];?></td>
                <td><?php echo $row['price'];?></td>
            </tr>
            <?php $i+=1;}?>
        </tbody>
    </table>

    <footer>
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
    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        } );
    </script>
</body>
