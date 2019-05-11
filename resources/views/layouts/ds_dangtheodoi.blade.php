
<div class="box box-warning">
	<div class="box-header">
		<h3 class="box-title">Danh sách Hàng bảo hành đang theo dõi</h3>
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
					<th>Ngày nhận</th>
					<th>Tên KH</th>
					<th>Thông tin KH</th>
					<th>Ngày hẹn trả</th>
					<th>Nơi bảo hành</th>
					<th>Ngày gởi đi</th>
					<th>Ngày nhận về</th>
					<th>Tác vụ</th>
				</tr>
			</thead>
			<tbody>
				@foreach($warcard_list as $wc)
				<tr>
					<td>{{$wc->productname}}</td>
					<td>{{$wc->errordetail}}</td>
					<td>{{date_format(date_create($wc->receiveddate), "d/m/Y")}}</td>
					<td> {{$wc->customername}}</td>
					<td>{{$wc->customerphone}}; {{$wc->customeraddress}}</td>

					<td>@if($wc->app_returndate)
						{{date_format(date_create($wc->app_returndate), "d/m/Y")}}
						@endif
					</td>

					<td>{{$wc['supplier']['name']}}</td>

					<td>@if($wc->sendeddate)
						{{date_format(date_create($wc->sendeddate), "d/m/Y")}}
					</td>@endif

					<td> @if($wc->receipteddate)
						{{date_format(date_create($wc->receipteddate), "d/m/Y")}}
					</td>@endif
					
					<td>Sửa | Xóa</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th>Tên SP</th>
					<th>Mô tả lỗi</th>
					<th>Ngày nhận</th>
					<th>Tên KH</th>
					<th>Thông tin KH</th>
					<th>Ngày hẹn trả</th>
					<th>Nơi bảo hành</th>
					<th>Ngày gởi đi</th>
					<th>Ngày nhận về</th>
					<th>Tác vụ</th>
				</tr>
			</tfoot>
		</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->