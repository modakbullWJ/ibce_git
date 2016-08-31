<?php
$sub_menu = "110500";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'w');
?>
<script type='text/javascript'>
var pp=1;

function submit_category()
{
	$catname=$('#catname').val();
	$catstatus=$('#catstatus').val();
	$imptid=$('#imptid').val();

	if ($catname=="") {
		$('#error_msg').html("과목명을 적어주세요.")
	}

	else
	{
		     $.ajax({//Make the Ajax Request
                    type: "POST",
                    url: "./ajx-addcategory.php",
                    data:{catname:$catname,catstatus:$catstatus,imptid:$imptid},
                    success: function(data){

                       $('#error_msg').html("");
                 $('#msg').html(data);

		 setTimeout(function(){

			 window.location.href="./add-category.php";

                          },1000);
                    }
                });
	}
}
</script>

<?php
$g5['title'] = '과목 추가';
include_once(G5_ADMIN_PATH.'/admin.head.php');

$sub = $_POST['submit'];
$eid=$_GET['eid'];

if($eid!="")
{

$edit_res = sql_query("select * from okbank_category where id='$eid'");
$row=sql_fetch_array($edit_res);
$qcategory=trim($row['category']);
$qstatus=trim($row['status']);
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
        <th scope="row"  style="width:120px"><label for="cate_subject">과목명<strong class="sound_only">필수</strong></label></th><td><input type=text name="catname" id='catname' class="required frm_input"    value='<?php echo $qcategory?>' size="100" maxlength="225"></td>
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
                          echo "<input name=submit type='button' value='확인' class='btn_submit' onclick='submit_category()'><input type='hidden' value='add' id='imptid'>";
			else
                          echo "<input name=submit type='button' value='수정' class='btn_submit' onclick='submit_category()'><input type='hidden' value='$eid' id='imptid'>";

			echo "</span></form></div>";


include_once(G5_ADMIN_PATH.'/admin.tail.php');
	?>


