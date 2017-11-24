<?require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"?>

<div style=
	"
	font-size: calc(1em + 2px);
	font-weight: bold;
	margin-bottom: 5px;
	text-align: center;
	"
>
	Hello,
</div>
<div style="margin: 0 20px 30px 20px">
	You have made a request to change the password for your account.
</div>
<img
	src="<?=CURRENT_PROTOCOL?>://#SERVER_NAME#/bitrix/templates/mail_av/images/USER_PASS_REQUEST.jpg"
	style=
		"
		margin-bottom: 30px;
		width: 100%;
		"
>
<div style=
	"
	margin: 0 20px 20px 20px;
	text-align: center;
	"
>
	To change your password, <a style="font-weight: bold" href="<?=CURRENT_PROTOCOL?>://#SERVER_NAME#/personal/info/?change_password=yes&lang=ru&USER_CHECKWORD=#CHECKWORD#&USER_LOGIN=#URL_LOGIN#">click here</a>.
</div>
<div style=
	"
	font-size: calc(1em + 2px);
	font-weight: bold;
	margin-bottom: 10px;
	text-align: center;
	"
>
	Your login information:
</div>
<table style="margin: auto">
	<tr>
		<td style="padding: 0 3px;text-align: left">User ID:</td>
		<td style="padding: 0 3px;text-align: left">#USER_ID#</td>
	</tr>
	<tr>
		<td style="padding: 0 3px;text-align: left">Profile status:</td>
		<td style="padding: 0 3px;text-align: left">#STATUS#</td>
	</tr>
	<tr>
		<td style="padding: 0 3px;text-align: left">Login:</td>
		<td style="padding: 0 3px;text-align: left">#LOGIN#</td>
	</tr>
</table>

<?require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"?>