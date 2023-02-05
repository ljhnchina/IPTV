<?php
header("Content-Type: text/plain");
$id = isset($_GET['id'])?$_GET['id']:'cctv5p';
$n = [
//央视
   'cctv1' => '00000110240127_1', //CCTV1综合
   'cctv2' => '00000110240244_1', //CCTV2财经
   'cctv3' => '00000110240245_1', //CCTV3综艺
   'cctv4' => '00000110240316_1', //CCTV4中文国际
   'cctv5' => '00000110240246_1', //CCTV5体育
   'cctv5p' => '00000110240128_1', //CCTV5+体育赛事
   'cctv6' => '00000110240247_1', //CCTV6电影
   'cctv7' => '00000110240248_1', //CCTV7国防军事
   'cctv8' => '00000110240249_1', //CCTV8电视剧
   'cctv9' => '00000110240250_1', //CCTV9纪录
   'cctv10' => '00000110240251_1', //CCTV10科教
   'cctv11' => '00000110240328_1', //CCTV11戏曲
   'cctv12' => '00000110240252_1', //CCTV12社会与法
   'cctv13' => '00000110240502_1', //CCTV13新闻
   'cctv14' => '00000110240253_1', //CCTV14少儿
   'cctv15' => '00000110240329_1', //CCTV15音乐
   'cctv16' => '00000110240388_1', //CCTV16奥林匹克
   'cctv17' => '00000110240326_1', //CCTV17农业农村
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