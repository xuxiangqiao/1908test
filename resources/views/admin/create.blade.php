<html>
<head>
    <meta charset="utf-8">
    <title>人员表单</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<center><h1>管理人员名单</h1></center>
<hr/>
<form class="form-horizontal" role="form" action="{{url('admin/store')}}" method="post" enctype=multipart/form-data>
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">管理员名称</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="firstname"
                   placeholder="请输入姓名" name="admin_name">
                   <b style="color:red">{{$errors->first('admin_name')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">管理员密码</label>
        <div class="col-sm-8">
            <input type="password" class="form-control" id="firstname"
                   placeholder="请输入密码" name="admin_pwd">
        </div>
    </div>
    </div>
  
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">管理员头像</label>
        <div class="col-sm-8">
            <input type="file" class="form-control" id="firstname" name="admin_img">
        </div>
    </div>

    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">管理员电话</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="firstname"
                   placeholder="请输入电话" name="admin_tel">
        </div>
    </div>
  
    </div>
    
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">管理员邮箱</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="firstname"
                   placeholder="请输入邮箱" name="admin_email">
        </div>
    </div>
  
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" class="btn btn-default">添加</button>
        </div>
    </div>
</form>
<script>
 $.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
//添加按钮的验证
$('button[type="button"]').click(function(){

    var titleflag=true;
    $('input[name="admin_name"]').next().html('');
    var admin_name= $('input[name="admin_name"]').val();
        var reg = /^[\u4e00-\u9fa50-9A-Za-z_]+$/
        if(!reg.test(admin_name)){
           
            $('input[name="admin_name"]').next().html('姓名格式不正确')
            return;
        } 

      //唯一性验证
      $.ajax({
        type:'post',
        url:"/admin/checkOnly",
        data:{admin_name:admin_name},
        dataType:'json',
        success:function (result) {
        if(result.count > 0){  
        $('input[name="admin_name"]').next().html('名字已存在');
        titleflag=false;
            } 
        }});
        if(!titleflag){
            return;
        }
        //电话验证
        var admin_tel=$('input[name="admin_tel"]').val();
        var reg = /^[\u4e00-\u9fa50-9A-Za-z_]{2,8}$/;
        if(!reg.test(admin_tel)){
            $('input[name="admin_tel"]').next().html('电话格式不正确')
            return;
}
        //form提交
        $('form').submit();
});





//验证标题

    $('input[name="admin_name"]').blur(function(){
        $(this).next().html('');
        var admin_name=$(this).val();
        var reg = /^[\u4e00-\u9fa50-9A-Za-z_]+$/
        if(!reg.test(admin_name)){
           
            $(this).next().html('姓名格式不正确')
            return;
        } 
          //唯一性验证
    $.ajax({
        type:'post',
        url:"/admin/checkOnly",
        data:{admin_name:admin_name},
        dataType:'json',
        success:function (result) {
        if(result.count > 0){  
        $('input[name="admin_name"]').next().html('名字已存在');
            }
            }
       })
    })
//作者验证
    $('input[name="admin_tel"]').blur(function(){
        $(this).next().html('');
        var admin_tel=$(this).val();
        var reg = /^[\u4e00-\u9fa50-9A-Za-z_]+$/
        if(!reg.test(admin_tel)){
            $(this).next().html('电话格式不正确')
            return;
        } 
  

    })
</script>
</body>
</html>
