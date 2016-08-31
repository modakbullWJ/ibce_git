<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$content_skin_url.'/style.css">', 0);
include_once(G5_THEME_MOBILE_PATH.'/inc/sub/m_sub_navi.php');
?>
<table class="exam_guide">

  <tr>
    <th>1. 시험일정</th>
    <td>정시 및 상시 시험<span>*기타 일정문의는 이메일(ibce0415@naver.com)로 문의 바랍니다.</span></td>
  </tr>
  <tr>
    <th>2. 접수방법</th>
    <td>
      <p>응시절차</p>
      <ul>
        <li>1) 이메일 접수 및 홈페이지 접수 </li>
        <li>2) 시험실시 </li>
        <li>3) 합격자 발표 </li>
        <li>4) 증서 및 자격증 발급 </li>
        <!-- <li>5) </li> -->
      </ul>
    </td>
  </tr>
  <tr>
    <th>3. 시험 접수</th>
    <td><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=application" class="go_form">시험접수 바로가기</a></td>
  </tr>
  <tr>
    <th>4. 연락처</th>
    <td>ibce0415@naver.com</td>
  </tr>
  <tr>
    <th>5. 전형료</th>
    <td>이메일(ibce0415@naver.com)로 문의바랍니다.</td>
  </tr>


</table>

