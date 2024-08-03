<?php

namespace App\Helper;

class FilesHelper{
    static function copy($source, $target) {
        if (!is_dir($source)) {//it is a file, do a normal copy
            copy($source, $target);
            return;
        }

        //it is a folder, copy its files & sub-folders
        @mkdir($target, 0700, true);
        $d = dir($source);
        $navFolders = array('.', '..');
        while (false !== ($fileEntry=$d->read() )) {//copy one by one
            //skip if it is navigation folder . or ..
            if (in_array($fileEntry, $navFolders) ) {
                continue;
            }
            //do copy
            $s = "$source/$fileEntry";
            $t = "$target/$fileEntry";
            self::copy($s, $t);
        }
        $d->close();
    }

    public static function getProperties($file){
        $properties = array();

        if (!$file) return null;
        while (($line = fgets($file)) !== false) {
            $pos = strpos($line, '=');
            if (!$pos) continue;
            $name = substr($line, 0, $pos);
            $value = substr($line, $pos + 1, strlen($line));
            $properties[$name] = $value;
        }
        return $properties;
    }

    public static function array_to_ini($array){
        $result = "";
        foreach ($array as $key => $value) {
            $result .= $key .'='. trim(json_encode($value), '"'). "\r\n";
        }
        return $result;
    }
}