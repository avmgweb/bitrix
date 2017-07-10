<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';

$APPLICATION->SetTitle("Про нас");
$APPLICATION->SetPageProperty("title",       "Про компанію АВ метал груп: місія, цінності, принципи бізнесу");
$APPLICATION->SetPageProperty("description", "АВ метал груп ™ ✓Нізкіе ціни ✓Прями поставки ✓Собственное виробництво ✓Качественний сервіс ☎ (097) 208-29-98 Телефонуйте!");

CJSCore::Init(["av_site", "bootstrap"]);
$APPLICATION->SetAdditionalCSS('/bitrix/css/av_site/pages/about.css');
$APPLICATION->AddHeadScript   ('/bitrix/js/av_site/pages/about.js');
?>
<div class="av-vs-page-block">
	<div class="container">
		<div class="col-lg-7 col-md-7">
			ТОВ "АВ метал груп" - велика і незалежна торгова компанія в Україні. Ми почали свою діяльність на ринку металопрокату в червні 2009 року і через кілька років стали масштабним українським постачальником.
			Сьогодні "АВ метал груп" - один з лідерів серед компаній, представлених в цьому бізнес-сегменті. Ми надаємо споживачам широкий вибір сортового, фасонного, трубного і плоского металопрокату. Співпрацюючи з відомими світовими виробниками, забезпечуємо покупців надійної і якісною продукцією. Компанія продовжує розвиватися, відкриваючи нові філії і металобази по всій Україні.
		</div>
		<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1">
			<img class="av-vs-page-logo" alt="АВ метал груп" title="АВ метал груп" src="/include/logo.svg">
		</div>
	</div>
</div>

<div class="av-vs-page-block-fon-caunt">
	<div class="container ">
		<div>
			<div class="col-lg-3 content col-md-3 col-sm-6">
				<div class="av-vs-page-circle counter">2000</div>
				<div>Позицій<br>металопрокату</div>
			</div>
			<div class="col-lg-3 content col-md-3 col-sm-6">
				<div class="av-vs-page-circle counter">278</div>
				<div>Роздрібні<br>металобази</div>
			</div>
			<div class="col-lg-3 content col-md-3 col-sm-6">
				<div class="av-vs-page-circle counter">48</div>
				<div>Оптова<br>філія</div>
			</div>
			<div class="col-lg-3 content col-md-3 col-sm-6">
				<div class="av-vs-page-circle counter">8</div>
				<div>Років на ринку<br>металопрокату</div>
			</div>
		</div>
	</div>
</div>

<div class="av-vs-page-block">
	<div class="container">
		<div class="av-vs-page-block-title">
			Переваги роботи з нами
		</div>
		<div class="col-lg-10 col-lg-offset-1">
			<p class="av-vs-page-block-subtitle">
				Широкий асортимент товарів, якісні послуги, точне оперативне і надійне рішення будь-якого питання отримують клієнти компанії "АВ Метал групп".
				Ми надаємо вигідні умови співпраці і зацікавлені в надійному і довгостроковому партнерство.
			</p>
		</div>
		<div class="row" >
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img1></div>
				<div class="av-vs-page-title-sm-block">НАДІЙНІСТЬ ТА<br>РОЗВИТОК</div>
				<div class="av-vs-page-text-sm-block">Нас вибрали більш 20000 українських покупців. Серед них найбільші промислові та будівельні компанії.</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img2></div>
				<div class="av-vs-page-title-sm-block">РОЗГАЛУЖЕНА СИСТЕМА<br>МЕТАЛОБАЗ</div>
				<div class="av-vs-page-text-sm-block">Понад 278 металобаз представлені у всіх регіонах країни, що забезпечує зручність кожному покупцеві.</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img3></div>
				<div class="av-vs-page-title-sm-block">ШИРОКИЙ<br>АСОРТИМЕНТ</div>
				<div class="av-vs-page-text-sm-block">Понад 650 найбільш затребуваних товарних позицій представлені в 8 категоріях. Ми завжди запропонуємо Вам більше.</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img4></div>
				<div class="av-vs-page-title-sm-block">КОНКУРЕНТНА<br>ЦІНА</div>
				<div class="av-vs-page-text-sm-block">Якісний сервіс і активне виробництво формують лояльні ціни на продукцію і послуги нашої компанії.</div>
			</div>
		</div>
		<div class="row" >
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img5></div>
				<div class="av-vs-page-title-sm-block">ДОСТАВКА ПО ВСІЙ<br>УКРАЇНІ</div>
				<div class="av-vs-page-text-sm-block">Наш центр логістики і широкий власний автопарк дозволяють доставити товар клієнту в найкоротші сроки.</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img6></div>
				<div class="av-vs-page-title-sm-block">ВЗАЄМОВИГІДНЕ<br>СПІВРОБІТНИЦТВО</div>
				<div class="av-vs-page-text-sm-block">Компанія зацікавлена в надійному партнерстві. Ми поставляємо продукцію від відомих виробників зі світовим ім'ям.</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img7></div>
				<div class="av-vs-page-title-sm-block">СЕРТИФІКАТИ<br>ВІДПОВІДНОСТІ</div>
				<div class="av-vs-page-text-sm-block">Продукція відповідає світовим стандартам на нержавіючу сталь EN, DIN, AISI. Ми впевнено заявляємо про якість.</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img8></div>
				<div class="av-vs-page-title-sm-block">СТАБІЛЬНЕ<br>ПРАЦЕВЛАШТУВАННЯ</div>
				<div class="av-vs-page-text-sm-block">Компанія зацікавлена в навчанні і розвитку персоналу, забезпечуючи при цьому стабільну роботу і кар'єрне зростання.</div>
			</div>
		</div>
	</div>
</div>

<div class="av-vs-page-block-employees">
	<div class="container">
		<div class="av-vs-page-block-title">Національний виробник</div>
		<div class="av-vs-page-block-subtitle">Компанія займається виробництвом продукції 8 категорій металопрокату на високотехнологічному обладнанні затребуваного в сучасному будівництві. Ми виробляємо арматуру, дріт, круглий прокат, профільні труби та листи, металеві сітки і просічно-витяжні листи. При виготовленні профільних труб ми використовуємо сучасні технології обробки металу, що істотно підвищує якість кінцевого продукту. У 2013 році ми заснували новий напрям на ринку металопрокату, налагодивши виробництво профільованих листів і металочерепиці.</div>
	</div>
</div>

<div class="av-vs-page-block">
	<div class="container">
		<div class="av-vs-page-block-title">Соціальна відповідальність</div>
		<div class="av-vs-page-block-subtitle">Компанія "АВ метал груп" бере активну участь в суспільно-громадському житті країни. В першу чергу ми надаємо матеріально-технічну підтримку соціально-незахищеним категоріям населення: утеплюємо дитячі будинки, підтримуємо сім'ї учасників АТО.</div>
	</div>
</div>
<?require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php'?>