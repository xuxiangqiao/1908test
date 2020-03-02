<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Validator;
use App\Http\Requests\StoreBlogPost;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
     public function  list(){
        return view('admin.list');
    }



    public function index()
    {
         
      //搜索分页
      $admin_name=request()->admin_name??'';
      // $w_fenlei=request()->w_fenlei??'';
       $where=[];
       if($admin_name){
           $where[]=['admin_name','like',"%$admin_name%"];
           //dd($where);die;
       }
     //orb模型操作
     //分页
     $pageSize=config('app.pageSize');
     $data=Admin::where($where)->paginate($pageSize);
     return view('admin.index', ['data'=>$data, 'admin_name'=>$admin_name]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except('_token');
      
        //文件上传
      // 判断有无文件上传
      if($request->hasFile('admin_img')){
       $data['admin_img']=uploads('admin_img');       
    } 
    
       //ORM操作 create
       $res=admin::insert($data);
       if($res){
           return redirect('admin/index');
       }

      
    }
   //验证
   public function checkOnly(){

    $admin_name = request()->admin_name;

    $count = Admin::where(['admin_name'=>$admin_name])->count();

    echo json_encode(['code'=>'00000', 'msg'=>'ok', 'count'=>$count]);
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=admin::where('admin_id',$id)->first();
        return view('admin.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=$request->except('_token');
        //文件上传
        if($request->hasFile('admin_img')){
            $user['admin_img']=$this->upload('admin_img');
        }
        //ORm操作
        $res=Admin::where('admin_id',$id)->update($user);
        if($res!==false){
            return redirect('admin/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //orm操作
       $res=admin::destroy($id);
       if($res){
           return redirect('admin/index');
       }
   
    
    }
}
