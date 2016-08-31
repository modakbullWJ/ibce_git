<?php
include_once('../common.php');


include_once(G5_THEME_PATH.'/inc/main/main_head.php');

  include_once(G5_THEME_PATH.'/inc/sub/sub_middle_bg.php'); ?>

<style>





</style>

























  <div class="page_navi">
    <p>HOME  &gt;  My class  &gt;  <strong>시험응시</strong></p>
  </div>

  <div class="sub_title">
    <p><strong>시험응시</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ι &nbsp;&nbsp;</p>
  </div>

  <div class="contents_area">















<script>

 answer = new Array(21);

 for (i=1;i<21;i++)

 { answer[i] = -1;}

function apply_value(number, value)
{answer[number] = value;}

function calculate(){total = 0;
 for (i=1;i<21;i++)
 { if (answer[i] == -1)
  {
    alert(i+'번 질문에 답하세요');
    return;
}
  total = total + answer[i]; }
form.total.value = total;
}
 function cal(form) {
        var no="";
        var yes="와우! 100점. 당신은 영재";
 for (i=1;i<21;i++)
 { if (answer[i] == -1)
  {alert(i+'번 질문에 답하세요');return;}
 }
        if (form.t1[1].checked != true) { no1="1.② "; no=no+no1; form.result.value=no; }
        if (form.t2[2].checked != true) { no2="2.③ "; no=no+no2; form.result.value=no; }
        if (form.t3[3].checked != true) { no3="3.④ "; no=no+no3; form.result.value=no; }
        if (form.t4[0].checked != true) { no4="4.① "; no=no+no4; form.result.value=no; }
        if (form.t5[1].checked != true) { no5="5.② "; no=no+no5; form.result.value=no; }
        if (form.t6[3].checked != true) { no6="6.④ "; no=no+no6; form.result.value=no; }
        if (form.t7[2].checked != true) { no7="7.③ "; no=no+no7; form.result.value=no; }
        if (form.t8[0].checked != true) { no8="8.① "; no=no+no8; form.result.value=no; }
        if (form.t9[3].checked != true) { no9="9.④ "; no=no+no9; form.result.value=no; }
        if (form.t10[2].checked != true) { no10="10.③ "; no=no+no10; form.result.value=no; }
        if (form.t11[3].checked != true) { no11="11.④ "; no=no+no11; form.result.value=no; }
        if (form.t12[2].checked != true) { no12="12.③ "; no=no+no12; form.result.value=no; }
        if (form.t13[0].checked != true) { no13="13.① "; no=no+no13; form.result.value=no; }
        if (form.t14[0].checked != true) { no14="14.① "; no=no+no14; form.result.value=no; }
        if (form.t15[3].checked != true) { no15="15.④ "; no=no+no15; form.result.value=no; }
        if (form.t16[1].checked != true) { no16="16.② "; no=no+no16; form.result.value=no; }
        if (form.t17[0].checked != true) { no17="17.① "; no=no+no17; form.result.value=no; }
        if (form.t18[3].checked != true) { no18="18.④ "; no=no+no18; form.result.value=no; }
        if (form.t19[1].checked != true) { no19="19.② "; no=no+no19; form.result.value=no; }
        if (form.t20[2].checked != true) { no20="20.③ "; no=no+no20; form.result.value=no; }
        else if (no == "") { form.result.value=yes; }
    }
</script>

