
<?php

session_start();
    header("Content-type: application/json; charset=utf-8");  
    //开始模拟登录
    $url = "http://cet-bm.neea.edu.cn/Home/ToQueryTestTicket";
    $cookie = './cookie/'.$_SESSION['id'].'.txt';
    $verificationCode=$_POST['verificationCode'];
    $Name=$_POST['Name'];
    $IDNumber=$_POST['IDNumber'];
    $IDTypeCode=$_POST['IDTypeCode'];
    $provinceCode=$_POST['provinceCode'];
   
    $post = "provinceCode=".$provinceCode."&IDTypeCode=".$IDTypeCode."&IDNumber=".$IDNumber."&Name=".$Name."&verificationCode=".$verificationCode;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);  //不自动输出头信息
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  //不自动输出数据
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  //抓取跳转后数据
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //这里就是使用验证码cookie文件的地方
    curl_setopt($ch, CURLOPT_REFERER, "http://cet-bm.neea.edu.cn/Home/QueryTestTicket");  
    curl_setopt($ch, CURLOPT_POSTFIELDS,$post);  
    $result=curl_exec($ch);
    curl_close($ch);
    echo $result;