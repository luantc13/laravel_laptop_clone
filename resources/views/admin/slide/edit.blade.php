@extends('admin.layout.master')

@section('content')  
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	        <h1>
	            Slide
	            <small>Sửa</small>
	        </h1>
	        <ol class="breadcrumb">
	        	<li><a href="admin"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
	            <li><a href="admin/slide"><i class="fa fa-image"></i> Slide</a></li>
	            <li class="active">Sửa</li>
	        </ol>
	    </section>
	    <!-- Main content -->
	    <section class="content container-fluid">

			<div class="box box-primary">
			    {{-- <div class="box-header with-border">
			        <h3 class="box-title">Quick Example</h3>
			    </div> --}}
			    <!-- /.box-header -->
			    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{Session('success')}}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{Session('error')}}
                    </div>
                @endif
			    <!-- form start -->
			    <form role="form" method="POST" enctype="multipart/form-data" action="admin/slide/sua/{{ $slide->id }}">
			    	<input type="hidden" name="_token" value="{{csrf_token()}}">
			        <div class="box-body">
			            <div class="form-group">
			                <label for="txtLink">Liên kết</label>
			                <input type="text" class="form-control" id="txtLink" name="txtLink" placeholder="Nhập liên kết" required="" value="{{ $slide->link }}">
			            </div>

			            <div class="form-group">
			                <label for="filImage">Hình ảnh</label>
			                <img src="public/upload/slide/{{ $slide->image }}" width="300px">
			                <input type="file" id="filImage" name="filImage" required="">
			                {{-- <p class="help-block">Example block-level help text here.</p> --}}
			            </div>


						<div class="form-group">
						    <div class="radio">
						        <label>
						        <input type="radio" name="rdoActive" id="rdoActive1" value="1"
								@if ($slide->active == 1)
									{{ 'checked' }}
								@endif
						        >
						        Hoạt động
						    	</label>
						    	&nbsp;&nbsp;&nbsp;
						    	<label>
						        <input type="radio" name="rdoActive" id="rdoActive0" value="0"
								@if ($slide->active == 0)
									{{ 'checked' }}
								@endif
						        >
						        Không hoạt động
						        </label>
						    </div>
						</div>


			        </div>
			        <!-- /.box-body -->
			        <div class="box-footer">
			            <button type="submit" class="btn btn-primary">Sửa</button>
			        </div>
			    </form>
			</div>
			<!-- /.box -->

	    </section>
	    <!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
@endsection

