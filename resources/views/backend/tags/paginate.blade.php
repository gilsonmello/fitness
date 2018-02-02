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
        @forelse($tags as $key => $value)
            <tr>
                <td>{!! $value->name !!}</td>      
                <td>{!! $value->description !!}</td>                                
                <td>{!! format_datetimebr($value->created_at) !!}</td>
                <th>{!! $value->action_buttons !!}</th>
            </tr>
        @empty
            
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
            <label>{{ trans('menus.tags.total') }}.: {!! $tags->total() !!}</label>
        </div>
        <div class="pull-right">
            {!! $tags->render() !!}
        </div>
    </div>
</div>