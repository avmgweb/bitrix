<?
use \Bitrix\Main\Localization\Loc;

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
			"<?=$arResult["MESSAGE"]["TYPE"] == "ERROR" ? Loc::getMessage("AV_SUBSCRIBE_SHOP_RESULT_ERROR") : Loc::getMessage("AV_SUBSCRIBE_SHOP_RESULT_OK")?>"+
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
<form class="av-shop-subscribe-form" method="post" action="<?=$arResult["FORM_ACTION"]?>">
	<?=bitrix_sessid_post()?>
	<input type="hidden" name="sender_subscription" value="add">

	<div class="title">
		<?=Loc::getMessage("AV_SUBSCRIBE_SHOP_INPUT_TITLE")?>
	</div>
	<input
		type="email"
		name="SENDER_SUBSCRIBE_EMAIL"
		value="<?=$arResult["EMAIL"]?>"
		placeholder="<?=Loc::getMessage("AV_SUBSCRIBE_SHOP_INPUT_PLACEHOLDER")?>"
		autocomplete="off"
	>
	<button
		name="submit"
		id="bx_subscribe_btn_<?=$this->randString()?>"
		title="<?=Loc::getMessage("AV_SUBSCRIBE_SHOP_SEND")?>"
	>
		<i class="fa fa-paper-plane"></i>
	</button>

</form>