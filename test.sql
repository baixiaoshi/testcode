
//×Ô¶¨Òå´æ´¢¹ý³Ì
//1.ÏÈ°Ñ½áÊø·ûºÅÐÞ¸ÄÎª//
//2.create procedure testProc()²ÎÊýÀàÐÍÓÐOUT,IN,INOUT
//3.begin
//4.ÈÎÒâÄãÏë²éÑ¯µÄsqlÓï¾ä
//5.END //
//6.°Ñ½áÊø·û¶¨Òå»ØÀ´ delimiter ;
//7.µ÷ÓÃ´æ´¢¹ý³ÌCALL testProc()
//8.select @param½á¹û

delimiter //
create procedure testProc(IN cloumId INT)
begin
select * from tt where id=cloumId;
end //
delimiter ;

call testProc(3);

create table tt(
id int primary key auto_increment,
name varchar(60) not null default '',
age mediumint(3) not null default 0
)engine=myisam default charset=utf8;

SELECT user, MAX(salary) FROM users
GROUP BY user HAVING MAX(salary)>10;

havingºÍwhereµÄÇø±ð£¬havingÊÇÓÃÔÚ¾ÛºÏº¯ÊýÖ®ºóµÄ

²¢ÇÒ¿ÉÒÔÊ¹ÓÃ¾ÛºÏº¯Êý×÷ÎªÌõ¼þ£¬ÀýÈçMAX(salary)>10

²»ÄÜÎÞÔµÎÞ¹ÊµÄÊ¹ÓÃhaving

group by Ä¬ÈÏÊ¹ÓÃasc,²»ÒªÒÔÎªÖ»ÓÐorder by²ÅÓÐasc ºÍdesc


PREPARE STMT FROM "select * from table tt limit ?,?";

execute STMT USING 1,10

´´½¨ÊÓÍ¼·Ç³£µÄÓÐÈ¤

create view vv as select * from 

ÊÓÍ¼ÓÐÁ½ÖÖÐÎÊ½£¬Ò»ÖÖÊÇÄ£°åtemplate,merge
templateÊÇ´´½¨ºÃÁËÖ®ºó¾ÍÒ»Ö±±£´æÔÚÄÚÔÚÖÐ,ÁÙÊ±±í

¶ømergeÃ¿Ò»¸öµ÷ÓÃÕâ¸öÊÓÍ¼µÄÊ±ºò¶¼Òª°ÑÁ½¸ö±í²éÑ¯

algorithm = temptableÁÙÊ±±í

ÁÙÊ±±íÐÞ¸ÄÊÇ·ñ»áÐÞ¸ÄÔ­À´µÄ±íÄØ£¬ÕâÊÇÒ»¸öÎÊÌâ


£¬¶øÇÒÈç¹ûÊ¹ÓÃÁËÁÙÊ±±í£¬ÊÓÍ¼ÊÇ²»¿É¸üÐÂµÄ

mergeËã·¨µÄÊÓÍ¼ÊÇ¿ÉÒÔÔöÉ¾¸Ä²éµÄ£¬¶øtemptableËã·¨µÄÊÇ²»ÄÜÔöÉ¾¸Ä²éµÄ



create table tt2(
subject varchar(60) not null default '',
score int(60) not null default 0
)engine=memory default charset=utf8;


create algorithm=merge view vv2 as select id,name ,age from tt;
create algorithm=temptable view vv3 as select id,name ,age from tt;


create table city(
id int primary key auto_increment,
city varchar(30) not null default '',
provinceid int
)engine=myisam default charset=utf8;

insert into city(id,city,provinceid) values('1','¹ãÖÝ','1'),('2','ÉîÛÚ','1'),('3','»ÝÖÝ','1'),('4','³¤É³','2'),('5','Îäºº','3');


create table province(
id int,
province varchar(30) not null default ''
)engine=myisam default charset=utf8;

insert into province(id,province) values('1','¹ã¶«'),('2','ºþÄÏ'),('3','ºþ±±');


select a.id city_id,a.city,a.provinceid,b.id province_id,b.province from city a,province b where a.provinceid=b.id;


select a.id,a.province,count('b.id') count from province a left join city b ON a.id=b.provinceid GROUP BY b.provinceid;


samba,vsftp,ssh,telnet,webmin,sudo,iptables,lanmp,nfs

update A,B set A.c1=B.c1, A.c2=B.c2 where A.id=B.id and B.age>50

	这种写法算什么连接呢？