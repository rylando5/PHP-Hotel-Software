<?php include 'header.php';
session_start();
?>
<?php 
print_r($_SESSION);
?>




<!-- banner -->
<div class="banner">    	   
    <img src="images/photos/banner.jpg"  class="img-responsive" alt="slide">
    <div class="welcome-message">
        <div class="wrap-info">
            <div class="information">
                <h1  class="animated fadeInDown">Bird Hotel</h1>
                <p class="animated fadeInUp">Breathtaking views accompanied with unforgettable memories.</p>                
            </div>
            <a href="#information" class="arrow-nav scroll wowload fadeInDownBig" style = background-color:#0C5D93;><i class="fa fa-angle-down"></i></a>
        </div>
    </div>
</div>
<!-- banner-->



<?php include 'reservations.php'; ?>


<!-- <?php include 'footer.php';?> -->