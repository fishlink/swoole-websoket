# swoole-websoket
用swoole扩展库实现实时通讯
# 官方文档：https://wiki.swoole.com/

该扩展是用C语言写的，没有windows版本，只能在cli模式下运行，否则会抛出致命错误，可以创建很多种服务，例如TCP，UDP....本demo只是实现了php常用的websoket实时通讯

# 环境依赖：
linux服务器环境，本人使用lnmp服务器环境，一键安装就可以用了，官方文档：https://lnmp.org/install.html
linux执行脚本：wget http://soft.vpser.net/lnmp/lnmp1.5.tar.gz -cO lnmp1.5.tar.gz && tar zxf lnmp1.5.tar.gz && cd lnmp1.5 && ./install.sh lnmp

# 安装swoole扩展
swoole扩展已经收录到了PHP官方扩展pecl了，使用命令 pecl install swoole，编译安装成功后，编辑php配置文件，加上extension=swoole.so，查看phpinfo或者cli模式下php -m，如果有swoole模块，表示编译安装成功

# 安装代码自动提示工具
初衷：由于大多数人开发环境都是用windows，而swoole的运行环境是linux，为了提高开发效率和照顾初级程序员，因此需要安装代码自动提示工具
用composer安装：composer require --dev "eaglewu/swoole-ide-helper:dev-master"，github地址：https://github.com/wudi/swoole-ide-helper

# 运行
cd到项目目录下，linux终端运行php websoketServer.php，或者在后台运行：nohup php websoketServer.php &，客户端浏览器访问项目，发现已建立连接
客户端使用js的websock：var wsServer = 'ws://192.168.1.111:9502';向服务器发送消息使用：websocket.send('client data');
服务器发送消息使用：$server->push($frame->fd, "this is server");

