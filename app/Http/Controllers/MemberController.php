<?php
/**
 * Created by PhpStorm.
 * User: zjh
 * Date: 17-11-27
 * Time: 上午11:26
 */
namespace App\Http\Controllers;

use App\Models\Member;

class MemberController extends Controller{
    public function info($id){

        echo ' id is '.$id;
//        echo route('memberInfo');
    }
    public function view($name='default'){
        $member = new Member();
        $res = $member::getMember();
        return view('member-info',['name'=>$name,'res'=>$res]);
    }
}