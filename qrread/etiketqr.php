<?php

    include('../phpqrcode/qrlib.php');
    
    // SVG file format support
    $info = $_GET['Qr'] ;
    
    $svgCode = QRcode::svg($info);
    
    echo $svgCode;

    ?>