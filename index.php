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

                <div class="fieldset">
                        <label>Deinterlace</label>
                        <input type="checkbox" name="encoding_video_deinterlace" checked="checked" class="checkbox" />
                </div>


                <div class="fieldset">
                        <label>Enable Audio</label>
                        <input type="checkbox" name="encoding_enable_audio" checked="checked" class="checkbox" />
                </div>

<!--
               <div class="fieldset">
                        <label for="file">Audio sampling rate (in Hz):</label> 
                        <select name="encoding_audio_sampling_rate">
                                <option value="44100" selected="selected">44100 Mz</option>
                                <option value="22050">22050 Mz</option>
                                <option value="11025">11025 Mz</option>
                        </select>
                </div>

                <div class="fieldset">
                        <label for="file">Audio bitrate (kbps):</label> 
                        <select name="encoding_audio_bitrate">
                                <option value="320">320 kbps</option>
                                <option value="256">256 kbps (DAB Quality)</option>
                                <option value="192">192 kbps (CD Quality)</option>
                                <option value="128" selected="selected">128 kbps</option>
                                <option value="96">96 kbps </option>
                                <option value="32">32 kbps </option>
                                <option value="32">8 kbps (Telephone quality)</option>
                        </select>
                </div>
                
 -->               
                
                <div class="fieldset">
                        <label>Interlaced</label>
                        <input type="radio" name="encoding_audio_channels" checked="checked" value="stereo" class="checkbox"  />
                </div>
                <div class="fieldset">
                        <label>Progressiv</label>
                        <input type="radio" name="encoding_audio_channels" value="mono" class="checkbox" />
                </div>
                <div class="clear"></div>

                <h2>Output Formats</h2>
                <div class="fieldset">
                        <label>MXF Op-1a </label>
                        <input type="checkbox" name="encoding_x264" checked="checked" class="checkbox" />
                </div>
                <div class="fieldset">
                        <label>h264 Large</label>
                        <input type="checkbox" name="encoding_ogv"  checked="checked"  class="checkbox"/>
                </div>

                <div class="fieldset">
                        <label>h264 Mobile</label>
                        <input type="checkbox" name="encoding_webm"  checked="checked" class="checkbox" />
                </div>
                        <div class="fieldset">
                        <label>DVD Iso</label>
                        <input type="checkbox" name="encoding_stills"  checked="checked" class="checkbox" />
                </div>

                <div class="clear"></div>

                <!-- Todo
                // Todo MXF 8 Track Mixdown Option 
                <h2>Other Encodings</h2>

                <div class="fieldset">
                        <label>iPod / iPhone</label>
                        <input type="checkbox" name="encoding_ipod_iphone"  class="checkbox" />
                        <span>(320x180)</span>
                </div>

                <div class="fieldset">
                        <label>PSP</label>
                        <input type="checkbox" name="encoding_psp"   class="checkbox"/>
                        <span>(320x240)</span>
                </div>

                <div class="fieldset">
                        <label>Animated gif (uncompressed)</label>
                        <input type="checkbox" name="encoding_psp"  class="checkbox" />
                </div>


                <div class="fieldset">
                        <label>Extract mp3 from video</label>
                        <input type="checkbox" name="encoding_extract_audio"  class="checkbox" />
                </div>

                <div class="fieldset">
                        <label>Convert to flv</label>
                        <input type="checkbox" name="encoding_flv"  class="checkbox" />
                </div>

                <div class="fieldset">
                        <label>Convert to mpeg for dvd players</label>
                        <input type="checkbox" name="encoding_dvd"  class="checkbox" />
                </div>

                <div class="fieldset">
                        <label>Convert encode divx</label>
                        <input type="checkbox" name="encoding_divx"  class="checkbox" />
                </div>

                <div class="clear"></div>
                -->

                <input type="submit" name="submit" value="Upload and convert" />

        </form>
 </p>
    </div>
</body>
</html>
