@extends('admin.adminmaster')

@section('myContent')
<div id="page-wrapper">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Solved Ticket</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">


            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Description</th>
                        <th scope="col">Priority</th>
                        <th scope="col">Image</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_token as $one_token)

                    <tr>
                        <th scope="row">#{{ $one_token->id }}</th>

                        <td>{{ $one_token->token_sub }}</td>
                        <td>{{ $one_token->token_des }}</td>
                        <td>{{ $one_token->token_priority }}</td>
                        @if($one_token->token_attach != '')
                        <td><img src="{{ asset('token_images') }}/{{ $one_token->token_attach }}" width="80" alt="img"></td>
                        @else
                        <td><img src="{{ asset('') }}/noImage.jpg" width="80" alt="img"></td>

                        @endif
                        <td>{{ $one_token->created_at }}</td>
                        <td>
                            <a href="{{route('TokenDetails.token.view', ['id' => $one_token->id])}}" style=" padding:3px ; color: #fff ; text-align: center; background: #30AD23; margin-left : 2px;">
                                <i class="fa fa-eye  fa-fw "> </i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <!-- /.row -->

    <!-- /.col-lg-4 -->


</div>
<!-- /#wrapper -->
@endsection