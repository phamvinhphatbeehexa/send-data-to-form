<?php
namespace app\Models;

class sendDataToForm {
    private $endpoint;
    private $headers;

    public function __construct($portalId, $authorization, $formGuid) {
        $this->endpoint = "https://api.hsforms.com/submissions/v3/integration/secure/submit/" . $portalId . "/" . $formGuid;
        $this->headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $authorization
        );
    }

    public function sendRequest($fields) {
        $data = array(
            'fields' => $fields
        );

        $ch = curl_init($this->endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);

        if ($response === false) {
            echo "Result Error: " . curl_error($ch);
        } else {
            echo "Result API response: " . $response;
        }

        curl_close($ch);
    }
}