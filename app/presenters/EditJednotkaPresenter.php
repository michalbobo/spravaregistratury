<?php
use Nette\Application\UI\Form;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EditJednotkaPresenter extends BasePresenter{
    
    
    
    private $ulozneJednotkyRepository;
    private $regZnackyRepository;
    private $aktualnyZaznam;
    private $firma;
    private $jednotka;
    private $src;
    
    public function startup() {
            parent::startup();
            if (!$this->getUser()->isLoggedIn()){
		$this->redirect('Sign:in');
	    }
        }
    
    public function inject(SpravaRegistratury\Ulozne_JednotkyRepository $ulozneJednotkyRepository,
			    SpravaRegistratury\Reg_ZnackyRepository $regZnackyRepository){
	  
	    $this->ulozneJednotkyRepository = $ulozneJednotkyRepository;
	    $this->regZnackyRepository = $regZnackyRepository;
	}
	
    public function actionDefault($jednotka, $firma, $src){
	$this->aktualnyZaznam = $this->ulozneJednotkyRepository->find($jednotka);
	$this->template->firma = $firma;
	$this->firma = $firma;
	$this->jednotka = $jednotka;
	$this->src = $src;
	
    }
    
    public function createComponentEditJednotkaForm(){
        
	$znackyPairs = $this->regZnackyRepository->findBy(array('firma'=> $this->firma))->fetchPairs('id_znacka','nazov');
        
        $form = new Form();
        $form->addSelect('znacka','Registratúrna značka',$znackyPairs)
                ->setPrompt('-Vyberte značku-')
		->setAttribute('class','default-width-input')
                ->addRule(Form::FILLED,'Je nutné vybrať registratúrnu značku záznamu.')
		->setDefaultValue($this->aktualnyZaznam->reg_znacka);
		
        $form->addText('nazov','Názov záznamu')
		->addRule(Form::FILLED,'Je nutné zadať názov záznamu.')
		->setDefaultValue($this->aktualnyZaznam->nazov)
		->setAttribute('class','round default-width-input');
	 $form->addText('rok','Rok vzniku')
		->addRule(Form::FILLED,'Je nutné zadať rok vzniku')
		//->addRule(Form::MAX_LENGTH,4)
		->addRule(Form::NUMERIC)
		->setDefaultValue($this->aktualnyZaznam->rok_vzniku)
		->setAttribute('class','round default-width-input');
	 $form->addText('rozsah','Rozsah záznamu')
		->setDefaultValue($this->aktualnyZaznam->rozsah)
		->setAttribute('class','round default-width-input error-input');
	 $form->addText('typ','Typ úložnej jednotky')
		->addRule(Form::FILLED,'Je nutné zadať typ úložnej jednotky.')
		->setDefaultValue($this->aktualnyZaznam->typ_jednotky)
		->setAttribute('class','round default-width-input');
	 $form->addText('cislo','Číslo úložnej jednotky')
		->addRule(Form::FILLED,'Je nutné zadať čislo úložnej jednotky.')
		->setDefaultValue($this->aktualnyZaznam->cislo_jednotky)
		->setAttribute('class','round default-width-input');
	 $form->addText('lokacia','Lokácia záznamu')
		->addRule(Form::FILLED,'Je nutné zadať lokáciu záznamu.')
		->setDefaultValue($this->aktualnyZaznam->lokacia)
		->setAttribute('class','round default-width-input');
        $form->addSubmit('ulozit','Uložiť zmeny')
		->setAttribute('class','round blue ic-edit');
		
        $form->onSuccess[] = $this->editJednotkaFormSubmitted;
        return $form;
	 }
	 
	 
	 public function editJednotkaFormSubmitted($form){
	     $this->ulozneJednotkyRepository->updateJednotka($this->jednotka, $form->values->znacka, $form->values->nazov, $form->values->rok, $form->values->rozsah,
		     $form->values->typ, $form->values->cislo, $form->values->lokacia);
	     $this->flashMessage('Záznam bol úspešne pozmenený.','confirmation-box round');
	     if ($this->src == 'vyradenie'){
		$this->redirect('Vyradene:', array('firma'=> $this->firma));
	     } else {
		$this->redirect('Homepage:', array('firma'=> $this->firma));
	     }
	     
	 } 
}