<table cellSpacing=0 cellPadding=0 width="680" border=0 bordercolor="#eeeeee" bgcolor="#F1F2F6" height="0%">
<tr><td><img src='http://moranbt.com/g4/mid/jsang.jpg' border=0 align=absmiddle></td></tr>
<tr>
<td width="680" height="40" bordercolor="black" bgcolor="#C7CFEF" style='padding-top:8px'>
<P style="MARGIN-LEFT: 10px" align="left"><span style="font-size:9pt;"><font color="#221E1F">
나의 미용적성 지수는 얼마나 될까요? 질문에 전부 대답하신 후 결과보기를 누르세요.</font></span></P></td></tr>
<form name=form method=get>
<td width="680" height="0%">
<table cellSpacing=0 borderColorDark=white width="680" borderColorLight=black border="0" height="0%">
<caption align=bottom>
<P style="MARGIN-LEFT: 0px; MARGIN-RIGHT: 0px"></P></caption>
<tbody>
<tr>
<td align=middle width="610" bgColor="#EFEFFB" colSpan=4 height=15 style='padding-top:4px'>
<P style="MARGIN-LEFT: 0px; TEXT-INDENT: 6px; LINE-HEIGHT: 160%; MARGIN-RIGHT: 0px" align=justify>
<span style="font-size:9pt; color:#061873">
1. TV의 교양이나 뉴스 프로보다 드라마, 코메디프로가 더 좋다</span></P></td></tr>
<tr>
<tr>
<td vAlign=middle align=middle width="610" bgColor=white colSpan=4 height=40>
<P style="MARGIN-LEFT: 0px; MARGIN-RIGHT: 0px" align=left>
<span style="font-size:9pt; color:#808284">&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(1, 0)" type=radio name=t1>아니다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(1, 5)" type=radio name=t1>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(1, 0)" type=radio name=t1>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(1, 0)" type=radio name=t1>그렇다</span></P></td></tr>
<tr>
<td align=middle width="610" bgColor="#EFEFFB" colSpan=4 height=15 style='padding-top:4px'>
<P style="MARGIN-LEFT: 0px; TEXT-INDENT: 6px; LINE-HEIGHT: 160%; MARGIN-RIGHT: 0px" align=justify>
<span style="font-size:9pt; color:#061873">
2. 거울보기를 좋아 한다</span></P></td></tr>
<tr>
<td vAlign=middle align=middle width="610" bgColor=white colSpan=4 height=40>
<P style="MARGIN-LEFT: 0px; MARGIN-RIGHT: 0px" align=left>
<span style="font-size:9pt; color:#808284">&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(2, 0)" type=radio name=t2>아니다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(2, 0)" type=radio name=t2>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(2, 5)" type=radio name=t2>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(2, 0)" type=radio name=t2>그렇다</span></P></td></tr>
<tr>
<td align=middle width="610" bgColor="#EFEFFB" colSpan=4 height=15 style='padding-top:4px'>
<P style="MARGIN-LEFT: 0px; TEXT-INDENT: 6px; LINE-HEIGHT: 160%; MARGIN-RIGHT: 0px" align=justify>
<span style="font-size:9pt; color:#061873">
3. 미용잡지, 패션잡지 등 시각적인 것을 좋아 한다.</span></P></td></tr>
<tr>
<td vAlign=middle align=middle width="610" bgColor=white colSpan=4 height=40>
<P style="MARGIN-LEFT: 0px; MARGIN-RIGHT: 0px" align=left>
<span style="font-size:9pt; color:#808284">&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(3, 0)" type=radio name=t3>아니다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(3, 0)" type=radio name=t3>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(3, 0)" type=radio name=t3>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(3, 5)" type=radio name=t3>그렇다</span></P></td></tr>
<tr>
<td align=middle width="610" bgColor="#EFEFFB" colSpan=4 height=15 style='padding-top:4px'>
<P style="MARGIN-LEFT: 0px; TEXT-INDENT: 6px; LINE-HEIGHT: 160%; MARGIN-RIGHT: 0px" align=justify>
<span style="font-size:9pt; color:#061873">
4. 친구들에게 인기가 많다.</span></P></td></tr>
<tr>
<td vAlign=middle align=middle width="610" bgColor=white colSpan=4 height=40>
<P style="MARGIN-LEFT: 0px; MARGIN-RIGHT: 0px" align=left>
<span style="font-size:9pt; color:#808284">&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(4, 5)" type=radio name=t4>아니다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(4, 0)" type=radio name=t4>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(4, 0)" type=radio name=t4>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(4, 0)" type=radio name=t4>그렇다</span></P></td></tr>
<tr>
<td align=middle width="610" bgColor="#EFEFFB" colSpan=4 height=15 style='padding-top:4px'>
<P style="MARGIN-LEFT: 0px; TEXT-INDENT: 6px; LINE-HEIGHT: 160%; MARGIN-RIGHT: 0px" align=justify>
<span style="font-size:9pt; color:#061873">
5. 놀러 갈 때는 빠지지 않는다.</span></P></td></tr>
<tr>
<td vAlign=middle align=middle width="610" bgColor=white colSpan=4 height=40>
<P style="MARGIN-LEFT: 0px; MARGIN-RIGHT: 0px" align=left>
<span style="font-size:9pt; color:#808284">&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(5, 0)" type=radio name=t5>아니다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(5, 5)" type=radio name=t5>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(5, 0)" type=radio name=t5>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(5, 0)" type=radio name=t5>그렇다</span></P></td></tr>
<tr>
<td align=middle width="610" bgColor="#EFEFFB" colSpan=4 height=15 style='padding-top:4px'>
<P style="MARGIN-LEFT: 0px; TEXT-INDENT: 6px; LINE-HEIGHT: 160%; MARGIN-RIGHT: 0px" align=justify>
<span style="font-size:9pt; color:#061873">
6. 손으로 하는 일에서 칭찬을 받는 편이다.</span></P></td></tr>
<tr>
<td vAlign=middle align=middle width="610" bgColor=white colSpan=4 height=40>
<P style="MARGIN-LEFT: 0px; MARGIN-RIGHT: 0px" align=left>
<span style="font-size:9pt; color:#808284">&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(6, 0)" type=radio name=t6>아니다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(6, 0)" type=radio name=t6>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(6, 0)" type=radio name=t6>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(6, 5)" type=radio name=t6>그렇다</span></P></td></tr>
<tr>
<td align=middle width="610" bgColor="#EFEFFB" colSpan=4 height=22 style='padding-top:2px'>
<P style="MARGIN-LEFT: 0px; TEXT-INDENT: 6px; LINE-HEIGHT: 160%; MARGIN-RIGHT: 0px" align=justify>
<span style="font-size:9pt; color:#061873">
7. 옷 모양과 디자인, 악세사리 등은 내 마음대로 바꾸고 싶다</span> </P></td></tr>
<tr>
<td vAlign=middle align=middle width="610" bgColor=white colSpan=4 height=40>
<P style="MARGIN-LEFT: 0px; MARGIN-RIGHT: 0px" align=left>
<span style="font-size:9pt; color:#808284">&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(7, 0)" type=radio name=t7>아니다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(7, 0)" type=radio name=t7>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(7, 5)" type=radio name=t7>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(7, 0)" type=radio name=t7>그렇다</span></P></td></tr>
<tr>
<td align=middle width="610" bgColor="#EFEFFB" colSpan=4 height=15 style='padding-top:4px'>
<P style="MARGIN-LEFT: 0px; TEXT-INDENT: 6px; LINE-HEIGHT: 160%; MARGIN-RIGHT: 0px" align=justify>
<span style="font-size:9pt; color:#061873">
8. 마음에 드는 옷과 신발은 꼭 사고 싶다.</span></P></td></tr>
<tr>
<td vAlign=middle align=middle width="610" bgColor=white colSpan=4 height=40>
<P style="MARGIN-LEFT: 0px; MARGIN-RIGHT: 0px" align=left>
<span style="font-size:9pt; color:#808284">&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(8, 5)" type=radio name=t8>아니다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(8, 0)" type=radio name=t8>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(8, 0)" type=radio name=t8>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(8, 0)" type=radio name=t8>그렇다</span></P></td></tr>
<tr>
<td align=middle width="610" bgColor="#EFEFFB" colSpan=4 height=15 style='padding-top:4px'>
<P style="MARGIN-LEFT: 0px; TEXT-INDENT: 6px; LINE-HEIGHT: 160%; MARGIN-RIGHT: 0px" align=justify>
<span style="font-size:9pt; color:#061873">
9. 아침식사 보다 머리 손질이 더 중요하다.</span></P></td></tr>
<tr>
<td vAlign=middle align=middle width="610" bgColor=white colSpan=4 height=40>
<P style="MARGIN-LEFT: 0px; MARGIN-RIGHT: 0px" align=left>
<span style="font-size:9pt; color:#808284">&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(9, 0)" type=radio name=t9>아니다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(9, 0)" type=radio name=t9>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(9, 0)" type=radio name=t9>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(9, 5)" type=radio name=t9>그렇다</span></P></td></tr>
<tr>
<td align=middle width="610" bgColor="#EFEFFB" colSpan=3 height=15 style='padding-top:4px'>
<P style="MARGIN-LEFT: 0px; TEXT-INDENT: 6px; LINE-HEIGHT: 160%; MARGIN-RIGHT: 0px" align=justify>
<span style="font-size:9pt; color:#061873">
10. 내 앞머리는 내가 제일 잘 자른다.</span></P></td></tr>
<tr>
<td vAlign=middle align=middle width="610" bgColor=white colSpan=4 height=40>
<P style="MARGIN-LEFT: 0px; MARGIN-RIGHT: 0px" align=left>
<span style="font-size:9pt; color:#808284">&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(10, 0)" type=radio name=t10>아니다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(10, 0)" type=radio name=t10>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(10, 5)" type=radio name=t10>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(10, 0)" type=radio name=t10>그렇다</span></P></td></tr>
<tr>
<td align=middle width="610" bgColor="#EFEFFB" colSpan=4 height=15 style='padding-top:4px'>
<P style="MARGIN-LEFT: 0px; TEXT-INDENT: 6px; LINE-HEIGHT: 160%; MARGIN-RIGHT: 0px" align=justify>
<span style="font-size:9pt; color:#061873">
11. 다른 사람들의 머리 손질을 해주는 편이다.</span></P></td></tr>
<tr>
<td vAlign=middle align=middle width="610" bgColor=white colSpan=4 height=40>
<P style="MARGIN-LEFT: 0px; MARGIN-RIGHT: 0px" align=left>
<span style="font-size:9pt; color:#808284">&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(11, 0)" type=radio name=t11>아니다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(11, 0)" type=radio name=t11>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(11, 0)" type=radio name=t11>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(11, 5)" type=radio name=t11>그렇다</span></P></td></tr>
<tr>
<td align=middle width="610" bgColor="#EFEFFB" colSpan=4 height=15 style='padding-top:4px'>
<P style="MARGIN-LEFT: 0px; TEXT-INDENT: 6px; LINE-HEIGHT: 160%; MARGIN-RIGHT: 0px" align=justify>
<span style="font-size:9pt; color:#061873">
12. 미용실에 가서 미용사가 해준 것이 마음에 안든 적이 있다.</span></P></td></tr>
<tr>
<td vAlign=middle align=middle width="610" bgColor=white colSpan=4 height=40>
<P style="MARGIN-LEFT: 0px; MARGIN-RIGHT: 0px" align=left>
<span style="font-size:9pt; color:#808284">&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(12, 0)" type=radio name=t12>아니다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(12, 0)" type=radio name=t12>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(12, 5)" type=radio name=t12>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(12, 0)" type=radio name=t12>그렇다</span></P></td></tr>
<tr>
<td align=middle width="610" bgColor="#EFEFFB" colSpan=4 height=15 style='padding-top:4px'>
<P style="MARGIN-LEFT: 0px; TEXT-INDENT: 6px; LINE-HEIGHT: 160%; MARGIN-RIGHT: 0px" align=justify>
<span style="font-size:9pt; color:#061873">
13. 유행하는 스타일에 관심이 많다.</span></P></td></tr>
<tr>
<td vAlign=middle align=middle width="610" bgColor=white colSpan=4 height=40>
<P style="MARGIN-LEFT: 0px; MARGIN-RIGHT: 0px" align=left>
<span style="font-size:9pt; color:#808284">&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(13, 5)" type=radio name=t13>아니다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(13, 0)" type=radio name=t13>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(13, 0)" type=radio name=t13>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(13, 0)" type=radio name=t13>그렇다</span></P></td></tr>
<tr>
<td align=middle width="610" bgColor="#EFEFFB" colSpan=4 height=15 style='padding-top:4px'>
<P style="MARGIN-LEFT: 0px; TEXT-INDENT: 6px; LINE-HEIGHT: 160%; MARGIN-RIGHT: 0px" align=justify>
<span style="font-size:9pt; color:#061873">
14. 네일 폴리쉬 바르는 것을 좋아 한다</span></P></td></tr>
<tr>
<td vAlign=middle align=middle width="610" bgColor=white colSpan=4 height=40>
<P style="MARGIN-LEFT: 0px; MARGIN-RIGHT: 0px" align=left>
<span style="font-size:9pt; color:#808284">&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(14, 5)" type=radio name=t14>아니다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(14, 0)" type=radio name=t14>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(14, 0)" type=radio name=t14>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(14, 0)" type=radio name=t14>그렇다</span></P></td></tr>
<tr>
<td align=middle width="610" bgColor="#EFEFFB" colSpan=4 height=15 style='padding-top:4px'>
<P style="MARGIN-LEFT: 0px; TEXT-INDENT: 6px; LINE-HEIGHT: 160%; MARGIN-RIGHT: 0px" align=justify>
<span style="font-size:9pt; color:#061873">
15. 화장품을 좋아하고 사용해 보는 것을 즐긴다.</span></P></td></tr>
<tr>
<td vAlign=middle align=middle width="610" bgColor=white colSpan=4 height=40>
<P style="MARGIN-LEFT: 0px; MARGIN-RIGHT: 0px" align=left>
<span style="font-size:9pt; color:#808284">&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(15, 0)" type=radio name=t15>아니다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(15, 0)" type=radio name=t15>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(15, 0)" type=radio name=t15>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(15, 5)" type=radio name=t15>그렇다</span></P></td></tr>
<tr>
<td align=middle width="610" bgColor="#EFEFFB" colSpan=4 height=15 style='padding-top:4px'>
<P style="MARGIN-LEFT: 0px; TEXT-INDENT: 6px; LINE-HEIGHT: 160%; MARGIN-RIGHT: 0px" align=justify>
<span style="font-size:9pt; color:#061873">
16. 네일 폴리쉬 바르는 것을 좋아 한다</span></P></td></tr>
<tr>
<td vAlign=middle align=middle width="610" bgColor=white colSpan=4 height=40>
<P style="MARGIN-LEFT: 0px; MARGIN-RIGHT: 0px" align=left>
<span style="font-size:9pt; color:#808284">&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(16, 0)" type=radio name=t16>아니다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(16, 5)" type=radio name=t16>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(16, 0)" type=radio name=t16>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(16, 0)" type=radio name=t16>그렇다</span></P></td></tr>
<tr>
<td align=middle width="610" bgColor="#EFEFFB" colSpan=4 height=15 style='padding-top:4px'>
<P style="MARGIN-LEFT: 0px; TEXT-INDENT: 6px; LINE-HEIGHT: 160%; MARGIN-RIGHT: 0px" align=justify>
<span style="font-size:9pt; color:#061873">
17. 화장품을 좋아하고 사용해 보는 것을 즐긴다.</span></P></td></tr>
<tr>
<td vAlign=middle align=middle width="610" bgColor=white colSpan=4 height=40>
<P style="MARGIN-LEFT: 0px; MARGIN-RIGHT: 0px" align=left>
<span style="font-size:9pt; color:#808284">&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(17, 5)" type=radio name=t17>아니다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(17, 0)" type=radio name=t17>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(17, 0)" type=radio name=t17>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(17, 0)" type=radio name=t17>그렇다</span></P></td></tr>
<tr>
<td align=middle width="610" bgColor="#EFEFFB" colSpan=4 height=15 style='padding-top:4px'>
<P style="MARGIN-LEFT: 0px; TEXT-INDENT: 6px; LINE-HEIGHT: 160%; MARGIN-RIGHT: 0px" align=justify>
<span style="font-size:9pt; color:#061873">
18. 네일 폴리쉬 바르는 것을 좋아 한다</span></P></td></tr>
<tr>
<td vAlign=middle align=middle width="610" bgColor=white colSpan=4 height=40>
<P style="MARGIN-LEFT: 0px; MARGIN-RIGHT: 0px" align=left>
<span style="font-size:9pt; color:#808284">&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(18, 0)" type=radio name=t18>아니다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(18, 0)" type=radio name=t18>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(18, 0)" type=radio name=t18>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(18, 5)" type=radio name=t18>그렇다</span></P></td></tr>
<tr>
<td align=middle width="610" bgColor="#EFEFFB" colSpan=4 height=15 style='padding-top:4px'>
<P style="MARGIN-LEFT: 0px; TEXT-INDENT: 6px; LINE-HEIGHT: 160%; MARGIN-RIGHT: 0px" align=justify>
<span style="font-size:9pt; color:#061873">
19. 화장품을 좋아하고 사용해 보는 것을 즐긴다.</span></P></td></tr>
<tr>
<td vAlign=middle align=middle width="610" bgColor=white colSpan=4 height=40>
<P style="MARGIN-LEFT: 0px; MARGIN-RIGHT: 0px" align=left>
<span style="font-size:9pt; color:#808284">&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(19, 0)" type=radio name=t19>아니다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(19, 5)" type=radio name=t19>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(19, 0)" type=radio name=t19>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(19, 0)" type=radio name=t19>그렇다</span></P></td></tr>
<tr>
<td align=middle width="610" bgColor="#EFEFFB" colSpan=4 height=15 style='padding-top:4px'>
<P style="MARGIN-LEFT: 0px; TEXT-INDENT: 6px; LINE-HEIGHT: 160%; MARGIN-RIGHT: 0px" align=justify>
<span style="font-size:9pt; color:#061873">
20. 네일 폴리쉬 바르는 것을 좋아 한다</span></P></td></tr>
<tr>
<td vAlign=middle align=middle width="610" bgColor=white colSpan=4 height=40>
<P style="MARGIN-LEFT: 0px; MARGIN-RIGHT: 0px" align=left>
<span style="font-size:9pt; color:#808284">&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(20, 0)" type=radio name=t20>아니다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(20, 0)" type=radio name=t20>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(20, 5)" type=radio name=t20>보통이다&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input onclick="apply_value(20, 0)" type=radio name=t20>그렇다</span></P></td></tr>
<tr>
<td vAlign=middle align=left width="680" bgColor="#C7CFEF" height=30 style='padding-left:8px'>
<span style="font-size:9pt;"><b><font color="#3D3D7D">귀하의 미용인으로서의 적성지수는 총</font></b>
<input size=2 name=total><b><font color="#3D3D7D">점 입니다.</font></b></span></td></tr>
<tr><td vAlign=middle align=left width="680" bgColor="#C7CFEF" height=30 style='padding-left:8px'>
<span style="font-size:9pt;"><b><font color="#3D3D7D">틀린문제와 정답은</font></b>
<input onfocus=this.blur(); size=94 value=" " name=result> <b><font color="#3D3D7D">입니다.</font></b></span></td>
</tr>
<tr>
<td align=middle width="680" bordercolor="black" colSpan=4 height=1>
<P style="MARGIN-LEFT: 7px; LINE-HEIGHT: 150%; MARGIN-RIGHT: 0px; padding-top:8px" align=left>
<SPAN style="font-size:9pt;">
<FONT color=#E105E1>&nbsp;&nbsp;&nbsp;[점수별 적성도]<br>
&nbsp;&nbsp;&nbsp;▒ 00 ~ 20............... </FONT>다른 직종 선택 권장
<FONT color=#E105E1>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;▒ 20 ~ 30............... </FONT>자기계발 필요<br>
<FONT color=#E105E1>&nbsp;&nbsp;&nbsp;▒ 30 ~ 50............... </FONT>미용과 적성이 잘 맞음
<FONT color=#E105E1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;▒ 50 ~ 75............... </FONT></SPAN>
<span style="font-size: 9pt">타고난 미용인</span>
</P></td>
</tr></tbody></table>
<P style="padding-bottom:10px" align="center"><input onclick=calculate() type=button value="결과보기">
<input onclick=cal(this.form); type=button size=5 value=정답확인><input type="reset" value="리셋"></P>
</tr></table></form>


    </div>

    </div>





  </div>




<?php
  include_once(G5_THEME_PATH.'/tail.php');
   ?>

