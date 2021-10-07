<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Trang Chủ</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <!--[if IE 6]>
    <link rel="stylesheet" type="text/css" href="css/iecss.css" />
    <![endif]-->
    <script type="text/javascript" src="js/boxOver.js"></script>
</head>
<body>
<div id="main_container">
    <div class="top_bar">
        <div class="top_search">
            <input type="text" class="search_input" name="search" />
            <input type="image" src="images/search.gif" class="search_bt"/>
        </div>
    <div id="header">
        <!--<div id="logo"> <a href="http://www.stanford.com.vn"><img src="images/logo.png" alt="" border="0" width="237" height="140" /></a> </div>
        <div class="oferte_content">
            <div class="top_divider"><img src="images/header_divider.png" alt="" width="1" height="164" /></div>
            <div class="oferta">
                <div class="oferta_content"> <img src="images/laptop.png" width="94" height="92" alt="" border="0" class="oferta_img" />
                    <div class="oferta_details">
                        <div class="oferta_title">Samsung GX 2004 LM</div>
                        <div class="oferta_text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </div>
                        <a href="details.html" class="details">details</a> </div>
                </div>
                <div class="oferta_pagination"> <span class="current">1</span> <a href="http://www.stanford.com.vn">2</a> <a href="http://www.stanford.com.vn">3</a> <a href="http://www.stanford.com.vn">4</a> <a href="http://www.stanford.com.vn">5</a> </div>
            </div>
            <div class="top_divider"><img src="images/header_divider.png" alt="" width="1" height="164" /></div>--!>
        </div>
        <!-- end of oferte_content-->
    </div>
    <?php session_start();
    ?>
    <div id="main_content">
        <div id="menu_tab">
            <div class="left_menu_corner"></div>

            <div class="right_menu_corner"></div>

        </div>

        <!-- end of left content -->
        <div class="center_content">
            <div class="center_title_bar">Danh sách laptop</div>
            <?php
            include_once "LapTopBusiness.php";
            $busl = new LapTopBusiness();
            $lapTop = $busl->layDanhSach();
            foreach ($lapTop as $lT){ ?>
            <div class="prod_box">
                <div class="top_prod_box"></div>
                <div class="center_prod_box">
                    <div class="product_title"><a href="ChiTiet.php?maLT=<?php echo $lT->maLT ?>&maKH=<?php echo $_SESSION['maKH'] ?>"><?php echo $lT->tenLT ?></a></div>
                    <div class="product_img"><a href="ChiTiet.php?maLT=<?php echo $lT->maLT ?>&maKH=<?php echo $_SESSION['maKH'] ?>"><img width="100px" height="100px" src="../assets/images/LapTop/<?php echo $lT->hinhMinhHoa ?>" alt="<?php echo $lT->tenLT ?>" border="0" /></a></div>
                    <div class="prod_price"><span class="price"><?php echo $lT->donGia."vnđ" ?></span></div>
                </div>
                <div class="bottom_prod_box"></div>
        <div class="prod_details_tab" style="margin-left: 30px"> <a href="MuaHang.php?maLT=<?php echo $lT->maLT ?>&maKH=<?php echo $_SESSION['maKH'] ?>" title="header=[Mua hàng] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" border="0" class="left_bt" /></a> <a href="ChiTiet.php?maLT=<?php echo $lT->maLT ?>&maKH=<?php echo $_SESSION['maKH'] ?>" class="prod_details">Chi tiết</a> </div>
            </div><?php }?>
        </div>
        <!-- end of center content -->
        <div class="right_content">
            <div class="shopping_cart">
                <div class="cart_title">Giỏ hàng của tôi</div>
                <div class="cart_details"> 3 items <br />
                    <span class="border_cart"></span> Tổng tiền: <span class="price">350$</span> </div>
                <div class="cart_icon"><a href="GioHang.php?maKH=<?php echo $_SESSION['maKH'] ?>" title="header=[Giỏ hàng của tôi] body=[&nbsp;] fade=[on]"><img src="images/shoppingcart.png" alt="" width="48" height="48" border="0" /></a></div>
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
            <div class="banner_adds"> <a href="http://www.stanford.com.vn"><img src="images/bann1.jpg" alt="" border="0" /></a> </div>
        </div>
        <!-- end of right content -->
    </div>
    <!-- end of main content -->
    <div class="footer">
        <div class="left_footer"> <img src="images/footer_logo.png" alt="" width="170" height="49"/> </div>
        <div class="center_footer"> Template name. All Rights Reserved 2014<br />
            <a href="http://csscreme.com"><img src="images/csscreme.jpg" alt="csscreme" border="0" /></a><br />
            <img src="images/payment.gif" alt="" /> </div>
        <div class="right_footer"> <a href="http://www.stanford.com.vn">home</a> <a href="http://www.stanford.com.vn">about</a> <a href="http://www.stanford.com.vn">sitemap</a> <a href="http://www.stanford.com.vn">rss</a> <a href="contact.html">contact us</a> </div>
    </div>
</div>
<!-- end of main_container -->
<div align=center>Địa chỉ: Số 20 ngõ 678 Đường Láng, Đống Đa, Hà Nội</div></body>
</html>
