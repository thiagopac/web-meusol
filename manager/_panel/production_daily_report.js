function getProductionDailyReport(url){

  $.getJSON(url, function (data) {

      $('#production_daily_report').highcharts({
          chart: {
              zoomType: 'x'
          },credits: {
            enabled: false
          },
          title: {
              text: '08/08/2018'
          },
          xAxis: {
              type: 'category'
          },
          yAxis: {
              title: {
                  text: 'kW'
              }
          },
          legend: {
              enabled: false
          },
          plotOptions: {
              area: {
                  fillColor: {
                      linearGradient: {
                          x1: 0,
                          y1: 0,
                          x2: 0,
                          y2: 1
                      },
                      stops: [
                          [0, Highcharts.getOptions().colors[0]],
                          [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                      ]
                  },
                  marker: {
                      radius: 2
                  },
                  lineWidth: 1,
                  states: {
                      hover: {
                          lineWidth: 1
                      }
                  },
                  threshold: null
              }
          },

          series: [{
              type: 'areaspline',
              name: 'Produção kW',
              data: data,
              color: '#34495e'

          }]
      });
  });
};
