<?php //netteCache[01]000414a:2:{s:4:"time";s:21:"0.70034500 1387054465";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:94:"/Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/VypisScan/default.latte";i:2;i:1386980690;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: /Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/VypisScan/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'hx9eu5zjp2')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbba8705fc2f_content')) { function _lbba8705fc2f_content($_l, $_args) { extract($_args)
?><body>

    
	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<li class="v-sep"><a class="round button dark ic-left-arrow image-left" href="<?php echo htmlSpecialChars($_control->link("Homepage:", array('firma' => $firma))) ?>
">Späť</a></li>
				<li class="v-sep"><a class="round button dark menu-user image-left" href="<?php echo htmlSpecialChars($_control->link("Choice:")) ?>
">Prihlásený ako <strong><?php echo Nette\Templating\Helpers::escapeHtml($user->getIdentity()->meno, ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($user->getIdentity()->priezvisko, ENT_NOQUOTES) ?></strong></a>
					<ul>
						<li><a href="<?php echo htmlSpecialChars($_control->link("Password:")) ?>">Zmeniť heslo</a></li>
						<li><a href="<?php echo htmlSpecialChars($_control->link("signOut!")) ?>">Odhlásiť</a></li>
					</ul> 
				</li>
				<li class="v-sep"><a class="round button dark" href="<?php echo htmlSpecialChars($_control->link("Homepage:", array('firma' => $firma))) ?>
">Databáza záznamov</a></li>
				
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
					 
					    
					    <table>
						    
							<thead>
						
								<tr>
									<th>Typ</th>
									<th>Názov</th>
									<th>Dátum nahrania</th>
									<th>Veľkosť</th>
									<th>Akcie</th>
								</tr>
							
							</thead>
				
							<tbody>
								    
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($subory) as $subor): ?>
							    <tr<?php if ($_l->tmp = array_filter(array($iterator->isOdd() ? 'odd' : 'even'))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
								
								
								<td><?php echo Nette\Templating\Helpers::escapeHtml($template->substr($subor->typ, 12, 3), ENT_NOQUOTES) ?></td>
								<td><?php echo Nette\Templating\Helpers::escapeHtml($subor->nazov, ENT_NOQUOTES) ?></td>
								<td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($subor->datum, 'j. n. Y'), ENT_NOQUOTES) ?></td>
								<td><?php echo Nette\Templating\Helpers::escapeHtml($subor->velkost, ENT_NOQUOTES) ?> B</td>
								<td><a href="<?php echo htmlSpecialChars($_control->link("Download:", array('subor' => $subor->id_subor))) ?>
">Stiahnuť súbor</a></td>
								
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
	
	    <p>Vytvorené ako bakalárska práca.<strong><a href="mailto:michal.bobocky@me.com"> Michal Bobocký </a>, <a href="https://mendelu.cz">MENDELU.</a></strong></p>
		<p>2013</p>
	</div> <!-- end footer --><!-- end footer -->

</body>
</html><?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbf9a8c275eb_title')) { function _lbf9a8c275eb_title($_l, $_args) { extract($_args)
?>						<h3 class="fl">Výpis súborov k záznamu č.<?php echo Nette\Templating\Helpers::escapeHtml($infoJednotka->cislo_jednotky, ENT_NOQUOTES) ?>
, z roku <?php echo Nette\Templating\Helpers::escapeHtml($infoJednotka->rok_vzniku, ENT_NOQUOTES) ?></h3>
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