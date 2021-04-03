<body id="home">
    <div id="wrapper">
        <header>
            <?php
            $regid = $_REQUEST[regid];
            ?>

            <h1><a href="index.php?regid=$regid"><img src="king.png" width="250" height="200"></a></h1>
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
                <h3>Video Log</h3>
                <h1><img src="log/capture.jpg"></h1>
                <p><?php include "show_list.php";?><br/></p>
            </div><!--END Featured-->
            <div class = clearfix"></div>
        
        <hr/>
        </section>

        </div><!--END Wrapper-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        </body>
</html>