<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Ticket<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('submit.token') }}">Submit Ticket</a>
                    </li>
                    <li>
                        <a href="{{ route('all.token') }}">My Tickets</a>
                    </li>


                </ul>

            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Invite<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('all.token.admin')}}"><i class="fa fa-dashboard fa-fw"></i> All Tickets</a>
                    </li>
                    <li>
                        <a href="{{ route('all.token.solve') }}">Solved Tickets</a>
                    </li>


                </ul>

            </li>





        </ul>
    </div>

</div>