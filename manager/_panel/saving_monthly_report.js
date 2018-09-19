function getSavingMonthlyReport(url){

  $.getJSON(url, function (data) {

      $('#saving_monthly_report').highcharts({
          chart: {
              zoomType: 'x'
          },credits: {
            enabled: false
          },
          title: {
              text: '2018'
          },
          xAxis: {
              type: 'category'
          },
          yAxis: {
              title: {
                  text: 'R$'
              }
          },
          legend: {
              enabled: true
          },
          tooltip: {
            shared: true
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
              type: 'column',
              name: 'Economia',
              data: data.saved,
              color: '#1abc9c'
          },
          {
            name: "Conta de luz da concessionária",
            type: "spline",
            data: data.full,
            color: '#e67e22'
          }]
      });
  });
};
