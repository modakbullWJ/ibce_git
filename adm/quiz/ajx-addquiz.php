<?php
include_once('./_common.php');

auth_check($auth[$sub_menu], 'w');

$ques=trim($_POST['ques']);
$catid=trim($_POST['catid']);
$opt1=trim($_POST['opt1']);
$opt2=trim($_POST['opt2']);
$opt3=trim($_POST['opt3']);
$opt4=trim($_POST['opt4']);
$catstatus=trim($_POST['catstatus']);
$ans=trim($_POST['ans']);
$imptid=trim($_POST['imptid']);
if($imptid=="add")
{
$dat=date('Y-m-d');
if($ques!="" && $opt1!="" && $opt2!="" && $ans!="" && $catid!="")
{
    $query =  sql_query("INSERT into okbank_quiz set catid='$catid' , question='$ques',opt1='$opt1',opt2='$opt2',opt3='$opt3',opt4='$opt4',answer='$ans',datee='$dat',status='$catstatus'");

    if($query)
    {
       echo "<span>문제가 추가되었습니다.</span>";
    }
    else
     {
         echo "<span>문제가 추가되지 않았습니다.</span>";
     }
}
else
 {
    echo "<span>유효하지 않은 문제와 예문입니다.</span>";
 }
}
else
{

    if($imptid!="")
    {
        $query =  sql_query("update okbank_quiz set catid='$catid' , question='$ques',opt1='$opt1',opt2='$opt2',opt3='$opt3',opt4='$opt4',status='$catstatus',answer='$ans',datee='$dat' where id='$imptid'");
	if($query)
	    echo "<span>문제가 수정되었습니다.</span>";
	else
	    echo "<span>문제 수정에 실패하였습니다.</span>";
    }
}
?>
