<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>人员表单</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <script src="/static/js/jquery/2.1.1/jquery.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
</head>
<body>
<center><h1>管理人员名单</h1></center>
<hr/>
<form class="form-horizontal" role="form" action="{{url('admin/update/'.$user->admin_id)}}" method="post" enctype=multipart/form-data>
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">管理员名称</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="firstname"
                   placeholder="请输入姓名" name="admin_name" value="{{$user->admin_name}}">
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">管理员密码</label>
        <div class="col-sm-8">
            <input type="password" class="form-control" id="firstname"
                   placeholder="请输入密码" name="admin_pwd"  value="{{$user->admin_pwd}}">
        </div>
    </div>
    </div>
  
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">管理员头像</label>
        <div class="col-sm-8">
            <input type="file" class="form-control" id="firstname" name="admin_img"  value="{{$user->admin_img}}">
        </div>
    </div>

    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">管理员电话</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="firstname"
                   placeholder="请输入电话" name="admin_tel"  value="{{$user->admin_tel}}">
        </div>
    </div>
  
    </div>
    
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">管理员邮箱</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="firstname"
                   placeholder="请输入邮箱" name="admin_email"  value="{{$user->admin_email}}">
        </div>
    </div>
  
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">修改</button>
        </div>
    </div>
</form>

</body>
<html>