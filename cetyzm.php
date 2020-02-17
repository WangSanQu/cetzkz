<?php
//保存session会话
      session_start();
      $id = session_id();
      $_SESSION['id'] = $id;

      // 验证码保存
      $cookie = './cookie/'.$_SESSION['id'].'.txt'; //cookie文件保存的路径 当前路径下的cookie目录
      //echo $id;

$url_img='http://cet-bm.neea.edu.cn/Home/VerifyCodeImg?a=0.6945132194837729';
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url_img);
      curl_setopt($ch,CURLOPT_HEADER,0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1) ; 
      curl_setopt($ch, CURLOPT_REFERER, 'http://cet-bm.neea.edu.cn/Home/QueryTestTicket');
      curl_setopt($ch , CURLOPT_COOKIEFILE, $cookie);// 读取cookie信息
      curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
curl_setopt($ch, CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,false);
if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'msie')===false)
{
    header("content-type:image/jpg");
}
curl_exec($ch);
curl_close($ch);
?>