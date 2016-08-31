<?php
include_once('../common.php');

if (!$is_member) {
  alert('로그인 한 회원만 접근하실 수 있습니다.', G5_BBS_URL.'/login.php');

} elseif ($member['mb_point'] >= '100' || $is_admin) {
    //100 포인트로 설정됨
} else{
  alert ("포인트가 적어 접근하실 수 없습니다.");
}


include_once(G5_THEME_PATH.'/inc/main/main_head.php');
include_once(G5_THEME_PATH.'/inc/sub/sub_middle_bg.php');
?>

<link rel="stylesheet" type="text/css" href="css/style.css" />

<div class="page_navi">
    <p>HOME  &gt;  My class  &gt;  <strong><?php// echo $g5['title'];?></strong></p>
</div>

<div class="sub_title">
    <p><strong><?php// echo $g5['title'];?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ι &nbsp;&nbsp;</p>
</div>

<div class="contents_area">


  <div id="page-wrap">

    <h1>Final Quiz for Lip building</h1>

    <form action="grade.php" method="post" id="quiz">

        <ol >

            <li>

                <h3>CSS Stands for...</h3>


                <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                <label for="question-1-answers-A">A) Computer Styled Sections </label>


                <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                <label for="question-1-answers-B">B) Cascading Style Sheets</label>


                <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                <label for="question-1-answers-C">C) Crazy Solid Shapes</label>


                <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" />
                <label for="question-1-answers-D">D) None of the above</label>

            </li>

            <li>

                <h3>Internet Explorer 6 was released in...</h3>


                <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
                <label for="question-2-answers-A">A) 2001</label>


                <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
                <label for="question-2-answers-B">B) 1998</label>


                <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C" />
                <label for="question-2-answers-C">C) 2006</label>


                <input type="radio" name="question-2-answers" id="question-2-answers-D" value="D" />
                <label for="question-2-answers-D">D) 2003</label>

            </li>

            <li>

                <h3>SEO Stand for...</h3>


                <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
                <label for="question-3-answers-A">A) Secret Enterprise Organizations</label>


                <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
                <label for="question-3-answers-B">B) Special Endowment Opportunity</label>


                <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" />
                <label for="question-3-answers-C">C) Search Engine Optimization</label>


                <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D" />
                <label for="question-3-answers-D">D) Seals End Olives</label>

            </li>

            <li>

                <h3>A 404 Error...</h3>


                <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A" />
                <label for="question-4-answers-A">A) is an HTTP Status Code meaning Page Not Found</label>


                <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B" />
                <label for="question-4-answers-B">B) is a good excuse for a clever design</label>


                <input type="radio" name="question-4-answers" id="question-4-answers-C" value="C" />
                <label for="question-4-answers-C">C) should be monitored for in web analytics</label>


                <input type="radio" name="question-4-answers" id="question-4-answers-D" value="D" />
                <label for="question-4-answers-D">D) All of the above</label>

            </li>

            <li>

                <h3>Your favorite website is</h3>


                <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" />
                <label for="question-5-answers-A">A) CSS-Tricks</label>


                <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" />
                <label for="question-5-answers-B">B) CSS-Tricks</label>


                <input type="radio" name="question-5-answers" id="question-5-answers-C" value="C" />
                <label for="question-5-answers-C">C) CSS-Tricks</label>


                <input type="radio" name="question-5-answers" id="question-5-answers-D" value="D" />
                <label for="question-5-answers-D">D) CSS-Tricks</label>

            </li>


            <li>

                <h3>머리 아플때 먹는 약은?</h3>


                <input type="radio" name="question-6-answers" id="question-6-answers-A" value="A" />
                <label for="question-6-answers-A">A)타이레놀</label>


                <input type="radio" name="question-6-answers" id="question-6-answers-B" value="B" />
                <label for="question-6-answers-B">B) 박카스</label>


                <input type="radio" name="question-6-answers" id="question-6-answers-C" value="C" />
                <label for="question-6-answers-C">C) 비타민</label>


                <input type="radio" name="question-6-answers" id="question-6-answers-D" value="D" />
                <label for="question-6-answers-D">D) 까스 활명수</label>

            </li>



            <li>

                <h3>7번째 문제</h3>


                <input type="radio" name="question-7-answers" id="question-7-answers-A" value="A" />
                <label for="question-7-answers-A">A) ㅇㅇㅇ</label>


                <input type="radio" name="question-7-answers" id="question-7-answers-B" value="B" />
                <label for="question-7-answers-B">B) ㅁㅁㅁ</label>


                <input type="radio" name="question-7-answers" id="question-7-answers-C" value="C" />
                <label for="question-7-answers-C">C) 1230</label>


                <input type="radio" name="question-7-answers" id="question-7-answers-D" value="D" />
                <label for="question-7-answers-D">D) 19399</label>

            </li>



            <li>

                <h3>1 + 1 =?</h3>


                <input type="radio" name="question-8-answers" id="question-8-answers-A" value="A" />
                <label for="question-8-answers-A">A) 2</label>
                <input type="radio" name="question-8-answers" id="question-8-answers-B" value="B" />
                <label for="question-8-answers-B">B) 3</label>

                <input type="radio" name="question-8-answers" id="question-8-answers-C" value="C" />
                <label for="question-8-answers-C">C) 4</label>

                <input type="radio" name="question-8-answers" id="question-8-answers-D" value="D" />
                <label for="question-8-answers-D">D) 200</label>
            </li>



            <li>

                <h3>배가 너무 고프면?</h3>

                <input type="radio" name="question-9-answers" id="question-9-answers-A" value="A" />
                <label for="question-9-answers-A">A)참는다</label>

                <input type="radio" name="question-9-answers" id="question-9-answers-B" value="B" />
                <label for="question-9-answers-B">B)먹는다</label>

                <input type="radio" name="question-9-answers" id="question-9-answers-C" value="C" />
                <label for="question-9-answers-C">C) 잔다</label>

                <input type="radio" name="question-9-answers" id="question-9-answers-D" value="D" />
                <label for="question-9-answers-D">D) 짜증을 낸다</label>

            </li>



            <li>
            <h3>10번째 문제</h3>
                <input type="radio" name="question-10-answers" id="question-10-answers-A" value="A" />
                <label for="question-10-answers-A">A)10</label>
                <input type="radio" name="question-10-answers" id="question-10-answers-B" value="B" />
                <label for="question-10-answers-B">B)12</label>
                <input type="radio" name="question-10-answers" id="question-10-answers-C" value="C" />
                <label for="question-10-answers-C">C) 13</label>
                <input type="radio" name="question-10-answers" id="question-10-answers-D" value="D" />
                <label for="question-10-answers-D">D) 14</label>
            </li>



        </ol>

        <input type="submit" value="Submit Quiz" id="subbtn" />

    </form>

</div>


<div id="output"></div>

<script>
    $(document).ready(function () {

        $('#subbtn').click(function() {

            value = $("input[type='radio']:checked").length;

            if (value < 5) {
                alert("Please select an every answer");

                return false;
            }
        });



    });

</script>





<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
