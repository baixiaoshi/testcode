<?php
header('Content-Type:text/html; charset=utf-8');
/*	$menu = array(
		0=>array(
			'name'	=>	'公司',
			'sub_button' => array(
				0=>array('type'=>'view','name'=>'简介','url'=>'http://www.baidu.com'),
				1=>array('type'=>'view','name'=>'加盟','url'=>'http://www.baidu.com'),
				2=>array('type'=>'view','name'=>'知识库','url'=>'http://www.baidu.com')

				)
			),
		1=>array(
			'name'	=>	'服务',
			'sub_button' => array(
				0=>array('type'=>'view','name'=>'我的帐号','url'=>'http://www.baidu.com'),
				1=>array('type'=>'view','name'=>'门店','url'=>'http://www.baidu.com'),
				2=>array('type'=>'view','name'=>'预约','url'=>'http://www.baidu.com'),
				3=>array('type'=>'view','name'=>'活动','url'=>'http://www.baidu.com')

				)

			),
		2=>array(
			'type'=>'view',
			'name'=>'微商城',
			'url' => 'http://www.baidu.com'
			)
		);

	$json = json_encode($menu);
	file_put_contents("c:/log.txt",$json."\r\n",FILE_APPEND);
	echo $json;*/

	//$menu = '[{"name":"\u516c\u53f8","sub_button":[{"type":"view","name":"\u7b80\u4ecb","url":"http:\/\/www.baidu.com"},{"type":"view","name":"\u52a0\u76df","url":"http:\/\/www.baidu.com"},{"type":"view","name":"\u77e5\u8bc6\u5e93","url":"http:\/\/www.baidu.com"}]},{"name":"\u670d\u52a1","sub_button":[{"type":"view","name":"\u6211\u7684\u5e10\u53f7","url":"http:\/\/www.baidu.com"},{"type":"view","name":"\u95e8\u5e97","url":"http:\/\/www.baidu.com"},{"type":"view","name":"\u9884\u7ea6","url":"http:\/\/www.baidu.com"},{"type":"view","name":"\u6d3b\u52a8","url":"http:\/\/www.baidu.com"}]},{"type":"view","name":"\u5fae\u5546\u57ce","url":"http:\/\/www.baidu.com"}]';
	$menu = '{
     "button":[
     {		
          "name":"公司",
          "sub_button":[
           {	
               "type":"view",
               "name":"简介",
               "url":"http://115.159.5.180/Wx/Home/index"
            },
            {
               "type":"view",
               "name":"加盟",
               "url":"http://115.159.5.180/Wx/Home/join"
            },
            {
               "type":"view",
               "name":"知识库",
               "url":"http://115.159.5.180/Wx/Home/zhishi"
            }]
          
      }],

     "button":[
     {	  "type":"view",
          "name":"服务",
          "url" : "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx4f3a72dab76d4d7b&redirect_uri=http://115.159.5.180/Wx/User/index/oauth2/&response_type=code&scope=snsapi_base&state=1#wechat_redirect"
          
          
      }],
      "button":[{
      	"type":"view",
      	"name":"微商城",
      	"url":"http://115.159.5.180/Wx/Home/store"

      }]


 }';
 	/*$menu = '{"button": [
        {
            "type": "click",
            "name": "图文获取",
            "key": "图文"
        }],
        "button":[
        {
            "type": "view",
            "name": "授权获取3",
            "url": "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx4f3a72dab76d4d7b&redirect_uri=http://115.159.5.180/Wx/Home/index/oauth2/&response_type=code&scope=snsapi_base&state=1#wechat_redirect"
        }
    ]}';*/
	$url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token=d7d-dAZ8pPfpBD9qL3s_tPgLxUlQpVEs7Gv-VfI4yG6S4PY1yqINQzjoJbMrO2plh6khaYBO-DzhKYl7mHETuQIA0WoCtbT1E7xdiTj_bPA';
	$ch = curl_init($url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_POST,1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$menu);
	curl_error($ch);
	$content = curl_exec($ch);
	echo '<pre>';
		print_r($content);
	echo '</pre>';


  ?>