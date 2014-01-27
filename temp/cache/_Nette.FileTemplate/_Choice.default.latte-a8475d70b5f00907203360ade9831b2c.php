<?php //netteCache[01]000411a:2:{s:4:"time";s:21:"0.33876600 1388627488";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:91:"/Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/Choice/default.latte";i:2;i:1388627429;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: /Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/Choice/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '7oadkf5xpd')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb2a6f6c2d05_content')) { function _lb2a6f6c2d05_content($_l, $_args) { extract($_args)
?><body>


<!-- TOP BAR -->
	<div id="top-bar">
	
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Prihlásený ako <strong><?php echo Nette\Templating\Helpers::escapeHtml($user->getIdentity()->meno, ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($user->getIdentity()->priezvisko, ENT_NOQUOTES) ?></strong></a>
					<ul>
					    <li><a href="<?php echo htmlSpecialChars($_control->link("Password:")) ?>
">Zmeniť heslo</a></li>
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

					
				</li>
			
				<li><a class="round button dark menu-logoff image-left" href="<?php echo htmlSpecialChars($_control->link("signOut!")) ?>
">Odhlásiť sa</a></li>
				
			</ul> <!-- end nav -->

					
			
		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->

	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">
<?php $iterations = 0; foreach ($flashes as $flash): ?>
			<div class="flash <?php echo htmlSpecialChars($flash->type) ?>"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ?>
				
					<div class="content-module-heading cf">
					
<?php call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>
						
						
					
					</div> <!-- end content-module-heading -->
					
					
					
					<div class="content-module-main">
					    
					    <p>Jednoduchý prehľad nesplnených úloh. Úlohy je možné pridávať pomocou formulára naspodu sekcie.
					   
<div id="<?php echo $_control->getSnippetId('') ?>"><?php call_user_func(reset($_l->blocks['_']), $_l, $template->getParameters()) ?>
</div>					    
					    
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
if (!function_exists($_l->blocks['title'][] = '_lb3622d6fb8e_title')) { function _lb3622d6fb8e_title($_l, $_args) { extract($_args)
?>						<h3 class="fl">Prehľad úloh</h3>
<?php
}}

//
// block _
//
if (!function_exists($_l->blocks['_'][] = '_lbd51e47f691__')) { function _lbd51e47f691__($_l, $_args) { extract($_args); $_control->validateControl(false)
?>						<table id='ulohy'>
						
							<thead>
						
								<tr>
									<th>Dátum</th>
									<th>Úloha</th>
									<th>Akcie</th>
								</tr>
							
							</thead>
	
									
							<tbody>
	
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($ulohy) as $uloha): ?>
							    <tr<?php if ($_l->tmp = array_filter(array($iterator->isOdd() ? 'odd' : 'even'))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
								<td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($uloha->datum, 'j. n. Y'), ENT_NOQUOTES) ?></td>
								<td><?php echo Nette\Templating\Helpers::escapeHtml($uloha->popis, ENT_NOQUOTES) ?></td>
								<td>
								    <a class="table-actions-button ic-table-done ajax" href="<?php echo htmlSpecialChars($_control->link("markDone!", array($uloha->id_uloha))) ?>
"></a>
								</td>
							    </tr>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
							
							</tbody>
							<!-- FORMULAR PRE PRIDAVANIE ULOH -->
							<tfoot>
							   
							</tfoot>
							<!-- END FORMULAR -->
							
						</table>
						
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("addUlohaForm") ? "addUlohaForm" : $_control["addUlohaForm"]), array()) ;if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>
								       
									   
									   <p>
<?php $_input = is_object("datum") ? "datum" : $_form["datum"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ;$_input = (is_object("datum") ? "datum" : $_form["datum"]); echo $_input->getControl()->addAttributes(array()) ?>
									   </p>
									   <p>
<?php $_input = is_object("popis") ? "popis" : $_form["popis"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ;$_input = (is_object("popis") ? "popis" : $_form["popis"]); echo $_input->getControl()->addAttributes(array()) ?>
									   </p>
<?php $_input = (is_object("pridat") ? "pridat" : $_form["pridat"]); echo $_input->getControl()->addAttributes(array()) ?>
									    
									
	
<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ;
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
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 