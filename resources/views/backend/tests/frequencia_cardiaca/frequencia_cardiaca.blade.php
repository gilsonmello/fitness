<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Frequência Cardíaca</h3>
    </div>
    @include('backend.tests.frequencia_cardiaca.maxima')
    @include('backend.tests.frequencia_cardiaca.minima')
    @include('backend.tests.frequencia_cardiaca.reserva')

    <script type="text/javascript">
        var test_id = '{{$test->id}}';
    </script>
</div>





