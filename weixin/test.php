

<script type="text/javascript"
src="jquery-1.11.3.min.js">
</script>

<form action="http://120.24.235.209:83/api.php/task/apps_down_submit?key=eefd86d62af6e20429c2ce7aa6359902" method="get">
<div><input type="text" name="a" value="1" id="a" /></div>
<div><input type="text" name="b" value="2" id="b" /></div>
<div><input type="hidden" name="c" value="3" id="c" /></div>
<div>
<textarea name="d" rows="8" cols="40">4</textarea>
</div>
<div><select name="e">
<option value="5" selected="selected">5</option>
<option value="6">6</option>
<option value="7">7</option>
</select></div>
<div>
<input type="checkbox" name="f" value="8" id="f" />
</div>
<div>
<input type="submit" name="g" value="Submit" id="g" />
</div>
</form>


<script>
function common_request(){
	
	var url="<?php echo site_url("mobile/index");?>?inajax=1";
	var data_ = {
		'page':page,
		'time':<?php echo time();?>,
		'action':'ajax_data' , 
		'type':$("select[name='ss']").val() , 
		'key':$.trim($("input[name='key']").val() )
	} ;
	//console.dir(data_);
	$.ajax({
	type: "POST",
	url: url ,
	data: data_,
	cache:false,
	dataType:"json",
	async:true,
	success: function(msg){
		var shtml = '' ;
		var list = msg.resultinfo.list;
		
		if(msg.resultcode<0){
			layer.msg('没有权限执行此操作');
			return false ;
		}else if(msg.resultcode == 0 ){
			layer.msg('服务器繁忙请稍后');
			return false ;
		}else{
		
			for(var i in list){
				shtml+='<tr id="tr_'+list[i].id+'">';
				shtml+= '<td>'+list[i].old_idfa+'</td>' ;
				shtml+= '<td>'+list[i].new_idfa+'</td>' ;
				shtml+= '<td>'+list[i].studio_name+'</td>' ;
				shtml+= '<td>'+list[i].status_string+'</td>' ;
				shtml+='<td >'+list[i]['add_time']+'</td>';
				if(list[i].status == 0 ){
					shtml+='<td ><a href="javascript:void(0)" onclick="change(this , '+list[i].id+')">更换</a></td>';
				}else{
					shtml+='<td >无</td>';
				}
				
				shtml+='</tr>';
			}
			$("#result_").html(shtml);
			$("#page_string").html(msg.resultinfo.obj);
			$("#total").html(msg.resultinfo.errmsg);
		}
		layer.close(loadding_0);
	},
	beforeSend:function(){
		
		 loadding_0 = layer.load('正在努力为你加载。。。。。。'); 
	},
	error:function(){
		layer.msg('服务器繁忙请稍后 ');
		return false ;
	}
	});
}

function change(o  , id ){
	$.layer({
	    shade: [0],
	    area: ['auto','auto'],
	    dialog: {
	        msg: '是否更换，此操作不可恢复，请谨慎操作谢谢合作！！',
	        btns: 2,                    
	        type: 4,
	        btn: ['确定','取消'],
	        yes: function(){
	        	$.ajax({
	        		type: "POST",
	        		url: "<?php echo site_url("mobile/do_change_mobile")?>?inajax=1" ,
	        		data: {id:id},
	        		cache:false,
	        		dataType:"json",
	        		async:false,
	        		success: function(msg){
	        			if(msg['resultcode'] == 1 ){
							common_request();
		        		}else{
		        			layer.msg(msg.resultinfo.errmsg);
			        	}
	        			layer.close(loadding_0);
	        		},
	        		beforeSend:function(){
	        			 loadding_0 = layer.load('数据正在处理。。。。。。'); 
	        		},
	        		error:function(){
	        			layer.msg('服务器繁忙请稍后');
	        			return false ;
	        		}
	        		});
	        }, 
	        no: function(){
	        	
	        }
	    }
	});
}


$.ajax({
    type:'json',
	
})
$(document).ready(function(){
	$('#tab').click(function(){
		   $.ajax({
			   url:'dsggadasfd',
			   type:'post',
			   data:{},
			   cahe:false,
			   dataType:'json',
			   success:function(msg){
				   
			   },
			   error:function(){
				   }
		   })
		})
})



//1.$.ajax带json数据的异步请求
var aj = $.ajax( {  
    url:'productManager_reverseUpdate',// 跳转到 action  
    data:{  
             selRollBack : selRollBack,  
             selOperatorsCode : selOperatorsCode,  
             PROVINCECODE : PROVINCECODE,  
             pass2 : pass2  
    },  
    type:'post',  
    cache:false,  
    dataType:'json',  
    success:function(data) {  
        if(data.msg =="true" ){  
            // view("修改成功！");  
            alert("修改成功！");  
            window.location.reload();  
        }else{  
            view(data.msg);  
        }  
     },  
     error : function() {  
          // view("异常！");  
          alert("异常！");  
     }  
});


