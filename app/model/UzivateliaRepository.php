<?php
namespace SpravaRegistratury;
use Nette;


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UzivateliaRepository extends Repository {
    
    public function findByName($username){
	return $this->findAll()->where('username',$username)->fetch();
    }    
}