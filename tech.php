<?php
 ob_start();
session_start();
 $conn=mysqli_connect("localhost","root","vivek123","nitwcapp");
 date_default_timezone_set('India');
 $info=getdate();
 $hour=intval($info['hours']);
 $min=intval($info['minutes']);
 $day=intval($info['mdays']);
 $query="SELECT * FROM events";
 

?>


<!DOCTYPE html>
<html lang="en">

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        <h1>NITW C App</h1>
                    </a>
                </li>
                <li>
                    <a href="#">Roll-Outs</a>
                </li>
                <li>
                    <a href="#">Queries</a>
                </li>
                <li>
                    <a href="#">Complaints</a>
                </li>
                <li>
                    <a href="#">Contact Us</a>
                </li>
                <li>
                    <a href="tech.php">Technozion&nbsp;&nbsp;<span class="badge label-danger" style="text-align:center">NEW</span></a>
                <li>
                    <a href="#">Design Team</a>
                </li>
               
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <span class="glyphicon glyphicon-list" id="menu-toggle" >
                        
                        </span>
                        <h1>Technozion</h1>
                        <h2>Time is <strong><?php echo $hour%12;echo " : "; echo $min; ?></strong></h2>
                        <div class="anel panel-primary" align="center">
                        <div class="panel-body">Ongoing Events</div>
                        <div class="panel-footer">
						<ul>
						<?php
						$flag=0;
						$result=mysqli_query($conn,$query);
						while($row=mysqli_fetch_array($result))
						{
							if((intval($row['ehr'])==$hour|| intval($row['ehr'])==$hour+2))
							  {  echo "<li><a href='showevent.php?id='".$row['sno']."'>".$row['event']."</a></li>";
							  $flag=1;
							  }
						}
						if($flag==0)
						   echo "No ongoing events";
						
						
						 ?></div>
                        
                        <br><br>
                        <div class="panel-body">Upcoming Events</div>
                        <div class="panel-footer"><?php
						$result=mysqli_query($conn,$query);
						$flag=0;
						while($row=mysqli_fetch_array($result))
						{
							if((intval($row['ehr'])>$hour))
							{
							   echo "<li><a href='showevent.php?id='".$row['sno']."'>".$row['event']."</a></li>";                              $flag=1;
							}
						}
						if($flag==0)
						   echo "No upcoming events";
						
						
						 ?></div>
                      
                        <br><br>
                        <div class="panel-body">Past Events</div>
                        <div class="panel-footer"><?php
						$result=mysqli_query($conn,$query);
						$flag=0;
						while($row=mysqli_fetch_array($result))
						{
							if(intval($row['ehr'])<$hour)
							 {  echo "<li><a href='showevent.php?id=".$row['sno']."'>".$row['event']."</a></li>";
							 $flag=1;
							 }
						}
						if($flag==0)
						   echo "No past events";
						
						
						 ?></div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
