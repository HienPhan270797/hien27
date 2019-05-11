<!-- general form elements -->
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Phiếu nhận hàng</h3>
		<div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form role="form" id="addnew_form">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="box-body">
			<div class="row">
				<div class="col-md-6 form-horizontal">
					<h6 style="font-weight: bold; font-size:15px;">Thông tin Sản phẩm</h6>
					<div class="form-group row">
	                  	<label class="col-sm-3 control-label">Tên SP (*): </label>
	                  	<div class="col-sm-9 control-item">
	                    	<input type="text" class="form-control" id="product-name" name="productname" placeholder="Tên sản phẩm">
	                  	</div>
	                </div>
	                <div class="form-group row">
	                  	<label class="col-sm-3 control-label">Mã SP: </label>
	                  	<div class="col-sm-3 control-item" style="padding:0px;">
	                    	<input type="text" class="form-control" id="product-code" name="productcode" placeholder="Mã sản phẩm">
	                  	</div>
	                  	<label class="col-sm-3 control-label">Serial: </label>
	                  	<div class="col-sm-3 control-item" style="padding-left:0px;">
	                    	<input type="text" class="form-control" id="product-serial" name="productserial" placeholder="Số serial">
	                  	</div>
	                </div>
	                <div class="form-group row">
	                  	<label class="col-sm-3 control-label">Mô tả lỗi (*): </label>
	                  	<div class="col-sm-9 control-item">
	                    	<input type="text" class="form-control" id="error-detail" name="errordetail" placeholder="Mô tả lỗi">
	                  	</div>
	                </div>
	                <div class="form-group row">
	                  	<label class="col-sm-3 control-label">Tình trạng: </label>
	                  	<div class="col-sm-9 control-item">
	                    	<input type="text" class="form-control" id="product-status" name="productstatus" placeholder="Tình trạng SP">
	                  	</div>
	                </div>
	                <div class="form-group row">
	                  	<label class="col-sm-3 control-label">Ngày B/hành: </label>
	                  	<div class="col-sm-3" style="padding:0px;">
	                    	<div class="input-group date">
			                  	<input type="text" class="form-control pull-right datepicker" id="warranty-date" name="warrantydate" value="{{date('d/m/Y')}}">
			                </div>
	                  	</div>
	                  	<label class="col-sm-3 control-label">T/gian B/hành:</label>
	                  	<div class="col-sm-3" style="padding-left:0px;">
	                    	<input type="number" class="form-control" id="warranty-time" name="warrantytime" placeholder="Số tháng">
	                  	</div>
	                </div>
	                <div class="form-group row">
	                  	<label class="col-sm-3 control-label">Nơi B/hành:</label>
	                  	<div class="col-sm-9 control-item">
	                    	<select class="form-control" required name="supplier">
	                    		<option value="">--Chọn hãng bảo hành--</option>
	                    		<!-- ... load ds hãng (NCC) bảo hành ở đây -->
	                    		@foreach ($supplier_list as $s)
	                    		<option value="{{$s->id}}">{{$s->name}}</option>
	                    		@endforeach
	                    	</select>
	                  	</div>
	                </div>
	                 <div class="form-group row">
	                  	<label class="col-sm-3 control-label">NV nhận: </label>
	                  	<label class="col-sm-9 control-label">{{session('user')->name}}</label>
	                </div>
				</div>	
				<div class="col-md-6">
					<h6 style="font-weight: bold; font-size:15px;">Thông tin Khách hàng</h6>
					<div class="form-group row">
	                  	<label class="col-sm-3 control-label">Họ tên KH (*):</label>
	                  	<div class="col-sm-9 control-item">
	                    	<input type="text" class="form-control" id="customer-name" name="customername" placeholder="Họ tên KH">
	                  	</div>
	                </div>
	                <div class="form-group row">
	                  	<label class="col-sm-3 control-label">Số ĐT (*):</label>
	                  	<div class="col-sm-9 control-item">
	                    	<input type="text" class="form-control" id="customer-phone" name="customerphone" placeholder="Số điện thoại" required>
	                  	</div>
	                </div>
	                <div class="form-group row">
	                  	<label class="col-sm-3 control-label">Địa chỉ:</label>
	                  	<div class="col-sm-9 control-item">
	                    	<input type="text" class="form-control" id="customer-address" name="customeraddress" placeholder="Địa chỉ">
	                  	</div>
	                </div>
	                <div class="form-group row">
	                  	<label class="col-sm-3 control-label">Ngày nhận:</label>
	                  	<div class="col-sm-3" style="padding:0px;">
	                    	<div class="input-group date">
			                  	<input type="text" class="form-control pull-right datepicker" id="received-date" name="receiveddate" value="{{date('d/m/Y')}}">
			                </div>
	                  	</div>
	                  	<label class="col-sm-3 control-label">Ngày hẹn trả:</label>
	                  	<div class="col-sm-3" style="padding-left:0px;">
	                    	<div class="input-group date">
			                  	<input type="text" class="form-control pull-right datepicker" id="appreturned-date" name="appreturneddate" value="{{date('d/m/Y')}}">
			                </div>
	                  	</div>
	                </div>
	                <div class="form-group row">
	                  	<label class="col-sm-3 control-label">Loại phiếu: </label>
	                  	<div class="col-sm-9 control-item">
	                    	<label><input type="radio" name="iswarranty" value="0" checked> Gởi sửa</label>
	                    	 &nbsp; &nbsp; &nbsp; &nbsp; 
	                    	<label><input type="radio" name="iswarranty" value="1"> Gởi bảo hành</label>
	                  	</div>
	                </div>
	                <div class="form-group row">
	                  	<label class="col-sm-3 control-label">Giao phiếu: </label>
	                  	<div class="col-sm-9 control-item">
	                    	<label><input type="radio" name="haswarrantycard" value="0" checked> Không giao</label>
	                    	 &nbsp;&nbsp;
	                    	<label><input type="radio" name="haswarrantycard" value="1"> Có giao phiếu</label>
	                  	</div>
	                </div>
				</div>	
			</div>
		</div>
		<!-- /.box-body -->

		<div class="box-footer" style="text-align: right">
			<button type="submit" class="btn btn-primary">Lưu phiếu</button>
		</div>
	</form>
</div>
<!-- /.box -->
<script>
	$('#addnew_form').submit(function(e){
    	e.preventDefault(); //chặn lại ko cho submit theo kiểu thông thường mà dùng ajax submit
    	dataString = $(this).serialize(); //lấy về tất cả dữ liệu trên form
    	$.ajax({
      		type: 'get',
      		url: "{{route('xuly_addnew_warcard')}}",
      		data: dataString,
      		success: function(result){
        		if(result.trim().length<1){
          			alert("Bạn đã lưu phiếu bảo hành thành công");
          			location.reload(true);
          		}
        		else
        			alert("Có lỗi khi lưu phiếu bảo hành.\n " + result);
      		},
      		dataType: "text"
    	});
  });

</script>