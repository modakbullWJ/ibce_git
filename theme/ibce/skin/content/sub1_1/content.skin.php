<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$content_skin_url.'/style.css">', 0);


?>

  <!-- 상단 내비 인클루드 통일 2016.8.03  -->
  <?php include_once(G5_THEME_PATH.'/inc/sub/sub_navi.php'); ?>

  <div class="sub1-1">
   <strong>국제뷰티문화교육협회(International Beauty Cultural Education Association)를<br/> 찾아주신 모든 분들께 행운과 발전이 함께 하길 기원합니다.</strong>

   <p>우리 협회는 세계적으로 구성되어 다양하게 뷰티산업의 각 부분별 교육 및 세미나, 대회를 개최하여 권익과 봉사를 위하여 노력하고 있습니다.
     또한, 상호간의 신뢰와 공동복리를 도모하며 뷰티업계의 흐름을 효율적으로 대처하고, 기술과 정보를 서로 교환하면서 교육과 훈련을 촉진하는 고용창출과 뷰티산업의 질적 향상을 도모하고 있습니다.
     우리 협회는 앞으로도 관리운영을 체계적으로 전개하여 전문분야를 활성화하여 뷰티업계에 새로운 위상을 정립하고 세계적 뷰티 산업계의 발전에 이바지 하는 것이 목적입니다.<br/><br/>

     많은 박수와 응원 부탁드립니다. 감사합니다.</p>
     <img src="<?php echo G5_URL ?>/theme/ibce/img/sub/sub1-1.jpg" alt="" />
     <img src="<?php echo G5_URL ?>/theme/ibce/img/sub/watermrk.png" alt="" class="watermark"/>
   </div>

   <!-- / #contents_area /div를 tail.php로 이동  -->
