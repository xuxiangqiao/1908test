<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>Bootstrap 品牌</title>
	<link rel="stylesheet" href="/static/css/bootstrap.min.css">  
	<script src="/static/js/jquery.min.js"></script>
	<script src="/static/js/bootstrap.min.js"></script>
	
</head>
<body>
 <center><h3>品牌添加</h3></center>  


<form class="form-horizontal" role="form" action="{{url('/store')}}" method="post">

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="b_name" id="firstname" 
				   placeholder="请输入名字">
			
		</div>
	</div>

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌网址</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="url" id="firstname" 
				   placeholder="请输入名字">
			
		</div>
	</div>

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">logo</label>
		<div class="col-sm-8">
			<input type="file" class="form-control" name="logo" id="firstname">
		</div>
	</div>
    
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌描述</label>
		<div class="col-sm-8">
			<textarea name="desc" id="" cols="30" rows="10"></textarea>
			
		</div>
	</div>
	
	
	
	
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" id="btn" class="btn btn-default btn-danger">添加</button>
			<button type="button" class="btn btn-default btn-danger">重置</button>

		</div>
	</div>
</form>

</body>
</html>
