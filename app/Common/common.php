<?php

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