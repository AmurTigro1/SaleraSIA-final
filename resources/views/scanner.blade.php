@extends('home')

@section('content')
<div id="app">
    <div class="buttons">
        <button id="start-scanner">Start scanner</button>
        <button id="stop-scanner">Stop scanner</button>
    </div>
    <div id="scanner-container"></div>
</div>

<style>
    #app {
        text-align: center;
        margin-top: 50px;
    }

    .buttons {
        margin-bottom: 20px;
    }

    button {
        border: 1px solid black;
        padding: 5px 20px;
        text-decoration: none;
        cursor: pointer;
        color: white
        background-color: transparent;
    }

    button:hover {
        background-color: #799351;
        color: white
    }


    #scanner-container {
        max-width: 300px;
        margin: 0 auto;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        function onScanSuccess(decodedText, decodedResult) {
            alert(`QR Code data: ${decodedText}`);
        }

        let html5QrcodeScanner;

        function startScanner() {
            html5QrcodeScanner = new Html5QrcodeScanner(
                "scanner-container",
                { fps: 10, qrbox: 180 },
                true
            );
            html5QrcodeScanner.render(onScanSuccess);
        }

        function stopScanner() {
            if (html5QrcodeScanner) {
                html5QrcodeScanner.clear().then(() => {
             
                    console.log("QR Code scanning stopped.");
                }).catch((error) => {

                    console.error("Unable to stop scanning.", error);
                });
            }
        }

        document.getElementById('start-scanner').addEventListener('click', startScanner);
        document.getElementById('stop-scanner').addEventListener('click', stopScanner);
    });
</script>
@endsection
