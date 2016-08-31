
<div id="main_slide">


					<!--슬라이드-->
					<div id="event_slide_wrap">
							<div class="eventSlide_screen">
										<div class="images" style="display:block"><a href="#"><img src="<?php echo G5_URL ?>/theme/ibce/img/slide01.png" /></a></div>
										<div class="images"><a href="#"><img src="<?php echo G5_URL ?>/theme/ibce/img/slide02.png" /></a></div>
										<div class="images"><a href="#"><img src="<?php echo G5_URL ?>/theme/ibce/img/slide03.png" /></a></div>
										<div class="images"><a href="#"><img src="<?php echo G5_URL ?>/theme/ibce/img/slide04.png" /></a></div>
							</div>
							<div class="eventSlide_right_tab">
									<ul class="clsBannerButton">
											<li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub3_2"><img src="<?php echo G5_URL ?>/theme/ibce/img/slide_btn1.png" oversrc="<?php echo G5_URL ?>/theme/ibce/img/slide_btn1_on.png" outsrc="<?php echo G5_URL ?>/theme/ibce/img/slide_btn1.png" /></a></li>
											<li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=schedule"><img src="<?php echo G5_URL ?>/theme/ibce/img/slide_btn2.png" oversrc="<?php echo G5_URL ?>/theme/ibce/img/slide_btn2_on.png" outsrc="<?php echo G5_URL ?>/theme/ibce/img/slide_btn2.png" /></a></li>
											<li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=application"><img src="<?php echo G5_URL ?>/theme/ibce/img/slide_btn3.png" oversrc="<?php echo G5_URL ?>/theme/ibce/img/slide_btn3_on.png" outsrc="<?php echo G5_URL ?>/theme/ibce/img/slide_btn3.png" /></a></li>
											<li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub6_3"><img src="<?php echo G5_URL ?>/theme/ibce/img/slide_btn4.png" oversrc="<?php echo G5_URL ?>/theme/ibce/img/slide_btn4_on.png" outsrc="<?php echo G5_URL ?>/theme/ibce/img/slide_btn4.png" /></a></li>
									</ul>
							</div>
					</div>
					<!--슬라이드끝-->



					<script type="text/javascript">
					function Login()
					{
						location.href='login.html';
					}

					$(function() {/*슬라이드제이쿼리*/
						$("#event_slide_wrap").jQBanner({
							nWidth:2000,
							nHeight:500,
							nCount:4,
							isActType:"up",
							nOrderNo:1,
							isStartAct:"N",
							isStartDelay:"Y",
							nDelay:3000,
							isBtnType:"img"
							}
						);
					});

					</script>




      </div>
