<?php
/*
 *  Copyright (c) 2014 The CCP project authors. All Rights Reserved.
 *
 *  Use of this source code is governed by a Beijing Speedtong Information Technology Co.,Ltd license
 *  that can be found in the LICENSE file in the root of the web site.
 *
 *   http://www.yuntongxun.com
 *
 *  An additional intellectual property rights grant can be found
 *  in the file PATENTS.  All contributing project authors may
 *  be found in the AUTHORS file in the root of the source tree.
 */

include_once(ROOT_PATH . '/addons/message/CCPRestSmsSDK.php');

//主帐号,对应开官网发者主账号下的 ACCOUNT SID
$accountSid= '8a216da8555d110e015571fdea8c1cd9';

//主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
$accountToken= 'c96a5e8fab424b26a4a84b3892f4fc1e';

//应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
//在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
$appId='8a216da8555d110e015571fdeafc1cdf';

//请求地址
//沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
//生产环境（用户应用上线使用）：app.cloopen.com
$serverIP='sandboxapp.cloopen.com';


//请求端口，生产环境和沙盒环境一致
$serverPort='8883';

//REST版本号，在官网文档REST介绍中获得。
$softVersion='2013-12-26';


/**
  * 发送模板短信
  * @param to 手机号码集合,用英文逗号分开
  * @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
  * @param $tempId 模板Id,测试应用和未上线应用使用测试模板请填写1，正式应用上线后填写已申请审核通过的模板ID
  */       
function sendMsgSDK($to,$datas,$tempId)
{
     // 初始化REST SDK
     global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion;
     $rest = new REST($serverIP,$serverPort,$softVersion);
     $rest->setAccount($accountSid,$accountToken);
     $rest->setAppId($appId);
    
     // 发送模板短信
     $result = $rest->sendTemplateSMS($to,$datas,$tempId);

     if($result == NULL ) {
        return ['error'=>1, 'msg'=>'未知错误'];
     }
     if($result->statusCode!=0) {
        $errMsg = json_encode([
            'code' => $result->statusCode,
            'msg'  => $result->statusMsg,
        ]);

        return ['error'=>1, 'msg'=>$errMsg];
         //TODO 添加错误处理逻辑
     }else{
        $smsmessage = $result->TemplateSMS;
        $successMsg = json_encode([
            'dateCreated'   => $smsmessage->dateCreated,
            'smsMessageSid' => $smsmessage->smsMessageSid,
        ]);
        
        return ['error'=>0, 'msg'=>$successMsg];
        //TODO 添加成功处理逻辑
     }
}
