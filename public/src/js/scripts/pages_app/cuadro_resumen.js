
//etapas de vida
var EtapasVidas = [];
var EVMasculino = [];
var EVFemenino = [];
var EVTotal = [];
//end etapas de vida
//Tiempo Residencia
var TiempRes = [];
var TRSi = [];
var TRNo = [];
var TRTotal = [];
//End Riempo Residencia
var TIEMPO_ESS_CERCANO=[];
var TIEMPO_ESS_TOTAL=[];

var MEDIO_TRANSPORTE=[];
var MEDIO_TRANS_TOTAL=[];

var ITEMS=[];
var CANT_ITEMS=[];

$("#btnEtapaVida").on("click",function (e) {
    e.preventDefault();
    if ($('#Localidades :selected').length>10) {    
      alert("Solo se permite seleccionar 10 Localidades");
    }

      e.preventDefault();
      ds=$("#frmLocalidades").serialize();

      EtapasVidas = [];
      EVMasculino = [];
      EVFemenino = [];
      EVTotal = [];

      TiempRes = [];
      TRSi = [];
      TRNo = [];
      TRTotal = [];
      
      TIEMPO_ESS_CERCANO=[];
      TIEMPO_ESS_TOTAL=[];

      MEDIO_TRANSPORTE=[];
      MEDIO_TRANS_TOTAL=[];
      
      $.ajax({
          type: "POST",
          url: "CuadroEtapaVida",
          data: ds,
          dataType: "json",
          success: function (response) {
              $("#DTEtapaVida tbody").html("");
              $("#DTFF_TiempRes tbody").html("");
              $("#DTFF_TiempoEESSCercano tbody").html("");
              $("#DTFF_MedioTransporte tbody").html("");
              
              
            //CUADRO ETAPA DE VIDA
            $.each(response.ETAPA, function (index, item) {
              $("#DTEtapaVida tbody").append('<tr>\
                  <td style="font-size: 11px;">'+ item.ETAPA_VIDA+'</td>\
                  <td style="font-size: 11px;">'+ item.MASCULINO+'</td>\
                  <td style="font-size: 11px;">'+ item.FEMENINO+'</td>\
                  <td style="font-size: 11px;">'+ item.TOTAL+'</td>\
                  </tr>'
              );
              EtapasVidas.push(item.ETAPA_VIDA);
              EVMasculino.push(item.MASCULINO);
              EVFemenino.push(item.FEMENINO);
              EVTotal.push(item.TOTAL);
            });
            //END CUADRO ETAPA DE VIDA
            
            //CUADRO TIEMPO_RESIDENCIA
            $.each(response.FF_TIEMPO_RES, function (index, item) {
              $("#DTFF_TiempRes tbody").append('<tr>\
                  <td style="font-size: 11px;">'+ item.TIEMPO_RESIDENCIA+'</td>\
                  <td style="font-size: 11px;">'+ item.SI+'</td>\
                  <td style="font-size: 11px;">'+ item.NO+'</td>\
                  <td style="font-size: 11px;">'+ item.TOTAL+'</td>\
                  </tr>'
              );

              TiempRes.push(item.TIEMPO_RESIDENCIA);
              TRSi.push(item.SI);
              TRNo.push(item.NO);
              TRTotal.push(item.TOTAL);
            });
            //END CUADRO TIEMPO_RESIDENCIA

            //CUADRO TIEMPO EESS MAS CERCANO
            $.each(response.ESS_CERCANO, function (index, item) { 
              $("#DTFF_TiempoEESSCercano tbody").append('<tr>\
                <td style="font-size: 11px;">'+ item.RANGO_TIEMPO +'</td>\
                <td style="font-size: 11px;">'+ item.TOTAL+'</td>\
              </tr>'
              );
              TIEMPO_ESS_CERCANO.push(item.RANGO_TIEMPO);
              TIEMPO_ESS_TOTAL.push(item.TOTAL);
            });

            
            //END CUADRO TIEMPO EESS MAS CERCANO

             //CUADRO MEDIO TRANSPORTE MAS USADO
             $.each(response.TRANS_MAS_USADO, function (index, item) { 
              
              $("#DTFF_MedioTransporte tbody").append('<tr>\
                <td style="font-size: 11px;">'+ item.MEDIO_TRANSPORTE +'</td>\
                <td style="font-size: 11px;">'+ item.TOTAL+'</td>\
              </tr>'
              );
              MEDIO_TRANSPORTE.push(item.MEDIO_TRANSPORTE);
              MEDIO_TRANS_TOTAL.push(item.TOTAL);
            });
            //END MEDIO TRANSPORTE MAS USADO

            //TODAS LAS FUNCIONES PARA  REALIZAR LOS GRÁFICOS
            PoblacionEtapaVida();
            MultiFam_TiempRes();
            TiempoESSCercano();
            TransporteMasUsado();
          }
      });
    
})

