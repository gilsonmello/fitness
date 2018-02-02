<table cellspacing="0" class="table table-bordered table-hover data-table">
    <thead>
        <tr>
            <th>{!! trans('strings.title') !!}</th>
            <th>{!! trans('strings.slug') !!}</th>
            <th>{!! trans('strings.created_at') !!}</th>
            <th>{!! trans('strings.actions') !!}</th>
        </tr>
    </thead>
    <tbody>
        @forelse($categories as $key => $value)
            <tr>
                <td>{!! $value->name !!}</td>      
                <td>{!! $value->slug !!}</td>                                
                <td>{!! format_datetimebr($value->created_at) !!}</td>
                <th>{!! $value->action_buttons !!}</th>
            </tr>
        @empty
            Vazio
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <th>{!! trans('strings.title') !!}</th>
            <th>{!! trans('strings.slug') !!}</th>
            <th>{!! trans('strings.created_at') !!}</th>
            <th>{!! trans('strings.actions') !!}</th>
        </tr>
    </tfoot>
</table>           
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <div class="pull-left">
            <br>
            <label>{{ trans('menus.categories.total') }}.: {!! $categories->total() !!}</label>
        </div>
        <div class="pull-right">
            {!! $categories->render() !!}
        </div>
    </div>
</div>