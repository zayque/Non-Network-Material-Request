<?php
include 'config.php';
session_start();
if(!$_SESSION['role'] == 'admin' || !$_SESSION['role'] == 'user' ){
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Telekom Malaysia</title>

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href=" https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    </head>

<body>
    <div class="overflow-auto">

        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="about.php">
                    <img src="images/tmlogo.png" width="50" height="30" class="d-inline-block align-top" alt="">
                   Non-Network Material Request
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                New Material Request
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="user_module/form_user_ttg.php">Non-Network Material Request (TTG) <span class="sr-only">(current)</span></a>
                                <a class="dropdown-item" href="user_module/form_user_vehicle.php">Non-Network Material Request (Vehicle)</a>

                            </div>
                        </li>
                        <!-- <a class="nav-item nav-link active" href="#form">New Delivery <span class="sr-only">(current)</span></a> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Material Request Record
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="user_module/record_ttg.php">Non-Network Material Request (TTG)<span class="sr-only">(current)</span></a>
                                <a class="dropdown-item" href="user_module/record_vehicle.php">Non-Network Material Request (Vehicle)</a>

                            </div>
                        </li>
                        <a class="nav-item nav-link" href="about.php">About</a>

                    </div>
                </div>

                <?php
                if($_SESSION['role'] == 'admin'){
                  echo  '<div><a class = "btn btn-primary" href ="register_user_admin.php">Admin</a></div>';
                }
                
               
               
               ?>

                <div class="nav-item text-nowrap">

                    <a class="nav-link px-3" href="logout.php">Logout</a>
                </div>


            </nav>
        </header>


        <div class="image-aboutus-banner" style="margin-top:70px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="lg-text">About Us</h1>
                       <!-- <p class="image-aboutus-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container paddingTB60">
            <div class="row">

                <!-- Blog Post Content Column -->
                <div class="col-lg-8">

                    <hr>

                    <h2>Supplier Relationship Management Group Procurement</h2>

                    <hr>

                    <!-- Preview Image -->
                    <img class="img-responsive" src="http://mobilebusinessinsights.com/wp-content/uploads/2016/03/IBM_MobileFirst_SXSWBlog_0321_v2.jpg" alt="">

                    <hr>

                 
                    <p class="lead">Owner: Encik Mahadi<br>Developer: Akmal Hafiz Bin Hashim, from University Malaysia of Computer Science and Engineering, Cyberjaya </p>
<p> Published Month: May 2022 (Digital and System Unit)</p>
                  <!-- Post Content      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>-->

                    <hr>

                    <footer class="bg-light pb-5">
                        <div class="container text-center">
                            <p class="font-italic text-muted mb-0">&copy; Copyrights TelekomMalaysia.com All rights reserved.</p>
                        </div>
                    </footer>


                </div>


            </div>
</body>

</html>