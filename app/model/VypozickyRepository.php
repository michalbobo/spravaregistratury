<?php
namespace SpravaRegistratury;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class VypozickyRepository extends Repository {
    
    public function findByFirma($idFirma){
	 return $this->findAll()->select('typ')
		 ->select('id_vypozicka')
		 ->select('datum_ziadosti')
		 ->select('ziadatel')
		 ->select('poznamka')
		 ->select('mnozstvo')
		 ->select('cislo_zaznamu')
		 ->select('datum_vybavenia')
		 ->select('zadavatel')
		 ->select('zadavatel.meno AS meno')
		 ->select('zadavatel.priezvisko AS priezvisko')
		 ->select('ulozna_jednotka.cislo_jednotky AS jednotka')
		 ->select('ulozna_jednotka.id_jednotka AS id_jednotka')
		 ->select('ulozna_jednotka.lokacia AS lokacia')
		 ->select('ulozna_jednotka.nazov AS nazovJednotky')
		 ->where(array('zadavatel.zamestnavatel' => $idFirma));	 
	
    }
    
    public function findById($id){
	return $this->findAll()->select('typ')
		 ->select('id_vypozicka')
		 ->select('datum_ziadosti')
		 ->select('ziadatel')
		 ->select('poznamka')
		 ->select('mnozstvo')
		 ->select('cislo_zaznamu')
		 ->select('datum_vybavenia')
		 ->select('zadavatel')
		 ->select('zadavatel.email AS email')
		 ->select('zadavatel.meno AS meno')
		 ->select('zadavatel.priezvisko AS priezvisko')
		 ->select('ulozna_jednotka.cislo_jednotky AS jednotka')
		 ->select('ulozna_jednotka.id_jednotka AS id_jednotka')
		 ->select('ulozna_jednotka.lokacia AS lokacia')
		 ->select('ulozna_jednotka.nazov AS nazovJednotky')
		 ->where(array('id_vypozicka'=>$id));	
    }
    
    public function markDone($id, $datum){
	$this->findBy(array('id_vypozicka' => $id))->update(array(
	    'vybavene' => 1,
	    'datum_vybavenia' => $datum));
    }
    
   
    
}