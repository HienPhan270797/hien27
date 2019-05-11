<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;

class UserController extends Controller
{
    //
    public function checkLogin(Request $req){
    	$user = UserModel::where([["id","=",$req->username],["password","=",$req->password]])->first();
    	if($user){
    	//đn thành công
    		session()->put("user", $user);//lưu vào sesson
    		if($req->has("remember")){
    			//có ghi nhớ -> lưu vào cookie
    			setcookie("user", serialize($user), time() + (8640 * 30), "/"); //lưu 30 ngày 
    		}
   	 	}
   	 	else
    		echo "Thông tin đăng nhập k đúng";
	}
	public function logout(){
		//xóa session
		session()->forget("user");
		//xóa cookie nếu có
		setcookie("name", null, -1); //xóa cookie
		return redirect()->route("login"); //trả về login
	}
}
