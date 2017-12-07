<?php
/**
 * Created by PhpStorm.
 * User: zjh
 * Date: 17-11-27
 * Time: 下午11:00
 */
namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StuController extends Controller{
    //DB facade  原生sql参数绑定
    public function index(){
        //echo 'hhh';
        $res = DB::select('select * from cmf_user');
        //dd($res);
        return view('stu/index',['res'=>$res]);
    }
    public function create(){
        $sex=1;
        $bir=time();
        $avatar='aaa';
        $mobile='15063419120';
        $bool = DB::insert('insert into cmf_user(sex,birthday,avatar,mobile) 
            values (?,?,?,?)',[$sex,$bir,$avatar,$mobile]);
        var_dump($bool);
    }
    public function update(){
        $sex=2;$id=3;
        $num = DB::update('update cmf_user set sex=? where id=?',[$sex,$id]);
        echo '修改了'.var_dump($num).'行';
    }
    public function delete(){
        $id=2;
        $num = DB::delete('delete from cmf_user where id=?',[$id]);
        echo '删除了'.var_dump($num).'行';
    }

    //查询构造器方法
    public function indexs(){
        //get()   first()   where()     pluck()     lists(已废弃)     chunk()
        //1.get()   返回所有表数据
        $sql = DB::table('cmf_user');
        $get = $sql->whereRaw('id > ? and sex < ?',[4,6])->get();
//      dd($get);
        //2.first()     返回结果集中的第一条数据
        $first = $sql->orderBy('id','desc')->first();
//      dd($first);
        //3.pluck   值:指定字段  键:指定字段 (先值后键)
        $pluck = DB::table('cmf_user')
            ->whereRaw('id > ? and sex < ?',[4,6])
            ->pluck('birthday','id');
//        dd($pluck);
        //4.select(查询指定字段)
        $select = DB::table('cmf_user')
            ->whereRaw('id > ? and sex < ?',[4,6])
            ->select('id','sex','birthday','mobile')
            ->get();
//        dd($select);
        ///*
        //5.chunk   处理海量数据
        echo '<pre>';
        $i=0;
        DB::table('cmf_user')
            ->where('id','<=',13)
            ->orderBy('id','desc')
            //第一个为结果集,第二个为参数
            ->chunk(2,function($res,$i){
                var_dump($res);
                if($i==2){
                    echo '<h1>'.$i.'</h1>';
                    return false;
                }
                $i++;
            });
        //*/
        //聚合函数  count() min() max() avg() sum()
    }
    public function creates(){
        $data = [
            [
                'sex'=>1,
                'mobile'=>'15063419121',
                'birthday'=>time(),
                'avatar'=>'bbb',
            ],
            [
                'sex'=>2,
                'mobile'=>'15063419122',
                'birthday'=>time(),
                'avatar'=>'bbb',
            ]
        ];
        $one = [
            'sex'=>0,
            'mobile'=>'15063419121',
            'birthday'=>time(),
            'avatar'=>'bbb',
        ];
        $bool = DB::table('cmf_user')->insert($data);
        $id = DB::table('cmf_user')->insertGetId($one);
        echo '新增id为'.$id;
        var_dump($bool);
    }
    public function updates(){
        $data = ['sex'=>2,'mobile'=>'111'];
        $num = DB::table('cmf_user')->where(['id'=>9])->update($data);
        //自增    increment  自减   decrement()     默认为1
        $up = DB::table('cmf_user')->where(['id'=>9])->increment('sex',2);
        //自减同时修改其他
        $data = ['avatar'=>'自减'];
        $up = DB::table('cmf_user')->where(['id'=>9])->decrement('sex',1,$data);
        echo '修改了行'.var_dump($num);
    }
    public function deletes(){
        $num = DB::table('cmf_user')->where('id',8)->delete();
        echo '删除';
        //条件 where('id','>=','9')
        var_dump($num);
    }

    //ORM查询
    //all查询所有记录
    //find(主键查询)    查询一条`
    //findOrFail(主键查询,查不到抛异常)

    public function indexss(){
//        $res = Users::all();
//        dd($res);
//        $pk = Users::find(1);
//        dd($pk);
//        $fail = Users::findOrFail(100);
//        dd($fail);
    }
    public function createss(){
        /*
        //使用create只能 查找|新增 一条
        $data = [
            ['sex'=>1,'birthday'=>time()],
            ['sex'=>2,'birthday'=>time()+3]
        ];
        $int = Users::create($data);
        var_dump($int);
        */
        /*
        //以属性查找一条信息,若没有,则新增
        $res = Users::firstOrCreate(['sex'=>3]);
        dd($res);
        */
        ///*
        //firstOrNew()以属性查找信息,若没有,则生成实例,若需要保存,则需要使用save()保存
        $ress = Users::firstOrNew(['sex'=>5]);
        dd($ress);
        //*/
    }
    public function updatess(){
        //通过模型更新数据
        /*$model = Users::find(6);
        $model->sex=6;
        $model->save();*/
//      $num = Users::where('id','=',4)->update(['sex'=>4]);
    }
    public function deletess(){
        /*
        //通过模型删除数据
        //1
        $model = Users::find(9)->delete();
        //2 通过主键删除
        $num = Users::destroy([8,10]);
        //3 查询构造器
        $nums = Users::where('id','=',11)->delete();
        */
    }
    public function read(Request $request){
//        请求
//        $request->input()     //获取http请求 key,默认值
//        $request->has(0)       判断有无值
//        $request->all()       //所有参数
//        判断请求类型
//        $request->method()    //输出当前请求
//        $request->isMethod()
//        $request->ajax(       //是否ajax请求
//        $request->is('stu/*') //判断路由格式
//        $request->url()       //输出当前url
//        var_dump($request->url());
//        Session

        $data = Users::all();
        $position = '主页';
        return view('stu/index',['data'=>$data,'position'=>$position]);
    }
    public function r_create(){
;
    }
    public function r_update(){
;
    }
    public function r_delete(){
        ;
    }
    public function test_session(Request $request){
        //session设置
        //request
        //session()助手函数
        //
        $request->session()->put('key1','val1');    //设置session
        echo $request->session()->get('key1');      //读取session
        session()->put('key2','val2');
        session()->flash('key3','val3');            //暂存数据,第一次访问有,第二次消失
        echo session()->get('key2','default');
        $arr = [
            'a'=>['A'],
            'b'=>['B']
        ];
        session()->put('arr',$arr);
        session()->push('arr','c');
        session()->push('arr',['d'=>'D']);
        echo session()->put('one','one');
        dd(session()->all());
    }
    public function test2_session(){
        echo session()->pull('one');    //上面定义session,pull访问一次后删除
        //flash与pull区别:
        //pull先put定义,在用pull
        //flash直接用flash定义,之后用get访问
        echo session()->get('key3');
        session()->forget('key1');  //删除某个指定session
        session()->flush();           //清空session
    }
    public function fun_jump1(){
        $val1 = session()->get('val1');
        echo '哈哈哈';
        echo "<h1>{$val1}</h1>";
    }
    public function jump(){
        return redirect('f_jump1')->with('val1','val1哈');
        //此种重定向只能传session
    }
    public function middle(){
        echo '我是一';
    }

}