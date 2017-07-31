{!! Form::open(['route' => ['backend.evaluations.update_riscos_coronarios', $evaluation->id], 'class' => '', 'role' => 'form', 'method' => 'post', 'id' => 'update_riscos_coronarios']) !!}
<br>
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <?php $sexo_idade = [
            0 => 'Homens 20 a 30 anos',
            1 => 'Homens 31 a 40 anos',
            2 => 'Homens 41 a 45 anos',
            3 => 'Homens 46 a 50 anos',
            5 => 'Homens 51 a 60 anos',
            6 => '+ de 60 anos',
        ];?>
        {!! Form::label('sexo_idade', 'Sexo/Idade', ['class' => '']) !!}
        <div class="form-group">
            {!! Form::select('sexo_idade', $sexo_idade, NULL, ['class' => 'select2 form-control', 'placeholder' => 'Sexo/Idade']) !!}
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <?php $fumo = [
                0 => 'Nunca Fumou',
                1 => 'Ex-fumante ou fumante charuto / cachimbo (sem inalar)',
                2 => 'Menos de 10 cigarros por dia',
                8 => '10-20 cigarros por dia',
                9 => '21-30 cigarros por dia',
                10 => '31-40 cigarros por dia',
        ];?>
        {!! Form::label('fumo', 'Fumo', ['class' => '']) !!}
        <div class="form-group">
            {!! Form::select('fumo', $fumo, NULL, ['class' => 'select2 form-control', 'placeholder' => 'Fumo']) !!}
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-md-12 col-xs-12">
        <?php $peso = [
                0 => 'Inferior em 5Kg ao peso normal',
                1 => 'Peso normal',
                2 => 'Acima do peso (5-10Kg)',
                3=> 'Acima do peso (11-19Kg)',
                7 => 'Acima do peso (20-25Kg)',
                8 => 'Acima do peso (26Kg ou mais)',
        ];?>
        <div class="form-group">
            {!! Form::label('peso', trans('strings.weight'), ['class' => '']) !!}
            {!! Form::select('peso', $peso, NULL, ['class' => 'select2 form-control', 'placeholder' => trans('strings.weight')]) !!}
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-md-12 col-xs-12">
        <?php $atividade_fisica = [
                0 => 'Atividade profissional e esportiva intensa',
                1 => 'Atividade profissional e esportiva moderada',
                2 => 'Atividade profissional e esportiva leve',
                3 => 'Atividade profissional sedentária e esportiva moderada',
                4 => 'Atividade profissional sedentária e pouca esportiva',
                6 => 'Não Pratica',
        ];?>
        <div class="form-group">
            {!! Form::label('atividade_fisica', 'Atividade Física', ['class' => '']) !!}
            {!! Form::select('atividade_fisica', $atividade_fisica, NULL, ['class' => 'select2 form-control', 'placeholder' => 'Atividade Física']) !!}
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-md-12 col-xs-12">
        <?php $historico_familiar = [
                0 => 'Ausente',
                1 => 'Pai ou mãe com mais de 60 anos com doença coronariana',
                2 => 'Pai e mãe com mais de 60 anos com doença coronariana',
                3 => 'Pai ou mãe com menos de 60 anos com doença coronariana',
                7 => 'Pai e mãe com menos de 60 anos com doença coronariana',
                8 => 'Pai e mãe e irmão de ambos com doença coronariana',
        ];?>
        <div class="form-group">
            {!! Form::label('historico_familiar', 'Histórico Familiar', ['class' => '']) !!}
            {!! Form::select('historico_familiar', $historico_familiar, NULL, ['class' => 'select2 form-control', 'placeholder' => 'Histórico Familiar']) !!}
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-md-12 col-xs-12">
        <?php $pressao_arterial_sistolica = [
                0 => '110-119 mmHg',
                1 => '120-130 mmHg',
                2 => '131-140 mmHg',
                6 => '141-160 mmHg',
                9 => '161-180 mmHg',
                10 => '180 mmHg ou mais',
        ];?>
        <div class="form-group">
            {!! Form::label('pressao_arterial_sistolica', 'Pressão Arterial Sistólica', ['class' => '']) !!}
            {!! Form::select('pressao_arterial_sistolica', $pressao_arterial_sistolica, NULL, ['class' => 'select2 form-control', 'placeholder' => 'Pressão Arterial Sistólica']) !!}
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-md-12 col-xs-12">
        <?php $glicemia = [
                0 => 'Jejum abaixo de 80',
                1 => 'Diabético na família',
                2 => 'Jejum = 100 1ª hora = 160',
                5 => 'Jejum = 120 1ª hora = 160',
                6 => 'Diabetes tratado',
                10 => 'Diabetes não controlado',
        ];?>
        <div class="form-group">
            {!! Form::label('glicemia', 'Glicemia', ['class' => '']) !!}
            {!! Form::select('glicemia', $glicemia, NULL, ['class' => 'select2 form-control', 'placeholder' => 'Glicemia']) !!}
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-md-12 col-xs-12">
        <?php $colesterol = [
                0 => 'Abaixo de 180',
                1 => '181-200',
                2 => '201-220',
                7 => '221-249',
                9 => '250-280',
                10 => '281-300',
        ];?>
        <div class="form-group">
            {!! Form::label('colesterol', 'Colesterol', ['class' => '']) !!}
            {!! Form::select('colesterol', $colesterol, NULL, ['class' => 'select2 form-control', 'placeholder' => 'Colesterol']) !!}
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="pull-right">
            <input type="submit" class="btn btn-success" value="{{ trans('strings.save_button') }}" />
        </div>
    </div>
</div>
<div class="clearfix"></div>
{!! Form::close() !!}
<br>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="pull-left">
            <div class="form-group">
                {!! Form::label('value', trans('strings.value'), ['class' => '']) !!}
                <input type="text" class="form-control" value="{{ trans('strings.value') }}" />
            </div>
        </div>
    </div>
</div>
<br>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Níveis de Risco</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    {!! Form::label(NULL, 'Baixo 0 a 8', ['class' => '']) !!}
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    {!! Form::label(NULL, 'Potencial 9 a 17', ['class' => '']) !!}
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    {!! Form::label(NULL, 'Moderado 22', ['class' => '']) !!}
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    {!! Form::label(NULL, 'Alto 41 a 59', ['class' => '']) !!}
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    {!! Form::label(NULL, 'Muito alto 60 a 67', ['class' => '']) !!}
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    {!! Form::label(NULL, 'Máximo 68', ['class' => '']) !!}
                </div>
            </div>
        </div>
    </div>
</div>