<?php //netteCache[01]000406a:2:{s:4:"time";s:21:"0.57548200 1383853407";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:84:"/Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/@layout.latte";i:2;i:1383695000;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: /Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'w5imiunqqi')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb3ce3462af8_title')) { function _lb3ce3462af8_title($_l, $_args) { extract($_args)
?>NP-publication - prihlásenie<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lbd1f8317fcb_head')) { function _lbd1f8317fcb_head($_l, $_args) { extract($_args)
;
}}

//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lbe428e0cd79_scripts')) { function _lbe428e0cd79_scripts($_l, $_args) { extract($_args)
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
	<script src="<?php echo htmlSpecialChars($basePath) ?>/js/script.js"></script>  
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/netteForms.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<link rel="stylesheet" media="screen,projection,tv"
		href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/smoothness/jquery-ui.css" />
	
	<?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

</head>

<body>
	<script> document.documentElement.className+=' js' </script>
	
	

<?php $iterations = 0; foreach ($flashes as $flash): ?>	<div class="flash <?php echo htmlSpecialChars($flash->type) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ?>

	<script>
	/* Czech initialisation for the jQuery UI date picker plugin. */
	/* Written by Tomas Muller (tomas@tomas-muller.net). */
	    jQuery(function($) {
		$.datepicker.regional['cs'] = {
		    closeText: 'Zavřít',
		    prevText: '&#x3c;Dříve',
		    nextText: 'Později&#x3e;',
		    currentText: 'Nyní',
		    monthNames: ['leden', 'únor', 'březen', 'duben', 'květen', 'červen', 'červenec', 'srpen',
			'září', 'říjen', 'listopad', 'prosinec'],
		    monthNamesShort: ['led', 'úno', 'bře', 'dub', 'kvě', 'čer', 'čvc', 'srp', 'zář', 'říj', 'lis', 'pro'],
		    dayNames: ['neděle', 'pondělí', 'úterý', 'středa', 'čtvrtek', 'pátek', 'sobota'],
		    dayNamesShort: ['ne', 'po', 'út', 'st', 'čt', 'pá', 'so'],
		    dayNamesMin: ['ne', 'po', 'út', 'st', 'čt', 'pá', 'so'],
		    weekHeader: 'Týd',
		    dateFormat: 'dd. mm. yy',
		    firstDay: 1,
		    isRTL: false,
		    showMonthAfterYear: false,
		    yearSuffix: ''
		};
		$.datepicker.setDefaults($.datepicker.regional['cs']);
	    });
	</script>
	
	<script>
	$(document).ready(function () {
	    $("input.date").each(function () { // input[type=date] does not work in IE
		var el = $(this);
		var value = el.val();
		var date = (value ? $.datepicker.parseDate($.datepicker.W3C, value) : null);

		var minDate = el.attr("min") || null;
		if (minDate) minDate = $.datepicker.parseDate($.datepicker.W3C, minDate);
		var maxDate = el.attr("max") || null;
		if (maxDate) maxDate = $.datepicker.parseDate($.datepicker.W3C, maxDate);

		// input.attr("type", "text") throws exception
		if (el.attr("type") == "date") {
		    var tmp = $("<input/>");
		    $.each("class,disabled,id,maxlength,name,readonly,required,size,style,tabindex,title,value".split(","), function(i, attr)  {
			tmp.attr(attr, el.attr(attr));
		    });
		    tmp.data(el.data());
		    el.replaceWith(tmp);
		    el = tmp;
		}
		el.datepicker({
		    minDate: minDate,
		    maxDate: maxDate
		});
		el.val($.datepicker.formatDate(el.datepicker("option", "dateFormat"), date));
	    });
	});
	</script>
<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>

<?php call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars())  ?>
</body>
</html>
