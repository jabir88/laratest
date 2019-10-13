@extends('admin.adminmaster')

@section('myContent')
<div id="page-wrapper">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    @if (session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Submit Ticket</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form action="{{route('submit.deposit')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="deposit_amount" class="col-form-label">Add Amount:</label>
                    <input type="number" class="form-control" name="deposit_amount" id="deposit_amount" value="{{old('deposit_amount')}}">
                    <input type="hidden" class="form-control" name="token_sub" value="{{$token_sub}}">
                    <input type="hidden" class="form-control" name="token_des" value="{{$token_des}}">
                    <input type="hidden" class="form-control" name="token_priority" value="{{$token_priority}}">
                    <input type="hidden" class="form-control" name="imgname" value="{{$imgname}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->


    <!-- /.row -->

    <!-- /.col-lg-4 -->


</div>
<!-- /#wrapper -->
@endsection