<!DOCTYPE html>

<html lang="zh-CN">

<head>

    <link href="/user/css/my_info.css" rel="stylesheet">
</head>

<body>

<!-- 开始 -->

<div class="my_info_title">修改密码</div>

<div class="my_info_title_3">

    <ul>

        <li id="listClick_1" onClick="Clicks(1)">基本资料</li>


        <li id="listClick_4" onClick="Clicks(4)" style="border-bottom: 1px solid #C40521; color: #C40521;">修改密码</li>

    </ul>

</div>

<div class="my_info_content">
    <form id="form" enctype="multipart/form-data">
    <table class="my_info_content_care_table" style="margin-top: 20px;">

        <tbody>

        <tr>

            <td width="300" align="right" class="color555">旧密码：</td>

            <td class="color555"><input class="my_info_content_care_table_text" id="oldpass" name="oldpass" type="password">

                <span class="colorCA1E37 margin_left10 font_size12">请输入旧密码</span></td>

        </tr>

        <tr>

            <td align="right" class="color555">新密码：</td>

            <td class="color555"><input class="my_info_content_care_table_text" id="newpass" name="newpass" type="password">

                <span class="colorCA1E37 margin_left10 font_size12">请输入新密码</span></td>

        </tr>

        <tr>

            <td align="right" class="color555">确认新密码：</td>

            <td class="color555"><input class="my_info_content_care_table_text" id="connewpass"  name="connewpass" type="password">


                <span class="colorCA1E37 margin_left10 font_size12">请再次输入</span>
            </td>

        </tr>

        <tr>

            <td align="center" class="color555" colspan="2">
                <button  class="my_info_content_care_table_submit" name="" style="margin-top:20px;" type="button" id="sub" >修改密码</button>
            </td>

        </tr>

        </tbody>
    </table>
    </form>
</div>



<!-- 结束 -->



</body>
<script type="text/javascript">
    window.onload = function () {
        var oldpass = document.getElementById('oldpass');
        var newpass = document.getElementById('newpass');
        var connewpass = document.getElementById('connewpass');
        var sub = document.getElementById('sub');
        sub.onclick = function () {
            if(!oldpass.value) {
                alert('请输入旧密码');
                return;
            }
            if(!newpass.value) {
                alert('请输入新密码');
                return;
            }
            if(newpass.value !== connewpass.value) {
                alert('两次输入密码不一致。');
                return;
            }
            var form = new FormData(document.getElementById('form'));
            $.ajax({
                url:'/admin/uppass',
                type:'POST',
                data:form,
                processData: false,
                contentType:false,
                success:function (data) {
                    if(JSON.parse(data) == "succ"){
                        alert('修改成功');
                        parent.location.reload();
                    }
                    if(JSON.parse(data) == "fail") {
                        alert('修改失败');
                    }
                    if(JSON.parse(data) == "oldpass error") {
                        alert('旧密码错误');
                    }

                },
                error:function (err) {
                    alert(err);
                }
            })
        }
    }

    function Clicks(val) {
        if(val == 1) {
            window.parent.document.getElementById('crowdfunding_iframe').src='content?id=1';
        }
        if(val == 2) {
            window.parent.document.getElementById('crowdfunding_iframe').src='content?id=3';
        }
    }
</script>
</html>