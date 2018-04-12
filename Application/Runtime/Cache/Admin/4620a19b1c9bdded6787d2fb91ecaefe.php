<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>上传文件</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/admin/fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />	
</head>
<body>
	<p><?php echo $goods_id;?></p>
	<form  action="/Admin/GoodsPic/doAdd" method="post" enctype="multipart/form-data">
		<input type="file" name="image">
		<input type="hidden" name="goods_id" value="<?php echo $goods_id;?>">
		<input type="submit" value="提交" name="">
	</form>
	<div class="form-group">
			<label class="col-sm-2 control-label">上传图片：</label>
			<div id="formimageshow" class="formControls col-xs-2 col-sm-2" >
				<button  id="buttonShow" type="button" class="btn btn-success"  onclick="upliadfileshow();return false;" >上传轮播图片</button><br />
				<br />
		
				
				
			
				<label for="checkbox-1">最多支持4张轮播图</label>

			</div>
				
			

		</div>
<!-- 图片上传 -->
	<script type="text/javascript" src="/Public/common/jquery/1.9.1/jquery.min.js"></script> 
    <script src="/Public/admin/fileinput/js/fileinput.js" type="text/javascript"></script>
    <script src="/Public/admin/fileinput/js/fileinput_locale_zh.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
<!-- 图片上传 -->
<!-- 图片上传 -->
<div id="modal-webuploader" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="false" style="display: none;">


	<div class="modal-dialog" style="width:660px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button"  id="close" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<ul class="nav nav-pills" role="tablist">
						<li id="li_upload" class="active" role="presentation"><a href="#upload" aria-controls="upload" role="tab" data-toggle="tab" onclick="$('#select').hide();" >上传图片</a></li>
						<!-- <li id="li_network" class="" role="presentation"><a href="#network" aria-controls="network" role="tab" data-toggle="tab" onclick="$('#select').hide();">提取网络图片</a></li> -->
					
					</ul>
				
		<div class="modal-body tab-content">
		<div role="tabpanel" class="tab-pane network" id="network">

		


	</div>

	<div role="tabpanel" class="tab-pane upload active" id="upload">
		<div id="uploader" class="uploader">
			 <form enctype="multipart/form-data">
	                <input id="file-0" class="file" type="file" multiple data-min-file-count="1">
	                <br>
	               
	            </form>
		</div>

	</div>

</div>
	

<!-- 图片上传 -->
<script type="text/javascript">
// 图片上传
function upliadfileshow(){
	$("#modal-webuploader").fadeIn();
	$("#modal-webuploader").fadeIn('slow');
	
}

$("#close").click(function(){
	$("#modal-webuploader").fadeIn();
	$("#modal-webuploader").fadeOut('slow');
})


function deleteImage(id){
	$.ajax({
	   url:'<?php echo U("Goods/product_del_images");?>',
	   type:'get',
	   data:{id:id},
	   dataType:'json',
	   success:function(data){
	    	if(data==1){
	    		$('#imageDelete'+id).remove();
	    		var imagepath=$('input[class=imagepath]');
	      		if(imagepath.length<4){

	      			$('#buttonShow').removeAttr("disabled");
	      		}else{

	      		}
	    	}else{
	    	   alert('删除失败');
	    	}
	    }
	 
	})
		
}

//图片上传
initFileInput("file-0", "<?php echo U('/Admin/GoodsPic/doAdd');?>");


//初始化fileinput控件（第一次初始化）
function initFileInput(ctrlName, uploadUrl) {    
    var control = $('#' + ctrlName); 
    control.fileinput({
        language: 'zh', //设置语言
        uploadUrl: uploadUrl, //上传的地址
        allowedFileExtensions : ['jpg', 'png','gif','jpeg'],//接收的文件后缀
        showUpload: true, //是否显示上传按钮
        showCaption: true,//是否显示标题
        showPreview:true,//是否显示文件的预览图。默认值true。
        showRemove:true,//是否显示删除/清空按钮。默认值true。
        browseClass: "btn btn-primary", //按钮样式             
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>", 
        maxFileCount: 4,//表示允许同时上传的最大文件个数
        dropZoneEnabled:true,//是否显示拖拽区域
     
        initialPreviewConfig: 	{
	        caption: ctrlName, 
	        width: '120px', 
	        url: uploadUrl, 
	        key: 101, 
	        success: function() { 

	         
	        }
	    }
	
       
    });



}
  $("#file-0").on("fileuploaded", function (event, data, previewId, index) {
  		


		var div=$('<div class="input-group " id="imageDelete'+data.response['id']+'" style="margin-top:.5em;margin-right:2em; float:left;"><input type="hidden" name="imagepath[]" class="imagepath" value="'+data.response['id']+'"/><img src="'+data.response['imagepath']+'"; class="img-responsive img-thumbnail" width="150"><a class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="deleteImage('+data.response['id']+')">×</a></div>');
		$('#formimageshow').after(div);
      	var imagepath=$('input[class=imagepath]');
      		if(imagepath.length>=4){

      			$('#buttonShow').attr("disabled","disabled");//禁用上传按钮
      			$("#modal-webuploader").fadeIn();//关闭上传
				$("#modal-webuploader").fadeOut('slow');
      		}else{

      		}
   	
   			 

 });
</script>
</body>
</html>