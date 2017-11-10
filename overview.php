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
		        <div class="title" id="analyticTitle">Monthly Analytics 
                    <div class="form-group" id="monthform">
                            <select class="form-control" id="sb-month">
                                <option value="10">2017 Oct</option>
                                <option value="11">2017 Nov</option>
                                <option value="12">2017 Dec</option>
                                <option value="1">2018 Jan</option>
                                <option value="2">2018 Feb</option>
                                <option value="3">2018 March</option>
                                <option value="4">2018 Apr</option>
                                <option value="5">2018 May</option>
                                <option value="6">2018 June</option>
                                <option value="7">2018 July</option>
                                <option value="8">2018 Aug</option>
                                <option value="9">2018 Sep</option>
                                <option value="10">2018 Oct</option>
                                <option value="11">2018 Nov</option>
                                <option value="12">2018 Dec</option>
                            </select>
                    </div>
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
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart1);
    function drawChart1() {
        var data = google.visualization.arrayToDataTable([
            ['Genre', 'Fantasy & Sci Fi', 'Romance', 'Mystery/Crime', 'General',
             'Western', 'Literature', { role: 'annotation' } ],
            ['2010', 10, 24, 20, 32, 18, 5, '']
          ]);
    
          var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
          var options = {
            legend: { position: 'top', maxLines: 3 },
            bar: { groupWidth: '75%' },
            isStacked: true,
          };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
</script>
<!--pie chart-->  
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    
      $(window).resize(function(){
        drawChart1();
        drawChart2();
        drawChart3();
      });
</script>
<!--line graph-->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart3() {
        var data = google.visualization.arrayToDataTable([
          ['Year','Expenses'],
          ['2004', 400],
          ['2005', 460],
          ['2006', 1120],
          ['2007', 540]
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
      
</script>

<style>
    #analyticTitle{
        height:54px !important;
    }
    #monthform{
        float: right;
        width: 110px;
        margin-right: 5px;
    }

    .chart {
      width: 100%; 
      min-height: 450px;
    }
</style>