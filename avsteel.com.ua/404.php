<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

?>
<header>
	<title>Страница не найдена</title>
	<link rel="icon" type="image/x-icon" href="/bitrix/favicon.ico" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
</header>

<link rel="stylesheet" href="/bitrix/css/av_site/bootstrap.supermin.css" />
      
<style>
a:hover {
	color: #fff;
}
h1,h2,h3,h4,h5,h6{
	font-weight: bold;
	letter-spacing: 2px;
}
#av-blur-screen {
    background: rgba(0, 0, 0, .75)!important
}
/* -------------------------------------------------------------------- */
/* ---------------------------- blur screen --------------------------- */
/* -------------------------------------------------------------------- */
#av-blur-screen
	{
	background: #000;
	opacity: 0;
	position: fixed;
	top:    0;
	left:   0;
	right:  0;
	bottom: 0;
	}
@font-face {
    font-family: 'Myriad Pro';
    src: url(/local/templates/landing_av_steel/images-av-steel/MyriadPro-Regular.eot?#iefix) format('embedded-opentype');
    src: url(/local/templates/landing_av_steel/images-av-steel/MyriadPro-Regular.ttf);
    src: url(/local/templates/landing_av_steel/images-av-steel/MyriadPro-Regular.woff) format('woff');
    src: url(/local/templates/landing_av_steel/images-av-steel/MyriadPro-Regular.otf) format("opentype");
    font-weight: 400;
    font-style: normal
}

body{
    background-color: #FFF;
    color: #fff;
    font-family: "Myriad Pro", Arial!important;
    letter-spacing: 0!important
}
.bg-img {
	background: url(/upload/medialibrary/f27/bg-img-new.jpg) center center no-repeat;
	position: absolute;
	width: 100%;
	height: 100%;
	background-size: cover;
	z-index: -1;
	}
ul{
	display: flex;
	justify-content:center;
		font-size: 18px;
}
ul li {
	list-style-type: none;
}
.menu a {
	border-bottom: 1px solid rgba(255, 255, 255, .5);
    text-decoration: none!important;
    display: block;
    width: 100%;
    padding: 15px 40px;
}
.menu li a:hover {
    border-bottom: 1px solid #ED1C24;
    transition: 1s
}
	.social a {
		position: relative;
}
/***************************** MOBILE MENU ***************************/

#hamburger {
    background-color: rgba(255, 255, 255, .9);
    border-radius: 4px;
    cursor: pointer;
    height: 49px;
    left: 27px;
    top: 25px;
    text-align: center;
    position: fixed;
    width: 60px;
    z-index: 99999
}

#hamburger.open span {
    background-color: #FFF
}

#hamburger.open {
    background-color: transparent
}

#hamburger:hover span:nth-child(1) {
    top: 10px;
    -webkit-transition: .2s ease-in-out;
    -moz-transition: .2s ease-in-out;
    -o-transition: .2s ease-in-out;
    transition: .2s ease-in-out
}

#hamburger:hover span:nth-child(3) {
    top: 34px;
    -webkit-transition: .16s ease-in-out;
    -moz-transition: .16s ease-in-out;
    -o-transition: .16s ease-in-out;
    transition: .16s ease-in-out
}

#hamburger span {
    z-index: 99;
    display: block;
    position: absolute;
    height: 4px;
    margin-left: 11px;
    width: 64%;
    background-color: #000;
    border-radius: 5px;
    opacity: 1;
    -webkit-transform: rotate(0);
    -moz-transform: rotate(0);
    -o-transform: rotate(0);
    transform: rotate(0);
    -webkit-transition: .2s ease-in-out;
    -moz-transition: .2s ease-in-out;
    -o-transition: .2s ease-in-out;
    transition: .25s ease-in-out
}

#hamburger span:nth-child(1) {
    top: 10px
}

#hamburger span:nth-child(2) {
    top: 22px
}

#hamburger span:nth-child(3) {
    top: 34px
}

