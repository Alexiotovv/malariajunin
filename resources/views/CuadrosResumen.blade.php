
@extends('layouts.base')

@section('content')
    
    <label for="">Seleccione Localidades (Máximo 10)</label>
    <form id="frmLocalidades">
        {{-- action="{{route('Cuadro.EtapaVida')}}" method="POST" --}}
        @csrf
        <div class="row">

        
        <div class="col-md-6">
            <select name="Localidades[]" id="Localidades" class="select2" multiple="multiple">
                @foreach ($localidades as $item)
                    <option value="{{$item->Localidad}}">{{$item->Localidad}}</option>    
                @endforeach
            </select>
            <button class="btn btn-outline-danger" name="btnEtapaVida" id="btnEtapaVida"><i data-feather='search'></i>Buscar</button>
        </div>
    </div>
    </form>

    <div class="card">
        <div class="card-header border-bottom" style="align-self: center;">
            <h5 class="card-title">POBLACIÓN POR ETAPA DE VIDA</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6" style="align-self: center;">
                    <div class="card-datatable">
                        <table id="DTEtapaVida" class="table table-responsive">
                            <thead>
                                <tr>
                                    <th style="font-size: 10px;">EtapaVida</th>
                                    <th style="font-size: 10px;">Masculino</th>
                                    <th style="font-size: 10px;">Femenino</th>
                                    <th style="font-size: 10px;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
        
                <div class="col-md-6">
                    <div id="myChartEtapaVida">
                        
                    </div>	
                </div>
            </div>
        </div>

    </div>
    <div class="card">
        <div class="card-header border-bottom" style="align-self: center;">
            <h5 class="card-title">T.RESIDENCIA/V.MULTIFAMILIAR</h5>
        </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6" style="align-self: center;">
                        <div class="card-datatable">
                            <table id="DTFF_TiempRes" class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th style="font-size: 10px;">T.RESIDENCIA</th>
                                        <th style="font-size: 10px;">MULTIFAMILIAR(SI)</th>
                                        <th style="font-size: 10px;">MULTIFAMILIAR(NO)</th>
                                        <th style="font-size: 10px;">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>
                <div class="col-md-6">
                    <div id="myChartFF_TiempRes">
                        
                    </div>	
                </div>
            </div>
        </div>

    </div>
@endsection

@section('extra_js')

    <script>
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });
    </script>
    <script src="../../../src/js/scripts/pages_app/cuadro_resumen.js"></script>


@endsection
