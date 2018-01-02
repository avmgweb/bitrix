<?
namespace av\image_processing\watermarks;

use \Exception;

class WatermarkAdding
	{
	private
		$imageUrl              = "",
		$watermarkUrl          = "",
		$imagesProcessedFolder = "",

		$watermarkOpacity = 0.5,
		$watermarkSpaceX  = 0,
		$watermarkSpaceY  = 0;
	private static
		$watermarkImageDefault        = "/bitrix/images/av/images_watermark/water_mark.png",
		$imagesProcessedFolderDefault = "/upload/images_watermark/",
		$cryptKey                     = "1591789hGguB177lLL",
		$imagesObjects                = [],
		$imagesObjectsWidth           = [],
		$imagesObjectsHeight          = [];
	/* -------------------------------------------------------------------- */
	/* --------------------------- constructor ---------------------------- */
	/* -------------------------------------------------------------------- */
	final public function __construct($imageUrl = "")
		{
		if($imageUrl)
			{
			try                         {$this->setImageUrl($imageUrl);}
			catch(Exception $exception) {throw new Exception($exception->getMessage());}
			}
		}
	/* -------------------------------------------------------------------- */
	/* ------------------------ image url get/set ------------------------- */
	/* -------------------------------------------------------------------- */
	final public function setImageUrl($imageUrl = "")
		{
		$imageUrlClear = $this->getLinkClear($imageUrl);
		if(!is_file(SERVER_ROOT.SITE_NAME.$imageUrlClear)) throw new Exception("image not found: ".$imageUrlClear);
		$this->imageUrl = $imageUrlClear;
		}
	final public function setWatermarkImageUrl($imageUrl = "")
		{
		$imageUrlClear = $this->getLinkClear($imageUrl);
		if(!is_file(SERVER_ROOT.SITE_NAME.$imageUrlClear)) throw new Exception("watermark image not found: ".$imageUrlClear);
		$this->watermarkUrl = $imageUrlClear;
		}
	final public function getImageUrl()
		{
		return $this->imageUrl;
		}
	final public function getWatermarkImageUrl()
		{
		return $this->watermarkUrl;
		}
	/* -------------------------------------------------------------------- */
	/* ----------------- images processed folder get/set ------------------ */
	/* -------------------------------------------------------------------- */
	final public function setImagesProcessedFolder($folderUrl = "")
		{
		$folderUrlClear = $this->getLinkClear($folderUrl);
		if(!is_dir(SERVER_ROOT.SITE_NAME.$folderUrlClear))
			throw new Exception("images processed folder not found: ".$imageUrlClear);

		$folderUrlExplode = explode(DIRECTORY_SEPARATOR, $folderUrlClear);
		$folderUrlExplode = array_values(array_diff($folderUrlExplode, [""]));
		$directoryPath    = SERVER_ROOT.SITE_NAME;

		foreach($folderUrlExplode as $directoryName)
			{
			$directoryPath .= DIRECTORY_SEPARATOR.$directoryName;
			if(!file_exists($directoryPath))
				{
				$directoryCreateResult = mkdir($directoryPath);
				if(!$directoryCreateResult) throw new Exception("directory create error by path ".$directoryPath);
				}
			}

		$this->imagesProcessedFolder = DIRECTORY_SEPARATOR.implode(DIRECTORY_SEPARATOR, $folderUrlExplode).DIRECTORY_SEPARATOR;
		}
	final public function getImagesProcessedFolder()
		{
		return $this->imagesProcessedFolder;
		}
	/* -------------------------------------------------------------------- */
	/* --------------------- watermark params get/set --------------------- */
	/* -------------------------------------------------------------------- */
	final public function setWatermarkOpacity($opacity = 0)
		{
		$opacity = floor($opacity);
		$this->watermarkOpacity = is_float($opacity) ? $opacity : 0;
		}
	final public function setWatermarkSpaceX($watermarkSpaceX = 0)
		{
		$watermarkSpaceX = (int) $watermarkSpaceX;
		$this->watermarkSpaceX = is_int($watermarkSpaceX) ? $watermarkSpaceX : 0;
		}
	final public function setWatermarkSpaceY($watermarkSpaceY = 0)
		{
		$watermarkSpaceY = (int) $watermarkSpaceY;
		$this->watermarkSpaceY = is_int($watermarkSpaceY) ? $watermarkSpaceY : 0;
		}
	final public function getWatermarkOpacity()
		{
		return $this->watermarkOpacity;
		}
	final public function getWatermarkSpaceX()
		{
		return $this->watermarkSpaceX;
		}
	final public function getWatermarkSpaceY()
		{
		return $this->watermarkSpaceY;
		}
	/* -------------------------------------------------------------------- */
	/* ---------------------- get image processed url --------------------- */
	/* -------------------------------------------------------------------- */
	final public function getImageProcessedUrl()
		{
		/* ------------------------------------------- */
		/* -------------- watermark url -------------- */
		/* ------------------------------------------- */
		$watermarkUrl = $this->getWatermarkImageUrl();
		if(strlen($watermarkUrl) <= 0)
			{
			try                         {$this->setWatermarkImageUrl(self::$watermarkImageDefault);}
			catch(Exception $exception) {throw new Exception($exception->getMessage());}
			$watermarkUrl = $this->getWatermarkImageUrl();
			}
		if(strlen($watermarkUrl) <= 0)
			throw new Exception("watermark image not found");
		/* ------------------------------------------- */
		/* ---------------- image url ---------------- */
		/* ------------------------------------------- */
		$imageUrl = $this->getImageUrl();
		if(strlen($imageUrl) <= 0) throw new Exception("image not found");
		/* ------------------------------------------- */
		/* --------- images processed folder --------- */
		/* ------------------------------------------- */
		$imagesProcessedFolder = $this->getImagesProcessedFolder();
		if(strlen($imagesProcessedFolder) <= 0)
			{
			try                         {$this->setImagesProcessedFolder(self::$imagesProcessedFolderDefault);}
			catch(Exception $exception) {throw new Exception($exception->getMessage());}
			$imagesProcessedFolder = $this->getImagesProcessedFolder();
			}
		if(strlen($imagesProcessedFolder) <= 0)
			throw new Exception("images processed folder not found");
		/* ------------------------------------------- */
		/* ----- images processed file full path ----- */
		/* ------------------------------------------- */
		$imageProcessedFilePath = $imagesProcessedFolder.$this->getImageProcessedUnicName();
		/* ------------------------------------------- */
		/* ---- check processed file already exist --- */
		/* ------------------------------------------- */
		if(file_exists(SERVER_ROOT.SITE_NAME.$imageProcessedFilePath))
			return $imageProcessedFilePath;
		/* ------------------------------------------- */
		/* --------------- need params --------------- */
		/* ------------------------------------------- */
		$watermarkObject    = $this->getImageObject($watermarkUrl, $this->getWatermarkOpacity());
		$watermarkWidth     = $this->getImageObjectWidth ($watermarkObject, $watermarkUrl);
		$watermarkHeight    = $this->getImageObjectHeight($watermarkObject, $watermarkUrl);

		$imageObject        = $this->getImageObject($imageUrl);
		$imageWidth         = $this->getImageObjectWidth ($imageObject, $imageUrl);
		$imageHeight        = $this->getImageObjectHeight($imageObject, $imageUrl);

		$watermarkSpaceX    = $this->getWatermarkSpaceX() > 0 ? $this->getWatermarkSpaceX() : $watermarkWidth  / 3;
		$watermarkSpaceY    = $this->getWatermarkSpaceY() > 0 ? $this->getWatermarkSpaceY() : $watermarkHeight * 3;
		$currentRow         = 1;
		$rowCount           = floor($imageHeight / ($watermarkHeight + $watermarkSpaceY));
		$watermarkSpaceY    = ($imageHeight - $watermarkHeight * $rowCount) / $rowCount;
		$watermarkPositionX = 0 - $watermarkWidth / 2;
		$watermarkPositionY = $watermarkSpaceY / 2;
		/* ------------------------------------------- */
		/* ----------- watermark processing ---------- */
		/* ------------------------------------------- */
		while($currentRow <= $rowCount)
			{
			imagecopy
				(
				$imageObject,
				$watermarkObject,
				$watermarkPositionX,
				$watermarkPositionY,
				0,
				0,
				$watermarkWidth,
				$watermarkHeight
				);

			$watermarkPositionX += $watermarkWidth + $watermarkSpaceX;
			if($watermarkPositionX > $imageWidth)
				{
				$currentRow++;
				$watermarkPositionX = 0 - $watermarkWidth / 2 + $watermarkSpaceX * $currentRow * 2;
				while($watermarkPositionX > $watermarkSpaceX) $watermarkPositionX -= $watermarkWidth;
				$watermarkPositionY += $watermarkHeight + $watermarkSpaceY;
				}
			}
		/* ------------------------------------------- */
		/* -------- saving file/return result -------- */
		/* ------------------------------------------- */
		imagepng($imageObject, SERVER_ROOT.SITE_NAME.$imageProcessedFilePath, 9);
		if(file_exists(SERVER_ROOT.SITE_NAME.$imageProcessedFilePath)) return $imageProcessedFilePath;
		return "";
		}
	/* -------------------------------------------------------------------- */
	/* -------------------------- get url clear --------------------------- */
	/* -------------------------------------------------------------------- */
	private function getLinkClear($url = "")
		{
		return is_string($url) && strlen($url) > 0
			? str_replace(["\\", "/"], DIRECTORY_SEPARATOR, $url)
			: "";
		}
	/* -------------------------------------------------------------------- */
	/* ------------------- get image processed unic name ------------------ */
	/* -------------------------------------------------------------------- */
	private function getImageProcessedUnicName()
		{
		$imageFileNameParts =
			[
			$this->getImageUrl(),
			$this->getWatermarkSpaceX(),
			$this->getWatermarkSpaceY(),
			$this->getWatermarkOpacity()
			];
		$imageFileNameCrypt = openssl_encrypt
			(
			implode("", $imageFileNameParts),
			"AES-256-OFB",
			self::$cryptKey
			);

		return base64_encode($imageFileNameCrypt).".png";
		}
	/* -------------------------------------------------------------------- */
	/* ------------------------- get image object ------------------------- */
	/* -------------------------------------------------------------------- */
	private function getImageObject($imageUrl = "", $opacity = 0)
		{
		$imageUrl       = is_string($imageUrl) && strlen($imageUrl) > 0 ? $imageUrl : "";
		$opacity        = floatval($opacity);
		$imageUnicIndex = $imageUrl.$opacity;
		$imageObject    = false;

		if(array_key_exists($imageUnicIndex, self::$imagesObjects))
			return self::$imagesObjects[$imageUnicIndex];

		switch(mime_content_type(SERVER_ROOT.SITE_NAME.$imageUrl))
			{
			case "image/png":
				$imageObject = imagecreatefrompng(SERVER_ROOT.SITE_NAME.$imageUrl);
				if($opacity > 0)
					{
					imagealphablending($imageObject, false);
					imagesavealpha($imageObject, true);
					imagefilter($imageObject, IMG_FILTER_COLORIZE, 100, 100, 100, 127 * $opacity);
					}
				else
					{
					imagealphablending($imageObject, true);
					imagesavealpha($imageObject, true);
					}
				break;
			case "image/jpeg":
				$imageObject = imagecreatefromjpeg(SERVER_ROOT.SITE_NAME.$imageUrl);
				break;
			}

		self::$imagesObjects[$imageUnicIndex] = $imageObject;
		return self::$imagesObjects[$imageUnicIndex];
		}
	/* -------------------------------------------------------------------- */
	/* ---------------------- get image object width ---------------------- */
	/* -------------------------------------------------------------------- */
	private function getImageObjectWidth($imageObject, $imageUrl = "")
		{
		if(!is_resource($imageObject) || !is_string($imageUrl) || strlen($imageUrl) <= 0) return 0;

		if(!self::$imagesObjectsWidth[$imageUrl]) self::$imagesObjectsWidth[$imageUrl] = (int) imagesx($imageObject);
		return self::$imagesObjectsWidth[$imageUrl];
		}
	/* -------------------------------------------------------------------- */
	/* ---------------------- get image object width ---------------------- */
	/* -------------------------------------------------------------------- */
	private function getImageObjectHeight($imageObject, $imageUrl = "")
		{
		if(!is_resource($imageObject) || !is_string($imageUrl) || strlen($imageUrl) <= 0) return 0;

		if(!self::$imagesObjectsHeight[$imageUrl]) self::$imagesObjectsHeight[$imageUrl] = (int) imagesy($imageObject);
		return self::$imagesObjectsHeight[$imageUrl];
		}
	}