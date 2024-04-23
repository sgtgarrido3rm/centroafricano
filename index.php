<?php 
	require_once("admin/inc/config.php");

	$titulo = '';
	$texto 	= '';

	$query = "SELECT * FROM principal";

	$stmt = mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt, $query))
    	exit('SQL error');

	//$txtPesq = 'NAÇÃO CABINDA';
	
	//mysqli_stmt_bind_param($stmt, 'i', $txtPesq);
	mysqli_stmt_execute($stmt);
	$res = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
	
	if($res){
	//echo "<pre>"; var_dump($res); die();		
		//while($row = mysqli_fetch_array($res)){
			//echo "<pre>"; var_dump($res); die();
			$titulo = utf8_encode($res["txtTitulo"]);
			$texto 	= utf8_encode($res["txtTexto"]);
			$imagem = $res["txtImagem"];


		//}
	}

	mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Centro Africano Oxalá e Iemanjá</title>
<meta charset="UTF-8">
<meta name="description" content="LibChurch Event Template">
<meta name="keywords" content="event, libChurch, creative, html">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="img/favicon_io/favicon-32x32.png" type="image/x-icon" />

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora:400,400i" rel="stylesheet">

<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/font-awesome.min.css" />
<link rel="stylesheet" href="css/themify-icons.css" />
<link rel="stylesheet" href="css/style.css" />
<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<script nonce="78ea1a91-c148-4b04-a622-702054fbed20">(function(w,d){!function(bv,bw,bx,by){bv[bx]=bv[bx]||{};bv[bx].executed=[];bv.zaraz={deferred:[],listeners:[]};bv.zaraz.q=[];bv.zaraz._f=function(bz){return function(){var bA=Array.prototype.slice.call(arguments);bv.zaraz.q.push({m:bz,a:bA})}};for(const bB of["track","set","debug"])bv.zaraz[bB]=bv.zaraz._f(bB);bv.zaraz.init=()=>{var bC=bw.getElementsByTagName(by)[0],bD=bw.createElement(by),bE=bw.getElementsByTagName("title")[0];bE&&(bv[bx].t=bw.getElementsByTagName("title")[0].text);bv[bx].x=Math.random();bv[bx].w=bv.screen.width;bv[bx].h=bv.screen.height;bv[bx].j=bv.innerHeight;bv[bx].e=bv.innerWidth;bv[bx].l=bv.location.href;bv[bx].r=bw.referrer;bv[bx].k=bv.screen.colorDepth;bv[bx].n=bw.characterSet;bv[bx].o=(new Date).getTimezoneOffset();if(bv.dataLayer)for(const bI of Object.entries(Object.entries(dataLayer).reduce(((bJ,bK)=>({...bJ[1],...bK[1]})))))zaraz.set(bI[0],bI[1],{scope:"page"});bv[bx].q=[];for(;bv.zaraz.q.length;){const bL=bv.zaraz.q.shift();bv[bx].q.push(bL)}bD.defer=!0;for(const bM of[localStorage,sessionStorage])Object.keys(bM||{}).filter((bO=>bO.startsWith("_zaraz_"))).forEach((bN=>{try{bv[bx]["z_"+bN.slice(7)]=JSON.parse(bM.getItem(bN))}catch{bv[bx]["z_"+bN.slice(7)]=bM.getItem(bN)}}));bD.referrerPolicy="origin";bD.src="../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(bv[bx])));bC.parentNode.insertBefore(bD,bC)};["complete","interactive"].includes(bw.readyState)?zaraz.init():bv.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head>
<body>

<div id="preloder">
<div class="loader"></div>
</div>

<div class="top-nav-section hidden-xs">
<div class="container">
<div class="row">
<div class="col-sm-3 col-md-3 col-lg-3">
<div class="social">
<a href="https://www.facebook.com/familiaorumilaia/" target="_blank"><i class="ti-facebook"></i></a>
<a href="https://www.instagram.com/paifabiodeoxala/" target="_blank"><i class="ti-instagram"></i></a>
<a href="https://www.youtube.com/@paifabiodeoxala3715" target="_blank"><i class="ti-youtube"></i></a>
</div>
</div>

<div class="col-sm-6 col-md-7 col-lg-6">
	<!--div class="counter-top">
		<h5>Upcoming Event:</h5>
		<div class="counter">
		<div class="counter-item"><h4>10</h4>Days</div>
		<div class="counter-item"><h4>08</h4>hours</div>
		<div class="counter-item"><h4>40</h4>Mins</div>
		<div class="counter-item"><h4>56</h4>secs</div>
		</div>
		<a href="#" class="top-readmore hidden-sm">readmore</a>
	</div-->
</div>

<div class="col-sm-3 col-md-2 col-lg-3">
<div class="user-input">
<a href="admin/index.php">Minha conta <i class="fa fa-angle-down"></i></a>
</div>
</div>
</div>
</div>
</div>


<header class="header-section">
<div class="container">

<a href="index-2.html" class="site-logo"><img src="img/favicon_io/favicon.ico" alt=""></a>
<!--a href="#" class="site-btn hidden-xs">send donation</a-->

<div class="nav-switch">
<i class="fa fa-bars"></i>
</div>
<nav class="main-menu">
<ul>
<li class="active"><a href="index.html">Home</a></li>
<li><a href="javascript: void(0);">Sobre Nós</a></li>
<li><a href="javascript: void(0);">Sessões</a></li>
<li><a href="javascript: void(0);">Eventos</a></li>
<li><a href="javascript: void(0);">Contato</a></li>
</ul>
</nav>
</div>
</header>


<section class='hero-section set-bg' data-setbg='img/orixa-oxala-imagem-1210x423.jpg'>
<div class='hero-content'>
<div class='hc-inner'>
<div class='container'>
<h2>Centro Africano Oxalá e Iemanjá</h2>
<p>Babalorixá Fábio de Oxalá</p>
<!--a href='#' class='site-btn sb-wide sb-line'>join with us</a-->
</div>
</div>
</div>
</section>

<?php	
	$sectionContador = "
		<section class='event-section'>
			<div class='container'>
			<div class='row'>
			<div class='col-md-5 col-lg-6'>

			<div class='event-info'>
			<div class='event-date'>
			<h2>22</h2>
			abr
			</div>
			<h3>Homenagem ao Pai Ogum</h3>
			<p><i class='fa fa-calendar'></i> 19:30 hs <i class='fa fa-map-marker'></i> Rua Manoel Lentz da Silva, 23, Santa Tereza, Porto Alegre/RS</p>
			</div>
			</div>

			<div class='col-md-7 col-lg-6'>
				<div class='counter' id='getting-started'>
					<div class='counter-item'><h4>10</h4>Days</div>
					<div class='counter-item'><h4>08</h4>hours</div>
					<div class='counter-item'><h4>40</h4>Mins</div>
					<div class='counter-item'><h4>56</h4>secs</div>
				</div>

				

				<!--a href='#' class='site-btn sb-light-line'>Read more</a-->
			</div>

			</div>
			</div>
		</section><br />
	";

	$calendario = true;
	if ($calendario) 
		echo $sectionContador;
?>

<section class="event-sectionSpotify">
<div class="container">
	<div class="row">
		<div class="col-md-5 col-lg-6">
			<iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/71c21FLvpdm4YfiKRA4Xcu?utm_source=generator" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
		</div>

		<!--div class='col-md-7 col-lg-6'>
			<audio controls>
  				<source src="horse.ogg" type="audio/ogg">
  				<source src="horse.mp3" type="audio/mpeg">
				Your browser does not support the audio element.
			</audio>
		</div>

		<div class='col-md-7 col-lg-6'>
			<audio controls>
  				<source src="horse.ogg" type="audio/ogg">
  				<source src="horse.mp3" type="audio/mpeg">
				Your browser does not support the audio element.
			</audio>
		</div-->

	</div>
</div>
</section>

<section class="about-section spad">
<div class="container">
<div class="row">
<div class="col-md-6 about-content">
<h2><?=$titulo?></h2>
<p align="justify"><?=$texto?></p>
<!--a href="#" class="site-btn sb-wide">join with us</a-->
</div>
<div class="col-md-6 about-img">
<img src="img/<?=$imagem?>" alt="">
</div>
</div>
</div>
</section>

<section class="services-section spad">
<div class="container">
<div class="row">
<div class="col-sm-4">
<div class="service-box">
<h4><i class="fa fa-fire"></i>Nossos Valores</h4>
<p align="justify">Um dos nossos valores mais importantes é o respeito. Respeitamos nossos ancestrais e suas tradições, bem como as diversas origens e identidades dos membros de nossa comunidade. Isso significa que nos esforçamos para criar um espaço seguro e inclusivo para todos os envolvidos, independentemente de sua raça, gênero, orientação sexual ou qualquer outra característica pessoal. Nossos valores de respeito, colaboração e aprendizagem contínua são a base de nossa comunidade de batuque.</p>
<!--a href="#" class="s-readmore">Readmore <i class="fa fa-angle-double-right"></i></a-->
</div>
</div>
<div class="col-sm-4">
<div class="service-box">
<h4><i class="fa fa-eye"></i>Nossa Visão</h4>
<p align="justify">Nosso objetivo é criar um ambiente acolhedor e seguro para todas as pessoas interessadas em cultuar a religião africana, bem como melhor atender o nosso cliente. Os atendimentos/consultas são realizadas de forma presencial ou online, garantido assim que todos tenham acesso a casa de religião para a resolução de seus problemas. Desejamos que nosso grupo seja formado por membros de diferentes idades, origens e experiências, a fim de refletir a diversidade da sociedade em que vivemos. Além disso, buscamos manter a conexão com a história e as tradições que cercam o batuque. Reconhecemos a importância de honrar e respeitar os ancestrais que desenvolveram e transmitiram essas práticas ao longo dos séculos.</p>
<!--a href="#" class="s-readmore">Readmore <i class="fa fa-angle-double-right"></i></a-->
</div>
</div>
<div class="col-sm-4">
<div class="service-box">
<h4><i class="fa fa-heart"></i>Nossa Missão</h4>
<p align="justify">Nossa missão é promover e preservar o batuque como uma expressão cultural brasileira rica e diversa. Acreditamos que essa prática musical é um patrimônio cultural inestimável que merece ser valorizado e compartilhado com as gerações presentes e futuras. Outra parte importante de nossa missão é compartilhar nossa música e nossa cultura com a comunidade mais ampla. Acreditamos que o batuque pode ser uma ferramenta para promover a inclusão social e aumentar a conscientização sobre a história e a cultura afro-brasileiras.</p>
<!--a href="#" class="s-readmore">Readmore <i class="fa fa-angle-double-right"></i></a-->
</div>
</div>
</div>
</div>
</section>


<section class="sermon-section spad">
<div class="section-title">
<!--span>Oxum</span>
<h2>Frase do Dia</h2-->
</div>
<div class="sermon-warp">
<div class="sermon-left-bg set-bg" data-setbg="img/oxum.jpg"></div>
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-6">
<div class="sermon-content">
<h2>Oxum</h2>
<ul class="sermon-info">
<!--li>Sermon From: <span>Vincent John</span></li-->
<li>Saudação: <span>Ora Yê Yê Ô, Mãe Oxum!</span></li>
<li><span></span></li>
</ul>
<p align="justify">"Mamãe Oxum, que eu seja como suas águas doces que seguem desbravadoras no curso dos rios, entrecortando pedras e se precipitando as cachoeiras, sem parar"</p>
<!--div class="icon-links">
<a href="#"><i class="ti-link"></i></a>
<a href="#"><i class="ti-zip"></i></a>
<a href="#"><i class="ti-headphone"></i></a>
<a href="#"><i class="ti-import"></i></a>
</div-->
</div>
</div>
</div>
</div>
</div>
</section>


<section class="event-list-section spad">
<div class="container">
<div class="row">
<div class="col-md-6">
<div class="section-title title-left">
<span>Sobre o Terreiro</span>
<h2>Linhas de Trabalho</h2>
</div>
</div>
<!--div class="col-md-6 text-right event-more">
 <a href="#" class="site-btn">view all events</a>
</div-->
</div>
<div class="event-list">

<div class="el-item">
<div class="row">
<div class="col-md-4">
<div class="el-thubm set-bg" data-setbg="img/Ciganos.jpg"></div>
</div>
<div class="col-md-8">
<div class="el-content">
<div class="el-header">
<!--div class="el-date">
<h2>20</h2>
may
</div-->
<h3>Ciganos do Oriente</h3>
<!--div class="el-metas">
<div class="el-meta"><i class="fa fa-user"></i> Vincent John</div>
<div class="el-meta"><i class="fa fa-calendar"></i> Monday, 08:00 Am </div>
<div class="el-meta"><i class="fa fa-map-marker"></i> Central District, Riga, LV-1050, Latvia</div>
</div-->
</div>
<p align="justify">A linha Ciganos do oriente é pura, linha auxiliar da umbanda. Ela é formada por espíritos que trabalham principalmente em processos de curas físicas e emocionais. São conhecedores de alquimia, astrologia, tarot, medicina oriental e vários conhecimentos milenares.</p>
<!--a href="#" class="site-btn sb-line">Read more</a-->
</div>
</div>
</div>
</div>

<div class="el-item">
<div class="row">
<div class="col-md-4">
<div class="el-thubm set-bg" data-setbg="img/Umbanda.png"></div>
</div>
<div class="col-md-8">
<div class="el-content">
<div class="el-header">
<!--div class="el-date">
<h2>16</h2>
oct
</div-->
<h3>Umbanda</h3>
<!--div class="el-metas">
<div class="el-meta"><i class="fa fa-user"></i> Vincent John</div>
<div class="el-meta"><i class="fa fa-calendar"></i> Monday, 08:00 Am </div>
<div class="el-meta"><i class="fa fa-map-marker"></i> Central District, Riga, LV-1050, Latvia</div>
</div-->
</div>
<p align="justify">A umbanda é um ponto muito forte de luz espiritual, é sinceridade, força de energia, com o intuito de caridade. A linha branca, é uma linha pura na qual trabalhamos. Nosso objetivo, nunca é ter a nossa verdade como absoluta, sempre respeitando as demais opiniões.</p>
<!--a href="#" class="site-btn sb-line">Read more</a-->
</div>
</div>
</div>
</div>

<div class="el-item">
<div class="row">
<div class="col-md-4">
<div class="el-thubm set-bg" data-setbg="img/Kabala.png"></div>
</div>
<div class="col-md-8">
<div class="el-content">
<div class="el-header">
<!--div class="el-date">
<h2>20</h2>
may
</div-->
<h3>Kabala de Boi Luciferiana</h3>
<!--div class="el-metas">
<div class="el-meta"><i class="fa fa-user"></i> Vincent John</div>
<div class="el-meta"><i class="fa fa-calendar"></i> Monday, 08:00 Am </div>
<div class="el-meta"><i class="fa fa-map-marker"></i> Central District, Riga, LV-1050, Latvia</div>
</div-->
</div>
<p align="justify">A kabala de boi é a mais antiga e mais significativa sabedoria do mundo. É o instrumento de transformação, cura do corpo físico, paz e prosperidade levando-nos ao caminho da luz, segundo os seus ensinamentos é a plenitude de todas as nossas realizações.p>
<!--a href="#" class="site-btn sb-line">Read more</a-->
</div>
</div>
</div>
</div>

</div>
</div>
</section>


<section class="donate-section spad set-bg" data-setbg="img/Umbanda2.jpg">
<div class="container">
<div class="row">
<div class="col-md-6 col-lg-7 donate-content">
<h2>Ser Umbandista</h2>

<p align="justify">É se dar, acima de tudo a um trabalho espiritual. É saber respeitar para ser respeitado, é saber amar para ser amado, é saber ouvir para ser escutado, é saber dar um pouco de si para receber um pouco de Deus dentro de si. Não iremos deixar que nossa umbanda seja deixada de lado, esquecer a nossa umbanda é esquecer de ser religioso e esquecer do nosso propósito neste plano. A caridade, irmandade, ajuda aos necessitados.
</p>
</div>

<!--div class="col-md-6 col-lg-5">
<div class="donate-card">
<h2>$45.000<span>Remaining to helps</span></h2>
<div class="donate-progress-bar">
<div class="pb-inner">
<span>60%</span>
</div>
</div>
<div class="donate-progress-info">
<div class="di-left">
Raised: <span>$50,000</span>
</div>
<div class="di-right">
Goal: <span>$95,000</span>
</div>
</div>
<a href="#" class="site-btn sb-full">DONATE NOW</a>
</div>
</div-->

</div>
</div>
</section>


<section class="blog-section spad">
<div class="container">
<div class="section-title">
<span>Trabalhos da Casa</span>
<h2>veja alguns</h2>
</div>
<div class="row">
<div class="col-sm-6 col-md-4">
<div class="blog-item">
<div class="bi-thumb set-bg" data-setbg="img/Ogum.jpg"></div>
<div class="bi-content">
<div class="date">Sessão em 2022<br />&nbsp;</div>
<h4><a href="single-blog.html">Ogum da Lua</a></h4>
<!--div class="bi-author">by <a href="#">Sofia Joelsson</a></div>
<a href="#" class="bi-cata">Hope & Faithful</a-->
</div>
</div>
</div>
<div class="col-sm-6 col-md-4">
<div class="blog-item">
<div class="bi-thumb set-bg" data-setbg="img/QuebraDemanda.jpg"></div>
<div class="bi-content">
<div class="date">Quebra de Demanda - entre em contato e tire suas dúvidas</div>
<h4><a href="single-blog.html">Exú Caveira</a></h4>
<!--div class="bi-author">by <a href="#">Sofia Joelsson</a></div>
<a href="#" class="bi-cata">color Story</a-->
</div>
</div>
</div>
<div class="col-sm-6 col-md-4">
<div class="blog-item">
<div class="bi-thumb set-bg" data-setbg="img/Buzios.jpg"></div>
<div class="bi-content">
<div class="date">Jogo de Búzios<br />&nbsp;</div>
<h4><a href="single-blog.html">Agende seu horário</a></h4>
<!--div class="bi-author">by <a href="#">Sofia Joelsson</a></div>
<a href="#" class="bi-cata">Sermon & Pray</a-->
</div>
</div>
</div>
</div>
</div>
</section>


<section class="newsletter-section">
<!--div class="container">
<div class="row">
<div class="col-sm-12 col-md-7">
<h4>Subscribe And Tell Us Real Story About Your Journey</h4>
</div>
<div class="col-sm-8 col-md-5 col-sm-offset-2 col-md-offset-0">
<form class="newsletter-form">
<input type="email" placeholder="Enter your email">
<button class="nl-send-btn">subscribe</button>
</form>
</div>
</div>
</div-->
</section>


<section class="footer-top-section spad">
<div class="container">
<div class="row">
<div class="col-sm-6 footer-top-content">
<div class="section-title title-left">
<h2>Contato</h2>
</div>
<h3>Centro Africano Oxalá e Iemanja - Nação Cabinda</h3>
<p>Rua Manoel Lentz da Silva, 23 - Santa Tereza, Porto Alegre/RS</p>
<p><span>Email:</span> <a href="javascript: void(0);" class="__cf_email__" data-cfemail="50393e363f10333f3c3f223c39327e333f3d">[email@centroafricanooxalaeiemanja.com.br]</a></p>
<h4>Telefone:</h4>
<h5>+55 (51) 98939–0339</h5>
</div>
</div>
</div>

<div class="map-area" id="map-canvas"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110480.2430312993!2d-51.34571942667465!3d-30.07964589999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x951983a5bdf9ef67%3A0xea4c0fa2f0242b8!2sCentro%20Africano%20Oxal%C3%A1%20e%20Iemanj%C3%A1%20-%20Na%C3%A7%C3%A3o%20Cabinda%20-%20Pai%20F%C3%A1bio%20de%20Oxal%C3%A1!5e0!3m2!1spt-BR!2sbr!4v1680901704756!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
</section>


<footer class="footer-section">
<div class="container">
<div class="row">
<div class="col-sm-6 copyright">

Copyright &copy;<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> Todos os direitos reservados | Desenvlvido por Garrido

</div>
<div class="col-sm-6">
<div class="social">
<a href="https://www.facebook.com/familiaorumilaia/" target="_blank"><i class="ti-facebook"></i></a>
<a href="https://www.instagram.com/paifabiodeoxala/" target="_blank"><i class="ti-instagram"></i></a>
<a href="https://www.youtube.com/@paifabiodeoxala3715" target="_blank"><i class="ti-youtube"></i></a>
</div>
</div>
</div>
</div>
</footer>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery.countdown.js"></script>
<script src="js/main.js"></script>

<script type="text/javascript">
  $("#getting-started")
  .countdown("2023/04/22", function(event) {
    $(this).text(
      event.strftime('%D days %H:%M:%S')
    );
  });
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo"></script>
<script src="js/map.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v2b4487d741ca48dcbadcaf954e159fc61680799950996" integrity="sha512-D/jdE0CypeVxFadTejKGTzmwyV10c1pxZk/AqjJuZbaJwGMyNHY3q/mTPWqMUnFACfCTunhZUVcd4cV78dK1pQ==" data-cf-beacon='{"rayId":"7b4515f99fa0a52f","version":"2023.3.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/libchurch/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Apr 2023 20:45:06 GMT -->
</html>