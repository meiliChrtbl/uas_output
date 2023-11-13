<!doctype html>

<?php 
    include "includes/config.php";
    $query = mysqli_query($connection, "SELECT * FROM area");

    $destinasi = mysqli_query($connection,"SELECT * FROM kategori, destinasi, fotodestinasi 
    WHERE kategori.kategoriID = destinasi.kategoriID AND destinasi.destinasiID = fotodestinasi.destinasiID");

    $sql = mysqli_query($connection, "SELECT * FROM destinasi");
    $jumlah = mysqli_num_rows($sql);

    $hotel = mysqli_query($connection, "SELECT * FROM hotel");
    $jumlah2 = mysqli_num_rows($hotel);

    $kuliner = mysqli_query($connection, "SELECT * FROM kuliner");
    $jumlah3 = mysqli_num_rows($kuliner);

    $berita = mysqli_query($connection, "SELECT * FROM berita");

    $acara = mysqli_query($connection, "SELECT * FROM acara");
    $jumlah4 = mysqli_num_rows($acara);
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>WISATA</title>
  </head>

  <body>

  <!-- MENU -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position:sticky; top:0px; z-index:100;">
        <a class="navbar-brand" href="#"><img src="images/logo_uas.png" style="width:45px;height:45px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="output_hotel.php">Hotel</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Area
                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="component.php">Kuliner dan Acara</a>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <!--END OF MENU-->

    <!-- SLIDER -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" style="max-height:500px;">
            <div class="carousel-item active">
                <img class="d-block w-100" src="images/tangkuban_perahu.jpg" alt="First slide" style="max-height:500px;">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Tangkuban Perahu</h1>
                    <p>Wide expanse of volcanic rock</p>
                </div>
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="images/bunaken.jpg" alt="Second slide" style="max-height:500px;">
            <div class="carousel-caption d-none d-md-block">
                    <h1>Taman Nasional Bunaken</h1>
                    <p>You can see the underwater beauty of Indonesia</p>
                </div>
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="images/orchid_lembang.jpg" alt="Third slide" style="max-height:500px;">
            <div class="carousel-caption d-none d-md-block">
                    <h1>Orchid Forest Cikole</h1>
                    <p>Beautiful green forest in the mountains</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- END OF SLIDER -->
    
    <!-- Membuat Tampilan Objek -->

    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-sm-8">
                <h1 style="font-family: Georgia, serif;">Rekomendasi Acara, Jangan Sampai Kelewatan!</h1>
                <?php if(mysqli_num_rows($acara)>0) {
                    while ($row4 = mysqli_fetch_array($acara)) {
                        ?>
                <!--objek order-->
                <div class="card mb-3">
                    <img class="card-img-top" src="images/<?php echo $row4["acarafoto"]?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row4["acaranama"]?></h5>
                        <p class="card-text"><?php echo $row4["acaraketerangan"]?></p>
                        <p class="card-text"><small class="text-muted"><?php echo $row4["acaraalamat"]?></small></p>
                    </div>
                </div>
                <?php }
                } ?>
                <!--akhir objek order-->
            </div>

            <div class="col-sm-4">
                <!--list group with bagdes-->
                <ul class="list-group" style="margin-bottom: 20px;">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Jumlah Objek wisata
                        <span class="badge badge-primary badge-pill"><?php echo $jumlah?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Jumlah Hotel yang direkomendasikan
                        <span class="badge badge-primary badge-pill"><?php echo $jumlah2?> </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Jumlah Rekomendasi Kuliner
                        <span class="badge badge-primary badge-pill"><?php echo $jumlah3?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Jumlah Acara
                        <span class="badge badge-primary badge-pill"><?php echo $jumlah4?></span>
                    </li>
                </ul>
                <!-- akhir list group with bagdes-->
                <?php if(mysqli_num_rows($query)> 0){
                    while ($row = mysqli_fetch_array($query)){
                    ?>
                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-header"><?php echo $row["areawilayah"]?></div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row["areanama"]?></h5>
                    <p class="card-text"><?php echo $row["areaketerangan"]?></p>
                </div>
                </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
    
    <!-- END OF OBJECT --> 

    <!-- GALERI -->
    <div class="container" style="margin-top:50px">
    <h1 style="font-family: Georgia, serif; text-align:center; margin-bottom:30px;">Galeri Kuliner</h1>
        <div class="row">
            <?php while ($row3 = mysqli_fetch_array($kuliner)) { ?>
            <div class="col-sm-4">
                <figure class="figure">
                    <img src="images/<?php echo $row3["kulinerfoto"]?>" class="figure-img img-fluid rounded" alt="No Images" style="height:200px; width:500px">
                    <figcaption class="figure-caption text-right"><?php echo $row3["kulinernama"]?></figcaption>
                    <figcaption class="figure-caption text-right"><?php echo $row3["kulineralamat"]?></figcaption>
                </figure>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <!-- END OF GALERI -->

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>