<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$wr_datetime = $view['wr_datetime'];

$sql = " update {$g5['member_table']}
set
mb_4 = '{$wr_content}',
mb_5 = '{$wr_2}',
mb_6 = '{$wr_3}',
mb_7 = '".G5_TIME_YMDHIS."',
mb_12 = '{$wr_11}'

where mb_id = '$mb_id' ";
sql_query($sql);



$sql_common = "

wr_11  =  '$wr_11'

                ";

//글쓰기, 답변, 수정
if ($w == '' || $w == 'r' || $w == 'u') {
    $sql1 = " update $write_table
                set $sql_common where wr_id = '$wr_id' ";
    sql_query($sql1);


}


else
    alert("제대로 된 값이 넘어오지 않았습니다.");
?>


