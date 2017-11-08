<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
?>

<div class="bx-auth-profile">
<?ShowError($arResult["strProfileError"]);?>
<?
if ($arResult['DATA_SAVED'] == 'Y')
	ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>
<script type="text/javascript">
<!--
var opened_sections = [<?
$arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"]."_user_profile_open"];
$arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
if (strlen($arResult["opened"]) > 0)
{
	echo "'".implode("', '", explode(",", $arResult["opened"]))."'";
}
else
{
	$arResult["opened"] = "reg";
	echo "'reg'";
}
?>];
//-->

var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
</script>
<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data" class="av-user-profile">
<?=$arResult["BX_SESSION_CHECK"]?>
<input type="hidden" name="lang" value="<?=LANG?>" />
<input type="hidden" name="ID" value="<?=$arResult["ID"]?>" />
	<div class="col-md-8">
	<div class="profile-link profile-user-div-link "><h3><?=GetMessage("USER_PERSONAL_INFO")?></h3></div>
	<?
	if($arResult["ID"]>0)
	{
	?>

	<?
	}
	?>
					<?
						$APPLICATION->IncludeComponent
							(
							"av:form.input", "av-form",
								[
								"NAME"     => "LOGIN",
								"VALUE"    => $arResult["arUser"]["LOGIN"],
								"TITLE"    => GetMessage('LOGIN'),
								"REQUIRED" => 'Y'
								]
							);
					?>
					<?
						$APPLICATION->IncludeComponent
							(
							"av:form.input", "av-form",
								[
								"NAME"     => "NAME",
								"VALUE"    => $arResult["arUser"]["NAME"],
								"TITLE"    => GetMessage('NAME'),
								"REQUIRED" => 'Y'
								]
							);
					?>



					<?
						$APPLICATION->IncludeComponent
							(
							"av:form.input", "av-form",
								[
								"NAME"     => "LAST_NAME",
								"VALUE"    => $arResult["arUser"]["LAST_NAME"],
								"TITLE"    => GetMessage('LAST_NAME')
								]
							);
					?>
					<?
						$APPLICATION->IncludeComponent
							(
							"av:form.input", "av-form",
								[
								"NAME"     => "SECOND_NAME",
								"VALUE"    => $arResult["arUser"]["SECOND_NAME"],
								"TITLE"    => GetMessage('SECOND_NAME')
								]
							);
					?>

					<?
						$APPLICATION->IncludeComponent
							(
							"av:form.input", "av-form",
								[
								"NAME"     => "EMAIL",
								"VALUE"    => $arResult["arUser"]["EMAIL"],
								"TITLE"    => GetMessage('EMAIL'),
								"REQUIRED" => $arResult["EMAIL_REQUIRED"] ? 'Y' : 'N'
								]
							);
					?>
					<?
						$APPLICATION->IncludeComponent
							(
							"av:form.input.phone", "av-form",
								[
								"NAME"     => "PERSONAL_MOBILE",
								"VALUE"    => $arResult["arUser"]["PERSONAL_MOBILE"],
								"TITLE"    => GetMessage('USER_MOBILE')
								]
							);
					?>



<?if($arResult["arUser"]["EXTERNAL_AUTH_ID2"] == ''):?>
					<?
						$APPLICATION->IncludeComponent
							(
							"av:form.input.password", "av-form",
								[
								"NAME"     => $arrayInfo["NEW_PASSWORD"],
								"VALUE"    => "",
								"TITLE"    => GetMessage('NEW_PASSWORD_REQ'),
								"CLASS"    => "bx-auth-input"
								]
							);
					?>

<?if($arResult["SECURE_AUTH"]):?>
				<span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
					<div class="bx-auth-secure-icon"></div>
				</span>
				<noscript>
				<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
					<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
				</span>
				</noscript>
<script type="text/javascript">
document.getElementById('bx_auth_secure').style.display = 'inline-block';
</script>
<?endif?>
					<?
						$APPLICATION->IncludeComponent
							(
							"av:form.input.password", "av-form",
								[
								"NAME"     => $arrayInfo["NEW_PASSWORD_CONFIRM"],
								"VALUE"    => "",
								"TITLE"    => GetMessage('NEW_PASSWORD_CONFIRM')
								]
							);
					?>


<?endif?>


<br>
<div class="hidden-sm hidden-xs text-center">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av",
					[
					"BUTTON_TYPE" => 'submit',
					"NAME"        => 'save',
					"TITLE"       => GetMessage("MAIN_SAVE"),
					"ATTR"        => 'submit-button'
					]
				);
			?>
&nbsp;&nbsp;
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av",
					[
					"BUTTON_TYPE" => 'reset',
					"NAME"        => 'reset',
					"TITLE"       => GetMessage("MAIN_RESET"),
					"ATTR"        => ''
					]
				);
			?>
</div>
</div>
<div class="col-md-4 userPhotoSection">

		<span id="downloadPhoto"><?echo GetMessage("UPLOAD_PHOTO")?></span>
		<div hidden ><?=$arResult["arUser"]["PERSONAL_PHOTO_INPUT"]?></div>
			<?
			if (strlen($arResult["arUser"]["PERSONAL_PHOTO"])>0)
			{
			?>
				<?=$arResult["arUser"]["PERSONAL_PHOTO_HTML"]?>
		<span id="deletePhoto"><?echo GetMessage("DELETE_PHOTO")?></span>
			<?
			}
			?>
<br>
<div class="hidden-lg hidden-md text-center">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av",
					[
					"BUTTON_TYPE" => 'submit',
					"NAME"        => 'save',
					"TITLE"       => GetMessage("MAIN_SAVE"),
					"ATTR"        => 'submit-button'
					]
				);
			?>
&nbsp;&nbsp;
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av",
					[
					"BUTTON_TYPE" => 'reset',
					"NAME"        => 'reset',
					"TITLE"       => GetMessage("MAIN_RESET"),
					"ATTR"        => ''
					]
				);
			?>
</div>
<br>
<?
if($arResult["SOCSERV_ENABLED"])
{
	$APPLICATION->IncludeComponent(
	"bitrix:socserv.auth.split", 
	"av-twitpost", 
	array(
		"SHOW_PROFILES" => "Y",
		"ALLOW_DELETE" => "Y",
		"COMPONENT_TEMPLATE" => "av-twitpost",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);
}
?>


</div>
	<?// ******************** /User properties ***************************************************?>


</form></div>
