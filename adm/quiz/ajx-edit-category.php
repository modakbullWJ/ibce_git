<?php
error_reporting(0);
include_once('./_common.php');

$page = $_REQUEST['page'];

$start = ($page)*10;

$res2 = sql_query("SELECT * FROM okbank_category order by id desc limit $start,10");

echo "<div id='maindiv'>";

//echo $start;

       $delcnt1=sql_num_rows($res2);
	     $tcount=$delcnt1;
	     echo "<input type='hidden' value='$tcount' id='tcount'>";

		echo '<div class="admin_table"><table border="0" cellspacing="0" cellpadding="0" >
        <tr>

          <th>카테고리명</th>
          <th>상태</th>
          <th>수정</th>
	  <th>삭제</th>
	   <th>확인</th>

        </tr>';
	$xx=0;
		$d=0;

		 while($line = sql_fetch_array($res2))
		 {
			$id = $line['id'];

			$catname = $line['category'];
			$catstatus = $line['status'];


			echo "<tr id='row_$id'>";


			echo "<td><input type='text' value='$catname' readonly='readonly' id='catname_$id' class='textbox'></td><td><select name='catstatus' id='catstatus_$id' class='selectbox' disabled='disabled'><option value='$catstatus'>$catstatus</option><option value='release'>사용</option><option value='suspend'>보류</option></select></td>

			<td><a href='javascript:changestatus(\"edit\",$id);'>Edit</a> </td>
			<td><a href='javascript:changestatus(\"delete\",$id);'>delete</a></td>
			<td><input type='button' onclick='changestatus(\"update\",$id)' value='Update' class='form_button' style='float:none;text-align:center;'></td>
			</tr>";
			$xx++;
			$d++;
		}



		echo "</table></div>";

	?>

