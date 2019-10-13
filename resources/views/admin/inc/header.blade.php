<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.html"></a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right topnav">

    <!-- /.dropdown -->

    <!-- /.dropdown -->
    <li>
        <a href="#">
            <div>
                <strong>Deposit Amount - </strong>
                <span class="pull-right text-muted">
                    <?php
                    // $m =  $countMessage->created_at;
                    // $res = Carbon\Carbon::parse($m)->diffForHumans();
                    ?>
                    <em> &nbsp {{$dep_am->deposit_amount}}</em>
                </span>
            </div>
            <div></div>
        </a>
    </li>
    <li class="divider"></li>

    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> {{Auth::user()->name}} <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">

            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out fa-fw"></i> {{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>