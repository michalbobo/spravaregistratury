<?php //netteCache[01]000411a:2:{s:4:"time";s:21:"0.85891400 1384532545";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:89:"/Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/Plan/default.latte";i:2;i:1384532543;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: /Applications/XAMPP/xamppfiles/htdocs/spravaregistratury/app/templates/Plan/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'vnp1mllot6')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbc8673dbec1_content')) { function _lbc8673dbec1_content($_l, $_args) { extract($_args)
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
				<li class="v-sep"><a class="round button dark" href="<?php echo htmlSpecialChars($_control->link("Homepage:", array('firma' => $firma))) ?>
">Úložné jednotky</a></li>
				<li><a href="#" class="round button dark menu-email-special image-left">3 nové upozornenia</a></li>
				<li><a class="round button dark menu-logoff image-left" href="<?php echo htmlSpecialChars($_control->link("signOut!")) ?>
">Odhlásiť sa</a></li>
				
			</ul> <!-- end nav -->

					
			

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	
	
	
	
	
	
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
			
			<!--<div class="side-content fr"> -->
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
<?php call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>
						
					
					</div>
						
					
					
					<div class="content-module-main">
					<p>Prehľad registratúrneho plánu firmy <?php echo Nette\Templating\Helpers::escapeHtml($titulok['nazov'], ENT_NOQUOTES) ?>.</p>
						<table>
						
							<thead>
						
								<tr>
									
									
									<th>Názov</th>
									<th>Popis</th>
									<th>Znak hodnoty</th>
									<th>Lehota uloženia</th>
								</tr>
							
							</thead>
	
							<tfoot>
							
								
							</tfoot>
							
							<tbody>
								    
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($znacky) as $znacka): ?>
							    <tr<?php if ($_l->tmp = array_filter(array($iterator->isOdd() ? 'odd' : 'even'))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
						
								<td><?php echo Nette\Templating\Helpers::escapeHtml($znacka->nazov, ENT_NOQUOTES) ?></td>
								<td><?php echo Nette\Templating\Helpers::escapeHtml($znacka->popis, ENT_NOQUOTES) ?></td>
								<td><?php echo Nette\Templating\Helpers::escapeHtml(empty($znacka->znak_hodnoty) ? "S" : $znacka->znak_hodnoty, ENT_NOQUOTES) ?></td>
								<td><?php echo Nette\Templating\Helpers::escapeHtml($znacka->lehota_ulozenia, ENT_NOQUOTES) ?></td>
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
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb2c566229e1_title')) { function _lb2c566229e1_title($_l, $_args) { extract($_args)
?>						<h3 class="fl"><?php echo Nette\Templating\Helpers::escapeHtml($titulok['nazov'], ENT_NOQUOTES) ?> - Registratúrny plán</h3>
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