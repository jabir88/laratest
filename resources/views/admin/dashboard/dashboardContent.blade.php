@extends('admin.adminmaster')

@section('myContent')
<div id="page-wrapper">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div> <!-- /.row -->


</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@endsection