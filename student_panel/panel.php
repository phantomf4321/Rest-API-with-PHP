<?php 
session_start();
include("jdf.php");
include("db_connect.php");

if (isset($_SESSION['id']) && isset($_SESSION['id_no'])) {
	$name=$_SESSION['name'];
	$id_no=$_SESSION['id_no'];
	$phone=$_SESSION['mobile_phone'];
	$ex_h=$_SESSION['ex_h'];
	
	
	
	
	
	function parseNumber($string) {
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $arabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
    $num = range(0, 9);
    $englishNumbersOnly = str_replace($persian, $num, $string);
    $englishNumbersOnly = str_replace($arabic, $num, $englishNumbersOnly);
    if($englishNumbersOnly[0]==0)
    {
    return $englishNumbersOnly[1];
    }
    else
    {
    return $englishNumbersOnly;
    }
}

$recent_month=parseNumber(jdate("m"));
$recent_day=parseNumber(jdate("d"));
$recent_year=parseNumber(jdate("Y"));


$sql9="SELECT * FROM students WHERE name='$name'";
$result9 = $conn->query($sql9);
if ($result9->num_rows > 0) {
  while($row9 = $result9->fetch_assoc()) {
      $ex_h = $row9['ex_h'];
  }
}

$crime_num=0;
$punish=0;
$sql8="SELECT * FROM crime_record";
$result8 = $conn->query($sql8);
if ($result8->num_rows > 0) {
  while($row8 = $result8->fetch_assoc()) {
      if($row8['name']==$name){
      $crime_num=$crime_num+1;
      }
  }
}
$punish=$crime_num*5;

    $sql = "SELECT * FROM attendance_record WHERE name='$name' AND month='$recent_month' AND year='$recent_year'";
    $result = $conn->query($sql);
    $time=0;
    $total=0;
    $absent=0;
    $dilay=0;
    
    $current_day=1;
    $day_counter=0;
    $day_time_save=0;
    $day_time=array_fill(1,31,0);
    
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            
            if($row['type']==1){$time=$time+1;$day_time_save=$day_time_save+1.5;}
            if($row['type']==0){$absent=$absent+1;}
            if($row['type']==2){$dilay=$dilay+1;}
            $total=$total+1;
            
            
            if($current_day<$row['day'])
            {
                $day_time[$current_day]=$day_time_save;
                $day_counter=$day_counter+1;
                $current_day=$current_day+1;
                $day_time_save=0;
            }
        }
    }
 
//print_r( $day_time);

 $dataPoints2 = array(
	array("x" => 1, "y" => $day_time[1]),
	array("x" => 2, "y" => $day_time[2]),
	array("x" => 3, "y" => $day_time[3]),
	array("x" => 4, "y" => $day_time[4]),
	array("x" => 5, "y" => $day_time[5]),
	array("x" => 6, "y" => $day_time[6]),
	array("x" => 7, "y" => $day_time[7]),
	array("x" => 8, "y" => $day_time[8]),
	array("x" => 9, "y" => $day_time[9]),
	array("x" => 10, "y" => $day_time[10]),
	array("x" => 11, "y" => $day_time[11]),
	array("x" => 12, "y" => $day_time[12]),
	array("x" => 13, "y" => $day_time[13]),
	array("x" => 14, "y" => $day_time[14]),
	array("x" => 15, "y" => $day_time[15]),
	array("x" => 16, "y" => $day_time[16]),
	array("x" => 17, "y" => $day_time[17]),
	array("x" => 18, "y" => $day_time[18]),
	array("x" => 19, "y" => $day_time[19]),
	array("x" => 20, "y" => $day_time[20]),
	array("x" => 21, "y" => $day_time[21]),
	array("x" => 22, "y" => $day_time[22]),
	array("x" => 23, "y" => $day_time[23]),
	array("x" => 24, "y" => $day_time[24]),
	array("x" => 25, "y" => $day_time[25]),
	array("x" => 26, "y" => $day_time[26]),
	array("x" => 27, "y" => $day_time[27]),
	array("x" => 28, "y" => $day_time[28]),
	array("x" => 29, "y" => $day_time[29]),
	array("x" => 30, "y" => $day_time[30]),
	array("x" => 31, "y" => $day_time[31])
 );



    //change it:
    $total=$total;
    $time=$time;
    //end
    
    $dataPoints = array( 
	array("label"=>"حضور", "symbol" => "حضور","y"=>$time),
	array("label"=>"غیبت", "symbol" => "غیبت","y"=>$absent),
	array("label"=>"تاخیر", "symbol" => "تاخیر","y"=>$dilay),

);
    
    
    $sql = "SELECT * FROM attendance_record WHERE name='$name' AND month='$recent_month' AND day='$recent_day' AND year='$recent_year'";
    $result = $conn->query($sql);
    $hour=0;
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            if($row['type']==1){$hour=$hour+1.5;}
        }
    }
