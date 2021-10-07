<?php
include_once "KhachHangBusiness.php";
if(isset($_REQUEST['maKH'])){
    $maKH = intval($_GET['maKH']);}
$bus = new KhachHangBusiness();
$result = $bus->xoa($maKH);
if($result){
    header("location:QuanLyKhachHang.php");
}
?>