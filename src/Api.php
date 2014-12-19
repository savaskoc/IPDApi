<?php
namespace Hyperion\Ipd;

class Api
{
    const VERB_GET = 'GET';
    const VERB_POST = 'POST';

    private $baseUrl;

    public function __construct($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function request($verb = self::VERB_GET, $url, $content)
    {
        $headers = [
            'User-Agent: IPDApi-PHP'
        ];

        $ch = curl_init($this->baseUrl . $url);
        if ($verb === self::VERB_POST) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($content));
            $headers[] = 'Content-Type: applicaton/json';
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $return = curl_exec($ch);
        curl_close($ch);

        return json_decode($return);
    }
} 