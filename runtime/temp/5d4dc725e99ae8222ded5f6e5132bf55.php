<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"F:\my-file\Blog\food\public/../application/index\view\index\index.html";i:1591928839;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>首页-吃什么呢</title>
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
                    <li class="active"><a href="/">首页 </a></li>
                    <li><a href="/menu">菜谱列表 </a></li>
                    <li><a href="/add">新增菜谱 </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9">
            <div class="alert alert-success draw-show" role="alert" style="display: none;">
                <h2 class="text-center choice-content"></h2>
            </div>
            <div class="alert alert-info food_type">
                菜谱类型：
                <?php if(is_array($food_type) || $food_type instanceof \think\Collection || $food_type instanceof \think\Paginator): $i = 0; $__LIST__ = $food_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?>
                <label class="checkbox-inline">
                    <input type="checkbox" name="type_arr" value="<?php echo $key; ?>" checked> <?php echo $type; ?>
                </label>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="input-group">
                <input type="text" name="num" class="form-control" placeholder="请输入菜谱数量，默认为3" value="">
                <span class="input-group-btn">
                    <button class="btn btn-info start-draw" type="button">&nbsp;&nbsp;开始抽签&nbsp;&nbsp;</button>
                    <button class="btn btn-info stop-draw disabled" type="button">&nbsp;&nbsp;停止&nbsp;&nbsp;</button>
                    <button class="btn btn-info reset-draw disabled" type="button">&nbsp;&nbsp;重置&nbsp;&nbsp;</button>
                </span>
            </div>
            <br>
            <div class="panel panel-success draw-result" style="display: none;">
                <div class="panel-heading"><b>抽签结果</b></div>
                <div class="panel-body">
                    <ul class="list-group result-list">
                        <!--<li class="list-group-item">
                            <button type="button" class="badge btn btn-warning btn-xs">换一个</button>
                            <b>第1道菜</b>：<span class="food_name">葫芦娃舅爷爷</span>
                        </li>-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3 hidden-print hidden-xs hidden-sm">
            <h4>推荐菜谱</h4>
            <?php if(is_array($rec_list) || $rec_list instanceof \think\Collection || $rec_list instanceof \think\Paginator): $i = 0; $__LIST__ = $rec_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rec): $mod = ($i % 2 );++$i;?>
            <div>
                <div class="thumbnail">
                    <img src="<?php echo $rec['food_img']; ?>" alt="">
                    <div class="caption">
                        <h3 class="text-center"><?php echo $rec['food_name']; ?></h3>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/layer/3.1.1/layer.min.js"></script>
<script>
    // 全部菜谱数组
    var food_all = [];
    var food_len = 0;
    var current_key = 0;
    var current_val = '';
    var current_times;
    var type_arr = [];
    var num = 3;
    // 开始抽签
    $('.start-draw').off('click').on('click', function () {
        // 菜谱类型
        type_arr = [];
        $("input[name='type_arr']:checked").each(function (i) {
            type_arr[i] = $(this).val();
        });
        if (type_arr.length == 0) {
            layer.msg('请至少选择一个菜谱类型');
            return false;
        }
        // 菜谱数量
        num = $('input[name=num]').val().trim();
        if (num == '') {
            num = 3;
        }
        if (num > 10) {
            layer.msg('最多可以抽10个菜谱，请不要吃太多哦');
            return false;
        }
        // 获取全部菜谱
        $.ajax({
            url: "/start",
            type: "POST",
            dataType: "json",
            data: {'type_arr': type_arr, 'num': num},
            success: function (res) {
                if (res.code == 1) {
                    food_all = res.data;
                    food_len = food_all.length;
                    $('.stop-draw').removeClass('disabled');
                    $('.start-draw').addClass('disabled');
                    $('.reset-draw').addClass('disabled');
                    $('.draw-show').show();
                    $('.draw-result').hide();
                    startDraw();
                } else {
                    layer.msg(res.msg, {icon: 2});
                }
            }
        });
    });
    // 开始抽签处理
    function startDraw() {
        current_key = parseInt(Math.random() * food_len);
        current_val = food_all[current_key];
        $('.draw-show').find('.choice-content').html(current_val);
        current_times = setTimeout('startDraw()', 10);
    }
    // 停止抽签
    $('.stop-draw').off('click').on('click', function () {
        // 获取随机菜谱
        $.ajax({
            url: "/stop",
            type: "POST",
            dataType: "json",
            data: {'type_arr': type_arr, 'num': num},
            success: function (res) {
                if (res.code == 1) {
                    $('.stop-draw').addClass('disabled');
                    $('.start-draw').removeClass('disabled');
                    $('.reset-draw').removeClass('disabled');
                    clearTimeout(current_times);
                    var res_html = '';
                    $.each(res.data, function (k, val) {
                        res_html += '<li class="list-group-item">' +
                                '<button type="button" class="badge btn btn-warning btn-xs reset-this" data-type="' + val.food_type + '">换一个</button>' +
                                '<b>第' + (k + 1) + '道菜</b>：<span class="food_name">' + val.food_name + '</span>' +
                                '</li>';
                    });
                    $('.result-list').html(res_html);
                    $('.draw-show').hide();
                    $('.draw-result').show();
                    changeThis();
                } else {
                    layer.msg(res.msg, {icon: 2});
                }
            }
        });
    });
    // 重置
    $('.reset-draw').off('click').on('click', function () {
        window.location.reload();
    });
    // 换一个
    function changeThis() {
        $('.reset-this').off('click').on('click', function () {
            var obj = this;
            $.ajax({
                url: "/change",
                type: "POST",
                dataType: "json",
                data: {'type_arr': type_arr, 'num': 1},
                success: function (res) {
                    if (res.code == 1) {
                        $(obj).parent('li').find('.food_name').html(res.data.food_name);
                        layer.msg(res.msg);
                    } else {
                        layer.msg(res.msg, {icon: 2});
                    }
                }
            });
        });
    }
</script>
</html>