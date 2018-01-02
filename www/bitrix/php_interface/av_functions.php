<?
function getFolder($folder)
	{
	$folderPath = is_string($folder) ? $folder : "";
	if(strlen($folder) <= 0) return "";

	$folderPath = str_replace(["\\", "\/"], DIRECTORY_SEPARATOR, $folderPath);
	$folderPath = str_replace(SERVER_ROOT,  "",                  $folderPath);
	$folderPath = str_replace(CORE_ROOT,    "",                  $folderPath);
	$folderPath = str_replace(SITE_NAME,    "",                  $folderPath);

	if($folderPath{0}                       != DIRECTORY_SEPARATOR) $folderPath = DIRECTORY_SEPARATOR.$folderPath;
	if($folderPath{strlen($folderPath) - 1} != DIRECTORY_SEPARATOR) $folderPath = $folderPath.DIRECTORY_SEPARATOR;

	return $folderPath;
	}