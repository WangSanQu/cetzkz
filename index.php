
<?php 
//说明：由王三去提供，需要更多功能，可付费开通。

//详情请登录www.sanquyun.com了解。
    
   ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>三去云四六级查询</title>
	<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport" />
	<meta content="yes" name="apple-mobile-web-app-capable" />
	<meta content="black" name="apple-mobile-web-app-status-bar-style" />
	<meta content="telephone=no" name="format-detection" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
WeixinJSBridge.call('hideOptionMenu');
});
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
WeixinJSBridge.call('hideToolbar');
});
</script>
      

</head>
<body>

<section class="aui-flexView">
	
	<section class="aui-scrollView">
		<div class="aui-auto-img">
		<br><br><br>	<img src="cet/cet.png" alt="">
			<br><br><br>
		</div>
		<div class="aui-auto-form">
			<div class="aui-auto-box">
			
				<form id="form1" class="aui-auto-inp">
					
					<div class="aui-flex">
						<label>省份</label>
						<div class="aui-flex-box">
							<select class="weui-select" name="provinceCode">
								    <option value="11">北京市</option>
        <option value="12">天津市</option>
        <option value="13">河北省</option>
        <option value="14">山西省</option>
        <option value="15">内蒙古自治区</option>
        <option value="22">吉林省</option>
        <option value="23">黑龙江省</option>
        <option value="31">上海市</option>
        <option value="32">江苏省</option>
        <option value="34">安徽省</option>
        <option value="35">福建省</option>
        <option value="36">江西省</option>
        <option value="37">山东省</option>
        <option value="41">河南省</option>
        <option value="42">湖北省</option>
        <option value="43">湖南省</option>
        <option value="44">广东省</option>
        <option value="45">广西壮族自治区</option>
        <option value="46">海南省</option>
        <option value="50">重庆市</option>
        <option value="51">四川省</option>
        <option value="52">贵州省</option>
        <option value="53">云南省</option>
        <option value="54">西藏自治区</option>
        <option value="62">甘肃省</option>
        <option value="63">青海省</option>
        <option value="64">宁夏回族自治区</option>
        <option value="65">新疆维吾尔自治区</option>
        <option value="82">澳门</option>
							</select>
						</div>
					</div>
						<div class="aui-flex">
						<label>证件类型</label>
						<div class="aui-flex-box">
							<select class="weui-select" name="IDTypeCode">
								     <option value="1">中华人民共和国居民身份证</option>
                                        <option value="2">台湾居民往来大陆通行证</option>
                                        <option value="3">港澳居民来往内地通行证</option>
                                        <option value="4">护照</option>
                                        <option value="5">香港身份证</option>
                                        <option value="6">澳门身份证</option>
                                        <option value="7">港澳居民居住证</option>
                                        <option value="8">台湾居民居住证</option>
							</select>
						</div>
					</div>
					<div class="aui-flex">
						<label>身份证</label>
						<div class="aui-flex-box">
							<input type="text" name="IDNumber"  autocomplete="off" placeholder="请输入证件号码">
						</div>
					</div>
					<div class="aui-flex">
						<label>姓名</label>
						<div class="aui-flex-box">
							<input name="Name" type="text" placeholder="请输入姓名">
						</div>
					</div>
					<div class="aui-flex">
						<label>验证码</label>
						<div>
						
							
							<img class="weui-vcode-img"  style="height: 22px; width: 66px;" src="cetyzm.php" id="Codes" onClick="this.src='cetyzm.php';">
						</div>
					</div>
					<div class="aui-flex">
						<label>输入验证码</label>
						<div class="aui-flex-box">
							<input type="text" name="verificationCode" autocomplete="off" placeholder="请输入验证码">
							
							
						</div>
					</div>
					<button class="aui-apply-btn"  onclick="return queryTestTicket();" id="ibtnLogin" name="ibtnLogin" >立即查询</button>
					
<div id="resultDIV" style="display:none; margin-top:10px;">
            <table class="table table-bordered table-hover " style="width:100%; text-align:center;">
                <thead>
                    <tr>
                        <td style="width:50%; font-weight:bold;">科目名称</td>
                        <td style="width:50%;font-weight:bold;">准考证号</td>
                    </tr>
                </thead>
                <tbody id="tbody">
                </tbody>
            </table>
        </div>
				</form>
			</div>
		</div>
			

	</section>

</section>

   
<script type="text/javascript">
    $(function () {
        refreshImg();
    });

    function refreshImg() {
        $("#vcodeImg").attr("src", "http://cet-bm.neea.edu.cn/Home/VerifyCodeImg?a=" + Math.random());
    }
    function queryTestTicket() {
//alert('提示');
      
        $.ajax({
            type: "post",
            async: false,
            beforeSend: function (XMLHttpRequest) {
            },
            url: 'testdo.php',
            data: $('#form1').serialize(),
            success: function (data) {
               //alert(data);
                switch (data.ExceuteResultType) {
                    case -1:
                        alert('验证码错误');
                        break;
                    case 0:
                        alert('提示3');
                        break;
                    case 1:
                    
                        var innerHtml = "";
                        //alert(openid);
                        var subjectRegisterList = eval(data.Message);
                        $.each(subjectRegisterList, function (i, item) {
                            var singleSubject = "";
                            var SubjectName = item.SubjectName;
                            var testTicket = item.TestTicket;
                           // alert(SubjectName);
                          var params = {
                            openid: "<?php echo $openid;?>",
                            zkzh: testTicket,
                            SubjectName: SubjectName,
                            gzh: "<?php echo $gzh;?>"
                            };
                            document.cookie = "testTicket=" + testTicket;
                             document.cookie = "SubjectName=" + SubjectName;
                             
                             
                            singleSubject = "<tr><td>" + SubjectName + "</td><td>" + testTicket + "</td></tr>";
                            innerHtml += singleSubject;

                        });
                        $("#tbody").html(innerHtml);
                       
                        $("#resultDIV").show();
                        break;
                }
            },
            error: function (data) {
                refreshImg();
                $.messager.alert('提示', '获取信息失败，错误信息：' + data.responseJSON.Message, 'error');
            }
        });
        return false;
    };
</script>
</body>


</html>
