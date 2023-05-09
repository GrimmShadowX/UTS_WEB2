<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Rental Playstation</title>
        <link rel="stylesheet" type="text/css" href="index.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <!--sidebar-->
        <input type="checkbox" id="check">
        <div class="sidebar">
            <ul>
                <li><a href="#about">Playstations</a></li> 
                <li><a href="user.php">User</a></li>
                <li><a href="rent.php">Rental</a></li>
                <li><a href="history.php">History</a></li>
                <li><a href="anakclass.php">User List</a></li>
            </ul>
        </div>
        
      <!-- bagian header-->
      <header>
        <div class="container">
                <h1><a href="index.php">Home</a></h1>
                <ul>
                    <li><a href="#about">Playstations</a></li> 
                    <li><a href="user.php">User</a></li>
                    <li><a href="rent.php">Rental</a></li>
                    <li><a href="history.php">History</a></li>
                    <li><a href="anakclass.php">User List</a></li>
                </ul>
                <!-- menu mobile-->
                <label for="check" class="mobile-menu"><i class="fa fa-bars fa-2x"></i></label>
        </div>
      </header>
      <!--bagian banner-->
            <section class="banner">
                <div class="container">
                    <div class="banner-left">
                        <img src="img/val.jpg">
                         <h2>Selamat Datang Para Pengunjung<br>
                        Di Website Perentalan Saya<span class="efek-ngetik"></span></h2>
                    </div>
                </div>
            </section>
            <section id="about">
                <div class="container"><hr>
                    <h3>Tentang Website</h3><hr><br>
                    Website ini dibuat untuk menyelesaikan tugas UTS Pemrograman Web II
                    <ol><label>Klik tombol disamping untuk merental Playstation</label>
                        <a href="rent.php" button type="submit">Klik Disini</button></a>
                </div>
            </section><section id="Produk Saya">
                <div class="container"><hr>
                    <h3>Playstation</h3><hr><br>
                    <div class="col-4">
                        <a href="">
                            <img src="img/ps5.jpg">
                        </a>
                    </div>

                    <div class="col-4">
                        <a href="">
                            <img src="img/ps3.jpg">
                        </a>
                    </div>

                    <div class="col-4">
                        <a href="">
                            <img src="img/ps4.jpg">
                        </a>
                    </div>

                    <div class="col-4">
                        <a href="">
                            <img src="img/ps55.jpg">
                        </a>
                    </div>
                </div></section>
            <!--bagian contact-->
            <section id="contact">
                <div class="container">
                    <h3>Kontak Pemilik Rental</h3>
                    <div class="col-3">
                        <h4>Alamat</h4>
                        <P>Villa Residence Wonorejo Blok A Nomor 4</P>
                    </div>

                    <div class="col-3">
                        <h4>Email</h4>
                        <P>2207101073@student.stmik-aub.ac.id</P>
                    </div>

                    <div class="col-3">
                        <h4>Telp/Hp</h4>
                        <P>088221637567</P>
                    </div>

                </div>
            </section>

            <!--footer-->
            <footer>
                <div class="container">
                    <small>Copyright &copy; 2022 - Adam Dewantara Bolla</small>
                </div>
            </footer>
            <script src="js/script.js"></script>
    </body>
</html>