#hamburger.open span:nth-child(1) {
    top: 22px;
    -webkit-transform: rotate(135deg);
    -moz-transform: rotate(135deg);
    -o-transform: rotate(135deg);
    transform: rotate(135deg)
}

#hamburger.open span:nth-child(2) {
    opacity: 0;
    left: -30px;
    -webkit-transition: .16s ease-in-out;
    -moz-transition: .16s ease-in-out;
    -o-transition: .16s ease-in-out;
    transition: .16s ease-in-out
}

#hamburger.open span:nth-child(3) {
    top: 22px;
    -webkit-transform: rotate(-135deg);
    -moz-transform: rotate(-135deg);
    -o-transform: rotate(-135deg);
    transform: rotate(-135deg)
}

#mobile-menu {
    position: fixed;
    text-align: center;
    padding: 0;
    display: flex;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    flex-direction: column;
    align-items: inherit;
}

#mobile-menu li {
    margin: 15px 0
}

@media screen and (max-height:350px) {
    #mobile-menu li {
        margin: 10px
    }
}

#mobile-menu li a {
    color: #FFF;
    font-size: 22px;
    font-weight: 700
}

#mobile-menu li:hover a {
    color: #ff202a
}


.flex-menu{
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
	text-align: center;
}
.bg-mobile-menu {
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    z-index: 9999;
    background-color: rgba(18, 18, 18, .95)
}

svg {
    width: 45px;
    height: 45px;
}

/***********************************************/
a {text-decoration: none!important;color: #fff;}
#logo {
	background: url(/local/templates/landing_av_steel/images-av-steel/logo_AV.svg) center center no-repeat;
	background-size: contain;
	height: 120px;
	margin: 5% auto
}
.number-4,.number-0{
	font-weight: bold;
	margin: 0 20px;
	position: relative;
	top: -50px;
	margin-bottom: -50px;
	display: inline-block;
}
.red-btn{
	display: inline-block;
	background-color: red;
	padding: 10px 25px;
	margin: 20px 15px;
	border-radius: 4px;
	font-size: 18px;
	font-weight: bold;
	width: 160px;
    position: relative;
}

@media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
     .red-btn{
	font-size: 16px;
	}
}
.social ul li {
		margin: 10px;
}

svg {
	width: 45px;
}
	/***********************  NUMBERS *************************/
.number-4,.number-0{
	font-size: 225px;
}
.number-4:before{
	content: "4";
	color: rgba(255,255,255,0.15);
	position: absolute;
    right: 3px;
    font-size: 142%;
    top: -69px;
}
.second:before{
	content: "4";
	color: rgba(255,255,255,0.15);
	position: absolute;
    right: -50px;
    font-size: 142%;
    top: -69px;
}
.number-0:before{
	content: "0";
	color: rgba(255,255,255,0.15);
	position: absolute;
	font-size: 255px;
	left: -26px;
	font-size: 142%;
	top: -71px;
}
	/***********************  MEDIA *************************/
@media (min-width:1201px) {

}
@media (max-width:1200px) {
	.menu a {
		padding: 10px 25px;
	}
}

@media (max-width:515px) {
	.number-4,.number-0{
		font-size: 150px;
		margin: 0 8px;
		margin-bottom: -25%;
	}
		.number-4:before,
		.number-0:before,
		.second:before{
			display: none;
		}
	.red-btn {
		font-size: 11px;
		width: 130px;
	}
		h2{font-size: 20px;}
		h3{font-size: 18px;}
}
@media (max-width:350px) {
	.number-4,.number-0{
		font-size: 120px;
		margin: 0 8px;
		margin-bottom: -30%;
	}
	.red-btn {
		margin: 5px 15px;
		width: 160px;
	}
}
@media screen and (max-height: 820px){


}
</style>

