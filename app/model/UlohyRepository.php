<?php
namespace SpravaRegistratury;
use Nette;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UlohyRepository extends Repository{
    
    public function findIncomplete(){
	return $this->findBy(array('splnene' => FALSE))->order('datum ASC');
    }
    
    public function findIncompleteByUser($userId){
	return $this->findIncomplete()->where(array('uzivatel' => $userId))->order('datum ASC');
    }
    
    public function markDone($id){
	$this->findBy(array('id_uloha' => $id))->update(array('splnene' => 1));
    }
    
    public function createNewUloha($datum, $popis ,$uzivatel){
	return $this->getTable()->insert(array(
	    'id_uloha' => '',
            'popis' => $popis,
	    'datum' => $datum,
	    'splnene' => '',
            'uzivatel' => $uzivatel
            
        ));
    }
    
}
