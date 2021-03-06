<?php /*a:2:{s:69:"C:\Users\48186\Desktop\hsjc\application\admin\view\huiyuan\index.html";i:1612098413;s:68:"C:\Users\48186\Desktop\hsjc\application\admin\view\layout\index.html";i:1612108842;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    
<title>用户列表</title>

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

<div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="<?php echo url('Index/index'); ?>">首页</a>
        <a href="<?php echo url('Huiyuan/index'); ?>">被检测人员管理</a>
        <a>
          <cite>被检测人员列表</cite></a>
      </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"
       href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>

<div class="x-body">
    <div class="layui-row">
        
<form class="layui-form layui-col-md12 x-so" action="<?php echo url('Huiyuan/index'); ?>" method="get">

<!--    <select name="user_status">-->
<!--        <option value="">全部</option>-->
<!--        <option value="0">个检</option>-->
<!--        <option value="1">混检</option>-->
<!--    </select>-->
<!--    <input class="layui-input" placeholder="开始日" name="start" id="start">-->
<!--    <input class="layui-input" placeholder="截止日" name="end" id="end">-->
<!--    <input type="text" name="user_name" placeholder="请输入用户名称" autocomplete="off" class="layui-input">-->
    <input type="text" name="mobile" placeholder="请输入手机号" autocomplete="off" class="layui-input">
    <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
    <!--    <button class="layui-btn" lay-submit="" onclick="exportTable()">导出excel</button>-->
</form>

    </div>
    <xblock>
        
<button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>

        <span class="x-right" style="line-height:40px">共有数据：<?php echo htmlentities($total); ?> 条</span>
    </xblock>
    
<table class="layui-table" id="LAY-EXPORT-TEST">
    <thead>
    <tr class="ttt">
        <th>
            <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i>
            </div>
        </th>
        <th>ID</th>
        <th>姓名</th>
        <th>手机号</th>
        <th>身份证号码</th>
        <th>条形码</th>
        <th>检测模式</th>
        <th>创建时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <tr class="line">
        <td>
            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo htmlentities($vo['uid']); ?>'><i
                    class="layui-icon">&#xe605;</i>
            </div>
        </td>
        <td><?php echo htmlentities($vo['uid']); ?></td>
        <td><?php echo htmlentities($vo['name']); ?></td>
        <td><?php echo htmlentities($vo['mobile']); ?></td>
        <td><?php echo htmlentities($vo['idcard']); ?></td>
        <td><?php echo htmlentities($vo['qrcode']); ?></td>
        <td>
            <?php if($vo['model']): ?>
            混检
            <?php else: ?>
            个检
            <?php endif; ?>
        </td>

        <td><?php echo htmlentities($vo['create_time']); ?></td>
        <td class="td-manage">
            <a title="修改" onclick="x_admin_show('修改','/admin/huiyuan/edit/?id=<?php echo htmlentities($vo['uid']); ?>',600,400)">
                <i class="layui-icon">&#xe642;</i>
            </a>

            <a class="del" title="删除" link="<?php echo url('delete',['id'=>$vo['uid']]); ?>">
                <i class="layui-icon">&#xe640;</i>
            </a>
        </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>

    <div class="page">
        <?php echo $list; ?>
    </div>

</div>
<script type="text/javascript">
    $('.del').click(function () {
        var url = $(this).attr('link');
        layer.confirm('你确定要删除吗?', {
            icon: 1,
            btn: ['确定', '取消'] //按钮
        }, function () {
            $.get(url, function (data) {
                if (data.code == 1) {
                    layer.alert('删除成功', {icon: 6}, function (index) {
                        layer.close(index);
                        $(this).parents('tr').remove();
                        window.location.href = "<?php echo url('index'); ?>";
                    });
                } else {
                    layer.alert('删除失败');
                    window.location.reload();
                }
            });
        });
    });


    //用户停用
    $('.editstatus').click(function () {
        var url = $(this).attr('link');
        var sid = $(this).attr('sid');
        layer.confirm('你确定要进行此操作吗?', {
            icon: 1,
            btn: ['确定', '取消'] //按钮
        }, function () {
            $.ajax({
                type: 'post',
                url: url,
                dataType: "json",
                data: {
                    id: sid
                },
                success: function (data) {
                    if (data.status == 1) {
                        console.log(data);
                        $('.editstatus').attr('title', '停用')
                        $('.editstatus').find('i').html('&#xe62f;');
                        $('.editstatus').parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                        layer.msg('已停用!', {icon: 5, time: 1000});
                        location.reload();
                    } else {
                        $('.editstatus').attr('title', '启用')
                        $('.editstatus').find('i').html('&#xe601;');
                        $('.editstatus').parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                        layer.msg('已启用!', {icon: 5, time: 1000});
                        location.reload();
                    }
                }
            });
        });
    });

</script>
<script type="text/javascript">
    layui.use(['laydate', 'excel'], function () {
        var laydate = layui.laydate;
        var excel = layui.excel;
        //执行一个laydate实例
        laydate.render({
            elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
            elem: '#end' //指定元素
        });

    });

    //导出excel
    function exportTable() {
        // 获取头部和body
        var data = LAY_EXCEL.tableToJson(document.getElementById('LAY-EXPORT-TEST')) // 或者 $('#LAY-EXPORT-TEST')
        if (empty(data)) {
            return;
        }
        // console.log(data)
        var exportData = []
        exportData.push.apply(exportData, data.head)
        exportData.push.apply(exportData, data.body)
        // console.log(exportData)

        LAY_EXCEL.exportExcel(exportData, '表格导出.xlsx', 'xlsx')
    }

    //批量删除
    function delAll(argument) {

        var data = tableCheck.getData();
        console.log(data);

        layer.confirm('确认要删除吗？' + data, function (index) {
            //捉到所有被选中的，发异步进行删除
            $.ajax({
                type: "POST",
                url: "<?php echo url('delall'); ?>",
                data: {
                    ids: data
                },
                success: function (data) {
                    if (data.code == 1) {
                        layer.alert('删除成功', {icon: 1}, function () {
                            $(".layui-form-checked").not('.header').parents('tr').remove();
                            location.href = "<?php echo url('index'); ?>";
                        });

                    } else {
                        layer.alert('删除失败', {icon: 6}, function () {
                            location.reload();
                        });

                    }
                }
            })

        });
    }

    //批量保存
    function save(argument) {

        var data = tableCheck.getData();
        var result= $("#selects").val();
        console.log(data);
        console.log(result);

        layer.confirm('确认要提交吗？' + data, function (index) {
            //捉到所有被选中的，发异步进行删除
            $.ajax({
                type: "POST",
                url: "<?php echo url('save'); ?>",
                data: {
                    ids: data,
                    result:result
                },
                success: function (data) {
                    if (data.code === 1) {
                        layer.alert('提交成功', {icon: 1}, function () {
                            $(".layui-form-checked").not('.header').parents('tr').remove();
                            location.href = "<?php echo url('index'); ?>";
                        });

                    } else {
                        layer.alert('提交失败', {icon: 6}, function () {
                            location.reload();
                        });

                    }
                }
            })

        });
    }

</script>

</body>

</html>