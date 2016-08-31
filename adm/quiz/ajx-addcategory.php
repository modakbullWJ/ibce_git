<?php
include_once('./_common.php');

auth_check($auth[$sub_menu], 'w');

$catname=trim($_POST['catname']);
$catstatus=trim($_POST['catstatus']);
$imptid=trim($_POST['imptid']);

if($imptid=="add")
{
	if($catname!="" && $catstatus!="")
	{
			$chkduplicate=  sql_query("select id from okbank_category where category like '$catname' ");
			$dup_count= sql_num_rows($chkduplicate);
			if($dup_count==0)
			{
				$query =  sql_query("INSERT into okbank_category set category='$catname',status='$catstatus'");
				if($query)
				{
					echo "<font color='green'>과목을 추가하였습니다.</font>";
				}
				else
				{
					echo "<font color='red'>과목이 추가되지 않았습니다.</font>";
				}
			}
			else
			{
				echo "<font color='red'>과목이 이미 있습니다.</font>";
			}
	}
	else
	{
		 echo "<font color='red'>유효하지 않은 과목입니다.</font>";
	}

} else {
	if($imptid!="")
	{
        $query =  sql_query("update okbank_category set category='$catname',status='$catstatus' where id='$imptid'");
	if($query)
	    echo "<span>과목명이 수정되었습니다.</span>";
	else
	    echo "<span>과목명 수정에 실패하였습니다.</span>";
	}

}

?>
