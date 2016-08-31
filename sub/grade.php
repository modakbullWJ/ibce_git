<?php
include_once("../common.php");


include_once(G5_THEME_PATH.'/inc/main/main_head.php');

include_once(G5_THEME_PATH.'/inc/sub/sub_middle_bg.php');

// 회원정보 업데이트를 위해 멤버아이디 변수저장
 $mb_id = $member["mb_id"];




 ?>

<link rel="stylesheet" type="text/css" href="css/style.css" />

<div class="page_navi">
  <p>HOME  &gt;  My Class  &gt;  <strong><?php //echo $g5['title'];?></strong></p>
</div>

<div class="sub_title">
  <p><strong><?php// echo $g5['title'];?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ι &nbsp;&nbsp;</p>
</div>

<div class="contents_area">


	<div id="page-wrap">

		<h1>Final Quiz for Lip building</h1>

    <?php

    $answer1 = $_POST['question-1-answers'];
    $answer2 = $_POST['question-2-answers'];
    $answer3 = $_POST['question-3-answers'];
    $answer4 = $_POST['question-4-answers'];
    $answer5 = $_POST['question-5-answers'];
    $answer6 = $_POST['question-6-answers'];
    $answer7 = $_POST['question-7-answers'];
    $answer8 = $_POST['question-8-answers'];
    $answer9 = $_POST['question-9-answers'];
    $answer10 = $_POST['question-10-answers'];

    $totalCorrect = 0;

    if ($answer1 == "B") { $totalCorrect++; }
    if ($answer2 == "A") { $totalCorrect++; }
    if ($answer3 == "C") { $totalCorrect++; }
    if ($answer4 == "D") { $totalCorrect++; }
    if ($answer5 == "A") { $totalCorrect++; }
    if ($answer6 == "A") { $totalCorrect++; }
    if ($answer7 == "A") { $totalCorrect++; }
    if ($answer8 == "A") { $totalCorrect++; }
    if ($answer9 == "A") { $totalCorrect++; }
    if ($answer10 == "A") { $totalCorrect++; }




    if($totalCorrect >= 7){
     $result = "y";
   }else{
     $result = "n";
   }
   $result_yn = trim($result);

   if($result_yn == "y"){
    $level_up = 3;
   }else{
    $level_up = 2;
   }

// 시험 한번 보면 포인트를 0으로 만들기
   $pointdone = 0;

   $sql = " update {$g5['member_table']}
   set
   mb_level = '$level_up',
   mb_point = '$pointdone',
   mb_8 = '$result_yn',
   mb_9 = '".G5_TIME_YMDHIS."'
   where mb_id = '$mb_id' ";
   sql_query($sql);


         //   echo "<div id='results'>$totalCorrect / 5 correct</div>";
   echo"<div id ='results'>  $totalCorrect / $result  수고하셨습니다. Thank you.</div>";
   ?>

 </div>



 <?php
 include_once(G5_THEME_PATH.'/tail.php');
 ?>
