<?php //netteCache[01]000404a:2:{s:4:"time";s:21:"0.08204300 1386971487";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:84:"/Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/@layout.latte";i:2;i:1385907953;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: /Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'e0lco8ouw8')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbf8cfaba6e1_title')) { function _lbf8cfaba6e1_title($_l, $_args) { extract($_args)
?>NP-publication - prihlásenie<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb8f9b784ba1_head')) { function _lb8f9b784ba1_head($_l, $_args) { extract($_args)
;
}}

//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lbdcdf4fd035_scripts')) { function _lbdcdf4fd035_scripts($_l, $_args) { extract($_args)
?>	<script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.js"></script>
	<script src="<?php echo htmlSpecialChars($basePath) ?>/js/netteForms.js"></script>
	<script src="<?php echo htmlSpecialChars($basePath) ?>/js/main.js"></script>
	<script src="<?php echo htmlSpecialChars($basePath) ?>/js/nette.ajax.js"></script>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="description" content="" />
<?php if (isset($robots)): ?>	<meta name="robots" content="<?php echo htmlSpecialChars($robots) ?>" />
<?php endif ?>

	<title><?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
ob_start(); call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()); echo $template->upper($template->striptags(ob_get_clean()))  ?></title>

	<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($basePath) ?>/css/style.css" />
	<link rel="stylesheet" media="print" href="<?php echo htmlSpecialChars($basePath) ?>/css/print.css" />
	<link rel="shortcut icon" href="<?php echo htmlSpecialChars($basePath) ?>/favicon.ico" />
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' />
	<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($basePath) ?>/css/login.css" />
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	
	<script type='text/javascript' src="<?php echo htmlSpecialChars($basePath) ?>/scripts/jquery-ui-timepicker-addon.js"></script>
	<script type='text/javascript' src="<?php echo htmlSpecialChars($basePath) ?>/scripts/dateInput.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo htmlSpecialChars($basePath) ?>/css/jquery-ui-timepicker-addon.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo htmlSpecialChars($basePath) ?>/css/dateInput.css" />
	
	<script src="<?php echo htmlSpecialChars($basePath) ?>/js/script.js"></script>  
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/netteForms.js"></script>
	
	
	<?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

</head>

<body>
	<script> document.documentElement.className+=' js' </script>
	
	

	
	   
	
	
<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>

<?php call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars())  ?>
</body>
</html>
