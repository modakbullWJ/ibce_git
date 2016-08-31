<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

$que = "select wr_1 from $write_table where wr_id = '". $_GET["wr_id"] ."'";
$ft = sql_fetch( $que );

if( $ft["wr_1"] ) $wr_1 = $ft["wr_1"];
else  $wr_1 = $member["mb_id"];

?>

<?php include_once(G5_THEME_PATH.'/inc/sub/sub_navi.php'); ?>

<section id="bo_w">
<h2 id="container_title"><?php// echo $g5['title'] ?>
<ul id="container_title_ul">
    <li class="container_title_li"> <strong>개인정보를 수정하시길 원하시는 분들은 회원정보 수정 후에 다시 시도해 주세요.</strong></li>
    <li class="container_title_li">If you want to modify your infomation. Please click the button below.</li>
    <li class="container_title_li"><a class="btn_submit" href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정 / Modify infomation</a></li>
</ul>
</h2>


    <!-- 게시물 작성/수정 시작 { -->
    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>">
    <input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
	<input type="hidden" name="wr_1" value="<?php echo $wr_1 ?>">
    <?php
    $option = '';
    $option_hidden = '';
    if ($is_notice || $is_html || $is_secret || $is_mail) {
        $option = '';
        if ($is_notice) {
            $option .= "\n".'<input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'>'."\n".'<label for="notice">공지</label>';
        }

        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
            } else {
                $option .= "\n".'<input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'."\n".'<label for="html">html</label>';
            }
        }

        if ($is_secret) {
            if ($is_admin || $is_secret==1) {
                $option .= "\n".'<input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'>'."\n".'<label for="secret">비밀글</label>';
            } else {
                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
            }
        }

        if ($is_mail) {
            $option .= "\n".'<input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'>'."\n".'<label for="mail">답변메일받기</label>';
        }
    }

    echo $option_hidden;
    ?>

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <tbody>
        <?php if ($is_name) { ?>
        <tr>
            <th scope="row"><label for="wr_name">이름<strong class="sound_only">필수</strong></label></th>
            <td><input type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name" required class="frm_input required" size="10" maxlength="20"></td>
        </tr>
        <?php } ?>

        <?php if ($is_password) { ?>
        <tr>
            <th scope="row"><label for="wr_password">비밀번호<strong class="sound_only">필수</strong></label></th>
            <td><input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> class="frm_input <?php echo $password_required ?>" maxlength="20"></td>
        </tr>
        <?php } ?>

        <?php if ($is_email) { ?>
        <tr>
            <th scope="row"><label for="wr_email">이메일</label></th>
            <td><input type="text" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="frm_input email" size="50" maxlength="100"></td>
        </tr>
        <?php } ?>

        <?php if ($is_homepage) { ?>
        <tr>
            <th scope="row"><label for="wr_homepage">홈페이지</label></th>
            <td><input type="text" name="wr_homepage" value="<?php echo $homepage ?>" id="wr_homepage" class="frm_input" size="50"></td>
        </tr>
        <?php } ?>

        <?php if ($option) { ?>
        <tr>
            <th scope="row">옵션</th>
            <td><?php echo $option ?></td>
        </tr>
        <?php } ?>

        <?php if ($is_category) { ?>
        <tr>
            <th scope="row"><label for="ca_name">분류<strong class="sound_only">필수</strong></label></th>
            <td>
                <select name="ca_name" id="ca_name" required class="required" >
                    <option value="">선택하세요</option>
                    <?php echo $category_option ?>
                </select>
            </td>
        </tr>
        <?php } ?>

        <tr>
            <th scope="row"><label for="wr_subject">제목 [题目]<strong class="sound_only">필수</strong></label></th>
            <td>
                <div id="autosave_wrapper">
                    <input type="text" name="wr_subject" value="시험 신청 합니다. / 报名. <?php //echo $subject ?>" id="wr_subject" required class="frm_input required" size="50" maxlength="255">
                    <?php if ($is_member) { // 임시 저장된 글 기능 ?>
                    <script src="<?php echo G5_JS_URL; ?>/autosave.js"></script>
                    <button type="button" id="btn_autosave" class="btn_frmline">임시 저장된 글 (<span id="autosave_count"><?php echo $autosave_count; ?></span>)</button>
                    <div id="autosave_pop">
                        <strong>임시 저장된 글 목록</strong>
                        <div><button type="button" class="autosave_close"><img src="<?php echo $board_skin_url; ?>/img/btn_close.gif" alt="닫기"></button></div>
                        <ul></ul>
                        <div><button type="button" class="autosave_close"><img src="<?php echo $board_skin_url; ?>/img/btn_close.gif" alt="닫기"></button></div>
                    </div>
                    <?php } ?>
                </div>
            </td>
        </tr>


  <!-- 폼정보 추가 테스트 -->

