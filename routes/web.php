<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//默认
Route::get('/', function () {
    return view('welcome');
});
//get请求路由
Route::get('fun1',function(){
    echo 'hello Word i am get';
});
//post请求的路由
Route::post('fun2',function(){
    return 'hello word i am post ';
});

//多请求路由:
Route::match(['get','post'],'match1',function(){
    echo'我是多请求路由,支持get,post';
});
//响应所有请求
Route::any('any1',function(){
    echo '我是any请求,响应任何请求';
});


//路由参数
Route::get('user/{id?}',function($id=''){
    echo 'id is'.$id;
});
//使用正则限制参数,带?为可选参数,后面需带默认值
Route::get('reg/{id}/{name?}',function($id,$name='default'){
    echo 'id is '.$id.' reg is '.$name;
})->where(['id'=>'[0-9]+','name'=>'[A-Za-z]+']);
//路由别名
Route::get('users/member-center',['as'=>'center',function(){
    //为什么使用别名,当长的名字时,可以在控制器,路由,模板中,使用route()函数,访问到该别名的url
    echo '我是使用了路由别名';
    echo "<br />";
    echo route('center');
}]);

//6.路由群组
Route::group(['prefix'=>'member'],function(){
    //使用路由群组,群组内的路由必须带前缀
    Route::get('ord/ord1',function(){
        echo 'ord1';
    });
    Route::match(['get','post'],'ord2',function(){
        echo 'ord2';
    });
});

//7.路由中输出视图
Route::get('view',function(){
    return view('welcome');
});

//8.路由与控制器相关联
//路由规则如何与控制器相关联?
//Route::get('member/info','MemberController@info');
//两种方法
Route::any('member/info/{id}',[         //使用参数后,无法使用别名,无法在控制器中使用route
    'uses'=>'MemberController@info',
    'as'=>'memberInfo',      //别名
])->where('id','[0-9]+');

//传参
Route::get('member-view/{name?}', 'MemberController@view')
->where(['name'=>'[\w]+']);

//DB facade
Route::get('s-inx','StuController@index');
Route::get('s-cre','StuController@create');
Route::get('s-ups','StuController@update');
Route::get('s-del','StuController@delete');

//查询构造器
Route::get('s-inxs','StuController@indexs');
Route::get('s-cres','StuController@creates');
Route::get('s-upss','StuController@updates');
Route::get('s-dels','StuController@deletes');

//ORM查询
Route::get('ms-inx','StuController@indexss');
Route::get('ms-cre','StuController@createss');
Route::get('ms-ups','StuController@updatess');
Route::get('ms-del','StuController@deletess');

//增删改差
Route::get('index','StuController@read');
//Route::get('ms-cre','StuController@createss');
//Route::get('ms-ups','StuController@updatess');
//Route::get('ms-del','StuController@deletess');

//session测试
Route::group(['middleware'=>['web']],function(){
    Route::get('s-test','StuController@test_session');
    Route::get('s-test2','StuController@test2_session');
    Route::get('f_jump',['as'=>'j','uses'=>'StuController@jump']);
    Route::get('f_jump1','StuController@fun_jump1');
});

//路由中间件
Route::group(['middleware'=>['stu']],function(){
    Route::get('middle',[
        'as'=>'mid',
        'uses'=>'StuController@middle',
    ]);
});


//增删改查实例
Route::group(['middleware'=>'web'],function(){
    Route::get('indexs','StudentController@index');
    Route::match(['get','post'],'create','StudentController@create');
    Route::match(['get','post'],'update/{id}','StudentController@update')
    ->where(['id'=>'[\d]+']);
    Route::get('delete/{id}','StudentController@delete')->where(['id'=>'[\d]+']);
    Route::match(['get','post'],'view/{id}','StudentController@view')
    ->where('id','[\d]+');
    Route::match(['get','post'],'upload','StudentController@upload');
    Route::match(['get','post'],'email','StudentController@sendEmail');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
