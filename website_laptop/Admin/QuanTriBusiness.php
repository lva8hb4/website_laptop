<?php
include_once "QuanTri.php";
include_once "Data_Provider.php";

class QuanTriBusiness extends Data_Provider
{
    public function layDanhSach(){
        $arrQuanTri =Array();
        $conn = $this->ketNoi();
        $sql ="Select MaQT,TenDangNhap,MatKhau,HoTen,Anh From QuanTri";
        $ketQua =mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($ketQua)){
            $quanTri = new QuanTri();
            $quanTri->maQT = $row['MaQT'];
            $quanTri->tenDangNhap = $row['TenDangNhap'];
            $quanTri->matKhau = $row['MatKhau'];
            $quanTri->hoTen = $row['HoTen'];
            $quanTri->anh = $row['Anh'];
            array_push($arrQuanTri,$quanTri);
        }
        $conn->close();
        return $arrQuanTri;
    }
    public function layDanhSachQT($tenDangNhap){
        $quanTri =null;
        $conn = $this->ketNoi();
        $sql ="Select MaQT,TenDangNhap,MatKhau,HoTen,Anh From QuanTri where TenDangNhap='".$tenDangNhap."'";
        $ketQua =mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_array($ketQua)) {
                $quanTri = new QuanTri();
                $quanTri->maQT = $row['MaQT'];
                $quanTri->tenDangNhap = $row['TenDangNhap'];
                $quanTri->matKhau = $row['MatKhau'];
                $quanTri->hoTen = $row['HoTen'];
                $quanTri->anh = $row['Anh'];

        }
        $conn->close();
        return $quanTri;
    }
    public function layChiTietQuanTri($maQT){
        $quanTri =null;
        $conn = $this->ketNoi();
        $sql ="Select MaQT,TenDangNhap,MatKhau,HoTen,Anh From QuanTri Where MaQT=".$maQT;
        $ketQua =mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($ketQua)){
            $quanTri = new QuanTri();
            $quanTri->maQT = $row['MaQT'];
            $quanTri->tenDangNhap = $row['TenDangNhap'];
            $quanTri->matKhau = $row['MatKhau'];
            $quanTri->hoTen = $row['HoTen'];
            $quanTri->anh = $row['Anh'];
        }
        $conn->close();
        return $quanTri;
    }
    public function themMoi($quanTri){
        $conn = $this->ketNoi();
        $sqlInsert ="Insert into QuanTri(TenDangNhap,MatKhau,HoTen,Anh) values (?,?,?,?)";
        $comm = $conn->prepare($sqlInsert);
        $comm->bind_param("ssss",$quanTri->tenDangNhap,$quanTri->matKhau,$quanTri->hoTen,$quanTri->anh);
        $ketQua = $comm->execute();
        $comm->close();
        $conn->close();
        if($ketQua){
            return true;
        }
        return false;
    }
    public function sua($quanTri)
    {
        $conn = $this->ketNoi();
        $sqlUpdate = "Update QuanTri set MatKhau=?,HoTen=?,Anh=? where MaQT=?";
        $comm = $conn->prepare($sqlUpdate);
        $comm->bind_param("sssd", $quanTri->matKhau,$quanTri->hoTen,$quanTri->anh,$quanTri->maQT);
        $ketQua = $comm->execute();
        $comm->close();
        $conn->close();
        if ($ketQua) {
            return true;
        }
        return false;
    }
    public function xoa($maQT)
    {
        $conn = $this->ketNoi();
        $sqlDelete = "Delete from QuanTri where MaQT =?";
        $comm = $conn->prepare($sqlDelete);
        $comm->bind_param("d", $maQT);
        $ketQua = $comm->execute();
        $comm->close();
        $conn->close();
        if ($ketQua) {
            return true;
        }
        return false;
    }
}