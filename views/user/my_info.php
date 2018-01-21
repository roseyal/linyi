<!DOCTYPE html>

<html lang="zh-CN">

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="revised" content="Ningxia Seasons, 2015/8/13/" />

<!-- 定义页面的最新版本 -->

<meta name="description" content="网站简介" />

<!-- 网站简介 -->

<meta name="keywords" content="搜索关键字，以半角英文逗号隔开" />

<!-- 搜索关键字 -->

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>某经融公司股权众筹站点</title>



<!-- Bootstrap -->

<link href="/user/css/my_info.css" rel="stylesheet">



<!--[if lt IE 9]>

      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>

      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

</head>

<body>

<!-- 开始 -->

<div class="my_info_title">我的资料<span>

  <button type="button" class="but">签到</button>

  <p>07月29日<br>

    漏签1天</p>

  </span></div>

<div class="my_info_title_3">

  <ul>

    <li id="listClick_1" onClick="listClick(1)" style="border-bottom: 1px solid #C40521; color: #C40521;">基本资料</li>
 
    <li id="listClick_4" onClick="listClick(4)">修改密码</li>

  </ul>

</div>

<div class="my_info_content">

  <div class="my_info_content_care"> 以下信息都为必填项，请您认真填写，某经融公司众筹平台郑重承诺您的个人信息只做为投融资和有限合伙企业设立时使用，感谢您对某经融公司众筹平台的信任和支持！ </div>

  <table class="my_info_content_care_table">

    <tbody>

      <tr>

        <td width="90" align="right" class="color555">用户名：</td>

        <td class="color555">不科学<span class="colorCA1E37 margin_left10 font_size12">不能修改</span></td>

      </tr> 
      <?php
        use yii\helpers\Html;
        use yii\widgets\ActiveForm;
      ?>
      <?php $form =ActiveForm::begin(['action'=>['user/do_add'],'method'=>'post']); ?>
        <tr>

        <td align="right" class="color555">用户名：</td>

        <td class="color555">
        <input class="my_info_content_care_table_text" name="Pro[username]" type="text">

            <span class="color959595 margin_left10 font_size12">请您如实填写</span></td>

        <tr>

        <td align="center" class="color555" colspan="2"><input class="my_info_content_care_table_submit" name="" type="submit" value="保    存"></td>

      </tr>

      <?php ActiveForm::end(); ?>
    </tbody>

  </table>

</div>



<!-- 结束 --> 

<script src="js/jquery-2.1.1.min.js"></script>  

<script src="js/my_info.js"></script>

<script src="js/jquery.cityselect.js"></script> 

<script type="text/javascript">

// JavaScript Document

$(document).ready(function(){

	$("#my_city").citySelect({

		prov:"北京",

		nodata:"none"

	});

});

</script>

</body>

</html>