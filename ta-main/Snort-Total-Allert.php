<?php 
  include 'login verified/loginverifi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'template/header.php';
    ?>
<script src="https://unpkg.com/gridjs/dist/gridjs.production.min.js"></script>
<link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <?php
    include 'template/navbar.php';
    ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <?php
                    include 'template/topbar.php';
                    ?>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Snort Monitoring</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Total Allerts -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            <a class="collapse-item" href="Snort-Total-Allert.php">Total Allerts</a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                $koneksi = mysqli_connect('localhost','ta04','root','ta');
                                                $data_rules = mysqli_query($koneksi, "SELECT * FROM snortmonitor");
                                                $jumlah_rules = mysqli_num_rows($data_rules);
                                                ?>
                                             <?php echo $jumlah_rules; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Jumlah Rules -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Jumlah Rules</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $koneksi = mysqli_connect('localhost','ta04','root','ta');
                                                $data_rules = mysqli_query($koneksi, "SELECT * FROM snort_rules");
                                                $jumlah_rules = mysqli_num_rows($data_rules);
                                                ?>
                                                <?php echo $jumlah_rules; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- IP Address -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">IP Address
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                         <?php
                                                          function getClientIP() {

                                                              if (isset($_SERVER)) {

                                                                  if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
                                                                      return $_SERVER["HTTP_X_FORWARDED_FOR"];

                                                                  if (isset($_SERVER["HTTP_CLIENT_IP"]))
                                                                      return $_SERVER["HTTP_CLIENT_IP"];

                                                                  return $_SERVER["REMOTE_ADDR"];
                                                              }

                                                              if (getenv('HTTP_X_FORWARDED_FOR'))
                                                                  return getenv('HTTP_X_FORWARDED_FOR');

                                                              if (getenv('HTTP_CLIENT_IP'))
                                                                  return getenv('HTTP_CLIENT_IP');

                                                              return getenv('REMOTE_ADDR');
                                                          }
                                                          echo getClientIP()."";
                                                          ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Date/Time -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Date/Time</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $tz = 'Asia/Jakarta';
                                                $dt = new DateTime("now", new DateTimeZone($tz));
                                                $timestamp = $dt->format('Y-m-d G:i:s');
                                                echo $timestamp;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12">
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Snort Total Allerts</h6>
                                </div>
                                <div class="card-body">
                                    <h5><b>Security<span class="float-right"> Total</span></b></h5>
                                    <br>
                                    <h4 class="small font-weight-bold">Critical<span
                                            class="float-right">
                                    <?php
                                         $koneksi = mysqli_connect('localhost','ta04','root','ta');
                                         $data_rules = mysqli_query($koneksi, "SELECT * FROM snortmonitor WHERE classification = 'Critical'");
                                         $jumlah_rules = mysqli_num_rows($data_rules);
                                    ?>
                                    <?php echo $jumlah_rules; ?>                              
                                      </span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">High<span
                                            class="float-right">
                                      <?php
                                         $koneksi = mysqli_connect('localhost','ta04','root','ta');
                                         $data_rules = mysqli_query($koneksi, "SELECT * FROM snortmonitor WHERE classification = 'High'");
                                         $jumlah_rules = mysqli_num_rows($data_rules);
                                    ?>
                                      <?php echo $jumlah_rules; ?>
                                      </span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Medium<span
                                            class="float-right">
                                      <?php
                                         $koneksi = mysqli_connect('localhost','ta04','root','ta');
                                         $data_rules = mysqli_query($koneksi, "SELECT * FROM snortmonitor WHERE classification = 'Medium'");
                                         $jumlah_rules = mysqli_num_rows($data_rules);
                                    ?>
                                      <?php echo $jumlah_rules; ?>
                                      </span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 100%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Low<span
                                            class="float-right">
                                      <?php
                                         $koneksi = mysqli_connect('localhost','ta04','root','ta');
                                         $data_rules = mysqli_query($koneksi, "SELECT * FROM snortmonitor WHERE classification = 'Low'");
                                         $jumlah_rules = mysqli_num_rows($data_rules);
                                    ?>
                                      <?php echo $jumlah_rules; ?>
                                      </span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include 'template/footer.php';
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php
    include 'template/scrollup.php';
    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
