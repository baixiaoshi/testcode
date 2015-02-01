3． 有一个备份程序mybackup,需要在周一至周五下午一点和晚上八点各运行次，下面哪一条crontab的项可以完成这项工作？

A．0 13,20 * * 1,5 mybackup

B．0 13,20 * * 1,2,3,4,5 mybackup  对

C．*13,20 * *1,2,3,4,5, mybackup

D．0 13,20 1,5 * *mybackup


5． 使用命令可以查看Linux的启动信息？dmesg


2．试写出mysql数据库优化的一些方法

1)选取最适用的字段属性,尽可能减少定义字段长度,尽量把字段设置NOT NULL,例如’省份,性别’,最好设置为ENUM

(2)使用连接（JOIN）来代替子查询:

(3)建立索引:

(4)使用扩展库PDO /或者mysqli 使用预处理stmt 缓存字段

(5) 优化查询语句最好在相同字段进行比较操作 ,select 查询的时候尽量少用*,用到什么字段查什么字段在sql语句中尽量少用mysql的函数,我们在PHP端处理好后再交给mysql

(6) 不要用like来查询 这样很不效率,用Sphinx全文检索

(7)分区技术

(8)主从数据库

(9)结合memcache

(10)结合sphinx全文检索

 

1.sql语句优化(索引优化)

2.表优化

表复制

视图表

分库分表

分区

3.数据库优化和服务器优化

字符集

Mysql主从

Mysql集群



<script>

                     Var aj=new XMLHttpRequest;           //第一步产生对象

                     Aj.open(‘post’,’http://8878.sinaap.com/get.php’);  //第二步确定发送方式和打开连接

                     Aj.setRequestHeader(‘Content-type’,’text/html;charset=utf-8’);             //解决了

                     Aj.setRequestHeader(‘Content-type’,’application/x-www-form-urlencoded’);//第三步解决字符集,或者声明发送类型

                     Aj.send(‘username=gaoqiin&pass=kkk’) //第四步:发送数据

                     Aj.onreadystatechange=function(){         //第五步:接收状态值

                            If(aj.readyState==4){            //第六步判断状态

                                   if(aj.status==200){         //第七步:成功后处理数据

                                          alert(‘成功’)

                                   }

                            }

                     }

              </script>

               a.我们用一个 SELECT 语句取出初始数据，通过一些计算，用 UPDATE 语句将新值更新到表中。

     包含有 WRITE 关键字的 LOCK TABLE 语句可以保证在 UNLOCK TABLES 命令被执行之前，

     不会有其它的访问来对 inventory 进行插入、更新或者删除的操作

   mysql_query("LOCK TABLE customerinfo READ, orderinfo WRITE");

   mysql_query("SELECT customerid FROM `customerinfo` where id=".$id);

   mysql_query("UPDATE `orderinfo` SET ordertitle='$title' where customerid=".$id);

   mysql_query("UNLOCK TABLES");


   SELECT * FROM order WHERE addtime/7<24;(慢)

   SELECT * FROM order WHERE addtime<24*7;(快)



      SELECT * FROM order WHERE title like "%good%";

   SELECT * FROM order WHERE title>="good" and name<"good";


14、对于大流量的网站,您采用什么样的方法来解决访问量问题?(4分)

答:确认服务器硬件是否足够支持当前的流量,数据库读写分离,优化数据表,

   程序功能规则,禁止外部的盗链,控制大文件的下载,使用不同主机分流主要流量


