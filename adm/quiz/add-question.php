<?php
$sub_menu = "110300";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'w');


?>

<script type='text/javascript'>
var pp=1;

function submit_quiz()
{
	$ques=$('#ques').val();
	$catid=$('#cat').val();
	$opt1=$('#opt1').val();
	$opt2=$('#opt2').val();
	$opt3=$('#opt3').val();
	$opt4=$('#opt4').val();
	$catstatus=$('#catstatus').val();
	$ans=$('#ans').val();
	$imptid=$('#imptid').val();

	if ($ques=="") {
		$('#error_msg').html("문제를 입력하세요.")
	}
	else if ($opt1=="" || $opt2=="") {
		$('#error_msg').html("최소 2개의 예문을 입력해야 합니다.")
	}
	else if ($ans=="") {
		$('#error_msg').html("정답을 넣으세요.")
	}
	else
	{
		     $.ajax({
                    type: "POST",
                    url: "./ajx-addquiz.php",
                    data:{ques:$ques,catid:$catid,opt1:$opt1,opt2:$opt2,opt3:$opt3,opt4:$opt4,catstatus:$catstatus,ans:$ans,imptid:$imptid},
                    success: function(data){

                       $('#error_msg').html("");
                 $('#msg').html(data);

		 setTimeout(function(){
			if ($imptid=="add") {
			 window.location.href="./add-question.php";
			}
			else
			{
     	            window.location.reload();
			}
                          },1000);
                    }
                });
	}
}
</script>
<?php
$g5['title'] = '문제 추가';
include_once(G5_ADMIN_PATH.'/admin.head.php');

$sub = $_POST['submit'];
$dat = date('y-m-d');
$eid=$_GET['eid'];
if($eid!="")
{

$edit_res = sql_query("select * from okbank_quiz where id='$eid'");
$row=sql_fetch_array($edit_res);
$ques=trim($row['question']);
$opt1=trim($row['opt1']);
$opt2=trim($row['opt2']);
$opt3=trim($row['opt3']);
$opt4=trim($row['opt4']);
$qstatus=trim($row['status']);
$answer=trim($row['answer']);
$catidd=$row['catid'];
$edit_cat_name = sql_query("select * from okbank_category where id='$catidd'");
$cat_row=sql_fetch_array($edit_cat_name);
$edit_cat_name=$cat_row['category'];
}
// $res = sql_query("SELECT * FROM okbank_category where status='release' order by id  ");
$res = sql_query("SELECT * FROM okbank_category order by id  ");
 ?>

<div style="margin:4px auto;color:#ff0000;font-size:1.3em;font-weight:bold;padding:10px;text-align:center;">
<div id="error_msg" class="errortext"></div>
<div id="msg"></div>
</div>

<form name=de method='post' action=''>

<div class="tbl_frm01 tbl_wrap">
	<table>
	<tr>
        <th scope="row"  style="width:120px"><label for="quiz_subject">문제<strong class="sound_only">필수</strong></label></th><td><textarea name=question  id='ques' value=''  style="width:100%"><?php echo $ques?></textarea></td>
    </tr>
	<tr>
        <th scope="row"><label for="quiz_category">과목 : </label></th><td><select name='cat' id='cat' class='selectbox'>
		<?php
			 while($line = sql_fetch_array($res))
		           {
				 $catid=$line['id'];
				 $catname=$line['category'];
				 if($edit_cat_name!="")
				   echo "<option value='$catidd'>$edit_cat_name</option>";
			        echo "<option value='$catid'>$catname</option>";

			   }
			   ?>
			</select></td>
    </tr>
	<tr>
        <th scope="row"><label for="quiz_answer1">예문1</label></th><td><input type=text name=opt1 id='opt1' value='<?php echo $opt1?>'  class="frm_input" style="width:100%" maxlength="220"></td>
    </tr>
     <tr>
        <th scope="row"><label for="quiz_answer2">예문2</label></th><td><input type=text name=opt2 id='opt2' value='<?php echo $opt2?>' class="frm_input"  style="width:100%" maxlength="220"></td>
    </tr>
    <tr>
        <th scope="row"><label for="quiz_answer3">예문3</label></th><td><input type=text name=opt3 id='opt3' value='<?php echo $opt3?>' class="frm_input" style="width:100%" maxlength="220"></td>
    </tr>
    <tr>
        <th scope="row"><label for="quiz_answer4">예문4</label></th><td><input type=text name=opt4 id='opt4' value='<?php echo $opt4?>' class="frm_input" style="width:100%" maxlength="220"></td>
    </tr>
	<tr>
        <th scope="row"><label for="quiz_answer">정답 : </label></th><td><select name='ans' id='ans' class='selectbox'>
			<?php
			if($answer!="")
			  echo "<option value='$answer'>예문 $answer</option>";
			echo "<option value='1'>예문 1</option><option value='2'>예문 2</option><option value='3'>예문 3</option><option value='4'>예문 4</option></select>";
			?></td>
    </tr>
	<tr>
        <th scope="row"  style="width:120px"><label for="cate_status">상태 : </label></th>
		<td><select name='catstatus' id='catstatus'>
		<option value='release' <?php echo ($qstatus=='release')? 'selected':''?>>사용</option>
		<option value='suspend' <?php echo ($qstatus=='suspend')? 'selected':''?>>보류</option>
		</select></td>
    </tr>
	</table>

</div>

<div class="btn_confirm01 btn_confirm">
<?php
			if($eid=="")
                          echo "<input name=submit type='button' value='확인' class='btn_submit' onclick='submit_quiz()'><input type='hidden' value='add' id='imptid'>";
			else
			  echo "<input name=submit type='button' value='수정' class='btn_submit' onclick='submit_quiz()'><input type='hidden' value='$eid' id='imptid'>";

			echo "</span></form></div>";



include_once(G5_ADMIN_PATH.'/admin.tail.php');
?>
