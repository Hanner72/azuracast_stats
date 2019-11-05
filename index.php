<html lang="de">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" href="style2.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

        <link rel="stylesheet" href="css/bootstrap.css">
        
        <title>
		    blechradio.at - Dein Tag mit Blasmusik - Statistik
	    </title>

    </head>

    <body>
        <br>
        <div class="container-fluid mx-auto border border-primary p-3 m-3 rounded">

            <div class="row justify-content-md-center p-3 rounded">
                <h3>Aktueller Song</h3>
            </div>

            <div class="media mx-auto bg-light p-3 rounded">
                <img src="<?php
                    $str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
                    $song_album_pic= json_decode($str, true);
                    echo $song_album_pic['now_playing']['song']['art'];
                    ?>" class="align-self-center mr-3 rounded-lg" alt="..." width=200px>
                <div class="media-body mx-auto">
                    <h5 class="mt-0"> 
                        <?php
                            $str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
                            $song = json_decode($str, true);
                            echo $song['now_playing']['song']['title'];
                        ?><br><br>
                    </h5>
                    <p>
                        von: 
                        <?php
                            $str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
                            $song = json_decode($str, true);
                            echo $song['now_playing']['song']['artist'];
                        ?>
                    </p>
                    <p>
                        im Album: 
                        <?php
                            $str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
                            $song = json_decode($str, true);
                            echo $song['now_playing']['song']['album'];
                        ?>
                    </p>
                </div>
            </div>

        </div>

        <div class="container-fluid mx-auto border border-primary p-3 m-3 rounded">

            <div class="row justify-content-md-center p-3 rounded">
                <h3>nächster Song</h3>
            </div>

            <div class="media mx-auto bg-light p-3 rounded">
                <img src="<?php
                    $str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
                    $song_album_pic= json_decode($str, true);
                    echo $song_album_pic['playing_next']['song']['art'];
                    ?>" class="align-self-center mr-3 rounded-lg" alt="..." width=200px>
                <div class="media-body mx-auto">
                    <h5 class="mt-0"> 
                        <?php
                            $str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
                            $song = json_decode($str, true);
                            echo $song['playing_next']['song']['title'];
                        ?><br><br>
                    </h5>
                    <p>
                        von: 
                        <?php
                            $str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
                            $song = json_decode($str, true);
                            echo $song['playing_next']['song']['artist'];
                        ?>
                    </p>
                    <p>
                        im Album: 
                        <?php
                            $str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
                            $song = json_decode($str, true);
                            echo $song['playing_next']['song']['album'];
                        ?>
                    </p>
                </div>
            </div>

        </div>

        <div class="container-fluid mx-auto border border-primary p-3 m-3 rounded">
            <div class="row justify-content-md-center p-3 rounded">
                <h3>Höhrer</h3>
            </div>

            <div class="container mx-auto bg-light p-3 rounded">
                <div class="row">
                    <div class="col-sm">
                        <h5>Aktuell:</h5><br>
                            <?php
                            $str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
                            $listeners_current = json_decode($str, true);
                            echo $listeners_current['listeners']['current'];
                            ?>
                    </div>
                    <div class="col-sm">
                        <h5>Gesamt:</h5><br>
                            <?php
                            $str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
                            $listeners_total = json_decode($str, true);
                            echo $listeners_total['listeners']['total'];
                            ?>
                    </div>
                    <div class="col-sm">
                        <h5>Eindeutig:</h5><br>
                            <?php
                            $str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
                            $listeners_unique= json_decode($str, true);
                            echo $listeners_unique['listeners']['unique'];
                            ?>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>