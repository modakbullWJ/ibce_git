<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$content_skin_url.'/style.css">', 0);


if ($is_guest)
  alert('로그인 한 회원만 접근하실 수 있습니다.', G5_BBS_URL.'/login.php');



?>
<?php include_once(G5_THEME_PATH.'/inc/sub/sub_navi.php'); ?>


<div id ="exam_list_title">

  <h3>테스트중입니다</h3>
</div>

<div id="exam_list">


  <form action="/getdata.php" method="post" >

    <input type="hidden" name="mb_id" value="<?php echo $member['mb_id']; ?>">

    <div>
      <input type="button" name=""  id="btn_submit_sch" class="btn_submit" value="시험결과&nbsp;&nbsp;조회하기 &nbsp;&nbsp;&nbsp;&nbsp;  Ι &nbsp;&nbsp;&nbsp;&nbsp; Click&nbsp;&nbsp;to&nbsp;&nbsp;Inquire">

      <input type="button" name=""  id="btn_close" class="btn_submit" value="닫기&nbsp;&nbsp; Ι &nbsp; Close ">
    </div>
  </form>


  <div><img src="<?php echo G5_URL ?>/theme/ibce/img/watermark.png" alt="" class="sub7_2_watermark"/></div>


  <div id="apply_table">

    <ul id ="ul_first">

    </ul>

    <ul id="ul_secd">

    </ul>


  </div>


  <h3> <span id="sub7_2_span">시험접수 /합격 조회 문의</span> &nbsp;&nbsp; E-Mail : ibce0415@naver.com </h3>

</div>



<script>

  $(document).ready(function(){

    $('#apply_table').hide();

    $('#btn_submit_sch').click(function(){

// ul 태그 내부 초기화
$('#ul_first').empty();
$('#ul_secd').empty();

$('#apply_table').slideDown();

// ul_first에 넣을 li태그들
var a = '<li>' + 'Member code'+ '</li>';
var b =    '<li>'+'Name'+'</li>';
var c =  '<li>'+ 'ID' +'</li>';
var d =    ' <li>'+'E-mail'+'</li>';
var e =  '<li>'+'Feild'+'</li>';
var f =  '<li>'+'Subject'+'</li>';
var g = '<li>'+'Class'+'</li>';
var h = '<li id="r_date">'+'Getting date'+'</li>';
var i =  '<li>'+'Result'+'</li>';

// append로 넣기
$('#ul_first').append(  a,b,c,d,e,f,g,h,i );




// ajax의 시작... post로 넘겨주기
$.ajax({
  type: 'post',
  url: '<?php G5_URL?>/result_ajax/getdata2.php',
  data: $('form').serialize(),
  success: function (data) {
        // 통신 성공 후 코드
        var list = $.parseJSON(data);

       // 필요한 것만 list(json) 객체에서 반복문으로 가져오기
       $.each(list, function(i, ab){

        var m_code =  $('<li></li>').text(ab.mb_1);
        var name = $('<li></li>').text(ab.mb_name);
        var id =  $('<li></li>').text(ab.mb_id);
        var email =  $('<li></li>').text(ab.mb_email);
        var field =  $('<li></li>').text(ab.mb_5);
        var subject =  $('<li></li>').text(ab.mb_12);
        var mb_class =  $('<li></li>').text(ab.mb_4);
        var mb_result =  $('<li></li>').text(ab.mb_8);

        // 합격, 불합격 날짜를 구분
        var date_result = "";

        if(ab.mb_8 == "PASS"){
          var g_date = ab.mb_9;

          date_result +=  '<li>' + g_date + '</li>';

          $('#r_date').text('Getting Date');
        } else{
          var f_date = ab.mb_15;

          date_result +=  '<li>' + f_date + '</li>';

          $('#r_date').text('Tried Date');
        }

      //  console.log(date_result);

// ul에 조회결과를 append
$("#ul_secd").append(m_code,name,id,email, field, subject, mb_class, date_result, mb_result );

});

     },
     error: function (request, status, error) {
      // 오류 발생시 에러 코드와 상태를 확인
      console.log('code: '+request.status+"\n"+'message: '+request.responseText+"\n"+'error: '+error);
    }
  });
});
    $('#btn_close').click(function(){
      $('#ul_first').empty();
      $('#ul_secd').empty();
      $('#apply_table').slideUp();


    });
  });

</script>

<style>
  #apply_table{width: 300px; height: 200px;}
  #apply_table > ul{ float: left; margin: 2px; }
  #apply_table > ul > li{font-size: 12px; background-color: black; color: #fff; margin: 5px;}


</style>
