<?php
	//api.php
    if($_GET['sn']==''){//简单验证
        echo "<script>alert('请输入序列号');history.go(-1);</script>";
        exit;
    }
    $filename = "./code.conf";//key文件地址
    $handle = fopen($filename, "r");//打开并获得文件句柄
    $key = fread($handle, filesize ($filename));//获取key文件里的key值
    fclose($handle);
    $wrongCode=array(//错误状态
        '302311'  => '序列号错误',
        '302312'  => '非苹果序列号',
        '302301'  => 'Wrong key',//配置文件里的key缺失
        '302302'  => 'Wrong key',//配置文件里的key无效
        '302303'  => 'Insufficient account balance',//余额不足
        '302304'  => 'Wrong IP',//IP白名单限制
        '302305'  => 'Wrong sign'//签名错误
    );
    $sn=$_GET['sn'];//获得序列号
    $ch = curl_init("http://api.3023.com/apple/apple?sn={$sn}");
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
 * Date: 2017/1/16
 * Time: 10:23
 */
