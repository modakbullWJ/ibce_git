<?php
$sub_menu = "400200";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'r');

$token = get_token();


if ($is_admin != 'super')
  alert('최고관리자만 접근 가능합니다.');



$sql_common = " from g5_write_reissue ";

$sql_search = " where mb_id not in ('admin')  ";
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
  $sst  = "mb_id";
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

$g5['title'] = '재발급신청현황';
include_once(G5_ADMIN_PATH.'/admin.head.php');

$colspan = 12;
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
      <option value="name"<?php echo get_selected($_GET['sfl'], "name"); ?>>이름</option>
    </select>
    <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
    <input type="text" name="stx" value="<?php echo $stx ?>" id="stx" required class="required frm_input">
    <input type="submit" class="btn_submit" value="검색">
  </div>
</form>

<form name="fquizresult" id="fquizresult" action="./reissue_list_delete.php" method="post">
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
           <th scope="col">글 링크</th>
          <th scope="col"><?php echo subject_sort_link('wr_8', '', 'desc') ?>회원고유코드</a></th>
          <th scope="col"><?php echo subject_sort_link('mb_id') ?>아이디</a></th>
          <th scope="col"><?php echo subject_sort_link('wr_2', '', 'desc') ?>이름</a></th>
          <th scope="col"><?php echo subject_sort_link('wr_email', '', 'desc') ?>이메일</a></th>
          <th scope="col"><?php echo subject_sort_link('wr_3', '', 'desc') ?>전화번호</a></th>
          <th scope="col"><?php echo subject_sort_link('wr_4', '', 'desc') ?>휴대폰번호</a></th>
          <th scope="col"><?php echo subject_sort_link('wr_content', '', 'desc') ?>합격 자격종목/등급</a></th>
          <th scope="col"><?php echo subject_sort_link('wr_5', '', 'desc') ?>합격분야</a></th>
                    <th scope="col"><?php echo subject_sort_link('wr_6', '', 'desc') ?>취득일자</a></th>
          <th scope="col"><?php echo subject_sort_link('wr_7', '', 'desc') ?>시험신청일자</a></th>
        </tr>
      </thead>
      <tbody>

        <?php
        for ($i=0; $row=sql_fetch_array($result); $i++) {

     //   $catid = $row['cat_id'];
     //   $sql2 = "SELECT category FROM okbank_category where id='$catid'";
     //   $row2 = sql_fetch($sql2);
     //   $cat_name=$row2['category'];

     // $bg = 'bg'.($i%2);

// var_dump($row);

// exit;


          ?>

          <tr class="<?php echo $bg; ?>">
           <td class="td_chk">
            <label for="chk_<?php echo $i; ?>" class="sound_only"><?php echo $row['wr_name']; ?> </label>
            <input type="checkbox" name="chk[]" value="<?php echo $row['wr_id'] ?>" id="chk_<?php echo $i ?>">
            </td>
            <td class="td_num">
            <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=application&wr_id=<?php echo $row['wr_id'] ?>">이동</a>
            </td>
            <td class="td_num"><?php echo $row['wr_8'] ?></td>
            <td class="td_num"><?php echo $row['mb_id']; ?></td>
            <td class="td_num"><?php echo $row['wr_2']; ?></td>
            <td class="td_num"><?php echo $row['wr_email']?></td>
            <td class="td_num"><?php echo $row['wr_3']?></td>
            <td class="td_num"><?php echo $row['wr_4']; ?></td>
            <td class="td_num"><?php echo $row['wr_content']; ?></td>
             <td class="td_num"><?php echo $row['wr_5'] ?></td>
            <td class="td_num"><?php echo $row['wr_6'] ?></td>
            <td class="td_num"><?php echo $row['wr_7'] ?></td>

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
