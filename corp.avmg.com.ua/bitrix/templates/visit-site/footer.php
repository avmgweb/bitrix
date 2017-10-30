			<?if($hasLeftColumn):?>
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
				<div class="menu-cell">
					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:menu", "av-bottom",
							array(
							"ROOT_MENU_TYPE"     => "bottom_top",
							"MAX_LEVEL"          => 2,
							"CHILD_MENU_TYPE"    => "bottom",
							"USE_EXT"            => "Y",
							"DELAY"              => "N",
							"ALLOW_MULTI_SELECT" => "N",

							"MENU_CACHE_TYPE"       => "A",
							"MENU_CACHE_TIME"       => 360000,
							"MENU_CACHE_USE_GROUPS" => "Y"
							)
						)
					?>
				</div>

				<div class="contacts-cell">
					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:main.include", "",
						array("AREA_FILE_SHOW" => "file", "PATH" => "/include/contacts_footer.php")
						);
					?>
				</div>

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

				<div class="copyright-cell">
					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:main.include", "",
						array("AREA_FILE_SHOW" => "file", "PATH" => "/include/copyright_footer.php")
						);
					?>
				</div>
			</div>
		</footer>
		<?
		/* ------------------------------------------- */
		/* ---------------- additional --------------- */
		/* ------------------------------------------- */
		?>
		<div id="page-up-button"></div>

		<script data-skip-moving="true">
			(function(w,d,u,b){
			s=d.createElement('script');r=(Date.now()/1000|0);s.async=1;s.src=u+'?'+r;
			h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
			})(window,document,'https://corp.avmg.com.ua/upload/crm/site_button/loader_11_jez0na.js');
		</script>
		<script data-skip-moving="true">
			(function(w,d,u,b){
			s=d.createElement('script');r=(Date.now()/1000|0);s.async=1;s.src=u+'?'+r;
			h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
			})(window,document,'https://corp.avmg.com.ua/upload/crm/site_button/loader_9_s6ijqp.js');
		</script>
	</body>
</html>