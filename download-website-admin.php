<?php
session_start();
function recurse_copy($src, $dst){
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
}
if (!file_exists('user_folders/'.$_SESSION['username'].'/admin-folder')){
    $src = "admin-folder-to-copy";
    $dst = "user_folders/".$_SESSION['username']."/admin-folder";
    recurse_copy($src, $dst);
}

$the_folder = 'user_folders/chintan_admin';
$zip_file_name = 'my_website.zip';

class FlxZipArchive extends ZipArchive {
        /** Add a Dir with Files and Subdirs to the archive;;;;; @param string $location Real Location;;;;  @param string $name Name in Archive;;; @author Nicolas Heimann;;;; @access private  **/
    public function addDir($location, $name) {
        $this->addEmptyDir($name);
         $this->addDirDo($location, $name);
     } // EO addDir;

        /**  Add Files & Dirs to archive;;;; @param string $location Real Location;  @param string $name Name in Archive;;;;;; @author Nicolas Heimann * @access private   **/
    private function addDirDo($location, $name) {
        $name .= '/';         $location .= '/';
      // Read all Files in Dir
        $dir = opendir ($location);
        while ($file = readdir($dir))    {
            if ($file == '.' || $file == '..') continue;
          // Rekursiv, If dir: FlxZipArchive::addDir(), else ::File();
            $do = (filetype( $location . $file) == 'dir') ? 'addDir' : 'addFile';
            $this->$do($location . $file, $name . $file);
        }
    } 
}

$za = new FlxZipArchive;
$res = $za->open($zip_file_name, ZipArchive::CREATE);
if($res === TRUE)    {
    $za->addDir($the_folder, basename($the_folder)); 
    $za->close();
    header("Content-type: application/zip"); 
    header("Content-Disposition: attachment; filename=".$zip_file_name);
    header("Content-length: " . filesize($zip_file_name));
    header("Pragma: no-cache"); 
    header("Expires: 0"); 
    readfile($zip_file_name);
    unlink($zip_file_name);
}
else  { echo 'Could not create a zip archive';}
?>