<?php

class FileSystem
{
	/**
    - Delete all files and subfolders from specified folder
	 **/
	public static function deleteAll($dir, $remove = false)
	{
		$structure = glob(rtrim($dir, "/") . '/*');
		if (is_array($structure)) {
			foreach ($structure as $file) {
				if (is_dir($file))
					self::deleteAll($file, true);
				else if (is_file($file))
					unlink($file);
			}
		}
		if ($remove)
			rmdir($dir);
	}
}
