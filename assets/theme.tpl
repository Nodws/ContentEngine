<!DOCTYPE html>
<html>
<head>
<title>{title}</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="description" content="{description}">
<meta name="keywords" content="{keywords}">
<meta name="generator" content="NodCMS">
<base href="{path}">
<!-- You must setup a base url if you are in subdir -->
<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:700,300" rel="stylesheet" type="text/css">
<link type="text/css" href="assets/css/style.css" rel="stylesheet" media="all">	 
</head> 
<body>
   <div class="w">
       <div class="h">
            <div class="logo">
              <img src="assets/img/Nodcms.jpg">
             </div>
            <ul class="m"> 
            {menu}

             </ul>
       </div>
       <div class="c">
        {crumbs}
        {content}
        </div>
   </div>
      <div class="f">
      Copyright &copy; <? echo date('Y'); //We can have PHP too! ?>  

      </div>
</body>
</html>                                          