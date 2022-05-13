<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Zesty - Services</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">
        <!-- Favicon -->
        <link href="img/Zlogo.png" rel="icon">
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet"> 
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>




<script src="js/html5-qrcode.min.js"></script>
<style>
  .result{
    background-color: green;
    color:#fff;
    padding:20px;
  }
  .row{
    display:flex;
    margin-right: 177px;
    margin-left: -9px;
  }
  .col{
    height: 965px;
    /* max-width: 20000px; */
    background: #e3a9a9;
    border-radius: 7px;
    padding: 70px 80px 0;
  }

</style>
<div class="row">
  <div class="col">
    <div style="width:500px;" id="reader"></div>
  </div>
  <div class="" style="padding:30px;">
  <h2  style="font-family: 'Montserrat';"> scan qrcode and copy it to the appointement forum </h2>
  <p> </p>
    <div id="result">Result Here</div>
    <p> </p>
    <button class="button-28"id="btncopy" onclick="CopyToClipboard('result')">Copy</button>

  </div>
</div>

<script type="text/javascript">
function CopyToClipboard(id){
    var r = document.createRange();
    r.selectNode(document.getElementById(id));
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(r);
    try {
        document.execCommand('copy');
        window.getSelection().removeAllRanges();
        console.log('Successfully copy text: hello world ' + r);
    } catch (err) {
        console.log('Unable to copy!');
    }
}

</script>

<script type="text/javascript">
function onScanSuccess(qrCodeMessage) {
    document.getElementById('result').innerHTML = '<span class="result">'+qrCodeMessage+'</span>';
}
function onScanError(errorMessage) {
  //handle scan error
}
var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanError);
</script>
        
    
</body>

</html>