<?php
  //system("cp /web/conf/php5.ini /home/content/07/11609307/html/php5.ini");
 //  system("cp /web/conf/php.ini /var/chroot/home/content/07/11609307/html/php.ini");
?>
<?php
$inipath = php_ini_loaded_file();

if ($inipath) {
    echo 'Loaded php.ini: ' . $inipath;
} else {
    echo 'A php.ini file is not loaded';
}
?>
<br />
<?php
$currentpath =  getcwd();
if ($currentpath) {
    echo 'Current Directory Path: ' . $currentpath;
} else {
    echo 'cant find current path';
}
 
echo "<br />";
echo gethostname(); // may output e.g,: sandie
echo "<br />";
// Or, an option that also works before PHP 5.3
echo php_uname('n'); 
echo "<br />";
?>


<?php phpinfo(); ?>


<!-- /home/content/07/11609307/html -->
