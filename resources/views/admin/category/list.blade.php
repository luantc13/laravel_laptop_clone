@extends('admin.layout.master')

@section('content')  
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	        <h1>
	            Hãng sản xuất
	            <small>Danh sách</small>
	        </h1>
	        <ol class="breadcrumb">
	        	<li><a href="admin"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
	            <li><a href="admin/hang-san-xuat"><i class="fa fa-industry"></i> Hãng sản xuất</a></li>
	            <li class="active">Danh sách</li>
	        </ol>
	        @if (session('success'))
                <div class="alert alert-success">
                    {{Session('success')}}
                </div>
            @endif
	    </section>
	    <!-- Main content -->
	    <section class="content container-fluid">

			<div class="row">
			    <div class="col-xs-12">
			        <div class="box">
			            {{-- <div class="box-header">
			                <h3 class="box-title">Hover Data Table</h3>
			            </div> --}}
			            <!-- /.box-header -->
			            <div class="box-body">
			                <table id="example2" class="table table-bordered table-hover">
			                    <thead>
			                        <tr>
			                            <th>Tên hãng</th>
			                            <th>Tên không dấu</th>
			                            <th>Hình ảnh</th>
			                            <th>Trạng thái</th>
			                            <th>Chỉnh sửa/Xóa</th>
			                        </tr>
			                    </thead>
			                    <tfoot>
			                        <tr>
			                            <th>Tên hãng</th>
			                            <th>Tên không dấu</th>
			                            <th>Hình ảnh</th>
			                            <th>Trạng thái</th>
			                            <th>Chỉnh sửa/Xóa</th>
			                        </tr>
			                    </tfoot>
			                    <tbody>

		                    	@foreach ($category as $item)
		                    		<tr>
			                            <td>{{ $item->name }}</td>
			                            <td>{{ $item->slug }}</td>
			                            <td><img src="public/upload/category/{{ $item->image }}" width="100px"></td>
			                            <td  class="text-center">
		                            	@if ($item->active == 1)
		                            		<!-- Button trigger modal -->
											<button class="btn btn-success" data-toggle="modal" data-target="#change-active-{{ $item->id }}">
											Hoạt động
											</button>

											<!-- Modal -->
											<div class="modal fade" id="change-active-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											    <div class="modal-dialog">
											        <div class="modal-content">
											            <div class="modal-header">
											                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											                <h4 class="modal-title" id="myModalLabel">Yêu cầu xác nhận</h4>
											            </div>
											            <div class="modal-body">
											                Bạn có muốn thay đổi trạng thái của hãng có tên <b>{{ $item->name }}</b>?
											            </div>
											            <div class="modal-footer">
											                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
											                <a href="admin/hang-san-xuat/doi-trang-thai/{{ $item->id }}"><button type="button" class="btn btn-primary">Lưu thay đổi</button></a>
											            </div>
											        </div>
											    </div>
											</div>
		                            	@else
		                            		<!-- Button trigger modal -->
											<button class="btn btn-primary" data-toggle="modal" data-target="#change-active-{{ $item->id }}">
											Không hoạt động
											</button>

											<!-- Modal -->
											<div class="modal fade" id="change-active-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											    <div class="modal-dialog">
											        <div class="modal-content">
											            <div class="modal-header">
											                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											                <h4 class="modal-title" id="myModalLabel">Yêu cầu xác nhận</h4>
											            </div>
											            <div class="modal-body">
											                Bạn có muốn thay đổi trạng thái của hãng có tên <b>{{ $item->name }}</b>?
											            </div>
											            <div class="modal-footer">
											                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
											                <a href="admin/hang-san-xuat/doi-trang-thai/{{ $item->id }}"><button type="button" class="btn btn-primary">Lưu thay đổi</button></a>
											            </div>
											        </div>
											    </div>
											</div>
		                            	@endif
			                            </td>
			                            <td  class="text-center">
			                            	<a href="admin/hang-san-xuat/sua/{{ $item->id }}"><button type="button" class="btn btn-warning"><i class="fa fa-edit"></i>Sửa</button></a>
			                            	
			                            	<!-- Button trigger modal -->
											<button class="btn btn-danger" data-toggle="modal" data-target="#delete-{{ $item->id }}"><i class="fa fa-times">
											Xóa
											</i></button>

											<!-- Modal -->
											<div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											    <div class="modal-dialog">
											        <div class="modal-content">
											            <div class="modal-header">
											                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											                <h4 class="modal-title" id="myModalLabel">Yêu cầu xác nhận</h4>
											            </div>
											            <div class="modal-body">
											                Bạn có muốn xóa hãng <b>{{ $item->name }}</b>?
											            </div>
											            <div class="modal-footer">
											                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
											                <a href="admin/hang-san-xuat/xoa/{{ $item->id }}"><button type="button" class="btn btn-primary">Lưu thay đổi</button></a>
											            </div>
											        </div>
											    </div>
											</div>
			                            </td>
			                        </tr>
		                    	@endforeach
			                        
			                    </tbody>
			                </table>
			            </div>
			            <!-- /.box-body -->
			        </div>

			    </div>
			    <!-- /.col -->

				




			</div>
			<!-- /.row -->



	    </section>
	    <!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
@endsection

@section('script')

<script>
    $(function () {
        $('#example1').DataTable();
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        });
    })
</script>

@endsection