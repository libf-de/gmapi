<?php
/********************************************************************************

       GM-Api v. 0.2  -  Material File Explorer written in PHP/CSS/HTML
	     Written By Xorg - xorg.ga - Licensed under GNU GPL v3

	 Further License Information can be found under OPENSOURCE.TXT


		    (C) Fabian S. / XorgMC 2015


********************************************************************************/

include_once 'util.php';
include_once 'lang.de.php';

$PATH = $_SERVER['REQUEST_URI'];
$RPATH = realpath(".." . $PATH);
$DOMAIN = $_SERVER['SERVER_NAME'];
$DIRECT_DOWNLOAD = True;
?>
<HTML>
<HEAD>
<TITLE><?php echo parseGMApi($lang['TITLE']); ?></TITLE>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/paper/bootstrap.min.css" rel="stylesheet" integrity="sha256-hMIwZV8FylgKjXnmRI2YY0HLnozYr7Cuo1JvRtzmPWs=sha512-k+wW4K+gHODPy/0gaAMUNmCItIunOZ+PeLW7iZwkDZH/wMaTrSJTt7zK6TGy6p+rnDBghAxdvu1LX2Ohg0ypDw==" crossorigin="anonymous"> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
<link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" rel="stylesheet"> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
@media (min-width: 768px) {
    .nav .breadcrumb {
        float: left;
        margin: 12px 10px;
    }
}
</style>
</HEAD>
<BODY>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?php echo $DOMAIN; ?></a>
    </div>

   <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
    <ul class="nav navbar-nav navbar-right">
	<li><a href="http://thexorg.tk/gmapi-filebrowser/"><b>powered by GMAPI v0.1</b></a></li> <!-- MUST STAY HERE! -->
    </ul>
   </div>
  </div>
</nav>

<div class="container">
<ul class="breadcrumb">
<li><a href="/"><?php echo $lang['ROOT']; ?></a></li>
<?php
$crumbs = array_filter(explode("/",$_SERVER["REQUEST_URI"]));
$ccount = sizeof($crumbs) - 1;
$i = 0;
foreach($crumbs as $crumb){
  $clinka = array_slice($crumbs, 0, $i + 1);
  $clink = "/" . implode("/", $clinka);
  if($i != $ccount) {
    echo "<li><a href=\"" . $clink . "\">" . $crumb ."</a></li>";
  } else {
    echo "<li class=\"active\">" . $crumb . "</li>";
  }
    $i++;
}
?>
</ul>

<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th></th>
      <th><?php echo $lang['FILE_NAME']; ?></th>
      <th><?php echo $lang['SIZE']; ?></th>
      <th><?php echo $lang['FILE_TYPE']; ?></th>
    </tr>
  </thead>
  <tbody>
<?php
$directories = array();
$files_list  = array();
$files = scandir($RPATH);
foreach($files as $file){
   if(($file != '.') && ($file != '..')){
      if(is_dir($RPATH.'/'.$file)){
         $directories[]  = $file;
      }else{
         $files_list[]    = $file;

      }
   }
}

if($PATH != "/") {
 echo "<tr onclick=\"document.location = '..';\"><td><i class=\"zmdi zmdi-chevron-left zmdi-hc-fw zmdi-hc-2x\"></i></td><td>" . $lang['DIRUP'] . "</b></td><td>-</td><td>" . $lang['DIRECTORY'] . "</td>";
   echo "</tr>";
}

foreach($directories as $dir){
   if($dir != "_gmapi") {
   if($DIRECT_DOWNLOAD) {
	$DL = $dir;
   } else {
	$DL = $dir;
   }
   echo "<tr onclick=\"document.location = '" . $DL . "';\"><td width=\"5\"><i class=\"zmdi zmdi-folder zmdi-hc-fw zmdi-hc-2x\"></i></td><td>" . $dir . "</td><td>-</td><td>" . $lang['DIRECTORY'] . "</td>";
   echo "</tr>";
   }
}

foreach($files_list as $fil){
   if($DIRECT_DOWNLOAD) {
	$DL = $fil;
   } else {
	$DL = realpath(".") . "/download.php?f=" . $fil . "&p=" . $PATH;
   }
   echo "<tr onclick=\"document.location = '" . $DL . "';\"><td width=\"5\"><i class=\"zmdi " . getFileIcon($fil) . " zmdi-hc-fw zmdi-hc-2x\"></i></td><td>" . $fil . "</td><td>" . FSV(filesize($RPATH . "/" . $fil)) . "</td><td>" . $lang['FILE'] . "</td>";
   echo "</tr>";
}
?>
</div>
</BODY>
</HTML>
