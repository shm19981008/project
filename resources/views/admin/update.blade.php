<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>头部-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                        href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
        </div>
    </div>
    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTop">
                <span>导航栏</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    导航栏名称：<input type="text" class="name" value="{{$data->name}}" />
                    <input type="hidden" value="{{$data->id}}" class="hid">
                </div>
                <div class="bbD">
                    链接地址：<input type="text" class="url" value="{{$data->url}}" />
                </div>
                <div class="bbD">
                    是否显示：<label><input type="radio" name="is_no" value="是" class="is_no" @if($data->is_no=='是') checked @endif />是</label> <label><input
                                type="radio" class="is_no" name="is_no" value="否" @if($data->is_no=='否') checked @endif>否</label>
                </div>
                <div class="bbD">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：<input class="input2 order"
                                                                  type="text"value="{{$data->order}}" />
                </div>
                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes btn">修改</button>
                        <a class="btn_ok btn_no" href="#">取消</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- 上传广告页面样式end -->
    </div>
</div>
</body>
</html>
<script src="js/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".btn").click(function(){
            var name=$(".name").val();
            var url=$(".url").val();
            var id=$(".hid").val();
            var is_no=$('input:radio:checked').val();
//            console.log(is_no);return;
            var order=$(".order").val();
            $.ajax({
                url:"{{url('/do_update')}}",
                data:{'name':name,'url':url,'is_no':is_no,'order':order,'id':id},
                dataType:'json',
                success:function(res){
//                    console.log(res);
                    if(res.code=='0000'){
                        alert(res.msg);
                        location.href="/bannerlist";
                    }else{
                        alert(res.msg);
                    }
                }
            })
        })
    })
</script>