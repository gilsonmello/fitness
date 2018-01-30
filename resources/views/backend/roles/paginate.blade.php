<table cellspacing="0" class="table table-bordered table-hover data-table">
    <thead>
    <tr>
        <th class="text-center">{!! trans('strings.name') !!}</th>
        <th class="text-center">{!! trans('strings.label') !!}</th>
        <th class="text-center">{!! trans('strings.is_active') !!}</th>
        <th class="text-center">{!! trans('strings.created_at') !!}</th>
        <th class="text-center">{!! trans('strings.actions') !!}</th>
    </tr>
    </thead>
    <tbody>
    @forelse($roles as $value)
        <tr>
            <td class="text-center">{!! $value->name !!}</td>
            <td class="text-center">{!! $value->label !!}</td>
            <td class="text-center">
                @if($value->is_active == 1)
                    <label class="control-label">
                        <i class="fa fa-check"></i>
                    </label>
                @else
                    <label class="control-label">
                        <i class="fa fa-times-circle-o"></i>
                    </label>
                @endif
            </td>
            <td class="text-center">{!! format_datetimebr($value->created_at) !!}</td>
            <th class="text-center">{!! $value->action_buttons !!}</th>
        </tr>
    @empty
        <tr>
            <td>Não foram encontrados resultados.</td>
        </tr>
    @endforelse
    </tbody>
</table>

<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <div class="pull-left">
            <br>
            <label>{{ trans('menus.roles.total') }}.: {!! $roles->total() !!}</label>
        </div>
        <div class="pull-right">
            {!! $roles->render() !!}
        </div>
    </div>
</div>