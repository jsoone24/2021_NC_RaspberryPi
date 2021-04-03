<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>NCLAB - MicroProcessor Project</title>
    <!--[if IE]>
    <script src = "http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body id="home">
    <div id="wrapper">
        <header>
            <?php
            $regid = $_REQUEST[regid];
            ?>

            <h1><img src="king.png" width="250" height="200"></a></h1>
            <h2>MicroProcessor Project in Network Computing Lab</h2>
            <nav>
                <a href="index.php?regid=$regid">home</a>
                <a href="stream.php?regid=$regid">Streaming</a>
                <a href="video_log.php?regid=$regid">Video Log</a>
                <div class="clearfix"></div>
            </nav>
        </header>

        <br/>
        <section id="main-content">
            <div id="featured">
                <h3>About Project</h3>
                <p><img src="sss.png" width="50" height="50"></p>
                <h5>We are using Raspberry Pi4, Logitech-Webcam, mjpg-streamer and OpenCV for motion detecting and face reccognization.<br/></h5>
            </div><!--END Featured-->
        </section>
        <hr/>

        </div><!--END Wrapper-->
        </body>
</html>