<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/datepicker3.css">
    <link rel="stylesheet" href="css/mystyle.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.css">
    <style type="text/css">
    	.fade:not(.show){
    		opacity: unset;
    	}
    </style>
     <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <title>Quản lý bảo hành</title>
  </head>
  <body>
    <div class="container">
    	<div class="row">
    		<div class="col-12" style="text-align: right; margin: 5px; font-weight: 700;">
    			<a href="{{route('logout')}}">Đăng xuất</a>
    		</div>
    	</div>
	    <div class="row">
	        <div class="col-12">	
	            <div class="tab" role="tabpanel">
	                <!-- Nav tabs -->
	                <ul class="nav nav-tabs" role="tablist">
	                    <li role="presentation" class="active"><a href="#Section1" role="tab" data-toggle="tab">Phiếu nhận hàng</a></li>
	                    <li role="presentation"><a href="#Section2" role="tab" data-toggle="tab">Phiếu gởi đi</a></li>
	                    <li role="presentation"><a href="#Section3" role="tab" data-toggle="tab">Phiếu nhận về</a></li>
	                    <li role="presentation"><a href="#Section4" role="tab" data-toggle="tab">Phiếu trả hàng</a></li>
	                </ul>
	                <!-- Tab panes -->
	                <div class="tab-content tabs">
	                    <div role="tabpanel" class="tab-pane fade in active" id="Section1">
	                        @include("layouts.tab_nhanvao")
	                    </div>
	                    <div role="tabpanel" class="tab-pane fade" id="Section2">
	                        @include("layouts.tab_goidi")
	                    </div>
	                    <div role="tabpanel" class="tab-pane fade" id="Section3">
	                        @include("layouts.tab_nhanlai")
	                    </div>
	                    <div role="tabpanel" class="tab-pane fade" id="Section4">
	                        @include("layouts.tab_trahang")
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/app.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		//Xử lý cho phần date picker
		$('.datepicker').datepicker({
      		autoclose: true,
      		weekStart: 1,
    		language: 'vn' //có thể sửa theo ngôn ngữ
    	});

    	//Xử lý cho phần dataTables
    	$("#table_dangtheodoi").DataTable();
	</script>
	
  </body>
</html>