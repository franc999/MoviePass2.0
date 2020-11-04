<?php 

    require 'Extensions/phpqrcode/qrlib.php';

    $dir = 'Views/layout/qr/';


    if (!file_exists($dir))
        mkdir($dir);
    
    $filename = $dir."nombre2.png";

    $size = 10;
    $level = 'Q';
    $frameSize = 3;
    $content = 'hola mundo';


    QRcode::png($content, $filename, $level, $size, $frameSize);
    echo '<img src="'.$filename.'" align="left" />';
?>