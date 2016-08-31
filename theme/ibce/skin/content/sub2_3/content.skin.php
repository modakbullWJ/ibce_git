<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$content_skin_url.'/style.css">', 0);
?>

<!-- 상단 내비 인클루드 통일 2016.8.03  -->
  <?php include_once(G5_THEME_PATH.'/inc/sub/sub_navi.php'); ?>



    <!--<img src="../img/sub/sub.png" alt="" />-->

    <script type="text/javascript">
                    //<![CDATA[
                    $(document).ready(function(){
                      $("#lib_tab span").hide();
                      $("#lib_tab span:eq(0)").show();

                      $("#lib_tab h3 a").bind("click focus",function(){
                        $("#lib_tab span").hide();
                        $(this).parent().next().show();

                          //버튼색상활성화
                          $("#lib_tab h3 img").each(function(){
                            $(this).attr("src",$(this).attr("src").replace("on.png","off.png"));
                          })

                          $(this).children().attr("src",
                            $(this).children().attr("src").replace("off.png","on.png"));
                        })
                    })
                    //]]>
                  </script>

                  <div id="lib_wrap">
                    <ul id="lib_tab">

                      <li><h3 class="lib1"><a href="javascript:void();"><img src="<?php echo G5_URL ?>/theme/ibce/img/sub/lib-tab1_on.png" alt="" /></a></h3>
                        <span>
                          <ul class="lib_tab_ul">
                            <li>
                              <h4>민간자격관리 운영센터</h4>
                              <p>민간자격관리운영센터는 자격기본법에 의거한 민간자격제도의 관리 · 운영을 위하여 한국직업능력개발원에 설치되었습니다.</p>
                              <p>빠르게 변화하는 직업사회에서는 '평생직장'이라는 개념보다는 '평생직업'이라는 개념이 통용되고 있습니다. 평생직업을 갖기 위해 국민 개개인이 평생에 걸쳐 자신의 능력을 개발해 나가고 새로운 진로를 개척해 나가는 일이야말로 개인의 삶의 질 향상측면에서 중요한 요소가 아닐까 생각합니다. <br/> 또한, 국민 개개인의 노력과 능력개발 등을 바탕으로 국가의 경쟁력이 강화될 수 있을 것이라 생각됩니다.</p>
                              <div>
                                민간자격관리운영센터는 국민 개개인의 능력개발에 필요한 자격정보제공 및 민간자격제도 등을 지원하기 위해 아래와 같은 역할을 수행하고 있습니다.
                                <ul>
                                 <li>민간자격 국가공인제도 시행</li>
                                 <li>민간자격 등록제도 시행</li>
                                 <li>민간자격 광고모니터링 조사</li>
                                 <li>민간자격제도 관련 상담</li>
                                 <li>기타 자격제도 관련 정책연구 등</li>
                               </ul>
                             </div>
                           </li>
                           <li>
                            <h4>민간자격제도 연혁</h4>
                            <table>
                              <tr>
                               <th>1959년</th>
                               <td>민간부문에서 주산·부기·타자 등 사무관리분야의 검정제도가 민간전문동호인 단체에 의해 태동</td>
                             </tr>
                             <tr>
                               <th>1964년</th>
                               <td>대한실업교육진흥회가 문교부로부터 허가를 얻어 검정을 실시</td>
                             </tr>
                             <tr>
                               <th>1970년~1976년</th>
                               <td>노동청 허가로 총6개의 검정단체에서 정부기관의 허가를 얻어 법인을 구성하여 검정을 시행</td>
                             </tr>
                             <tr>
                               <th>1977년</th>
                               <td>노동청에서 (사)한국사무능력개발원을 발족하여 정부 감독하에 이관하여 검정시행 (직업훈련법)</td>
                             </tr>
                             <tr>
                               <th>1981,1982년</th>
                               <td>국가기술자격법 개정 및 동법 시행령 개정으로 사무관리분야 검정이 국가기술자격법에 의한 기술자격으로 흡수, 이후 한국직업훈련관리공단에 의해 기술계, 기능계의 자격검정과 함께 일괄 시행</td>
                             </tr>
                             <tr>
                               <th>1984년</th>
                               <td>대한상공회의소에서 검정을 시행</td>
                             </tr>
                             <tr>
                               <th>1997년</th>
                               <td>자격기본법 제정으로 국가외의 자가 자격을 운영할 수 있도록 자격제도를 국가자격과 민간자격을 구분하고 이중 우수한 민간자격을 국가에서 공인할 수 있는 민간자격 국가고인 제도를 마련, 한국직업능력개발원을 민간자격 공인 신청에 따른 조사연구 업무 수행기관으로 규정</td>
                             </tr>
                             <tr>
                               <th>2000년</th>
                               <td>제1차 민간자격 국가공인 제도 시행</td>
                             </tr>
                             <tr>
                               <th>2001년</th>
                               <td>제2차 민간자격 국가공인 제도 시행</td>
                             </tr>
                             <tr>
                               <th>2002년</th>
                               <td>제3차 민간자격 국가공인 제도 시행</td>
                             </tr>
                             <tr>
                               <th>2003년</th>
                               <td>제4차 민간자격 국가공인 제도 시행</td>
                             </tr>
                             <tr>
                               <th>2004년</th>
                               <td>제5차 민간자격 국가공인 제도 시행</td>
                             </tr>
                             <tr>
                               <th>2005년</th>
                               <td>제6차 민간자격 국가공인 제도 시행</td>
                             </tr>
                             <tr>
                               <th>2006년</th>
                               <td>제7차 민간자격 국가공인 제도 시행</td>
                             </tr>
                             <tr>
                               <th>2007년</th>
                               <td>제8차 민간자격 국가공인 제도 시행, 자격기본법령 전부 개정 및 시행규칙 제정</td>
                             </tr>
                             <tr>
                               <th>2008년</th>
                               <td>제9차 민간자격 국가공인 제도 시행, 민간자격 등록제도 시행</td>
                             </tr>
                             <tr>
                               <th>2009년</th>
                               <td>제10차 민간자격 국가공인 제도 시행, 민간자격 등록제도 시행 (총 4회)</td>
                             </tr>



                           </table>
                         </li>
                       </ul>

                     </span>
                   </li>

                   <li><h3 class="lib2"><a href="javascript:void();"><img src="<?php echo G5_URL ?>/theme/ibce/img/sub/lib-tab2_off.png" alt="" /></a></h3>
                    <span>
                      <ul class="lib_tab_ul">
                        <li>
                          <h4>민간자격관리이란?</h4>
                          <p>자격기본법 제 17조 1항에서 신설을 금지하는 분야를 제외하고는 누구나 자율적으로 민간자격을 신설하여 관리·운영하는 것이 가능합니다.</p>
                        </li>
                        <li>
                          <h4>도입배경</h4>
                          <ul>
                           <li>산업사회 발전에 따른 다양한 자격 수요에 부응</li>
                           <li>자격제도관리 주체의 개방화·다원화</li>
                           <li>자격제도 관리·운영의 체계화·효율화</li>
                           <li>자격제도 활성화를 통한 국민의 직업 능력개발 촉진과 사회경제적 지위향상 도모</li>
                           <li>자격제도에 민간부문의 참여를 통한 현장과의 연계성 제고</li>
                           <li>민간 부문을 중심으로한 자격의 국제적 통용성 추구</li>
                         </ul>
                       </li>
                     </ul>

                   </span>
                 </li>
                 <li><h3 class="lib3"><a href="javascript:void();"><img src="<?php echo G5_URL ?>/theme/ibce/img/sub/lib-tab3_off.png" alt="" /></a></h3>
                  <span>
                    <ul class="lib_tab_ul">
                      <li>
                        <h4>민간자격등록이란?</h4>
                        <p><strong>민간자격 등록은 민간자격관리자가 민간자격을 관리·운영하고 있다는 것을 등록관리기관에 등록하는 것으로써,</strong> 등록대장에 자격의 종목명 및 등급, 자격의 관리운영기관에 관한사항, 등록의 신청일 및 등록결정일 등을 기재하는 일련의 행정행위를 말합니다.</p>
                      </li>
                      <li>
                        <h4>도입배경</h4>
                        <ul>
                         <li>민간자격 실태파악 및 자격정보 제공</li>
                         <li>민간자격 종목 및 민간자격 관리·운영기관에 대한 현황 파악</li>
                         <li>체계적으로 관리·등록하여 국민들에게 정확한 민간자격정보 제공</li>
                         <li>금지분야 자격 양산 예방</li>
                         <li>민간자격 금지분야 및 결격사유가 있는 민간자격기관의 양산 사전 예방</li>
                       </ul>
                     </li>
                   </ul>

                 </span>
               </li>

             </ul>

           </div><!--/lib_wrap-->


<!-- / #contents_area /div를 tail.php로 이동  -->
