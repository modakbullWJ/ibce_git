<?php

header('Content-type: application/json');

include_once('../common.php');

$id = trim($_POST['mb_id']);

$result = sql_query("SELECT * FROM g5_member WHERE mb_id='$id' limit 1");

$result_array = array();

// 루프를 통해 배열에 오브젝트를 하나씩 담는다.
while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) ){
$result_array[] = $row;
};


// 결과값을 JSON 형식으로 변환한다.
$encoded = json_encode( $result_array );


// UTF-8 로 인코딩 ㄱㄱ
$unescaped = preg_replace_callback('/\\\\u(\w{4})/', function ($matches) {
    return html_entity_decode('&#x' . $matches[1] . ';', ENT_COMPAT, 'UTF-8');
}, $encoded);


file_put_contents('sample.json', $unescaped);

echo $unescaped;

//결과값을 출력한다.
//echo $_GET['callback'] . '(' .$unescaped. ')';



?>
