<?php
namespace app\iclock\controller;

class Cdata
{
    public function index()
    {
        $sn = \think\Request::instance()->param('SN');
        $unix_time = date_default_timezone_set('GMT');
        header("HTTP/1.0 200 OK");
        header("Content-Type: text/plain");
        header("Date:" . gmdate ("D,j M Y H:i:s")." GMT");
        if(isset($_GET['table'])){
            //搓发收考勤数据
            if($_GET['table'] == 'ATTLOG'){
                $text = file_get_contents("php://input");
                $data = explode('	', $text);
                file_put_contents('data_att_log.log', print_r($data, true));
                exit('OK');
                //处理正确后要返回OK
            }
            if($_GET['table'] == 'OPERLOG'){
                exit('OK');
            }

        }else{
            exit("GET OPTION FROM:{$sn}\nATTLOGStamp=".time()."\nOPERLOGStamp=".time()."\nATTPHOTOStamp=".time()."\nErrorDelay=60\nDelay=30\nTransTimes=00:00;00:00\nTransInterval=1\nTransFlag=110110111000\nTimeZone=8\nRealtime=1\nEncrypt=0\nServerVer=2.2.14\nBIODATAStamp=".time()."\n");
        }

    }
}