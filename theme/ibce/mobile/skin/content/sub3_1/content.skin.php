<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$content_skin_url.'/style.css">', 0);
include_once(G5_THEME_MOBILE_PATH.'/inc/sub/m_sub_navi.php');
?>


      <div class="sub3-1">

          <table>
              <colgroup>
                  <col width="15%"><col width="20%"><col width="10%"><col width="15%"><col width="40%">
              </colgroup>
              <tr>
                  <th>분야</th>
                  <th>자격명</th>
                  <th>급수</th>
                  <th>검정형태</th>
                  <th>비고</th>
              </tr>
              <tr>
                  <th rowspan="3">뷰티종합</th>
                  <th rowspan="3">뷰티종합 컨설팅지도사</th>
                  <td>MASTER</td>
                  <td>필기/실기</td>
                  <td class="txt_L">한국직업능력개발원 민간자격 정보서비스 등록 중</td>
              </tr>
              <tr>
                  <td>C-1</td>
                  <td>필기</td>
                  <td class="txt_L">한국직업능력개발원 민간자격 정보서비스 등록 중</td>
              </tr>
              <tr>
                  <td>C-2</td>
                  <td>필기</td>
                  <td class="txt_L">한국직업능력개발원 민간자격 정보서비스 등록 중</td>
              </tr>
          </table>

      </div>

