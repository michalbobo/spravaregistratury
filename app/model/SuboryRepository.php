<?php
namespace SpravaRegistratury;
use Nette;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SuboryRepository extends Repository {
    
    public function upload($data,$typ,$velkost,$nazov){
	return $this->getTable()->insert(array(
	    'id_subor' => '',
            'subor' => $data,
	    'typ_suboru' => $typ,
	    'velkost' => $velkost,
            'nazov' => $nazov
            
        ));
	
    }
    
    public function findMax(){
	return $this->findAll()->order('id_subor DESC')->limit(1);
    }
    
    
    
}
