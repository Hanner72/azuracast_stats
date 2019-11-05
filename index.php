<html lang="de">
    <title>
		blechradio.at - Dein Tag mit Blasmusik - Statistik
	</title>
    <head>
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" href="style2.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>

    	<!-- ### AKTUELLER SONG BEGINN ### -->
    	<b>Aktueller Song</b><br>
    	Interpret und Song: <?php
            $str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
            $song = json_decode($str, true);
            echo $song['now_playing']['song']['text'];
            ?>
            <br>
            Album: <?php
            $str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
            $song_album= json_decode($str, true);
            echo $song_album['now_playing']['song']['album'];
            ?>
            <br>
            <img src=" <?php
            $str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
            $song_album_pic= json_decode($str, true);
            echo $song_album_pic['now_playing']['song']['art'];
            ?>" width=130px> 
            <br>
	<!-- ### AKTUELLER SONG ENDE ### -->

<br><br>

	<!-- ### NÄCHSTER SONG BEGINN ### -->
    	<b>Nächster Song</b><br>
    	Interpret und Song: <?php
            $str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
            $next_song = json_decode($str, true);
            echo $song['playing_next']['song']['text'];
            ?>
            <br>
            Album: <?php
            $str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
            $next_song_album= json_decode($str, true);
            echo $song_album['playing_next']['song']['album'];
            ?>
            <br>
            <img src=" <?php
            $str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
            $next_song_album_pic= json_decode($str, true);
            echo $song_album_pic['playing_next']['song']['art'];
            ?>" width=100px> 
            <br>
	<!-- ### NÄCHSTER SONG ENDE ### -->

<br><br>

            Listeners Current: <?php
            $str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
            $listeners_current = json_decode($str, true);
            echo $listeners_current['listeners']['current'];
            ?>
            <br>
            Listeners Total: <?php
            $str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
            $listeners_total = json_decode($str, true);
            echo $listeners_total['listeners']['total'];
            ?>
            <br>
            Listeners Unique: <?php
            $str = file_get_contents('http://207.180.205.39/api/nowplaying/blechradio1/');
            $listeners_unique= json_decode($str, true);
            echo $listeners_unique['listeners']['unique'];
            ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

    </body>
</html>