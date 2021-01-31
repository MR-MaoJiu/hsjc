<?php /*a:1:{s:67:"C:\Users\48186\Desktop\hsjc\application\index\view\query\index.html";i:1612111224;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>核酸检测结果</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi"/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="/admin1/css/font.css">
    <link rel="stylesheet" href="/admin1/css/xadmin.css">
    <script type="text/javascript" src="/admin1/js/jquery.min.js"></script>
    <script type="text/javascript" src="/admin1/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/admin1/js/xadmin.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        tr td {
            text-align: center;
        }

        .ttt th {
            text-align: center;
        }
    </style>
</head>

<body>
<div class="x-body">
    <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" action="<?php echo url('Query/index'); ?>" method="get">
            <input type="text" name="mobile" placeholder="请输入手机号" autocomplete="off" class="layui-input">
            <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
    </div>
    <table class="layui-table" id="LAY-EXPORT-TEST">
        <thead>
        <tr class="ttt">

            <th>姓名</th>
            <th>手机号</th>
            <th>身份证号码</th>
            <th>条形码</th>
            <th>检测结果</th>
            <th>检测时间</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

            <td><?php echo htmlentities($vo['name']); ?></td>
            <td><?php echo htmlentities($vo['mobile']); ?></td>
            <td><?php echo htmlentities($vo['idcard']); ?></td>
            <td><?php echo htmlentities($vo['qrcode']); ?></td>
            <td>
                <?php switch($vo['result']): case "0": ?>
                暂无结果
                <?php break; case "1": ?>
                阴性
                <?php break; case "2": ?>
                阳性
                <?php break; ?>
                <?php endswitch; ?>
            </td>

            <td><?php echo htmlentities($vo['create_time']); ?></td>

        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
