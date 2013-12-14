<?php
use Nette\Application\UI\Form;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EditVypozickaPresenter extends BasePresenter{
    
    private $vypozickyRepository;
    private $uzivateliaRepository;
    private $firma;
    private $vypozicka;
    private $src;
    
    
    
    
    
    public function startup() {
            parent::startup();
            if (!$this->getUser()->isLoggedIn()){
		$this->redirect('Sign:in');
	    }
        }
    
    public function inject(SpravaRegistratury\VypozickyRepository $vypozickyRepository,
			SpravaRegistratury\UzivateliaRepository $uzivateliaRepository){
	    $this->uzivateliaRepository = $uzivateliaRepository;
	    $this->vypozickyRepository = $vypozickyRepository;
	   
	}
	
    public function actionDefault($firma, $vypozicka, $src){
	$aktUser = $this->uzivateliaRepository->find($this->getUser()->getId());
	/* ak sa firma v parametri zhoduje so zamestnavatelom prihlaseneho uzivatela alebo je uzivatel admin */
	if (($aktUser->zamestnavatel == $this->adminFirma) OR ($firma == $aktUser->zamestnavatel)){
	$this->template->firma = $firma;
	$this->firma = $firma;
	$this->template->infoVypozicka = $this->vypozickyRepository->find($vypozicka);
	$this->vypozicka = $this->vypozickyRepository->find($vypozicka);
	$this->src = $src;
	} else {
	    throw new Nette\Application\BadRequestException;
	}
    }
    
    public function createComponentEditVypozickaForm(){
        
	
        
        $form = new Form();
        
	$form->addSelect('typ','Typ:',array('original' => 'originál','scan' => 'scan'))
		->addRule(Form::FILLED,'Prosím vyberte typ výpožičky.')
		->setDefaultValue($this->vypozicka->typ);
	$form->addText('ziadatel','Žiadateľ:')
		->setDefaultValue($this->vypozicka->ziadatel)
		->setAttribute('class','round default-width-input');
	
	$form->addText('poznamka','Poznámka:')
		->setDefaultValue($this->vypozicka->poznamka)
		->setAttribute('class','round default-width-input');
	
	$form->addText('mnozstvo','Množstvo:')
		->setDefaultValue($this->vypozicka->mnozstvo)
		->setAttribute('class','round default-width-input');
	
	$form->addText('cislo_zaznamu','Číslo záznamu:')
		->setDefaultValue($this->vypozicka->cislo_zaznamu)
		->setAttribute('class','round default-width-input');
	
	$form->addSubmit('ulozit','Uložiť')
		->setAttribute('class','button round blue text-upper ic-right-arrow image-right');
	
	
        $form->onSuccess[] = $this->editVypozickaFormSubmitted;
	
	
        return $form;
	 }
	 
	 
	 public function editVypozickaFormSubmitted($form){
	     $this->vypozickyRepository->updateVypozicka($form->values->typ,$form->values->ziadatel,
		    $form->values->poznamka, $form->values->mnozstvo, $form->values->cislo_zaznamu,$this->vypozicka->id_vypozicka);
	     $this->flashMessage('Výpožička bola úspešne pozmenená.','confirmation-box round');
	     
	     
	    if($this->src == 'prehlad'){
	      $this->redirect('PrehladVypoziciek:') ; 
	    } else {
		$this->redirect('Vypozicky:', array('firma' => $this->firma));
	    }   
	     
	 } 
}
