<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

/*
// 사용방법

<?php 
//echo latest("theme/스킨명", "게시판명", 1, 1, 1,"넓이"); 
echo latest("theme/hp5_calendar", "schedule", 1, 1, 1,"200"); 
?> 

*/

//옵션분리
list($n_table_width,$cellw,$cellh) = explode(",", $options);

if (!$cellw) {
	$cellh  = 21;
	$cellw  = 22 + 20;
}
?>

<style type="text/css">
td.title    {text-align: center; padding-top: 1px; padding-bottom: 1px; height: 25px; font-weight:bold;}
td.invalid  {
	text-align: center; padding-top: 2px; height:<?php echo $cellh; ?>px; width:<?php echo $cellw; ?>px;
	/*background: url(<?php echo $latest_skin_url; ?>/img/mini2.gif) no-repeat bottom;*/
}

td.valid    {
	text-align: center; padding-top: 2px; height:<?php echo $cellh; ?>px; width:<?php echo $cellw; ?>px;
	/*background: url(<?php echo $latest_skin_url; ?>/img/mini1.gif) no-repeat bottom;*/
}



td.today    {
	text-align: center; padding-top: 2px; height:<?php echo $cellh ?>px; width:<?php echo $cellw; ?>px;
	/*background: url(<?php echo $latest_skin_url; ?>/img/mini3.gif) no-repeat bottom*/ border-bottom:1px dotted #ba9765;
}
.bgsun    {text-align: center; font-size: 11px; color: #ff6d6d; padding-top: 2px; height:<?php echo $cellh; ?>px; width:<?php echo $cellw; ?>px;
	background: url(<?php echo $latest_skin_url; ?>/img/mini.gif) no-repeat bottom;
}
.bgsat  {text-align: center; font-size: 11px; color: #78a4fd; padding-top: 2px; height:<?php echo $cellh?>px; width:<?php echo $cellw; ?>px;
	background: url(<?php echo $latest_skin_url; ?>/img/mini.gif) no-repeat bottom;
}
.bgweek   {text-align: center; font-size: 11px; color:#f4f4f4; padding-top: 2px; height:<?php echo $cellh?>px; width:<?php echo $cellw; ?>px;
	background: url(<?php echo $latest_skin_url; ?>/img/mini.gif) no-repeat bottom;
}

