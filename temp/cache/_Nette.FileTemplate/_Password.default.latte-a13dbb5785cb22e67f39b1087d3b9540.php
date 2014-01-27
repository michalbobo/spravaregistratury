<?php //netteCache[01]000413a:2:{s:4:"time";s:21:"0.31130600 1388627525";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:93:"/Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/Password/default.latte";i:2;i:1388627429;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: /Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/Password/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'ihlm0rvrma')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb4d020ec1b5_content')) { function _lb4d020ec1b5_content($_l, $_args) { extract($_args)
?><body>

    
	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<!--<li class="v-sep"><a href="#" class="round button dark ic-left-arrow image-left">Go to website</a></li>-->
				<li class="v-sep"><a class="round button dark menu-user image-left" href="<?php echo htmlSpecialChars($_control->link("Choice:")) ?>
">Prihlásený ako <strong><?php echo Nette\Templating\Helpers::escapeHtml($user->getIdentity()->meno, ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($user->getIdentity()->priezvisko, ENT_NOQUOTES) ?></strong></a>
					<ul>
						<li><a href="#">Zmeniť heslo</a></li>
						<li><a href="<?php echo htmlSpecialChars($_control->link("signOut!")) ?>">Odhlásiť</a></li>
					</ul> 
				</li>
<?php $iterations = 0; foreach ($firmy as $polozka): ?>
				    <li class="v-sep"><a class="round button dark" href="<?php echo htmlSpecialChars($_control->link("Homepage:", array('firma' => $polozka->id_firma))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($polozka->nazov, ENT_NOQUOTES) ?></a>
					<ul>
						<li><a href="<?php echo htmlSpecialChars($_control->link("Plan:", array('firma' => $polozka->id_firma))) ?>
">Registratúrny plán</a></li>
						<li><a href="<?php echo htmlSpecialChars($_control->link("Homepage:", array('firma' => $polozka->id_firma))) ?>
">Úložné jednotky</a></li>
					</ul> 
				    </li>
				    
<?php $iterations++; endforeach ?>
				
				<?php if ($admin == TRUE): ?><li class="v-sep"><a class="round button dark" href="<?php echo htmlSpecialChars($_control->link("PrehladVypoziciek:")) ?>
">Výpožičky</a> <?php endif ?>

			
				<li><a class="round button dark menu-logoff image-left" href="<?php echo htmlSpecialChars($_control->link("signOut!")) ?>
">Odhlásiť sa</a></li>
				
			</ul> <!-- end nav -->

					
			
		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->

	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			
			<!--<div class="side-content fr">
			
				<div class="content-module"> -->
                    
                  
				
					<div class="content-module-heading cf">
					
<?php call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>
						
						
					<!--	<span class="fr expand-collapse-text initial-expand">Click to expand</span>-->
					</div> <!-- end content-module-heading -->
					
					
					
					<div class="content-module-main">
					    
					   
					   
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("passwordForm") ? "passwordForm" : $_control["passwordForm"]), array()) ?>
						<br /><div class="information-box round">Pre zmenu hesla zadajte svoje súčasné heslo a nové heslo aj s potvrdením. Nové heslo musí mať aspoň 6 znakov.</div>
								       <fieldset>
<?php if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>
									   <p>
<?php $_input = is_object("oldPassword") ? "oldPassword" : $_form["oldPassword"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ;$_input = (is_object("oldPassword") ? "oldPassword" : $_form["oldPassword"]); echo $_input->getControl()->addAttributes(array()) ?>
									   </p>
									   <p>
<?php $_input = is_object("newPassword") ? "newPassword" : $_form["newPassword"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ;$_input = (is_object("newPassword") ? "newPassword" : $_form["newPassword"]); echo $_input->getControl()->addAttributes(array()) ?>
									   </p>
									   <p>
<?php $_input = is_object("confirmPassword") ? "confirmPassword" : $_form["confirmPassword"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ;$_input = (is_object("confirmPassword") ? "confirmPassword" : $_form["confirmPassword"]); echo $_input->getControl()->addAttributes(array()) ?>
									   </p>
									   <p>
<?php $_input = (is_object("set") ? "set" : $_form["set"]); echo $_input->getControl()->addAttributes(array()) ?>
									   </p>
									</fieldset>
	
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
if (!function_exists($_l->blocks['title'][] = '_lb5927ece912_title')) { function _lb5927ece912_title($_l, $_args) { extract($_args)
?>						<h3 class="fl">Zmena hesla</h3>
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