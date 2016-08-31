<?php

include_once('../common.php');



$id = trim($_POST['mb_id']);

//var_dump($id);

$sql = sql_query("SELECT * FROM g5_member WHERE mb_id='$id' limit 1");



while($row = sql_fetch_array($sql)){
  $mb_code = $row['mb_1'];
  $mb_name = $row['mb_name'];
  $id = $row['mb_id'];
  $mb_email = $row['mb_email'];
  $mb_field = $row['mb_5'];
  $mb_subject = $row['mb_12'];
  $mb_class = $row['mb_4'];
  $mb_result = $row['mb_8'];

  $mb_get_ct = $row['mb_9'];
  $mb_try_time = $row['mb_15'];


if($mb_result =='FAIL'){
  $mb_time_select =  $mb_try_time;
  $time_text = '응시일자 <br> 报名日';
}

if($mb_result == 'PASS'){
   $mb_time_select =  $mb_get_ct;
   $time_text = '취득일자 <br> 取得日';
}



  if($row['mb_id'] == 'admin'){

    echo ('관리자입니다.');

  } else{

  $dynamicList .= '<table>


  <thead>
    <tr>
      <th scope="col" class="mb_mc">Member Code <br> 会员号码 </th>
      <th scope="col">이름 / 姓名</th>
      <th scope="col">아이디 / 账号 </th>
      <th scope="col">E-mail / 邮箱</th>
      <th scope="col">분야 / 领域 </th>
      <th scope="col" class="mb_subject">과목 / 科目 </th>
      <th scope="col" class="mb_cl">등급 / 等级       </th>
       <th scope="col">'.$time_text.' </th>
      <th scope="col">결과 / 结果</th>
    </tr>
  </thead>

  <tr>
    <td  class="mb_mc"> '.$mb_code.' </td>
    <td>  '.$mb_name.'  </td>
    <td> '.$id.' </td>
    <td>  '.$mb_email.' </td>
    <td> '.$mb_field.' </td>
    <td class="mb_subject">   '.$mb_subject.' </td>
    <td class="mb_cl">  '.$mb_class.' </td>
    <td >  '.$mb_time_select.' </td>
    <td class="mb_result">  '.$mb_result.' </td>
  </tr>

</table>';
}

}



?>

<?php echo $dynamicList; ?>

