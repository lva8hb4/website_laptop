<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Trang chủ</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <!--[if IE 6]>

    <link rel="stylesheet" type="text/css" href="css/iecss.css" />
    <![endif]-->
    <script type="text/javascript" src="js/boxOver.js"></script>
</head>
<body>
<?php session_start();

?>
<div id="main_container">
    <div class="top_bar">
        <div class="top_search">
            <form method="post">
                <input type="text" name="txtsearch" class="search_input" name="search" />
                <input style="margin-top: 5px" type="submit" name="btntimkiem" value="Tìm kiếm"/>
            </form>
        </div>
        <div id="header">
            <div style="margin-top: 30px" id="logo"> <a href="#"><img src="../assets/images/Download/banner2.jfif" style="width: 500px" alt="" border="0" width="237" height="140" /></a> </div>

        </div>
        <div id="main_content">
            <div id="menu_tab">
                <div class="left_menu_corner"></div>
                <ul class="menu">
                    <li><a href="Trang_Chu.php" class="nav1"> Trang chủ</a></li>
                    <li class="divider"></li>
                    <li><a href="https://toplist.vn/top-list/dia-chi-mua-laptop-uy-tin-nhat-tai-ha-noi-12857.htm" class="nav2">Liên hệ</a></li>
                    <li class="divider"></li>
                    <li><a href="DangNhap.php" class="nav3">Đăng nhập</a></li>
                    <li class="divider"></li>
                    <li><a href="SuaKhachHang.php?maKH=<?php echo $_SESSION['maKH'] ?>"> <p align="right">Xin chào <?php echo $_SESSION['hoTen'] ?> <img src="../assets/images/avatars/<?php echo $_SESSION['anh'] ?>" alt=""/></p></a>
                        <a href="DangNhap.php" onclick="return confirm('Bạn muốn đăng xuất???');"><p align="right" style="color: red">Đăng Xuất</p></a>
                    </li>
                </ul>
                <div class="right_menu_corner"></div>
            </div>
            <!-- end of menu tab -->
            <div class="left_content">
                <div class="title_box">Danh mục sản phẩm</div>
                <ul class="left_menu">
                    <?php
                    include_once "HangBusiness.php";
                    $bush = new HangBusiness();
                    $hang = $bush->layDanhSach();
                    foreach ($hang as $h){?>

                        <li class="odd"><a href="DSLapTop_Hang.php?maHang=<?php echo $h->maHang ?>"><?php echo $h->tenHang ?></a></li>
                    <?php } ?>
                </ul>
                <div class="title_box">Laptop bán chạy nhất</div>
                <div style="margin-left: -3px" class="center_title_bar">Laptop bán chạy nhất</div>
                <div class="border_box">
                    <?php
                    include_once "LapTopBusiness.php";
                    $busl = new LapTopBusiness();
                    $lapTop = $busl->layDanhSachTop1SLBan();
                    foreach ($lapTop as $lT){ ?>
                        <div class="product_title"><a href="ChiTiet.php?maLT=<?php echo $lT->maLT ?>&maKH=<?php echo $_SESSION['maKH'] ?>"><?php echo $lT->tenLT ?></a></div>
                        <div class="product_img"><a href="ChiTiet.php?maLT=<?php echo $lT->maLT ?>&maKH=<?php echo $_SESSION['maKH'] ?>"><img width="120px" height="120px" src="../assets/images/LapTop/<?php echo $lT->hinhMinhHoa ?>" alt="<?php echo $lT->tenLT ?>" border="0" /></a></div>
                        <div class="prod_price"><span class="price"><?php $lT->donGia=number_format($lT->donGia, 0, ',', ', '); echo $lT->donGia."vnđ" ?></span></div>
                    <?php } ?>
                </div>
                <div class="title_box">Newsletter</div>
                <div class="border_box">
                    <input type="text" name="newsletter" class="newsletter_input" value="your email"/>
                    <a href="#" class="join">join</a> </div>
                <div class="banner_adds"> <a href="#"><img src="images/bann2.jpg" alt="" border="0" /></a> </div>
            </div>
            <!-- end of left content -->
            <?php
            if(isset($_REQUEST['maHang'])){
                $maHang= $_GET['maHang'];
                $bush = new HangBusiness();
                $hang = $bush->layChiTiet($maHang);
            }
            ?>
            <div class="center_content">
                <div class="center_title_bar">Danh sách laptop hãng <?php echo $hang->tenHang ?></div>
                <?php
                include_once "LapTopBusiness.php";
                if (isset($_POST['btntimkiem'])){
                    $tukhoa = $_POST['txtsearch'];
                    $busl = new LapTopBusiness();
                    $lapTop = $busl->timKiemLapTopTheoHang($tukhoa,$maHang);
                }else{
                    $busl = new LapTopBusiness();
                    $lapTop = $busl->layDanhSachTheoHang($maHang);}
                foreach ($lapTop as $lT){ ?>
                    <div class="prod_box">
                    <div class="top_prod_box"></div>
                    <div class="center_prod_box">
                        <div class="product_title"><a href="ChiTiet.php?maLT=<?php echo $lT->maLT ?>&maKH=<?php echo $_SESSION['maKH'] ?>"><?php echo $lT->tenLT ?></a></div>
                        <div class="product_img"><a href="ChiTiet.php?maLT=<?php echo $lT->maLT ?>&maKH=<?php echo $_SESSION['maKH'] ?>"><img width="120px" height="120px" src="../assets/images/LapTop/<?php echo $lT->hinhMinhHoa ?>" alt="<?php echo $lT->tenLT ?>" border="0" /></a></div>
                        <div class="prod_price"><span class="price"><?php $lT->donGia=number_format($lT->donGia, 0, ',', ', '); echo $lT->donGia."vnđ" ?></span></div>
                    </div>
                    <div class="bottom_prod_box"></div>
                    <div class="prod_details_tab" style="margin-left: 30px"> <a href="MuaHang.php?maLT=<?php echo $lT->maLT ?>&maKH=<?php echo $_SESSION['maKH'] ?>" title="header=[Mua hàng] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" border="0" class="left_bt" /></a> <a href="ChiTiet.php?maLT=<?php echo $lT->maLT ?>&maKH=<?php echo $_SESSION['maKH'] ?>" class="prod_details">Chi tiết</a> </div>
                    </div><?php }?>
            </div>
            <div class="center_content">
                <div class="center_title_bar">Laptop bán chạy</div>
                <?php
                include_once "LapTopBusiness.php";
                $busl = new LapTopBusiness();
                $lapTop = $busl->layDanhSachTopSLBan();
                foreach ($lapTop as $lT){ ?>
                    <div class="prod_box">
                    <div class="top_prod_box"></div>
                    <div class="center_prod_box">
                        <div class="product_title"><a href="ChiTiet.php?maLT=<?php echo $lT->maLT ?>&maKH=<?php echo $_SESSION['maKH'] ?>"><?php echo $lT->tenLT ?></a></div>
                        <div class="product_img"><a href="ChiTiet.php?maLT=<?php echo $lT->maLT ?>&maKH=<?php echo $_SESSION['maKH'] ?>"><img width="120px" height="120px" src="../assets/images/LapTop/<?php echo $lT->hinhMinhHoa ?>" alt="<?php echo $lT->tenLT ?>" border="0" /></a></div>
                        <div class="prod_price"><span class="price"><?php $lT->donGia=number_format($lT->donGia, 0, ',', ', '); echo $lT->donGia."vnđ" ?></span></div>
                    </div>
                    <div class="bottom_prod_box"></div>
                    <div class="prod_details_tab" style="margin-left: 30px"> <a href="MuaHang.php?maLT=<?php echo $lT->maLT ?>&maKH=<?php echo $_SESSION['maKH'] ?>" title="header=[Mua hàng] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" border="0" class="left_bt" /></a> <a href="ChiTiet.php?maLT=<?php echo $lT->maLT ?>&maKH=<?php echo $_SESSION['maKH'] ?>" class="prod_details">Chi tiết</a> </div>
                    </div><?php }?>
            </div>
            <!--  <div class="prod_box">
                  <div class="top_prod_box"></div>
                  <div class="center_prod_box">
                      <div class="product_title"><a href="details.html">Motorola 156 MX-VL</a></div>
                      <div class="product_img"><a href="details.html"><img src="images/laptop.gif" alt="" border="0" /></a></div>
                      <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
                  </div>
                  <div class="bottom_prod_box"></div>
                  <div class="prod_details_tab"> <a href="http://www.stanford.com.vn" title="header=[Add to cart] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" border="0" class="left_bt" /></a> <a href="http://www.stanford.com.vn" title="header=[Specials] body=[&nbsp;] fade=[on]"><img src="images/favs.gif" alt="" border="0" class="left_bt" /></a> <a href="http://www.stanford.com.vn" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img src="images/favorites.gif" alt="" border="0" class="left_bt" /></a> <a href="details.html" class="prod_details">details</a> </div>
              </div>
              <div class="prod_box">
                  <div class="top_prod_box"></div>
                  <div class="center_prod_box">
                      <div class="product_title"><a href="details.html">Iphone Apple</a></div>
                      <div class="product_img"><a href="details.html"><img src="images/p4.gif" alt="" border="0" /></a></div>
                      <div class="prod_price"><span class="price">270$</span></div>
                  </div>
                  <div class="bottom_prod_box"></div>
                  <div class="prod_details_tab"> <a href="http://www.stanford.com.vn" title="header=[Add to cart] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" border="0" class="left_bt" /></a> <a href="http://www.stanford.com.vn" title="header=[Specials] body=[&nbsp;] fade=[on]"><img src="images/favs.gif" alt="" border="0" class="left_bt" /></a> <a href="http://www.stanford.com.vn" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img src="images/favorites.gif" alt="" border="0" class="left_bt" /></a> <a href="details.html" class="prod_details">details</a> </div>
              </div>
              <div class="prod_box">
                  <div class="top_prod_box"></div>
                  <div class="center_prod_box">
                      <div class="product_title"><a href="details.html">Samsung Webcam</a></div>
                      <div class="product_img"><a href="details.html"><img src="images/p5.gif" alt="" border="0" /></a></div>
                      <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
                  </div>
                  <div class="bottom_prod_box"></div>
                  <div class="prod_details_tab"> <a href="http://www.stanford.com.vn" title="header=[Add to cart] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" border="0" class="left_bt" /></a> <a href="http://www.stanford.com.vn" title="header=[Specials] body=[&nbsp;] fade=[on]"><img src="images/favs.gif" alt="" border="0" class="left_bt" /></a> <a href="http://www.stanford.com.vn" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img src="images/favorites.gif" alt="" border="0" class="left_bt" /></a> <a href="details.html" class="prod_details">details</a> </div>
              </div>
          </div>--> s
            <!-- end of center content -->
            <?php include_once "DonDatHangBusiness.php";
            $maKH = $_SESSION['maKH'];
            $busdDH = new DonDatHangBusiness();
            $donDatHang = $busdDH->layDanhSachTong($maKH);
            ?>
            <div class="right_content" style="<?php if (isset($_POST['btntimkiem'])){
                    $tukhoa = $_POST['txtsearch'];
                    $busl = new LapTopBusiness();
                    $lapTop = $busl->timKiemLapTopTheoHang($tukhoa,$maHang);}
                    if($lapTop!=null) echo "margin-top:-590px"; else echo "margin-top:-330px";
                    ?>">
                <div style="margin-top: 285px" class="shopping_cart">
                    <div class="cart_title">Giỏ hàng</div>
                    <div class="cart_details"><?php echo $donDatHang->soLuong; ?> đơn hàng <br />
                        <span class="border_cart"></span> Tổng tiền: <br/><span class="price"><?php $donDatHang->thanhTien=number_format($donDatHang->thanhTien, 0, ',', ', '); echo $donDatHang->thanhTien."vnđ"; ?></span> </div>
                    <div class="cart_icon"><a href="GioHang.php?maKH=<?php echo $_SESSION['maKH'] ?>" title="header=[Giỏ hàng của tôi] body=[&nbsp;] fade=[on]"><img src="images/shoppingcart.png" alt="" width="48" height="48" border="0" /></a></div>
                </div>
                <div class="title_box">Laptop nhiều người mua nhất</div>
                <div style="margin-left: -28px" class="center_title_bar">Laptop nhiều người mua nhất</div>
                <div class="border_box">
                    <?php
                    include_once "LapTopBusiness.php";
                    $busl = new LapTopBusiness();
                    $lapTop = $busl->layDanhSachTop1SLBan();
                    foreach ($lapTop as $lT){ ?>
                        <div class="product_title"><a href="ChiTiet.php?maLT=<?php echo $lT->maLT ?>&maKH=<?php echo $_SESSION['maKH'] ?>"><?php echo $lT->tenLT ?></a></div>
                        <div class="product_img"><a href="ChiTiet.php?maLT=<?php echo $lT->maLT ?>&maKH=<?php echo $_SESSION['maKH'] ?>"><img width="120px" height="120px" src="../assets/images/LapTop/<?php echo $lT->hinhMinhHoa ?>" alt="<?php echo $lT->tenLT ?>" border="0" /></a></div>
                        <div class="prod_price"><span class="price"><?php $lT->donGia=number_format($lT->donGia, 0, ',', ', '); echo $lT->donGia."vnđ" ?></span></div>
                    <?php } ?>
                </div>
                <div class="title_box">Hãng sản xuất</div>
                <ul class="left_menu">
                    <?php
                    include_once "HangBusiness.php";
                    $bush = new HangBusiness();
                    $hang = $bush->layDanhSach();
                    foreach ($hang as $h){?>

                        <li class="odd"><a href="DSLapTop_Hang.php?maHang=<?php echo $h->maHang ?>"><?php echo $h->tenHang ?></a></li>
                    <?php } ?>
                </ul>
                <div class="banner_adds"> <a href="#"><img src="images/bann1.jpg" alt="" border="0" /></a> </div>
            </div>
            <!-- end of right content -->
        </div>
        <!-- end of main content -->
        <div class="footer">
            <div class="left_footer"> <img src="images/footer_logo.png" alt="" width="170" height="49"/> </div>
            <div class="center_footer"> Template name. All Rights Reserved 2014<br />
                <a href="http://csscreme.com"><img src="images/csscreme.jpg" alt="csscreme" border="0" /></a><br />
                <img src="images/payment.gif" alt="" /> </div>
            <div class="right_footer"> <a href="http://www.stanford.com.vn">home</a> <a href="http://www.stanford.com.vn">about</a> <a href="http://www.stanford.com.vn">sitemap</a> <a href="http://www.stanford.com.vn">rss</a> <a href="">contact us</a> </div>
        </div>
    </div><!-- end of main_container -->
</html>

