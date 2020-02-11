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


var dep1 =[];
var dep2=[];
var dep3=[];
var dep4=[];
var dep5=[];
var dep6=[];
var dep7=[];
var meses;

$.getJSON('http://localhost/tcc/models/ClassRelatorios/get_reaberto_por_departamento/4',function(resp){
  dep4 = ret(resp);  
});
$.getJSON('http://localhost/tcc/models/ClassRelatorios/meses/param',function(resp){
 meses = resp;
});

$.getJSON('http://localhost/tcc/models/ClassRelatorios/get_reaberto_por_departamento/1',function(resp){
  dep1 = ret(resp);  
});

$.getJSON('http://localhost/tcc/models/ClassRelatorios/get_reaberto_por_departamento/2',function(resp){
  dep2 = ret(resp);  
});

$.getJSON('http://localhost/tcc/models/ClassRelatorios/get_reaberto_por_departamento/3',function(resp){
  dep3 = ret(resp);  
});

$.getJSON('http://localhost/tcc/models/ClassRelatorios/get_reaberto_por_departamento/5',function(resp){
  dep5 = ret(resp);  
});

$.getJSON('http://localhost/tcc/models/ClassRelatorios/get_reaberto_por_departamento/6',function(resp){
  dep6 = ret(resp);  
});

$.getJSON('http://localhost/tcc/models/ClassRelatorios/get_reaberto_por_departamento/7',function(resp){
  dep7 = ret(resp);  
});





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



// Area Chart Example

$.getJSON('http://localhost/tcc/models/ClassRelatorios/quantidade_reaberto/param',function(resposta){
    
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  
  data: {
      
    labels: meses,
    datasets: [{
      label: "Serviços gerais",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: dep1,
      fill: false,
    },
{
      label: "Hidráulica",
      lineTension: 0.3,
      backgroundColor: "rgba(237, 42, 42, 0.05)",
      borderColor: "rgba(237, 42, 42, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(237, 42, 42, 1)",
      pointBorderColor: "rgba(237, 42, 42, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(237, 42, 42, 1)",
      pointHoverBorderColor: "rgba(237, 42, 42, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: dep2,
      fill: false,
    },
    
    {
      label: "Elétrica",
      lineTension: 0.3,
      backgroundColor: "rgba(90, 229, 35, 0.05)",
      borderColor: "rgba(90, 229, 35, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(90, 229, 35, 1)",
      pointBorderColor: "rgba(90, 229, 35, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(90, 229, 35, 1)",
      pointHoverBorderColor: "rgba(90, 229, 35, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: dep3,
      fill: false,
    },
    {
      label: "Manutenção predial",
      lineTension: 0.3,
      backgroundColor: "rgba(243, 238, 77, 0.05)",
      borderColor: "rgba(243, 238, 77, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(243, 238, 77, 1)",
      pointBorderColor: "rgba(243, 238, 77, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(243, 238, 77, 1)",
      pointHoverBorderColor: "rgba(243, 238, 77, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: dep4,
      fill: false,
    },
    {
      label: "Obra",
      lineTension: 0.3,
      backgroundColor: "rgba(233, 5, 191, 0.05)",
      borderColor: "rgba(233, 5, 191, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(233, 5, 191, 1)",
      pointBorderColor: "rgba(233, 5, 191, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(233, 5, 191, 1)",
      pointHoverBorderColor: "rgba(233, 5, 191, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: dep5,
      fill: false,
    },
    {
      label: "Segurança patrimonial",
      lineTension: 0.3,
      backgroundColor: "rgba(88, 91, 110, 0.05)",
      borderColor: "rgba(88, 91, 110, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(88, 91, 110, 1)",
      pointBorderColor: "rgba(88, 91, 110, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(88, 91, 110, 1)",
      pointHoverBorderColor: "rgba(88, 91, 110, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: dep6,
      fill: false,
    },
    {
      label: "Bombeiro civil",
      lineTension: 0.3,
      backgroundColor: "rgba(117, 227, 244, 0.05)",
      borderColor: "rgba(117, 227, 244, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(117, 227, 244, 1)",
      pointBorderColor: "rgba(117, 227, 244, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(117, 227, 244, 1)",
      pointHoverBorderColor: "rgba(117, 227, 244, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: dep7,
      fill: false,
    }
    
],
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
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '' + number_format(value);
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
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': =' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

});