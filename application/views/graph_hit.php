<html>
    <head>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript">

$(function () {
var chart;
function requestdata() {
        gethit();
        getmiss();
        setTimeout(requestdata, 5000);
}

function gethit() {
        $.get("/report/updategraph/hits/<?php echo $host; ?>",function (inc) {
              series = chart.series[0];
              var x_hit = (new Date()).getTime();
              var y_hit = parseInt(inc);
              series.addPoint([x_hit, y_hit], true, true);
        });  
}

function getmiss() {
        $.get("/report/updategraph/miss/<?php echo $host; ?>",function (inc) {
              series1 = chart.series[1];
              var x_miss = (new Date()).getTime();
              var y_miss = parseInt(inc);
              series1.addPoint([x_miss, y_miss], true, true);
        });
}
    
    
    $(document).ready(function() {
        Highcharts.setOptions({
            global: {
                useUTC: false
            }
        });
        chart = new Highcharts.Chart({
            chart: {
                type: 'spline',
                height: 250,
                renderTo: 'container-hit',
                animation: Highcharts.svg, // don't animate in old IE
                marginRight: 10,
                events: {
                    load: requestdata
                }
            },
            plotOptions: {
                series: {
                    marker: {
                        enabled: false
                    }
                }
            },
            title: {
                text: ''
            },
            xAxis: {
                type: 'datetime',
                tickPixelInterval: 150
            },
            yAxis: {
                title: {
                    text: 'Hits/s'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) +'<br/>'+
                        Highcharts.numberFormat(this.y, 2);
                }
            },
            legend: {
                enabled: true
            },
            exporting: {
                enabled: false
            },
                    
            series: [{
                name: 'Hits',
                data: (function() {
                    // generate an array of random data
                    var data = [],
                        time = (new Date()).getTime(),
                        i;
    
                    for (i = -10; i <= 0; i++) {
                        data.push({
                            x: time + i * 1000,
                            y: 0
                        });
                    }
                    return data;
                })()
            },{
                name: 'Miss',
                data: (function() {
                    // generate an array of random data
                    var data1 = [],
                        time = (new Date()).getTime(),
                        i;
    
                    for (i = -10; i <= 0; i++) {
                        data1.push({
                            x: time + i * 1000,
                            y: 0
                        });
                    }
                    return data1;
                })()                
                
            }]           
        });
    });
    
});


        </script>
</head>
<div id="container-hit" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
</body>
</html>
