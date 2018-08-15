<?php
/**
 * Created by PhpStorm.
 * User: MACHENIKE
 * Date: 2018/8/15
 * Time: 10:48
 */

class SwooleWebsocket{
    private $_server=null;

    public function __construct($ip='0.0.0.0',$port=9502)
    {
        $this->_server = new swoole_websocket_server($ip,$port);
    }

    public function startServer(){
        $this->_server->on('open', [$this,'onOpen']);

        $this->_server->on('message', [$this,'onMessage']);

        $this->_server->on('close', [$this,'onClose']);

        $this->_server->on('request', 'onRequest');

        $this->_server->start();
    }

    public function onOpen(swoole_websocket_server $server, $request) {
        echo "server: handshake success with fd{$request->fd}\n";
    }

    public function onMessage(swoole_websocket_server $server, $frame) {
        echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
        $server->push($frame->fd, "this is server");
    }

    public function onClose(swoole_websocket_server $server, $fd) {
        echo "client {$fd} closed\n";
    }

    public function onRequest(swoole_http_request $request, swoole_http_response $response) {
//        global $server;//调用外部的server
        // $server->connections 遍历所有websocket连接用户的fd，给所有用户推送
        foreach ($this->_server->connections as $fd) {
            $this->_server->push($fd, $request->get['message']);
        }
    }
}

$swoole = new SwooleWebsocket();
$swoole->startServer();

