<?php
/**
 * 시험문제 (Exam for Gnuboard4)
 *
 * Copyright (c) 2013 Choi Jae-Young <www.miwit.com>
 *
 * 저작권 안내
 * - 저작권자는 이 프로그램을 사용하므로서 발생하는 모든 문제에 대하여 책임을 지지 않습니다.
 * - 이 프로그램을 어떠한 형태로든 재배포 및 공개하는 것을 허락하지 않습니다.
 * - 이 저작권 표시사항을 저작권자를 제외한 그 누구도 수정할 수 없습니다.
 */

if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

include_once("_config.php");
include_once("_upgrade.php");



if ($mw_basic['cf_exam_level'] > $member['mb_level']) return;
?>
<tr>
    <td class="mw_basic_write_title">· 시험문제</td>
    <td class="mw_basic_write_content">
        <input type="button" class="btn1" value="시험문제 설정" onclick="win_exam()"/>
        <input type="button" class="btn1" value="시험문제 삭제" onclick="del_exam()"/>
        <input type="hidden" name="ex_id" id="ex_id" value=""/>
        <script>
        function win_exam() {
            wq = window.open("<?php echo $mw_exam['path']?>/write.php?bo_table=<?php
                echo $bo_table?>&wr_id=<?php echo $wr_id?>&ex_id="+$("#ex_id").val(),
                 "exam", "width=800,height=600,scrollbars=yes");
            wq.focus();
        }
        function del_exam() {
            if (!confirm("정말 시험문제를 삭제하시겠습니까?")) return;
            $.get("<?php echo $mw_exam['path']?>/delete.php?bo_table=<?php
                echo $bo_table?>&wr_id=<?php echo $wr_id?>&ex_id="+$("#ex_id").val(),
            function (str) {
                $("#ex_id").val('');
                alert(str);
            });
        }
        </script>

    </td></tr>
<tr><td colspan="2" height="1" bgcolor="#e7e7e7"></td></tr>

