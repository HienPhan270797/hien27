<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suppliermodel;
use App\WarrantyCardModel;

class WarrantyCardController extends Controller
{
    //
    public function index() {
    	//lấy dữ liệu và đẩy qua view tại đây
    	$supplier_list = SupplierModel::all();

    	//lấy ra ds các phiếu bảo hành còn đang theo dõi
    	$warcard_list = WarrantyCardModel::whereNull("returneddate")->orderBy("receiveddate", "asc")->get();
    	foreach ($warcard_list as $k => $card) {
    		$supplier = $card->getSupplier->toArray(); //lấy thông tin supplier theo W.Card
    		$warcard_list[$k]['supplier'] = $supplier; //đưa thông tin Supplier này vào W.Card hiện hành
    	}


		//ds chưa gởi đi
		$unsend_warcard_list = WarrantyCardModel::whereNull("sendeddate")->orderBy("receiveddate", "asc")->get();

    	foreach ($unsend_warcard_list as $k => $card) {
    		$supplier = $card->getSupplier->toArray(); //lấy thông tin supplier theo W.Card
    		$unsend_warcard_list[$k]['supplier'] = $supplier; //đưa thông tin Supplier này vào W.Card hiện hành

    		$user = $card->getReceiver->toArray(); //lấy về nv nhận
    		$unsend_warcard_list[$k]['receiver'] = $user; 
    	}


    	//ds phiếu đã gởi
    	$unreceived_warcard_list = WarrantyCardModel::whereNotNull("sendeddate")
							    	->whereNull("receipteddate")
							    	->orderBy("receiveddate", "asc")
							    	->get();

    	foreach ($unreceived_warcard_list as $k => $card) {
    		$supplier = $card->getSupplier->toArray(); //lấy thông tin supplier theo W.Card
    		$unreceived_warcard_list[$k]['supplier'] = $supplier; //đưa thông tin Supplier này vào W.Card hiện hành
    		$user = $card->getSender->toArray(); //lấy NV gởi
    		$unreceived_warcard_list[$k]['sender'] = $user;
    	}


    	//ds phiếu đã nhận về
    	$receipted_warcard_list = WarrantyCardModel::whereNotNull("receipteddate")
							    	->whereNull("returneddate")
							    	->orderBy("receiveddate", "asc")
							    	->get();

    	foreach ($receipted_warcard_list as $k => $card) {
    		$supplier = $card->getSupplier->toArray(); //lấy thông tin supplier theo W.Card
    		$receipted_warcard_list[$k]['supplier'] = $supplier; //đưa thông tin Supplier này vào W.Card hiện hành
    		$user = $card->getGetBackUser->toArray(); //lấy NV gởi
    		$receipted_warcard_list[$k]['getback_user'] = $user;
    	}

    	//ds phiếu trả hàng
    	$returned_warcard_list = WarrantyCardModel::whereNotNull("returneddate")
							    	->orderBy("returneddate", "desc")
							    	->take(100) //số lượng tùy nhu cầu
							    	->get();

    	foreach ($returned_warcard_list as $k => $card) {
    		$supplier = $card->getSupplier->toArray(); //lấy thông tin supplier theo W.Card
    		$returned_warcard_list[$k]['supplier'] = $supplier; //đưa thông tin Supplier này vào W.Card hiện hànhreturned_warcard_list
    		$user = $card->getReturnUser->toArray(); //lấy NV trả
    		$returned_warcard_list[$k]['returneduser'] = $user;
    	}

    	return view('index',[
    		"supplier_list" => $supplier_list, 
    		"warcard_list" => $warcard_list, 
    		"unsend_warcard_list" => $unsend_warcard_list,
    		"unreceived_warcard_list" => $unreceived_warcard_list,
    		"receipted_warcard_list" => $receipted_warcard_list,
    		"returned_warcard_list" => $returned_warcard_list
    	]);
    	
	}



