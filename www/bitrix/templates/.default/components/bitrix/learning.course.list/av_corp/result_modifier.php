<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$coursesIdArray = [];
/* -------------------------------------------------------------------- */
/* ------------------------------- pager ------------------------------ */
/* -------------------------------------------------------------------- */
$arResult["NAV_STRING"] = $arResult["NAV_RESULT"]->GetPageNavString('', 'av_corp');
/* -------------------------------------------------------------------- */
/* ----------------------------- preparing ---------------------------- */
/* -------------------------------------------------------------------- */
foreach($arResult["COURSES"] as $index => $courseInfo)
	{
	$arResult["COURSES"][$index]["NAME"]         = htmlspecialchars_decode($courseInfo["NAME"]);
	$arResult["COURSES"][$index]["PREVIEW_TEXT"] = strip_tags($courseInfo["PREVIEW_TEXT"]);
	$coursesIdArray[] = $courseInfo["ID"];
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- test list ---------------------------- */
/* -------------------------------------------------------------------- */
$arResult["TEST"] = [];
if(count($coursesIdArray))
	{
	$queryList = CTest::GetList(["SORT" => 'DESC'], ["COURSE_ID" => $coursesIdArray, "ACTIVE" => 'Y']);
	while($queryElement = $queryList->GetNext())
		$arResult["TEST"][$queryElement["COURSE_ID"]][] =
			[
			"TIME_LIMIT"    => $queryElement["TIME_LIMIT"],
			"ATTEMPT_LIMIT" => $queryElement["ATTEMPT_LIMIT"],
			"PASSAGE_TYPE"  => $queryElement["PASSAGE_TYPE"]
			];
	}