$("#FiltrarDinamico").on("click",function (e){
  e.preventDefault();
    if ($('#Localidades :selected').length>10) {    
      alert("Solo se permite seleccionar 10 Localidades");
    }
      e.preventDefault();
      ds=$("#frmLocalidades2").serialize();
      ITEMS=[];
      CANT_ITEMS=[];
      
      $.ajax({
          type: "POST",
          url: "CuadroDinamico",
          data: ds,
          dataType: "json",
          success: function (response) {
              $("#DTFF_PorItem tbody").html("");
            //CUADRO DINAMICO
            $.each(response.ETAPA, function (index, item) {
              $("#DTFF_PorItem tbody").append('<tr>\
                  <td style="font-size: 11px;">'+ item.NOMBRE_ITEM+'</td>\
                  <td style="font-size: 11px;">'+ item.CANTIDAD+'</td>\
                  </tr>'
              );
              ITEMS.push(item.NOMBRE_ITEM);
              CANT_ITEMS.push(item.CANTIDAD);
            });
            //END CUADRO DINAMICO
            // CuadroDinamico();
          }
      });
});


function PoblacionEtapaVida(){ 
  var options = {
    series: [{
            name:'MASCULINO',
            data: EVMasculino,        
        },
        {
            name:'FEMENINO',
            data: EVFemenino,
        },
        {
          name:'TOTAL',
          data: EVTotal,
        },
    ],
    
    chart: {
    type: 'bar',
    height: 400
  },

  plotOptions: {
    bar: {
      horizontal: true,
      dataLabels: {
        position: 'top',
      },
    }
  },
  dataLabels: {
    enabled: true,
    offsetX: -6,
    style: {
      fontSize: '12px',
      colors: ['#fff']
    }
  },
  stroke: {
    show: true,
    width: 1,
    colors: ['#fff']
  },
  tooltip: {
    shared: true,
    intersect: false
  },
  xaxis: {
    categories: EtapasVidas,
  },

  };
  var chart = new ApexCharts(document.querySelector("#myChartEtapaVida"), options);
  chart.render();
  window.dispatchEvent(new Event('resize'))
}

function MultiFam_TiempRes(){
  var options = {
    series: [{
            name:'MULTIFAMILIAR(SI)',
            data: TRSi,        
        },
        {
            name:'MULTIFAMILIAR(NO)',
            data: TRNo,
        },
        {
          name:'TOTAL',
          data: TRTotal,
        },
    ],
    
    chart: {
    type: 'bar',
    height: 800
  },

  plotOptions: {
    bar: {
      horizontal: true,
      dataLabels: {
        position: 'top',
      },
    }
  },
  dataLabels: {
    enabled: true,
    offsetX: -6,
    style: {
      fontSize: '12px',
      colors: ['#fff']
    }
  },
  stroke: {
    show: true,
    width: 1,
    colors: ['#fff']
  },
  tooltip: {
    shared: true,
    intersect: false
  },
  xaxis: {
    categories: TiempRes,
  },

  };
  var chart = new ApexCharts(document.querySelector("#myChartFF_TiempRes"), options);
  chart.render();
  window.dispatchEvent(new Event('resize'))
}

function TiempoESSCercano(){
  var options = {
    series: TIEMPO_ESS_TOTAL,
    labels: TIEMPO_ESS_CERCANO,
    chart: {
    type: 'donut',
  },
  responsive: [{
    breakpoint: 480,
    options: {
      chart: {
        width: 200
      },
      legend: {
        position: 'bottom'
      }
    }
  }]
  };
  var chart = new ApexCharts(document.querySelector("#myChartFF_TiempEESSCercano"), options);
  chart.render();
  window.dispatchEvent(new Event('resize'))

}

function TransporteMasUsado(){
  var options = {
    series: [{
    name: 'Servings',
    data: MEDIO_TRANS_TOTAL
  }],
    annotations: {
    points: [{
      x: 'Bananas',
      seriesIndex: 0,
      label: {
        borderColor: '#775DD0',
        offsetY: 0,
        style: {
          color: '#fff',
          background: '#775DD0',
        },
        text: 'Bananas are good',
      }
    }]
  },
  chart: {
    height: 350,
    type: 'bar',
  },
  plotOptions: {
    bar: {
      borderRadius: 10,
      columnWidth: '50%',
    }
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    width: 2
  },
  
  grid: {
    row: {
      colors: ['#fff', '#f2f2f2']
    }
  },
  xaxis: {
    labels: {
      rotate: -45
    },
    categories: MEDIO_TRANSPORTE,
    tickPlacement: 'on'
  },
  yaxis: {
    title: {
      text: 'Cantidad',
    },
  },
  fill: {
    type: 'gradient',
    gradient: {
      shade: 'light',
      type: "horizontal",
      shadeIntensity: 0.25,
      gradientToColors: undefined,
      inverseColors: true,
      opacityFrom: 0.85,
      opacityTo: 0.85,
      stops: [50, 0, 100]
    },
  }
  };

  var chart = new ApexCharts(document.querySelector("#myChartFF_MedioTransporte"), options);
  chart.render();
  window.dispatchEvent(new Event('resize'))

}

function GraficoDinamico(){

}

