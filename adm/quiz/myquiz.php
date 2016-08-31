<?php
include_once("_common.php");
if($is_guest)
    alert('회원이시라면 로그인 후 이용해 보십시오.', '../bbs/login.php?url='.urlencode(G5_URL.'/quiz/myquiz.php'));

$sql_common = " from okbank_results ";

$sql_search = " where mb_id = '$member[mb_id]' ";

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

$sql2 = " select *
            {$sql_common}
            {$sql_search}
            {$sql_order}
            limit {$from_record}, {$rows} ";
$qresult = sql_query($sql2);

$g5['title'] = "시험점수 확인하기";
include_once("_head.php");
?>

<div class="local_ov01 local_ov">
    전체 <?php echo number_format($total_count) ?>개
</div>



	<link rel="stylesheet" href="./style.css">
<div class="tbl_head01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?> 목록</caption>
    <thead>
    <tr>
        <th scope="col">과목명</th>
        <th scope="col">정답</th>
        <th scope="col">오답</th>
        <th scope="col">푼문제</th>
        <th scope="col">시간</th>
        <th scope="col">날짜</th>
    </tr>
    </thead>
    <tbody>

    <?php
    for ($i=0; $row=sql_fetch_array($qresult); $i++) {

			$catid = $row['cat_id'];
			$sql2 = "SELECT category FROM okbank_category where id='$catid'";
			$row2 = sql_fetch($sql2);
			$cat_name=$row2['category'];

		$bg = 'bg'.($i%2);
    ?>

    <tr class="<?php echo $bg; ?>">
        <td class="td_num"><?php echo $cat_name ?></td>
        <td class="td_num"><?php echo $row['correct_ans']; ?></td>
        <td class="td_num"><?php echo $row['wrong_ans'] ?></td>
        <td class="td_num"><?php echo $row['marks'] ?></td>
        <td class="td_num"><?php echo $row['examtime'] ?></td>
        <td class="td_num"><?php echo $row['datee'] ?></td>
    </tr>

    <?php
    }

    if ($i==0)
        echo '<tr><td colspan="'.$colspan.'" class="empty_table">자료가 없습니다.</td></tr>';
    ?>
    </tbody>
    </table>
</div>
<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, "{$_SERVER['PHP_SELF']}?$qstr&amp;page="); ?>

<div style="margin:0 auto;padding:20px;border:1px solid #999;"><a href="index.php">문제풀기</a></div>
<?php
include_once ("_tail.php");

?>