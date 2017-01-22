<?php
//getIp.php
/*@查询ip的归属地（使用新浪api）
     *$ip:一个ip地址
     *$json:返回的数组
    */
function getIp($ip = ''){
        //没有给定值就默认从$_SERVER中获取
        if(empty($ip))
            $ip = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];            
            
        //调用新浪的开放API查询ip对应地址
        $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);
        
        //如果查询结果为空返回false
        if(empty($res))return false;
        
        //给一个匹配json
        $jsonMatches = array();
        
        //用正则匹配将从新浪返回的数组进行匹配
        preg_match('#\{.+?\}#', $res, $jsonMatches);
        if(!isset($jsonMatches[0])) 
            return false;
            
        //解析json传得到数组    
        $json = json_decode($jsonMatches[0], true);
        if(isset($json['ret']) && $json['ret'] == 1){
            $json['ip'] = $ip;
            unset($json['ret']);
        }else{
            return false;
        }
        
        //返回数组
        return $json;
        
}
print_r(getIp('125.70.79.170'));

//taobaoIp.php
/*@查询ip的归属地（使用淘宝api）
 *$ip:一个ip地址
 *$ipInfo:返回的数组
 */
function taobaoIp($ip){
    $taobaoIp = 'http://ip.taobao.com/service/getIpInfo.php?ip='.$ip;
    $ipInfo = json_decode(file_get_contents($taobaoIp),true);
    return $ipInfo;
}
print_r(taobaoIp('125.70.79.170'));
