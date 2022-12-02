@extends('layouts.admin')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{ route('product.create') }}" class="btn btn-primary">+ Add New Product</a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      	<div class="container-fluid">
        	<div class="row">
          		<div class="col-12">
            		<div class="card">
              			<div class="card-header">
                			<h3 class="card-title">All Product List Here</h3>
              			</div>
              			<!-- /.card-header -->
              			<div class="card-body">
			                <table id="" class="table table-bordered table-striped table-sm ytable">
								<thead>
									<tr>
										<th>SL</th>
										<th>Thumbnail</th>
										<th>Name</th>
										<th>Code</th>
										<th>Category</th>
										<th>Subcategory</th>
										<th>Brand</th>
										<th>Featured</th>
										<th>Today Deal</th>
										<th>Status</th>
										<th>Active</th>
									</tr>
								</thead>
								<tbody>
									
								</tbody>
			                </table>
			            <!-- /.card-body -->
              			</div>
          			</div>
      			</div>
  			</div>
		</div>
	</section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
	$(function childcategory(){
		var table=$('.ytable').DataTable({
			processing:true,
			serverSide:true,
			ajax:"{{ route('product.index') }}",
			columns:[
				{data:'DT_RowIndex', name:'DT_RowIndex'},
				{data:'thumbnail', name:'thumbnail'},
				{data:'name', name:'name'},
				{data:'code', name:'code'},
				{data:'category_name', name:'category_name'},
				{data:'subcategory_name', name:'subcategory_name'},
				{data:'brand_name', name:'brand_name'},
				{data:'featured', name:'featured'},
				{data:'today_deal', name:'today_deal'},
				{data:'status', name:'status'},
				{data:'action', name:'action', orderable:true, searchable:true},
			]
		});
	});
</script>

@endsection