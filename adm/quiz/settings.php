<?php
$sub_menu = "110100";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'w');

?>
<script type='text/javascript'>
var pp=1;

function submit_settings()
{
	$quiznum=$('#qnum').val();
	$pnum=$('#num').val();
	$etime=$('#etime').val();



		     $.ajax({//Make the Ajax Request
                    type: "POST",
                    url: "./ajx-update-settings.php",
                    data:{quiznum:$quiznum,pnum:$pnum,etime:$etime},
                    success: function(data){


                 $('#msg').html("<span>"+data+"</span>");

		 setTimeout(function(){

			 window.location.href="./settings.php";

                          },1000);
                    }
                });

}
</script>
<?php
$g5['title'] = '환경설정';
include_once(G5_ADMIN_PATH.'/admin.head.php');

$res = sql_query("SELECT * FROM okbank_settings where id='1'");
if($res)
{
$row=sql_fetch_array($res);
$quiznum=$row['quiznum'];
$pnum=$row['pagenum'];
$examtime =$row['examtime'];
$examtimearr=explode(":","$examtime");
$examtime_val=$examtimearr[0].":".$examtimearr[1];
}
?>
<div style="margin:4px auto;color:#ff0000;font-size:1.3em;font-weight:bold;padding:10px;text-align:center;">
	<div id="error_msg" class="errortext"></div>
	<div id="msg"></div>
</div>

<form name=de method='post' action=''>
<div class="tbl_frm01 tbl_wrap">
	<table>
	<tr>
		<th scope="row"  style="width:180px"><label for="quiz_nu">1회 문제수 : </label></th><td><select name='qnum' id='qnum' class='selectbox'>
		<?php
			echo "<option value='$quiznum'>$quiznum</option>";
			for($i=1;$i<=40;$i++)
			{
				echo "<option value='$i'>$i</option>";

			}
			?>
			</select></td><td>사용자가 1회에 푸는 문제수 </td>
    </tr>
	<tr>
		<th scope="row"  style="width:180px"><label for="quiz_nu">한페이지당 문제수 : </label></th><td><select name='num' id='num' class='selectbox'>
		<?php
			echo "<option value='$pnum'>$pnum</option>";
			for($i=1;$i<=20;$i++)
			{
				echo "<option value='$i'>$i</option>";

			}
			?>
			</select></td><td>사용자가 문제를 풀 때 페이지당 노출되는 문제수 </td>
    </tr>
	<tr>
        <th scope="row"><label for="quiz_time"> 시험시간 : </label></th><td><select name='etime' id='etime'>
		<option value='<?php echo $examtime?>'><?php echo $examtime?></option>
		<option value="00:30:00">00:30:00</option>
		<option value="00:45:00">00:45:00</option>
		<option value="01:00:00">01:00:00</option>
		<option value="01:15:00">01:15:00</option>
		<option value="01:45:00">01:45:00</option>
		<option value="02:00:00">02:00:00</option>
		<option value="02:15:00">02:15:00</option>
		<option value="02:30:00">02:30:00</option>
		<option value="02:45:00">02:45:00</option>
		<option value="03:00:00">03:00:00</option>
		<option value="03:30:00">03:30:00</option>
		<option value="04:00:00">04:00:00</option>
		</select></td><td>사용자가 과목을 선택하고 문제를 푸는 시간</td>
    </tr>
    </table>

</div>

<div class="btn_confirm01 btn_confirm">
	<input name=submit type='button' value="확인" class='btn_submit' onclick='submit_settings()'>
</div>

</form>

<?php

include_once(G5_ADMIN_PATH.'/admin.tail.php');
?>
