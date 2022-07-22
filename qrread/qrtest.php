<?php

    include('../phpqrcode/qrlib.php');
    
    // SVG file format support
    $info = $_POST['info'] ;
    
    $svgCode = QRcode::svg($info);
    
    echo $svgCode;

    ?>