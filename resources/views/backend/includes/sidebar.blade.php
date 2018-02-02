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
            <li class="{{ active('dashboard') }}">
                <a href="{{ route('backend.dashboard') }}">
                    <span>Dashboard</span>
                </a>
            </li>
            @can('backend.view')
                <li class="treeview {{ active(['auth']) }}">
                    <a href="#">
                        <span>{{ trans('strings.users') }}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ active('auth') }}">
                            <a href="{{ route('backend.auth.index') }}">
                                <i class="fa fa-circle-o"></i>
                                {{ trans('strings.users') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview {{ active(['categories', 'packages', 'tags', 'diaries', 'diary_hour']) }}">
                    <a href="#">
                        <i class="fa fa-edit"></i>
                        <span>{{ trans('strings.register') }}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ active('categories') }}">
                            <a href="{{ route('backend.categories.index') }}">
                                <i class="fa fa-circle-o"></i>
                                {{ trans('strings.categories') }}
                            </a>
                        </li>
                        <li class="{{ active('packages') }}">
                            <a href="{{ route('backend.packages.index') }}">
                                <i class="fa fa-circle-o"></i>
                                {{ trans('strings.packages') }}
                            </a>
                        </li>
                        <li class="{{ active('tags') }}">
                            <a href="{{ route('backend.tags.index') }}">
                                <i class="fa fa-circle-o"></i>
                                {{ trans('strings.tags') }}
                            </a>
                        </li>
                        <li class="{{ active('diaries') }}">
                            <a href="{{route('backend.diaries.index')}}">
                                <i class="fa fa-circle-o"></i>
                                {{ trans('menus.diary') }}
                            </a>
                        </li>
                        <li class="{{ active('diary_hour') }}">
                            <a href="{{route('backend.diary_hours.index')}}">
                                <i class="fa fa-circle-o"></i>
                                {{ trans('menus.hours') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview {{ active(['evaluations']) }}">
                    <a href="#">
                        <span>{!! trans('strings.physical_evaluation') !!}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ active('evaluations') }}">
                            <a href="{{ route('backend.evaluations.index') }}">
                                <i class="fa fa-circle-o"></i>
                                {{ trans('strings.evaluations') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="treeview {{ active(['tests', 'protocols', 'additional_data']) }}">
                    <a href="#">
                        <span>Testes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ active('tests') }}">
                            <a href="{{ route('backend.tests.index') }}">{{ trans('strings.tests') }}</a>
                        </li>
                        <li class="{{ active('protocols') }}">
                            <a href="{{ route('backend.protocols.index') }}">{{  trans('strings.protocols') }}</a>
                        </li>
                        <li class="{{ active('additional_data') }}">
                            <a href="{{ route('backend.additional_data.index') }}">Dados Adicionais</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview {{ active(['reports']) }}">
                    <a href="#">
                        <span>Relatórios</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ active(['reports/simple', 'reports/tests', 'reports/evaluations']) }}">
                            <a href="{{route('backend.reports.simple')}}">{{ trans('menus.simple') }}</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview {{ active(['config']) }}">
                    <a href="#">
                        <span>Pagseguro</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ active('config') }}">
                            <a href="{{ route('backend.config.create') }}">Criar Botão Pagseguro</a>
                        </li>
                    </ul>
                </li>

                <li class="header">Configurações do Sistema</li>
                <li class="treeview {{ active(['roles', 'permissions']) }}">
                    <a href="#">
                        <span>Níveis de Acesso</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ active('roles') }}">
                            <a href="{{ route('backend.roles.index') }}">Perfis de Acesso</a>
                        </li>
                        <li class="{{ active('permissions') }}">
                            <a href="{{ route('backend.permissions.index') }}">Permissões de Acesso</a>
                        </li>
                    </ul>
                </li>
            @endcan
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>