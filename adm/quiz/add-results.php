<?php
include_once("_common.php");
$wans=$_POST['wans'];
$cans=$_POST['cans'];
$catid=$_POST['catid'];
$etime=$_POST['examtime'];
$cdate=date("Y-m-d");


    if($catid!="" && $wans!="" && $cans!="" && $is_member)
    {
        $query =  sql_query("INSERT into okbank_results set mb_id='$member[mb_id]' , name='$member[mb_name]' , cat_id='$catid' , correct_ans='$cans',wrong_ans='$wans',marks='$cans',datee='$cdate',examtime='$etime'");
       $_SESSION['catid']="";
	   $quiz_staus=0;
    }

?>
