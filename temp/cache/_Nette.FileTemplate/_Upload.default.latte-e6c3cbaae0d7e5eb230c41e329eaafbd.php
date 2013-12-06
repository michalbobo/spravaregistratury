<?php //netteCache[01]000411a:2:{s:4:"time";s:21:"0.95266200 1386363553";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:91:"/Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/Upload/default.latte";i:2;i:1386075853;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: /Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/Upload/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'hsk2m12n08')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb77b214e120_content')) { function _lb77b214e120_content($_l, $_args) { extract($_args)
?><body>

    
	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<li class="v-sep"><a class="round button dark ic-left-arrow image-left" href="<?php echo htmlSpecialChars($_control->link("Homepage:", array('firma' => $firma))) ?>
">Späť</a></li>
				<li class="v-sep"><a class="round button dark menu-user image-left" href="<?php echo htmlSpecialChars($_control->link("Choice")) ?>
">Prihlásený ako <strong><?php echo Nette\Templating\Helpers::escapeHtml($user->getIdentity()->meno, ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($user->getIdentity()->priezvisko, ENT_NOQUOTES) ?></strong></a>
					<ul>
						<li><a href="<?php echo htmlSpecialChars($_control->link("Password:")) ?>">Zmeniť heslo</a></li>
						<li><a href="<?php echo htmlSpecialChars($_control->link("signOut!")) ?>">Odhlásiť</a></li>
					</ul> 
				</li>
				<li class="v-sep"><a class="round button dark" href="<?php echo htmlSpecialChars($_control->link("Plan:", array('firma' => $firma))) ?>
">Registratúrny plán</a></li>
				<li><a href="#" class="round button dark menu-email-special image-left">3 nové upozornenia</a></li>
				<li><a class="round button dark menu-logoff image-left" href="<?php echo htmlSpecialChars($_control->link("signOut!")) ?>
">Odhlásiť sa</a></li>
				
			</ul> <!-- end nav -->

					
			

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<!--
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
				<li><a href="dashboard.html" class="active-tab dashboard-tab">Domov</a></li>
				<li><a href="page-full-width.html">Full width page</a></li>
				<li><a href="page-other.html">Other page elements</a></li>
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			
				<!--	<a href="#" id="company-branding-small" class="fr"><img src="images/company-logo.png" alt="Blue Hosting" /></a>
		<!--	
		</div> <!-- end full-width -->	
<!--
	</div> <!-- end header -->

	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<!--<div class="side-menu fl">
				
				<h3>Menu</h3>
				<ul>
					<li><a href="#">Moje úlohy</a></li>
					<li><a href="#">US Steel</a></li>
					<li><a href="#">Union</a></li>
					<li><a href="#">Union ZP</a></li>
					<li><a href="#">Zipp</a></li>
				</ul>
				
			</div> <!-- end side-menu -->
			
			<!--<div class="side-content fr">
			
				<div class="content-module"> -->
                    
                  
				
					<div class="content-module-heading cf">
					
<?php call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>
						
						
					<!--	<span class="fr expand-collapse-text initial-expand">Click to expand</span>-->
					</div> <!-- end content-module-heading -->
					
					
					
					<div class="content-module-main">
					    
					    <p>Upload súboru k jednotke <b>č. <?php echo Nette\Templating\Helpers::escapeHtml($aktualnyZaznam->cislo_jednotky, ENT_NOQUOTES) ?>
</b> z roku <b><?php echo Nette\Templating\Helpers::escapeHtml($aktualnyZaznam->rok_vzniku, ENT_NOQUOTES) ?>
</b> firmy <b><?php echo Nette\Templating\Helpers::escapeHtml($spolocnost->nazov, ENT_NOQUOTES) ?></b>. </p>   
					    
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("uploadForm") ? "uploadForm" : $_control["uploadForm"]), array()) ?>
				 
				 
								     
<?php if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>

					    
						    <?php $_input = is_object("subor") ? "subor" : $_form["subor"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ;$_input = (is_object("subor") ? "subor" : $_form["subor"]); echo $_input->getControl()->addAttributes(array()) ?>

						    
<?php $_input = (is_object("upload") ? "upload" : $_form["upload"]); echo $_input->getControl()->addAttributes(array()) ?>

					  
<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>
						
					    
					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->
				
                                
				
		
			</div> <!-- end side-content -->
		
                                                            
                                                            
                
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	

	
	<!-- FOOTER -->
	<div id="footer">
	
	    <p>Vytvorené ako bakalárska práca.<strong><a href="mailto:michal.bobocky@me.com"> Michal Bobocký </a>, <a href="https://mendelu.cz">MENDELU.</a></strong></p>
		<p>2013</p>
	</div> <!-- end footer --><!-- end footer -->

</body>
</html><?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbc7c4acc926_title')) { function _lbc7c4acc926_title($_l, $_args) { extract($_args)
?>						<h3 class="fl">Upload súboru</h3>
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

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 