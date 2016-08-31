<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);


//add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/jquery.bxslider.notice.css">', 0);

?>


<div class="lat">
    <!-- <strong class="lat_title"><a href="<?php// echo G5_BBS_URL ?>/board.php?bo_table=<?php// echo $bo_table ?>"><?php //echo $bo_subject ?></a></strong> -->
    <ul class="bxslider_footer" id="bx_notice">
    <?php for ($i=0; $i<count($list); $i++) {  ?>
        <li>
            <?php
            //echo $list[$i]['icon_reply']." ";
            echo "<a href=\"".$list[$i]['href']."\">";
            if ($list[$i]['is_notice'])
                echo $list[$i]['subject'];
            else
                echo $list[$i]['subject'];

            if ($list[$i]['comment_cnt'])
                echo $list[$i]['comment_cnt'];

            echo "</a>";

            // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
            // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

            if (isset($list[$i]['icon_new'])) echo " " . $list[$i]['icon_new'];
            if (isset($list[$i]['icon_hot'])) echo " " . $list[$i]['icon_hot'];
            if (isset($list[$i]['icon_file'])) echo " " . $list[$i]['icon_file'];
            if (isset($list[$i]['icon_link'])) echo " " . $list[$i]['icon_link'];
            if (isset($list[$i]['icon_secret'])) echo " " . $list[$i]['icon_secret'];
             ?>
        </li>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    <li>게시물이 없습니다.</li>
    <?php }  ?>
    </ul>
    <div class="lat_more"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><span class="sound_only"><?php echo $bo_subject ?></span>더보기</a></div>
</div>


<script>
    $(document).ready(function(){
        $('.bxslider_footer').bxSlider({
           mode: 'vertical',// 가로 방향 수평 슬라이드

           speed: 200,        // 이동 속도를 설정
           pager: false,      // 현재 위치 페이징 표시 여부 설정
          // moveSlides: 1,     // 슬라이드 이동시 개수
          //  slideWidth: 300,   // 슬라이드 너비
          // minSlides: 1,      // 최소 노출 개수
         //  maxSlides: 1,      // 최대 노출 개수
         //  slideMargin: 5,    // 슬라이드간의 간격
           auto: true,        // 자동 실행 여부
           autoHover: true,   // 마우스 호버시 정지 여부
           controls: false,   // 이전 다음 버튼 노출 여부
           randomStart: false  // 무작위 시작
        });
    });
</script>
