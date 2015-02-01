<?php
/*
 *这是测试openssl的一个类
 *步骤
 * 1. 生成服务器端的私钥
 * 2. 生成Certificate Signing Request(CSR)，生成的CSR文件交给CA签名后形成服务器
 * 端自己的证书
 * 3. 对客户端也作同样的命令生成key以及csr文件
 *
 * 4. crs文件必须有CA的签名才可以形成证书，可将此文件发送到verisign等地方由它验
 * ，但是要交钱的，我们可以自己做CA呢
 * open req -new -x509 -keyout ca.key -out ca.crt -config opensll.cnf
 *
 * 5. 用生成的CA证书为刚才生成的server.csr  client.csr　签名
 *
 * 6. 现在我们要的文件都生成了
 * 
 *
 *
 *

class OpenSSL
{
	
	
}



?>
