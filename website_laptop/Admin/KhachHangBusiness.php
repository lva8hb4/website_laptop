<?php
include_once "KhachHang.php";
include_once "Data_Provider.php";

class KhachHangBusiness extends Data_Provider
{
    public function layChiTietKhachHang($maKH)
    {
        $khachHang = null;
        $conn = $this->ketNoi();
        $sql = "Select MaKH,TenDangNhap,MatKhau,HoTen,DiaChi,DienThoai,NgaySinh,GioiTinh,Email,Anh
            From KhachHang Where MaKH =" . $maKH;
        $ketQua = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($ketQua)) {
            $khachHang = new KhachHang();
            $khachHang->maKH = $row['MaKH'];
            $khachHang->tenDangNhap = $row['TenDangNhap'];
            $khachHang->matKhau = $row['MatKhau'];
            $khachHang->hoTen = $row['HoTen'];
            $khachHang->diaChi = $row['DiaChi'];
            $khachHang->dienThoai = $row['DienThoai'];
            $khachHang->ngaySinh = $row['NgaySinh'];
            $khachHang->gioiTinh = $row['GioiTinh'];
            $khachHang->email = $row['Email'];
            $khachHang->anh = $row['Anh'];
        }
        $conn->close();
        return $khachHang;
    }
    public function layDanhSachKH($tenDangNhap){
        $khachHang =null;
        $conn = $this->ketNoi();
        $sql ="Select MaKH,TenDangNhap,MatKhau,HoTen,Anh from KhachHang where TenDangNhap='".$tenDangNhap."'";
        $ketQua =mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($ketQua)) {
            $khachHang = new KhachHang();
            $khachHang->maKH = $row['MaKH'];
            $khachHang->tenDangNhap = $row['TenDangNhap'];
            $khachHang->matKhau = $row['MatKhau'];
            $khachHang->hoTen = $row['HoTen'];
            $khachHang->anh = $row['Anh'];


        }
        $conn->close();
        return $khachHang;
    }
    public function layDanhSach(){
        $arrKhachHang =Array();
        $conn = $this->ketNoi();
        $sql ="Select * from KhachHang";
        $ketQua =mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($ketQua)){
            $khachHang = new KhachHang();
            $khachHang->maKH = $row['MaKH'];
            $khachHang->tenDangNhap = $row['TenDangNhap'];
            $khachHang->matKhau = $row['MatKhau'];
            $khachHang->hoTen = $row['HoTen'];
            $khachHang->diaChi = $row['DiaChi'];
            $khachHang->dienThoai = $row['DienThoai'];
            $khachHang->ngaySinh = $row['NgaySinh'];
            $khachHang->gioiTinh = $row['GioiTinh'];
            $khachHang->email = $row['Email'];
            $khachHang->anh = $row['Anh'];
            array_push($arrKhachHang,$khachHang);
        }
        $conn->close();
        return $arrKhachHang;
    }

    public function themMoi($khachHang)
    {
        $conn = $this->ketNoi();
        $sqlInsert = "Insert into KhachHang(TenDangNhap,MatKhau,HoTen,DiaChi,DienThoai,NgaySinh,
GioiTinh,Email,Anh) values (?,?,?,?,?,?,?,?,?)";
        $comm = $conn->prepare($sqlInsert);
        $comm->bind_param("sssssssss", $khachHang->tenDangNhap, $khachHang->matKhau,
            $khachHang->hoTen, $khachHang->diaChi, $khachHang->dienThoai, $khachHang->ngaySinh,
            $khachHang->gioiTinh, $khachHang->email, $khachHang->anh);
        $ketQua = $comm->execute();
        $comm->close();
        $conn->close();
        if ($ketQua) {
            return true;
        }
        return false;
    }
    public function sua($khachHang)
    {
        $conn = $this->ketNoi();
        $sqlUpdate = "Update KhachHang set MatKhau=?,HoTen=?,DiaChi=?,DienThoai=?,
    NgaySinh=?,GioiTinh=?,Email=?,Anh=? Where MaKH=?";
        $comm = $conn->prepare($sqlUpdate);
        $comm->bind_param("ssssssssd",$khachHang->matKhau,
            $khachHang->hoTen,$khachHang->diaChi,$khachHang->dienThoai,$khachHang->ngaySinh,
            $khachHang->gioiTinh,$khachHang->email,$khachHang->anh);
        $ketQua = $comm->execute();
        $comm->close();
        $conn->close();
        if ($ketQua) {
            return true;
        }
        return false;
    }
    public function xoa($maKH)
    {
        $conn = $this->ketNoi();
        $sqlDelete = "Delete from KhachHang where MaKH =?";
        $comm = $conn->prepare($sqlDelete);
        $comm->bind_param("d", $maKH);
        $ketQua = $comm->execute();
        $comm->close();
        $conn->close();
        if ($ketQua) {
            return true;
        }
        return false;
    }
}