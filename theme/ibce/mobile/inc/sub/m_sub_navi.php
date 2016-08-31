<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<?php
// 서브페이지 통합 코드 sub1
if($co_id == 'sub1_1'){
  $head_subject = '인사말';
  $sub_subject = 'Greeting';
  $p_navi_se = '협회소개';
  $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg02.png';
}
if ($co_id == 'sub1_2') {
 $head_subject = '조직도';
 $sub_subject = 'Organization Chart';
 $p_navi_se = '협회소개';
 $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg02.png';

}
if ($co_id == 'sub1_3') {
 $head_subject = '협력단체';
 $sub_subject = 'Cooperating Group';
 $p_navi_se = '협회소개';
 $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg02.png';
}


// 서브페이지 통합 코드 sub2
if($co_id == 'sub2_1'){
  $head_subject = '민간등록자격증';
  $sub_subject = 'Certificate';
  $p_navi_se = '자격증정보';
  $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg03.png';
}
if ($co_id == 'sub2_2') {
 $head_subject = '자격기본법';
 $sub_subject = 'Fundamental Act of Qualification';
 $p_navi_se = '자격증정보';
 $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg03.png';
}
if ($co_id == 'sub2_3') {
 $head_subject = '민간자격제도';
 $sub_subject = 'System of Qualification';
 $p_navi_se = '자격증정보';
 $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg03.png';
}

// 서브페이지 통합 코드 sub3
if($board['bo_table'] == 'schedule'){
  $head_subject = '시험일정 안내';
  $sub_subject = 'Schedule of The Examinations';
  $p_navi_se = '자격시험';
  $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg01.png';
}
if ($board['bo_table'] == 'application') {
 $head_subject = '시험접수';
 $sub_subject = 'Application of The Examinations';
 $p_navi_se = '자격시험';
 $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg01.png';
}
if ($board['bo_table'] == 'reissue') {
 $head_subject = '재발급 신청';
 $sub_subject = 'Reissue of The Certificate';
 $p_navi_se = '자격시험';
 $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg01.png';
}
if ($co_id == 'sub3_1') {
 $head_subject = '자격증 안내';
 $sub_subject = 'Informatins of The Certificate';
 $p_navi_se = '자격시험';
 $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg01.png';
}
if ($co_id == 'sub3_2') {
 $head_subject = '시험 안내';
 $sub_subject = 'Informatins of The Examinations';
 $p_navi_se = '자격시험';
 $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg01.png';
}

// 서브페이지 통합 코드 sub4
if($board['bo_table'] == 'form_lib'){
  $head_subject = '서식자료실';
  $sub_subject = 'The libray of Forms';
  $p_navi_se = '자료실';
  $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg04.png';
} if ($board['bo_table'] == 'info_lib') {
 $head_subject = '정보자료실';
 $sub_subject = 'The libray of Information';
 $p_navi_se = '자료실';
 $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg04.png';
}

// 서브페이지 통합 코드 sub5
if($board['bo_table'] == 'seminar'){

  $head_subject = '세미나정보';
  $sub_subject = 'Information of Seminars';
  $p_navi_se = '커뮤니티';
  $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg05.png';

}




// 서브페이지 통합코드 sub6
if($board['bo_table'] == 'notice'){
  $head_subject = '공지사항';
  $sub_subject = 'Notice';
  $p_navi_se = '고객센터';
  $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg07.png';
} if ($board['bo_table'] == 'ct_gallery') {
 $head_subject = '갤러리';
 $sub_subject = 'Gallery';
 $p_navi_se = '고객센터';
 $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg07.png';
}if ( $qaconfig['qa_title']  == 'Q&A') {
 $head_subject = 'Q&A';
 $sub_subject = 'Q&A';
 $p_navi_se = '고객센터';
 $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg07.png';
}if ($co_id == 'sub6_3') {
 $head_subject = '강사모집';
 $sub_subject = 'Recruiting of Lecturers';
 $p_navi_se = '고객센터';
 $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg07.png';
}



// 서브페이지 통합코드 sub7
if($board['bo_table'] == 'c_1'){
  $head_subject = 'C-1 Class';
  $sub_subject = 'Taking the Examination';
  $p_navi_se = ' My Class';
  $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg06.png';
} if ($board['bo_table'] == 'c_2') {
 $head_subject = 'C-2 Class';
 $sub_subject = 'Taking the Examination';
 $p_navi_se = ' My Class';
 $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg06.png';
}if ($board['bo_table'] == 'master') {
 $head_subject = 'Master Class';
 $sub_subject = 'Taking the Examination';
 $p_navi_se = ' My Class';
 $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg06.png';
}if ($co_id == 'sub7_1') {
 $head_subject = '시험관리하기';
 $sub_subject = 'Managation of The Examination';
 $p_navi_se = ' My Class';
 $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg06.png';
}if ($co_id == 'sub7_2') {
 $head_subject = '시험결과조회';
 $sub_subject = 'Result of The Examination';
 $p_navi_se = ' My Class';
 $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg06.png';
}


// 회원가입 페이지
$basename = basename($_SERVER["PHP_SELF"]);

if ($basename  == 'login.php') {
 $head_subject = 'Login';
 $sub_subject = 'Login';
 $p_navi_se = ' Login';
 $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg02.png';
}

if($basename  == 'register.php'){

 $head_subject = '회원가입약관';
 $sub_subject = '회원가입약관';
 $p_navi_se = ' 회원가입';
 $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg02.png';

}
if($basename  == 'register_form.php'){
  $head_subject = '회원정보 작성';
 $sub_subject = 'Register Form';
 $p_navi_se = ' 회원가입';
 $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg02.png';

}

if($basename  == 'register_result.php'){
  $head_subject = '회원가입 완료 / 확인';
 $sub_subject = 'Register Result';
 $p_navi_se = ' 회원가입';
 $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg02.png';

}

if($basename  == 'register_email.php'){
  $head_subject = 'E-mail 재인증';
 $sub_subject = 'reauthorization';
 $p_navi_se = ' 회원가입';
 $title_bg = G5_URL.'/theme/ibce/img/sub/title_bg02.png';

}


?>

<!-- 내용관리 페이지 배경? -->
<div id="sub_contents">

  <div class="contents_box">



    <!-- 페이지 표시 -->
    <div class="page_navi">
      <p><a href="/">HOME</a>  &gt;  <?php echo $p_navi_se ?>   &gt;  <strong><?php echo $head_subject ?></strong></p>
    </div>

    <!-- 상단 타이틀 -->
    <div class="sub_title">
      <p><strong><?php echo $head_subject ?></strong>&nbsp;&nbsp;&nbsp; l &nbsp;&nbsp; <?php echo $sub_subject?></p>
      <img class="sub_title_img" src="<?php echo $title_bg ?>" alt="" class=""/>
    </div>

    <!-- 내용 추가 -->
    <div class="contents_area">





