<?php
function routing($method, $url, $callback)
{
    $requestUri = $_SERVER['REQUEST_URI'];
    // $httpMethod = $_SERVER['REQUEST_METHOD'];
    // Tách đường dẫn thành các phần
    $uriParts = explode('/', $requestUri);
    $apiName = strstr($requestUri, $uriParts[2]);
    if ($method == "GET") {
        $path = parse_url($apiName);
        if ($path['path'] === $url) {
            $callback();
        }
    } elseif ($method == "POST") {
        if ($apiName === $url) {
            $callback();
        }
    } else {
        http_response_code(404);
        echo json_encode(array('error' => 'API not found'));
    }
}
