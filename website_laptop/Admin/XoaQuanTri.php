<?php
include_once "QuanTriBusiness.php";
if(isset($_REQUEST['maQT'])){
    $maQT = intval($_GET['maQT']);}
$bus = new QuanTriBusiness();
$result = $bus->xoa($maQT);
if($result){
    header("location:QuanLyQuanTri.php");
}
?>