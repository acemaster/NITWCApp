<?php
 ob_start();
session_start();
 $conn=mysqli_connect("localhost","root","vivek123","nitwcapp");
 date_default_timezone_set('India');
 $id=$_GET['id'];
 $query="SELECT * FROM events WHERE sno='$id'";
 $result=mysqli_query($conn,$query);
 $row=mysqli_fetch_array($result);
 $event=$row['event'];
 $ehr=$row['ehr'];
 $emin=$row['emin'];
 $elat=$row['elat'];
 $elong=$row['elongt'];
 $place=$row['place'];
 $desp=$row['desp'];
 

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NITW Student Council</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/event.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

 <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVwdj7Yy9uxpmci8r4xEyMLz3Ux2Jq3nQ">
	  
    </script>
    <script type="text/javascript">
	clat=<?php echo floatval($elat); ?>;
	clongt=<?php echo floatval($elong); ?>;
      function initialize() {
		   var cLatlng = new google.maps.LatLng(clat,clongt);
		     
        var mapOptions = {
          center: cLatlng,
          zoom: 20
        };
		 var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
		
 var markere = new google.maps.Marker({
      position: cLatlng,
      map: map,
      title: 'Event Location'
  });

 

       
      }
      google.maps.event.addDomListener(window, 'load', initialize);
	  markerc.setmap(map);
	  markerf.setmap(map);
	  
    </script>
</head>
<body>
<div style="background-color:#66C; height:100%">
<nav class="navbar navbar-default" role="navigation" style="background:#006">

<div align="center">
<div align="left" style="float:left; padding-left:20px; padding-bottom:10px;">

  <a href="tech.php"><span class="glyphicon glyphicon-chevron-left" ></span> </a>

</div>
<h2 style="color:#FFF"><?php  echo strtoupper($event); ?></h2>
</div>
</nav>

<div align="center" class="box effect1" >

<div style="padding-top:20px"/>
<div class="media">
<div class="media-body">
<h4 class="media-heading">Event</h4>
<?php echo strtoupper($event);?>
</div></div>

<div class="media">
<div class="media-body">
<h4 class="media-heading">Place</h4>
<?php echo strtoupper($place);?>
</div></div>

<div class="media">
<div class="media-body">
<h4 class="media-heading">About the event</h4>
<?php echo strtoupper($desp);?>
</div></div>
</div>


</div>


<div id="map-canvas"/> 

</body>
</html>