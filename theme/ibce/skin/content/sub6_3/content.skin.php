<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$content_skin_url.'/style.css">', 0);
?>

  <?php include_once(G5_THEME_PATH.'/inc/sub/sub_navi.php'); ?>


			<img src="<?php echo G5_URL ?>/theme/ibce/img/sub/sub6-3.png" alt="강사모집" />


<!-- / #contents_area /div를 tail.php로 이동  -->
