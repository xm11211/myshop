<?php
namespace app\member\model;
use think\Model;
class User extends Model {
    public function login($data,$flag = false) {
        if($flag === false) {
            $token = session('dsc_token');
            if($token != $data['dsc_token']) {
                $result['error'] = 1;
                $result['message'] = '<i class="iconfont icon-minus-sign"></i>非法请求！';
                return json($result);
            }
        }
        //查询用户名或用户邮箱或电话号码
        $user = $this->where('userName|email|tel','eq',$data['username'])
            ->find();
        $password = getpwd($data['password'].$user['randString']);
        if(!$user || $user['password'] != $password) {
            $result['error'] = 1;
            $result['message'] = '<i class="iconfont icon-minus-sign"></i>用户名或密码错误！';
            return json($result);
        }else {
            $result['error'] = 0;
            if(isset($data['back_act']) && $data['back_act'] != '') {
                $result['url'] = $data['back_act'];
            }else {
                $result['url'] = SITEURL;
            }
            if(isset($data['remember']) && $data['remember'] == 'on') {
                $username = $this->jiami($user['userName'],$user['randString']);
                $password = $this->jiami($data['password'],$user['randString']);
                cookie('username',$username,['expire' => 3600*24*7]);
                cookie('password',$password,['expire' => 3600*24*7]);
            }
            $result['uid'] = $user['id'];
            $result['username'] = $user['userName'];
            session('uid',$user['id']);
            session('username',$user['userName']);
            $points = $user['points'];
            $memberLevel = db('memberLevel')
                ->where('bottom','elt',$points)
                ->where('top','egt',$points)
                ->find();
            session('levelId',$memberLevel['id']);
            session('rate',$memberLevel['rate']);
            return json($result);
        }
    }
    public function jiami($data,$code) {
        $jiami = encrypt($data.'44da7c50ea96a5bc6bc1dfb675c731b4940f9624',$code);
        $str1 = substr($jiami,0,15);
        $str2 = substr($jiami,15);
        $jiami = $str1 . $code . $str2;
        $jiami = str_replace('=','',base64_encode($jiami));
        return $jiami;
    }
    public function jiemi($code) {
        $check = base64_decode($code);
        $codeString = substr($check,15,15);
        $jiami = substr($check,0,15).substr($check,30);
        $data = decrypt($jiami,$codeString);
        $key = substr($data,-40);
        $index = strrpos($data,$key);
        $data = substr($data,0,$index);
        return $data;
    }
}
