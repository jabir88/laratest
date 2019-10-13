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
            <h1 class="page-header">#{{ $one_token->id }} Ticket</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered">

                <tbody>
                    <tr>
                        <td>Subject</td>
                        <td>{{$one_token->token_sub}}</td>

                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{$one_token->token_des}}</td>

                    </tr>

                    @if($one_token->token_attach != '')
                    <tr>
                        <td>Attachment</td>

                        <td><img src="{{ asset('token_images') }}/{{ $one_token->token_attach }}" width="180" alt="img"></td>

                    </tr>
                    @endif
                    <tr>
                        <td>Priority</td>
                        @if($one_token->token_priority == 'Low')

                        <td><button type="button" class="btn btn-dark btn-sm">{{$one_token->token_priority}}</button></td>
                        @elseif($one_token->token_priority == 'Medium')
                        <td><button type="button" class="btn btn-info btn-sm">{{$one_token->token_priority}}</button></td>

                        @else
                        <td><button type="button" class="btn btn-warning btn-sm">{{$one_token->token_priority}}</button></td>
                        @endif
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>@if($one_token->token_status == 0)
                            <button type="button" class="btn btn-danger btn-sm">Open</button>
                            @else
                            <button type="button" class="btn btn-success btn-sm">Close</button>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Created At</td>
                        <td>{{$one_token->created_at}}
                        </td>
                    </tr>
                    <tr>
                        <td>Deposit Amount</td>


                        <td>{{ $one_token->deposit_amount }}
                            @if($one_token->payment_status != 1)
                            <form action="{{route('dep.update')}}" method="POST" style="margin-top : 10px;">
                                @csrf
                                <input type="hidden" class="form-control" name="release_id" id="release_id" value="{{ $one_token->id }}">
                                <input type="hidden" class="form-control" name="release_amount" id="release_amount" value="{{ $one_token->deposit_amount }}">

                                <button type="submit" class="btn btn-primary">Release Amount</button>

                            </form>
                            @else
                            <i style="color:#005028;"><b>Amount Released</b></i>
                            @endif
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-lg-12">

            <h3 class="page-header">Comments</h3>

        </div>
        @foreach($all_comments as $one_comment)
        <div class="col-lg-12">
            @if($one_comment->reply_person == Auth::user()->id)
            <h4 style="font-weight : 700;">{{Auth::user()->name}}</h4>
            @else
            <h4 style="font-weight : 700;">Admin</h4>
            @endif
            <p>{{ $one_comment->details }}</p>
            @if($one_comment->comment_attachment != '')
            <a href="{{ url('/token/all/view/reply/download/'. $one_comment->comment_attachment) }} ">
                <img src="{{ asset('comment_image') }}/{{ $one_comment->comment_attachment }}" width="80" alt="comment-imge">
            </a>
            @endif
            <p><i>{{ $one_comment->created_at->toDateString() }}</i></p>
            <hr />
            <br />
        </div>
        @endforeach
        @if($one_token->token_status == 1)
        <div class="col-lg-12">

            <div class="alert " style="     color: #1b1e21; 
    background-color: #d6d8d9;
    border-color: #c6c8ca;" role="alert">
                This Ticket is Closed !
            </div>
        </div>
        @else
        <div class="col-lg-12">

            <h3 class="page-header">Reply</h3>

        </div>
        <div class="col-lg-12">

            <form action="{{route('tokensub.reply')}}" method="post" enctype="multipart/form-data">
                @csrf


                <div class="form-group">
                    <label for="details">Details</label>
                    <input type="hidden" name="token_id" class="form-control-file" id="token_id" value="{{ $one_token->id}}">
                    <textarea class="form-control" name="details" id="details" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="comment_attachment">Attachment</label>
                    <input type="file" name="comment_attachment" class="form-control-file" id="comment_attachment">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <!-- /.col-lg-12 -->
        @endif
    </div>
    <!-- /.row -->

    <!-- /.row -->

    <!-- /.col-lg-4 -->


</div>
<!-- /#wrapper -->
@endsection