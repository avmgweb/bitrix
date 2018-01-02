<?
use \Bitrix\Main\Page\Asset;

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("О нас");
$APPLICATION->SetPageProperty("title",       "О компании АВ металл групп: миссия, ценности, принципы бизнеса");
$APPLICATION->SetPageProperty("description", "АВ металл групп ™ ✓Низкие цены ✓Прямы поставки ✓Собственное производство ✓Качественный сервис ☎(097)208-29-98 Звоните!");

CJSCore::Init(["av", "bootstrap"]);
Asset::getInstance()->addCss("/bitrix/css/av-site/pages/about.css");
Asset::getInstance()->addJs ("/bitrix/js/av-site/pages/about.js");
?>
<div class="av-vs-page-block">
	<div class="container">
		<div class="col-lg-7 col-md-7">
			<br>ООО "АВ металл групп" - крупная и независимая торговая компания в Украине. Мы начали свою деятельность на рынке металлопроката в июне 2009 года и через несколько лет стали масштабным украинским поставщиком.
			Сегодня "АВ металл групп" - один из лидеров среди компаний, представленных в этом бизнес-сегменте. Мы предоставляем потребителям широкий выбор сортового, фасонного, трубного и плоского металлопроката. Сотрудничая с известными мировыми производителями, обеспечиваем покупателей надежной и качественной продукцией. Компания продолжает развиваться, открывая новые филиалы и металлобазы по всей Украине.
		</div>
		<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1">
			<img class="av-vs-page-logo" alt="АВ металл групп" title="АВ металл групп" src="/include/logo.svg">
		</div>
	</div>
</div>

<div class="av-vs-page-block-fon-caunt">
	<div class="container ">
		<div>
			<div class="col-lg-3 content col-md-3 col-sm-6">
				<div class="av-vs-page-circle counter">2000</div>
				<div>Позиций<br>металлопроката</div>
			</div>
			<div class="col-lg-3 content col-md-3 col-sm-6">
				<div class="av-vs-page-circle counter">278</div>
				<div>Розничные<br>металлобазы</div>
			</div>
			<div class="col-lg-3 content col-md-3 col-sm-6">
				<div class="av-vs-page-circle counter">48</div>
				<div>Оптовый<br>филиал</div>
			</div>
			<div class="col-lg-3 content col-md-3 col-sm-6">
				<div class="av-vs-page-circle counter">8</div>
				<div>Лет на рынке<br>металлопроката</div>
			</div>
		</div>
	</div>
</div>

<div class="av-vs-page-block">
	<div class="container">
		<div class="av-vs-page-block-title">
			Преимущества работы с нами
		</div>
		<div class="col-lg-10 col-lg-offset-1">
			<p class="av-vs-page-block-subtitle">
				Широкий ассортимент товаров, качественные услуги, точное оперативное и надежное решение любого вопроса получают клиенты компании "АВ Металл групп".
				Мы предоставляем выгодные условия сотрудничества и заинтересованы в надежном и долгосрочном партнерстве.
			</p>
		</div>
		<div class="row" >
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img1></div>
				<div class="av-vs-page-title-sm-block">НАДЕЖНОСТЬ И<br>РАЗВИТИЕ</div>
				<div class="av-vs-page-text-sm-block">Нас выбрали более 20000 украинских покупателей. Среди них наиболее крупные промышленные и строительные компании.</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img2></div>
				<div class="av-vs-page-title-sm-block">ШИРОКАЯ СЕТЬ<br>МЕТАЛЛОБАЗ</div>
				<div class="av-vs-page-text-sm-block">Порядка 278 металлобаз представлены во всех регионах страны, что обеспечивает удобство каждому покупателю.</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img3></div>
				<div class="av-vs-page-title-sm-block">ШИРОКИЙ<br>АССОРТИМЕНТ</div>
				<div class="av-vs-page-text-sm-block">Свыше 650 самых востребованных товарных позиций представлены в 8 категориях. Мы всегда предложим Вам больше.</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img4></div>
				<div class="av-vs-page-title-sm-block">КОНКУРЕНТНАЯ<br>СТОИМОСТЬ</div>
				<div class="av-vs-page-text-sm-block">Качественный сервис и активное производство формируют лояльные цены на продукцию и услуги нашей компании</div>
			</div>
		</div>
		<div class="row" >
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img5></div>
				<div class="av-vs-page-title-sm-block">ДОСТАВКА ПО ВСЕЙ<br>УКРАИНЕ</div>
				<div class="av-vs-page-text-sm-block">Наш центр логистики и широкий собственный автопарк позволяют доставить товар клиенту в кратчайшие сроки.</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img6></div>
				<div class="av-vs-page-title-sm-block">ВЗАИМОВЫГОДНОЕ<br>СОТРУДНИЧЕСТВО</div>
				<div class="av-vs-page-text-sm-block">Компания заинтересована в надежном партнерстве. Мы поставляем продукцию от известных производителей с мировым именем.</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img7></div>
				<div class="av-vs-page-title-sm-block">СЕРТИФИКАТЫ<br>СООТВЕТСТВИЯ</div>
				<div class="av-vs-page-text-sm-block">Продукция соответствует мировым стандартам на нержавеющую сталь EN, DIN, AISI. Мы уверенно заявляем о качестве.</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img8></div>
				<div class="av-vs-page-title-sm-block">СТАБИЛЬНОЕ<br>ТРУДОУСТРОЙСТВО</div>
				<div class="av-vs-page-text-sm-block">Компания заинтересована в обучении и развитии персонала, обеспечивая при этом стабильную работу и карьерный рост.</div>
			</div>
		</div>
	</div>
</div>

<div class="av-vs-page-block-employees">
	<div class="container">
		<div class="av-vs-page-block-title">Национальный производитель</div>
		<div class="av-vs-page-block-subtitle">Компания занимается производством продукции 8 категорий металлопроката на высокотехнологичном оборудовании востребованного в современном строительстве. Мы производим арматуру, проволоку, круглый прокат, профильные трубы, профнастил, металлические сетки и просечно-вытяжные листы. При изготовлении профильных труб мы используем современные технологии обработки металла, что существенно повышает качество конечного продукта. В 2013 году мы основали новое направление на рынке металлопроката, наладив производство профилированных листов и металлочерепицы.</div>
	</div>
</div>

<div class="av-vs-page-block">
	<div class="container">
		<div class="av-vs-page-block-title">Социальная ответственность</div>
		<div class="av-vs-page-block-subtitle">Компания "АВ металл групп" активно участвует в социально-общественной жизни страны. В первую очередь мы оказываем материально-техническую поддержку социально-незащищенным категориям населения: утепляем детские дома, поддерживаем семьи участников АТО.</div>
	</div>
</div>
<?require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"?>