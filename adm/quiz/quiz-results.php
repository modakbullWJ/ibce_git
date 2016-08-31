<?php
$sub_menu = "110300";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'r');

$token = get_token();


$sql_common = " from okbank_results ";

$sql_search = " where (1) ";
if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        default :
            $sql_search .= " ({$sfl} like '%{$stx}%') ";
            break;
    }
    $sql_search .= " ) ";
}

if (!$sst) {
    $sst  = "id";
    $sod = "desc";
}
$sql_order = " order by {$sst} {$sod} ";

$sql = " select count(*) as cnt
            {$sql_common}
            {$sql_search}
            {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select *
            {$sql_common}
            {$sql_search}
            {$sql_order}
            limit {$from_record}, {$rows} ";
$result = sql_query($sql);

$listall = '<a href="'.$_SERVER['PHP_SELF'].'" class="ov_listall">전체목록</a>';

$g5['title'] = '문제 결과';
include_once(G5_ADMIN_PATH.'/admin.head.php');

$colspan = 9;
?>

<div class="local_ov01 local_ov">
    <?php echo $listall ?>
    전체 <?php echo number_format($total_count) ?>개
</div>

<form name="fsearch" id="fsearch" class="local_sch01 local_sch" method="get">
<div class="sch_last">
    <label for="sfl" class="sound_only">검색대상</label>
    <select name="sfl" id="sfl">
        <option value="mb_id"<?php echo get_selected($_GET['sfl'], "mb_id"); ?>>아이디</option>
        <option value="name"<?php echo get_selected($_GET['sfl'], "name"); ?>>성명</option>
    </select>
    <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
    <input type="text" name="stx" value="<?php echo $stx ?>" id="stx" required class="required frm_input">
    <input type="submit" class="btn_submit" value="검색">
</div>
</form>

<form name="fquizresult" id="fquizresult" action="./quizresult_delete.php" method="post">
<input type="hidden" name="sst" value="<?php echo $sst ?>">
<input type="hidden" name="sod" value="<?php echo $sod ?>">
<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
<input type="hidden" name="stx" value="<?php echo $stx ?>">
<input type="hidden" name="page" value="<?php echo $page ?>">
<input type="hidden" name="token" value="<?php echo $token ?>">

<div class="tbl_head01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?> 목록</caption>
    <thead>
    <tr>
        <th scope="col">
            <label for="chkall" class="sound_only">현재 페이지 전체</label>
            <input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
        </th>
        <th scope="col">아이디</th>
        <th scope="col">성명</th>
        <th scope="col">과목명</th>
        <th scope="col">정답</th>
        <th scope="col">오답</th>
        <th scope="col">푼문제</th>

        <th scope="col">시간</th>
        <th scope="col">날짜</th>
         <th scope="col">합격/불합격</th>
    </tr>
    </thead>
    <tbody>

    <?php
    for ($i=0; $row=sql_fetch_array($result); $i++) {

			$catid = $row['cat_id'];
			$sql2 = "SELECT category FROM okbank_category where id='$catid'";
			$row2 = sql_fetch($sql2);
			$cat_name=$row2['category'];

		$bg = 'bg'.($i%2);
    ?>



    <tr class="<?php echo $bg; ?>">
        <td class="td_chk">
            <label for="chk_<?php echo $i; ?>" class="sound_only"><?php echo $row['name']; ?> </label>
            <input type="checkbox" name="chk[]" value="<?php echo $row['id'] ?>" id="chk_<?php echo $i ?>">
        </td>
	    <td class="td_num"><?php echo $row['mb_id']; ?></td>
	    <td class="td_num"><?php echo $row['name']; ?></td>
        <td class="td_num"><?php echo $cat_name ?></td>
        <td class="td_num"><?php echo $row['correct_ans']; ?></td>
        <td class="td_num"><?php echo $row['wrong_ans'] ?></td>
        <td class="td_num"><?php echo $row['marks'] ?></td>
        <td class="td_num"><?php echo $row['examtime'] ?></td>
        <td class="td_num"><?php echo $row['datee'] ?></td>
        <td class="td_num"><?php?></td>
    </tr>

    <?php
    }

    if ($i==0)
        echo '<tr><td colspan="'.$colspan.'" class="empty_table">자료가 없습니다.</td></tr>';
    ?>
    </tbody>
    </table>
</div>

<div class="btn_list01 btn_list">
    <button type="submit">선택삭제</button>
</div>
</form>

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, "{$_SERVER['PHP_SELF']}?$qstr&amp;page="); ?>

<script>
$(function() {
    $('#fquizresult').submit(function() {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
            if (!is_checked("chk[]")) {
                alert("선택삭제 하실 항목을 하나 이상 선택하세요.");
                return false;
            }

            return true;
        } else {
            return false;
        }
    });
});
</script>

<?php

include_once(G5_ADMIN_PATH.'/admin.tail.php');
?>
