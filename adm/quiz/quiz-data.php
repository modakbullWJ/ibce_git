<?php
$sub_menu = "110000";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'r');

$page = $_REQUEST['page'];

$start = ($page)*10;

$res2 = sql_query("SELECT * FROM okbank_quiz order by id desc limit $start,10");
$delcnt1=sql_num_rows($res2);
$tcount=$delcnt1;
?>

<table>
<input type='hidden' value='<?php echo $tcount?>' id='tcount'>
<tr><th>문제</th><th>정답</th><th>예문1</th><th>예문2</th><th>상태</th><th>삭제</th><th>수정</th></tr>

<?php

$xx=0;
$d=0;

	while($line = sql_fetch_array($res2))
		 {
			$id = $line['id'];

			$qns = $line['question'];
			$ans = $line['answer'];
			$opt1 = $line['opt1'];
			$opt2 = $line['opt2'];


			$date = $line['datee'];
			$status = $line['status'];
			if($status=='suspend')
			 {
			   $stle_bg="style='background-color:#C16161;color:#fff;text-shadow:none;'";
			 }
		         else
			  {
			    $stle_bg="";
			  }
			echo "<tr id='row_$id'>";


			echo "<td>$qns</td><td>예문 $ans</td>
			<td>$opt1</td><td>$opt2</td><td $stle_bg id='status_$id'><a href='javascript:changestatus(\"$status\",$id);' id='href_status_$id'> $status</a></td>

			<td> <a href='javascript:changestatus(\"delete\",$id);'>삭제</a></td>
			<td><a href='./add-question.php?eid=$id'>수정</a></td>
			</tr>";
$xx++;
$d++;
		}
?>

</table>
