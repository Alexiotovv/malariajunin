
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

$("#btnEtapaVida").on("click",function (e) {
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

      $.ajax({
          type: "POST",
          url: "CuadroEtapaVida",
          data: ds,
          dataType: "json",
          success: function (response) {
              $("#DTEtapaVida tbody").html("");
              $("#DTFF_TiempRes tbody").html("");
              

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

              PoblacionEtapaVida();
              MultiFam_TiempRes();
                
          }
      });
    
})


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
}