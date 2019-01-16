<link href="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.3.0/video-js.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.3.0/video.min.js"></script>

<video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="640" height="264"
       poster="http://vjs.zencdn.net/v/oceans.png">
    <source src=<?php echo $_GET['url']??"http://vjs.zencdn.net/v/oceans.mp4" ?> type="video/mp4">
</video>
