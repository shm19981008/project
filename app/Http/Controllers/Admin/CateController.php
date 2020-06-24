<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CateModel;
use Illuminate\Http\Request;

class CateController extends Controller
{
    public function cateAdd(){
        return view('cate.add');
    }
    public function do_add(Request $request){
        $all=$request->all();
        $cate_name=$all['name'];
        $is_show=$all['is_no'];
        $data=[
            'cate_name'=>$cate_name,
            'is_show'=>$is_show,
            'catetime'=>time()
        ];
        $res=CateModel::insert($data);
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
    public function lists(){
        $data=CateModel::paginate(2);
        return view('cate/list',['data'=>$data]);
    }
    public function del(){
        $id=request()->get('id');
        $res=CateModel::where('id',$id)->delete();
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
        $data=CateModel::where('id',$id)->first();
        return view('cate.update',['data'=>$data]);
    }
    public function do_update(Request $request){
        $all=$request->all();
        $cate_name=$all['name'];
        $is_show=$all['is_no'];
        $id=$all['id'];
        $data=[
            'cate_name'=>$cate_name,
            'is_show'=>$is_show,
            'catetime'=>time()
        ];
        $res=CateModel::where('id',$id)->update($data);
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
}
