ServerRoot "/usr/local/apache2" 	apache根目录
ServerName www.host.com             主机名
ServerAdmin 电子邮件
Listen 80 侦听端口


LoadModule  php5Mod    加载动态模块
DirectoryIndexs   index.php  如果请求的URL网页不存在，默认为首页

errorDocument  404   定义错误页面

Alias /dir  /var/www/html    定义别名
DocumentRoot  网站根目录
---------------------------------------------------------------

设置目录和文件的权限

<Directory "dirpath"></Directory>
<Files ""></Files>
<IfModule "mo"></IfModule>
<IfDefine ""></IfDefine>

正则表达式版本

<DirectoryMatch ""></DirectoryMatch>
<FilesMatch ""></FilesMatch>

<VirtualHost 主机名></VirtualHost>
options Indexes FollowSymLinks ExecCGI

Indexes 允许列出网站的根目录下的文件mod_autoindex
FollowSymLinks  允许使用符号链接，也就是超链接
ExecCGI 允许mod_cgi模块执行CGI脚本

Include 包含文件命令

访问控制

Order allow,deny

allow from all
deny from all

后面可以接IP,IP段,主机名来限制权限

AddType 添加mini类型的文件

PHPIniDir path   php配置文件的加载路径

---------------------------------------------------------------

重写模块
RewriteEngine On   开启重写模块
Allowoverride [all|none]

AcceptFilename   .htaccess  这个文件的命名命令

使用这个文件是在管理员没有ROOT操作权限，或者一个服务器有多个站点的时候，管理员不想麻烦

所以开放这个文件让用户自己配置

这个文件开放后，apache会检索网站根目录中每个目录是否有这个文件，

这个文件的权限作用当前目录和子目录

Rewrite 正则  要转向的文件

RewriteCon 正则 文件

L 最后的匹配
QSA
R 跳转

PT  继续下一个请求
'proxy|P' (force proxy)



-------------------------------------------------------------------------------------------------

apache防盗链的配置思路

1.获取请求

2.找出主机名

3.看是否是本站的主机名，如果不是则给予拒绝访问



-------------------------------------------------------------------------------------------------

apache调优

timeout  默认120 我们可以设置60  甚至更小的15,20

KeepAlive 该参数控制Apache是否允许在一个连接中有多个请求，默认打开。但对于大多数论坛类型站点来说，通常设置为off以关闭该支持




