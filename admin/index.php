<?php if(!isset($_SESSION)) { session_start(); }
if(!isset($_SESSION['loginstatus_admin'])){
    $_SESSION['loginstatus_admin']="false";
}
?>
<?php
if($_SESSION['loginstatus_admin']=="false")
{
	header("location:login_admin.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>E-Commerce</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/css/demo.css" rel="stylesheet" />

  <!--     inserted     -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">

</head>

<body class="profile-page sidebar-collapse">


        <div class="container">

        <div class="tab-content gallery">
          <nav class="navbar navbar-expand-lg bg-primary  " color-on-scroll="400">



                          <li class="nav-item">
                              <a class="nav-link" href="index.php">
                                  <i class="now-ui-icons files_paper"></i>
                                  <p>Electronic Products</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="orders.php">
                                  <i class="now-ui-icons shopping_cart-simple"></i>
                                  <p>Orders</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="log_out.php" class="nav-link" href="" onclick="scrollToDownload()">
                                  <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                  <p>Logout</p>
                              </a>
                          </li>

                      </ul>


          </nav>
                        <div class="tab-pane active" id="products" role="tabpanel">
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="row collections">
                                    <br>
                                    <div class="row">
                                        <div align="center">
                                            <h3>Product Information</h3>
                                        </div>
                                    </div>
                                    <br>

                                      <?php
                                      include('../config/dbconn.php');

                                      $action = isset($_GET['action']) ? $_GET['action'] : "";
                                      if($action=='deleted'){
                                          echo "<div class='alert alert-success'>Record was deleted.</div>";
                                      }
                                      $query = "SELECT * FROM products ORDER BY prod_name ASC";
                                      $result = mysqli_query($dbconn,$query);
                                      ?>

                                <br>
                                <br>
                                <table id="" class="table table-condensed table-striped">
                                    <tr>
                                      <th>Serial</th>
                                      <th>Product Name</th>
                                      <th>Description</th>
                                      <th>Cost(Tk)</th>
                                      <th>Price(Tk)</th>
                                      <th>Quantity</th>
                                      <th>Category</th>
                                      <th>Supplier</th>
                                      <th>Option</th>
                                    </tr>
                                        <?php
                                          if($result){
                                            while($res = mysqli_fetch_array($result)) {
                                              echo "<tr>";
                                                echo "<td>".$res['prod_serial']."</td>";
                                                echo "<td>".$res['prod_name']."</td>";
                                                echo "<td>".$res['prod_desc']."</td>";
                                                echo "<td>".$res['prod_cost']."</td>";
                                                echo "<td>".$res['prod_price']."</td>";

                                                $prod_qty=$res['prod_qty'];

                                                if ($prod_qty<=10){
                                                ?>
                                                 <td><span style="color:red;"><?php echo $res['prod_qty'];?> : Reorder!</span></td>
                                                 <?php
                                                }else{
                                               ?>
                                               <td><?php echo $res['prod_qty'];?></td>
                                               </ul>
                                               <?php }

                                                echo "<td>".$res['category']."</td>";
                                                echo "<td>".$res['supplier']."</td>";
                                                echo "<td><a href=\"product_add_qty.php?prod_id=$res[prod_id]\">Add Qty</a> | <a href=\"product_update.php?prod_id=$res[prod_id]\">Edit</a> | <a href=\"product_delete.php?prod_id=$res[prod_id]
                                                \" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a> | <a href=\"admin_product_details.php?prod_id=$res[prod_id]\">View</a></td>";
                                              echo "</tr>";
                                            }
                                          }?>
                                </table>






                                <br><br>
                                <a class="btn btn-success btn-round" href="product_add.php"><i class="now-ui-icons ui-1_simple-add"></i> Add Product</a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <footer class="footer" data-background-color="black">
           <div class="container">

            </div>
        </footer>
    </div>
        </div>

</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // the body of this function is in assets/js/now-ui-kit.js
        nowuiKit.initSliders();
    });

    function scrollToDownload() {

        if ($('.section-download').length != 0) {
            $("html, body").animate({
                scrollTop: $('.section-download').offset().top
            }, 1000);
        }
    }
</script>


   <!---  inserted  -->
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../plugins/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../plugins/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>

     <!--  inserted  -->

</html>
