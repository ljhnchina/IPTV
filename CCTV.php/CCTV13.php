<?php
date_default_timezone_set("Asia/Shanghai");
$channel = empty($_GET['id']) ? "cctv13xwhd8m/8000000" : trim($_GET['id']);
$array = explode("/", $channel);
$stream = "http://117.184.239.60:80/liveplay-kk.rtxapp.com/live/program/live/{$array[0]}/{$array[1]}/mnf.m3u8";
$timestamp = substr(time(), 0, 9) - 7;
$current = "#EXTM3U" . "\r\n";
$current .= "#EXT-X-VERSION:3" . "\r\n";
$current .= "#EXT-X-TARGETDURATION:3" . "\r\n";
$current .= "#EXT-X-MEDIA-SEQUENCE:{$timestamp}" . "\r\n";
for ($i = 0; $i < 3; $i++) {
    $timematch = $timestamp . '0';
    $timefirst = date('YmdH', $timematch);
    $current .= "#EXTINF:3," . "\r\n";
    $current .= $stream . $timefirst . "/" . $timestamp . ".ts" . "\r\n";
    $timestamp = $timestamp + 1;
}
header("Content-Disposition: attachment; filename=playlist.m3u8");
echo $current;
