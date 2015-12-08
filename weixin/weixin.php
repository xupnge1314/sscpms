<?php

//关注自动回复
if(trim($postObj->Event)=='subscribe'){
    $result = $this->receiveSub($postObj);
    echo $result;
    exit;
}




//关注事件
private function receiveSub($object){
    $content="亲，欢迎关注太平洋安防网官方微信！点击“新闻资讯”，可以常看看行业资讯、产品、活动等；点击“逛太平洋”，可以立马体验微信逛太平洋市场；点击“服务中心”，即可享受全方位服务，如采购产品、预约采访、安防投诉等。另外，我们有全天候客服人员在线服务，你可以随时编辑“您的需求”+“联系方式”进行信息发送，我们会在一时间给你回复。";

    $result = $this->transmitText($object, $content);

    return $result;

}





private function transmitText($object, $content){
    $xmlTpl = "<xml>
			<ToUserName><![CDATA[%s]]></ToUserName>
			<FromUserName><![CDATA[%s]]></FromUserName>
			<CreateTime>%s</CreateTime>
			<MsgType><![CDATA[text]]></MsgType>
			<Content><![CDATA[%s]]></Content>
		</xml>";
    $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time(), $content);
    return $result;
}



if(!empty( $keyword ))
{
    $textTpl = "<xml>
				<ToUserName><![CDATA[%s]]></ToUserName>
				<FromUserName><![CDATA[%s]]></FromUserName>
				<CreateTime>%s</CreateTime>
				<MsgType><![CDATA[%s]]></MsgType>
				<Content><![CDATA[%s]]></Content>
				<FuncFlag>0</FuncFlag>
				</xml>";
    $msgType = "text";
    $contentStr = "Welcome to wechat world!";
    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
    echo $resultStr;
}else{
    echo "Input something...";
}