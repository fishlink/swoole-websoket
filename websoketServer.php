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
        $this->_server->set([
            'websocket_subprotocol' => 'chat',
        ]);
    }

    public function startServer(){
        $this->_server->on('open', 'onOpen');

        $this->_server->on('message', 'onMessage');

        $this->_server->on('close', 'onClose');

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
}

$swoole = new SwooleWebsocket();
$swoole->startServer();

