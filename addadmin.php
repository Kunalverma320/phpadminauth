<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{




    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $dob = $_POST["dob"];
        $gender = $_POST["gender"];
        $address = $_POST["address"];
        
       
       if(isset($_FILES["logo"]) && $_FILES["logo"]["error"] == 0) {
        $logo = $_FILES["logo"]["name"];
        $uploadFolder = "uploads/";
        $uploadFilePath = $uploadFolder . basename($_FILES["logo"]["name"]);
    
        // Move uploaded file to a folder
        move_uploaded_file($_FILES["logo"]["tmp_name"], $uploadFilePath);
    } else {
        // Handle the case where the logo file is not uploaded
        $logo = "";
    }
    
        $status = $_POST["status"];
    
        //Move uploaded file to a folder (you need to create this folder)
        $uploadFolder = "admin/uploads/";
        $uploadFilePath = $uploadFolder . basename($_FILES["logo"]["name"]);
        move_uploaded_file($_FILES["logo"]["tmp_name"], $uploadFilePath);
    
        // Prepare and execute the SQL query
        $sql = "INSERT INTO admin (username,password,firstname, lastname, email, phone, dob, gender, address,logo ,status) 
                VALUES ('$username','$password','$firstname', '$lastname', '$email', '$phone', '$dob', '$gender', '$address','$logo' ,'$status')";
    
        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Admin Add successfully');</script>";
           echo "<script type='text/javascript'> document.location = 'addadmin.php'; </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
        $con->close();
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
    <title>Add Admin Password</title>
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

            <div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
                <h3 class="mb-sm-0 mb-1 fs-18">Add Admin Password</h3>
                <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
                    <li>
                        <a href="index.html" class="text-decoration-none">
                            <i class="ri-home-2-line" style="position: relative; top: -1px"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Add Admin Password</span>
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
                                <h4 class="fs-18 fw-semibold mb-1">Add Admin Password</h4>
                                <!-- <p class="fs-15">
                                    Update your personal details here.
                                </p> -->
                            </div>
                            <form method="post" name="addadmin" enctype="multipart/form-data">
                                <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label class="label">Username</label>
                                            <div class="form-group position-relative">
                                                <input type="text" class="form-control text-dark ps-5 h-58"
                                                    name="username" placeholder="Enter Name" />
                                                <i
                                                    class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label class="label">Password</label>
                                            <div class="form-group position-relative">
                                            <input type="password" id="password" name="password"
                                                        class="form-control h-58 text-dark" value="" required>
                                                    <i style="color: #A9A9C8; font-size: 16px; right: 15px !important;"
                                                        class="ri-eye-off-line password-toggle-icon translate-middle-y top-50 end-0 position-absolute"
                                                        aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label class="label">First Name</label>
                                            <div class="form-group position-relative">
                                                <input type="text" class="form-control text-dark ps-5 h-58"
                                                    name="firstname" placeholder="Enter Name" />
                                                <i
                                                    class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label class="label">Last Name</label>
                                            <div class="form-group position-relative">
                                                <input type="text" class="form-control text-dark ps-5 h-58"
                                                    name="lastname" placeholder="Enter Name" />
                                                <i
                                                    class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label class="label">Email Address</label>
                                            <div class="form-group position-relative">
                                                <input type="email" class="form-control text-dark ps-5 h-58"
                                                    name="email" placeholder="Enter Email Address" />
                                                <i
                                                    class="ri-mail-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label class="label">Phone</label>
                                            <div class="form-group position-relative">
                                                <input type="number" class="form-control text-dark ps-5 h-58"
                                                    name="phone" placeholder="Enter Phone Number" />
                                                <i
                                                    class="ri-phone-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label class="label">Date Of Birth</label>
                                            <div class="form-group position-relative">
                                                <input type="date" name="dob"
                                                    class="form-control text-dark ps-5 h-58 text-gray-light" />
                                                <i
                                                    class="ri-calendar-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label class="label">Gender</label>
                                            <div class="form-group position-relative">
                                                <select class="form-select form-control ps-5 h-58" name="gender"
                                                    aria-label="Default select example">
                                                    <option selected value="Male" class="text-dark">Male</option>
                                                    <option value="Female" class="text-dark">Female</option>
                                                    <option value="Others" class="text-dark">Others</option>
                                                </select>
                                                <i
                                                    class="ri-men-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-4">
                                            <label class="label">Address :</label>
                                            <div class="form-group position-relative">
                                                <textarea class="form-control ps-5 text-dark" name="address"
                                                    placeholder="Your Location" cols="30" rows="5"></textarea>
                                                <i
                                                    class="ri-map-pin-line position-absolute top-0 start-0 fs-20 text-gray-light ps-20 pt-2"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="label">File Upload - Product Gallery</label>
                                            <div class="form-control h-100 text-center position-relative p-4 p-lg-5">
                                                <div class="product-upload">
                                                    <label for="file-upload" class="file-upload mb-0">
                                                        <i class="ri-upload-cloud-2-line fs-2 text-gray-light"></i>
                                                        <span class="d-block fw-semibold text-body">Drop files here or
                                                            click to upload.</span>
                                                    </label>
                                                    <input id="file-upload" name="logo" type="file" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-4">
                                            <label class="label">Status</label>
                                            <div class="form-group position-relative">
                                                <select class="form-select form-control ps-5 h-58" name="status"
                                                    aria-label="Default select example">
                                                    <option selected value="1" class="text-dark">Active</option>
                                                    <option value="0" class="text-dark">Inactive</option>

                                                </select>
                                                <i
                                                    class="ri-men-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group d-flex gap-3">
                                            <button class="btn btn-primary py-3 px-5 fw-semibold text-white"
                                                type="submit" name="update">Save
                                            </button>
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