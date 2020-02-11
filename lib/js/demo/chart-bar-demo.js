// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';


function ret(param){
    var valores = [];
    $.each(param,function(key, val){
       valores.push(val); 
    });
    return valores;
}



function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Example
function chartbar_chamados_departamento(){
   $("#myBarChart").remove();
   $(".chart-bar").append('<canvas class="myBarChart" id="myBarChart"></canvas>');
   
    var periodo = $("#mes-select").val();

$.getJSON('http://localhost/tcc/models/ClassRelatorios/qtd_chamados_por_mes/'+periodo,function(resp){
    var servG = 5;

var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: Object.keys(resp),
    datasets: [{
      label: "",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: ret(resp),
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return ' ' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + 'chamados ' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});
});

}
chartbar_chamados_departamento();
$("#mes-select").change(function(){    
   chartbar_chamados_departamento(); 
});




function chamados_departamento(){
   $("#testeBar").empty();
    var periodo = $("#mes-select").val();
    
$.getJSON('http://localhost/tcc/models/ClassRelatorios/qtd_chamados_por_mes/'+periodo,function(data){
    var total = 0;
    $.each(data,function(key, val){
       total += parseInt(val); 
    });
     parseFloat(((data['BOMBEIRO CIVIL'] * 100) / total).toFixed(2));
    var porServ = parseFloat(((data['SERVIÇOS GERAIS'] * 100) / total).toFixed(2));
    var porHidr = parseFloat(((data['HIDRÁULICA'] * 100) / total).toFixed(2));
    var porElet = parseFloat(((data['ELÉTRICA'] * 100) / total).toFixed(2));
    var porManu = parseFloat(((data['MANUTENÇÃO PREDIAL'] * 100) / total).toFixed(2));
    var porObra = parseFloat(((data['OBRA'] * 100) / total).toFixed(2));
    var porSegu = parseFloat(((data['SEGURANÇA PATRIMONIAL'] * 100) / total).toFixed(2));
    var porBomb = parseFloat(((data['BOMBEIRO CIVIL'] * 100) / total).toFixed(2));
    
var testeBar =  '<h4 class="small font-weight-bold">SERVIÇOS GERAIS <span class="float-right">' + porServ +'%</span></h4>';
    testeBar +=  '<div class="progress mb-4">';
    testeBar +=    '<div class="progress-bar bg-danger" role="progressbar" style="width:' + porServ +'%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>';
    testeBar +=    '</div>';
    
    testeBar +=   '<h4 class="small font-weight-bold">HIDRÁULICA <span class="float-right">' + porHidr +'%</span></h4>';
    testeBar +=   '<div class="progress mb-4">';
    testeBar +=   '<div class="progress-bar bg-warning" role="progressbar" style="width:'+ porHidr +'%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>';
    testeBar +=   '</div>';
    
    testeBar +=    '<h4 class="small font-weight-bold">ELÉTRICA <span class="float-right">'+ porElet +'%</span></h4>';
    testeBar +=    '<div class="progress mb-4">';
    testeBar +=    '<div class="progress-bar" role="progressbar" style="width:' + porElet + '%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>';
    testeBar +=    '</div>';
    
    testeBar +=    '<h4 class="small font-weight-bold">MANUTENÇÃO PREDIAL<span class="float-right">' + porManu + '%</span></h4>';
    testeBar +=    '<div class="progress mb-4">';
    testeBar +=    '<div class="progress-bar bg-info" role="progressbar" style="width: ' + porManu + '%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>';
    testeBar +=    '</div>';
    
    testeBar +=   '<h4 class="small font-weight-bold">OBRA <span class="float-right">' + porObra +'%</span></h4>';
    testeBar +=   '<div class="progress mb-4">';
    testeBar +=   '<div class="progress-bar bg-warning" role="progressbar" style="width:'+ porObra +'%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>';
    testeBar +=   '</div>';
    
    testeBar +=   '<h4 class="small font-weight-bold">SEGURANÇA PATRIMONIAL <span class="float-right">' + porSegu +'%</span></h4>';
    testeBar +=   '<div class="progress mb-4">';
    testeBar +=   '<div class="progress-bar bg-warning" role="progressbar" style="width:'+ porSegu +'%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>';
    testeBar +=   '</div>';
    
    testeBar +=    '<h4 class="small font-weight-bold">BOMBEIRO CIVIL<span class="float-right">' + porBomb + '%</span></h4>';
    testeBar +=    '<div class="progress">';
    testeBar +=    '<div class="progress-bar bg-success" role="progressbar" style="width:' + porBomb + '%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
    testeBar +=    '</div>';
    
$("#testeBar").append(testeBar);
});

}
chamados_departamento();
$("#mes-select").change(function(){    
   chamados_departamento(); 
});