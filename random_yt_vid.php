<?php
$API_KEY = "YOUR_API_KEY";

$url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=50&playlistId=" . $_GET['id'] . "&key=" . $API_KEY;

$playlist = json_decode(file_get_contents($url), true)['items'];
unset($API_KEY);
$item = $playlist[mt_rand(0, count($playlist) - 1)];

$vid_id = $item['snippet']['resourceId']['videoId'];

header("Status: 307 Moved Temporary", false, 307);
header("Location: https://youtube.com/watch?v=" . $vid_id);