<?php 
// session_start();
include_once('config.php');
$adminUsername = $_SESSION['firstname'];
$logo = $_SESSION['logo']; 


if (strlen($_SESSION['adminid']==0)) {
   
  header('location:logout.php');
  } else{
       
?>



<div class="sidebar-area" id="sidebar-area">
    <div class="logo position-relative">
        <a href="index.html" class="d-block text-decoration-none">
            <img src="assets/images/logo-icon.png" alt="logo-icon">
            <span class="logo-text fw-bold text-dark">Admin</span>
        </a>
        <button
            class="sidebar-burger-menu bg-transparent p-0 border-0 opacity-0 z-n1 position-absolute top-50 end-0 translate-middle-y"
            id="sidebar-burger-menu">
            <i data-feather="x"></i>
        </button>
    </div>
    <aside id="layout-menu" class="layout-menu menu-vertical menu active" data-simplebar>
        <ul class="menu-inner">
            <li class="menu-item open">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <i data-feather="grid" class="menu-icon tf-icons"></i>
                    <span class="title">Dashboard</span>
                    <span class="count">1</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="post.php"
                            class="menu-link <?php echo ($_SERVER['PHP_SELF'] == '/post.php') ? 'active' : ''; ?>">
                            Post Upload
                        </a>
                    </li>

                </ul>
            </li>

            <li class="menu-title small text-uppercase">
                <span class="menu-title-text">Settings & Others</span>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <i data-feather="lock" class="menu-icon tf-icons"></i>
                    <span class="title">Authentication</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="login.html" class="menu-link">
                            Login
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="register.html" class="menu-link">
                            Register
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="signin-signup.html" class="menu-link">
                            Signin - Signup
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="reset-password.html" class="menu-link">
                            Reset Password
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="forget-password.html" class="menu-link">
                            Forget Password
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="logout.html" class="menu-link">
                            Log Out
                        </a>
                    </li>

                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <i data-feather="settings" class="menu-icon tf-icons"></i>
                    <span class="title">Settings</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="change-password.php" class="menu-link">
                            Change Password
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="addadmin.php" class="menu-link">
                            Add Admin User
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admindetails.php" class="menu-link">
                            Admin Details
                        </a>
                    </li>
                    <!-- <li class="menu-item">
                            <a href="privacy-policy.html" class="menu-link">
                                Privacy Policy
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="terms-conditions.html" class="menu-link">
                                Terms & Conditions
                            </a>
                        </li> -->
                </ul>
            </li>

        </ul>
    </aside>
    <div class="bg-white z-1 admin">
        <div class="d-flex align-items-center admin-info border-top">
            <div class="flex-shrink-0">
                <a href="profile.html" class="d-block">
                    <?php

                    if (!empty($logo) && file_exists("uploads/$logo")) {

                        ?>
                                        <img class="rounded-circle wh-54" src="uploads/<?php echo $logo; ?>" alt="admin">
                                        <?php
                    } else {

                        ?>
                                        <img class="rounded-circle wh-54" src="assets/images/admin.jpg" alt="admin">
                                        <?php
                    }
                    ?>
                </a>
            </div>
            <div class="flex-grow-1 ms-3 info">
                <a href="dashboard.php" class="d-block name"><?php echo $adminUsername  ?></a>
                <a href="logout.php">Log Out</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>