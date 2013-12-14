<?php
use Nette\Mail\Message;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class VypozickyPresenter extends BasePresenter{
    
    
	
	private $vypozickyRepository;
	private $firmyRepository;
	private $regZnackyRepository;
	private $uzivateliaRepository;
	private $firma;

	
        public function startup() {
            parent::startup();
            if (!$this->getUser()->isLoggedIn()){
		$this->redirect('Sign:in');
	    }
        }
        
	public function inject(
		SpravaRegistratury\VypozickyRepository $vypozickyRepository, 
		SpravaRegistratury\FirmyRepository $firmyRepository,
		SpravaRegistratury\UzivateliaRepository $uzivateliaRepository){
	    $this->uzivateliaRepository = $uzivateliaRepository;
	    $this->vypozickyRepository = $vypozickyRepository;
	    $this->firmyRepository = $firmyRepository;
	    
	}
	
	
	
	public function renderDefault()
	{
		
		 $this->template->infoFirma = $this->firmyRepository->find($this->firma);
		 $this->template->vypozicky = $this->vypozickyRepository->findByFirma($this->firma)->where(array('vybavene' => 0));
		 $this->template->vybavene = $this->vypozickyRepository->findByFirma($this->firma)->where(array('vybavene' => 1));
		    
	}
	
	public function actionDefault($firma){
	    $this->template->firma = $firma;
	    $this->firma = $firma;
	}
	
	public function handleDone($id){
	    $datum = date('Y-m-d');
	    
	    /* to v databaze nastavujem Done */
	    $this->vypozickyRepository->markDone($id, $datum);
	    
	    $from = $this->uzivateliaRepository->find($this->user->id);
	    $to = $this->vypozickyRepository->findById($id)->fetch();
	    
	    $mail = new Message;
	    $mail->setFrom($from->email, 'NP publication')
		   ->addTo($to->email)
		   ->setSubject('Vybavenie výpožičky z '.$to->datum_ziadosti)
		   ->setBody("Dobrý deň, \n Vaša výpožička zo dňa $to->datum_ziadosti jednotky $to->jednotka $to->nazovJednotky"
			   . " bola vybavená pracovníkmi registratúrneho strediska. V prípade, že typ výpožičky bol scan, túto výpožičku"
			   . " máte nahranú k požadovanej jednotke. V prípade výpožičky typu originál bola táto odoslaná kuriérom.\n"
			   . "\n"
			   . "Táto správa bola vygenerovaná systémom pre správu registratúry spoločnosti NP publication, a.s.")
		   ->send();

	   
	    
	    if(!$this->isAjax()){
	    $this->redirect('this',array("firma"=>$this->firma));
	    $this->flashMessage('Výpožička bola označená ako vybavená.','confirmation-box round');
	    } else {
		$this->invalidateControl();
		$this->flashMessage('Výpožička bola označená ako vybavená.','confirmation-box round');

	    }
	    
	}
	
    
}