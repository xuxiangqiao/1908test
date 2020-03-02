<!-- RUNOOB.COM -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>品牌</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">  
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
</head>
<body>
​<center><h2 class="danger">品牌列表</h2></center>
<table class="table">
    
    <thead>
        <tr  class="warning">
            <th>ID</th>
            <th>品牌名称</th>
            <th>网址</th>
            <th>logo</th>
            <th>描述</th>
            <th>操作</th>
        </tr>
    </thead>
    <!-- class="danger" -->
    <tbody>
        @foreach($data as $k=>$v)
        <tr @if($k%2==0) class="success" @else class="danger" @endif>
            <td>{{$v->b_id}}</td>
            <td>{{$v->b_name}}</td>
            <td>{{$v->url}}</td>
            <td>
            @if($v->logo)
            <img src="{{env('UPLOAD_URL')}}{{$v->logo}}" width="100" height="100">
            @endif
            </td>
            <td>{{$v->desc}}</td>
            <td>
            <a href="{{url('brand/edit/'.$v->b_id)}}" class="btn btn-info">编辑</a>||
            <a href="{{url('brand/destroy/'.$v->b_id)}}" class="btn btn-danger">删除</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
​
</body>
</html>
<script>
    function del(id){
        if(!id){
            return; 
        }
        if(confirm('是否要删除此条记录')){
            // ajax删除
            $.get('/brand/destroy/'+id,function(res){
                if(res.code=='00000'){
                   // alert(111)
                    location.href="/brand";
                }
            },  
            'json'
            )
        }





    }



</script>

 