	public function xuly_addnew_warcard(Request $req){
		$warcar = new WarrantyCardModel();
		//gán các giá trị cho các cột
		$warcar->productname = $req->productname;

		if($req->has("productcode"))
			$warcar->productcode = $req->productcode;

		if($req->has("productserial"))
			$warcar->productserial = $req->productserial;

		if($req->has("warrantydate"))
			$date = str_replace('/', '-', $req->warrantydate);
		$warcar->warrantydate = date('Y-m-d', strtotime($date));

		if($req->has("warrantytime"))
			$warcar->warrantytime = $req->warrantytime;

		$warcar->errordetail = $req->errordetail;

		if($req->has("productstatus"))
			$warcar->productstatus = $req->productstatus;

		$warcar->customername = $req->customername;
		$warcar->customerphone = $req->customerphone;

		if($req->has("customeraddress"))
			$warcar->customeraddress = $req->customeraddress;

		if($req->has("customeremail"))
			$warcar->customeremail = $req->customeremail;

		$warcar->receiveddate = date("Y-m-d");

		if($req->has("app_returndate"))
			$date = str_replace('/', '-', $req->app_returndate);
			$warcar->app_returndate = date('Y-m-d', strtotime($date));

		if($req->has("iswarranty"))
			$warcar->iswarranty = 1;
		else
			$warcar->iswarranty = 0;

		if($req->has("haswarrantycard"))
			$warcar->haswarrantycard = 1;
		else
			$warcar->haswarrantycard = 0;

		$warcar->supplierid = $req->supplier;

		$warcar->received_userid = session("user")->id; //sau này lấy từ session sau khi người dùng đăng nhập

		$warcar->save(); //lưu phiếu bảo hành
			
	}
	//xử lí send_form
	public function xuly_send_form(Request $req){
		$warcar = WarrantyCardModel::find($req->product); //trả về card đang thao tác
		//ghi chú: combobox product có value  chính là phần id của phiếu BH
		//cập nhận giá trị tương ứng cho phần gởi đi
		$date = str_replace('/', '-', $req->senddate);
		$warcar->sendeddate = date('Y-m-d', strtotime($date)); //cập nhập ngày gởi đi

		$warcar->sended_userid = session("user")->id;; //cập nhập NV gởi sau này lấy mã NV gởi theo session của người đăng nhập

		$warcar->supplierid = $req->supplier; //cập nhập lại nơi gởi đến nơi Bh

		$warcar->save(); //TH này update do phiếu này đã có
			
	}
	//xử lý getback_form
	public function xuly_getback_form(Request $req){
		$warcar = WarrantyCardModel::find($req->product); //trả về card đang thao tác
		//ghi chú: combobox product có value  chính là phần id của phiếu BH
		//cập nhận giá trị tương ứng cho phần gởi đi
		$date = str_replace('/', '-', $req->getback_date);
		$warcar->receipteddate = date('Y-m-d', strtotime($date)); //cập nhập ngày nhận

		$warcar->getback_userid = session("user")->id;; //cập nhập NV gởi sau này lấy mã NV nhận theo session của người đăng nhập

		$warcar->save(); //TH này update do phiếu này đã có			
	}

	//xử lý turn_form
	public function xuly_turn_form(Request $req){
		$warcar = WarrantyCardModel::find($req->product); //trả về card đang thao tác
		//ghi chú: combobox product có value  chính là phần id của phiếu BH
		//cập nhận giá trị tương ứng cho phần trả hàng
		$date = str_replace('/', '-', $req->return_date);
		$warcar->returneddate = date('Y-m-d', strtotime($date)); //cập nhập ngày trả

		$warcar->returned_userid = session("user")->id;; //cập nhập NV gởi sau này lấy mã NV trả theo session của người đăng nhập

		$warcar->save(); //TH này update do phiếu này đã có			
	}

	//xử lý turn_form
	public function get_supplier(Request $req){
		$warcar = WarrantyCardModel::find($req->id); //trả về card đang thao tác
		$supplier = $warcar->getSupplier->toArray();
		return json_encode($supplier); //trả về kiểu json		
	}

	//xử lý phieu trả
	public function get_customer(Request $req){
		$warcar = WarrantyCardModel::find($req->id); //trả về card đang thao tác
		
		echo $warcar->customername . " - ĐT. " .$warcar->customerphone . " - ĐC: " . $warcar->customeraddress;
	}
	
	
}
