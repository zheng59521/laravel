<?php
/**
 * Created by PhpStorm.
 * User: zjh
 * Date: 17-11-27
 * Time: 下午7:16
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model{
    const SEX_UNIT = 3;
    const SEX_BOY = 1;
    const SEX_GIRL = 2;
    //设置表名
    protected $table='cmf_user';
    //设置主键
    protected $primaryKey = 'id';
    //自动填充时间戳(`updated_at`, `created_at`)
    public $timestamps = false;
    //允许批量赋值的字段 针对模型的create新增(一次只能create一条)
    protected $fillable=['sex','birthday','mobile','user_nickname','user_pass','avatar'];
    //不允许批量赋值的字段
    protected $guarded = 'id';
    //自定义时间戳字段
    protected function getDateFormat(){
        return time();
    }
    //不自动格式化模型查询中得到的时间戳,要想得到格式化后的,注释此方法即可
    protected function asDateTime($val){
        return $val;
    }
    public function getSex($key=null){
        $sex = [
            self::SEX_UNIT =>'未知',
            self::SEX_BOY =>'男',
            self::SEX_GIRL =>'女',
        ];
        if($key!=null){
            return array_key_exists($key,$sex)?$sex[$key]:$sex[self::SEX_UNIT];
        }else{
            return $sex;
        }
    }
    public function validate($scene=''){
        $validate = [
            'data.avatar'=>'required|image|dimensions:min_width=100,min_height=200',
            //,max_height=500,max_width=500',
            //'present',
            //|image|dimensions:min_width=100,min_height=200,max_height=500,max_width=500',
            'data.mobile'=>'required',
            'data.sex'=>'required',
            'data.user_nickname'=>'required|unique:cmf_user,user_nickname|min:2|max:5',
            'data.birthday'=>'required|date',
            'data.user_pass'=>'required|min:1|max:6'
        ];
        $message = [
            'image'=>'：attribute 必须为图片',
            'unique'=>':attribute已经存在',
            'integer'=>':attribute 整数',
            'required'=>':attribute 必填',
            'min'=>':attribute 长度过小',
            'max'=>':attribute 长度过长',
        ];
        $f_name=[
            'data.avatar'=>'头像',
            'data.mobile'=>'手机',
            'data.sex'=>'性别',
            'data.user_nickname'=>'用户名',
            'data.birthday'=>'生日',
            'data.user_pass'=>'密码',
        ];
        if($scene=='update'){
            $validate['data.avatar']='';
            $validate['data.user_nickname']='required|min:2|max:5';
        }else if($scene=='delete'){
            $validate=[
                //'id'=>'required|integer'
            ];
            $message=[];$f_name=[];
        }
        $arr = [$validate,$message,$f_name];
        return $arr;
    }
}