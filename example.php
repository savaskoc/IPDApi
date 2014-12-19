<?php

use Hyperion\Ipd\Api;

$api = new Api('http://localhost:8080');
$newOfficer = $api->request(Api::VERB_POST, '/officer/new?personId=1', [
    'username' => 'lorem',
    'password' => md5('ipsum'),
    'rank' => 'Lieutenant',
    'rankType' => 0
]);
$login = $api->request(Api::VERB_POST, '/login', [
    'username' => 'lorem',
    'password' => md5('ipsum')
]);