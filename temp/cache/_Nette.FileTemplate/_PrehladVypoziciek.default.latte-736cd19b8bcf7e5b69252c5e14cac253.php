<?php //netteCache[01]000423a:2:{s:4:"time";s:21:"0.87611800 1387042461";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:102:"/Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/PrehladVypoziciek/default.latte";i:2;i:1387041863;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: /Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/PrehladVypoziciek/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'ndm09e7398')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb285c7a09ec_content')) { function _lb285c7a09ec_content($_l, $_args) { extract($_args)
?><body>

	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<li class="v-sep"><a class="round button dark ic-left-arrow image-left" href="<?php echo htmlSpecialChars($_control->link("Choice:")) ?>
">Späť</a></li>
				<li class="v-sep"><a class="round button dark menu-user image-left" href="<?php echo htmlSpecialChars($_control->link("Choice:")) ?>
">Prihlásený ako <strong><?php echo Nette\Templating\Helpers::escapeHtml($user->getIdentity()->meno, ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($user->getIdentity()->priezvisko, ENT_NOQUOTES) ?></strong></a>
					<ul>
						<li><a href="<?php echo htmlSpecialChars($_control->link("Password:")) ?>">Zmeniť heslo</a></li>
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
				
				
				<li><a class="round button dark menu-logoff image-left" href="<?php echo htmlSpecialChars($_control->link("signOut!")) ?>
">Odhlásiť sa</a></li>
				
			</ul> <!-- end nav -->

					
			

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	
	
	
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">
		    
		    <div class="content-module-heading cf">
					
<?php call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>
						
						
					<!--	<span class="fr expand-collapse-text initial-expand">Click to expand</span>-->
		    </div>
<?php $iterations = 0; foreach ($flashes as $flash): ?>
			<div class="flash <?php echo htmlSpecialChars($flash->type) ?>"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ?>
		    
		   
			
			<!-- <div class="side-content fr"> -->
			
				<div class="content-module">
				
					<!--<div class="content-module-heading cf">
					
						<h3 class="fl">Table design</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
<div id="<?php echo $_control->getSnippetId('') ?>"><?php call_user_func(reset($_l->blocks['_']), $_l, $template->getParameters()) ?>
</div>					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->
				
			
			</div> <!-- end side-content -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">
	
		<p>Vytvorené ako bakalárska práca.<strong> Michal Bobocký, MENDELU.</strong></p>
		<p>2013</p>
	</div> <!-- end footer --><!-- end footer -->

</body>
</html>
<?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbadc64d7207_title')) { function _lbadc64d7207_title($_l, $_args) { extract($_args)
?>			<h3 class="fl">Prehľad výpožičiek</h3>
<?php
}}

//
// block _
//
if (!function_exists($_l->blocks['_'][] = '_lbbc7cdf5476__')) { function _lbbc7cdf5476__($_l, $_args) { extract($_args); $_control->validateControl(false)
?>						<table>
						    
							<thead>
						
								<tr>
									<th>Číslo výpožičky</th>
									<th>Typ</th>
									<th>Dátum žiadosti</th>
									<th>Žiadatel</th>
									<th>Poznámka</th>
									<th>Množstvo</th>
									<th>Číslo záznamu</th>
									<th>Zadávateľ</th>
									<th>Číslo jednotky</th>
									<th>Lokácia</th>
									<th>Názov</th>
									<th>Akcie</th>
								</tr>
							
							</thead>
	
							
							<tbody>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($vypozicky) as $vypozicka): ?>
								     <tr<?php if ($_l->tmp = array_filter(array($iterator->isOdd() ? 'odd' : 'even'))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($vypozicka->id_vypozicka, ENT_NOQUOTES) ?></td>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($vypozicka->typ, ENT_NOQUOTES) ?></td>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($vypozicka->datum_ziadosti, 'j. n. Y'), ENT_NOQUOTES) ?></td>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($vypozicka->ziadatel, ENT_NOQUOTES) ?></td>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($vypozicka->poznamka, ENT_NOQUOTES) ?></td>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($vypozicka->mnozstvo, ENT_NOQUOTES) ?></td>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($vypozicka->cislo_zaznamu, ENT_NOQUOTES) ?></td>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($vypozicka->meno, ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($vypozicka->priezvisko, ENT_NOQUOTES) ?></td>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($vypozicka->jednotka, ENT_NOQUOTES) ?></td>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($vypozicka->lokacia, ENT_NOQUOTES) ?></td>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($vypozicka->nazovJednotky, ENT_NOQUOTES) ?></td>
									<td>
									    <a class="ic-table-done table-actions-button ajax" href="<?php echo htmlSpecialChars($_control->link("Done!", array('id' => $vypozicka->id_vypozicka))) ?>
"></a>
									   <?php if ($vypozicka->typ == "scan"): ?> <a class="table-actions-button ic-table-upload-dark" href="<?php echo htmlSpecialChars($_control->link("Upload:", array('jednotka' => $vypozicka->id_jednotka, 'src' => 'prehlad' ))) ?>
"></a> <?php endif ?>

									    <a class="table-actions-button ic-table-edit" href="<?php echo htmlSpecialChars($_control->link("EditVypozicka:", array('vypozicka' => $vypozicka->id_vypozicka, 'src' => 'prehlad'))) ?>
"></a>							
									</td>
								    </tr>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
							</tbody>
							
						</table>
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