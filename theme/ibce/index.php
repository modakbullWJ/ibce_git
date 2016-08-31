<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');

?>


    <div id="main_contents">

                        <div class="info_area">
                                <ul>
                                        <li class="seminar">

                                         <?php echo latest("theme/seminar", "seminar", 5, 20);  ?>

                                               <!--  <h3>세미나정보</h3>

                                                <ul>
                                                    <li><a href="#">[리우 종목분석] '태극기 휘날리며' 한국 요트, 기...</a></li>
                                                    <li><a href="#">김현웅, 진경준 사건 사죄…"범죄수익 환수만전"</a></li>
                                                    <li><a href="#">SKT·CJH 합병 불허…케이블TV업계 '사면초가'</a></li>
                                                    <li><a href="#">中 '굿윌헌팅'?…택배 노동자가 복잡한 수학문제 ...</a></li>
                                                    <li><a href="#">우병우 처가-넥슨 부동산거래 의혹 당사자들 "사...</a></li>
                                                </ul> -->
                                        </li>
                                        <li class="community">
                                         <?php echo latest("theme/lib", "form_lib", 5, 20);  ?>
                                               <!--  <h3>커뮤니티</h3>
                                                <ul>
                                                    <li><a href="#">[리우 종목분석] '태극기 휘날리며' 한국 요트, 기...</a></li>
                                                    <li><a href="#">김현웅, 진경준 사건 사죄…"범죄수익 환수만전"</a></li>
                                                    <li><a href="#">SKT·CJH 합병 불허…케이블TV업계 '사면초가'</a></li>
                                                    <li><a href="#">中 '굿윌헌팅'?…택배 노동자가 복잡한 수학문제 ...</a></li>
                                                    <li><a href="#">우병우 처가-넥슨 부동산거래 의혹 당사자들 "사...</a></li>
                                                </ul> -->
                                        </li>
                                        <li class="calendar">
                                        <h3><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=schedule">연간 일정표 <span>I Schedule</span></a></h3>
                                                <?php echo latest("theme/hp5_calendar_wr_theme", "schedule", 1, 1, 1,"228,41,21");  ?>
                                        </li>
                                </ul>
                        </div>

                        <div class="board_area">
                                <ul>
                                        <li class="notice">
                                          <?php echo latest("theme/notice", "notice", 5, 20);  ?>
                                               <!--  <h3>공지사항</h3>
                                                <ul>
                                                    <li><a href="#">[리우 종목분석] '태극기 휘날리며' 한국 요트, 기...</a></li>
                                                    <li><a href="#">김현웅, 진경준 사건 사죄…"범죄수익 환수만전"</a></li>
                                                    <li><a href="#">SKT·CJH 합병 불허…케이블TV업계 '사면초가'</a></li>
                                                    <li><a href="#">中 '굿윌헌팅'?…택배 노동자가 복잡한 수학문제 ...</a></li>
                                                    <li><a href="#">우병우 처가-넥슨 부동산거래 의혹 당사자들 "사...</a></li>
                                                </ul> -->
                                        </li>
                                        <li class="photo_gallery">


                                        <?php echo latest("theme/gallery_latest", "ct_gallery", 4, 10);  ?>


												<!--
                                                <h3>갤러리</h3>
                                                <ul>
                                                    <li><a href="#"><span>반짝반짝 갤러리이미지</span><img src="<?php echo G5_URL ?>/theme/ibce/img/gall_img.png" alt="갤러리이미지" /></a></li>
                                                    <li><a href="#"><span>반짝반짝 갤러리이미지</span><img src="<?php echo G5_URL ?>/theme/ibce/img/gall_img.png" alt="갤러리이미지" /></a></li>
                                                    <li><a href="#"><span>반짝반짝 갤러리이미지</span><img src="<?php echo G5_URL ?>/theme/ibce/img/gall_img.png" alt="갤러리이미지" /></a></li>
                                                    <li><a href="#"><span>반짝반짝 갤러리이미지</span><img src="<?php echo G5_URL ?>/theme/ibce/img/gall_img.png" alt="갤러리이미지" /></a></li>
                                                </ul> -->
                                        </li>
                                </ul>
                        </div>

                        <div class="clients_area">
                                <div class="clients_wrap">
                                        <h3>협력회사 로고</h3>
										<div id="clients_img">
												<ul class="d_img">
													<li class="d_pos1"><a href="http://tea100.co.kr/"><img src="<?php echo G5_URL ?>/theme/ibce/img/client01.png" alt="1"/></a></li>
													<li class="d_pos2"><a href="#"><img src="<?php echo G5_URL ?>/theme/ibce/img/client02.png" alt="2"/></a></li>
													<li class="d_pos3"><a href="#"><img src="<?php echo G5_URL ?>/theme/ibce/img/client03.png" alt="3"/></a></li>
													<li class="d_pos4"><a href="http://www.cubetree.co.kr/"><img src="<?php echo G5_URL ?>/theme/ibce/img/client04.png" alt="4"/></a></li>
													<li class="d_pos5"><a href="#"><img src="<?php echo G5_URL ?>/theme/ibce/img/client05.png" alt="5"/></a></li>
													<li class="d_pos6"><a href="http://hostcube.co.kr/"><img src="<?php echo G5_URL ?>/theme/ibce/img/client06.png" alt="6"/></a></li>
													<!--<li class="d_pos7"><a href="#"><img src="<?php echo G5_URL ?>/theme/ibce/img/client01.png" alt="7"/></a></li>-->

												</ul>
												<p class="d_prev"><img src="<?php echo G5_URL ?>/theme/ibce/img/r-prev-btn.png" alt="이전"></p>
												<p class="d_next"><img src="<?php echo G5_URL ?>/theme/ibce/img/r-next-btn.png" alt="다음"></p>
										</div>
										<script>

											$('#clients_img').DB_rotateRollingBanner({
												key:"c65806",            //라이센스키
												moveSpeed:500,            //속도
												autoRollingTime:2500      //자동롤링(밀리초)
											})
										</script>
                                </div>
                        </div>



                </div>




























<!-- <h2 class="sound_only">최신글</h2>
<!-- 최신글 시작 { -->
<?php
//  최신글
// $sql = " select bo_table
//             from `{$g5['board_table']}` a left join `{$g5['group_table']}` b on (a.gr_id=b.gr_id)
//             where a.bo_device <> 'mobile' ";
// if(!$is_admin)
//     $sql .= " and a.bo_use_cert = '' ";
// $sql .= " order by b.gr_order, a.bo_order ";
// $result = sql_query($sql);
// for ($i=0; $row=sql_fetch_array($result); $i++) {
//     if ($i%2==1) $lt_style = "margin-left:20px";
//     else $lt_style = "";
?>
<!--     <div style="float:left;<?php //echo $lt_style ?>">
        <?php
        // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
        // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
        // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
       // echo latest('theme/basic', $row['bo_table'], 5, 25);
        ?>
    </div>
<?php
//}
?> -->
<!-- } 최신글 끝 -->

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
