<?php
namespace SpravaRegistratury;
use Nette;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class KopieRepository extends Repository {
    
    public function newKopia($jednotka, $subor){
	return $this->getTable()->insert(array(
            'ulozna_jednotka' => $jednotka,
	    'subor' => $subor
        ));
	
    }
    
    
    
}