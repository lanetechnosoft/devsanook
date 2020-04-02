<?php
require_once('./configs/db.php');
try {
    $json_data = array();
$obj = new myPDO();
$rs = $obj->execute("SELECT * FROM TB_SAMPLE");
$row = $rs->rowCount();
if ($row>0) {
    //print_r($rs->fetchAll());
    foreach ($rs->fetchAll() as $data) {
        $json_arr['id'] = $data['id'];
        $json_arr['title'] = $data['title'];
        $json_arr['subtitle'] = $data['subtitle'];
        $json_arr['url_image'] = $data['url_image'];
        $json_arr['create_date'] = $data['create_date'];
        $json_arr['status'] = $data['status'];
        array_push($json_data,$json_arr);
    }
    http_response_code(200);
    echo json_encode(array("status"=>true,"message"=>"SUCCESS","data"=>$json_data));
}else{
    http_response_code(404);
    echo json_encode(array("status"=>false,"message"=>"FAILURE","data"=>$json_data));
}
} catch (Exception $th) {
    http_response_code(503);
    echo json_encode(array("status"=>false,"message"=>"FAILURE","data"=>$th->getMessage()));
}


?>