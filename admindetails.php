<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{


$sql = "SELECT * FROM admin";
$result = $con->query($sql);
    
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/remixicon.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/sidebar-menu.css">
    <link rel="stylesheet" href="assets/css/simplebar.css">
    <link rel="stylesheet" href="assets/css/apexcharts.css">
    <link rel="stylesheet" href="assets/css/prism.css">
    <link rel="stylesheet" href="assets/css/rangeslider.css">
    <link rel="stylesheet" href="assets/css/sweetalert.min.css">
    <link rel="stylesheet" href="assets/css/quill.snow.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="preloader" id="preloader">
        <div class="preloader">
            <div class="waviy position-relative">
                <span class="d-inline-block">F</span>
                <span class="d-inline-block">A</span>
                <span class="d-inline-block">R</span>
                <span class="d-inline-block">O</span>
                <span class="d-inline-block">L</span>
            </div>
        </div>
    </div>



    <?php include('includes/sidebar.php')  ?>

    <div class="container-fluid">
        <div class="main-content d-flex flex-column">

            <?php include('includes/header.php')  ?>


            <div class="card bg-white border-0 rounded-10 mb-4">
                <div class="card-body p-4">
                    <div class="default-table-area members-list">
                        <div class="table-responsive">
                            <table class="table align-middle" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-primary">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault">
                                                <label class="form-check-label ms-2" for="flexCheckDefault">Name</label>
                                            </div>
                                        </th>                                     
                                        <th scope="col">Email</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Date of Birth</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                        // Iterate through fetched data and generate table rows
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="form-check pe-2">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault2">
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 lh-1">
                                                        <?php 
                                                    $logonew=$row['logo'];
                                                if (!empty($logonew) && file_exists("uploads/$logonew")) {

                                                    ?>
                                                        <img class="rounded-circle wh-54"
                                                            src="uploads/<?php echo $logonew; ?>" alt="admin">
                                                        <?php
                                                    } else {

                                                    ?>
                                                        <img class="rounded-circle wh-54" src="assets/images/admin.jpg"
                                                            alt="admin">
                                                        <?php
                                                    }
                                                    ?>
                                                        <!-- <img src="assets/images/user-1.jpg" class="wh-44 rounded-circle" alt="user"> -->
                                                    </div>
                                                    <div class="flex-grow-1 ms-10">
                                                        <h4 class="fw-semibold fs-16 mb-0">
                                                            <?php echo $row['username']; ?></h4>
                                                        <span class="text-gray-light"><?php echo $row['email']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a
                                                href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a>
                                        </td>
                                        <td>
                                            <span><?php echo $row['username']; ?></span>
                                        </td>
                                        
                                        <td>
                                            <span><?php echo $row['dob']; ?></span>
                                        </td>
                                        <td>
                                            <span><?php echo $row['phone']; ?></span>
                                        </td>
                                        <td>
                                            <?php 
                                        $status=$row['status'];
                                    if ($status==1) {

                                        ?>
                                            <span
                                                class="bg-success bg-opacity-10 text-success fs-13 fw-semibold py-1 px-2 rounded-1">Active</span>
                                            <?php
                                        } else if($status==0){

                                        ?>
                                            <span
                                                class="bg-danger bg-opacity-10 text-success fs-13 fw-semibold py-1 px-2 rounded-1">Inactive</span>

                                            <?php
                                        }
                                        else{
                                            ?>
                                            <span
                                                class="bg-danger bg-opacity-10 text-success fs-13 fw-semibold py-1 px-2 rounded-1">Inactive</span>
                                            <?php
                                        }
                                        ?>
                                           
                                        </td>
                                        <td>
                                        <span><?php echo $row['address']; ?></span>
                                    </td>
                                        <td>
                                            <div class="dropdown action-opt">
                                                <button class="btn bg p-0" type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i data-feather="more-horizontal"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:;">
                                                            <i data-feather="share-2"></i>
                                                            Share
                                                        </a>
                                                    </li>
                                                    <!-- Add more actions here if needed -->
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="flex-grow-1"></div>

            <?php include('includes/footer.php')  ?>

        </div>
    </div>

    <?php include('includes/button.php')  ?>



    <!-- <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebar-menu.js"></script>
    <script src="assets/js/dragdrop.js"></script>
    <script src="assets/js/rangeslider.min.js"></script>
    <script src="assets/js/sweetalert.js"></script>
    <script src="assets/js/quill.min.js"></script>
    <script src="assets/js/data-table.js"></script>
    <script src="assets/js/prism.js"></script>
    <script src="assets/js/clipboard.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/simplebar.min.js"></script>
    <script src="assets/js/apexcharts.min.js"></script>
    <script src="assets/js/amcharts.js"></script>
    <script src="assets/js/custom/ecommerce-chart.js"></script>
    <script src="assets/js/custom/custom.js"></script>
</body>

</html>
<?php } ?>