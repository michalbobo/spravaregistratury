<?php
use Nette\Application\UI\Form;
use Nette\Mail\Message;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AddVypozickaPresenter extends BasePresenter{
    
    
    
    private $ulozneJednotkyRepository;
    private $firma;
    private $jednotka;
    private $vypozickyRepository;
    private $firmyRepository;
    private $uzivateliaRepository;
    
    public function startup() {
            parent::startup();
            if (!$this->getUser()->isLoggedIn()){
		$this->redirect('Sign:in');
	    }
        }
    
    public function inject(SpravaRegistratury\Ulozne_JednotkyRepository $ulozneJednotkyRepository,
			    SpravaRegistratury\VypozickyRepository $vypozickyRepository,
			    SpravaRegistratury\FirmyRepository $firmyRepository,
			    SpravaRegistratury\UzivateliaRepository $uzivateliaRepository){
	  
	    $this->ulozneJednotkyRepository = $ulozneJednotkyRepository;
	    $this->vypozickyRepository = $vypozickyRepository;
	    $this->firmyRepository = $firmyRepository;
	    $this->uzivateliaRepository = $uzivateliaRepository;
	}
	
    public function actionDefault($jednotka, $firma){
	$aktUser = $this->uzivateliaRepository->find($this->getUser()->getId());
	/* ak sa firma v parametri zhoduje so zamestnavatelom prihlaseneho uzivatela alebo je uzivatel admin */
	if (($aktUser->zamestnavatel == $this->adminFirma) OR ($firma == $aktUser->zamestnavatel)){
	$this->template->firma = $firma;
	$this->firma = $firma;
	$this->jednotka = $jednotka;
	$this->template->infoJednotka = $this->ulozneJednotkyRepository->find($jednotka);
	$this->template->infoFirma = $this->firmyRepository->find($firma);
	} else {
	    throw new Nette\Application\BadRequestException;
	}
	
    }
    
    public function createComponentPridatVypozickaForm(){
        
	
        
        $form = new Form();
        
	$form->addSelect('typ', 'Typ:',array('original'=>'originál','scan'=>'scan'))->
	    addRule(Form::FILLED,'Vyberte prosím typ výpožičky.')->
		setPrompt('-Vyberte typ-');
	$form->addText('ziadatel','Žiadateľ:')
		->setAttribute('class','round default-width-input'); /*osoba ktora ziada - moze byt hocikto, preto text*/
	$form->addText('poznamka','Poznámka:')
		->setAttribute('class','round default-width-input');
	$form->addText('mnozstvo','Množstvo:')
		->setAttribute('class','round default-width-input');
	$form->addText('cislo_zaznamu','Číslo záznamu:')
		->setAttribute('class','round default-width-input'); /*cislo zaznamu v uloznej jednotke, nie cislo ul. jednotky*/

	$form->addSubmit('pridat','Pridať')
		->setAttribute('class','button round blue text-upper ic-right-arrow image-right');
		
		
        $form->onSuccess[] = $this->pridatVypozickaFormSubmitted;
        return $form;
	 }
	 
	 
	 public function pridatVypozickaFormSubmitted($form){
	     
	     $this->vypozickyRepository->newVypozicka($form->values->typ,date('Y-m-d'),$form->values->ziadatel,
		     $form->values->poznamka,$form->values->mnozstvo,$form->values->cislo_zaznamu,
		     $this->getUser()->getId(),$this->jednotka);
	     
	    //získanie prihláseného užívateľa
	    $from = $this->uzivateliaRepository->find($this->user->id);
	    //získanie admina
	    $to = $this->uzivateliaRepository->findBy(array('zamestnavatel' => $this->adminFirma))->fetch();
	    $datum = date('d.m.Y');
	    $mail = new Message;
	    $mail->setFrom($from->email)
		   ->addTo($to->email)
		   ->setSubject('Pridanie výpožičky')
		   ->setBody("Dobrý deň, \n dňa $datum bola pridaná nová výpožička.")
		   ->send();
	     
	     
	     $this->flashMessage('Výpožička bola úspešne pridaná!','confirmation-box round');
	     $this->redirect('Vypozicky:',array('firma' => $this->firma));
	     
	 } 
}