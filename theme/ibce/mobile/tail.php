<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


$close_div .='</div> <!--/ .contents_area -->
</div> <!-- /.contents_box -->
</div> <!-- /#sub_contents -->';

$uri= $_SERVER['REQUEST_URI'];


?>

<?php if($uri != '/'){
    echo $close_div;
}
?>

</div>
<!-- /#container -->
</div>
<!-- /div#wrapper -->



<?php// echo poll('theme/basic'); // 설문조사 ?>





<div id="ft">
    <div id="ft_copy">

       <a href="#" id="topbtn"><img src="<?php echo G5_URL ?>/theme/ibce/img/mobile/main/topbtn.png" alt="상단으로"></a>

       <div id="ft_company">

           <!--  <a href="<?php //echo G5_BBS_URL; ?>/content.php?co_id=company">회사소개</a>
            <a href="<?php //echo G5_BBS_URL; ?>/content.php?co_id=privacy">개인정보취급방침</a>
            <a href="<?php //echo G5_BBS_URL; ?>/content.php?co_id=provision">서비스이용약관</a> -->
            Copyright &copy; <b>IBCE</b> All rights reserved.<!-- <a href="#hd" id="ft_totop">상단으로</a> -->
        </div>
        <!--  <address>TEL. 00-000-0000 FAX. 00-000-0000 서울 강남구 강남대로 1<br />대표:홍길동 사업자등록번호:000-00-00000 개인정보관리책임자:홍길동</address> -->
    </div>

    <?php
    if(G5_DEVICE_BUTTON_DISPLAY && G5_IS_MOBILE) { ?>
        <a href="<?php echo get_device_change_url(); ?>" id="device_change">PC 버전으로 보기</a>

        <?php }?>

        <?php


        if ($config['cf_analytics']) {
            echo $config['cf_analytics'];
        }
        ?>

        <script>
            $(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));

    $("#ft_totop").on("click", function() {
        $("html, body").animate({scrollTop:0}, '500');
        return false;
    });
});
</script>


<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>
