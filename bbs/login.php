<?php
include_once('./_common.php');

$g5['title'] = '로그인';
include_once('./_head.sub.php');


// 모바일은 헤더를 따로 해야하니까 wj 2016.08.17
if (G5_IS_MOBILE) {
    // 모바일의 경우 설정을 따르지 않는다.
    //include_once(G5_BBS_PATH.'/_head.php');
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
}


$url = $_GET['url'];

// url 체크
check_url_host($url);

// 이미 로그인 중이라면
if ($is_member) {
    if ($url)
        goto_url($url);
    else
        goto_url(G5_URL);
}

$login_url        = login_url($url);
$login_action_url = G5_HTTPS_BBS_URL."/login_check.php";

// 로그인 스킨이 없는 경우 관리자 페이지 접속이 안되는 것을 막기 위하여 기본 스킨으로 대체
$login_file = $member_skin_path.'/login.skin.php';
if (!file_exists($login_file))
    $member_skin_path   = G5_SKIN_PATH.'/member/basic';

include_once($member_skin_path.'/login.skin.php');

include_once('./_tail.sub.php');


if (G5_IS_MOBILE) {
    // 모바일의 경우 설정을 따르지 않는다.
    //include_once(G5_BBS_PATH.'/_head.php');
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');



}


?>
