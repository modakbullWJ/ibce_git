<?php
include_once('./_common.php');

auth_check($auth[$sub_menu], 'w');

$status=$_POST['status'];
$id=$_POST['id'];
if($status=="delete" && $id!="")
{
    $query=sql_query("delete from okbank_quiz where id='$id'");
}
else if($id!="")
{
 if($status=="release")
    $query=sql_query("update okbank_quiz set status='suspend' where id='$id'");
 else
   $query=sql_query("update okbank_quiz set status='release' where id='$id'");
}
else
{
    echo "유효하지 않습니다.";
}
if($query)
{
    echo "처리되었습니다.";
}
?>
