<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarrantyCardModel extends Model
{
    //
    protected $table="warrantycards";
    public $timestamps = true;
    //tạo các liên kết
    public function getSupplier(){
    	return $this->belongsTo("App\SupplierModel", "supplierid", "id");
    }
    //tạo liên kết nhân viên nhận
    public function getReceiver(){
    	return $this->belongsTo("App\UserModel", "received_userid", "id");
    }
    //tạo liên kết nv gửi
     public function getSender(){
    	return $this->belongsTo("App\UserModel", "sended_userid", "id");
    }
     //tạo liên kết nv nhận về
     public function getGetBackUser(){
    	return $this->belongsTo("App\UserModel", "getback_userid", "id");
    }
     //tạo liên kết nv trả máy
     public function getReturnUser(){
    	return $this->belongsTo("App\UserModel", "returned_userid", "id");
    }


}
