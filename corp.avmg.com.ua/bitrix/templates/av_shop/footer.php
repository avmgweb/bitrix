			<?if($leftMenu):?>
			</div>
			<?endif?>
		</div>
		<?
		/* ------------------------------------------- */
		/* ------------------ footer ----------------- */
		/* ------------------------------------------- */
		?>
		<footer>
			<div class="container">
				<div class="subscibe-cell-mobile">
					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:sender.subscribe", "av",
							array(
							"USE_PERSONALIZATION" => 'Y',
							"CONFIRMATION"        => 'N',
							"SHOW_HIDDEN"         => 'N',
							"SET_TITLE"           => 'N',

							"AJAX_MODE"           => 'Y',
							"AJAX_OPTION_JUMP"    => 'Y',
							"AJAX_OPTION_STYLE"   => 'N',
							"AJAX_OPTION_HISTORY" => 'N',

							"CACHE_TYPE" => 'A',
							"CACHE_TIME" => 360000
							)
						);
					?>
				</div>

				<div class="soc-links-cell">
					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:eshop.socnet.links", "av",
							array(
							"FACEBOOK"  => 'https://www.facebook.com/avmg.com.ua/',
							"GOOGLE"    => 'https://plus.google.com/u/2/114220723367013333669',
							"TWITTER"   => 'https://twitter.com/avmgua',
							)
						);
					?>
				</div>

				<div class="subscibe-cell">
					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:sender.subscribe", "av-line",
							array(
							"USE_PERSONALIZATION" => 'Y',
							"CONFIRMATION"        => 'N',
							"SHOW_HIDDEN"         => 'N',
							"SET_TITLE"           => 'N',

							"AJAX_MODE"           => 'Y',
							"AJAX_OPTION_JUMP"    => 'Y',
							"AJAX_OPTION_STYLE"   => 'N',
							"AJAX_OPTION_HISTORY" => 'N',

							"CACHE_TYPE" => 'A',
							"CACHE_TIME" => 360000
							)
						);
					?>
				</div>

				<div class="copyright-cell">
					<div class="contacts-cell">
						<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'file', "PATH" => '/include/contacts_footer.php'))?>
					</div>
					<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'file', "PATH" => '/include/copyright_footer.php'))?>
				</div>
			</div>
		</footer>
	</body>
</html>