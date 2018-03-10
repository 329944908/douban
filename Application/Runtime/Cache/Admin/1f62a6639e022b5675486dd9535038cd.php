<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="favicon.ico">
<link href="/Public/admin/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/admin/assets/css/font-awesome.min.css" rel="stylesheet">
<!-- Data Tables -->
<link href="/Public/admin/assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="/Public/admin/assets/css/animate.min.css" rel="stylesheet">
<link href="/Public/admin/assets/css/style.min.css" rel="stylesheet"><base target="_blank">
    <!-- 自定义样式可以直接写在这 -->
</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>广告管理</h5>
                </div>
                <!--  -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="ibox">
                            <div class="ibox-content">
                                <form role="form" class="form-inline" action="<?php echo U('admin/goods/lists');?>" method="get" target="_self">
                                    <div class="form-group">
                                        <label for="exampleInputEmail2" class="">商品名称:</label>
                                        <input type="text" placeholder="请输入商品名" id="exampleInputEmail2" class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword2" class="">:所属分类</label>
                                        <select class="form-control" name="classify_id">
                                             <option value="all">全部商品</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-white" type="submit">搜索</button>
                                    <a href="<?php echo U('admin/ad/edit');?>" class="btn btn-primary" type="submit" target="_self">新增</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="ibox-content">

                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>title</th>
                            <th>image</th>
                            <th>position</th>
                            <th>url</th>
                            <th>type</th>
                            <th>status</th>
                            <th>edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="gradeX">
                                <td><?php echo ($vo["id"]); ?></td>
                                <td><?php echo ($vo["title"]); ?></td>
                                <th><img src="/Public/<?php echo ($vo["image"]); ?>" height="100px" width="200px"></th>
                                <td><?php echo ($vo["position"]); ?></td>
                                <td><?php echo ($vo["url"]); ?></td>
                                <td><?php echo ($vo["type"]); ?></td>
                                <td><?php if($vo['status']){ ?>
                                    <a href="<?php echo U('admin/ad/outline',array('id'=>$vo['id']));?>" target="_self">下线</a>
                                <?php } else { ?>
                                    <a href="<?php echo U('admin/ad/online',array('id'=>$vo['id']));?>" target="_self">上线</a>
                                <?php } ?>
                                </td>
                                 <td><a href="<?php echo U('admin/ad/edit',array('id'=>$vo['id']));?>">edit</a></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                         <!-- <tfoot> -->
                            <tr>
                                <td colspan="8">
                                    <?php echo ($page); ?>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/Public/admin/assets/js/jquery.min.js"></script>
<script src="/Public/admin/assets/js/bootstrap.min.js"></script>
<script src="/Public/admin/assets/js/plugins/jeditable/jquery.jeditable.js"></script>
<script src="/Public/admin/assets/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="/Public/admin/assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="/Public/admin/assets/js/content.min.js"></script>
</body>
</html>