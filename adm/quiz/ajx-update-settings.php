<?php
include_once('./_common.php');

auth_check($auth[$sub_menu], 'w');

$quiznum=$_POST['quiznum'];
$etime=$_POST['etime'];
$pnum=$_POST['pnum'];
if($etime=="" || $pnum=="" || $quiznum=="")
{
	$msg="유효하지 않습니다.";
}
else
{
    $query=sql_query("update okbank_settings set quiznum='$quiznum' , pagenum='$pnum' ,examtime='$etime' where id='1'");
    if($query)
    {
	$msg="처리되었습니다.";
    }
}

    echo $msg;

?>
