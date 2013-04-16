<html>
    <head>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

        <script type="text/javascript">
            
            
$(function () {
var chart;
function getrequest() {
        $.get("/report/updategraph/request/<?php echo $host; ?>", function (inc){
            var x = (new Date()).getTime(),
            y = parseInt(inc);
            chart.series[0].addPoint([x, y], true, true);
        });
        setTimeout(getrequest, 5000);
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
                renderTo: 'container-request',
                animation: Highcharts.svg, // don't animate in old IE
                marginRight: 10,
                events: {
                    load: getrequest
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
                    text: 'Request/s'
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
                name: 'Request',
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
            }]
        });
    });    
});


        </script>
</head>
<div id="container-request" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
</body>
</html>
