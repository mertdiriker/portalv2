<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style2.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<nav class="navtop" style="overflow-x:auto;">
			<div>
				<h1> <img src="../portal.png"></h1>
				<a href="qrinfo.php">QR Oluştur</a>
                <a href="qrs.php">QR ları Gör</a>
                <a href="default.php">QR Okut</a>
			</div>
		</nav>
    <body>
<div class="container">
    
    <div class="main-body">
    
        
   
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    
                    <div class="mt-3">
                   
                <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="../style2.css" rel="stylesheet" type="text/css">
		<style type="text/css">
	body{
		background-image:url(../bg.png);
		background-size:cover;
		background-attachment: fixed;
	}
	</style>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <title>QR</title>
    <!--
      This sample makes use of the library hosted by the CDN jsDelivr. If you would rather use the
      library offline. Please see the guide on how to host the library: 
      https://www.dynamsoft.com/barcode-reader/programming/javascript/user-guide/?ver=latest#host-the-library-yourself-recommended
    -->
    <script src="https://cdn.jsdelivr.net/npm/dynamsoft-javascript-barcode@8.6.1/dist/dbr.js"></script>
</head>

<body>

    
    <h2>QR OKUT</h2>
    <button id='readBarcode'>Kamera aç</button>
    <br>
<br>
<br>
    
    <script>
        /** LICENSE ALERT - README
         * The library requires a license to work, you use the API organizationID to tell the program where to fetch your license.
         * If the Organizaion ID is not specified, a 7-day (public) trial license will be used by default which is the case in this sample.
         * Note that network connection is required for this license to work.
         */

        /* When using your own license, uncomment the following line and specify your Organization ID. */
        
        // Dynamsoft.DBR.BarcodeReader.organizationID = "YOUR-ORGANIZATION-ID";
        
        /* If you don't have a license yet, you can request a trial on this page: https://www.dynamsoft.com/customer/license/trialLicense?product=dbr&package=js&utm_source=github */
        /* For more information, please refer to https://www.dynamsoft.com/license-tracking/docs/about/licensefaq.html?ver=latest#how-to-use-a-trackable-license. */
        
        /* The API "productKeys" is an alternative way to license the library, the major difference is that it does not require a network. Contact support@dynamsoft.com for more information. */
        
        // Dynamsoft.DBR.BarcodeReader.productKeys = "YOUR-PRODUCT-KEY";
        
        /** LICENSE ALERT - THE END */

        let pScanner = null;
        document.getElementById('readBarcode').onclick = async function () {
            try {
                let scanner = await (pScanner = pScanner || Dynamsoft.DBR.BarcodeScanner.createInstance());
                /* 
                 * onFrameRead is triggered once each frame is read. 
                 * There can be one or multiple barcodes on each frame.
                 */
                scanner.onFrameRead = results => {
                    console.log("Barcodes on one frame:");
                    for (let result of results) {
                        console.log(result.barcodeFormatString + ": " + result.barcodeText);
                    }
                };
                /* 
                 * onUnduplicatdRead is triggered once a new barcode is found. 
                 * The amount of time that the library 'remembers' the found barcode is defined by duplicateForgetTime 
                 * in the ScanSettings interface of the BarcodeScanner class. By default that is set to 3000 ms (or 3 secs) 
                 */
                scanner.onUnduplicatedRead = (txt, result) => {
                    
                    
                    alert(txt);
                    

                    console.log("Unique Code Found: " + result);
                    document.location.href = "qrirsalot.php?id=" + txt;
                    
                }
                await scanner.show();
            } catch (ex) {
                alert(ex.message);
                throw ex;
            }
        };
    </script>
</body>

</html>
                     
          
        
                    </div>
                  </div>
                </div>  
              </div>
            </div>
        
        </div>
    

    
    </div>
        
           

<style type="text/css">
body{
  
		background-image:url(../bg.png);
		background-size:cover;
		background-attachment: fixed;
	
    color: #1a202c;
    text-align: left;
    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

</style>

<script type="text/javascript">

</script>
</body>
</html>
