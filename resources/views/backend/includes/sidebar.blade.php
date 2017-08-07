<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <!-- Status -->
                <a href="#">
                    <i class="fa fa-circle text-success"></i> Online
                </a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="{{ active('admin') }}">
                <a href="{{ route('backend.dashboard') }}">
                    <span>Dashboard</span>
                </a>
            </li>
            @if (access()->hasPermission('backend.view'))
                    <li class="treeview {{ active('admin/evaluations') }}">
                        <a href="#">
                            <span>Avaliação Física</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ active('admin/evaluations') }}">
                                <a href="{{ route('backend.evaluations.index') }}">{{ trans('strings.evaluations') }}</a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview {{ active('admin/tests') }} {{ active('admin/protocols') }}">
                        <a href="#">
                            <span>Testes</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ active('admin/tests') }}">
                                <a href="{{ route('backend.tests.index') }}">{{ trans('strings.tests') }}</a>
                            </li>
                            <li class="{{ active('admin/protocols') }}">
                                <a href="{{ route('backend.protocols.index') }}">{{  trans('strings.protocols') }}</a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <span>Relatórios</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="#">
                                <a href="#">{{ trans('strings.users') }}</a>
                            </li>
                        </ul>
                    </li>
                @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>