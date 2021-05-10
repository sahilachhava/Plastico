<?php

if(isset($_GET["h"]) && isset($_GET["w"]) && isset($_GET["name"]) && isset($_GET["dcode"]))
{
	function countFile($dir) {
		return (count(scandir($dir)) - 2);
	}
        function resize_image($file, $w, $h, $crop=TRUE) 
		{
		    list($width, $height) = getimagesize($file);
		    $r = $width / $height;
		    if ($crop) {
		        if ($width > $height) {
		            $width = ceil($width-($width*abs($r-$w/$h)));
		        } else {
		            $height = ceil($height-($height*abs($r-$w/$h)));
		        }
		        $newwidth = $w;
		        $newheight = $h;
		    } else {
		        if ($w/$h > $r) {
		            $newwidth = $h*$r;
		            $newheight = $h;
		        } else {
		            $newheight = $w/$r;
		            $newwidth = $w;
		        }
		    }
		    $src = imagecreatefromjpeg($file);
		    $dst = imagecreatetruecolor($newwidth, $newheight);
		    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

		    return $dst;
		}
		$w = $_GET["w"];
		$h = $_GET["h"];
		$folder = $_GET["name"];
		$dcode = $_GET["dcode"];
		if (!file_exists($folder)) {
            mkdir('../dress_images/'.$dcode.'/'.$folder, 0755, true);
            $i=1;
	    $totalFiles = countFile("../dress_images/".$dcode);
		    while ($i < $totalFiles) {
    			$path = '../dress_images/'.$dcode.'/'.$i.'.jpg';
    			$img = resize_image($path,$w,$h);
    			$resizedFilename = '../dress_images/'.$dcode.'/'.$folder.'/'.$i.'.jpg';
    			imagepng($img, $resizedFilename);
    			$i++;
		    }
		    echo "Cropping Successful.! you can now access your cropped images in folder -> ".$folder;
        }
        else{
            exit("Folder Name already exist");
        }
}
else
{
    exit("You are in wrong page");
}

?>