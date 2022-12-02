<!DOCTYPE html>
<?php include("db_connect.php"); ?>
<html class="no-js" lang="">
    <head>
        <!-- meta charset -->
        <meta charset="utf-8">
        <!-- site title -->
        <title>اخبار</title>
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
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/dark.css">
        <link id="color-changer" rel="stylesheet" href="css/colors/color-0.css">
    </head>

    <body class="dark">

        <div class="preloader">
            <div class="loading-mask"></div>
            <div class="loading-mask"></div>
            <div class="loading-mask"></div>
            <div class="loading-mask"></div>
            <div class="loading-mask"></div>
        </div>

        <div class="preview-wrapper">
            <div class="switcher-head">
                <span>انتخاب رنگ پرتال</span>
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

        <main class="site-wrapper" >
            <div class="pt-table">
                <div class="pt-tablecell page-resume relative">
                    <!-- .close -->
                    <a href="./" class="page-close"><i class="tf-ion-close"></i></a>
                    <!-- /.close -->

                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                                <div class="page-title text-center">
                                    <h2 style="font-family: B Nazanin">اخبار و اطلاعات <span class="primary" style="font-family: B Nazanin">تالار مطالعه</span> <span class="title-bg">news</span></h2>
                                    <p></p>
                                </div>
                            </div>
                        </div> <!-- /.row -->

                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="history-block">
                                    <div class="section-title light clear"style="direction: rtl">
                                        <h3  style="font-family: B Nazani">تازه ها</h3>
                                    </div>
                                                                                <?php
                                            $sql = "SELECT * FROM news ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
      ?>
                                    <!-- /.section-title -->
                                    <div class="history-scroller"style="direction: rtl">
                                        <div class="history-item">
                                            <div class="history-icon">
                                                <span class="history-hex"></span>
                                                <i class="tf-documents5"></i>
                                            </div>

                                            <div class="history-text">
                                                <h4 style="font-family: B Nazanin"><?php echo $row['title']?></h4>
                                                <h5 style="font-family: B Nazanin"><?php echo $row['date']?></h5>
                                                <span style="font-family: B Nazanin"><?php echo $row['body']?></span>
                                            </div>
                                        </div>
                                        <?php }}?>
                                        <!-- /.history-item -->
                                      
                                        <!-- /.history-item -->
                                        
                                        <!-- /.history-item -->
                                    </div>
                                </div> <!-- /.history-block -->
                            </div> <!-- /.col -->
                            


                    <!-- /.container -->

                </div> <!-- /.pt-tablecell -->
            </div> <!-- /.pt-table -->
        </main> <!-- /.site-wrapper -->
                            <nav class="page-nav clear">
                        <div class="container">
                            <div class="flex flex-middle space-between">
                                <span class="prev-page" style="font-family: B Nazanin ; font-size: 15px"><a href="index.html" class="link">&larr; صفحه قبل</a></span>
                                <span class="copyright hidden-xs" style="font-size: 15px">Copyright &copy; 2022 Betavers, All Rights Reserved.</span>
                                <span class="next-page" style="font-family: B Nazanin; font-size: 15px"><a href="about.html" class="link">صفحه بعد &rarr;</a></span>
                            </div>
                        </div>
                        <!-- /.page-nav -->
                    </nav>
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
        <script src="js/form.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>