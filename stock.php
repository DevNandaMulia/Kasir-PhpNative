<?php

require 'ceklogin.php';

//Hitung jumlah barang
$h1 = mysqli_query($c,"select * from produk");
$h2 = mysqli_num_rows($h1); //jumlah produk

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Stock Barang</title>
        <link href="https://cdn.datatables.net/1.10.20/css/datatables.bootsrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Kasir Online Shop</a>
        <button class="btn btn-link btn-sm order-1 lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Order
                            </a>
                            <a class="nav-link" href="stock.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Stock Barang
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="Pelanggan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Kelola Pelanggan
                            </a>
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Repost Name :</div>
                        Ananda Mulia
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Barang</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Selamat Datang</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah Barang: <?=$h2;?></div>
                                    </div>
                                </div>
                        </div>

                        <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#myModal">
                                 Tambah Barang Baru
                            </button>

                            
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Barang
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Deskripsi</th>
                                            <th>Stock</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $_get = mysqli_query($c, "select * from produk");
                                    $i = 1; 
                                    
                                    while($p=mysqli_fetch_array($_get)){
                                    $namaproduk = $p['namaproduk'];
                                    $deskripsi = $p['deskripsi'];
                                    $harga = $p['harga'];
                                    $stock = $p['stock'];
                                    $idproduk = $p['idproduk'];

                                    ?>
                                    
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$namaproduk;?></td>
                                            <td><?=$deskripsi;?></td>
                                            <td><?=$stock;?></td>
                                            <td>Rp<?=number_format($harga);?></td>
                                            <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idproduk;?>">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idproduk;?>">
                                                Delete
                                            </button>
                                            </td>
                                        </tr>

                                        <!-- Modal edit -->
                                        <div class="modal fade" id="edit<?=$idproduk;?>">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                        
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                            <h4 class="modal-title">Ubah <?=$namaproduk;?></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <form method="post">
                                            
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                            <input type="text" name="namaproduk" class="form-control" placeholder="Nama produk" value="<?=$namaproduk;?>">
                                            <input type="text" name="deskripsi" class="form-control mt-2" placeholder="Deskripsi" value="<?=$deskripsi;?>">
                                            <input type="num" name="harga" class="form-control mt-2" placeholder="Harga Produk" value="<?=$harga;?>">
                                            <input type="hidden" name="idp" value="<?=$idproduk;?>">
                                            </div>
                                            
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" name="editbarang">Submit</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>

                                            </form>

                                        </div>
                                        </div>
                                    </div>

                                    <!-- Modal delete -->
                                    <div class="modal fade" id="delete<?=$idproduk;?>">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                        
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                            <h4 class="modal-title">Hapus <?=$namaproduk;?></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <form method="post">
                                            
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus barang ini?
                                            <input type="hidden" name="idp" value="<?=$idproduk;?>">
                                            </div>
                                            
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" name="hapusbarang">Submit</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>

                                            </form>

                                        </div>
                                        </div>
                                    </div>

                                
                                    <?php
                                    }; //end of while 
                                    
                                    ?> 

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Website 2025</div>
                            <div>
                                <a href='Data' target='_blank'>My Profile</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.datatables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/datatables.datatables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>


    
    
     <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Barang Baru</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form method="post">
        
        <!-- Modal body -->
        <div class="modal-body">
          <input type="text" name="namaproduk" class="form-control" placeholder="Nama produk">
          <input type="text" name="deskripsi" class="form-control mt-2" placeholder="Deskripsi">
          <input type="num" name="stock" class="form-control mt-2" placeholder="Stock Awal">
          <input type="num" name="harga" class="form-control mt-2" placeholder="Harga Produk">
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="tambahbarang" >Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

        </form>

      </div>
    </div>
  </div>



</html>
