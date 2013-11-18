<?php //netteCache[01]000416a:2:{s:4:"time";s:21:"0.49731200 1384796884";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:94:"/Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/Vypozicky/default.latte";i:2;i:1384796880;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: /Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/Vypozicky/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'ewqg2rudf8')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb43112d69a1_content')) { function _lb43112d69a1_content($_l, $_args) { extract($_args)
?><body>

	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<li class="v-sep"><a class="round button dark ic-left-arrow image-left" href="<?php echo htmlSpecialChars($_control->link("Choice:")) ?>
">Späť</a></li>
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Prihlásený ako <strong><?php echo Nette\Templating\Helpers::escapeHtml($user->getIdentity()->meno, ENT_NOQUOTES) ?>
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
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
				<li><a href="<?php echo htmlSpecialChars($_control->link("Homepage:", array($firma))) ?>
">Úložné jednotky</a></li>
				<li><a class="active-tab dashboard-tab" href="<?php echo htmlSpecialChars($_control->link("Vypozicky:", array('firma' => $firma))) ?>
">Výpožičky</a></li>
				<li><a href="page-other.html">Jednotky na vyradenie</a></li>
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="images/company-logo.png" alt="Blue Hosting" /></a>
			
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
if (!function_exists($_l->blocks['title'][] = '_lb6976cb8d04_title')) { function _lb6976cb8d04_title($_l, $_args) { extract($_args)
?>			<h3 class="fl">Výpožičky - <?php echo Nette\Templating\Helpers::escapeHtml($infoFirma -> nazov, ENT_NOQUOTES) ?></h3>
<?php
}}

//
// block _
//
if (!function_exists($_l->blocks['_'][] = '_lbf06c38e444__')) { function _lbf06c38e444__($_l, $_args) { extract($_args); $_control->validateControl(false)
?>						<table>
						    
							<thead>
						
								<tr>
									<th><input type="checkbox" id="table-select-all" /></th>
									<th>R.Z.</th>
									<th>Názov</th>
									<th>Rok vzniku</th>
									<th>Rozsah</th>
									<th>Typ</th>
									<th>Číslo</th>
									<th>Lokácia</th>
									<th>Akcie</th>
								</tr>
							
							</thead>
	
							<tfoot>
							
								<tr>
									<th><input type="checkbox" id="table-select-all" /></th>
									<th>R.Z.</th>
									<th>Názov</th>
									<th>Rok vzniku</th>
									<th>Rozsah</th>
									<th>Typ</th>
									<th>Číslo</th>
									<th>Lokácia</th>
									<th>Akcie</th>
									<!--<td colspan="5" class="table-footer">
					 				
										<label for="table-select-actions">S vybranými:</label>
	
										<select id="table-select-actions">
											<option value="option1">Delete</option>
											<option value="option2">Export</option>
											<option value="option3">Archive</option>
										</select>
										
										<a href="#" class="round button blue text-upper small-button">Apply to selected</a>	
										
										
										
									</td> -->
									
								</tr>
							
							</tfoot>
							
							<tbody>
								    
							    
							
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