<?php
Class Image
{
    var $width;
    var $height;
    var $originalImage;
    var $new_width;
    var $new_height;
    function CalcNewDims($toWidth, $toHeight)
    {
        list($width, $height) = getimagesize($this->originalImage);
        $this->width = $width;
        $this->height = $height;
        $xscale=$width/$toWidth;
        $yscale=$height/$toHeight;
        if ($yscale>$xscale)
        {
            $this->new_width = round($width * (1/$yscale));
            $this->new_height = round($height * (1/$yscale));
        }
        else
        {
            $this->new_width = round($width * (1/$xscale));
            $this->new_height = round($height * (1/$xscale));
        }
    }
    function CreateDisplayPicture($User, $type = "")
    {
        require "Configs/config.php";
        $this->originalImage = $User->GetImage();
        if ($type == "Avatar")
        {
            $Dimensions = explode("x", $MaxAvatarDimension);
            $toWidth = $Dimensions[0];
            $toHeight = $Dimensions[1];
        }
        else
        {
            $toWidth = "1024";
            $toHeight = "768";
        }

        $this->CalcNewDims($toWidth, $toHeight);

        if (!preg_match("/.jpg/i", $this->originalImage) && !preg_match("/.jpeg/i", $this->originalImage))
        {
            $ExistingFile = @fopen($this->originalImage, 'w');
            @unlink($this->originalImage);
            return;
        }
        $imageTmp = imagecreatefromJPEG ($this->originalImage);
        $imageResized = imagecreatetruecolor($this->new_width, $this->new_height);
        if ($type == "Avatar")
        {
            $SplitDir = explode("/", $this->originalImage);
            $this->originalImage = $SaveDir."Thumb_".$SplitDir[1];
            ImageJPEG ($imageResized, $this->originalImage);
        }
        else
        {
            ImageJPEG ($imageResized, $this->originalImage);
            $this->CreateDisplayPicture($User, "Avatar");
        }
    }
}
?>