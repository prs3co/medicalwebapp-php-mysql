<?php 
require_once "config/config.php";

if(isset($_SESSION['user'])) {
    if($_SESSION['level'] == 'Admin') {
        echo "<script>window.location='".base_url('/admin/dashboard')."';</script>";
    }
    else if($_SESSION['level'] == 'Staff') {
        echo "<script>window.location='".base_url('/staff/dashboard')."';</script>";
    }
    else if($_SESSION['level'] == 'Dokter') {
        echo "<script>window.location='".base_url('/dokter/dashboard')."';</script>";
    }
} else {
    echo "<script>window.location='".base_url('auth/login.php')."';</script>";
}
?>

