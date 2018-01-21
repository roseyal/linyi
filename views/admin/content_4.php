<!DOCTYPE html>

<html lang="zh-CN">

<head>
    <!-- Bootstrap -->

    <link href="/user/css/project_manage.css" rel="stylesheet">
    <style type="text/css">
        th{border:1px solid;}
    </style>
</head>

<body>

<!-- 开始 -->

<div class="my_info_title">已发布稿件</div>


    <table class="table table-bordered">
        <tr class="active">
            <th >ID</th>
            <th width="50%;">标题</th>
            <th>栏目</th>
            <th>添加时间</th>
            <th>操作</th>
        </tr>
        <?php foreach($data as $v) :?>
        <tr>
            <td><?= $v['id']?></td>
            <td><?= $v['title']?></td>
            <td><?= $v['catname']?></td>
            <td><?= date('Y-m-d',$v['inputtime'])?></td>
            <?php
                if($v['status'] != 99) echo "<td style='color:red;'>审核中</td>" ;
                else echo "<td style='color:green;'>通过</td>"
            ?>
        </tr>
        <?php endforeach;?>
    </table>



<div class="my_info_content">

    <?php if (count($data) == 0) :?>
    <div class="my_info_content_care"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;该项目暂无内容！ </div>
    <?php endif;?>


</div>



<!-- 结束 -->

</body>

</html>