<?php
include_once "DonDatHangBusiness.php";
include_once "LapTopBusiness.php";
if(isset($_REQUEST['maDH']) && isset($_REQUEST['maLT']) && isset($_REQUEST['soLuong'])){
    $maDH =$_GET['maDH'];
    $maLT =$_GET['maLT'];
    $soLuongMua =$_GET['soLuong'];
    $busDH = new DonDatHangBusiness();
    $busLT = new LapTopBusiness();
    $lapTop = $busLT->layChiTietLapTop($maLT);
    $soLuong = $lapTop->soLuong;
    $resultDH =$busDH->xoa($maDH);
    if($resultDH) {
        $lapTop = new LapTop();
        $lapTop->maLT = $maLT;
        $lapTop->soLuong = $soLuong + $soLuongMua;
        $resultLT =$busLT->suaSL($lapTop);
        if($resultLT){
            header("location:GioHang.php");
        }
    }

}
?>