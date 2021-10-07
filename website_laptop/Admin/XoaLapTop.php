<?php
include_once "LapTopBusiness.php";
if(isset($_REQUEST['maLT'])){
    $maLT = intval($_GET['maLT']);}
$bus = new LapTopBusiness();
$result = $bus->xoa($maLT);
if($result){
    header("location:QuanLyLapTop.php");
}
?>