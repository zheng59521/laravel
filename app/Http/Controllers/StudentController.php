<?php
/**
 * Created by PhpStorm.
 * User: zjh
 * Date: 17-11-28
 * Time: 下午6:36
 */
namespace App\Http\Controllers;


use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Mail;
class StudentController extends Controller{
    public function index(){
        $data = Users::whereRaw('id>? and id<?',[1,1000])->paginate(5);
        return view('s.index',['data'=>$data]);
    }
    public function create(Request $request){
        $model = new Users();
        if($request->isMethod('POST')){
            $data = ($request->post());
            $data['data']['birthday'] = strtotime($data['data']['birthday']);
 /*           echo'<pre>';
                print_r($data['data']);
                echo '------------';

            echo'</pre>';*/

            $arr = $model->validate();
            $this->validate($request,$arr[0],$arr[1],$arr[2]);
            $file = $request->file('data.avatar');
            if($file->isValid()){
                print_r($file);
                $old_name = $file->getClientOriginalName();
                //文件类型
                $ext  = $file->getClientOriginalExtension();   //jpg
                //文件类型
                $tmp = $file->getClientMimeType(); //image/jpeg
                //文件路径
                $path = $file->getRealPath();
                $new_name = uniqid().'.'.$ext;
                $bool = Storage::disk('uploads')->put($new_name,file_get_contents($path));
            }else{
                //$validator->errors()->add('error','表单未作修改');
                //return redirect()->back()->withErrors($validator);
                echo '图片出现问题';
                die;
            }
            if(users::create($data['data'])){
                return redirect('indexs')->with('message','新增成功');
            }else{
                return redirect()->back();
            }
        }else{
            return view('s.create',['model'=>$model]);
        }
    }
    public function update(Request $request,$id){
        $model = new Users();
        if($request->isMethod('POST')){
            $data = ($request->post());
            $arr = $model->validate('update');
//            $this->validate($request,$arr[0],$arr[1],$arr[2])->errors()->add('ss','aaa');
            $validator = \Validator::make($request->input(),$arr[0],$arr[1],$arr[2]);
            $data['data']['birthday'] = strtotime($data['data']['birthday']);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }
            if($model->where('id','=',$data['id'])->update($data['data'])){
                return redirect('indexs')->with('message','修改成功');
            }else{
                $validator->errors()->add('error','表单未作修改');
                return redirect()->back()->withErrors($validator);
            }
        }else{
            $model = $model->find($id);
            return view('s.update',['model'=>$model]);
        }
    }
    public function delete(Request $request,$id){
        $model = new Users();
        if($request->isMethod('GET')){
            $id = intval($id);
            $arr = $model->validate('delete');
            $this->validate($request,$arr[0],$arr[1],$arr[2]);
            if($model->destroy($id)){
                return redirect('indexs')->with('message','删除成功');
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('indexs');
        }
    }
    public function view(Request $request,$id){
        $model = $this->getOne($id);
        return view('s.view',['model'=>$model]);
    }
    private function getOne($id){
        return Users::find($id);
    }
    public function upload(Request $request){
        echo '哈哈哈';
    }
    public function sendEmail(){
        echo 'hhh';
        //tkohpnuatcciibfi
        Mail::raw('邮件内容',function ($message){
            $message->from('1356443200@qq.com','郑建恒.');
            $message->subject('邮件主题');
            $message->to('1421287137@qq.com');
        });
    }
}