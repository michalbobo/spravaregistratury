<?php
use Nette\Application\UI\Form;
/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{

	//private $userRepository;
	private $ulozneJednotkyRepository;
	private $firmyRepository;
	private $regZnackyRepository;
	private $firma;

	
        public function startup() {
            parent::startup();
            if (!$this->getUser()->isLoggedIn()){
		$this->redirect('Sign:in');
	    }
        }
        
	public function inject(/**SpravaRegistratury\UzivateliaRepository $userRepository,**/
		SpravaRegistratury\Ulozne_JednotkyRepository $ulozneJednotkyRepository, SpravaRegistratury\FirmyRepository $firmyRepository,
		SpravaRegistratury\Reg_ZnackyRepository $regZnackyRepository){
	    $this->regZnackyRepository = $regZnackyRepository;
	    $this->ulozneJednotkyRepository = $ulozneJednotkyRepository;
	    $this->firmyRepository = $firmyRepository;
	}
	
	
	
	public function renderDefault()
	{
		
		
		//$this->template->users = $this->userRepository->findAll();
		//$this->template->jednotky = $this->ulozneJednotkyRepository->findAll()->limit(30);
		 $this->template->infoFirma = $this->firmyRepository->find($this->firma);
		
		
		    
	}
	
	public function actionDefault($firma){
	    $this->template->firma = $firma;
	    $this->firma = $firma;
	    $this->template->jednotky = $this->ulozneJednotkyRepository->findByFirma($this->firma)->where(array('vyradenie'=>NULL))->order('rok_vzniku DESC');
	}
	

	
	public function handleVyradit($zaznam){
	    
	    $this->ulozneJednotkyRepository->vyraditJednotku($zaznam);
	    if(!$this->isAjax()){
	    $this->redirect('this');
	    $this->flashMessage('Záznam úspešne vyradený.','confirmation-box round');
	    } else {
		$this->invalidateControl();
		$this->presenter->flashMessage('Záznam úspešne vyradený.','confirmation-box round');

	    }
	    
	    }
	    
	 public function createComponentFilterJednotiekForm(){
        
	$znackyPairs = $this->regZnackyRepository->findBy(array('firma'=> $this->firma))->fetchPairs('id_znacka','nazov');
	$rokPairs = $this->ulozneJednotkyRepository->findByFirma($this->firma)->where(array('vyradenie'=>NULL))->select('rok_vzniku')->order('rok_vzniku ASC')
		->fetchPairs('rok_vzniku','rok_vzniku');
	$typPairs = $this->ulozneJednotkyRepository->findByFirma($this->firma)->where(array('vyradenie'=>NULL))->select('typ_jednotky')->order('typ_jednotky ASC')
		->fetchPairs('typ_jednotky','typ_jednotky');
        
        $form = new Form();
	
	$form->addSelect('znacka','  Registratúrna značka: ',$znackyPairs)
                ->setPrompt('-Vyberte značku-')
		->setAttribute('class','default-width-input');
	$form->addSelect('rok','  Rok vzniku: ',$rokPairs)
                ->setPrompt('-Vyberte rok-')
		->setAttribute('class','default-width-input');
	  $form->addSelect('typ','  Typ úložnej jednotky: ',$typPairs)
                ->setPrompt('-Vyberte typ-')
		->setAttribute('class','default-width-input');
	 
        $form->addSubmit('filtrovat','Filtrovať')
		->setAttribute('class','round blue ic-edit ajax');
		
        $form->onSuccess[] = $this->filterJednotiekFormSubmitted;
        return $form;
	 }
	 
	
	public function filterJednotiekFormSubmitted($form){
	     $this->template->jednotky = $this->ulozneJednotkyRepository->findByFirma($this->firma)->where(array('vyradenie'=>NULL))->where(array(
		 'reg_znacka'=>$form->values->znacka,
		 'rok_vzniku' => $form->values->rok, 
		 'typ_jednotky' => $form->values->typ 
	    ));
	     
	     $this->invalidateControl();
	    
	    
	}
	
    }  


