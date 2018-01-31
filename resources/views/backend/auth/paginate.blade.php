<table cellspacing="0" class="table table-bordered table-hover data-table">
    <thead>
        <tr>
            <th>{!! trans('strings.name') !!}</th>
            <th>{!! trans('strings.email') !!}</th>
            <th>{!! trans('strings.birth_date') !!}</th>
            <th>{!! trans('strings.actions') !!}</th>
        </tr>
    </thead>
    <tbody>
        @forelse($users as $value)
            <tr>
                <td>{!! $value->name !!}</td>
                <td>{!! $value->email !!}</td>
                <td>{!! $value->birth_date != null ? format_datebr($value->birth_date) : 'Não Informado' !!}</td>
                <td>{!! $value->action_buttons !!}</td>
            </tr>
        @empty
            
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <th>{!! trans('strings.name') !!}</th>
            <th>{!! trans('strings.email') !!}</th>
            <th>{!! trans('strings.birth_date') !!}</th>
            <th>{!! trans('strings.actions') !!}</th>
        </tr>
    </tfoot>
</table>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <div class="pull-left">
            <br>
            <label>{{ trans('menus.auth.total') }}.: {!! $users->total() !!}</label>
        </div>
        <div class="pull-right">
            {!! $users->render() !!}
        </div>
    </div>
</div>