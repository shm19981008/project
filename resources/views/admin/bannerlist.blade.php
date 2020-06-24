<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>广告-有点</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
			</div>
		</div>
		<div class="page">
			<!-- banner页面样式 -->
			<div class="banner">
				<div class="add">
					<a class="addA" href="/banneradd">添加导航栏信息&nbsp;&nbsp;+</a>
				</div>
				<!-- banner 表格 显示 -->
				<div class="banShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">序号</td>
							<td width="315px" class="tdColor">导航栏名称</td>
							<td width="308px" class="tdColor">地址</td>
							<td width="450px" class="tdColor">是否显示</td>
							<td width="180px" class="tdColor">排序</td>
							<td width="125px" class="tdColor">操作</td>
						</tr>
						@foreach($data as $k=>$v)
						<tr>
							<td>{{$v->id}}</td>
							<td>{{$v->name}}</td>
							<td>{{$v->url}}</td>
							<td ><span class="is_no" >{{$v->is_no}}</span><input type="text" class="hid" data-id="{{$v->id}}"></td>
							<td class="order">{{$v->order}}</td>
							<td><a href="{{url('/update',$v->id)}}"><img class="operation update"
									src="img/update.png"></a> <img class="operation delban del"
								src="img/delete.png" data-id="{{$v->id}}"></td>
						</tr>
						@endforeach
					</table>
					<div class="paging">{{$data->links()}}</div>
				</div>
				<!-- banner 表格 显示 end-->
			</div>
			<!-- banner页面样式end -->
		</div>

	</div>


	{{--<!-- 删除弹出框 -->--}}
	{{--<div class="banDel">--}}
		{{--<div class="delete">--}}
			{{--<div class="close">--}}
				{{--<a><img src="img/shanchu.png" /></a>--}}
			{{--</div>--}}
			{{--<p class="delP1">你确定要删除此条记录吗？</p>--}}
			{{--<p class="delP2">--}}
				{{--<a href="#" class="ok yes" onclick="del()">确定</a><a class="ok no">取消</a>--}}
			{{--</p>--}}
		{{--</div>--}}
	{{--</div>--}}
	{{--<!-- 删除弹出框  end-->--}}
</body>

<script type="text/javascript">
// 广告弹出框
$(".delban").click(function(){
  $(".banDel").show();
});
$(".close").click(function(){
  $(".banDel").hide();
});
$(".no").click(function(){
  $(".banDel").hide();
});
// 广告弹出框 end

function del(){
    var input=document.getElementsByName("check[]");
    for(var i=input.length-1; i>=0;i--){
       if(input[i].checked==true){
           //获取td节点
           var td=input[i].parentNode;
          //获取tr节点
          var tr=td.parentNode;
          //获取table
          var table=tr.parentNode;
          //移除子节点
          table.removeChild(tr);
        }
    }     
}
</script>
</html>
<script>
	$(document).ready(function(){
		$(".delban").click(function(){
			var id= $(this).data('id');
			$.ajax({
				url:"{{url('/del')}}",
				data:{'id':id},
				dataType:'json',
				success:function(res){
					if(res.code=='0000'){
						alert(res.msg);
						location.href="/bannerlist";
					}else{
						alert(res.msg);
					}
				}
			})
		})
		$(".hid").hide();
		$(".is_no").click(function(){
			var is_no=$(this).html();
			$(".is_no").hide();
			$(".hid").show().val(is_no);

			$(".hid").blur(function(){
				var val=$(this).val();
				var field="is_no";
				var id=$(this).data('id');
//				console.log(val);return;
				$.ajax({
				     url:"{{url('/upd')}}",
					 data:{'id':id,'field':field,'val':val},
					dataType:'json',
//					type:'post',
					success:function(res){
						var new_val=$(this).val();
						console.log(res);
					}
				})
			})
			})

	})
</script>