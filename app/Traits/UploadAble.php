<?php
namespace App\Traits;


trait UploadAble
{

    public function createThumbs($disk, $path, $files, $overwrite)
    {
        $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief', 'jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
        if (!file_exists(public_path() . DIRECTORY_SEPARATOR."storage".DIRECTORY_SEPARATOR."media".DIRECTORY_SEPARATOR."thumbs")) {
            \File::makeDirectory(public_path() .DIRECTORY_SEPARATOR."storage".DIRECTORY_SEPARATOR."media".DIRECTORY_SEPARATOR."thumbs".DIRECTORY_SEPARATOR);
        }
        foreach ($files as $file) {
			$currentFileName = pathinfo($file['name'], PATHINFO_FILENAME);
			$ext = $file['extension'];
            if (in_array($ext, $imageExtensions)) {
                if (file_exists(public_path() . DIRECTORY_SEPARATOR."storage".DIRECTORY_SEPARATOR."media".DIRECTORY_SEPARATOR.$file['name'])) {
                    $fileName = public_path() . DIRECTORY_SEPARATOR."storage".DIRECTORY_SEPARATOR."media".DIRECTORY_SEPARATOR.$file['name'];
                    $newFile = public_path() . DIRECTORY_SEPARATOR."storage".DIRECTORY_SEPARATOR."media".DIRECTORY_SEPARATOR."thumbs".DIRECTORY_SEPARATOR . $currentFileName . "-thumb." . $ext;
                    copy($fileName, $newFile); 
                    \Image::make($fileName)->resize(100, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($newFile,40);
                }
            }
            //-------------------------------------------------------------------------------

        }
    }
}