<tr>
    <th scope="row"><label for="wr_2">선택분야 [领域]<strong class="sound_only">필수</strong></label></th>
    <td>
    <input type="text" id="wr_2" name="wr_2"  value="뷰티종합" size="10" class ="frm_input required ">
    </td>
</tr>


<tr>
    <th scope="row"><label for="wr_11">선택과목 [科目]<strong class="sound_only">필수</strong></label></th>
    <td>
    <input type="text" id="" name="wr_11" value="뷰티종합 컨설팅지도사" class ="frm_input required ">
    </td>
</tr>

  <tr>
    <th scope="row"><label for="wr_content">등급 [等级]<strong class="sound_only">필수</strong></label></th>
    <td>
        <select class ="frm_input" name="wr_content" required >
          <option value="">Select Class</option>
          <option value="Master">Master</option>
          <option value="C-1">C-1</option>
          <option value="C-2">C-2</option>
      </select>
  </td>
</tr>


<tr>
    <th scope="row"><label for="wr_3">응시지역 [国际]<strong class="sound_only">필수</strong></label></th>
    <td>
        <input type="text" id="wr_3" name="wr_3" value="<?php echo $write['wr_3'] ?>" size="10" class="frm_input required" required>
    </td>
</tr>

<tr>
    <th scope="row"><label for="wr_4">이름 [姓名]<strong class="sound_only">필수</strong></label></th>
    <td>
       <input type="text" id="wr_4" name="wr_4" value="<?php echo $member['mb_name']?>" size="10" class ="frm_input required" maxlength="20" required/>
   </td>
</tr>

<tr>
    <th scope="row"><label for="hp_num">전화번호[电话号码]</label></th>
    <td>

       <input type="text" id="hp_num" name="wr_10" value="<?php echo $member['mb_tel']?>" size="10" class ="frm_input" maxlength="
       20" />

     <!--   <strong> 번호를 수정하시려면 우측에 번호 기입 후 수정버튼을 누르세요.</strong>

       <select class ="frm_input"  id="new_tell_ccode">
          <option value="">Country code</option>
          <option value="+82">Korea +82</option>
          <option value="+81">Japan +81</option>
          <option value="+86">China +86</option>
      </select>

      <input type="text" id="new_tell" maxlength="15" class ="frm_input" placeholder="">

       2016.07.27 전우찬

      <input type="button" id ="modify_tell" value="수정" class="btn_submit"> -->
  </td>
</tr>




<tr>
    <th scope="row"><label for="hp_num">휴대폰번호 [手机号码]</label></th>
    <td>

       <input type="text" id="hp_num" name="wr_5" value="<?php echo $member['mb_hp']?>" size="10" class ="frm_input" maxlength="
       20"/>

      <!--  <strong> 번호를 수정하시려면 우측에 번호 기입 후 수정버튼을 누르세요.</strong>

       <select class ="frm_input"  id="new_hp_ccode">
          <option value="">Country code</option>
          <option value="+82">Korea +82</option>
          <option value="+81">Japan +81</option>
          <option value="+86">China +86</option>
      </select>

      <input type="text" id="new_hp" maxlength="15" class ="frm_input" placeholder="">

      2016.07.27 전우찬

      <input type="button" id ="modify_hp" value="수정" class="btn_submit"> -->
  </td>
