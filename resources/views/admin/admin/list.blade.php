@extends('admin.layout.master')

@section('content')  
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	        <h1>
	            Quản trị viên
	            <small>Danh sách</small>
	        </h1>
	        <ol class="breadcrumb">
	        	<li><a href="admin"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
	            <li><a href="admin/quan-tri-vien"><i class="fa fa-user-secret"></i> Quản trị viên</a></li>
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
			                            <th>Tên người dùng</th>
			                            <th>Email</th>
			                            <th>Hình đại diện</th>
			                            <th>Địa chỉ</th>
			                            <th>Số điện thoại</th>
			                            <th>Cấp độ</th>
			                            <th>Chỉnh sửa/Xóa</th>
			                        </tr>
			                    </thead>
			                    <tfoot>
			                        <tr>
			                            <th>Tên người dùng</th>
			                            <th>Email</th>
			                            <th>Hình đại diện</th>
			                            <th>Địa chỉ</th>
			                            <th>Số điện thoại</th>
			                            <th>Cấp độ</th>
			                            <th>Chỉnh sửa/Xóa</th>
			                        </tr>
			                    </tfoot>
			                    <tbody>

		                    	@foreach ($admin as $item)
		                    		<tr>
			                            <td>{{ $item->name }}</td>
			                            <td>{{ $item->email }}</td>
			                            <td><img src="public/upload/users/{{ $item->avatar }}" width="200px"></td>
			                            <td>{{ $item->address }}</td>
			                            <td>{{ $item->phone }}</td>
			                            <td  class="text-center">
		                            	@if ($item->level == 1)
		                            		<!-- Button trigger modal -->
											<button class="btn btn-success" data-toggle="modal" data-target="#change-level-{{ $item->id }}">
											Cộng tác viên
											</button>

											<!-- Modal -->
											<div class="modal fade" id="change-level-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											    <div class="modal-dialog">
											        <div class="modal-content">
											            <div class="modal-header">
											                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											                <h4 class="modal-title" id="myModalLabel">Yêu cầu xác nhận</h4>
											            </div>
											            <div class="modal-body">
											                Bạn có muốn thay đổi cấp độ của quản trị viên có tên <b>{{ $item->name }}</b>?
											            </div>
											            <div class="modal-footer">
											                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
											                <a href="admin/quan-tri-vien/doi-cap-do/{{ $item->id }}"><button type="button" class="btn btn-primary">Lưu thay đổi</button></a>
											            </div>
											        </div>
											    </div>
											</div>
		                            	@else
		                            		<!-- Button trigger modal -->
											<button class="btn btn-danger" data-toggle="modal" data-target="#change-level-{{ $item->id }}">
											Quản trị viên
											</button>

											<!-- Modal -->
											<div class="modal fade" id="change-level-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											    <div class="modal-dialog">
											        <div class="modal-content">
											            <div class="modal-header">
											                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											                <h4 class="modal-title" id="myModalLabel">Yêu cầu xác nhận</h4>
											            </div>
											            <div class="modal-body">
											                Bạn có muốn thay đổi cấp độ của quản trị viên có tên <b>{{ $item->name }}</b>?
											            </div>
											            <div class="modal-footer">
											                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
											                <a href="admin/quan-tri-vien/doi-cap-do/{{ $item->id }}"><button type="button" class="btn btn-primary">Lưu thay đổi</button></a>
											            </div>
											        </div>
											    </div>
											</div>
		                            	@endif
			                            </td>
			                            <td  class="text-center">
			                            	<a href="admin/quan-tri-vien/sua/{{ $item->id }}"><button type="button" class="btn btn-warning"><i class="fa fa-edit"></i>Sửa</button></a>
			                            	
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
											                Bạn có muốn xóa quản trị viên <b>{{ $item->name }}</b>?
											            </div>
											            <div class="modal-footer">
											                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
											                <a href="admin/quan-tri-vien/xoa/{{ $item->id }}"><button type="button" class="btn btn-primary">Lưu thay đổi</button></a>
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