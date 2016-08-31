<?php
include_once('./_common.php');

auth_check($auth[$sub_menu], 'w');

$page = $_REQUEST['page'];

$start = ($page)*10;

$res2 = sql_query("SELECT * FROM okbank_results order by id desc limit $start,10");

		echo '<table border="0" cellspacing="0" cellpadding="0" >
        <tr>

          <th>성명</th>
          <th>카테고리명</th>
          <th>정답</th>
	  <th>오답</th>
	  <th>푼문제</th>
	  <th>시간</th>
	  <th>날짜</th>

        </tr>';
	$xx=0;
		$d=0;

		 while($line = sql_fetch_array($res2))
		 {
			$id = $line['id'];

			$name = $line['name'];
			$catid = $line['cat_id'];
			$res3 = sql_query("SELECT category FROM okbank_category where id='$catid'");
			$crow=sql_fetch_array($res3);
			$cat_name=$crow['category'];

			$cans = $line['correct_ans'];
			$wans = $line['wrong_ans'];
			$marks = $line['marks'];
			$examtime=$line['examtime'];

			$date = $line['datee'];

					echo "<tr id='row_$id'>";


			echo "<td>$name</td><td>$cat_name</td>
			<td>$cans</td><td>$wans</td><td>$marks</td><td>$examtime</td><td>$date</td>


			</tr>";
			$xx++;
			$d++;
		}



		echo "</table>";

	?>

