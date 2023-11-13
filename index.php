<!doctype html>

<?php 
    include "includes/config.php";
    $query = mysqli_query($connection, "SELECT area.*, provinsi.provinsiNAMA, provinsi.provinsiTglBerdiri 
    FROM area, provinsi WHERE area.provinsiID=provinsi.provinsiID;");

    $destinasi = mysqli_query($connection,"SELECT * FROM kategori, destinasi, fotodestinasi 
    WHERE kategori.kategoriID = destinasi.kategoriID AND destinasi.destinasiID = fotodestinasi.destinasiID");

    $sql = mysqli_query($connection, "SELECT * FROM destinasi");
    $jumlah = mysqli_num_rows($sql);

    $hotel = mysqli_query($connection, "SELECT * FROM hotel");
    $jumlah2 = mysqli_num_rows($hotel);

    $foto = mysqli_query($connection, "SELECT * FROM fotodestinasi");

    $berita = mysqli_query($connection, "SELECT * FROM berita");
    $jumlah3 = mysqli_num_rows($berita);

    $kabupaten = mysqli_query($connection, "SELECT * FROM kabupaten");
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
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="output_hotel.php">Hotel</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Area
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                </div>
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
        <table class="table table-dark">
        <?php $nomor = 1; ?>    
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Wilayah</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Provinsi</th>
            <th scope="col">Tanggal Berdiri</th>
            </tr>
        </thead>
        <?php if(mysqli_num_rows($query)> 0){
                    while ($row = mysqli_fetch_array($query)){
                    ?>
        <tbody>
            <tr>
            <td> <?php echo $nomor; ?></td>
            <td> <?php echo $row['areanama']; ?></td>
            <td> <?php echo $row['areawilayah']; ?></td>
            <td> <?php echo $row['areaketerangan']; ?></td>
            <td> <?php echo $row['provinsiNAMA']; ?></td>
            <td> <?php echo $row['provinsiTglBerdiri']; ?></td>
            </tr>
            
        </tbody>
        <?php $nomor = $nomor +1;?>
        <?php }
                        } ?>
        </table>
            <div class="col-sm-8">
                <h1 style="font-family: Georgia, serif;">Rekomendasi Destinasi Wisata</h1>
                <!--objek order-->
                <?php if(mysqli_num_rows($destinasi)>0) {
                    while ($row2 = mysqli_fetch_array($destinasi)) {
                        ?>
                <div class="media" style="margin-top:30px;">
                    <div class="media-body">
                        <h4 class="mt-0 mb-1"><?php echo $row2["destinasinama"]?> </h4>
                        <h6 style="color:grey;"> <?php echo $row2["destinasialamat"] ?></h6>
                        <p> <?php echo $row2["kategoriketerangan"] ?> </p>
                    </div>
                    <img class="ml-3" style="width:180px; height:100%;" src="images/<?php echo $row2["fotofile"]?>" alt="No image file">
                </div>
                <?php }
                } ?>
                <!--akhir objek order-->
            </div>

            <div class="col-sm-4">
                <!--list group with bagdes-->
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Jumlah Objek wisata
                        <span class="badge badge-primary badge-pill"><?php echo $jumlah?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Jumlah Hotel yang direkomendasikan
                        <span class="badge badge-primary badge-pill"><?php echo $jumlah2?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Jumlah Berita
                        <span class="badge badge-primary badge-pill"><?php echo $jumlah3?></span>
                    </li>
                </ul>
                <!-- akhir list group with bagdes-->

                <ul class="list-unstyled" style="margin-top:25px;">
                <li class="media">
                    <?php if(mysqli_num_rows($berita)>0) {
                            while ($row3 = mysqli_fetch_array($berita)) {
                                ?>
                    <div class="media-body">
                    <h5 class="mt-0 mb-1"><?php echo $row3["beritajudul"]?></h5>
                    <p style="color: grey; font-size: 16px;"><?php echo $row3["penerbit"]?>
                    <p style="text-align:justify;"><?php echo $row3["beritainti"]?></p>
                    <p style="color:grey; font-size:14px; text-align:right;;"><?php echo $row3["tanggalterbit"]?></p>
                    </div>
                </li>
                </ul>
                <?php }
                } ?>
            </div>
        </div>
    </div>
    
    <!-- END OF OBJECT --> 

    <!-- GALERI -->
    <div class="container" style="margin-top:50px">
    <h1 style="font-family: Georgia, serif; text-align:center; margin-bottom:30px;">Galeri Destinasi Wisata</h1>
        <div class="row">
            <?php while ($row3 = mysqli_fetch_array($foto)) { ?>
            <div class="col-sm-4">
                <figure class="figure">
                    <img src="images/<?php echo $row3["fotofile"]?>" class="figure-img img-fluid rounded" alt="No Images" style="height:200px; width:500px">
                    <figcaption class="figure-caption text-right"><?php echo $row3["fotonama"]?></figcaption>
                </figure>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <!-- END OF GALERI -->

    <div class="container" style="margin-top:50px">
        <div class="row">
        <iframe width="100%" height="500px" src="https://www.youtube.com/embed/aKtb7Y3qOck" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>

    <div class="container" style="margin-top:50px">
    <h1 style="font-family: Georgia, serif; text-align:center; margin-bottom:30px;">Kabupaten</h1>
    <div class="row">
        <?php while ($row4 = mysqli_fetch_array($kabupaten)) { ?>
        <div class="card mb-3" style="max-width: 550px; margin-left:15px">
            <div class="row no-gutters">
                <div class="col-md-4">
                <img src="images/<?php echo $row4["kabupatenFOTOICON"]?>" alt="No Images" style="height:250px; width:180px">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row4["kabupatenNAMA"]?></h5>
                    <p class="card-text"><?php echo $row4["kabupatenFOTOICONKET"]?></p>
                    <p class="card-text"><small class="text-muted"><?php echo $row4["kabupatenALAMAT"]?></small></p>
                </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>