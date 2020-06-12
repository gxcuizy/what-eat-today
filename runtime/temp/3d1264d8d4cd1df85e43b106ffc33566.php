<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"F:\my-file\Blog\food\public/../application/index\view\index\menu.html";i:1591927230;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>菜谱列表-吃什么呢</title>
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
                    <li class="active"><a href="/menu">菜谱列表 </a></li>
                    <li><a href="/add">新增菜谱 </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="alert alert-info food_type">
            <form class="form-inline">
                <b>菜谱类型：</b>
                <?php if(is_array($food_type) || $food_type instanceof \think\Collection || $food_type instanceof \think\Paginator): $i = 0; $__LIST__ = $food_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?>
                <label class="checkbox-inline">
                    <input type="checkbox" name="type_arr[]" value="<?php echo $key; ?>" <?php if(in_array($key, $search['type_arr'])): ?>checked<?php endif; ?>> <?php echo $type; ?>
                </label>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="form-group" style="margin-left: 20px;">
                    <label for="food_name">菜谱名称：</label>
                    <input name="food_name" type="text" class="form-control" id="food_name" value="<?php echo $search['food_name']; ?>" placeholder="请输入菜谱名称">
                </div>
                <button type="submit" class="btn btn-info">搜索</button>
            </form>
        </div>
        <?php if(is_array($food_list) || $food_list instanceof \think\Collection || $food_list instanceof \think\Paginator): $i = 0; $__LIST__ = $food_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$food): $mod = ($i % 2 );++$i;?>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="thumbnail">
                <img src="<?php echo $food['food_img']; ?>" alt="">
                <div class="caption">
                    <h4 class="text-center"><?php echo $food['food_name']; ?></h4>
                </div>
            </div>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <nav aria-label="Page navigation"  style="text-align: center;">
        <?php echo $food_list->render(); ?>
    </nav>
</div>
</body>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script>
</script>
</html>