<?php
/**
 * Created by PhpStorm.
 * User: zjh
 * Date: 17-11-27
 * Time: 下午10:39
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Member extends Model{
    public static function getMember(){
        return '一个静态方法';
    }
}