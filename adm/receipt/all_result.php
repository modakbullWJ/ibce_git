<?php
$sub_menu = "500200";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'r');

$sql_common = " from {$g5['member_table']} ";


$sql_search = " where (mb_8 = 'PASS' or mb_8 ='FAIL') ";
if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        case 'mb_point' :
            $sql_search .= " ({$sfl} >= '{$stx}') ";
            break;
        case 'mb_level' :
            $sql_search .= " ({$sfl} = '{$stx}') ";
            break;
        case 'mb_tel' :
        case 'mb_hp' :
            $sql_search .= " ({$sfl} like '%{$stx}') ";
            break;
        default :
            $sql_search .= " ({$sfl} like '{$stx}%') ";
            break;
    }
    $sql_search .= " ) ";
}

if ($is_admin != 'super')
    $sql_search .= " and mb_level <= '{$member['mb_level']}' ";

if (!$sst) {
    $sst = "mb_datetime";
    $sod = "desc";
}

$sql_order = " order by {$sst} {$sod} ";

$sql = " select count(*) as cnt {$sql_common} {$sql_search} {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

// 탈퇴회원수
$sql = " select count(*) as cnt {$sql_common} {$sql_search} and mb_leave_date <> '' {$sql_order} ";
$row = sql_fetch($sql);
$leave_count = $row['cnt'];

// 차단회원수
$sql = " select count(*) as cnt {$sql_common} {$sql_search} and mb_intercept_date <> '' {$sql_order} ";
$row = sql_fetch($sql);
$intercept_count = $row['cnt'];

$listall = '<a href="'.$_SERVER['SCRIPT_NAME'].'" class="ov_listall">전체목록</a>';

$g5['title'] = '전체결과목록';
include_once('../admin.head.php');

$sql = " select * {$sql_common} {$sql_search} {$sql_order} limit {$from_record}, {$rows} ";
$result = sql_query($sql);

$colspan = 18;
?>

<div class="local_ov01 local_ov">
    <?php echo $listall ?>
     <?php echo number_format($total_count) ?>명
   <!--  <a href="?sst=mb_intercept_date&amp;sod=desc&amp;sfl=<?php// echo $sfl ?>&amp;stx=<?php// echo $stx ?>">차단 <?php// echo number_format($intercept_count) ?></a>명,
    <a href="?sst=mb_leave_date&amp;sod=desc&amp;sfl=<?php// echo $sfl ?>&amp;stx=<?php //echo $stx ?>">탈퇴 <?php //echo number_format($leave_count) ?></a>명 -->
</div>

<form id="fsearch" name="fsearch" class="local_sch01 local_sch" method="get">

<label for="sfl" class="sound_only">검색대상</label>

<select name="sfl" id="sfl">
    <option value="mb_id"<?php echo get_selected($_GET['sfl'], "mb_id"); ?>>회원아이디</option>
    <option value="mb_name"<?php echo get_selected($_GET['sfl'], "mb_name"); ?>>이름</option>
    <option value="mb_level"<?php echo get_selected($_GET['sfl'], "mb_level"); ?>>권한</option>
    <option value="mb_email"<?php echo get_selected($_GET['sfl'], "mb_email"); ?>>E-MAIL</option>
    <option value="mb_tel"<?php echo get_selected($_GET['sfl'], "mb_tel"); ?>>전화번호</option>
    <option value="mb_hp"<?php echo get_selected($_GET['sfl'], "mb_hp"); ?>>휴대폰번호</option>
    <option value="mb_4"<?php echo get_selected($_GET['sfl'], "mb_4"); ?>>등급</option>
</select>

<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
<input type="text" name="stx" value="<?php echo $stx ?>" id="stx" required class="required frm_input">
<input type="submit" class="btn_submit" value="검색">
</form>



<!-- <div class="local_desc01 local_desc">
    <p>
        회원자료 삭제 시 다른 회원이 기존 회원아이디를 사용하지 못하도록 회원아이디, 이름, 닉네임은 삭제하지 않고 영구 보관합니다.
    </p>
</div> -->

<!-- <?php //if ($is_admin == 'super') { ?>
<div class="btn_add01 btn_add">
    <a href="./member_form.php" id="member_add">회원추가</a>
</div>
<?php// } ?>
 -->

<form name="fmemberlist" id="fmemberlist" action="./all_result_update.php" onsubmit="return fmemberlist_submit(this);" method="post">
<input type="hidden" name="sst" value="<?php echo $sst ?>">
<input type="hidden" name="sod" value="<?php echo $sod ?>">
<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
<input type="hidden" name="stx" value="<?php echo $stx ?>">
<input type="hidden" name="page" value="<?php echo $page ?>">
<input type="hidden" name="token" value="">

