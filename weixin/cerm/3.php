<?php
$url1 = "https://api.mch.weixin.qq.com/mmpaymkttransfers/promotion/transfers";
/*$data='<xml>
<mch_appid>wx56fabf6fbf8fae75</mch_appid>
<mchid>1246428601</mchid>
<nonce_str>����</nonce_str>
<partner_trade_no>100000982014120919616</partner_trade_no>
<openid>oHNcyt1hVTtT5IwRiiy7_XbWrJbY</openid>
<check_name>OPTION_CHECK</check_name>
<re_user_name>������</re_user_name>
<amount>1</amount> 
<desc>API������</desc>
<device_info>1000</device_info>
<spbill_create_ip>183.12.64.95</spbill_create_ip>
<body>ibuaiVcKdpRxkhJA</body>
<sign>ACB4DAB31DC4AA6361C0243FD97B5B13</sign>
</xml>';

*/

/* $data = '<xml>
	<amount>1</amount>
	<check_name>NO_CHECK</check_name>
	<desc>����</desc>
	<mch_appid>wx56fabf6fbf8fae75</mch_appid>
	<mchid>1246428601</mchid>
	<nonce_str>5K8264ILTKCH16CQ2502SI8ZNMTM67VS</nonce_str>
	<openid>oAld3wNFDjhVj6RczR88M62DUPuc</openid>
	<partner_trade_no>10000098201511111238767898</partner_trade_no>
	<spbill_create_ip>120.24.235.209</spbill_create_ip>
	<sign>9401656DCB3139C1D742DAD205079113</sign>
</xml>' ;
 */
$data = '<xml>
	<amount>1</amount>
	<check_name>OPTION_CHECK</check_name>
	<desc>测试</desc>
	<mch_appid>wx56fabf6fbf8fae75</mch_appid>
	<mch_id>1246428601</mch_id>
	<nonce_str>5K8264ILTKCH16CQ2502SI8ZNMTM67VS</nonce_str>
	<openid>oAld3wNFDjhVj6RczR88M62DUPuc</openid>
	<partner_trade_no>10000098201421311234567890</partner_trade_no>
	<spbill_create_ip>192.168.100.128</spbill_create_ip>
	<sign>22ADA3E0A13330A755C3FC4E091BBE36</sign>
</xml>';
$ret = https_request($url1,$data);

//$ret1 = json_decode($ret,true);
function https_request($url, $data = null)
{
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($curl,CURLOPT_SSLCERTTYPE,'PEM');
curl_setopt($curl,CURLOPT_SSLCERT,getcwd().'/apiclient_cert.pem');
curl_setopt($curl,CURLOPT_SSLKEYTYPE,'PEM');
curl_setopt($curl,CURLOPT_SSLKEY,getcwd().'/apiclient_key.pem');
if (!empty($data)){
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
}
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($curl);
curl_close($curl);
return $output;
}



print_r($ret);
 exit;