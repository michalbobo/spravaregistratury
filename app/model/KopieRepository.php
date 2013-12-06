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
    
    
    public function findSubory($jednotka){
	   return $this->findBy(array('ulozna_jednotka'=>$jednotka))->select('subor.id_subor AS id_subor')->select('subor.subor AS data')->select('subor.typ_suboru AS typ')
		   ->select('subor.velkost AS velkost')->select('subor.nazov AS nazov')->select('subor.datum_pridania AS datum');
    }
    
    
}