<?php
use Nette\Mail\Message;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PrehladVypoziciekPresenter extends BasePresenter{
    
    
	
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
		 $this->template->vypozicky = $this->vypozickyRepository->findPrehlad()->where(array('vybavene' => 0))->order('datum_ziadosti ASC');
		 $this->template->firmy = $this->firmyRepository->findAll()->order('nazov ASC');
	}
	
	public function actionDefault(){
	    $aktUser = $this->uzivateliaRepository->find($this->getUser()->getId());
	    /* ak sa firma v parametri zhoduje so zamestnavatelom prihlaseneho uzivatela alebo je uzivatel admin */
	    if (($aktUser->zamestnavatel == $this->adminFirma) OR ($firma == $aktUser->zamestnavatel)){
		
	    } else {
		throw new Nette\Application\BadRequestException;
	    }
	}
	
	public function handleDone($id){
	    $datum = date('Y-m-d');
	    
	    /* to v databaze nastavujem Done */
	    $this->vypozickyRepository->markDone($id, $datum);
	    
	    $from = $this->uzivateliaRepository->find($this->user->id);
	    $to = $this->vypozickyRepository->findById($id)->fetch();
	    //odoslanie info mailu
	    $mail = new Message;
	    $mail->setFrom($from->email, 'NP publication')
		   ->addTo($to->email)
		   ->setSubject('Vybavenie výpožičky z '.$to->datum_ziadosti)
		   ->setBody("Dobrý deň, \n Vaša výpožička zo dňa $to->datum_ziadosti k jednotke $to->jednotka,$to->nazovJednotky"
			   . " bola vybavená pracovníkmi registratúrneho strediska. V prípade, že typ výpožičky bol scan, túto výpožičku"
			   . " máte nahranú k požadovanej jednotke. V prípade výpožičky typu originál bola táto odoslaná kuriérom.\n"
			   . "\n"
			   . "Táto správa bola vygenerovaná systémom pre správu registratúry spoločnosti NP publication, a.s.")
		   ->send();

	   
	    
	    if(!$this->isAjax()){
	    $this->redirect('this');
	    $this->flashMessage('Výpožička bola označená ako vybavená.','confirmation-box round');
	    } else {
		$this->invalidateControl();
		$this->flashMessage('Výpožička bola označená ako vybavená.','confirmation-box round');

	    }
	    
	}
	
    
}