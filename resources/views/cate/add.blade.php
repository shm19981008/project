<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>头部-有点</title>
    <link rel="stylesheet" type="text/css" href="/css/css.css" />
    <script type="text/javascript" src="/js/jquery.min.js"></script>
</head>
<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                        href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
        </div>
    </div>
    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTop">
                <span>分类</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    分类名称：<input type="text" class="name" />
                </div>
                <div class="bbD">
                    是否显示：<label><input type="radio" name="is_show" checked="checked" class="is_no" value="是" />是</label> <label><input
                                type="radio" class="is_no" name="is_show" value="否"/>否</label>
                </div>
                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes btn">提交</button>
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

<script>
    $(document).ready(function(){
        $(".btn").click(function(){
            var name=$(".name").val();
            var is_no=$(".is_no").val();
            $.ajax({
                url:"{{url('/cate/do_add')}}",
                data:{'name':name,'is_no':is_no},
                dataType:'json',
                success:function(res){
                    if(res.code=='0000'){
                        alert(res.msg);
                        location.href="/cate/list";
                    }else{
                        alert(res.msg);
                    }
                }
            })
        })
    })
</script>