<div class="tbl_head02 tbl_wrap">
    <table>

    <caption><?php echo $g5['title']; ?> 목록</caption>

    <thead>
    <tr>
  <!--       <th scope="col"  id="mb_list_chk">
            <label for="chkall" class="sound_only">회원 전체</label>
            <input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
        </th> -->
        <th scope="col"  id="mb_list_join"><?php echo subject_sort_link('mb_1', '', 'desc') ?>회원고유코드</a></th>
        <th scope="col"  id="mb_list_id"><?php echo subject_sort_link('mb_id') ?>아이디</a></th>
        <th scope="col"  id="mb_list_name"><?php echo subject_sort_link('mb_name') ?>이름</a></th>
        <th scope="col"  id="mb_list_email"><?php echo subject_sort_link('mb_email', '', 'desc') ?>이메일</a></th>
        <th scope="col"  id="mb_list_join"><?php echo subject_sort_link('mb_6', '', 'desc') ?>응시지역</a></th>
        <th scope="col"  id="mb_list_join"><?php echo subject_sort_link('mb_5', '', 'desc') ?>선택분야</a></th>
        <th scope="col"  id="mb_list_join"><?php echo subject_sort_link('mb_12', '', 'desc') ?>과목명</a></th>
        <th scope="col"  id="mb_list_join"><?php echo subject_sort_link('mb_4', '', 'desc') ?>등급</a></th>
        <th scope="col"  id="mb_list_join"><?php echo subject_sort_link('mb_13', '', 'desc') ?>점수</a></th>
        <th scope="col"  id="mb_list_join"><?php echo subject_sort_link('mb_7', '', 'desc') ?>신청일자</a></th>
        <th scope="col"  id="mb_list_join"><?php echo subject_sort_link('mb_9', '', 'desc') ?>취득일자</a></th>
        <th scope="col"  id="mb_list_join"><?php echo subject_sort_link('mb_8', '', 'desc') ?>합격/불합격</a></th>
        <th scope="col"  id="mb_list_join"><?php echo subject_sort_link('mb_10', '', 'desc') ?>불합격횟수</a></th>
        <th scope="col"  id="mb_list_tel">전화번호</th>
        <th scope="col"  id="mb_list_mobile">휴대폰</th>
        <th scope="col"  id="mb_list_join"><?php echo subject_sort_link('mb_2', '', 'desc') ?>단체명</a></th>
        <th scope="col"  id="mb_list_join"><?php echo subject_sort_link('mb_3', '', 'desc') ?>단체번호</a></th>
        <th scope="col"  id="mb_list_auth">상태 / <?php echo subject_sort_link('mb_level', '', 'desc') ?>권한</a></th>

    </tr>

