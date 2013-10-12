<?php //netteCache[01]000413a:2:{s:4:"time";s:21:"0.90427900 1381600958";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:91:"/Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/Choice/default.latte";i:2;i:1381600948;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: /Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/Choice/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'cnq8aq360l')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbdba0ff3345_content')) { function _lbdba0ff3345_content($_l, $_args) { extract($_args)
?><body>

    
	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<!--<li class="v-sep"><a href="#" class="round button dark ic-left-arrow image-left">Go to website</a></li>-->
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Prihlásený ako <strong><?php echo Nette\Templating\Helpers::escapeHtml($user->getIdentity()->meno, ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($user->getIdentity()->priezvisko, ENT_NOQUOTES) ?></strong></a>
					<ul>
						<li><a href="#">Zmeniť heslo</a></li>
						<li><a href="<?php echo htmlSpecialChars($_control->link("signOut!")) ?>">Odhlásiť</a></li>
					</ul> 
				</li>
				<li class="v-sep"><a class="round button dark" href="<?php echo htmlSpecialChars($_control->link("Homepage:")) ?>
">US Steel</a>
					<ul>
						<li><a href="<?php echo htmlSpecialChars($_control->link("Homepage:")) ?>">Registratúrny poriadok</a></li>
						<li><a href="#">Databáza záznamov</a></li>
					</ul> 
				</li>
				<li class="v-sep"><a href="#" class="round button dark">Union</a>
					<ul>
						<li><a href="#">Registratúrny poriadok</a></li>
						<li><a href="#">Databáza záznamov</a></li>
					</ul> 
				</li>
				<li class="v-sep"><a href="#" class="round button dark">Union ZP</a>
					<ul>
						<li><a href="#">Registratúrny poriadok</a></li>
						<li><a href="#">Databáza záznamov</a></li>
					</ul> 
				</li>
				<li class="v-sep"><a href="#" class="round button dark">ZIPP</a>
					<ul>
						<li><a href="#">Registratúrny poriadok</a></li>
						<li><a href="#">Databáza záznamov</a></li>
					</ul> 
				</li>
			
				<li><a class="round button dark menu-logoff image-left" href="<?php echo htmlSpecialChars($_control->link("signOut!")) ?>
">Odhlásiť sa</a></li>
				
			</ul> <!-- end nav -->

					
			<form action="#" method="POST" id="search-form" class="fr">
				<fieldset>
					<input type="text" id="search-keyword" class="round button dark ic-search image-right" placeholder="Hľadať" />
					<input type="hidden" value="SUBMIT" />
				</fieldset>
			</form>

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
					    
					    
					    
						<table id='ulohy'>
						
							<thead>
						
								<tr>
									<th><input type="checkbox" id="table-select-all" /></th>
									<th>Dátum</th>
									<th>Úloha</th>
									<th>Popis</th>
									<th>Hotovo</th>
									<th>Akcie</th>
								</tr>
							
							</thead>
	
							<tfoot>
							
								<tr>
								
									<td colspan="5" class="table-footer">
									
										<label for="table-select-actions">S vybranými:</label>
	
										<select id="table-select-actions">
											<option value="option1">Hotovo</option>
											<option value="option2">Vymazať</option>
											<option value="option3">Odložiť</option>
										</select>
										
										<a href="#" class="round button blue text-upper small-button">Vykonať s vybranými</a>	
	
									</td>
									
								</tr>
							
							</tfoot>
							
							<tbody>
	
<?php $iterations = 0; foreach ($users as $user): ?>
							    <tr>
								<td><input type="checkbox" /></td>
								<td><?php echo Nette\Templating\Helpers::escapeHtml($user->meno, ENT_NOQUOTES) ?></td>
								<td><?php echo Nette\Templating\Helpers::escapeHtml($user->priezvisko, ENT_NOQUOTES) ?></td>
								<td><?php echo Nette\Templating\Helpers::escapeHtml($user->email, ENT_NOQUOTES) ?></td>
								<td><?php echo Nette\Templating\Helpers::escapeHtml($user->telefon, ENT_NOQUOTES) ?></td>
								<td>
								    <a href="#" class="table-actions-button ic-table-edit"></a>
								    <a href="#" class="table-actions-button ic-table-delete"></a>
								</td>
							    </tr>
<?php $iterations++; endforeach ?>
							
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
</html><?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb86e16c088b_title')) { function _lb86e16c088b_title($_l, $_args) { extract($_args)
?>						<h3 class="fl">Prehľad výpožičiek</h3>
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
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 