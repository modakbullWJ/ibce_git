<?php

include_once('../common.php');


if (!$is_member) {
alert("로그인 후 이용가능합니다.");
    goto_url(G5_BBS_URL.'/login.php');

}



include_once(G5_THEME_PATH.'/inc/main/main_head.php');

  include_once(G5_THEME_PATH.'/inc/sub/sub_middle_bg.php'); ?>

    <link rel="stylesheet" type="text/css" href="css/style.css" />

  <div class="page_navi">
    <p>HOME  &gt;  My class  &gt;  <strong><?php// echo $g5['title'];?></strong></p>
  </div>

  <div class="sub_title">
    <p><strong><?php// echo $g5['title'];?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ι &nbsp;&nbsp;</p>
  </div>




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

  <div class="contents_area">






	<div id="page-wrap">

		<h1>Final Quiz for Lip building</h1>
<form action="grade.php" method="post" id="quiz">

            <ol>

                <li>

                    <h3>CSS Stands for...</h3>

                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                        <label for="question-1-answers-A">A) Computer Styled Sections </label>
                    </div>

                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                        <label for="question-1-answers-B">B) Cascading Style Sheets</label>
                    </div>

                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                        <label for="question-1-answers-C">C) Crazy Solid Shapes</label>
                    </div>

                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" />
                        <label for="question-1-answers-D">D) None of the above</label>
                    </div>

                </li>

                <li>

                    <h3>Internet Explorer 6 was released in...</h3>

                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
                        <label for="question-2-answers-A">A) 2001</label>
                    </div>

                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
                        <label for="question-2-answers-B">B) 1998</label>
                    </div>

                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C" />
                        <label for="question-2-answers-C">C) 2006</label>
                    </div>

                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-D" value="D" />
                        <label for="question-2-answers-D">D) 2003</label>
                    </div>

                </li>

                <li>

                    <h3>SEO Stand for...</h3>

                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
                        <label for="question-3-answers-A">A) Secret Enterprise Organizations</label>
                    </div>

                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
                        <label for="question-3-answers-B">B) Special Endowment Opportunity</label>
                    </div>

                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" />
                        <label for="question-3-answers-C">C) Search Engine Optimization</label>
                    </div>

                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D" />
                        <label for="question-3-answers-D">D) Seals End Olives</label>
                    </div>

                </li>

                <li>

                    <h3>A 404 Error...</h3>

                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A" />
                        <label for="question-4-answers-A">A) is an HTTP Status Code meaning Page Not Found</label>
                    </div>

                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B" />
                        <label for="question-4-answers-B">B) is a good excuse for a clever design</label>
                    </div>

                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-C" value="C" />
                        <label for="question-4-answers-C">C) should be monitored for in web analytics</label>
                    </div>

                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-D" value="D" />
                        <label for="question-4-answers-D">D) All of the above</label>
                    </div>

                </li>

                <li>

                    <h3>Your favorite website is</h3>

                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" />
                        <label for="question-5-answers-A">A) CSS-Tricks</label>
                    </div>

                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" />
                        <label for="question-5-answers-B">B) CSS-Tricks</label>
                    </div>

                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-C" value="C" />
                        <label for="question-5-answers-C">C) CSS-Tricks</label>
                    </div>

                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-D" value="D" />
                        <label for="question-5-answers-D">D) CSS-Tricks</label>
                    </div>

                </li>

            </ol>

            <input type="submit" value="Submit Quiz" />

        </form>

    </div>

<?php
  include_once(G5_THEME_PATH.'/tail.php');
?>
