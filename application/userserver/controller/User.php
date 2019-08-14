<?php
namespace app\userserver\controller;

class User
{
    public function index()
    {
        file_put_contents('data.log', print_r($_SERVER, true));
        return json_encode(["success" => true, "server" => "127.0.0.1", "port" =>  9090]);
    }
}
