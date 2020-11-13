<?php

include('Extensions/phpqrcode/qrlib.php');

    echo'hola';
                $qrDir = IMG_PATH . "qr/";    
                $qrFile = "$encriptado.$dateEncriptado.png";        //            $this->id_session = $id_session date = $date;$time = $time;$timeEnd = $timeEnd;price = $price;

                $data = "Cine : ".$theather_name."\nSala : ".$room_name."\nPelicula : ".$movie_name."\nFecha :"."\nComienzo :".$ticket->getTime()."\nFinalizacion :".$ticket->getTimeEnd()."\nPrecio :".$ticket->getPrice();

                /*QRtools::buildCache();
                QRcode::png('PHP QR Code :)', 'test.png', 'L', 4, 2);
                */QRcode::png($data , $qrDir.$qrFile, 'M', 5); 
                echo '<img class="img-thumbnail" src="'.$qrDir.$qrFile.'" />';