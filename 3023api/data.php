<?php include'api.php';?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
    <title></title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <div class="data">
        <p style="text-align: center;margin-bottom: 1.2rem;"><img src="<?php echo $json['img']?>"></p>
        <h1><?php  echo $json['model']?></h1>
        <ul>
            <li>序列号：<span><?php echo $json['sn']?></span></li>
            <li>设备型号：<span><?php echo $json['model']?></span></li>
            <li>容量：<span><?php echo $json['capacity']?></span></li>
            <li>颜色：<span><?php echo $json['color']?></span></li>
            <li>版本：<span><?php echo $json['number']?></span></li>
            <li>类型：<span><?php echo $json['identifier']?></span></li>
            <li>模型：<span><?php echo $json['order']?></span></li>
            <li>网络：<span><?php echo $json['network']?></span></li>
            <li>激活状态：<span><?php if($json['activated']==0)echo '未激活';else echo '已激活';?></span></li>
            <li>激活时间：<span><?php echo $json['time']?></span></li>
            <li>产地：<span><?php echo $json['origin']?></span></li>
            <li>出厂日期：<span><?php echo $json['start'].'-'.$json['end']?></span></li>
            <br/>
            <li>产品类型：<span><?php echo $json['product']?></span></li>
            <li>有效购买日期：<span><?php if($json['purchasing']==0)echo '不是';else echo '是';?></span></li>
            <li>硬件保修：<span><?php echo $json['warranty']?></span></li>
            <li>保修剩余：<span><?php echo $json['daysleft']?></span></li>
<!--            <li>电话支持：<span>--><?php //echo $json['tele']?><!--</span></li>-->
            <br/>
            <li class="li_title">规格参数：</li>
            <li>产品：<span><?php echo $json['spec']['item']?></span></li>
            <li>上市时间： <span><?php echo $json['spec']['intro']?></span></li>
            <li>停产时间： <span><?php echo $json['spec']['disc']?></span></li>
            <li>显示屏：<span><?php echo $json['spec']['display']?></span></li>
            <li>分辨率： <span><?php echo $json['spec']['resolution']?></span></li>
            <li>处理器： <span><?php echo $json['spec']['cpu']?></span></li>
            <li>内存： <span><?php echo $json['spec']['ram']?></span></li>
            <li>存储： <span><?php echo $json['spec']['storage']?></span></li>
            <li>尺寸：<span><?php echo $json['spec']['dimension']?></span></li>
            <li>重量：<span><?php echo $json['spec']['weight']?></span></li>
            <br/>
            <li class="li_title">翻新机鉴定：</li>
            <li>翻新机概率： <span><?php echo $json['renovate']['probability']?></span></li>
            <li>鉴定结果：<span><?php echo $json['renovate']['result']?></span></li>
            <br>
            <li><p style="font-size: 0.8rem;text-align: center;color: #ffffff">本次查询数据由 <a href="https://github.com/LittleFee/plugin/tree/master/3023api" style="color: #f2c919;text-decoration:none">LittleFee</a> 提供<br>结果仅供参考，以 <a href="https://checkcoverage.apple.com/?sn=<?php  echo $json['sn']?>" style="color: #f2c919;text-decoration:none">苹果官网查询</a> 为准</p></li>
        </ul>



    </div>

</body>
</html>
