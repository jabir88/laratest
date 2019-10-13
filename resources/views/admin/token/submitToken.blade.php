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
        <div class="col-lg-12">
            <form action="{{route('submit.tokensub')}}" method="post" enctype="multipart/form-data">
                @csrf
                @error('deposit_amount')
                <div class="alert alert-warning" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group">
                    <label for="token-sub">Subject</label>
                    <input type="text" class="form-control" name="token_sub" id="token-sub" placeholder="Subject" value="{{ old('token_sub') }}">
                    @error('token_sub')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="token-des">Description</label>
                    <textarea class="form-control" name="token_des" id="token-des" rows="4">{{ old('token_des') }}</textarea>
                    @error('token_des')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="token-priority">Priority</label>
                    <select class="form-control" name="token_priority" id="token-priority" value="{{ old('token_priority') }}">
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="token-attach">Attachment</label>
                    <input type="file" name="token_attach" class="form-control-file" id="token-attach">
                    @error('token_attach')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
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