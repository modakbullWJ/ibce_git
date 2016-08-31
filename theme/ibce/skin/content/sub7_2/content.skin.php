<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

//로그인 회원만 접근 가능
if ($is_guest)
  alert('로그인 한 회원만 접근하실 수 있습니다. / Please log in.', G5_BBS_URL.'/login.php');


//시험을 본 사람만 접근 가능
$mb_result_confirm = $member['mb_8'];


if($mb_result_confirm =='')
   alert('아직 시험에 응시하지 않으셨습니다. | You have not taken any exam.' );


// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$content_skin_url.'/style.css">', 0);
?>

  <?php include_once(G5_THEME_PATH.'/inc/sub/sub_navi.php'); ?>


  <div id ="exam_list_title">

    <h3>시험결과&nbsp;&nbsp;조회 &nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp; 查&nbsp; 询</h3>
  </div>

  <div id="exam_list">


    <form action="/getdata.php" method="post" >

      <input type="hidden" name="mb_id" value="<?php echo $member['mb_id']; ?>">



<div>
      <input type="button" name=""  id="btn_submit_sch" class="btn_submit" value="시험결과&nbsp;&nbsp;조회하기 &nbsp;&nbsp;&nbsp;&nbsp;  Ι &nbsp;&nbsp;&nbsp;&nbsp; 查&nbsp; 询   ">

       <input type="button" name=""  id="btn_close" class="btn_submit" value="닫기&nbsp;&nbsp; Ι  &nbsp;&nbsp; 关  &nbsp; 闭 ">
     </div>
    </form>


    <div><img src="<?php echo G5_URL ?>/theme/ibce/img/watermark.png" alt="" class="sub7_2_watermark"/></div>


    <div id="apply_table">
      <!-- 제이쿼리 ajax에서 테이블 형태 만든 후에 append -->


    </div>






    <h3> <span id="sub7_2_span">시험접수 /합격 조회 문의</span> &nbsp;&nbsp; E-Mail : ibce0415@naver.com </h3>

  </div>



  <script>

    $(document).ready(function(){

     $('#btn_submit_sch').click(function(){

      $('#apply_table').empty();

      $.ajax({
        type: 'post',
        url: '<?php echo $G5_URL?>/result_ajax/getdata.php',
        data: $('form').serialize(),
        success: function (data) {
          console.log(data);
          $('#apply_table').append(data);

           $('#apply_table').slideDown();

        },
        error: function (request, status, error) {
          console.log('code: '+request.status+"\n"+'message: '+request.responseText+"\n"+'error: '+error);
        }
      });
    });

     $('#btn_close').click(function(){
      $('#apply_table').slideUp('fast');
      $('#apply_table').empty();

    });
   });

 </script>

 <style>

  #apply_table{ margin: auto; width: 97%; font-size:16px;}
  th{width: 300px; height: 100px; text-align: center; background-color: #f4f4f4;}
  td{height: 100px; text-align: center; border-top:1px solid #ba9765; }
  table{border:1px solid #ba9765;}
  th.mb_mc { border-right: 1px solid #ba9765;}
  td.mb_mc{border-right: 1px solid #ba9765;}
  th.mb_subject{width: 400px;}
  td.mb_result{color:red;}
  input#btn_close{ padding: 21px; border: 0; background: #ba9765; color: #fff; letter-spacing: -0.1em; cursor: pointer;font-size:15px;}

</style>
