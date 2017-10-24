			<?if($leftMenuHtml):?>
			</div>
			<?endif?>
		</div>
		<?
		/* ------------------------------------------- */
		/* ------------------ footer ----------------- */
		/* ------------------------------------------- */
		?>
		<footer itemscope itemtype="http://schema.org/WPFooter" id="page-footer">
			<div class="footer-container av-responsive-block">
				<div class="socservs-cell">
					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:eshop.socnet.links", "av",
							array(
							"FACEBOOK" => "https://www.facebook.com/avmg.com.ua/",
							"GOOGLE"   => "https://plus.google.com/u/2/114220723367013333669",
							"TWITTER"  => "https://twitter.com/avmgua"
							)
						);
					?>
				</div>

				<div class="subscibe-cell">
					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:sender.subscribe", "av",
							array(
							"USE_PERSONALIZATION" => "Y",
							"CONFIRMATION"        => "N",
							"SHOW_HIDDEN"         => "N",
							"SET_TITLE"           => "N",

							"AJAX_MODE"           => "Y",
							"AJAX_OPTION_JUMP"    => "Y",
							"AJAX_OPTION_STYLE"   => "N",
							"AJAX_OPTION_HISTORY" => "N",

							"CACHE_TYPE" => "A",
							"CACHE_TIME" => 360000
							)
						);
					?>
				</div>

				<div class="info-cell">
					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:main.include", "",
						array("AREA_FILE_SHOW" => "file", "PATH" => "/include/contacts.php")
						);
					?>
				</div>
			</div>
		</footer>
	</body>
</html>