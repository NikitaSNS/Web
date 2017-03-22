<?php

function noCache()
{
    $headers = [
        'Expires: Wed, 22 Mar 2016 13:36:59 GMT', // . date('Y,m,d H:m')
        'Last-Modify: ' . gmdate('D, d M Y H:i:s' . ' GMT'),
        'Cache-Control: no-cache, must-revalidate',
        'Cache-Control: post-check=0, pre-check=0',
        'Cache-Control: max-age=0',
        'Pragma: no-cache',
    ];
    foreach ($headers as $header) {
        header($header);
    }
}

noCache();

echo '<pre>';
$headers = getallheaders();

var_dump($headers);