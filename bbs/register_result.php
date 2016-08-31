<?php
include_once('./_common.php');

if (isset($_SESSION['ss_mb_reg']))
    $mb = get_member($_SESSION['ss_mb_reg']);

// 회원정보가 없다면 초기 페이지로 이동
if (!$mb['mb_id'])
    goto_url(G5_URL);

$g5['title'] = '회원가입이 완료되었습니다.';

//include_once('./_head.php');
//head와 sub페이지 수정 2016.7.20
include_once(G5_THEME_PATH.'/inc/main/main_head.php');
//include_once(G5_THEME_PATH.'/inc/sub/sub_middle_bg.php');

include_once($member_skin_path.'/register_result.skin.php');
include_once('./_tail.php');
?>
