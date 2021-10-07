<?php
include_once "DonDatHang.php";
include_once "LapTop.php";
include_once "Data_Provider.php";
class DonDatHangBusiness extends Data_Provider
{
    public function layDanhSach(){
        $arrDonDatHang =Array();
        $conn = $this->ketNoi();
        $sql ="Select MaDH,MaLT,SoLuong,ThanhTien,
        NgayDatHang,HTThanhToan,GhiChu,XuLy,MaKH from DonDatHang Where XuLy=0";
        $ketQua =mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($ketQua)){
            $donDatHang = new DonDatHang();
            $donDatHang->maDH = $row['MaDH'];
            $donDatHang->maLT = $row['MaLT'];
            $donDatHang->soLuong = $row['SoLuong'];
            $donDatHang->thanhTien = $row['ThanhTien'];
            $donDatHang->ngayDatHang = $row['NgayDatHang'];
            $donDatHang->hTThanhToan = $row['HTThanhToan'];
            $donDatHang->xuLy = $row['XuLy'];
            $donDatHang->ghiChu = $row['GhiChu'];
            $donDatHang->maKH = $row['MaKH'];
            array_push($arrDonDatHang,$donDatHang);
        }
        $conn->close();
        return $arrDonDatHang;
    }
    public function layDanhSachTong($maKH){
        $arrDonDatHang =Array();
        $conn = $this->ketNoi();
        $sql ="Select count(MaDH) as 'TongSoLuong',sum(ThanhTien) as 'TongTien' from DonDatHang Where MaKH=".$maKH;
        $ketQua =mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($ketQua)){
            $donDatHang = new DonDatHang();
            $donDatHang->soLuong = $row['TongSoLuong'];
            $donDatHang->thanhTien = $row['TongTien'];
        }
        $conn->close();
        return $donDatHang;
    }

    public function themMoi($donDatHang){
        $conn = $this->ketNoi();
        $sqlInsert ="Insert into DonDatHang(MaLT,SoLuong,ThanhTien,NgayDatHang,HTThanhToan,XuLy,GhiChu,MaKH) values (
            ?,?,?,NOW(),?,0,?,?)";
        $comm = $conn->prepare($sqlInsert);
        $comm->bind_param("dddssd",$donDatHang->maLT,$donDatHang->soLuong,
            $donDatHang->thanhTien,$donDatHang->hTThanhToan,$donDatHang->ghiChu,$donDatHang->maKH);
        $ketQua = $comm->execute();
        $comm->close();
        $conn->close();
        if($ketQua){
            return true;
        }
        return false;
    }
    public function sua($donDatHang)
    {
        $conn = $this->ketNoi();
        $sqlUpdate = "Update DonDatHang set SoLuong=?,ThanhTien=?,NgayDatHang=NOW(),HTThanhToan=?,GhiChu=? 
        Where MaDH=?";
        $comm = $conn->prepare($sqlUpdate);
        $comm->bind_param("ddssdd", $donDatHang->soLuong,
            $donDatHang->thanhTien,$donDatHang->hTThanhToan,$donDatHang->ghiChu,$donDatHang->maDH);
        $ketQua = $comm->execute();
        $comm->close();
        $conn->close();
        if ($ketQua) {
            return true;
        }
        return false;
    }
    public function xoa($maDH)
    {
        $conn = $this->ketNoi();
        $sqlDelete = "Delete from DonDatHang where MaDH =?";
        $comm = $conn->prepare($sqlDelete);
        $comm->bind_param("d", $maDH);
        $ketQua = $comm->execute();
        $comm->close();
        $conn->close();
        if ($ketQua) {
            return true;
        }
        return false;
    }
    public function DonHangChuaXuLy($maKH){
        $arrDonDatHang =Array();
        $conn = $this->ketNoi();
        $sqlTim ="Select MaDH,LapTop.MaLT,TenLT,HinhMinhHoa,DonDatHang.SoLuong,ThanhTien,
 NgayDatHang,HTThanhToan,GhiChu from DonDatHang,LapTop where LapTop.MaLT=DonDatHang.MaLT and XuLy=0 and MaKH=".$maKH;
        $ketQua =mysqli_query($conn,$sqlTim);
        while($row = mysqli_fetch_array($ketQua)){
            $donDatHang = new DonDatHang();
            $donDatHang = new LapTop();
            $donDatHang->maDH =$row['MaDH'];
            $donDatHang->maLT =$row['MaLT'];
            $donDatHang->tenLT = $row['TenLT'];
            $donDatHang->hinhMinhHoa = $row['HinhMinhHoa'];
            $donDatHang->soLuong = $row['SoLuong'];
            $donDatHang->thanhTien = $row['ThanhTien'];
            $donDatHang->ngayDatHang = $row['NgayDatHang'];
            $donDatHang->hTThanhToan = $row['HTThanhToan'];
            $donDatHang->ghiChu = $row['GhiChu'];
            array_push($arrDonDatHang,$donDatHang);
        }
        $conn->close();
        return $arrDonDatHang;
    }
    public function DonHangDaXuLy($maKH){
        $arrDonDatHang =Array();
        $conn = $this->ketNoi();
        $sqlTim ="Select MaDH,TenLT,HinhMinhHoa,DonDatHang.SoLuong,ThanhTien,
 NgayDatHang,HTThanhToan,GhiChu from DonDatHang,LapTop where LapTop.MaLT=DonDatHang.MaLT and XuLy=1 and MaKH=".$maKH;
        $ketQua =mysqli_query($conn,$sqlTim);
        while($row = mysqli_fetch_array($ketQua)){
            $donDatHang = new DonDatHang();
            $donDatHang = new LapTop();
            $donDatHang->maDH =$row['MaDH'];
            $donDatHang->tenLT = $row['TenLT'];
            $donDatHang->hinhMinhHoa = $row['HinhMinhHoa'];
            $donDatHang->soLuong = $row['SoLuong'];
            $donDatHang->thanhTien = $row['ThanhTien'];
            $donDatHang->ngayDatHang = $row['NgayDatHang'];
            $donDatHang->hTThanhToan = $row['HTThanhToan'];
            $donDatHang->ghiChu = $row['GhiChu'];
            array_push($arrDonDatHang,$donDatHang);
        }
        $conn->close();
        return $arrDonDatHang;
    }
    public function suaXL($donDatHang)
    {
        $conn = $this->ketNoi();
        $sqlUpdate = "Update DonDatHang set XuLy = ? Where MaDH=?";
        $comm = $conn->prepare($sqlUpdate);
        $comm->bind_param("dd", $donDatHang->xuLy,$donDatHang->maDH);
        $ketQua = $comm->execute();
        $comm->close();
        $conn->close();
        if ($ketQua) {
            return true;
        }
        return false;
    }
}