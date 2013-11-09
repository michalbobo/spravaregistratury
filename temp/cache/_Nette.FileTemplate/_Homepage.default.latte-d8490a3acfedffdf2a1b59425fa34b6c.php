<?php //netteCache[01]000415a:2:{s:4:"time";s:21:"0.45059700 1384029836";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:93:"/Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/Homepage/default.latte";i:2;i:1384029807;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: /Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/Homepage/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'xi9qj73fon')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb592017cee2_content')) { function _lb592017cee2_content($_l, $_args) { extract($_args)
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
						<li><a href="#">Zmeniť heslo</a></li>
						<li><a href="<?php echo htmlSpecialChars($_control->link("signOut!")) ?>">Odhlásiť</a></li>
					</ul> 
				</li>
			
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
				<li><a href="dashboard.html" class="active-tab dashboard-tab">Úložné jednotky</a></li>
				<li><a href="page-full-width.html">Výpožičky</a></li>
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
			
				<div class="content-module">
				
					<!--<div class="content-module-heading cf">
					
						<h3 class="fl">Table design</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
					
						<table>
						
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
								
									<td colspan="5" class="table-footer">
									
										<label for="table-select-actions">S vybranými:</label>
	
										<select id="table-select-actions">
											<option value="option1">Delete</option>
											<option value="option2">Export</option>
											<option value="option3">Archive</option>
										</select>
										
										<a href="#" class="round button blue text-upper small-button">Apply to selected</a>	
	
									</td>
									
								</tr>
							
							</tfoot>
							
							<tbody>
								    
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($jednotky) as $jednotka): ?>
							    <tr<?php if ($_l->tmp = array_filter(array($iterator->isOdd() ? 'odd' : 'even'))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
								<td><input type="checkbox" /><?php echo Nette\Templating\Helpers::escapeHtml($iterator->counter, ENT_NOQUOTES) ?></td>
								<td><?php echo Nette\Templating\Helpers::escapeHtml($jednotka->reg_znacka, ENT_NOQUOTES) ?></td>
								<td><?php echo Nette\Templating\Helpers::escapeHtml($jednotka->nazov, ENT_NOQUOTES) ?></td>
								<td><?php echo Nette\Templating\Helpers::escapeHtml($jednotka->rok_vzniku, ENT_NOQUOTES) ?></td>
								<td><?php echo Nette\Templating\Helpers::escapeHtml($jednotka->rozsah, ENT_NOQUOTES) ?></td>
								<td><?php echo Nette\Templating\Helpers::escapeHtml($jednotka->typ_jednotky, ENT_NOQUOTES) ?></td>
								<td><?php echo Nette\Templating\Helpers::escapeHtml($jednotka->cislo_jednotky, ENT_NOQUOTES) ?></td>
								<td><?php echo Nette\Templating\Helpers::escapeHtml($jednotka->lokacia, ENT_NOQUOTES) ?></td>
								
								
								<td>
								    <a href="#" class="table-actions-button ic-table-edit"></a>
								    <a href="#" class="table-actions-button ic-table-delete"></a>
								</td>
							    </tr>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
							
							</tbody>
							
						</table>
					
					</div> <!-- end content-module-main -->
				
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