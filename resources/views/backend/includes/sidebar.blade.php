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
        {{--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>--}}
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="{{ active('admin') }}">
                <a href="{{ route('backend.dashboard') }}">
                    <span>Dashboard</span>
                </a>
            </li>
            @if (access()->hasPermission('backend.view') || auth()->user()->hasAnyRoles('adm'))
                <li class="treeview {{ active(['admin/auth']) }}">
                    <a href="#">
                        <span>{{ trans('strings.users') }}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ active('admin/auth') }}">
                            <a href="{{ route('backend.auth.index') }}">{{ trans('strings.users') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview {{ active(['admin/evaluations']) }}">
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

                <li class="treeview {{ active(['admin/tests', 'admin/protocols', 'admin/additional_data']) }}">
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
                        <li class="{{ active('admin/additional_data') }}">
                            <a href="{{ route('backend.additional_data.index') }}">Dados Adicionais</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview {{ active(['admin/reports']) }}">
                    <a href="#">
                        <span>Relatórios</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ active(['admin/reports/simple', 'admin/reports/tests', 'admin/reports/evaluations']) }}">
                            <a href="{{route('backend.reports.simple')}}">{{ trans('menus.simple') }}</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview {{ active(['admin/diaries', 'admin/diary_hours']) }}">
                    <a href="#">
                        <span>{{ trans('strings.diary') }}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ active(['admin/diaries']) }}">
                            <a href="{{route('backend.diaries.index')}}">
                                {{ trans('menus.diary') }}
                            </a>
                        </li>
                        <li class="{{ active(['admin/diary_hour']) }}">
                            <a href="{{route('backend.diary_hours.index')}}">
                                {{ trans('menus.hours') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="treeview {{ active(['admin/config']) }}">
                    <a href="#">
                        <span>Pagseguro</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ active('admin/config') }}">
                            <a href="{{route('backend.config.create')}}">Criar Botão Pagseguro</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>