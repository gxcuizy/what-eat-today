<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"F:\my-file\Blog\food\public/../application/index\view\index\add.html";i:1591927963;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>新增菜谱-吃什么呢</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">
                    <b>吃什么呢</b>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="/">首页 </a></li>
                    <li><a href="/menu">菜谱列表 </a></li>
                    <li class="active"><a href="/add">新增菜谱 </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="panel panel-default">
        <div class="panel-body" style="margin: 100px 0;">
            <div class="login-title text-center">
                <h3>欢迎提供新菜谱给我们</h3>
            </div>
            <form method="get" class="col-md-offset-2 col-md-8">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span style="color: red;">*</span>菜谱类型</span>
                        <select class="form-control" name="food_type">
                            <option value="0">请选择菜谱类型</option>
                            <?php if(is_array($food_type) || $food_type instanceof \think\Collection || $food_type instanceof \think\Paginator): $i = 0; $__LIST__ = $food_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $key; ?>"><?php echo $type; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span style="color: red;">*</span>菜谱名称</span>
                        <input type="text" name="food_name" class="form-control" value="" placeholder="请输入菜单名称"
                               maxlength="20">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">菜谱URL</span>
                        <input type="text" name="food_url" class="form-control" value=""
                               placeholder="其他平台推荐的制作方法的视频或者文章的链接地址">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">想说的话</span>
                        <textarea class="form-control" name="food_remark" rows="3" placeholder="请输入您想说的话"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-8">
                        <button type="button" id="sub" class="btn btn-sm btn-info col-md-12 btn-block submit-btn">提交审核
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/layer/3.1.1/layer.min.js"></script>
<script>
    $('.submit-btn').off('click').on('click', function () {
        var food_type = $('select[name=food_type]').val();
        var food_name = $('input[name=food_name]').val().trim();
        var food_url = $('input[name=food_url]').val().trim();
        var food_remark = $('textarea[name=food_remark]').val().trim();
        if (food_type == 0) {
            layer.msg('请选择菜谱类型');
            return false;
        }
        if (food_name == '') {
            layer.msg('请填写菜谱名称');
            return false;
        }
        $.ajax({
            url: "/add",
            type: "POST",
            dataType: "json",
            data: {'food_type': food_type, 'food_name': food_name, 'food_url': food_url, 'food_remark': food_remark},
            success: function (res) {
                if (res.code == 1) {
                    layer.msg(res.msg, {icon: 1, time: 2000},
                            function (index, item) {
                                window.location.reload();
                            }
                    );
                } else {
                    layer.msg(res.msg, {icon: 2});
                }
            }
        });
    });
</script>
</html>