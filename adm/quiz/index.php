<?php
$sub_menu = "110200";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'r');
$token = get_token();

if ($is_admin != 'super')
    alert('최고관리자만 접근 가능합니다.');

// 문제은행 테이블 생성 -- 과목테이블
if(!sql_query(" DESC okbank_category ", false)) {
    sql_query(" CREATE TABLE IF NOT EXISTS `okbank_category` (
                  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category` varchar(150) DEFAULT NULL,
  `status` enum('suspend','release') DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
                ) ", false);
}

// 문제은행 테이블 생성 -- 문제테이블
if(!sql_query(" DESC okbank_quiz ", false)) {
    sql_query(" CREATE TABLE IF NOT EXISTS `okbank_quiz` (
                  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `catid` varchar(6) DEFAULT NULL,
  `question` varchar(250) DEFAULT NULL,
  `opt1` varchar(100) DEFAULT NULL,
  `opt2` varchar(100) DEFAULT NULL,
  `opt3` varchar(100) DEFAULT NULL,
  `opt4` varchar(100) DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `datee` date DEFAULT NULL,
  `status` enum('suspend','release') DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
                ) ", false);
}

// 문제은행 테이블 생성 -- 결과확인테이블
if(!sql_query(" DESC okbank_results ", false)) {
    sql_query(" CREATE TABLE IF NOT EXISTS `okbank_results` (
                  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mb_id` varchar(60) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `cat_id` int(20) DEFAULT NULL,
  `correct_ans` int(20) DEFAULT NULL,
  `wrong_ans` int(20) DEFAULT NULL,
  `marks` int(20) DEFAULT NULL,
  `datee` varchar(20) DEFAULT NULL,
  `examtime` varchar(50) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
                ) ", false);
}

// 문제은행 테이블 생성 -- 환경설정테이블
if(!sql_query(" DESC okbank_settings ", false)) {
    sql_query(" CREATE TABLE IF NOT EXISTS `okbank_settings` (
                  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `quiznum` varchar(50) NOT NULL DEFAULT '20',
  `pagenum` varchar(50) DEFAULT NULL,
  `examtime` varchar(50) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
                ) ", false);

    sql_query(" INSERT INTO `okbank_settings` (`id`, `quiznum`, `pagenum`, `examtime`) VALUES
(1, '4', '2', '00:10:00')", false);
}

// 문제은행 테이블 생성 끝

$sql_common = " from okbank_quiz ";

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

$g5['title'] = '문제 관리';
include_once(G5_ADMIN_PATH.'/admin.head.php');
$colspan = 9;
?>
<div class="local_ov01 local_ov">
    <?php echo $listall ?>
    전체 <?php echo number_format($total_count) ?>개
</div>

<form name="fquizlist" id="fquizlist" action="./quizlist_delete.php" method="post">
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
        <th scope="col">문제</th>
        <th scope="col">정답</th>
        <th scope="col">예문1</th>
        <th scope="col">예문2</th>
        <th scope="col">예문3</th>
        <th scope="col">예문4</th>
        <th scope="col">상태</th>
        <th scope="col">수정</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0; $row=sql_fetch_array($result); $i++) {
		if($row['status'] == 'release'){
			$quizstatus = "사용";
		}else {
			$quizstatus = "보류";
		}

        $s_mod = '<a href="./add-question.php?'.$qstr.'&amp;eid='.$row['id'].'">수정</a>';
		$bg = 'bg'.($i%2);
    ?>

    <tr class="<?php echo $bg; ?>">
        <td class="td_chk">
            <label for="chk_<?php echo $i; ?>" class="sound_only"><?php echo $row['question']; ?> </label>
            <input type="checkbox" name="chk[]" value="<?php echo $row['id'] ?>" id="chk_<?php echo $i ?>">
        </td>
	    <td><?php echo $row['question']; ?></td>
	    <td class="td_num">예문<?php echo $row['answer']; ?></td>
	    <td class="td_datetime"><?php echo $row['opt1']; ?></td>
        <td class="td_datetime"><?php echo $row['opt2']; ?></td>
        <td class="td_datetime"><?php echo $row['opt3'] ?></td>
        <td class="td_datetime"><?php echo $row['opt4'] ?></td>
	    <td class="td_num"><?php echo $quizstatus; ?></td>
        <td class="td_datetime"><?php echo $s_mod ?></td>
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
    $('#fquizlist').submit(function() {
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