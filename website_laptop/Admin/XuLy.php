<?php
include_once "DonDatHangBusiness.php";
if(isset($_REQUEST['maDH'])){
    $maDH = $_GET['maDH'];
    $bus = new DonDatHangBusiness();
    $donDatHang = new DonDatHang();
    $donDatHang->xuLy =1;
    $donDatHang->maDH =$maDH;
    $result = $bus->suaXL($donDatHang);
    if($result){
        header('location:QuanLyDonDatHang.php');
    }

}
?>