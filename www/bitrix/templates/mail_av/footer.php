<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
								</td>
							</tr>
							<tr>
								<td class="av-footer">
									<div class="separator"></div>
									<div class="left-block">
										<?
										EventMessageThemeCompiler::includeComponent
											(
											"bitrix:main.include", "",
												[
												"AREA_FILE_SHOW" => "file",
												"PATH" => "/bitrix/templates/mail_av/include/".LANGUAGE_ID."/info.php"
												]
											);
										?>
									</div>
									<div class="right-block">
										<?
										EventMessageThemeCompiler::includeComponent
											(
											"bitrix:eshop.socnet.links", "av-mail",
												[
												"FACEBOOK" => "https://www.facebook.com/avmg.com.ua/",
												"GOOGLE"   => "https://plus.google.com/u/2/114220723367013333669",
												"TWITTER"  => "https://twitter.com/avmgua"
												]
											);
										?>
										<div class="feadback">
											<?
											EventMessageThemeCompiler::includeComponent
												(
												"bitrix:main.include", "",
													[
													"AREA_FILE_SHOW" => "file",
													"PATH" => "/bitrix/templates/mail_av/include/".LANGUAGE_ID."/feadback.php"
													]
												);
											?>
										</div>
									</div>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
	</body>
</html>