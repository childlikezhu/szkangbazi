<?php 


   $github_signal = $_SERVER['HTTP_X_HUB_SIGNATURE']; //获取github签名   从中

   /*
    Request URL: http://bbs.zhuwenhaiz.com/sync.php
	Request method: POST
	content-type: application/json
	Expect: 
	User-Agent: GitHub-Hookshot/a57e2bf
	X-GitHub-Delivery: 9c34295c-42af-11e8-8a3b-850f9303144d
	X-GitHub-Event: push
	X-Hub-Signature: sha1=ab9907c8ed8ee0bd8ccd8f161b4c5e91656925cf
   */
   list($hash_type,$hash_value) = explode('=', $github_signal,2);

   //获取用户输入的
   $payload = file_get_contents("php://input");
   $secret = 'wenhaiCOM.';

   //生成带有密钥的hash 值  
   //$hash_type 这时候是sha1  
   $hash = hash_hmac($hash_type, $payload, $secret);

   if($hash && $hash === $hash_value){
   	   echo '认证成功,开始更新';
   	   echo exec("sh github_auto_pull.sh");
   	   echo date('Y-m-d H:i:s');
   }else{
   	   echo '认证失败';
   }




