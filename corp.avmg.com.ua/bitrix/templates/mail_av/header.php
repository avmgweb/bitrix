<?
use \Bitrix\Main\Config\Option;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$protocol = Option::get("main", "mail_link_protocol", "https", $arParams["SITE_ID"]);
/* ============================================================================================= */
/* ========================================== DOCUMENT ========================================= */
/* ============================================================================================= */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<?
	/* -------------------------------------------------------------------- */
	/* ------------------------------- HEAD ------------------------------- */
	/* -------------------------------------------------------------------- */
	?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title></title>
		<?
		/* ------------------------------------------- */
		/* ----------------- styles ------------------ */
		/* ------------------------------------------- */
		?>
		<style type="text/css">
			<?
			/* ---------------------------- */
			/* ------- clear style -------- */
			/* ---------------------------- */
			?>
			#av-mail
				{
				border-collapse: collapse;
				color: #636363;
				font-size:   17px;
				line-height: 20px;
				padding: 0;
				margin:  0;
				width: 100%
				}
			#av-mail *
				{
				box-sizing: border-box;
				outline: none;
				}
			#av-mail table,
			#av-mail td,
			#av-mail th
				{
				border: none;
				border-spacing: 0;
				padding: 0;
				margin:  0;
				}
			<?
			/* ---------------------------- */
			/* -------- main/header ------- */
			/* ---------------------------- */
			?>
			#av-mail .av-document
				{
				background-color: #E7E7E7;
				padding: 30px 10px;
				}
			#av-mail .av-document > .av-content
				{
				background-color: #FFF;
				background-image: url(<?=$protocol?>://<?=SITE_SERVER_NAME?>/bitrix/templates/mail_av/images/bg.png);
				background-position: top right;
				background-repeat: no-repeat;
				border-radius: 4px;
				box-shadow: 0 0 10px rgba(0,3,0,0.2);
				margin: 0 auto;
				max-width: 600px;
				}
			#av-mail .av-document > .av-content .av-header
				{
				padding: 20px 0;
				text-align: center;
				}
			#av-mail .av-document > .av-content .av-header img {width: calc(100% / 3 * 2)}
			<?
			/* ---------------------------- */
			/* --------- workarea --------- */
			/* ---------------------------- */
			?>
			#av-mail .av-document > .av-content .av-workarea a,
			#av-mail .av-document > .av-content .av-workarea a:visited,
			#av-mail .av-document > .av-content .av-workarea a:hover,
			#av-mail .av-document > .av-content .av-workarea a:active,
			#av-mail .av-document > .av-content .av-workarea a:focus
				{
				color: inherit;
				text-decoration: underline;
				}
			<?
			/* ---------------------------- */
			/* ---------- footer ---------- */
			/* ---------------------------- */
			?>
			#av-mail .av-document > .av-content .av-footer
				{
				font-size: calc(1em - 2px);
				padding: 20px;
				}
			#av-mail .av-document > .av-content .av-footer a,
			#av-mail .av-document > .av-content .av-footer a:visited,
			#av-mail .av-document > .av-content .av-footer a:hover,
			#av-mail .av-document > .av-content .av-footer a:active,
			#av-mail .av-document > .av-content .av-footer a:focus
				{
				color: inherit;
				text-decoration: underline;
				}
			#av-mail .av-document > .av-content .av-footer .separator
				{
				background-color: #CC0000;
				margin-bottom: 20px;
				height: 2px;
				}
			#av-mail .av-document > .av-content .av-footer .left-block
				{
				float: left;
				width: calc((100% - 10px) / 2);
				}
			#av-mail .av-document > .av-content .av-footer .right-block
				{
				float: right;
				text-align: right;
				width: calc((100% - 10px) / 2);
				}
			#av-mail .av-document > .av-content .av-footer .right-block .feadback
				{
				font-weight: bold;
				margin-top: 10px;
				}
			<?
			/* ---------------------------- */
			/* ---------- media ----------- */
			/* ---------------------------- */
			?>
			@media (max-width:767px)
				{
				#av-mail .av-document > .av-content .av-footer .left-block,
				#av-mail .av-document > .av-content .av-footer .right-block
					{
					float: none;
					margin-left:  auto;
					margin-right: auto;
					text-align: center;
					width: 100%;
					}
				#av-mail .av-document > .av-content .av-footer .right-block {margin-top: 20px}
				}
		</style>
	</head>
	<?
	/* -------------------------------------------------------------------- */
	/* ------------------------------- BODY ------------------------------- */
	/* -------------------------------------------------------------------- */
	?>
	<body>
		<table id="av-mail">
			<tbody>
				<tr>
					<td class="av-document">
						<table class="av-content">
							<tr>
								<td class="av-header">
									<img src="<?=$protocol?>://<?=SITE_SERVER_NAME?>/bitrix/images/av/logo_line_<?=LANGUAGE_ID?>.png">
								</td>
							</tr>
							<tr>
								<td class="av-workarea">