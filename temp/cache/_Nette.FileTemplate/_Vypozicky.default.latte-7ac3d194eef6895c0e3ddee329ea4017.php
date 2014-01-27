<?php //netteCache[01]000414a:2:{s:4:"time";s:21:"0.08156000 1388627507";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:94:"/Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/Vypozicky/default.latte";i:2;i:1388627429;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: /Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/Vypozicky/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'oimjmgwypg')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb0496f6f120_content')) { function _lb0496f6f120_content($_l, $_args) { extract($_args)
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
				<li class="v-sep"><a class="round button dark" href="<?php echo htmlSpecialChars($_control->link("Plan:", array('firma' => $firma))) ?>
">Registratúrny plán</a></li>
				<li><a class="round button dark menu-logoff image-left" href="<?php echo htmlSpecialChars($_control->link("signOut!")) ?>
">Odhlásiť sa</a></li>
				
			</ul> <!-- end nav -->

					
			

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
				<li><a href="<?php echo htmlSpecialChars($_control->link("Homepage:", array($firma))) ?>
">Úložné jednotky</a></li>
				<li><a class="active-tab dashboard-tab" href="<?php echo htmlSpecialChars($_control->link("Vypozicky:", array('firma' => $firma))) ?>
">Výpožičky</a></li>
				<li><a href="<?php echo htmlSpecialChars($_control->link("Vyradene:default", array('firma' => $firma))) ?>
">Jednotky na vyradenie</a></li>
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="<?php echo htmlSpecialChars($basePath) ?>/images/company-logo.png" alt="NP publication, a.s." /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
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
		    
		    <br />
		    <p>Výpožičky, ktoré zatiaľ neboli vybavené, po nahraní všetkých scanov alebo odoslaní originálu 
		    výpožičku dokončite tlačítkom vybavené. Zadávateľovi sa následne odošle informačný mail.</p>
			
			<!-- <div class="side-content fr"> -->
<div id="<?php echo $_control->getSnippetId('') ?>"><?php call_user_func(reset($_l->blocks['_']), $_l, $template->getParameters()) ?>
</div>			</div> <!-- end side-content -->
		
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
if (!function_exists($_l->blocks['title'][] = '_lb8733b0b6bd_title')) { function _lb8733b0b6bd_title($_l, $_args) { extract($_args)
?>			<h3 class="fl">Výpožičky - <?php echo Nette\Templating\Helpers::escapeHtml($infoFirma -> nazov, ENT_NOQUOTES) ?> - Nevybavené</h3>
<?php
}}

//
// block _
//
if (!function_exists($_l->blocks['_'][] = '_lbab112950aa__')) { function _lbab112950aa__($_l, $_args) { extract($_args); $_control->validateControl(false)
?>				<div class="content-module">
				
					
					<div class="content-module-main">
						
						<table>
						    
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
									   <?php if ($vypozicka->typ == "scan"): ?> <a class="table-actions-button ic-table-upload-dark" href="<?php echo htmlSpecialChars($_control->link("Upload:", array('jednotka' => $vypozicka->id_jednotka, 'firma' => $firma, 'src' => 'vypozicky' ))) ?>
"></a> <?php endif ?>

									    <a class="table-actions-button ic-table-edit" href="<?php echo htmlSpecialChars($_control->link("EditVypozicka:", array('vypozicka' => $vypozicka->id_vypozicka, 'firma' => $firma))) ?>
"></a>							
									</td>
								    </tr>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
							</tbody>
							
						</table>
					
					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->
				
			<div class="content-module-heading cf">
					
			<h3 class="fl">Výpožičky - <?php echo Nette\Templating\Helpers::escapeHtml($infoFirma -> nazov, ENT_NOQUOTES) ?> - Vybavené</h3>
						
						
					<!--	<span class="fr expand-collapse-text initial-expand">Click to expand</span>-->
		    </div>
<?php $iterations = 0; foreach ($flashes as $flash): ?>
			<div class="flash <?php echo htmlSpecialChars($flash->type) ?>"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ?>
			
		    <br />
		    <p>Výpožičky, ktoré už boli vybavené. V prípade nezrovnalosti alebo nespokojnosti je nutné vytvoriť novú výpožičku.</p>
		    
			<!-- <div class="side-content fr"> -->
			
				<div class="content-module">
				
					
					
					
					<div class="content-module-main">
						
						<table>
						    
							<thead>
						
								<tr>
									<th>Číslo výpožičky</th>
									<th>Typ</th>
									<th>Dátum žiadosti</th>
									<th>Dátum vybavenia</th>
									<th>Žiadatel</th>
									<th>Poznámka</th>
									<th>Množstvo</th>
									<th>Číslo záznamu</th>
									<th>Zadávateľ</th>
									<th>Číslo jednotky</th>
									<th>Lokácia</th>
									<th>Názov</th>
									
								</tr>
							
							</thead>
							
							<tbody>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($vybavene) as $vyb): ?>
								     <tr<?php if ($_l->tmp = array_filter(array($iterator->isOdd() ? 'odd' : 'even'))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($vypozicka->id_vypozicka, ENT_NOQUOTES) ?></td>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($vyb->typ, ENT_NOQUOTES) ?></td>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($vyb->datum_ziadosti, 'j. n. Y'), ENT_NOQUOTES) ?></td>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($vyb->datum_vybavenia, 'j. n. Y'), ENT_NOQUOTES) ?></td>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($vyb->ziadatel, ENT_NOQUOTES) ?></td>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($vyb->poznamka, ENT_NOQUOTES) ?></td>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($vyb->mnozstvo, ENT_NOQUOTES) ?></td>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($vyb->cislo_zaznamu, ENT_NOQUOTES) ?></td>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($vyb->meno, ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($vyb->priezvisko, ENT_NOQUOTES) ?></td>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($vyb->jednotka, ENT_NOQUOTES) ?></td>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($vyb->lokacia, ENT_NOQUOTES) ?></td>
									<td><?php echo Nette\Templating\Helpers::escapeHtml($vyb->nazovJednotky, ENT_NOQUOTES) ?></td>
									
								    </tr>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
							    
							
							</tbody>
							
						</table>
					
					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->	
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