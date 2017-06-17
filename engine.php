<?
/*
Content Engine
https://github.com/Nodws/ContentEngine
by @nodws
*/

include('config.php');

if(!$c[cdir]):
    echo "Please set the variables in config.php";
elseif(!file_exists($c[theme]) || !$c[theme]):
    echo "Please create and define a theme tpl file ({$c[cdir]}/{$c[theme]})";
else:
    renderit();
endif;

//STOP! NO EDITING BELOW THIS LINE
   //SRSLY YOU COULD DIE!
  function good_str($string){
   return preg_replace("/[^a-zA-z0-9_\/-]/","", $string);
  }
function gcont($filename) {
   
        ob_start();
        include $filename;
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
   
}
function renderit(){
  GLOBAL $c;
  $tpl = gcont($c[theme]); 
  $cont = the_content();
  $html = str_replace('{content}', $cont, $tpl);
  $html = str_replace('{menu}', menu() , $html);
  $html = str_replace('{title}', the_title($cont) , $html);
  $html = str_replace('{path}', site_root() , $html);
  $html = str_replace('{crumbs}', breadcrumbs() , $html);
  echo $html;
}

function menu($dir='',$sub=''){
  global $c;
  $dir = $dir ? $dir : __DIR__.'/'.$c[cdir];
  $sub = $sub ? $sub."/" : "";
  $files = array_slice(scandir($dir), 2);
  if(!$sub)
      $r.="<li><a href='/'>Home</a></li>";
  foreach($files as $file)
  {
    $f = explode('.'.$c[ext], $file);
    
       if(isset($f[1]) && $f[0]!=$c[home])
      { if(is_dir($dir."/".$f[0])):
        $r.= "<li><a href='$sub$f[0]'>$f[0]</a>\n<ul class='sub-menu'>\n".menu($dir."/".$f[0],$sub.$f[0])."</ul>\n";
        else:
        $r.= "<li><a href='$sub$f[0]'>$f[0]</a></li>\n";
        endif;
      }
  }
  return $r;
}

function the_title($x)
{
global $c;

 if(preg_match('#<\s*?h1\b[^>]*>(.*?)</h1\b[^>]*>#s', $x, $t))
  return $t[1];

  return $c[title];
}
   function the_content(){
      GLOBAL $c;
      $w=$c[cdir]."/";
      $x=good_str($_GET[f]);
      $y='.'.$c[ext];
      $file = $w.$x.$y;
      $home = $w.$c[home].$y;

      if(file_exists($file)):
       return file_get_contents($file);
      elseif(file_exists($home)):
        return file_get_contents($home);
      else:
         return "<h1>No home page found</h1>";
      endif;

   }
  function breadcrumbs(){
    $uri = good_str($_GET[f]);
    $u = explode('/',$uri);
    $r.= "<nav class='breadcrumbs'><a href='./'>Home</a>";
    foreach($u as $v){
      $url = @strstr($uri, $v,true).$v;
       $r.= " / <a href='".$url."'>$v</a>";
    }
    return $r."</nav>";
  } 
function site_root()
{
  return str_replace($_SERVER["DOCUMENT_ROOT"] , "",__DIR__)."/";
}

?>
