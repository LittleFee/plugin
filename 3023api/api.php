<?php
	//api.php
    if($_GET['sn']==''){//简单验证
        echo "<script>alert('请输入序列号');history.go(-1);</script>";
        exit;
    }
    $filename = "./code.conf";//key文件地址，code.conf用于放置你的key 
    $handle = fopen($filename, "r");//打开并获得文件句柄
    $key = fread($handle, filesize ($filename));//获取key文件里的key值
    fclose($handle);
    $wrongCode=array(//错误状态
        '302311'  => '序列号或者IEMI错误',
        '302312'  => '非苹果序列号或者IEMI',
        '302301'  => 'Wrong key',//配置文件里的key缺失
        '302302'  => 'Wrong key',//配置文件里的key无效
        '302303'  => 'Insufficient account balance',//余额不足
        '302304'  => 'Wrong IP',//IP白名单限制
        '302305'  => 'Wrong sign'//签名错误
    );
    $sn=strtr($_GET['sn'], array(' '=>''));//获得输入的序列号或者IMEI，并去掉中间的空格，确保判断正确 
    //$str=(is_numeric($sn))?'apple/imei?imei=':'apple/apple?sn=';//判断是否是纯数字      
    $str=preg_match('/^[0-9]{15}$/',$sn)?'imei?imei=':'apple?sn=';//使用正则匹配  
    $ch = curl_init("http://api.3023.com/apple/{$str}{$sn}");//组合api和请求数据的url
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,array("3023-key:{$key}"));
    curl_setopt($ch,CURLOPT_ENCODING,"gzip");
    curl_setopt($ch,CURLOPT_TIMEOUT,60);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,60);
    $json = curl_exec($ch);
    curl_close($ch);
    $json = json_decode($json,true);
    if(isset($json['code'])){
        echo "<script>alert('{$wrongCode [$json['code']]}');history.go(-1);</script>";
        exit;
    }
/**
 * Created by PhpStorm.
 * User: qingxiaofee
 * Date: 2017/1/13
 * Time: 15:23
 */
