<?php

function getFileIcon($fpath) {
$e = strtolower(pathinfo($fpath, PATHINFO_EXTENSION));

switch($e) {

case "a":
case "ar":
case "cpio":
case "mar":
case "tar":
case "bz2":
case "gz":
case "lz":
case "lzma":
case "lzo":
case "rz":
case "sfark":
case "xz":
case "7z":
case "cab":
case "jar":
case "rar":
case "tgz":
case "tbz2":
case "zip":
return "zmdi-archive";
break;

case "aiff":
case "aac":
case "amr":
case "au":
case "flac":
case "m4a":
case "m4p":
case "mp3":
case "ogg":
case "oga":
case "opus":
case "ra":
case "wav":
case "webm":
return "zmdi-audio";
break;

case "ani":
case "anim":
case "gif":
case "ico":
case "cur":
case "jpg":
case "jpeg":
case "pcx":
case "png":
case "psd":
case "psb":
case "ras":
case "tif":
case "tiff":
case "webp":
case "xbm":
case "xpm":
case "ciff":
case "dng":
case "raw":
case "wmf":
return "zmdi-image";
break;

case "bmp":
case "xcf":
case "svg":
return "zmdi-brush";
break;

case "webm":
case "mkv":
case "flv":
case "vob":
case "ogv":
case "drc":
case "avi":
case "mov":
case "wmv":
case "yuv":
case "rm":
case "asf":
case "mp4":
case "m4p":
case "m4v":
case "mpg":
case "mpe":
case "mpeg":
case "mpe":
case "mpv":
case "m2v":
case "3gp":
case "3g2":
case "mxf":
case "mpeg4":
return "zmdi-movie";
break;

case "txt":
case "abw":
case "ans":
case "ascii":
case "bbs":
case "doc":
case "docm":
case "docx":
case "dot":
case "dotm":
case "dotx":
case "gdoc":
case "latex":
case "log":
case "man":
case "md5":
case "me":
case "pages":
case "save":
case "rtf":
case "wps":
case "wpt":
case "wri":
case "odt":
case "ott":
case "pdf":
case "ps":
return "zmdi-receipt";
break;

case "exe":
case "bin":
case "run":
case "dmg":
return "zmdi-settings zmdi-hc-spin";

case "js":
return "zmdi-language-javascript";

case "py":
case "pyc":
case "pyd":
case "pyo":
return "zmdi-language-python";

case "html":
case "php":
case "htm":
return "zmdi-language-html5";

case "css":
return "zmdi-language-css3";

case "sh":
case "bat":
case "cmd":
case "bash":
case "java":
case "xml":
case "yaml":
case "json":
case "c":
case "h":
case "java":
return "zmdi-polymer";
break;

case "m3u":
case "m3u8":
case "pls":
return "zmdi-camera-roll";
break;

default:
return "zmdi-file";
break;

}
}


function FSV($bytes)
{
    $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "Bytes",
                "VALUE" => 1
            ),
        );

    foreach($arBytes as $arItem)
    {
        if($bytes >= $arItem["VALUE"])
        {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", "," , strval(round($result, 1)))." ".$arItem["UNIT"];
            break;
        } else {
	    $result = "0 Bytes";
	}
    }
    return $result;
}

function parseGMApi($str) {
	return str_replace("%HOST", $_SERVER['SERVER_NAME'], str_replace("%PATH", $_SERVER['REQUEST_URI'], $str));

}

?>