</tr>




<tr>
    <th scope="row"><label for="e_mail">E-mail [邮箱]</label></th>
    <td>
        <input type="text" name="wr_6" value="<?php echo $member['mb_email']?>"
        id="e_mail" required class="frm_input email required" size="70" maxlength="100">
    </td>
</tr>


<?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
    <tr>
        <th scope="row">사진(ID Photo) / [证件照]<?php //echo $i+1 ?></th>
        <td>
            <input accept="image/*" type="file" name="bf_file[]" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file frm_input">
            <?php if ($is_file_content) { ?>
                <input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="frm_file frm_input" size="50">
                <?php } ?>
                <?php if($w == 'u' && $file[$i]['file']) { ?>
                    <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>

            <tr>
                <th scope="row"><label for="wr_7">단체명[团体名]</label></th>
                <td>
                <input type="text" name="wr_7" id="wr_7" value="<?php echo $member['mb_2']?>" class="frm_input" size="20">
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="wr_8">단체 전화번호[团体电话号码]</label></th>
                <td>
                <input type="text" name="wr_8" id="wr_8" value="<?php echo $member['mb_3']?>" class="frm_input" size="20">
                   <!--  <strong> 번호를 수정하시려면 우측에 번호 기입 후 수정버튼을 누르세요.</strong>
                    <select class ="frm_input"  id="new_gr_ccode">
                      <option value="">Country code</option>
                      <option value="+82">Korea +82</option>
                      <option value="+81">Japan +81</option>
                      <option value="+86">China +86</option>
                  </select>
                  <input type="text"  id="new_gr_tel"  maxlength="15" class ="frm_input" placeholder="">
                  2016.07.27 전우찬
                  <input type="button" id ="modify_gr_tel" value="수정" class="btn_submit"> -->
              </td>
          </tr>
          <!--회원고유코드 히든 -->
          <input type="hidden" name="wr_9" value="<?php echo $member['mb_1'] ?>">



<!--
                    <tr>
                        <th scope="row"><label for="gr_num">단체 전화번호(Group Number)</label></th>
                        <td>
        <input type="text" name=""  id="gr_num" value="<?php //echo $write['wr_8'] ?>" class="frm_input" size="10" maxlength="20" readonly="readonly">

                              <select name='gr_ccode' class ="frm_input required"  id="gr_ccode">
                  <option value="">Country code</option>
                  <option value="+82">Korea +82</option>
                  <option value="+81">Japan +81</option>
                  <option value="+86">China +86</option>
                  </select>
                <!-- <input type="text" name="mb_hp0" value="" maxlength="4" placeholder="Country code"> -->
            <!--    <input type="text" name="gr_tel1" value="" maxlength="5" class ="frm_input required" placeholder="First Number">
                <input type="text" name="gr_tel2" value="" maxlength="5" class ="frm_input required" placeholder="Second Number">
                <input type="text" name="gr_tel3" value="" maxlength="5" class ="frm_input" placeholder="Third Number">
                2016.07.26 전우찬
                        </td>
                    </tr>
 -->

                    <!-- 여기까지 여분필드 추가 -->








   <!--      <tr>
            <th scope="row"><label for="wr_content">내용<strong class="sound_only">필수</strong></label></th>
            <td class="wr_content">
                <?php //if($write_min || $write_max) { ?>
               최소/최대 글자 수 사용 시
                <p id="char_count_desc">이 게시판은 최소 <strong><?php // echo $write_min; ?></strong>글자 이상, 최대 <strong><?php // echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
                <?php// } ?>
                <?php //echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
                <?php //if($write_min || $write_max) { ?>
                최소/최대 글자 수 사용 시
                <div id="char_count_wrap"><span id="char_count"></span>글자</div>
                <?php //} ?>
            </td>
        </tr> -->

        <?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
            <tr>
                <th scope="row"><label for="wr_link<?php echo $i ?>">링크 #<?php echo $i ?></label></th>
                <td><input type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){echo$write['wr_link'.$i];} ?>" id="wr_link<?php echo $i ?>" class="frm_input" size="50"></td>
            </tr>
            <?php } ?>

       <!--  <?php //for ($i=0; $is_file && $i<$file_count; $i++) { ?>
        <tr>
            <th scope="row">파일 #<?php //echo $i+1 ?></th>
            <td>
                <input type="file" name="bf_file[]" title="파일첨부 <?php // echo $i+1 ?> : 용량 <?php // echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file frm_input">
                <?php // if ($is_file_content) { ?>
                <input type="text" name="bf_content[]" value="<?php // echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="frm_file frm_input" size="50">
                <?php // } ?>
                <?php // if($w == 'u' && $file[$i]['file']) { ?>
                <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php// echo $i;  ?>]" value="1"> <label for="bf_file_del<?php// echo $i ?>"><?php// echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
                <?php// } ?>
            </td>
        </tr>
        <?php //} ?>
 -->
        <?php if ($is_guest) { //자동등록방지  ?>
            <tr>
                <th scope="row">자동등록방지</th>
                <td>
                    <?php echo $captcha_html ?>
                </td>
            </tr>
            <?php } ?>

        </tbody>
    </table>