<!--     <tr>



    </tr> -->
    </thead>
    <tbody>
    <?php
    for ($i=0; $row=sql_fetch_array($result); $i++) {
        // 접근가능한 그룹수
        $sql2 = " select count(*) as cnt from {$g5['group_member_table']} where mb_id = '{$row['mb_id']}' ";
        $row2 = sql_fetch($sql2);
        $group = '';
        if ($row2['cnt'])
            $group = '<a href="./boardgroupmember_form.php?mb_id='.$row['mb_id'].'">'.$row2['cnt'].'</a>';

        if ($is_admin == 'group') {
            $s_mod = '';
        } else {
            $s_mod = '<a href="./member_form.php?'.$qstr.'&amp;w=u&amp;mb_id='.$row['mb_id'].'">수정</a>';
        }
        $s_grp = '<a href="./boardgroupmember_form.php?mb_id='.$row['mb_id'].'">그룹</a>';

        $leave_date = $row['mb_leave_date'] ? $row['mb_leave_date'] : date('Ymd', G5_SERVER_TIME);
        $intercept_date = $row['mb_intercept_date'] ? $row['mb_intercept_date'] : date('Ymd', G5_SERVER_TIME);

        $mb_nick = get_sideview($row['mb_id'], get_text($row['mb_nick']), $row['mb_email'], $row['mb_homepage']);

        $mb_id = $row['mb_id'];
        $leave_msg = '';
        $intercept_msg = '';
        $intercept_title = '';
        if ($row['mb_leave_date']) {
            $mb_id = $mb_id;
            $leave_msg = '<span class="mb_leave_msg">탈퇴함</span>';
        }
        else if ($row['mb_intercept_date']) {
            $mb_id = $mb_id;
            $intercept_msg = '<span class="mb_intercept_msg">차단됨</span>';
            $intercept_title = '차단해제';
        }
        if ($intercept_title == '')
            $intercept_title = '차단하기';

        $address = $row['mb_zip1'] ? print_address($row['mb_addr1'], $row['mb_addr2'], $row['mb_addr3'], $row['mb_addr_jibeon']) : '';

        $bg = 'bg'.($i%2);

        // switch($row['mb_certify']) {
        //     case 'hp':
        //         $mb_certify_case = '휴대폰';
        //         $mb_certify_val = 'hp';
        //         break;
        //     case 'ipin':
        //         $mb_certify_case = '아이핀';
        //         $mb_certify_val = '';
        //         break;
        //     case 'admin':
        //         $mb_certify_case = '관리자';
        //         $mb_certify_val = 'admin';
        //         break;
        //     default:
        //         $mb_certify_case = '&nbsp;';
        //         $mb_certify_val = 'admin';
        //         break;
        // }
    ?>

    <tr class="<?php echo $bg; ?>">
<!-- 체크박스 -->

<!-- /체크박스 -->
        <!-- 회원고유코드 추가 테스트-->
        <td headers="mb_list_join" class="td_date"  ><?php echo ($row['mb_1']); ?></td>
        <td headers="mb_list_id"  class="td_name sv_use" ><?php echo $mb_id; ?></td>
        <td headers="mb_list_name" class="td_mbname" ><?php echo get_text($row['mb_name']); ?></td>
        <td headers="mb_list_email" class="td_mbemail" ><?php echo get_text($row['mb_email']); ?></td>

        <td headers="mb_list_join" class="td_date" ><?php echo ($row['mb_6']); ?></td>
        <td headers="mb_list_join" class="td_date" ><?php echo ($row['mb_5']); ?></td>
        <td headers="mb_list_join" class="td_date" ><?php echo ($row['mb_12']); ?></td>
        <td headers="mb_list_join" class="td_date" ><?php echo ($row['mb_4']); ?></td>
        <td headers="mb_list_join" class="td_date" ><?php echo ($row['mb_13']); ?></td>
        <td headers="mb_list_join" class="td_date" ><?php echo ($row['mb_7']); ?></td>

        <?php

        $time_text =$row['mb_8'];
        $mb_try_time = $row['mb_15'];
        $mb_get_ct_time =$row['mb_9'];

        if ( $time_text == 'FAIL') {
          $mb_time_select = $mb_try_time .'<br>(불합격 시 응시일자)';
        }

        if( $time_text == 'PASS'){
             $mb_time_select =  $mb_get_ct_time;
        }


        ?>

        <td headers="mb_list_join" class="td_date" ><?php echo ($mb_time_select); ?></td>

        <!-- 불합격 횟수 카운트 출력 시 DB와 실제 횟수를 같게 위해-->
        <?php
        $real_f_count = $row['mb_10'] - 1;

        if( $row['mb_8'] == "PASS" && $row['mb_10'] == ''){

            $real_f_count = $real_f_count + 1;
        }
        if($row['mb_8'] == "PASS" && $row['mb_10'] > 0){

             $real_f_count = $real_f_count - 1;

        }



        ?>

        <td headers="mb_list_join" class="td_date" ><?php echo ($row['mb_8']); ?></td>
        <td headers="mb_list_join" class="td_date" ><?php echo $real_f_count; ?></td>
        <td headers="mb_list_tel" class="td_tel"  ><?php echo get_text($row['mb_tel']); ?></td>
        <td headers="mb_list_mobile" class="td_tel" ><?php echo get_text($row['mb_hp']); ?></td>
        <td headers="mb_list_mobile" class="td_tel" ><?php echo get_text($row['mb_2']); ?></td>
        <td headers="mb_list_mobile" class="td_tel" ><?php echo get_text($row['mb_3']); ?></td>
        <td headers="mb_list_auth" class="td_mbstat" >

            <?php
            // 추가 정보를 위해
            if($row['mb_level'] == '3'){

                $class_level = ' 3 레벨, C-2 신청자';

            }elseif($row['mb_level'] == '4'){

                $class_level = '4 레벨, C-1 신청자';

            }elseif($row['mb_level'] == '5'){

                $class_level = '5 레벨, Master 신청자';

            }
             ?>
            <?php
            if ($leave_msg || $intercept_msg) echo $leave_msg.' '.$intercept_msg;
            else echo "정상";
            ?> /
            <?php echo $class_level;//echo get_member_level_select("mb_level[$i]", 1, $member['mb_level'], $row['mb_level']) ?>
        </td>
    </tr>



    <?php
    }
    if ($i == 0)
        echo "<tr><td colspan=\"".$colspan."\" class=\"empty_table\">자료가 없습니다.</td></tr>";
    ?>
    </tbody>
    </table>
</div>

<div class="btn_list01 btn_list">
<!--     <input type="submit" name="act_button" value="선택수정" onclick="document.pressed=this.value">
    <input type="submit" name="act_button" value="선택삭제" onclick="document.pressed=this.value"> -->
</div>

</form>

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, '?'.$qstr.'&amp;page='); ?>

<script>
function fmemberlist_submit(f)
{
    if (!is_checked("chk[]")) {
        alert(document.pressed+" 하실 항목을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택삭제") {
        if(!confirm("선택한 자료를 정말 삭제하시겠습니까?")) {
            return false;
        }
    }

    return true;
}
</script>

<?php
include_once ('../admin.tail.php');
?>
