<?php

require_once 'app\Models\sendDataToForm.php';
use app\Models\sendDataToForm;

$portalId = "43630680";
$authorization = "pat-na1-6fe5210f-a8c0-40dc-8a18-10c8bd66aecd";
$formGuid = "9e0f9e2b-f056-431f-803a-f79f5320fec9";

$apiRequest = new sendDataToForm($portalId, $authorization, $formGuid);

$fields = array(
    array(
        "name" => "email",
        "value" => "pvphat12c6ntt@gmail.com"
    ),
    array(
        "name" => "lastname",
        "value" => "Po"
    ),
    array(
        "name" => "firstname",
        "value" => "phat"
    ),
    array(
        "name" => "phone",
        "value" => "0937373737"
    )
);

$apiRequest->sendRequest($fields);