<?php
namespace app\iclock\controller;

use think\Controller;

class Devicecmd extends Controller
{
    public function index()
    {
        $text = file_get_contents("php://input");
        if(stristr($text,'Return=0'))
        {
            $text = json_encode($text);
            file_put_contents('logcmd.txt', $text . PHP_EOL, FILE_APPEND);
            $unix_time = date_default_timezone_set('GMT');
            header("HTTP/1.1 200 OK");
            header("Content-Type: text/plain");
            header("Date:" . gmdate ("D,j M Y H:i:s")." GMT");
            exit('OK');
        }
    }
}
