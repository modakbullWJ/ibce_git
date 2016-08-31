<?php
include_once('./_common.php');

auth_check($auth[$sub_menu], 'd');

$status=$_POST['status'];
$id=$_POST['id'];
$catname=$_POST['catname'];
$catstatus=$_POST['catstatus'];
if($id=="")
{
	$msg="유효하지 않습니다.";
}
else if($status=="delete")
{
    $query=sql_query("delete from okbank_category where id='$id'");
    if($query)
    {
	$msg="삭제되었습니다.";
    }
}
else if($status=="update")
{
    $query=sql_query("update okbank_category set category='$catname', status='$catstatus' where id='$id'");

     if($query)
    {
	$msg="수정되었습니다.";
    }

}
else
{
   $msg= "유효하지 않습니다.";
}

    echo $msg;

?>
