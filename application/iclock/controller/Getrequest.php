<?php
namespace app\iclock\controller;

class Getrequest
{
    public function index()
    {
        $unix_time = date_default_timezone_set('GMT');
        header("HTTP/1.0 200 OK");
        header("Content-Type: text/plain");
        header("Date:" . gmdate ("D,j M Y H:i:s")." GMT");
        $cmd = "C:501224:INFO" . PHP_EOL;
        //把CMD的命令
        $gbkcmd = iconv("UTF-8", "GB2312//IGNORE", $cmd);
        exit('OK');
    }
}
