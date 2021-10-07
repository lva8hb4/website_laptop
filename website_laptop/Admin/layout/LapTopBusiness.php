<?php
include_once "Hang.php";
include_once "DonDatHangBusiness.php";
include_once "LapTop.php";
include_once "Data_Provider.php";

class LapTopBusiness extends Data_Provider
{
    public function layDanhSach(){
        $arrLapTop =Array();
        $conn = $this->ketNoi();
        $sql ="Select MaLT,TenLT,SoLuong,DonGia,MoTa,HinhMinhHoa,CPU,Ram,OCung,CardDoHoa,ManHinh,MaHang From LapTop limit 6";
        $ketQua =mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($ketQua)){
            $lapTop = new LapTop();
            $lapTop->maLT = $row['MaLT'];
            $lapTop->tenLT = $row['TenLT'];
            $lapTop->soLuong = $row['SoLuong'];
            $lapTop->donGia = $row['DonGia'];
            $lapTop->moTa = $row['MoTa'];
            $lapTop->hinhMinhHoa = $row['HinhMinhHoa'];
            $lapTop->cPU = $row['CPU'];
            $lapTop->ram = $row['Ram'];
            $lapTop->oCung = $row['OCung'];
            $lapTop->cardDoHoa = $row['CardDoHoa'];
            $lapTop->manHinh = $row['ManHinh'];
            $lapTop->maHang = $row['MaHang'];

            array_push($arrLapTop,$lapTop);
        }
        $conn->close();
        return $arrLapTop;
    }
    public function layDanhSachTheoHang($maHang){
        $arrLapTop =Array();
        $conn = $this->ketNoi();
        $sql ="Select MaLT,TenLT,SoLuong,DonGia,MoTa,HinhMinhHoa,CPU,Ram,OCung,CardDoHoa,ManHinh,Hang.MaHang 
From LapTop,Hang Where Hang.MaHang=LapTop.MaHang and Hang.maHang=".$maHang." limit 3";
        $ketQua =mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($ketQua)){
            $lapTop = new LapTop();
            $lapTop->maLT = $row['MaLT'];
            $lapTop->tenLT = $row['TenLT'];
            $lapTop->soLuong = $row['SoLuong'];
            $lapTop->donGia = $row['DonGia'];
            $lapTop->moTa = $row['MoTa'];
            $lapTop->hinhMinhHoa = $row['HinhMinhHoa'];
            $lapTop->cPU = $row['CPU'];
            $lapTop->ram = $row['Ram'];
            $lapTop->oCung = $row['OCung'];
            $lapTop->cardDoHoa = $row['CardDoHoa'];
            $lapTop->manHinh = $row['ManHinh'];
            $lapTop->maHang = $row['MaHang'];

            array_push($arrLapTop,$lapTop);
        }
        $conn->close();
        return $arrLapTop;
    }
    public function layDanhSachTop1SLBan(){
        $arrLapTop =Array();
        $conn = $this->ketNoi();
        $sql ="select laptop.MaLT,TenLT,laptop.SoLuong,DonGia,MoTa,HinhMinhHoa,CPU,Ram,OCung,CardDoHoa,ManHinh,MaHang,SUM(dondathang.SoLuong) from dondathang,laptop WHERE laptop.MaLT=dondathang.MaLT GROUP BY MaLT ORDER by SUM(dondathang.MaLT) LIMIT 1";
        $ketQua =mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($ketQua)){
            $lapTop = new LapTop();
            $lapTop->maLT = $row['MaLT'];
            $lapTop->tenLT = $row['TenLT'];
            $lapTop->soLuong = $row['SoLuong'];
            $lapTop->donGia = $row['DonGia'];
            $lapTop->moTa = $row['MoTa'];
            $lapTop->hinhMinhHoa = $row['HinhMinhHoa'];
            $lapTop->cPU = $row['CPU'];
            $lapTop->ram = $row['Ram'];
            $lapTop->oCung = $row['OCung'];
            $lapTop->cardDoHoa = $row['CardDoHoa'];
            $lapTop->manHinh = $row['ManHinh'];
            $lapTop->maHang = $row['MaHang'];

            array_push($arrLapTop,$lapTop);
        }
        $conn->close();
        return $arrLapTop;
    }
    public function layDanhSachTopSLBan(){
        $arrLapTop =Array();
        $conn = $this->ketNoi();
        $sql ="select laptop.MaLT,TenLT,laptop.SoLuong,DonGia,MoTa,HinhMinhHoa,CPU,Ram,OCung,CardDoHoa,ManHinh,MaHang,SUM(dondathang.SoLuong) from dondathang,laptop WHERE laptop.MaLT=dondathang.MaLT GROUP BY MaLT ORDER by SUM(dondathang.SoLuong) Desc LIMIT 3";
        $ketQua =mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($ketQua)){
            $lapTop = new LapTop();
            $lapTop->maLT = $row['MaLT'];
            $lapTop->tenLT = $row['TenLT'];
            $lapTop->soLuong = $row['SoLuong'];
            $lapTop->donGia = $row['DonGia'];
            $lapTop->moTa = $row['MoTa'];
            $lapTop->hinhMinhHoa = $row['HinhMinhHoa'];
            $lapTop->cPU = $row['CPU'];
            $lapTop->ram = $row['Ram'];
            $lapTop->oCung = $row['OCung'];
            $lapTop->cardDoHoa = $row['CardDoHoa'];
            $lapTop->manHinh = $row['ManHinh'];
            $lapTop->maHang = $row['MaHang'];

            array_push($arrLapTop,$lapTop);
        }
        $conn->close();
        return $arrLapTop;
    }
    public function layDanhSachTop1SLNguoiMua(){
        $arrLapTop =Array();
        $conn = $this->ketNoi();
        $sql ="select laptop.MaLT,TenLT,laptop.SoLuong,DonGia,MoTa,HinhMinhHoa,CPU,Ram,OCung,CardDoHoa,ManHinh,MaHang,COUNT(maKH) FROM dondathang,laptop WHERE laptop.MaLT=dondathang.MaLT GROUP by laptop.MaLT ORDER by COUNT(maKH) DESC LIMIT 1";
        $ketQua =mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($ketQua)){
            $lapTop = new LapTop();
            $lapTop->maLT = $row['MaLT'];
            $lapTop->tenLT = $row['TenLT'];
            $lapTop->soLuong = $row['SoLuong'];
            $lapTop->donGia = $row['DonGia'];
            $lapTop->moTa = $row['MoTa'];
            $lapTop->hinhMinhHoa = $row['HinhMinhHoa'];
            $lapTop->cPU = $row['CPU'];
            $lapTop->ram = $row['Ram'];
            $lapTop->oCung = $row['OCung'];
            $lapTop->cardDoHoa = $row['CardDoHoa'];
            $lapTop->manHinh = $row['ManHinh'];
            $lapTop->maHang = $row['MaHang'];

            array_push($arrLapTop,$lapTop);
        }
        $conn->close();
        return $arrLapTop;
    }
    public function layChiTietLapTop($maLT){
        $lapTop =null;
        $conn = $this->ketNoi();
        $sql ="Select MaLT,TenLT,SoLuong,DonGia,MoTa,HinhMinhHoa,CPU,Ram,OCung,CardDoHoa,ManHinh,MaHang From LapTop Where MaLT=".$maLT;
        $ketQua =mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($ketQua)){
            $lapTop = new LapTop();
            $lapTop->maLT = $row['MaLT'];
            $lapTop->tenLT = $row['TenLT'];
            $lapTop->soLuong = $row['SoLuong'];
            $lapTop->donGia = $row['DonGia'];
            $lapTop->moTa = $row['MoTa'];
            $lapTop->hinhMinhHoa = $row['HinhMinhHoa'];
            $lapTop->cPU = $row['CPU'];
            $lapTop->ram = $row['Ram'];
            $lapTop->oCung = $row['OCung'];
            $lapTop->cardDoHoa = $row['CardDoHoa'];
            $lapTop->maHang = $row['MaHang'];
            $lapTop->manHinh = $row['ManHinh'];
        }
        $conn->close();
        return $lapTop;
    }
    public function themMoi($lapTop){
        $conn = $this->ketNoi();
        $sqlInsert ="Insert into LapTop(TenLT,SoLuong,DonGia,MoTa,HinhMinhHoa,CPU,Ram,OCung,CardDoHoa,ManHinh,MaHang)
 values (?,?,?,?,?,?,?,?,?,?,?)";
        $comm = $conn->prepare($sqlInsert);
        $comm->bind_param("sddsssssssd",$lapTop->tenLT,$lapTop->soLuong,$lapTop->donGia,
            $lapTop->moTa,$lapTop->hinhMinhHoa,$lapTop->cPU,$lapTop->ram,$lapTop->oCung,$lapTop->cardDoHoa,$lapTop->manHinh,$lapTop->maHang);
        $ketQua = $comm->execute();
        $comm->close();
        $conn->close();
        if($ketQua){
            return true;
        }
        return false;
    }
    public function sua($lapTop)
    {
        $conn = $this->ketNoi();
        $sqlUpdate = "Update LapTop set TenLT=?,SoLuong=?,DonGia=?,MoTa=?,HinhMinhHoa=?,CPU=?,Ram=?,
OCung=?,CardDoHoa=?,ManHinh=?,MaHang=? Where MaLT=?";
        $comm = $conn->prepare($sqlUpdate);
        $comm->bind_param("sddsssssssdd",$lapTop->tenLT,$lapTop->soLuong,$lapTop->donGia,
            $lapTop->moTa,$lapTop->hinhMinhHoa,$lapTop->cPU,$lapTop->ram,$lapTop->oCung,$lapTop->cardDoHoa,$lapTop->manHinh,$lapTop->maHang,$lapTop->maLT);
        $ketQua = $comm->execute();
        $comm->close();
        $conn->close();
        if ($ketQua) {
            return true;
        }
        return false;
    }
    public function xoa($maLT)
    {
        $conn = $this->ketNoi();
        $sqlDelete = "Delete from LapTop where MaLT =?";
        $comm = $conn->prepare($sqlDelete);
        $comm->bind_param("d", $maLT);
        $ketQua = $comm->execute();
        $comm->close();
        $conn->close();
        if ($ketQua) {
            return true;
        }
        return false;
    }
    public function suaSL($lapTop)
    {
        $conn = $this->ketNoi();
        $sqlUpdate = "Update LapTop set SoLuong=? Where MaLT=?";
        $comm = $conn->prepare($sqlUpdate);
        $comm->bind_param("dd",$lapTop->soLuong,$lapTop->maLT);
        $ketQua = $comm->execute();
        $comm->close();
        $conn->close();
        if ($ketQua) {
            return true;
        }
        return false;
    }
    public function timKiemLapTop($tuKhoa){
        $arrLapTop =Array();
        $conn = $this->ketNoi();
        $sqlTim ="Select MaLT,TenLT,SoLuong,DonGia,MoTa,HinhMinhHoa,CPU,Ram,OCung,CardDoHoa,ManHinh,Hang.TenHang From LapTop,Hang where Hang.MaHang=LapTop.MaHang
And (TenLT like '%".$tuKhoa."' or MoTa like '%".$tuKhoa."%' or CPU like '%".$tuKhoa."%' or Ram like '%".$tuKhoa."%'
or Ocung like '%".$tuKhoa."%' or CardDoHoa like '%".$tuKhoa."%' or ManHinh like '%".$tuKhoa."%' or Hang.TenHang like '%".$tuKhoa."%') limit 3";

        $ketQua =mysqli_query($conn,$sqlTim);
        while($row = mysqli_fetch_array($ketQua)){
            $lapTop = new LapTop();
            $lapTop->maLT = $row['MaLT'];
            $lapTop->tenLT = $row['TenLT'];
            $lapTop->soLuong = $row['SoLuong'];
            $lapTop->donGia = $row['DonGia'];
            $lapTop->moTa = $row['MoTa'];
            $lapTop->hinhMinhHoa = $row['HinhMinhHoa'];
            $lapTop->cPU = $row['CPU'];
            $lapTop->ram = $row['Ram'];
            $lapTop->oCung = $row['OCung'];
            $lapTop->cardDoHoa = $row['CardDoHoa'];
            $lapTop->manHinh = $row['ManHinh'];
            $lapTop->tenHang = $row['TenHang'];
            array_push($arrLapTop,$lapTop);
        }
        $conn->close();
        return $arrLapTop;
    }
    public function timKiemLapTopTheoHang($tuKhoa,$maHang){
        $arrLapTop =Array();
        $conn = $this->ketNoi();
        $sqlTim ="Select MaLT,TenLT,SoLuong,DonGia,MoTa,HinhMinhHoa,CPU,Ram,OCung,CardDoHoa,ManHinh,Hang.TenHang From LapTop,Hang where Hang.MaHang=LapTop.MaHang
And (TenLT like '%".$tuKhoa."' or MoTa like '%".$tuKhoa."%' or CPU like '%".$tuKhoa."%' or Ram like '%".$tuKhoa."%'
or Ocung like '%".$tuKhoa."%' or CardDoHoa like '%".$tuKhoa."%' or ManHinh like '%".$tuKhoa."%' or Hang.TenHang like '%".$tuKhoa."%') and LapTop.maHang=".$maHang." limit 3";

        $ketQua =mysqli_query($conn,$sqlTim);
        while($row = mysqli_fetch_array($ketQua)){
            $lapTop = new LapTop();
            $lapTop->maLT = $row['MaLT'];
            $lapTop->tenLT = $row['TenLT'];
            $lapTop->soLuong = $row['SoLuong'];
            $lapTop->donGia = $row['DonGia'];
            $lapTop->moTa = $row['MoTa'];
            $lapTop->hinhMinhHoa = $row['HinhMinhHoa'];
            $lapTop->cPU = $row['CPU'];
            $lapTop->ram = $row['Ram'];
            $lapTop->oCung = $row['OCung'];
            $lapTop->cardDoHoa = $row['CardDoHoa'];
            $lapTop->manHinh = $row['ManHinh'];
            $lapTop->tenHang = $row['TenHang'];
            array_push($arrLapTop,$lapTop);
        }
        $conn->close();
        return $arrLapTop;
    }
}
