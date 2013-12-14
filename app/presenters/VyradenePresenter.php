<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Nette\Application\UI\Form;

class VyradenePresenter extends BasePresenter{
    
    private $regZnackyRepository;
    private $ulozneJednotkyRepository;
    private $firmyRepository;
    private $utvaryRepository;
    private $uzivateliaRepository;
    private $firma;

    
    public function startup() {
            parent::startup();
            if (!$this->getUser()->isLoggedIn()){
		$this->redirect('Sign:in');
	    }
        }
        
	public function inject(
		SpravaRegistratury\Ulozne_JednotkyRepository $ulozneJednotkyRepository, 
		SpravaRegistratury\FirmyRepository $firmyRepository,
		SpravaRegistratury\Reg_ZnackyRepository $regZnackyRepository,
		SpravaRegistratury\UtvaryRepository $utvaryRepository,
		SpravaRegistratury\UzivateliaRepository $uzivateliaRepository){
	    $this->regZnackyRepository = $regZnackyRepository;
	    $this->ulozneJednotkyRepository = $ulozneJednotkyRepository;
	    $this->firmyRepository = $firmyRepository;
	    $this->utvaryRepository = $utvaryRepository;
	    $this->uzivateliaRepository = $uzivateliaRepository;
	}
	
	
	
	public function renderDefault()
	{
		
		
		//$this->template->users = $this->userRepository->findAll();
		//$this->template->jednotky = $this->ulozneJednotkyRepository->findAll()->limit(30);
		 $this->template->infoFirma = $this->firmyRepository->find($this->firma);
		
		
		    
	}
	
	public function actionDefault($firma){
	     $aktUser = $this->uzivateliaRepository->find($this->getUser()->getId());
	    /* ak sa firma v parametri zhoduje so zamestnavatelom prihlaseneho uzivatela alebo je uzivatel admin */
	    if (($aktUser->zamestnavatel == $this->adminFirma) OR ($firma == $aktUser->zamestnavatel)){
		$this->template->firma = $firma;
		$this->firma = $firma;
		$this->template->jednotky= $this->ulozneJednotkyRepository->findVyradenie($this->firma)->where(array('vyradenie'=>NULL))->order('reg_znacka ASC')->order('rok_vzniku DESC');
		$this->template->aktRok = date('Y');
	    } else {
		throw new Nette\Application\BadRequestException;
	    }
	}
	

	
	public function handleVyradit($zaznam){
	    $datum = date('Y-m-d');
	    $this->ulozneJednotkyRepository->vyraditJednotku($zaznam,$datum);
	    if(!$this->isAjax()){
	    $this->redirect('this');
	    $this->flashMessage('Záznam úspešne vyradený.','confirmation-box round');
	    } else {
		$this->invalidateControl();
		$this->presenter->flashMessage('Záznam úspešne vyradený.','confirmation-box round');

	    }
	    
	}
	    
	 public function createComponentFilterJednotiekForm(){
        
	$znackyPairs = $this->ulozneJednotkyRepository->findVyradenie($this->firma)->where(array('vyradenie'=>NULL))->order('reg_znacka ASC')->fetchPairs('reg_znacka','znacka');
	$rokPairs = $this->ulozneJednotkyRepository->findByFirma($this->firma)->where(array('vyradenie'=>NULL))->select('rok_vzniku')->order('rok_vzniku ASC')
		->fetchPairs('rok_vzniku','rok_vzniku');
	$typPairs = $this->ulozneJednotkyRepository->findByFirma($this->firma)->where(array('vyradenie'=>NULL))->select('typ_jednotky')->order('typ_jednotky ASC')
		->fetchPairs('typ_jednotky','typ_jednotky');
	$utvaryPairs = $this->utvaryRepository->findByFirma($this->firma)->fetchPairs('spolocnost','nazov');

        
        $form = new Form();
	
	$form->addSelect('znacka','  Registratúrna značka: ',$znackyPairs)
                ->setPrompt('-Vyberte značku-');
	$form->addSelect('rok','  Rok vzniku: ',$rokPairs)
                ->setPrompt('-Vyberte rok-');
	  $form->addSelect('typ','  Typ úložnej jednotky: ',$typPairs)
                ->setPrompt('-Vyberte typ-');
	 $form->addSelect('utvar','  Príslušiaci útvar: ',$utvaryPairs)
		 ->setPrompt('-Vyberte útvar-');
        $form->addSubmit('filtrovat','Filtrovať')
		->setAttribute('class','button round blue text-upper ic-right-arrow image-right ajax');
		
        $form->onSuccess[] = $this->filterJednotiekFormSubmitted;
        return $form;
	 }
	 
	
	public function filterJednotiekFormSubmitted($form){
	    
	    $where = array();
	    $where['vyradenie'] = NULL;
	    if(!is_null($form->values->znacka)) { $where['reg_znacka LIKE'] = $form->values->znacka; }
	    if(!is_null($form->values->rok)) { $where['rok_vzniku LIKE'] = $form->values->rok; }
	    if(!is_null($form->values->typ)) { $where['typ_jednotky LIKE'] = $form->values->typ; }
	    if(!is_null($form->values->utvar)) { $where['id_utvar LIKE'] = $form->values->utvar; }

	    
	     $this->template->jednotky = $this->ulozneJednotkyRepository->findByFirma($this->firma)->where($where);
	     $this->flashMessage('Vyfiltrované', 'confirmation-box round');
	     $this->invalidateControl();
	    
	    
	}
	
    }  
	
   