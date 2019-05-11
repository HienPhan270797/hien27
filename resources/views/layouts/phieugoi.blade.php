<!-- general form elements -->
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Phiếu gởi</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form role="form" id="send_form">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 form-horizontal">
					<h6 style="font-weight: bold; font-size:15px;">Thông tin Phiếu gởi:</h6>
					<div class="form-group row">
						<label class="col-sm-6 control-label">Chọn sản phẩm:</label>
						<div class="col-sm-6 control-item">
							<select class="form-control" required name="product" id="product_goi">
								<option value="">--Chọn sản phẩm--</option>
								<!-- //load sp cần gửi đi -->
								@foreach ($unsend_warcard_list as $s)
								<option value="{{$s->id}}">{{$s->id}} # {{$s->productname}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-6 control-label">Ngày B/hành: </label>
						<div class="col-sm-6" style="padding:0px;">
							<div class="input-group date">
								<input type="text" class="form-control pull-right datepicker" id="senddate" name="senddate" value="{{date('d/m/Y')}}">
							</div>
						</div>
					</div>
				</div>	
				<div class="col-md-4">
					<h6 style="font-weight: bold; font-size:15px; color: #fff;">Thông tin Khách hàng</h6>
					<div class="form-group row">
	                  	<label class="col-sm-6 control-label">Nơi B/hành:</label>
	                  	<div class="col-sm-6 control-item">
	                    	<select class="form-control" required name="supplier" id="supplier_goi">
	                    		<option value="">--Chọn hãng B/Hành--</option>
	                    		@foreach ($supplier_list as $sup)
								<option value="{{$sup->id}}">{{$sup->name}}</option>
								@endforeach
	                    	</select>
	                  	</div>
	                </div>
				</div>
				<div class="col-md-4">
					<h6 style="font-weight: bold; font-size:15px; color: #fff;">Thông tin Khách hàng</h6>
					<div class="form-group row">
						<label class="col-sm-6 control-label">Nv gởi (*):</label>
						<label class="col-sm-3">{{session('user')->name}}</label>
					</div>
				</div>	
				<div class="col-md-8">
					<div class="form-group row">
						<label class="col-sm-3 control-label">Ghi chú (*):</label>
						<div class="col-sm-9 control-item">
							<input type="text" class="form-control" id="sendnote" name="sendnote" placeholder="">
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
	$('#send_form').submit(function(e){
    	e.preventDefault(); //chặn lại ko cho submit theo kiểu thông thường mà dùng ajax submit
    	dataString = $(this).serialize(); //lấy về tất cả dữ liệu trên form
    	$.ajax({
    		type: 'get',
    		url: "{{route('xuly_send_form')}}",
    		data: dataString,
    		success: function(result){
    			if(result.trim().length<1){
    				alert("Bạn đã lưu phiếu gởi hàng thành công");
    				location.reload(true);
    			}
    			else
    				alert("Có lỗi khi lưu phiếu gởi hàng.\n " + result);
    		},
    		dataType: "text"
    	});
    });
    $("#product_goi").change(function(){
    	$.ajax({
    		type: 'get',
    		url: "{{route('get_supplier')}}",
    		data: {
    			id:$(this).val()
    		},
    		success: function(result){
    			$("#supplier_goi").val(result['id']);
    		},
    		dataType: "json"
    	});
    });
</script>