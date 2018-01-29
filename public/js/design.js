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
			function gntgmbr(kodegambar,kodetext, kode_template, harga_template) {
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
			$('#subtotal_biaya_tambahan').val(harga_template);
			$.ajax({
				type:"GET",
				url:"{{route('getGambarWarna', [$kode_produk, $kode_gambar])}}",
				data:"kode_template="+kode_template,
				success:function(data){
					$('#gambar-warna').empty();
					$.each(data, function(key, value) {
							const template = "<button class='btn' style='background-color:"+value.hex_color+";color:"+value.hex_color+";margin-right:5px' onclick=warna('"+value.hex_color+"')>test</button>";
							$('#gambar-warna').append(template);
					});
				}
			});
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