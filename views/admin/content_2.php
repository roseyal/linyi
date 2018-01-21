<!DOCTYPE html>

<html lang="zh-CN">

<head>
    <link href="/user/css/make_head.css" rel="stylesheet">
</head>
<style>
    .upbtn{
        width: 150px;
        font-size: 16px;
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0px;
        font-weight: 400;
        line-height: 1.42857;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        -moz-user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
        color: #FFF;
        background-color: #286090;
        border-color: #204D74
    }
</style>
<body>

<!-- 开始 -->

<div class="make_head_title">修改头像</div>

<div class="make_head_content">

    <div class="make_head_content_pic" style="position: relative;">
        <img src="/user/images/upphoto.png" style="margin-top:185px; margin-left: 131px;">
        <form id="form" enctype="multipart/form-data">
        <input type="hidden" name="userid" value="<?= $data['userid']?>"/>
        <input type="file" style="opacity:0;position: absolute;top: 0;" id="upload" name="photo"/>
        </form>
    </div>

    <div class="make_head_content_sm_pic">
        <p><img src="<?= $data['photo']?>" id="userphoto" width="200px;" height="200"></p>
        <button class="upbtn" id="uploadphoto">上 传</button>
    </div>

</div>

</body>
<script type="text/javascript">

    window.onload = function () {
        var img = document.getElementById('upload');
        var userphoto = document.getElementById('userphoto');
        var uploadphoto = document.getElementById('uploadphoto');
        img.onchange = function (file) {
            var reader = new FileReader();
            reader.onload = function(evt){
               userphoto.src = evt.target.result;
            }
            reader.readAsDataURL(img.files[0]);
        }
        uploadphoto.onclick = function () {
            if(upload.value == '') {
                alert('选择要上传的图片。');
                return;
            }
            var data = new FormData(document.getElementById('form'));
            $.ajax({
                url:'/admin/uplodphoto',
                type:'POST',
                processData: false,
                contentType:false,
                data:data,
                success:function (data) {
                    if(JSON.parse(data) == "succ"){
                        alert('修改成功');
                        parent.location.reload();
                    }
                    if(JSON.parse(data) == "fail") {
                        alert('修改失败');
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