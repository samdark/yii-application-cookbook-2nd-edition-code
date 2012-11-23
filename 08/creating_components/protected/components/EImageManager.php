<?php
class EImageManager extends CApplicationComponent
{
	protected $image;
	protected $width;
	protected $height;

	protected $newWidth;
	protected $newHeight;

	public function resize($width = false, $height = false){
		if($width!==false) $this->newWidth = $width;
		if($height!==false) $this->newHeight = $height;

		return $this;
	}

	public function load($filePath)
	{
		list($this->width, $this->height, $type) = getimagesize($filePath);

		switch ($type)
		{
			case IMAGETYPE_GIF:
				$this->image = imagecreatefromgif($filePath);
			break;
			case IMAGETYPE_JPEG:
				$this->image = imagecreatefromjpeg($filePath);
			break;
			case IMAGETYPE_PNG:
				$this->image = imagecreatefrompng($filePath);
			break;
			default:
				throw new CException('Unsupported image type ' . $type);
		}

		return $this;
	}

	public function save($filePath)
	{

		$ext = pathinfo($filePath, PATHINFO_EXTENSION);

		$newImage = imagecreatetruecolor($this->newWidth, $this->newHeight);
		imagecopyresampled($newImage, $this->image, 0, 0, 0, 0, $this->newWidth, $this->newHeight, $this->width, $this->height);

		switch($ext)
		{
			case 'jpg':
			case 'jpeg':
				imagejpeg($newImage, $filePath);
			break;
			case 'png':
				imagepng($newImage, $filePath);
			break;
			case 'gif':
				imagegif($newImage, $filePath);
			break;
			default:
				throw new CException("Unsupported image type ", $ext);
		}

		imagedestroy($newImage);

		if(!is_file($filePath))
			throw new CException("Failed to write image.");
	}

	function __destruct()
	{
		imagedestroy($this->image);
	}
}
