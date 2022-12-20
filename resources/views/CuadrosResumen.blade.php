
@extends('layouts.base')

@section('content')
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">CARACTERÍSTICAS DE LOS MIEMBROS DE LA FAMILIA</h5>
            <form id="frmLocalidades2">
                <div class="row">               
                    <div class="col-md-3">
                        <label for="Item">Seleccione Item</label>
                        <select name="Item" id="Item" class="select2">
                            <option value="EtniaRaza">EtniaRaza</option>
                            <option value="IdiomaPredominante">IdiomaPredominante</option>
                            <option value="Religion">Religion</option>
                            <option value="GradoInstruccion">GradoInstruccion</option>
                            <option value="EstadoCivil">EstadoCivil</option>
                            <option value="Ocupacion">Ocupacion</option>
                            <option value="SeguroSalud">SeguroSalud</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Seleccione Localidades (Máximo 10)</label>
                        <select name="Localidades2[]" id="Localidades2" class="select2" multiple="multiple">
                            @foreach ($localidades as $item)
                                <option value="{{$item->Localidad}}">{{$item->Localidad}}</option>    
                            @endforeach
                        </select>                
                    </div>
                    
                    <div class="col-md-3">
                        <br>
                        <button class="btn btn-danger" id="FiltrarDinamico"><i data-feather='search'></i>Filtrar</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-datatable">
                        <table id="DTFF_PorItem" class="table table-responsive">
                            <thead>
                                <tr>
                                    <th style="font-size: 10px;">NOMBRE DEL ITEM</th>
                                    <th style="font-size: 10px;">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <label for="">Seleccione Localidades (Máximo 10)</label>
            <form id="frmLocalidades">
                {{--  action="{{route('Cuadro.EtapaVida')}}" method="POST" --}}
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <select name="Localidades[]" id="Localidades" class="select2" multiple="multiple">
                            @foreach ($localidades as $item)
                                <option value="{{$item->Localidad}}">{{$item->Localidad}}</option>    
                            @endforeach
                        </select>                
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-outline-danger" name="btnEtapaVida" id="btnEtapaVida"><i data-feather='search'></i>Filtrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

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

    <div class="card">
        <div class="card-header border-bottom" style="align-self: center;">
            <h5 class="card-title">TIEMPO AL ESTABLECIMIENTO DE SALUD MÁS CERCANO</h5>
        </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6" style="align-self: center;">
                        <div class="card-datatable">
                            <table id="DTFF_TiempoEESSCercano" class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th style="font-size: 10px;">RANGO MINUTOS</th>
                                        <th style="font-size: 10px;">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>
                <div class="col-md-6">
                    <div id="myChartFF_TiempEESSCercano">
                        
                    </div>	
                </div>
            </div>
        </div>

    </div>

    <div class="card">
        <div class="card-header border-bottom" style="align-self: center;">
            <h5 class="card-title">MEDIOS DE TRANSPORTES USADOS</h5>
        </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6" style="align-self: center;">
                        <div class="card-datatable">
                            <table id="DTFF_MedioTransporte" class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th style="font-size: 10px;">MEDIO DE TRANSPORTE</th>
                                        <th style="font-size: 10px;">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>
                <div class="col-md-6">
                    <div id="myChartFF_MedioTransporte">
                        
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
