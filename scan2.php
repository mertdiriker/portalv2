<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Dynamsoft JavaScript Barcode Scanner</title>
    <script src="https://cdn.jsdelivr.net/npm/dynamsoft-javascript-barcode@8.2.5/dist/dbr.js"></script>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #barcodeScanner {
            text-align: center;
            font-size: medium;
            height: 80vh;
            width: 80vw;
        }
    </style>
</head>

<body>
    <div>
        Barcode Result: <a id='result'>N/A</a>
    </div>
    <div id="barcodeScanner">
        <span id='loading-status' style='font-size:x-large'>Loading Library...</span>
    </div>
    <script>
        Dynamsoft.DBR.BarcodeScanner._bUseFullFeature = false;
        Dynamsoft.DBR.BarcodeScanner.showDialog = function () { };
        window.onload = async function () {
            try {
                await Dynamsoft.DBR.BarcodeScanner.loadWasm();
                await initBarcodeScanner();
            } catch (ex) {
                alert(ex.message);
                throw ex;
            }
        };
        let scanner = null;
        async function initBarcodeScanner() {
            scanner = await Dynamsoft.DBR.BarcodeScanner.createInstance();

            let settings = await scanner.getRuntimeSettings();
            settings.barcodeFormatIds = Dynamsoft.DBR.EnumBarcodeFormat.BF_QR_CODE;
            settings.deblurLevel = 0;
            settings.expectedBarcodesCount = 1;
            await scanner.updateRuntimeSettings(settings);

            scanner.onFrameRead = results => {
                console.log(results);
                for (let result of results) {
                    document.getElementById('result').innerHTML = result.barcodeFormatString + ", " + result.barcodeText;
                }
            };
            scanner.onUnduplicatedRead = (txt, result) => { };
            scanner._drawRegionsults = function (e) {
                let t, i, n;
                if (this.beingLazyDrawRegionsults = !1,
                    this.singleFrameMode) {
                    if (!this.oriCanvas)
                        return;
                    t = "contain",
                        i = this.oriCanvas.width,
                        n = this.oriCanvas.height
                } else {
                    if (!this._video)
                        return;
                    t = this._video.style.objectFit || "contain",
                        i = this._video.videoWidth,
                        n = this._video.videoHeight
                }
                let r = this.region;
                if (r && (!r.regionLeft && !r.regionRight && !r.regionTop && !r.regionBottom && !r.regionMeasuredByPercentage || r instanceof Array ? r = null : r.regionMeasuredByPercentage ? r = r.regionLeft || r.regionRight || 100 !== r.regionTop || 100 !== r.regionBottom ? {
                    regionLeft: Math.round(r.regionLeft / 100 * i),
                    regionTop: Math.round(r.regionTop / 100 * n),
                    regionRight: Math.round(r.regionRight / 100 * i),
                    regionBottom: Math.round(r.regionBottom / 100 * n)
                } : null : (r = JSON.parse(JSON.stringify(r)),
                    delete r.regionMeasuredByPercentage)),
                    this._cvsDrawArea) {
                    this._cvsDrawArea.style.objectFit = t;
                    let o = this._cvsDrawArea;
                    o.width = i,
                        o.height = n;
                    let s = o.getContext("2d");
                    if (r) {
                        s.fillStyle = this.regionMaskFillStyle,
                            s.fillRect(0, 0, o.width, o.height),
                            s.globalCompositeOperation = "destination-out",
                            s.fillStyle = "#000";
                        let e = Math.round(this.regionMaskLineWidth / 2);
                        s.fillRect(r.regionLeft - e, r.regionTop - e, r.regionRight - r.regionLeft + 2 * e, r.regionBottom - r.regionTop + 2 * e),
                            s.globalCompositeOperation = "source-over",
                            s.strokeStyle = this.regionMaskStrokeStyle,
                            s.lineWidth = this.regionMaskLineWidth,
                            s.rect(r.regionLeft, r.regionTop, r.regionRight - r.regionLeft, r.regionBottom - r.regionTop),
                            s.stroke()
                    }
                    if (e) {
                        s.globalCompositeOperation = "destination-over",
                            s.fillStyle = this.barcodeFillStyle,
                            s.strokeStyle = this.barcodeStrokeStyle,
                            s.lineWidth = this.barcodeLineWidth,
                            e = e || [];
                        for (let t of e) {
                            let e = t.localizationResult;
                            s.beginPath(),
                                s.moveTo(e.x1, e.y1),
                                s.lineTo(e.x2, e.y2),
                                s.lineTo(e.x3, e.y3),
                                s.lineTo(e.x4, e.y4),
                                s.fill(),
                                s.beginPath(),
                                s.moveTo(e.x1, e.y1),
                                s.lineTo(e.x2, e.y2),
                                s.lineTo(e.x3, e.y3),
                                s.lineTo(e.x4, e.y4),
                                s.closePath(),
                                s.stroke()

                            let text = t.barcodeText;
                            s.font = '18px Verdana';
                            s.fillStyle = '#ff0000';
                            let x = [e.x1, e.x2, e.x3, e.x4];
                            let y = [e.y1, e.y2, e.y3, e.y4];
                            x.sort(function (a, b) {
                                return a - b;
                            });
                            y.sort(function (a, b) {
                                return b - a;
                            });
                            let left = x[0];
                            let top = y[0];

                            s.fillText(text, left, top + 50);
                        }
                    }
                    this.singleFrameMode && (s.globalCompositeOperation = "destination-over",
                        s.drawImage(this.oriCanvas, 0, 0))
                }
                if (this._divScanArea) {
                    let e = this._video.offsetWidth
                        , t = this._video.offsetHeight
                        , o = 1;
                    e / t < i / n ? (o = e / i,
                        this._divScanArea.style.left = "0",
                        this._divScanArea.style.top = Math.round((t - n * o) / 2) + "px") : (o = t / n,
                            this._divScanArea.style.left = Math.round((e - i * o) / 2) + "px",
                            this._divScanArea.style.top = "0");
                    let s = r ? Math.round(r.regionLeft * o) : 0
                        , a = r ? Math.round(r.regionTop * o) : 0
                        , d = r ? Math.round(r.regionRight * o - s) : Math.round(i * o)
                        , _ = r ? Math.round(r.regionBottom * o - a) : Math.round(n * o);
                    this._divScanArea.style.marginLeft = s + "px",
                        this._divScanArea.style.marginTop = a + "px",
                        this._divScanArea.style.width = d + "px",
                        this._divScanArea.style.height = _ + "px"
                }
            }
            document.getElementById('barcodeScanner').appendChild(scanner.getUIElement());
            document.getElementById('loading-status').hidden = true;
            document.getElementsByClassName('dbrScanner-sel-camera')[0].hidden = true;
            document.getElementsByClassName('dbrScanner-sel-resolution')[0].hidden = true;
            document.getElementsByClassName('dbrScanner-btn-close')[0].hidden = true;
            await scanner.show();
        }
    </script>
</body>

</html>