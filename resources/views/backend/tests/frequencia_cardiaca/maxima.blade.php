<!-- /.box-header -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title" style="display: block" data-widget="collapse">Máxima</h3>
        {{--<div class="box-tools pull-right">
            <button id="add-test-frequencia-cardiaca" type="button" class="btn btn-box-tool">
                <i class="fa fa-plus"></i>
                Adicionar Teste
            </button>
        </div>--}}
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    {!! Form::label('protocol', trans('strings.protocol'), []) !!}
                    {!! Form::select('protocol', $protocols->pluck('name', 'id')->all(), null, ['id' => 'protocol', 'witdh' => '100%', 'class' => 'protocol form-control', 'data-placeholder' => trans('strings.protocol'), 'multiple' => 'multiple']) !!}
                </div>
            </div>
        </div>
        {!! Form::open(['route' =>['backend.tests.save_frequencia_cardiaca_maxima', $test->id], 'id' => 'save-frequencia-cardiaca-maxima', 'role' => 'form', 'method' => 'post']) !!}

                 {{--<div class="row" id="btn-save-frequencia-cardiaca-maxima">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="pull-right">
                            <input type="submit" class="btn btn-xs btn-primary" value="{{ trans('strings.save_button') }}" />
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>--}}
        {!! Form::close() !!}
    </div>
</div>