p.title     {font-size: 1em; font-weight:bold}
p.sunday    {text-align: center; font-size: 11px; color: #ff6d6d;}
p.saturday  {text-align: center; font-size: 11px; color: #78a4fd;}
p.weekday   {text-align: center; font-size: 11px; color:#f4f4f4;}

a:link.writeday, a:visited.writeday  {text-align: center; font-size: 14px; color: #ba9765;}
img {border:0}
</style>

<?php
$hp_latest_skin = explode("skin/latest/",$latest_skin_url);
//echo $hp_latest_skin[1];
$latest_dir = $hp_latest_skin[1];

$today = getdate(); 
$b_mon = $today['mon']; 
$b_day = $today['mday']; 
$b_year = $today['year']; 

if ($year < 1) {
   $month = $b_mon;
   $mday = $b_day;
   $year = $b_year;
}

if ($_GET["year"]) {
	$year = $_GET["year"];
}
if ($_GET["month"]) {
	$month = $_GET["month"];
}

$lastday=array(0,31,28,31,30,31,30,31,31,30,31,30,31);
if ($year%4 == 0) $lastday[2] = 29;
$dayoftheweek = date("w", mktime (0,0,0,$month,1,$year));

?>

<div style="width:396px;">
    <table border="0" cellpadding="0" cellspacing="0" style="float:right; position:relative; bottom:25px;">
        <tr>
            <td align="center" style=" text-align:center;">
                <table border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td width="" align="right"><a href="<?php echo $_SERVER[PHP_SELF]; ?>?bo_table=<?php echo $bo_table; if ($month == 1) { $year_pre=$year-1; $month_pre=12; } else { $year_pre=$year; $month_pre=$month-1; } echo "&year=".$year_pre."&month=".$month_pre; ?>" onfocus="this.blur()" title="<?php echo $month_pre; ?> 월" style="font-size:10px; color:#ba9765; position:relative; bottom:2px;">◀<!--img src="<?php echo $latest_skin_url; ?>/img/month_prev.png"--></a></td>
                        <td width="80" align="center" style="line-height:27px;"><a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=<?php echo $bo_table; ?>" style="color:#ba9765;" onfocus="this.blur()" title="일정관리 바로가기"><b><?php echo $year; ?> 년 <?php echo $month; ?> 월</b></a></td>
                        <td width="" align="left"><a href="<?php echo $_SERVER[PHP_SELF]; ?>?bo_table=<?php echo $bo_table; if ($month == 12) { $year_pre=$year+1; $month_pre=1; } else { $year_pre=$year; $month_pre=$month+1; } echo "&year=".$year_pre."&month=".$month_pre; ?>" onfocus="this.blur()" title="<?php echo $month_pre; ?> 월" style="font-size:10px; color:#ba9765; position:relative; bottom:2px;">▶<!--img src="<?php echo $latest_skin_url; ?>/img/month_next.png"--></a></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    
    <div style="margin-bottom:15px; padding:7px 0;  margin-left:25px;">
        <table width="100%" cellSpacing="0" cellPadding="0" border="0" align="center" style="border:1px solid rgba(186, 151, 101, 0.4); position:relative; bottom:25px;">
            <tr>
                <td align="center" class="bgsun">일</td>
                <td align="center" class="bgweek">월</td>
                <td align="center" class="bgweek">화</td>
                <td align="center" class="bgweek">수</td>
                <td align="center" class="bgweek">목</td>
                <td align="center" class="bgweek">금</td>
                <td align="center" class="bgsat">토</td>
            </tr>
            <tr>
                <td colspan="7" bgcolor="#DDDDDD"></td>
            </tr>
<?php
            $cday = 1;
            $sel_mon[i] = sprintf("%02d",$month);
            $query = "select * from ".$g5['write_prefix'].$bo_table." where left(wr_1,6) <= '".$year.$sel_mon[i]."'  and left(wr_2,6) >= '".$year.$sel_mon[i]."'  order by wr_id asc";
			//echo $query;
            $result = sql_query($query);
            
            // 내용을 보여주는 부분
            while ($row = sql_fetch_array($result)) {  // 제목글 뽑아서 링크 문자열 만들기..
                if( substr($row[wr_1],0,6) < $year.$sel_mon[i] ) {
                    $start_day[i] =1; 
                    $start_day[i]= (int)$start_day[i];
                } else {
                    $start_day[i] = substr($row[wr_1],6,2);
                    $start_day[i]= (int)$start_day[i];
                }
            
                if( substr($row[wr_2],0,6) > $year.$sel_mon[i] ) {
                    $end_day[i] = $lastday[$month];
                    $end_day[i]= (int)$end_day[i];
                } else {
                    $end_day[i] = substr($row[wr_2],6,2);
                    $end_day[i]= (int)$end_day[i];
                }
				
				//echo "start_day = ".$start_day[i] ."<br>";
				//echo "end_day = ".$end_day[i] ."<br>";
            
                for ($i = $start_day[i] ; $i <= $end_day[i];  $i++) {
                    $html_day[$i] = "1";
                }
            }
            
            // 달력의 틀을 보여주는 부분
            // 여기부터 분석하면 됨 
            $temp = 7- (($lastday[$month]+$dayoftheweek)%7);
            // $dayoftheweek; // 6 이다.
            // $temp = 6 이다. 무슨 의미인가?
            
            if ($temp == 7) $temp = 0;
            $lastcount = $lastday[$month]+$dayoftheweek + $temp;
            
            // $lastcount = 42
            // $lastcount 는 달력을 이루고 있는 전체 셀의 갯수이다.  2003년 11월은 날짜 30개와 빈칸 12개 다.
            // 
            for ($iz = 1; $iz <= $lastcount; $iz++) { // 42번을 칠하게 된다.
                $bgcolor = "#ffffff";  // 쭉 흰색으로 칠하고
                $offset = $iz%7;
                if ($offset == 1) echo ("            <tr>\n"); // 주당 7개씩 한쎌씩을 쌓는다.
                if ($dayoftheweek < $iz  &&  $iz <= $lastday[$month]+$dayoftheweek)	{
                    if ($b_year==$year && $b_mon==$month && $b_day==$cday) {
                        $cstyle = 'today';
                    } else {
                        $cstyle = 'valid';
                    }
                    
                    switch ($offset) {            // 요일에 따라 날짜의 색깔 결정
                        case 1: $dstyle = 'sunday';
                        break;
                        case 0: $dstyle = 'saturday';
                        break;
                        default: $dstyle = 'weekday';
                    }	 
                    // 전체 루프안에서 숫자가 들어가는 셀들만 해당됨
                    // 즉 11월 달에서 1일부터 30 일까지만 해당
                    $daytext = "$cday";   // $cday 는 숫자 예> 11월달은 1~ 30일 까지
                    //$daytext 은 셀에 써질 날짜 숫자 넣을 공간
                    //if ($iz%7 == 1) $daytext = "<font color=red>$daytext</font>"; // 일요일
                    //if ($iz%7 == 0) $daytext = "<font color=blue>$daytext</font>"; // 토요일
                    
                    // 여기까지 숫자와 들어갈 내용에 대한 변수들의 세팅이 끝나고 
                    // 이제 여기 부터 직접 셀이 그려지면서 그 안에 내용이 들어 간다.
                
                    echo ("                <td class='".$cstyle."'>");
                    if ($html_day[$cday]) { 
                        $f_date = $year.sprintf("%02d",$month).sprintf("%02d",$cday);		 
                        echo "<p><a href=\"javascript:popup_window('".$latest_skin_url."/pop_schedule.php?bo_table=".$bo_table."&year=".$year."&month=".$month."&day=".$cday."&latest_dir=".$latest_dir."', 'schedule', 'left=50, top=50, width=312, height=400, scrollbars=1');\" class=\"writeday\"><b>".$daytext."</b></a></p>";
                    } 
                    else { // 글쓰기 권한이 없으면 글쓰기 링크는 넣지 않고 그냥 숫자만 출력하기 
                        echo "<p class='".$dstyle."'>".$daytext."</p>";
                    }
                    //	   echo $html_day[$cday];
                    echo ("</td>\n");  // 한칸을 마무리
                    $cday++; // 날짜를 카운팅
                } 
                // 11월에서 1일부터 30일에 해당되지 않으면 그냥 회색을 칠한다.
                else { echo ("                <td class='invalid'>&nbsp;</td>\n"); }
                
                if (($iz%7) == 0) echo ("            </tr>\n");
            
            } // 반복구문이 끝남
            ?>
        </table>
    </div>
    
    <!--행사 예정 뽑아오기 시작-->
    <?php		  
    $new_date = date('Y-m-d',time()); //오늘 날짜
    $years  = date('Y');  // 2000
    $months = date('m');  // 1, 2, 3, ..., 12
    $days     = date('d');  // 1, 2, 3, ..., 31
    $limit = '5';
    $today_row = date('Ymd');
    $qry  = "select  * from ".$g5['write_prefix'].$bo_table." where $today_row <= wr_1 or $today_row <= wr_2 order by wr_1 ASC LIMIT 0, $limit";
    $result1 = sql_query($qry);
    for ($i=0; $row=sql_fetch_array($result1); $i++){
        $OID = $row[wr_id];           
        $SUBJECT = stripslashes($row[wr_subject]);
        $SUBJECT = strip_tags($SUBJECT);
        $S_Year  = substr ($row[wr_1], 0, 4);
        $S_MON   = substr ($row[wr_1], 4, 2);
        $S_Date  = substr ($row[wr_1], 6, 2);
        $E_MON   = substr ($row[wr_2], 4, 2);
        $E_Date  = substr ($row[wr_2], 6, 2);
        
        if($i > 0) { echo "<br>";}
        echo "  ";
        echo "<img src='{$latest_skin_url}/img/arrow.gif' align='absmiddle' alt='' />";
        echo $row['icon_reply'] . " ";
        //echo "<a href=\"javascript:win_open('{$latest_skin_url}/pop_schedule.php?bo_table=$bo_table&year=$S_Year&month=$S_MON&day=$S_Date&latest_dir=$latest_dir', 'schedule', 'left=50, top=50, width=300, height=400, scrollbars=1');\" class=writeday>";	            
        if ($row['is_notice'])
            if ($row['wr_1']==$row['wr_2'])
                echo "<font style='font-family:돋움; font-size:12px; color:#2C88B9;'>[{$S_MON}/{$S_Date}] $SUBJECT</font>";
            else
                echo "<font style='font-family:돋움; font-size:12px; color:#2C88B9;'>[{$S_MON}/{$S_Date}~{$E_MON}/{$E_Date}]  $SUBJECT</font>";
        else
        if ($row['wr_1']==$row['wr_2'])
            echo "<font style='font-family:돋움; font-size:12px; color:#6A6A6A;'>[{$S_MON}/{$S_Date}]  $SUBJECT </font>";
        else
            echo "<font style='font-family:돋움; font-size:12px; color:#6A6A6A;'>[{$S_MON}/{$S_Date}~{$E_MON}/{$E_Date}]  $SUBJECT</font>";
        //echo "</a>";
        
        if ($row['comment_cnt'])
            echo " <a href=\"{$row['comment_href']}\"><span style='font-family:돋움; font-size:11px; color:#9A9A9A;'>{$row['comment_cnt']}</span></a>";
        
        // if ($row['link']['count']) { echo "[{$row['link']['count']}]"; }
        // if ($row['file']['count']) { echo "<{$row['file']['count']}>"; }
        
        echo " " . $row['icon_new'];
        //echo " " . $row['icon_file'];
        //echo " " . $row['icon_link'];
        //echo " " . $row['icon_hot'];
        //echo " " . $row['icon_secret']; 
    }
    ?>
    <!--행사 예정 뽑아오기 끝-->
</div>