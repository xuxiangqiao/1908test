<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop_brand;
use Illuminate\Validation\Rule;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *  列表展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Shop_brand::get();
        return view('brand.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *  添加
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *  执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'b_name'=>'required|unique:brand|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]{2,20}$/u',
            'url'=>'required|regex:/^www\.[0-9a-zA-Z]+\.com$/',
        ],[
            'b_name.required'=>'品牌名称必填',
            'b_name.unique'=>'品牌名称已存在',
            'b_name.regex'=>'品牌名称由中文、数字、字母、下划线2-20位组成',
            'url.required'=>'网址必填',
            'url.regex'=>'网址格式错误',
        ]);
        $data = request()->except('_token');
        // dd($data);
        if($request->hasFile('logo')){
            $data['logo'] = $this->upload('logo');
        }
        $res = Shop_brand::create($data);
        if($res){
            return redirect('/brand');
        }
        
    }
    /**
     *上传文件 封装的
     * $filename 文件域的名字
     */
    function upload($filename)
    {
            //判断上传过程是否有误
            if(request()->file($filename)->isValid()){
                // 接收值
                $photo = request()->file($filename);
                // dd($photo);
                // 上传
                $store_result = $photo->store('uploads');
                // dd($store_result);
                return $store_result;
            }
            exit;('未获取到上传文件或上传过程错误');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
    
    }

    /**
     * Show the form for editing the specified resource.
     *      编辑
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        // $b_id = Shop_brand::find($id);
        $b_id = Shop_brand::where('b_id',$id)->first();
        // dd($b_id);
        return view('brand.edit',['b_id'=>$b_id]);
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
        $request->validate([
            'b_name'=>['required',
                'regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]{2,20}$/u',
                Rule::unique('shop_brand')->ignore($id,'b_id'),
            ],
            'url'=>'required|regex:/^www\.[0-9a-zA-Z]+\.com$/',
        ],[
            'b_name.required'=>'品牌名称必填',
            'b_name.unique'=>'品牌名称已存在',
            'b_name.regex'=>'品牌名称由中文、数字、字母、下划线2-20位组成',
            'url.required'=>'网址必填',
            'url.regex'=>'网址格式错误',
        ]);
        $data = request()->except('_token');
        // dd($data);
        if($request->hasFile('logo')){
            $data['logo'] = $this->upload('logo');
        }
        $res = Shop_brand::where('b_id',$id)->update($data);
        if($res!==false){
            return redirect('/brand');
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
        // dd($id);
        // echo $id;die;
        $res = Shop_brand::where('b_id',$id)->delete($id);
        // if($res){
            return redirect('/brand');
        //     echo json_encode(['code'=>'00000','msg'=>'ok']);
        // }
    }
}
