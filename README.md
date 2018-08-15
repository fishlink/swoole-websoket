# swoole-websoket
用swoole扩展库实现实时通讯
# 官方文档：https://wiki.swoole.com/

该扩展是用C语言写的，没有windows版本，只能在cli模式下运行，否则会抛出致命错误，可以创建很多种服务，例如TCP，UDP....本demo只是实现了php常用的websoket实时通讯

# 环境依赖：
linux服务器环境，本人使用lnmp服务器环境，一键安装就可以用了，官方文档：https://lnmp.org/install.html

# 安装swoole扩展
使用命令 pecl install swoole，编译安装成功后，编辑php配置文件，加上extension=swoole.so，查看phpinfo，如果有swoole模块，表示编译安装成功
