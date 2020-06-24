<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        return view('admin/index');
    }
    public function banneradd(){
        return view('admin/banneradd');
    }
    public function do_add(Request $request){
        $all=$request->all();
        $name=$all['name'];
        $url=$all['url'];
        $is_no=$all['is_no'];
        $order=$all['order'];
        $data=[
            'name'=>$name,
            'url'=>$url,
            'is_no'=>$is_no,
            'order'=>$order
        ];
        $res=BannerModel::insert($data);
        if($res){
            return[
                'code'=>'0000',
                'msg'=>'添加成功',
                'data'=>$res
            ];
        }else{
            return[
                'code'=>'0001',
                'msg'=>'添加失败',
                'data'=>$res
            ];
        }
    }
    public function bannerlist(){
        $data=BannerModel::orderBy('order','desc')->paginate(2);
        return view('admin.bannerlist',['data'=>$data]);
    }
    public function bannerdel(){
        $id=request()->get('id');
        $res=BannerModel::where('id',$id)->delete();
        if($res){
            return[
                'code'=>'0000',
                'msg'=>'删除成功',
                'data'=>$res
            ];
        }else{
            return[
                'code'=>'0001',
                'msg'=>'删除失败',
                'data'=>$res
            ];
        }
    }
    public function update($id){
        $data=BannerModel::where('id',$id)->first();
        return view('admin.update',['data'=>$data]);
    }
    public function do_update(Request $request){
        $all=$request->all();
        $name=$all['name'];
        $url=$all['url'];
        $is_no=$all['is_no'];
        $order=$all['order'];
        $id=$all['id'];
        $data=[
            'name'=>$name,
            'url'=>$url,
            'is_no'=>$is_no,
            'order'=>$order
        ];
        $res=BannerModel::where('id',$id)->update($data);
        if($res){
            return[
                'code'=>'0000',
                'msg'=>'修改成功',
                'data'=>$res
            ];
        }else{
            return[
                'code'=>'0001',
                'msg'=>'修改失败',
                'data'=>$res
            ];
        }
    }
    public function upd(Request $request){
        $id= $request->get('id');
        $val=$request->get('val');
        $field=$request->get('field');
         $res=BannerModel::where('id',$id)->update([$field=>$val]);
        if($res){
            return[
                'code'=>'0000',
                'msg'=>'修改成功',
                'data'=>$res
            ];
        }
    }
    public function upload(){
        return view('admin.upload');
    }
    public function uploadadd(Request $request){
        $fileinfo=$_FILES['Filedata'];
//        echo $fileinfo;die;
        $tmpName=$fileinfo['tmp_name'];
        $ext=explode(".",$fileinfo['name'])[1];
        $newFileName=md5(uniqid()).".".$ext;
        $newFilePath="./uploads/".Date('Y/m/d/',time());
        if(!is_dir($newFilePath)){
            mkdir($newFilePath,0777,true);
        }
        $newFilePath=$newFilePath.$newFileName;
        move_uploaded_file($tmpName,$newFilePath);
        $newFilePath=ltrim($newFilePath,'.');
        echo $newFilePath;
    }
}
