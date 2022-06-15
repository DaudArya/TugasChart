<?php include ('koneksiCovid.php') ;
$covid = mysqli_query ($link," select * from tb_penderita") ; 
while ($row = mysqli_fetch_array ($covid) ) {
    $datacovid[] = $row['country'] ;
    $query = mysqli_query ($link, "select * from tb_penderita where id  ='". $row['id']."'");
    $row = $query-> fetch_array () ;
    
	$jumlahdatacovid [] = $row['totalcases'] ;
    $newcase [] = $row['newcases'] ;
    $totaldeath  [] = $row['totaldeaths'] ;
    $newdeath  [] = $row['newdeath'] ;
    $totalsembuh  [] = $row['totalrecover'] ;
    $sembuh  [] = $row['newrecover'] ;
    

}
?>
<!DOCTYPE html>  
<html>
<head>
<title>Grafik Covid</title>
<script type="text/javascript" src="Chart.js"></script>
</head>

<body>
<style type="text/css">
		body{
			font-family: roboto;		}
	</style>
 <div style="width: 1300px ; height: 1300px ;">
		<canvas id="myChart"></canvas>
	</div>
  <script>
   var ctx = document.getElementById("myChart").getContext('2d') ; 
  var myChart = new Chart (ctx, {
    type: 'doughnut',
    data : {
        labels: <?php echo json_encode($datacovid);?>,
            datasets: [{

                label:'Total Death',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: <?php echo json_encode ($totaldeath);?>
            }
            ]
        },
  options:{
    scales:{
        yAxes:[{
            ticks:{
                beginAtZero : true
            }
        }]
    }
   }
   }); 

   </script>


 </body>
    </html>


 


