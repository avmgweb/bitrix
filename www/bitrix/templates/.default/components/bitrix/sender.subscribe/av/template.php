<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------ popup ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["MESSAGE"]):?>
<script>
	AvBlurScreen("on", 1000);
	CreateAvAlertPopup
		(
		"<b>"+
			"<?=GetMessage("AV_SUBSCRIBE_RESULT_".$arResult["MESSAGE"]["TYPE"])?>"+
		"</b><br>"+
		"<?=$arResult["MESSAGE"]["TEXT"]?>",
		"<?=$arResult["MESSAGE"]["TYPE"] == "ERROR" ? "alert" : "ok"?>"
		)
		.positionCenter(1100, "Y")
		.onClickout(function()
			{
			$(this).remove();
			})
		.on("remove", function()
			{
			AvBlurScreen("off");
			});
</script>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- form ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<form class="av-subscribe-form" method="post" action="<?=$arResult["FORM_ACTION"]?>">
	<?=bitrix_sessid_post()?>
	<input type="hidden" name="sender_subscription" value="add">

	<span class="title"><?=GetMessage("AV_SUBSCRIBE_GREATINGS")?></span>
	<input
		type="email"
		name="SENDER_SUBSCRIBE_EMAIL"
		value="<?=$arResult["EMAIL"]?>"
		placeholder="<?=GetMessage("AV_SUBSCRIBE_EMAIL_TITLE")?>"
		autocomplete="off"
	>
	<?
	$APPLICATION->IncludeComponent
		(
		"av:form.button", "av",
			[
			"NAME"  => "submit",
			"TITLE" => GetMessage("AV_SUBSCRIBE_SUBMIT_BUTTON"),
			"ATTR"  => ["id" => "bx_subscribe_btn_".$this->randString()]
			],
		false, ["HIDE_ICONS" => "Y"]
		);
	?>
</form>