<div class="main-wrap text-uppercase">

	<div id="mobile-menu-wrap" class="hidden-lg hidden-md">
		<div id="hamburger">
			<span></span><span></span><span></span>
		</div>

		<div class="bg-mobile-menu" hidden>
			<div class="flex-menu">
				<ul id="mobile-menu" class=" text-center text-uppercase">
					<li><a href="/#profnastil-mobile">профнастил</a></li>
					<li><a href="/#metalochereitsa">металлочерепица</a></li>
					<li><a href="/#ral_colors_href">ral цвета</a></li>
					<li><a href="/#how_we_work">как мы работаем</a></li>
					<li><a href="/blog/">блог</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="bg-img"></div>
  <div class="container text-center">
    <ul class="hidden-sm hidden-xs menu">
		<li><a href="/#profnastil-mobile">профнастил</a></li>
		<li><a href="/#metalochereitsa">металлочерепица</a></li>
		<li><a href="/#ral_colors_href">ral цвета</a></li>
		<li><a href="/#how_we_work">как мы работаем</a></li>
		<li><a href="/blog/">блог</a></li>
    </ul>

    <div id="logo"></div>

    <span class="number-4">4</span><span class="number-0">0</span><span class="number-4 second">4</span>
    
    <h2 >упс!</h2>
    <h3>запрошенная вами страница не найдена</h3>
  <a href="/" class="red-btn" onclick="history.back()">назад</a>
  <a href="/" class="red-btn">на главную</a>



	<div class="social">
		<ul>
			<li>
				<a href="https://www.vk.com/avmgua" target="_blank">
					<svg version="1.1"  x="0px" y="0px" viewBox="0 0 200 200" enable-background="new 0 0 200 200" xml:space="preserve">
						<g display="none">
							<g display="inline">
								<path fill="#CACACA" d="M195.1,42.4c-6.8,2.9-14.6,4.9-22.4,5.9c8.3-4.9,14.1-12.2,17.1-21c-7.8,4.4-16.1,7.3-24.9,9.3
		c-6.8-7.8-17.1-12.2-28.3-12.2c-21.5,0-39,17.1-39,38c0,2.9,0.5,5.9,1,8.8c-32.7-2-61.5-17.1-80.5-40c-3.4,5.9-5.4,12.2-5.4,19
		c0,13.2,6.8,24.9,17.6,31.7c-6.3,0-12.7-2-17.6-4.9v1c0,18.5,13.7,33.7,31.2,37.1c-3.4,1-6.8,1.5-10.2,1.5c-2.4,0-4.9,0-7.3-0.5
		c4.9,15.1,19.5,26.3,36.6,26.3c-13.2,10.2-30.2,16.1-48.8,16.1c-2.9,0-6.3,0-9.3-0.5c17.1,10.7,38,17.1,60,17.1
		c71.7,0,111.2-58,111.2-108.3V62C183.4,56.6,190.2,49.8,195.1,42.4z" />
							</g>
						</g>
						<g display="none">
							<path display="inline" fill="#CACACA" d="M142.9,23.9h-20c-22.4,0-37.1,14.6-37.1,37.1V78h-20c-2,0-2.9,1.5-2.9,2.9v24.9
		c0,1.5,1.5,2.9,2.9,2.9h20v62.9c0,1.5,1.5,2.9,2.9,2.9h26.3c2,0,2.9-1.5,2.9-2.9v-62.4h23.4c2,0,2.9-1.5,2.9-2.9V81.5
		c0-1-0.5-1.5-1-2c-0.5-0.5-1.5-1-2.4-1h-23.4V63.9c0-6.8,1.5-10.7,10.7-10.7H142c2,0,2.9-1.5,2.9-2.9V27.3
		C145.9,25.4,144.9,23.9,142.9,23.9z" />
						</g>
						<g id="XMLID_1_">
							<path id="XMLID_807_" fill="#FFFFFF" d="M171.2,119.5c6.3,8.3,13.7,16.1,19.5,25.4c2.4,3.9,4.9,8.3,6.8,13.2
		c2.4,6.8,0.5,14.1-4.4,14.6h-28.8c-7.3,1-13.2-2.9-18-9.8c-3.9-5.4-7.8-10.7-11.7-16.1c-1.5-2.4-3.4-4.4-5.4-5.9
		c-3.9-3.4-7.3-2.4-9.8,2.9c-2.4,5.4-2.9,11.2-2.9,17.6c-0.5,8.8-2.4,11.2-9.3,11.7c-14.6,1-28.3-2-41-11.7
		c-11.2-8.3-20-20-27.8-33.7C23.9,101.5,12.2,73.2,2,43.4c-2-7.3,0-10.7,5.4-10.7c9.3,0,18.5,0,28.3,0c3.9,0,6.3,2.9,7.8,7.8
		c4.9,16.1,11.2,31.7,19,45.9c2,3.9,4.4,7.8,7.3,10.2c3.4,2.9,5.9,2,7.3-2.9c1-2.9,1.5-6.3,1.5-9.8c1-11.2,1-22.4-0.5-33.7
		c-1-6.8-3.9-11.7-9.3-12.7c-2.9-0.5-2.4-2-1-3.9c2.4-3.4,4.4-5.9,8.8-5.9h32.7c4.9,1.5,6.3,4.4,6.8,10.7v46.8
		c0,2.4,1,10.2,4.4,12.2c2.9,1,4.9-2,6.3-3.9c7.8-10.7,13.2-23.4,18-36.6c2.4-5.9,3.9-11.7,5.9-17.6c1.5-4.4,3.4-6.8,7.3-6.3h31.2
		c1,0,2,0,2.9,0c5.4,1,6.8,3.9,4.9,10.7c-1.5,10.2-6.8,18.5-11.7,27.3c-5.4,9.3-10.7,18.5-16.1,27.8
		C164.9,107.8,165.4,112.2,171.2,119.5L171.2,119.5z" />
						</g>
					</svg>
					</a>
				</li>
	
				<li>
					<a href="https://www.facebook.com/avmg.com.ua/" target="_blank">
					<svg version="1.1"  x="0px" y="0px" viewBox="0 0 200 200" enable-background="new 0 0 200 200" xml:space="preserve">
						<g display="none">
							<g display="inline">
								<path fill="#CACACA" d="M195.1,42.4c-6.8,2.9-14.6,4.9-22.4,5.9c8.3-4.9,14.1-12.2,17.1-21c-7.8,4.4-16.1,7.3-24.9,9.3
		c-6.8-7.8-17.1-12.2-28.3-12.2c-21.5,0-39,17.1-39,38c0,2.9,0.5,5.9,1,8.8c-32.7-2-61.5-17.1-80.5-40c-3.4,5.9-5.4,12.2-5.4,19
		c0,13.2,6.8,24.9,17.6,31.7c-6.3,0-12.7-2-17.6-4.9v1c0,18.5,13.7,33.7,31.2,37.1c-3.4,1-6.8,1.5-10.2,1.5c-2.4,0-4.9,0-7.3-0.5
		c4.9,15.1,19.5,26.3,36.6,26.3c-13.2,10.2-30.2,16.1-48.8,16.1c-2.9,0-6.3,0-9.3-0.5c17.1,10.7,38,17.1,60,17.1
		c71.7,0,111.2-58,111.2-108.3V62C183.4,56.6,190.2,49.8,195.1,42.4z" />
							</g>
						</g>
						<g>
							<path fill="#FFFFFF" d="M142.9,23.9h-20c-22.4,0-37.1,14.6-37.1,37.1V78h-20c-2,0-2.9,1.5-2.9,2.9v24.9c0,1.5,1.5,2.9,2.9,2.9h20
		v62.9c0,1.5,1.5,2.9,2.9,2.9h26.3c2,0,2.9-1.5,2.9-2.9v-62.4h23.4c2,0,2.9-1.5,2.9-2.9V81.5c0-1-0.5-1.5-1-2c-0.5-0.5-1.5-1-2.4-1
		h-23.4V63.9c0-6.8,1.5-10.7,10.7-10.7H142c2,0,2.9-1.5,2.9-2.9V27.3C145.9,25.4,144.9,23.9,142.9,23.9z" />
						</g>
					</svg>
					</a>
				</li>
				<li>
					<a href="https://www.youtube.com/channel/UCuzA3Al_MKninYtzVrgMyOA" target="_blank">
					<svg version="1.1"  x="0px" y="0px" viewBox="0 0 200 200" enable-background="new 0 0 200 200" xml:space="preserve">
						<g display="none">
							<g display="inline">
								<path fill="#CACACA" d="M195.1,42.4c-6.8,2.9-14.6,4.9-22.4,5.9c8.3-4.9,14.1-12.2,17.1-21c-7.8,4.4-16.1,7.3-24.9,9.3
		c-6.8-7.8-17.1-12.2-28.3-12.2c-21.5,0-39,17.1-39,38c0,2.9,0.5,5.9,1,8.8c-32.7-2-61.5-17.1-80.5-40c-3.4,5.9-5.4,12.2-5.4,19
		c0,13.2,6.8,24.9,17.6,31.7c-6.3,0-12.7-2-17.6-4.9v1c0,18.5,13.7,33.7,31.2,37.1c-3.4,1-6.8,1.5-10.2,1.5c-2.4,0-4.9,0-7.3-0.5
		c4.9,15.1,19.5,26.3,36.6,26.3c-13.2,10.2-30.2,16.1-48.8,16.1c-2.9,0-6.3,0-9.3-0.5c17.1,10.7,38,17.1,60,17.1
		c71.7,0,111.2-58,111.2-108.3V62C183.4,56.6,190.2,49.8,195.1,42.4z" />
							</g>
						</g>
						<g display="none">
							<path display="inline" fill="#CACACA" d="M142.9,23.9h-20c-22.4,0-37.1,14.6-37.1,37.1V78h-20c-2,0-2.9,1.5-2.9,2.9v24.9
		c0,1.5,1.5,2.9,2.9,2.9h20v62.9c0,1.5,1.5,2.9,2.9,2.9h26.3c2,0,2.9-1.5,2.9-2.9v-62.4h23.4c2,0,2.9-1.5,2.9-2.9V81.5
		c0-1-0.5-1.5-1-2c-0.5-0.5-1.5-1-2.4-1h-23.4V63.9c0-6.8,1.5-10.7,10.7-10.7H142c2,0,2.9-1.5,2.9-2.9V27.3
		C145.9,25.4,144.9,23.9,142.9,23.9z" />
						</g>
						<g id="XMLID_1_" display="none">
							<path id="XMLID_807_" display="inline" fill="#CACACA" d="M168.8,119.5c6.3,8.3,13.7,16.1,19.5,25.4c2.4,3.9,4.9,8.3,6.8,13.2
		c2.4,6.8,0.5,14.1-4.4,14.6H162c-7.3,1-13.2-2.9-18-9.8c-3.9-5.4-7.8-10.7-11.7-16.1c-1.5-2.4-3.4-4.4-5.4-5.9
		c-3.9-3.4-7.3-2.4-9.8,2.9c-2.4,5.4-2.9,11.2-2.9,17.6c-0.5,8.8-2.4,11.2-9.3,11.7c-14.6,1-28.3-2-41-11.7
		c-11.2-8.3-20-20-27.8-33.7C21.5,101,10.2,72.2,0,42.9c-2.4-6.8-0.5-10.2,4.9-10.2c9.3,0,18.5,0,28.3,0c3.9,0,6.3,2.9,7.8,7.8
		c4.9,16.1,11.2,31.7,19,45.9c2,3.9,4.4,7.8,7.3,10.2c3.4,2.9,5.9,2,7.3-2.9c1-2.9,1.5-6.3,1.5-9.8c1-11.2,1-22.4-0.5-33.7
		c-1-6.8-3.9-11.7-9.3-12.7c-2.9-0.5-2.4-2-1-3.9c2.4-3.4,4.4-5.9,8.8-5.9h32.7c4.9,1.5,6.3,4.4,6.8,10.7v46.8
		c0,2.4,1,10.2,4.4,12.2c2.9,1,4.9-2,6.3-3.9c7.8-10.7,13.2-23.4,18-36.6c2.4-5.9,3.9-11.7,5.9-17.6c1.5-4.4,3.4-6.8,7.3-6.3h31.2
		c1,0,2,0,2.9,0c5.4,1,6.8,3.9,4.9,10.7c-2.4,10.2-7.3,19-12.2,27.8c-5.4,9.3-10.7,18.5-16.1,27.8
		C162.4,107.8,162.9,112.2,168.8,119.5L168.8,119.5z" />
						</g>
						<g id="XMLID_822_">
							<path id="XMLID_823_" fill="#FFFFFF" d="M189.3,44.4c-6.8-8.3-20-11.7-44.4-11.7H55.1c-24.9,0-38,3.4-45.4,12.7
		c-6.8,8.8-6.8,21.5-6.8,39V118c0,34.1,8.3,51.7,52.2,51.7h89.3c21.5,0,33.2-2.9,41-10.2c7.8-7.3,11.2-20,11.2-41V84.9
		C197.1,65.4,196.1,52.7,189.3,44.4z M127.3,105.9l-40.5,21c-1,0.5-2,0.5-2.9,0.5s-2.4-0.5-3.4-1c-2-1-2.9-2.9-2.9-5.4V78.5
		c0-2,1-4.4,2.9-5.4s4.4-1,6.3,0l40.5,21c2,1,3.4,3.4,3.4,5.4C130.7,102.4,129.8,104.4,127.3,105.9z" />
						</g>
					</svg>
					</a>
				</li>
				<li>
					<a href="https://twitter.com/avmgua" target="_blank">
					<svg version="1.1"  x="0px" y="0px" viewBox="0 0 200 200" enable-background="new 0 0 200 200" xml:space="preserve">
						<g>
							<g>
								<path fill="#FFFFFF" d="M195.1,42.4c-6.8,2.9-14.6,4.9-22.4,5.9c8.3-4.9,14.1-12.2,17.1-21c-7.8,4.4-16.1,7.3-24.9,9.3
		c-6.8-7.8-17.1-12.2-28.3-12.2c-21.5,0-39,17.1-39,38c0,2.9,0.5,5.9,1,8.8c-32.7-2-61.5-17.1-80.5-40c-3.4,5.9-5.4,12.2-5.4,19
		c0,13.2,6.8,24.9,17.6,31.7c-6.3,0-12.7-2-17.6-4.9v1c0,18.5,13.7,33.7,31.2,37.1c-3.4,1-6.8,1.5-10.2,1.5c-2.4,0-4.9,0-7.3-0.5
		c4.9,15.1,19.5,26.3,36.6,26.3c-13.2,10.2-30.2,16.1-48.8,16.1c-2.9,0-6.3,0-9.3-0.5c17.1,10.7,38,17.1,60,17.1
		c71.7,0,111.2-58,111.2-108.3V62C183.4,56.6,190.2,49.8,195.1,42.4z" />
							</g>
						</g>
					</svg>
					</a>
				</li>
			</ul>
		</div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(function() {
	$('.bg-img').css("height", $(document).height() + "px");
	$(window).on("resize", function() {
		$('.bg-img').css("height", $(document).height() + "px");
	});

	$("#hamburger").click(function(){$(this).toggleClass("open");$('.bg-mobile-menu').fadeToggle( "linear" ); });
	$('.bg-mobile-menu').click(function(){$(this).fadeToggle(  );$("#hamburger").removeClass("open");});

});


</script>