
<div class="box box-warning">
	<div class="box-header">
		<h3 class="box-title">Danh sách Hàng bảo hành trả gần đây</h3>
		<div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="table_dangtheodoi" class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Tên SP</th>
					<th>Mô tả lỗi</th>
					<th>Tên KH</th>
					<th>Thông tin KH</th>
					<th>Ngày nhận</th>
					<th>Ngày hẹn trả</th>
					<th>Ngày trả</th>
					<th>Nơi bảo hành</th>
					<th>Nv trả</th>
					<th>Tác vụ</th>
				</tr>
			</thead>
			<tbody>
				@foreach($returned_warcard_list as $wc)
				<tr>
					<td>{{$wc->productname}}</td>
					<td>{{$wc->errordetail}}</td>
					<td> {{$wc->customername}}</td>
					<td>{{$wc->customerphone}}; {{$wc->customeraddress}}</td>
					<td>{{date_format(date_create($wc->receiveddate), "d/m/Y")}}</td>
					
					<td>@if($wc->app_returndate)
						{{date_format(date_create($wc->app_returndate), "d/m/Y")}}
						@endif
					</td>
					<td>{{date_format(date_create($wc->returneddate), "d/m/Y")}}</td>
					<td>{{$wc['supplier']['name']}}</td>
					<td>{{$wc['returneduser']['name']}}</td>
					<td>Sửa | Xóa</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th>Tên SP</th>
					<th>Mô tả lỗi</th>
					<th>Tên KH</th>
					<th>Thông tin KH</th>
					<th>Ngày nhận</th>
					<th>Ngày hẹn trả</th>
					<th>Ngày trả</th>
					<th>Nơi bảo hành</th>
					<th>Nv trả</th>
					<th>Tác vụ</th>
				</tr>
			</tfoot>
		</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->
