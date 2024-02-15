<?php 
session_start();
include_once('includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
 // for  password change   
if(isset($_POST['update']))
{
$oldpassword=md5($_POST['currentpassword']); 
$newpassword=md5($_POST['newpassword']);
$sql=mysqli_query($con,"SELECT password FROM admin where password='$oldpassword'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
$adminid=$_SESSION['adminid'];
$ret=mysqli_query($con,"update admin set password='$newpassword' where id='$adminid'");
echo "<script>alert('Password Changed Successfully !!');</script>";
echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
}
else
{
echo "<script>alert('Old Password not match !!');</script>";
echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
}
}

    
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

    <title>Farol Admin Dashboard</title>
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

    <script language="javascript" type="text/javascript">
    function valid() {
        if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
            alert("Password and Confirm Password Field do not match  !!");
            document.changepassword.confirmpassword.focus();
            return false;
        }
        return true;
    }
    </script>


    <?php include('includes/sidebar.php')  ?>

    <div class="container-fluid">
        <div class="main-content d-flex flex-column">

            <?php include('includes/header.php')  ?>


            <div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
                <h3 class="mb-sm-0 mb-1 fs-18">Change Password</h3>
                <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
                    <li>
                        <a href="index.html" class="text-decoration-none">
                            <i class="ri-home-2-line" style="position: relative; top: -1px"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Change Password</span>
                    </li>
                </ul>
            </div>


            <div class="row justify-content-center">
                <div class="col-xxl-9">
                    <div class="card bg-white border-0 rounded-10 mb-4">
                        <div class="card-body p-4">
                            <h4 class="fw-semibold fs-18 border-bottom pb-20 mb-20">
                                Settings
                            </h4>
                            <ul class="ps-0 mb-4 list-unstyled d-sm-flex gap-3">
                                <!-- <li>
                                    <a href="account.html"
                                        class="btn btn-primary bg-primary text-white py-2 px-3 border-0 fw-semibold w-sm-100 d-inline-block">Account</a>
                                </li> -->

                            </ul>
                            <div class="border-bottom pb-3 mb-3">
                                <h4 class="fs-18 fw-semibold mb-1">Change Password</h4>
                                <!-- <p class="fs-15">
                                    Update your personal details here.
                                </p> -->
                            </div>
                            <form method="post" name="changepassword" onSubmit="return valid();">
                            <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label class="label">Old Password</label>
                                            <div class="form-group">
                                                <div class="password-wrapper position-relative">
                                                    <input type="password" id="password" name="currentpassword"
                                                        class="form-control h-58 text-dark" value="" required>
                                                    <i style="color: #A9A9C8; font-size: 16px; right: 15px !important;"
                                                        class="ri-eye-off-line password-toggle-icon translate-middle-y top-50 end-0 position-absolute"
                                                        aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label class="label">New Password</label>
                                            <div class="form-group">
                                                <div class="password-wrapper position-relative">
                                                    <input type="password" id="password" name="newpassword"
                                                        class="form-control h-58 text-dark" value="">
                                                    <i style="color: #A9A9C8; font-size: 16px; right: 15px !important;"
                                                        class="ri-eye-off-line password-toggle-icon translate-middle-y top-50 end-0 position-absolute"
                                                        aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-4">
                                            <label class="label">Confirm Password</label>
                                            <div class="form-group">
                                                <div class="password-wrapper position-relative">
                                                    <input type="password" id="password" name="confirmpassword"
                                                        class="form-control h-58 text-dark" value="">
                                                    <i style="color: #A9A9C8; font-size: 16px; right: 15px !important;"
                                                        class="ri-eye-off-line password-toggle-icon translate-middle-y top-50 end-0 position-absolute"
                                                        aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group d-flex gap-3">
                                            <button class="btn btn-primary py-3 px-5 fw-semibold text-white" type="submit" name="update">Change
                                                Password</button>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-grow-1"></div>


            <?php include('includes/footer.php')  ?>

        </div>
    </div>


    <?php include('includes/button.php')  ?>


    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
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