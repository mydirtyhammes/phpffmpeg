<?php
require 'config.php';
require 'functions.php';
require 'dnxhd.php';
?><!DOCTYPE html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>FFMPEG via PHP</title>
<meta name="description" content="" />
<meta name="author" content="" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="./js/jquery.percentageloader-0.1.js"></script>
<script src="./js/jquery.timer.js"></script>
<script>jsNS = {'base_url' : '<?php echo BASE_URL; ?>', 'post_url' : '<?php echo POST_URL; ?>'}</script>
<link rel="stylesheet" href="style.css" />
<script src="./js/scripts.js"></script>
</head>
<body>
    <div id="header-container">
        <header class="wrapper">
            <h1 id="title">FFMPEG via PHP</h1>
        </header>
    </div>
    <div id="main" class="wrapper">
        <!-- Progress Bar -->
        <div id="progress"></div>
        <ul id="source_videos">
        <?php foreach(_source_files() as $file) { ?>
            <li><button data-filename="<?php echo $file; ?>" data-fkey="<?php echo hash('crc32', time() . $file, false); ?>">Convert It!</button> - <?php echo $file; ?> </li>
        <?php } ?>
        </ul>
        <p>
            <form action="" method="post"enctype="multipart/form-data">
                <div class="fieldset">
                        <label for="file">Video file:</label>
                        <input type="file" name="file" id="file" />
                </div>


                <div class="fieldset">
                        <label for="file">Frame Size:</label>  <!-- -b:v 700k-->
                        <select name="video_size">
                                <option value="1920x1080" selected="selected">1920x1080</option>
                                <option value="1280x720">1280x720</option>
                            

                        </select>
                </div>


                <div class="fieldset">
                        <label for="file">DNXHD</label>  <!-- -b:v 700k-->
                        <select name="video_bitrate">
                                <option value="220M">220</option>
                                <option value="185M">185</option>
                                <option value="120M" elected="selected">120</option>
                                <option value="90M">90</option>
                                <option value="60M">60</option>
                                <option value="36M">36</option>
                               
                        </select>
                </div>

                <div class="fieldset">
                        <label for="file">Frame Rate:</label>  <!-- -b:v 700k-->
                        <select name="video_framerate">
                                <option value="30">30 fps</option>
                                <option value="25" selected="selected">25 fps</option>
                        </select>
                </div>

          

                <div class="clear"></div>


        </form>
 </p>
    </div>
</body>
</html>
