<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>Bootstrap 实例 - 悬停表格</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<form>
    <input type="text" name="admin_name" value="{{$admin_name}}" placeholder="请输入用户名">
    <input type="submit" value="搜索">
</form>
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>管理员名字</th>
			<th>管理员密码</th>
            <th>管理员头像</th>
            <th>管理员电话</th>
            <th>管理员邮箱</th>
            <th>操作</th>
		</tr>
	</thead>
	<tbody>
        @foreach($data as $k=>$v)
		<tr @if($k%2==0) class="active" @else class="success" @endif>
			<td>{{$v->admin_id}}</td>
			<td>{{$v->admin_name}}</td>
			<td>{{$v->admin_pwd}}</td>
			<td>@if($v->admin_img)<img src="{{env('UPLOAD_URL')}}{{$v->admin_img}}"width="30" height="30">@endif</td>
            <td>{{$v->admin_tel}}</td>
			<td>{{$v->admin_email}}</td>
            <td><a href="{{url('admin/edit/'.$v->admin_id)}}" class="btn btn-info">编辑</a>
            <a href="{{url('admin/destroy/'.$v->admin_id)}}" class="btn btn-danger">删除</a>
            </td>
		</tr>
        @endforeach
		<tr><td colspan="7">{{$data->appends(['admin_name'=>$admin_name])->links()}}</td></tr>
	</tbody>
</table>

</body>
</html>