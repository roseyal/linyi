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

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/messages.css" rel="stylesheet">

</head>

<body>

<!-- 开始 -->

<div class="my_info_title">发布新闻</div>

<div class="messages">
<?php
  use yii\widgets\ActiveForm;
?>
  <?php $from =ActiveForm::begin(['action'=>['user/news_add'],'method'=>'post']) ?>
  <table class="messages_table">

    <tr>

      <td align="right" width="150">标题：</td>

      <td width="400">
      <input type="text" name="Pro[username]" class="form-control" id="exampleInputEmail1" placeholder=""></td>
      <td>&nbsp;请输入标题</td>

    </tr>
    <tr>

      <td align="right" width="150">栏目：</td>

      <td width="400">
          <select name="Pro[cid]">
          <?php foreach($cate as $v):?>
                    <option value="<?= $v['catid']?>"><?= $v['catname']?></option>
          <?php endforeach; ?>
          </select>
      </td>

      <td>&nbsp;请输入标题</td>

    </tr>

    <tr>

      <td align="right" width="150" style="vertical-align:top !important;">内容：</td>

      <td width="400">
      <textarea class="form-control" style="resize:vertical" rows="3" name="Pro[content]"></textarea></td>
      <td style="vertical-align:top !important;">&nbsp;</td>

    </tr>

    <tr>

      <td align="center" colspan="3">
      <input type="submit" class="messages_table_submit" value="立刻发布"></td>
    </tr>

  </table>
  <?php ActiveForm::end(); ?>

</div>



<!-- 结束 -->

</body>

</html>