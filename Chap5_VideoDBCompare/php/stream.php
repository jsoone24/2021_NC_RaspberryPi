<body id="home" onloads = "createImageLayer();">
    <div id="wrapper">
        <header>
            <?php
            $regid = $_REQUEST[regid];
            ?>
            <h1><a href="index.php?regid=$regid"><img src="image.jpg" width="250" height="300"></a></h1>
            <h2>MicroProcessor Project in Network Computing Lab</h2>
            <nav>
                <a href="index.php?regid=$regid">home</a>
                <a href="stream.php?regid=$regid">Streaming</a>
                <a href="video_log.php?regid=$regid">Video Log</a>
                <div class="clearfix"></div>
            </nav>
        </header>

        <section id="main-content">
            <div id="featured">
                <h3>Stream : </h3>
                <p id="streamwrap" class="xform-p">
                <img src="http://192.168.0.9:8080/?action=stream"/>
            </script></p>    
            </div></p>
            </div><!--END Featured-->
            <div class="clearfix"></div>
        <hr/>
        </section>

        </div><!--END Wrapper-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        </body>
</html>