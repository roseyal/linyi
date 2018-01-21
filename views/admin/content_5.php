<!DOCTYPE html>

<html lang="zh-CN">

<head>
    <link href="/user/css/bootstrap.min.css" rel="stylesheet">

    <link href="/user/css/messages.css" rel="stylesheet">
</head>

<body>

<!-- 开始 -->

<div class="my_info_title">发布新闻</div>

<div class="messages" style="padding-bottom: 40px;" >

    <form id="form">
        <input name="username" value="<?= $data['username']?>" type="hidden">
    <table class="messages_table" >


        <tr>

            <td align="right" width="150">栏目：</td>

            <td width="400">
                <select name="catid">
                    <?php foreach ($data['data'] as $v) :?>
                    <?php
                        if($v['parentid'] == 0)
                            echo "
                                <option value=".$v['catid'].">".$v['catname']."</option>
                            ";
                        else echo "<option value=".$v['catid'].">&nbsp;&nbsp;|_".$v['catname']."</option>";

                    ?>
                    <?php endforeach;?>
                </select>
            </td>

        </tr>

        <tr>

            <td align="right" width="150">标题：</td>
            <td width="400">
                <input type="text" class="form-control" placeholder="Title" name="title">
            </td>
            <td>&nbsp;请输入标题</td>

        </tr>

        <tr>

            <td align="right" width="150">关键字：</td>

            <td width="300"><input type="text" class="form-control" name="keywords"></td>

            <td>&nbsp;多关键词之间用空格或者“,”隔开</td>

        </tr>
        <tr>
            <td align="right" width="150">来源：</td>

            <td width="300">
                <input type="text" class="form-control" name="copyfrom">
            </td>
        </tr>

        <tr>
            <td align="right" width="150">摘要：</td>

            <td width="400">
                <input type="text" class="form-control" name="description" id="description">
            </td>
        </tr>

        <tr style="margin-bottom: 30px;">

            <td align="right" width="150" style="vertical-align:top !important;">内容：</td>

            <td width="400"><textarea class="form-control" style="resize:vertical" rows="10" name="content" id="content"></textarea></td>

            <td style="vertical-align:top !important;">&nbsp;</td>

        </tr>

        <tr >

            <td align="center" colspan="3" style="padding-top: 30px;">
                <button type="button" class="messages_table_submit" id="sub"  >立即发布</button>
            </td>

        </tr>

    </table>
    </form>
</div>



<!-- 结束 -->

</body>
<script type="text/javascript">
    window.onload = function () {
        var sub = document.getElementById('sub');
        var description = document.getElementById('description');
        var content = document.getElementById('content');
        var input = document.getElementsByClassName('form-control');
        content.onblur = function () {
            if(description.value == '') {
                description.value = this.value.substr(0,30);
            }
        }
        sub.onclick = function () {
            if(input[0].value == '') {
                alert('请填写标题');
                return;
            }
            if(input[4].value == '') {
                alert('请填写内容');
                return;
            }
            var form = new FormData(document.getElementById('form'));
            $.ajax({
                url:'/admin/add-news',
                type:'POST',
                data:form,
                processData: false,
                contentType:false,
                success:function (data) {
                    if(JSON.parse(data) == "succ"){
                        alert('添加成功');
                        window.parent.document.getElementById('crowdfunding_iframe').src = 'content?id=4';

                    }
                    if(JSON.parse(data) == "fail") {
                        alert('添加失败');
                    }
                },
                error:function (err) {
                    alert(err);
                }
            })
        }

    }
</script>
</html>