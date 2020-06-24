<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<link rel="stylesheet" href="/css/uploadify.css">
<script src="/js/jquery.js"></script>
<script src="/js/jquery.uploadify.js"></script>
<style>
	.show img {
		width:  200px;
		height: 200px;
	}
	.show video {
		width:  240px;
		height: 150px;
	}
</style>
<body>
		<input type="file" name="file_upload" id = "file_upload">
		<div class="show">
		
		</div>
</body>
</html>

<script>
	$(document).ready(function(){
		$("#file_upload").uploadify({
			'swf' : "/js/uploadify/uploadify.swf",
			'uploader' : "/uploadadd",
			'buttonText' : "上传",
			onUploadSuccess:function(msg,newFilePath,info){
				//var img_str="<img src = '"+newFilePath+"'>";
				var video_str='<video src="'+newFilePath+'" controls="controls"></video>';
				$(".show").append(video_str);
			}
		});
	});
</script>