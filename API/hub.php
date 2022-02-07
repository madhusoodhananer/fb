<?php
include_once('API_Call.php');
$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : "";
if (empty($method))
{
    echo json_encode(['status' => 'FAIL', 'msg' => 'PARAM_METHOD_EMPTY']);
    exit();
}
$api = new API_Call();

if (method_exists($api,$method))
{
    $api->$method();
}
else
{
    echo "noy";
}