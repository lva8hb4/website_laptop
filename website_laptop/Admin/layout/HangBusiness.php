<?php
include_once "Hang.php";
include_once "Data_Provider.php";

class HangBusiness extends Data_Provider
{
    public function layDanhSach(){
        $arrHang =Array();
        $conn = $this->ketNoi();
        $sql ="Select MaHang,TenHang From Hang";
        $ketQua =mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($ketQua)){
            $hang = new Hang();
            $hang->maHang = $row['MaHang'];
            $hang->tenHang = $row['TenHang'];



            array_push($arrHang,$hang);
        }
        $conn->close();
        return $arrHang;
    }
    public function layChiTiet($maHang){
        $arrHang =Array();
        $conn = $this->ketNoi();
        $sql ="Select MaHang,TenHang From Hang where maHang=".$maHang;
        $ketQua =mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($ketQua)){
            $hang = new Hang();
            $hang->maHang = $row['MaHang'];
            $hang->tenHang = $row['TenHang'];
        }
        $conn->close();
        return $hang;
    }
}