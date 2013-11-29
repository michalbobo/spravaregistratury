<?php
namespace SpravaRegistratury;


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Ulozne_JednotkyRepository extends Repository{
    
    
      /**private $jednotky;

	public function __construct(SpravaRegistratury\UzivateliaRepository $users)
	{
		$this->users = $users;
	}
       * 
       */
    public function findByFirma($firma){
	
	
	$parameters = array('spolocnost'=>$firma);
	return $this->findAll()->select('rok_vzniku')->select('rozsah')->select('typ_jednotky')->select('cislo_jednotky')->select('lokacia')
		->select('id_jednotka')->select('ulozne_Jednotky.nazov')->select('reg_znacka.nazov AS znacka')->select('reg_znacka.lehota_ulozenia AS lehota')
		->where('vlastnik.spolocnost',$parameters);
	}
	
	
    
    public function updateJednotka($idJednotka, $idZnacka, $nazov, $rok, $rozsah, $typ, $cislo, $lokacia){
	$this->findBy(array('id_jednotka' => $idJednotka))->
		update(array('reg_znacka' => $idZnacka,
			    'nazov' => $nazov,
			    'rok_vzniku' => $rok,
			    'rozsah' => $rozsah,
			    'typ_jednotky' => $typ,
			    'cislo_jednotky' => $cislo,
			    'lokacia' => $lokacia
	  ));
	
    }
    
    public function vyraditJednotku($idJednotka, $datum){
	$this->findBy(array('id_jednotka'=>$idJednotka))->
		update(array('vyradenie'=> $datum));
	
    }
    
    public function findVyradenie($firma){
	
	return $this->findByFirma($firma)->where('? - ulozne_Jednotky.rok_vzniku >= reg_znacka.lehota_ulozenia', date('Y'));
	
    }
    
    
}
