<?php
/*
 *���ǲ���openssl��һ����
 *����
 * 1. ���ɷ������˵�˽Կ
 * 2. ����Certificate Signing Request(CSR)�����ɵ�CSR�ļ�����CAǩ�����γɷ�����
 * ���Լ���֤��
 * 3. �Կͻ���Ҳ��ͬ������������key�Լ�csr�ļ�
 *
 * 4. crs�ļ�������CA��ǩ���ſ����γ�֤�飬�ɽ����ļ����͵�verisign�ȵط�������
 * ������Ҫ��Ǯ�ģ����ǿ����Լ���CA��
 * open req -new -x509 -keyout ca.key -out ca.crt -config opensll.cnf
 *
 * 5. �����ɵ�CA֤��Ϊ�ղ����ɵ�server.csr  client.csr��ǩ��
 *
 * 6. ��������Ҫ���ļ���������
 * 
 *
 *
 *

class OpenSSL
{
	
	
}



?>