</div>

<div class="btn_confirm">
    <input type="submit" value="작성완료 [完成]" id="btn_submit" accesskey="s" class="btn_submit">
    <a href="./board.php?bo_table=<?php echo $bo_table ?>" class="btn_cancel">취소 [取消]</a>
</div>
</form>

<script>
    <?php if($write_min || $write_max) { ?>
    // 글자수 제한
        var char_min = parseInt(<?php echo $write_min; ?>); // 최소
        var char_max = parseInt(<?php echo $write_max; ?>); // 최대
        check_byte("wr_content", "char_count");

        $(function() {
            $("#wr_content").on("keyup", function() {
                check_byte("wr_content", "char_count");
            });
        });

        <?php } ?>
    function html_auto_br(obj)
    {
        if (obj.checked) {
            result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
            if (result)
                obj.value = "html2";
            else
                obj.value = "html1";
        }
        else
            obj.value = "";
    }

    function fwrite_submit(f)
    {

        <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

        var subject = "";
        var content = "";
        $.ajax({
            url: g5_bbs_url+"/ajax.filter.php",
            type: "POST",
            data: {
                "subject": f.wr_subject.value,
                "content": f.wr_content.value
            },
            dataType: "json",
            async: false,
            cache: false,
            success: function(data, textStatus) {
                subject = data.subject;
                content = data.content;
            }
        });

        if (subject) {
            alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
            f.wr_subject.focus();
            return false;
        }

        if (content) {
            alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
            if (typeof(ed_wr_content) != "undefined")
                ed_wr_content.returnFalse();
            else
                f.wr_content.focus();
            return false;
        }

        if (document.getElementById("char_count")) {
            if (char_min > 0 || char_max > 0) {
                var cnt = parseInt(check_byte("wr_content", "char_count"));
                if (char_min > 0 && char_min > cnt) {
                    alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                    return false;
                }
                else if (char_max > 0 && char_max < cnt) {
                    alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                    return false;
                }
            }
        }


  }




        <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
    </script>

    <script>

            $(document).ready(function(){

            $('#modify_tel').click(function(){

              var a = $('#new_tel_ccode').val();

              var b = $('#new_tel').val();

              var c = "("+ a +")" + b ;

              console.log(c);

              $('#hp_num').attr('value', c);
          });





            $('#modify_hp').click(function(){

              var a = $('#new_hp_ccode').val();

              var b = $('#new_hp').val();

              var c = "("+ a +")" + b ;

              console.log(c);

              $('#hp_num').attr('value', c);

          });








            $('#modify_gr_tel').click(function(){

              var a = $('#new_gr_ccode').val();

              var b = $('#new_gr_tel').val();

              var c = "("+ a +")" + b ;

              console.log(c);

              $('#wr_8').attr('value', c);

          });

        });
    </script>



</section>
<!-- } 게시물 작성/수정 끝 -->
