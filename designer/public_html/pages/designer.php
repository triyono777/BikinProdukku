<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
  <head>
    <title>POS RM Padang</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
  </head>
  <style>
  .scroll-area{
  width:100%;
  height:480px;
  overflow-y:scroll;
  }
  </style>
  <body>
    <section id="header">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.html">RM Masakan Padang</a>
            <img class="img-rounded" width="50" height="50" src="../assets/img/logo.jpg" alt=""/>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <!--<li class="active"><a href="#">Home</a></li>-->
              <li class="dropdown active">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Master<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="kategori.html">Kategori</a></li>
                  <li><a href="satuan.html">Satuan</a></li>
                  <li><a href="barangmentah.html">Barang Mentah</a></li>
                  <li><a href="barangjadi.html">Barang Jadi</a></li>
                  <li><a href="barangjual.html">Barang Jual</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Proses<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="prosesbarangjadi.html">Barang Jadi</a></li>
                </ul>
              </li>
              <!--<li><a href="#">Page 2</a></li>
              <li><a href="#">Page 3</a></li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a class="navbar-brand" href="#">Admin Dapur</a></li>
              <li><button onclick="window.location.href='../login.html'" class="btn btn-danger navbar-btn"><span class="fa fa-sign-out "></span> Keluar</button></li>
            </ul>
          </div>
        </div>
      </nav>
    </section>
    <section id="content" class="container-fluid">
      <div class="row">
        <div class="col-md-2">
          <div class="panel panel-warning">
            <div class="panel-heading">
              Gambar Produk
            </div>
            <div class="panel-body">
              <div class="scroll-area">
                <div class="thumbnail">
                  <img src="MOCK UP A1 krem.png"/>
                </div>
                <div class="thumbnail">
                  <img src="MOCK UP B1 krem.png"/>
                </div>
                <div class="thumbnail">
                  <img src="MOCK UP C1 krem.png"/>
                </div>
                <div class="thumbnail">
                  <img src="MOCK UP D1 krem.png"/>
                </div>
                <div class="thumbnail">
                  <img src="MOCK UP E1 krem.png"/>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">

          <div class="panel panel-warning">
            <div class="panel-heading">
              Canvas
            </div>
            <div class="panel-body">
              <div>
                <canvas width="720" height="480" id="cvs"  style="display:block;margin:0 auto;"></canvas>
              </div>
            </div>
            <div class="panel-footer">
              <div class="row">
                <button class="btn" style="background-color:#ff1a1a;color:#ff1a1a;" onclick="warna('#ff1a1a')">test</button>
                <button class="btn" style="background-color:#ffff00;color:#ffff00;" onclick="warna('#ffff00')">test</button>
                <button class="btn" style="background-color:#e600e6;color:#e600e6;" onclick="warna('#e600e6')">test</button>
                <button class="btn" style="background-color:#1aff1a;color:#1aff1a;" onclick="warna('#1aff1a')">test</button>
                <button class="btn" style="background-color:#00bfff;color:#00bfff;" onclick="warna('#00bfff')">test</button>
                <button class="btn" style="background-color:#ffa31a;color:#ffa31a;" onclick="warna('#ffa31a')">test</button>
                <button class="btn" style="background-color:#ffdab3;color:#ffdab3;" onclick="warna('#ffdab3')">test</button>
                <a class="btn" download="my-file-name.png" id="btDownload" onclick="downloadgmbr()">Downlload Gambar</a><br><br>
              </div>
              <div class="row">
                <div class="col col-md-4">
                  <label>Upload Design Logo Sendiri</label>
                  <input type="file" class="form-control" accept="image/x-png,image/gif,image/jpeg" id="imageLoader"/>
                  <br>
                  <br>
                </div>
                <div class="col col-md-4">
                  <label>Position Uploaded Design</label>
                  <br>
                  <button class="btn" onclick="fUp()"><span class="fa fa-arrow-up "></span></button>
                  <button class="btn" onclick="fDown()"><span class="fa fa-arrow-down "></span></button>
                  <button class="btn" onclick="fLeft()"><span class="fa fa-arrow-left "></span></button>
                  <button class="btn" onclick="fRight()"><span class="fa fa-arrow-right "></span></button>

                  <br>
                  <br>
                </div>
                <div class="col col-md-4">
                  <label>Size Uploaded Design</label>
                  <br>
                  <button class="btn" onclick="fplus()"><span class="fa fa-plus "></span></button>
                  <button class="btn" onclick="fminus()"><span class="fa fa-minus"></span></button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-2">


          <div class="panel panel-warning">
            <div class="panel-heading">
              Gambar Templates
            </div>
            <div class="panel-body">
              <div class="scroll-area">
                <div class="thumbnail">
                  <img src="mens_hoodie_front.png" onclick="gntgmbr('g0','gT0')" id="g0"/>
                  <img style="display:none;" src="gambar text 1.png" id="gT0"/>
                  <label>Tersedia</label>
                  <br>
                  <label>Rp 18000</label>
                </div>
                <div class="thumbnail">
                  <img src="mens_longsleeve_front - Copy (2).png" onclick="gntgmbr('g1','gT1')" id="g1"/>
                  <img style="display:none;" src="gambar text 1.png" id="gT1"/>
                  <label>Tersedia</label>
                  <br>
                  <label>Rp 0</label>
                </div>
                <div class="thumbnail">
                  <img src="A1 copy.png" onclick="gntgmbr('g2','gT2')" id="g2"/>
                  <img style="display:none;" src="gambar text 1.png" id="gT2"/>
                  <label>Tersedia</label>
                  <br>
                  <label>Rp 0</label>
                </div>
                <div class="thumbnail">
                  <img src="C1 copy.png" onclick="gntgmbr('g3','gT2')" id="g3"/>
                  <label>Terjual</label>
                  <br>
                  <label>Rp 45000</label>
                </div>
                <div class="thumbnail">
                  <img src="D1 copy.png" onclick="gntgmbr('g4','gT2')" id="g4"/>
                </div>
                <div class="thumbnail">
                  <img src="E1 copy.png" onclick="gntgmbr('g5','gT2')" id="g5"/>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <section id="khusus_modal">
    </section>
    <script src="../assets/plugins/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="../assets/plugins/bootstrap/bootstrap.js" type="text/javascript"></script>
    <script src="../assets/plugins/dataTables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../assets/plugins/dataTables/dataTables.bootstrap.js" type="text/javascript"></script>

    <script>
    var canvas, ctx, bMouseIsDown = false, iLastX, iLastY,
    $save, $imgs,
    $convert, $imgW, $imgH,
    $sel;
    $('body').on('contextmenu', '#cvs', function(e){ return false; });
    var img2 = "";
    var imgT = "";
    var imgU = "";
    var xGmbr = 720;
    var yGmbr = 720;
    var yWarna = 0;
    var xULD = 0;
    var yULD = 0;
    var widthULD = 0;
    var heightULD = 0;
    var fkodewarna = "#ffffff";
    var imageLoader = document.getElementById('imageLoader');
    imageLoader.addEventListener('change', handleImage, false);


    function init () {
    canvas = document.getElementById('cvs');
    ctx = canvas.getContext('2d');
    draw();
    }


    function bind () {
      var link = document.createElement('a');
    link.innerHTML = 'download image';
    link.addEventListener('click', function(ev) {
    link.href = canvas.toDataURL();
    link.download = "mypainting.png";
    }, false);
    document.body.appendChild(link);

    }

    function gntgmbr(kodegambar,kodetext) {
    // Fill with gradient
    ctx.clearRect(0,0,canvas.width,canvas.height);
    var grd = ctx.createLinearGradient(0,0,600,400);
    grd.addColorStop(0,fkodewarna);
    grd.addColorStop(1,fkodewarna);
    // Fill with gradient
    img2 = document.getElementById(kodegambar);
    imgT = document.getElementById(kodetext);
    canvas.width = xGmbr;
    canvas.height = xGmbr * img2.height / img2.width;
    yWarna = xGmbr * img2.height / img2.width;
    ctx.fillStyle = grd;
    ctx.fillRect(0,0,xGmbr,yWarna);
    ctx.drawImage(imgT, 0, 0, xGmbr, xGmbr * img2.height / img2.width);

    if (imgU!="") {

    ctx.drawImage(imgU,xULD,yULD,widthULD,heightULD);
    }
    ctx.drawImage(img2, 0, 0, xGmbr, xGmbr * img2.height / img2.width);

    }

    function warna (kodewarna) {
    fkodewarna = kodewarna;
    // Fill with gradient
    ctx.clearRect(0,0,canvas.width,canvas.height);
    var grd = ctx.createLinearGradient(0,0,600,400);
    grd.addColorStop(0,kodewarna);
    grd.addColorStop(1,kodewarna);
    // Fill with gradient
    ctx.fillStyle = grd;
    ctx.fillRect(0,0,xGmbr,yWarna);
    ctx.drawImage(imgT, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
    if (imgU!="") {

    ctx.drawImage(imgU,xULD,yULD,widthULD,heightULD);
    }
    ctx.drawImage(img2, 0, 0, xGmbr, xGmbr * img2.height / img2.width);

    }

    function downloadgmbr(){
    watermark();
    var button = document.getElementById('btDownload');
    var dataURL = canvas.toDataURL('image/png');
    button.href = dataURL;
    }

    function watermark(){
    ctx.font = "30px Arial";
    ctx.fillStyle = "black";
    ctx.fillText("bikkinprodukku.com", 0.4 * xGmbr,0.4 * xGmbr * img2.height / img2.width);
    }


    function handleImage(e){
    var reader = new FileReader();
    reader.onload = function(event){
    imgU = new Image();
    imgU.onload = function(){
    xULD = 0.4*xGmbr;
    yULD = 1/2*xGmbr * imgU.height / imgU.width;
    widthULD = 1/4*xGmbr;
    heightULD = 1/4*xGmbr * imgU.height / imgU.width;
    ctx.clearRect(0,0,canvas.width,canvas.height);
    // Fill with gradient
    ctx.clearRect(0,0,canvas.width,canvas.height);
    var grd = ctx.createLinearGradient(0,0,600,400);
    grd.addColorStop(0,fkodewarna);
    grd.addColorStop(1,fkodewarna);
    // Fill with gradient
    canvas.width = xGmbr;
    canvas.height = xGmbr * img2.height / img2.width;
    yWarna = xGmbr * img2.height / img2.width;
    ctx.fillStyle = grd;
    ctx.fillRect(0,0,xGmbr,yWarna);
    ctx.drawImage(imgT, 0, 0, xGmbr, xGmbr * img2.height / img2.width);

    ctx.drawImage(imgU,xULD,yULD,widthULD,heightULD);
    ctx.drawImage(img2, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
    }
    imgU.src = event.target.result;
    }
    reader.readAsDataURL(e.target.files[0]);
    }
    function fUp() {
    // Fill with gradient
    ctx.clearRect(0,0,canvas.width,canvas.height);
    var grd = ctx.createLinearGradient(0,0,600,400);
    grd.addColorStop(0,fkodewarna);
    grd.addColorStop(1,fkodewarna);
    // Fill with gradient
    ctx.fillStyle = grd;
    ctx.fillRect(0,0,xGmbr,yWarna);
    ctx.drawImage(imgT, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
    var ybaru = yULD-10;
    yULD = ybaru;
    if (imgU!="") {

    ctx.drawImage(imgU,xULD,yULD,widthULD,heightULD);
    }
    ctx.drawImage(img2, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
    }
    function fDown() {
    // Fill with gradient
    ctx.clearRect(0,0,canvas.width,canvas.height);
    var grd = ctx.createLinearGradient(0,0,600,400);
    grd.addColorStop(0,fkodewarna);
    grd.addColorStop(1,fkodewarna);
    // Fill with gradient
    ctx.fillStyle = grd;
    ctx.fillRect(0,0,xGmbr,yWarna);
    ctx.drawImage(imgT, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
    var ybaru = yULD+10;
    yULD = ybaru;
    if (imgU!="") {

    ctx.drawImage(imgU,xULD,yULD,widthULD,heightULD);
    }
    ctx.drawImage(img2, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
    }
    function fLeft() {
    // Fill with gradient
    ctx.clearRect(0,0,canvas.width,canvas.height);
    var grd = ctx.createLinearGradient(0,0,600,400);
    grd.addColorStop(0,fkodewarna);
    grd.addColorStop(1,fkodewarna);
    // Fill with gradient
    ctx.fillStyle = grd;
    ctx.fillRect(0,0,xGmbr,yWarna);
    ctx.drawImage(imgT, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
    var xbaru = xULD-10;
    xULD = xbaru;
    if (imgU!="") {

    ctx.drawImage(imgU,xULD,yULD,widthULD,heightULD);
    }
    ctx.drawImage(img2, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
    }
    function fRight() {
    // Fill with gradient
    ctx.clearRect(0,0,canvas.width,canvas.height);
    var grd = ctx.createLinearGradient(0,0,600,400);
    grd.addColorStop(0,fkodewarna);
    grd.addColorStop(1,fkodewarna);
    // Fill with gradient
    ctx.fillStyle = grd;
    ctx.fillRect(0,0,xGmbr,yWarna);
    ctx.drawImage(imgT, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
    var xbaru = xULD+10;
    xULD = xbaru;
    if (imgU!="") {

    ctx.drawImage(imgU,xULD,yULD,widthULD,heightULD);
    }
    ctx.drawImage(img2, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
    }
    function fplus() {
    // Fill with gradient
    ctx.clearRect(0,0,canvas.width,canvas.height);
    var grd = ctx.createLinearGradient(0,0,600,400);
    grd.addColorStop(0,fkodewarna);
    grd.addColorStop(1,fkodewarna);
    // Fill with gradient
    ctx.fillStyle = grd;
    ctx.fillRect(0,0,xGmbr,yWarna);
    ctx.drawImage(imgT, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
    var xbaru = widthULD+10;
    widthULD = xbaru;
    heightULD = widthULD * imgU.height / imgU.width;
    if (imgU!="") {

    ctx.drawImage(imgU,xULD,yULD,widthULD,heightULD);
    }
    ctx.drawImage(img2, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
    }

    function fminus() {
    // Fill with gradient
    ctx.clearRect(0,0,canvas.width,canvas.height);
    var grd = ctx.createLinearGradient(0,0,600,400);
    grd.addColorStop(0,fkodewarna);
    grd.addColorStop(1,fkodewarna);
    // Fill with gradient
    ctx.fillStyle = grd;
    ctx.fillRect(0,0,xGmbr,yWarna);
    ctx.drawImage(imgT, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
    var xbaru = widthULD-10;
    widthULD = xbaru;
    heightULD = widthULD * imgU.height / imgU.width;
    if (imgU!="") {

    ctx.drawImage(imgU,xULD,yULD,widthULD,heightULD);
    }
    ctx.drawImage(img2, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
    }
    onload = init;
    </script>
  </body>
</html>