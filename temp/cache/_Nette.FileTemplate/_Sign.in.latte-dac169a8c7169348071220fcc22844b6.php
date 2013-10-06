<?php //netteCache[01]000406a:2:{s:4:"time";s:21:"0.92143800 1381083100";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:84:"/Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/Sign/in.latte";i:2;i:1381083094;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: /Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/Sign/in.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'enzmkf8o30')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb08ba4ce540_content')) { function _lb08ba4ce540_content($_l, $_args) { extract($_args)
?><body>

	<div id="top-bar">
		
		<div class="page-full-width">	
		
			<a href="http://www.npslovakia.com" class="button round dark image-left ic-left-arrow">Späť na stránku</a>
		
		</div>
	
	</div> <!-- end top-bar -->
	
	
	
	<div id="header"> <!-- clear float -->
		<div class="page-full-width cf">	
			<div id="login-intro" class="fl">
				
<?php call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>
				<h5>Pre prihlásenie vložte užívateľské meno a heslo</h5>
				
			</div> <!-- end login-intro -->
		
			<a href="http://www.npslovakia.com" class="fr"  id="company-logo"><img src="<?php echo htmlSpecialChars($basePath) ?>/images/company-logo.png" alt="NP publication" /></a>
		</div>
	</div> <!-- end header -->
	
	
	<!-- toto nahradit component form*/ -->
	<div id="content">
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("signInForm") ? "signInForm" : $_control["signInForm"]), array()) ?>

		    <fieldset>
<?php if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>
		<p>
<?php $_input = is_object("username") ? "username" : $_form["username"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ;$_input = (is_object("username") ? "username" : $_form["username"]); echo $_input->getControl()->addAttributes(array()) ?>
		</p>
		<p>
<?php $_input = is_object("password") ? "password" : $_form["password"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ;$_input = (is_object("password") ? "password" : $_form["password"]); echo $_input->getControl()->addAttributes(array()) ?>
		</p>
		<p><a href="michal.bobocky@me.com">Kontaktovať administrátora</a></p>
			
<?php $_input = (is_object("login") ? "login" : $_form["login"]); echo $_input->getControl()->addAttributes(array()) ?>
		    </fieldset>
	
<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>
	<!-- end -->
	</div> <!-- end content -->
	<div id="footer">
	
		<p>Vytvorené ako bakalárska práca.<strong> Michal Bobocký, MENDELU.</strong></p>
		<p>2013</p>
	</div> <!-- end footer -->
	
</body>

</html>

<?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbcc6154213e_title')) { function _lbcc6154213e_title($_l, $_args) { extract($_args)
?>				<h1 class="text-upper">Prihlásenie do systému</h1>
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
$robots = 'noindex' ?>


<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 