?>

<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <!-- meta charset -->
        <meta charset="utf-8">
        <!-- site title -->
        <title>پنل <?php echo $name?></title>
        <!-- meta description -->
        <meta name="description" content="">
        <!-- mobile viwport meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- fevicon -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        
        <!-- ================================
        CSS Files
        ================================= -->
        <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i|Open+Sans:400,600,700,800" rel="stylesheet">
        <link rel="stylesheet" href="css/themefisher-fonts.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/dark.css">
        <link id="color-changer" rel="stylesheet" href="css/colors/color-0.css">
        
        
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "dark1",
	animationEnabled: true,
	title: {
		text: "وضعیت حضور در پارت های مطالعاتی <?php echo jdate("F")?>"
	},
	data: [{
		type: "doughnut",
		indexLabel: "{symbol} - {y}",
		yValueFormatString: "#,##0.0\"\"",
		showInLegend: true,
		legendText: "{label} : {y}",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer2", {
    theme: "dark2",
	animationEnabled: true,
	title:{
		text: "مطالعه روزانه در <?php echo jdate("F"); ?> ماه "
	},
	axisY: {
		title: "ساعت",
		valueFormatString: "0",
		suffix: "h",
		prefix: ""
	},
	data: [{
		type: "spline",
		markerSize: 6,
		xValueFormatString: "",
		yValueFormatString: "#,##0.##h",
		xValueType: "",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
 
chart.render();
 
}
</script>

    </head>

    <body class="dark">

        <div class="preloader">
            <div class="loading-mask" style"text-align: center;"></div>
            <div class="loading-mask" style"text-align: center;"></div>
            <div class="loading-mask" style"text-align: center;"></div>
            <div class="loading-mask" style"text-align: center;"></div>
            <div class="loading-mask" style"text-align: center;"></div>
        </div>

        <div class="preview-wrapper">
            <div class="switcher-head">
                <span>Style Switcher</span>
                <div class="switcher-trigger tf-tools"></div>
            </div>

            <div class="switcher-body">
                <h4>Choose Color:</h4>
                <ul class="color-options list-none">
                    <li class="c0" data-color="color-0" title="Default">Default</li>
                    <li class="c1" data-color="color-1" title="Red">Red</li>
                    <li class="c2" data-color="color-2" title="Green">Green</li>
                    <li class="c3" data-color="color-3" title="Blue">Blue</li>
                </ul>
            </div>
        </div>
        

        <main class="site-wrapper">
            <div class="pt-table">
                <div class="pt-tablecell page-about relative">
                    <!-- .close -->
                    <a href="./" class="page-close"><i class="tf-ion-close"></i></a>
                    <!-- /.close -->

                    <div class="container" style="direction: rtl">
                        <div class="row">
                            <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                                <div class="page-title text-center">
                                    <h3 style="font-family: B Nazanin">سلام بر <span class="primary"> <?php echo $name; ?> </span> عزیز :) <span class="title-bg"> <?php echo $name; ?> </span></32>
                                    <p style="font-family: B Nazanin; font-size: 20px">تاریخ امروز <?php echo date(jdate("d F Y")); ?></p>
                                    
                                    
                                </div>
                            </div>

                            <center>
                            <div class="col-xs-12 col-md-6">
                                <div class="about-author">
                                    <figure class="author-thumb" style="background: none;">
                                       <!-- <img src="https://s6.uupload.ir/files/brody-murphy-temp_5tz0.jpg" alt=""> -->
                                        <img src="https://s6.uupload.ir/files/sampad.svg__5l6l.png" alt="">
                                    </figure> <!-- /.author-bio -->
                                    <div class="author-desc">
                                        <p><b style="font-family: B Nazanin">نام و نام خانوادگی:
                                        </b>  <?php echo $name; ?> </p>
                                        <p><b style="font-family: B Nazanin">شماره کابین:
                                        </b>  <?php echo $id_no; ?> </p>
                                        <p><b style="font-family: B Nazanin">شماره تماس:
                                        </b>  <?php echo $phone; ?> </p>
                                        
                                    </div>
                                    <!-- /.author-desc -->
                                    

                                    
                                </div> <!-- /.about-author -->
                                <p></p>
                            </div> <!-- /.col -->
                            </center>

                            <div class="col-xs-12 col-md-6">
                                <div class="section-title clear">
                                    <h3>اطلاعات</h3>
                                    <h4 style="font-family: B Nazanin"> میزان مطالعه در <?php echo jdate("d F Y")?> برابر است با <?php echo $hour;?> ساعت</h4>
                                </div>
                                <div id="chartContainer" style="height: 200px; width: 400px;"></div>
                                <div id="chartContainer2" style="height: 200px; width: 400px;"></div>
                                <div class="skill-wrapper">
                                    <div class="progress clear">
                                        <div class="skill-name">درصد حضور در ماه جاری</div>
                                        <div class="skill-bar">
                                            <div class="bar"></div>
                                        </div>
                                        <div class="skill-lavel" data-skill-value="<?php echo round(($time/$total)*100,2) ?>%"></div>
                                    </div> <!-- /.progress -->
                                    
                                    <div class="progress clear">
                                        <div class="skill-name">ساعت مطالعه در <?php echo jdate("F");?></div>
                                        <div class="skill-bar">
                                            <div class="bar"></div>
                                        </div>
                                        <div class="skill-lavel" data-skill-value="<?php echo round(($time*1.5)+($dilay*0.5)-$punish+$ex_h,2); ?>"></div>
                                    </div> <!-- /.progress -->
                                    
                                    <div class="progress clear">
                                        <div class="skill-name">ميزان جريمه انضباطی(ساعت) </div>
                                        <div class="skill-bar">
                                            <div class="bar"></div>
                                        </div>
                                        <div class="skill-lavel" data-skill-value="<?php echo $punish; ?>"></div>
                                    </div> <!-- /.progress -->
                                    
                                    <div class="progress clear">
                                        <div class="skill-name">ساعت افزوه شده از سوی سالن </div>
                                        <div class="skill-bar">
                                            <div class="bar"></div>
                                        </div>
                                        <div class="skill-lavel" data-skill-value="<?php echo $ex_h; ?>"></div>
                                    </div> <!-- /.progress -->
                                    
                                </div> <!-- /.skill-wrapper -->
                            </div> <!-- /.col -->
                        </div> <!-- /.row -->
                    </div> <!-- /.container -->
                    
                    
                    
                    <div class="hexagon-menu clear">
                                    
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <a href="see_att.php?name=<?php echo $name ?>" class="hex-content">
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                    <i class="tf-profile-male"></i>
                                                </span>
                                                <span class="title"  style="font-family: B Nazanin; font-size: 20px;">حضور و غیاب</span>
                                            </span>
                                            <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>
                                    </div>
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <a href="see_enter.php?name=<?php echo $name ?>" class="hex-content">
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                    <i class="tf-profile-male"></i>
                                                </span>
                                                <span class="title" style="font-family: B Nazanin; font-size: 20px;">گزارش ورود</span>
                                            </span>
                                            <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>    
                                    </div>
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <a href="see_exit.php?name=<?php echo $name ?>" class="hex-content">
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                    <i class="tf-profile-male"></i>
                                                </span>
                                                <span class="title"  style="font-family: B Nazanin; font-size: 20px;">گزارش خروج</span>
                                            </span>
                                            <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>
                                    </div>
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <a href="see_crime.php?name=<?php echo $name ?>" class="hex-content">
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                    <i class="tf-profile-male"></i>
                                                </span>
                                                <span class="title"  style="font-family: B Nazanin; font-size: 20px;">گزارش انضباطی</span>
                                            </span>
                                            <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>
                                    </div>
                                    
                                </div> 

                    <nav class="page-nav clear">
                        <div class="container">
                            <div class="flex flex-middle space-between">
                                <span class="copyright hidden-xs" style="font-size: 15px">Copyright &copy; 2022 Betavers, All Rights Reserved.</span>
                            </div>
                        </div>
                        <!-- /.page-nav -->
                    </nav>
                    <!-- /.container -->
                </div> <!-- /.pt-tablecell -->
            </div> <!-- /.pt-table -->
        </main> <!-- /.site-wrapper -->
        
        <!-- ================================
        JavaScript Libraries
        ================================= -->
        <script src="js/vendor/jquery-2.2.4.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/jquery.nicescroll.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery-validation.min.js"></script>
        <script src="js/main.js"></script>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        
        
        <script>
            new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
    datasets: [{ 
        data: [86,114,106,106,107,111,133,221,783,2478],
        label: "Africa",
        borderColor: "#3e95cd",
        fill: false
      }, { 
        data: [282,350,411,502,635,809,947,1402,3700,5267],
        label: "Asia",
        borderColor: "#8e5ea2",
        fill: false
      }, { 
        data: [168,170,178,190,203,276,408,547,675,734],
        label: "Europe",
        borderColor: "#3cba9f",
        fill: false
      }, { 
        data: [40,20,10,16,24,38,74,167,508,784],
        label: "Latin America",
        borderColor: "#e8c3b9",
        fill: false
      }, { 
        data: [6,3,2,2,7,26,82,172,312,433],
        label: "North America",
        borderColor: "#c45850",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'World population per region (in millions)'
    }
  }
});
        </script>
        
    </body>
</html>
<?php
}
else{
	echo "NO!";
}?>