<?php
include ("header.php");
?>
<!--index.css-->
<link rel="stylesheet" href="css/overview.css">
<script src="js/overview.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!--body-->
    <div class="main-content">
		<div class="widget">
                <!--title-->
		        <div class="title" id="analyticTitle">Current Month Analytic
                </div>
                
                <!--charts-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div id="columnchart_values"  class="chart" ></div>
                        </div>
                        <div class="col-md-6">
                            <div id="piechart" class="chart" ></div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="widget">
              <div class="title">Monthly Overview</div>
              <div id="curve_chart" class="chart"></div>
		</div>     
    </div>
<?php
include ("footer.php");
?>
    
<!--stacked bar chart-->    
<script>
    initValues();

    function initValues(){
        $.ajax({
        type: 'GET',
        contentType: 'application/json',
        url: './api/getChartData.php?userId=' + user_id,
        dataType: "json",
        //data:  FormToJSON($('#form-banner_add')),
        success: function(result, textStatus){
          if(result['status'] == "success"){
              console.log(result.data);
              initChartData2(result.data.chart2);
              initChartData1(result.data.chart1);
              initChartData3(result.data.chart3);
              populateChart();

          }else{
            console.log(result['message']);
          }
        },
        error: function(textStatus){
          console.log(textStatus);
        }
      });
    }
    function initChartData2(data){
        chart2Data = [
            ['Category', 'Costs per Month']
        ];
        for(var i = 0; i < data.length; i++){
            chart2Data.push([data[i].description, parseInt(data[i].total)]);
        }
        console.log(chart2Data);
    }
    function initChartData1(data){
        chart1Data = [
            ['Month', 'Fixed Expense', 'Variable Costs', 'Saving', 'Goal','Rest']
        ];
        var temp = [];
        
        temp.push(data['currmonth']);
        temp.push(data['totalexpenses']);
        temp.push(data['totalvariable']);
        temp.push(data['totalsaving']);
        temp.push(data['totalgoal']);
        temp.push(data['totalincome'] - (data['totalgoal']+data['totalsaving']+data['totalvariable']+data['totalexpenses']));
        
        
        
        
        

        chart1Data.push(temp);
        console.log(chart1Data);
    }
    function initChartData3(data){
        chart3Data = [
            ['Month','Expenses']
        ];
        for(var i = 0; i < data.length; i++){
            chart3Data.push([data[i].date, parseInt(data[i].amount)]);
        }
        console.log(chart3Data);
    }


function populateChart(){
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart1);
    google.charts.setOnLoadCallback(drawChart2);
    google.charts.setOnLoadCallback(drawChart3);

    
    $(window).resize(function(){
        drawChart1();
        drawChart2();
        drawChart3();
    });
}

      






    var chart1Data = [
            ['Month', 'Fixed Expense', 'Variable Costs', 'Saving', 'Goal','Rest'],
            ['Nov', 10, 24, 0, 32,20]
          ];

    var chart2Data = [
          ['Category', 'Costs per Month'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ];

    var chart3Data = [
          ['Month','Expenses'],
          ['Dec 2016', 400],
          ['Jan 2017', 400],
          ['Feb', 460],
          ['March', 1120],
          ['April', 540],
          ['May', 400],
          ['June', 460],
          ['July', 1120],
          ['Aug', 540],
        ];







    function drawChart1() {
        var data = google.visualization.arrayToDataTable(chart1Data);
        var view = new google.visualization.DataView(data);
        view.setColumns([0,1,2,3,4,5]);
        var options = {
            legend: { position: 'top', maxLines: 3 },
            bar: { groupWidth: '75%' },
            isStacked: true,
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }


      function drawChart2() {
        var data = google.visualization.arrayToDataTable(chart2Data);
        var options = {
          title: 'Costs by Category'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }

      function drawChart3() {
        var data = google.visualization.arrayToDataTable(chart3Data);
        var options = {
          title: 'Monthly Expenses',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);
      }
      
</script>