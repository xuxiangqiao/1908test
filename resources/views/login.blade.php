<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bootstrap 登入</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
</head>

<body>
<center><h1>登入界面</h1></center>
<hr/>
<center><b style="color:red">{{session('msg')}}</b></center>
<form class="form-horizontal" role="form" action="{{url('/logindo')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">用户名</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="firstname"
                   placeholder="请输入用户名" name="admin">
                   <b style="color:red">{{$errors->first('username')}}</b>
        </div>
    </div>

    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="firstname"
                   placeholder="请输入密码" name="password">
                   <b style="color:red">{{$errors->first('w_name')}}</b>

        </div>
    </div>
  
  

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">添加</button>
        </div>
    </div>
</form>

</body>
<html>