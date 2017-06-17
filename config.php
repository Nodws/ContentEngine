<?
/*
Content Engine
https://github.com/Nodws/ContentEngine
by @nodws
*/
if(!defined('ENGINE'))
   die('Can\'t Access this file directly');

//No double quotes on text vars
   $c[title]="The Super title page";
   $c[description]="CMS super flexible"; 
   $c[keywords]="cms, framework, templating, mcv";

//Modify these for added customization, rename dirs and keep it simple
   //If you are in a Subdirectory, modify your .htaccess
   $c[cdir]="content";  //Contents directory
   $c[home]="index";  //Home page name: content/index.html
   $c[ext]="html";  //Content file extension, html by default
   $c[theme]="assets/theme.tpl"; //Your theme file 
   $c[img]="assets/img"; //Image directory
   $c[ugly]=false; //use ?ugly=urls
   $c[adm]="admin"; //Admin directory
   $c[root]=__DIR__; //Path to this directory
   $c[url] = rtrim(dirname($_SERVER['PHP_SELF']),$c[adm]);

?>
