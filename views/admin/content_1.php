<!DOCTYPE html>

<html lang="zh-CN">

<head>

    <link href="/user/css/my_info.css" rel="stylesheet">
</head>

<body>

<!-- 开始 -->

<div class="my_info_title">我的资料</div>

<div class="my_info_title_3">

    <ul>

        <li id="listClick_1" onClick="Clicks(1)" style="border-bottom: 1px solid #C40521; color: #C40521;">基本资料</li>

        <li id="listClick_4" onClick="Clicks(2)">修改密码</li>

    </ul>

</div>

<div class="my_info_content">

    <form id="form">
    <table class="my_info_content_care_table" style="margin-top: 30px;">

        <tbody>

        <tr>

            <td width="90" align="right" class="color555">用户名：</td>

            <td class="color5551"><?= $data['nickname']?></td>
            <td class="color55s"  style="display: none;"><input class="my_info_content_care_table_text inval" name="nickname" type="text" value="<?= $data['nickname']?>"></td>
        </tr>



        <tr>
            <td align="right" class="color555">邮箱：</td>
            <td class="color5551"><?= $data['email']?></td>
            <td class="color55s" style="display: none;"><input class="my_info_content_care_table_text inval" name="email" type="text"
            value="<?= $data['email']?>" ></td>
        </tr>

        <tr>
            <td align="right" class="color555">注册时间：</td>
            <td class="color555"><?= date('Y-m-d H:i:s',$data['regdate'])?></td>
        </tr>
        <tr>
            <td align="right" class="color555">最后登陆：</td>
            <td class="color555"><?= date('Y-m-d H:i:s',$data['lastdate'])?></td>
        </tr>
        <tr>
            <td align="right" class="color555">注册ip：</td>
            <td class="color555"><?= $data['regip']?></td>
        </tr>
        <tr>
            <td align="right" class="color555">上次登陆ip：</td>
            <td class="color555"><?= $data['lastip']?></td>
        </tr>
        <tr>

            <td align="right" class="color555">手机号码：</td>

            <td class="color555" style="color:orange;font-weight: bold;"><?= $data['mobile']?></td>

        </tr>
        <tr>
            <td align="right" class="color555">生日：</td>
            <td class="color5551"><?= $data['birthday']?></td>
            <td class="color55s" style="display: none;"><input class="my_info_content_care_table_text inval" name="birthday" type="text" value="<?= $data['birthday']?>" ></td>
        </tr>


        <tr>

            <td align="center" class="color555;"   colspan="2">
                <button  class="my_info_content_care_table_submit" style="margin-top: 30px;" type="button"   id="sub" >保存</button>
                <button  class="my_info_content_care_table_submit" style="margin-top: 30px;margin-left: 10px; background: #00b3ee;border: none;" type="button" id="up" >修改</button>
            </td>

        </tr>

        </tbody>

    </table>
    </form>
</div>

<script type="text/javascript">
    window.onload = function () {
        var up = document.getElementById('up');
        var sub = document.getElementById('sub');
        var color5551 = document.getElementsByClassName('color5551');
        var color55s = document.getElementsByClassName('color55s');
        var inval = document.getElementsByClassName('inval');
        up.onclick = function () {
            if(this.innerHTML == '修改'){
                for(var i=0 ; i< color5551.length; i++) {
                    color5551[i].style.display = 'none';
                    color55s[i].style.display = 'block';
                }
                this.innerHTML = '取消修改';
            }else{
                for(var i=0 ; i< color5551.length; i++) {
                    color5551[i].style.display = 'block';
                    color55s[i].style.display = 'none';
                }
                this.innerHTML = '修改';
            }
        }

        var ajax = new XMLHttpRequest();
        sub.onclick = function () {
            var url = '/admin/do-userinfo?nickname=' + inval[0].value + '&email=' + inval[1].value + '&birthday=' + inval[2].value;
            ajax.open('GET',url,true);
            ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            ajax.send();
            ajax.onreadystatechange = function (ev) {
                var data = ajax.responseText;
                if(ajax.readyState == 4 && ajax.status == 200) {
                    if(JSON.parse(data) == "succ"){
                        alert('修改成功');
                        parent.location.reload();
                    }
                    if(JSON.parse(data) == "fail") {
                        alert('修改失败');
                    }
                }
            }
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

<!-- 结束 -->

</body>

</html>