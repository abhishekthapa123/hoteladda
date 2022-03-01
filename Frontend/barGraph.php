<html>
  <head>
      <?php 
        $hid = $_GET['hid'];
        include('connect.php');

    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Room Type', 'Persons'],
          <?php
            $sql = "SELECT * FROM graph where hid=$hid";
            $res = mysqli_query($conn,$sql);
            while($data = mysqli_fetch_array($res))
            {
          ?>
          ['Single Bed', <?php echo $data['Single_Bed']; ?>],
          ['Double Bed', <?php echo $data['Double_Bed'];?>]

          <?php } ?>
          
        ]);

        var options = {
          chart: {
            title: 'Title will be here ',
         
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>
