<?php
  include "connect.php";
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Graphs</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
      var data = google.visualization.arrayToDataTable([
      ['Values','Features']
      <?php
			  $sql = "SELECT * from `seller_1`";
			  $result = $conn->query($sql);
			  while($row = $result->fetch_assoc()){
      ?>
        ,[" <?php echo $row['Features'] ?> ", <?php echo $row['Values'] ?> ]
       <?php 
        }
			 ?>
       ]);

        var options = {
        title: 'Rating Out of 5 of seller_1',
          pieHole: 0.5,
                  pieSliceTextStyle: {
                    color: 'black',
                  },
                  legend: 'none'
        };
        var chart = new google.charts.Bar(document.getElementById("columnchart12"));
        chart.draw(data,options);
        }

    </script>

</head>
<body>
  <div class="container">
         <div id="columnchart12" style="border: 1px solid #ccc"></div>
         <div id="columnchart13" style="border: 1px solid #ccc"></div>
         <div id="columnchart14" style="border: 1px solid #ccc"></div>
  </div>
</body>
</html>
