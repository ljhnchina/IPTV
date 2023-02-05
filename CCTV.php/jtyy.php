<?php
header("Content-Type: text/plain");
$id = isset($_GET['id'])?$_GET['id']:'jtyy';
$n = [
//CHC
   'jtyy' => '00000110240323_1', //CHC家庭影院
   'dzdy' => '00000110240324_1', //CHC动作电影
   'gqdy' => '00000110240325_1', //CHC高清电影
     ];
$stream = "http://59.49.41.44/live.aishang.ctlcdn.com/{$n[$id]}/encoder/0/playlist.m3u8?CONTENTID={$n[$id]}";
$timestamp = intval((time()-60)/6);
$current = "#EXTM3U"."\r\n";
$current.= "#EXT-X-VERSION:3"."\r\n";
$current.= "#EXT-X-TARGETDURATION:6"."\r\n";
$current.= "#EXT-X-MEDIA-SEQUENCE:{$timestamp}"."\r\n";
for ($i=0; $i<6; $i++) {
    $current.= "#EXTINF:6.000,"."\r\n";
    $current.= $stream.rtrim(chunk_split($timestamp, 3, "/"), "/").".ts"."\r\n";
    $timestamp = $timestamp + 1;
    }
echo $current;
?>