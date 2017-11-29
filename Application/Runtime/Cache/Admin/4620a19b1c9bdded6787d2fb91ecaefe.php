<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>上传文件</title>
</head>
<body>
	<p><?php echo $goods_id;?></p>
	<form  action="/Admin/GoodsPic/doAdd" method="post" enctype="multipart/form-data">
		<input type="file" name="image">
		<input type="hidden" name="goods_id" value="<?php echo $goods_id;?>">
		<input type="submit" value="提交" name="">
	</form>
</body>
</html>