<?php
	header('Content-Type:text/html;charset=utf-8');
	//模拟微信登入
	$cookie_file = tempnam('./temp','cookie');
	$url = 'http://stonetogold.eicp.net:83/rizhao/api/mall.php/Alipay/addorder';
	
	$post_data = 'payflag=2&payprice=0.01&seller_id=269&seller_name=山东日照店&buyer_id=592&buyer_name=15221126960&goods_amount=100.00&order_amount=110.00';
	$post_data .='&consignee=黄渤&region_id=925&region_name=山东省日照东港区&address=上海闸北洛川中路&zipcode=334001&phone_mob=15106331954&shipping_id=115&shipping_name=同城配送：免邮费&shipping_fee=0.00';
	//$post_data .='&goods_id=1723&goods_name=得其利是洗衣皂婴幼儿专用180g/块&spec_id=2689&price=123.00&quantity=2&goods_image=data/files/store_112/goods_22/small_201406210923425765.jpg';
	$post_data .='&goodsinfojson=[{"goods_id":1259,"goods_name":"\u548c\u4e1d\u9732\u84dd\u8393\u6c41\u996e\u6599420ml*15","spec_id":1915,"price":"120.00","quantity":2,"goods_image":"data\/files\/store_53\/goods_39\/small_201404251453599966.jpg"},{"goods_id":795,"goods_name":"\u5723\u8c37\u5c71 2014\u65b0\u8336\u9884\u552e \u665a\u6625\u8336\u7279\u7ea7\u65e5\u7167\u7eff\u8336 \u660e\u524d\u96e8\u524d\u8336\u9884\u5b9a","spec_id":866,"price":"90.00","quantity":3,"goods_image":"data\/files\/store_61\/goods_106\/small_201404151655067063.jpg"}]';
	$ch = curl_init($url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_POST,1);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$post_data);
	$content = curl_exec($ch);
	curl_close($ch);
	echo '<pre>';
		print_r($content);
	echo '</pre>';

	function hello($a,$b)
	{
		echo 'hello world';
	}