//2.$.ajax序列化表格内容为字符串的异步请求
function noTips(){  
    var formParam = $("#form1").serialize();//序列化表格内容为字符串  
    $.ajax({  
        type:'post',      
        url:'Notice_noTipsNotice',  
        data:formParam,  
        cache:false,  
        dataType:'json',  
        success:function(data){  
        }  
    });  
}  


//3.$.ajax拼接url的异步请求
var yz=$.ajax({  
     type:'post',  
     url:'validatePwd2_checkPwd2?password2='+password2,  
     data:{},  
     cache:false,  
     dataType:'json',  
     success:function(data){  
          if( data.msg =="false" ) //服务器返回false，就将validatePassword2的值改为pwd2Error，这是异步，需要考虑返回时间  
          {  
               textPassword2.html("<font color='red'>业务密码不正确！</font>");  
               $("#validatePassword2").val("pwd2Error");  
               checkPassword2 = false;  
               return;  
           }  
      },  
      error:function(){}  
}); 


//4.$.ajax拼接data的异步请求
$.ajax({   
    url:'<%=request.getContextPath()%>/kc/kc_checkMerNameUnique.action',   
    type:'post',   
    data:'merName='+values,   
    async : false, //默认为true 异步   
    error:function(){   
       alert('error');   
    },   
    success:function(data){   
       $("#"+divs).html(data);   
    }
});

/* history.go(0);
location.reload()
location=location
location.assign(location)
document.execCommand('Refresh')
window.navigate(location)
location.replace(location)
document.URL=location.href */

/*  history.go(0)
 location.reload()
 location=location
 location.assign(location)
 document.execCommand('Refresh')
 window.navigate(location)
 location.replace(location)
 document.URL=location.href

 setTimeout('window.navigate("top.html");',2000);
 setTimeout('window.document.location.href="top.html";',2000);
 setTimeout('window.document.location="top.html";',2000);
 setTimeout('window.location.href="top.html";',2000);
 setTimeout('window.location="top.html";',2000);
 setTimeout('document.location.href="top.html";',2000);              
 setTimeout('document.location="top.html";',2000);
 setTimeout('location.href="top.html";',2000);
 setTimeout('location.replace("top.html")',2000); */


/* 
 public function getField($field){
		$fieldString = '' ;
		if(!$field){
			$fieldArray = array_flip(array_merge($this->must_field , $this->default_field ));
			$fieldString = implode("," , $fieldArray);
		}else{
			$fieldArray = explode(",",$field) ;
			$fieldData = array_merge($this->must_field , $this->all_field  );
			foreach($fieldArray as $kk => $vv){
				if(array_key_exists($vv, $fieldData)){
					$fieldString.=$vv.",";
				}
			}
			$fieldString = rtrim($fieldString , ',') ;
			if(empty($fieldString)){
				$fieldString = implode(",", array_flip(array_merge($this->must_field , $this->default_field )));
			}else{
				$re = explode("," , $fieldString);
				$fieldString = implode("," ,array_merge(array_keys($this->must_field) ,$re) ) ;
			}
			$fieldArray = explode("," , $fieldString);
			$fieldArray = array_unique($fieldArray) ;
			$fieldString = implode(",",$fieldArray);
		}
		return array('field' => $fieldString);
	}
	//根据字段获取表格的头部
	public function getHead($fieldString = ''){
		if(!$fieldString){
			return array() ;
		}
		$result = array();
		$all = array_merge($this->must_field , $this->default_field , $this->all_field);
		$re = explode("," , $fieldString);
		foreach($re as $k => $v ){
			if(array_key_exists($v, $all)){
				$result[] = $all[$v];
			}
		}
		return $result ;
	}
 */


</script>



<?php 

	$str = "Hello World!\n\n";
	echo $str;
	echo rtrim($str);

public function getHead($fieldString=''){
    if(!$fieldString){
        return array();
    }
    $result=array();
    $all=array_merge($this->must_field,$this->default,$this->all_field);
    $re=explode(",", $fieldString);
    foreach ($re as $k=>$v){
        if (array_key_exists($v, $all)){
            $result[]=$all[$v];
        }
    }
    return $result;
}

function getField($field){
    $fieldString='';
    if (!$field){
        $fieldArray=array_flip(array_merge($this->must_field,$this->default_field));
        $fieldString=implode(',', $fieldArray);
    }else{
        $fieldArray= explode(',', $field);
        $fieldData=array_merge($this->must_field , $this->all_field );
        
    }
}







