<?php
use Nette\Application\UI\Form;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UploadPresenter extends BasePresenter{
    
    
    
    private $ulozneJednotkyRepository;
    private $regZnackyRepository;
    private $firma;
    private $jednotka;
    private $src;
    private $firmyRepository;
    private $suboryRepository;
    private $kopieRepository;
    private $uzivateliaRepository;
    
    public function startup() {
            parent::startup();
            if (!$this->getUser()->isLoggedIn()){
		$this->redirect('Sign:in');
	    }
        }
    
    public function inject(SpravaRegistratury\Ulozne_JednotkyRepository $ulozneJednotkyRepository,
			    SpravaRegistratury\Reg_ZnackyRepository $regZnackyRepository,
			    SpravaRegistratury\FirmyRepository $firmyRepository,
			    SpravaRegistratury\SuboryRepository $suboryRepository,
			    SpravaRegistratury\KopieRepository $kopieRepository,
			    SpravaRegistratury\UzivateliaRepository $uzivateliaRepository){
			    
	    $this->firmyRepository = $firmyRepository;
	    $this->ulozneJednotkyRepository = $ulozneJednotkyRepository;
	    $this->regZnackyRepository = $regZnackyRepository;
	    $this->suboryRepository = $suboryRepository;
	    $this->kopieRepository = $kopieRepository;
	    $this->uzivateliaRepository = $uzivateliaRepository;
	}
	
    public function actionDefault($jednotka, $firma, $src){
	 $aktUser = $this->uzivateliaRepository->find($this->getUser()->getId());
	    /* ak sa firma v parametri zhoduje so zamestnavatelom prihlaseneho uzivatela alebo je uzivatel admin */
	    if (($aktUser->zamestnavatel == $this->adminFirma) OR ($firma == $aktUser->zamestnavatel)){
		$this->template->aktualnyZaznam = $this->ulozneJednotkyRepository->find($jednotka);
		$this->template->firma = $firma;
		$this->template->spolocnost = $this->firmyRepository->find($firma);
		$this->firma = $firma;
		$this->jednotka = $jednotka;
		$this->src = $src;
	    } else {
		throw new Nette\Application\BadRequestException;
	    }
    }
    
    public function createComponentUploadForm() {
	
             
        $form = new Form();
	
	$form->addUpload('subor','Súbor:')
                ->setAttribute('class','default-width-input');
	
        $form->addSubmit('upload','Nahrať')
		->setAttribute('class','button round blue text-upper ic-right-arrow image-right');
		
	$form->onSuccess[] = $this->uploadFormSubmitted;
        return $form;
	
    }
    
    public function uploadFormSubmitted($form){
	$tempfile = $_FILES['subor']['tmp_name'] ;
                
            // pridá úvodzovky
            $data = addslashes(fread(fopen($tempfile, "rb"), filesize($tempfile)));
            
            // ziskam charakteristiky suboru
            $filetype = $_FILES['subor']['type'];
            $filesize = $_FILES['subor']['size'];
            $filename = $_FILES['subor']['name'];
	    
	    //nahranie suboru do tabulky subory
		$date = date('Y-m-d');
		$this->suboryRepository->upload($data,$filetype,$filesize,$filename,$date);
		
		//zistim id_suboru, ktory bol prave nahrany
		$lastId = $this->suboryRepository->findMax()->fetch();
		
		//vytvorim novy zaznam kopia
		$this->kopieRepository->newKopia($this->jednotka,$lastId->id_subor);
		$this->flashMessage('Súbor bol úspešne nahraný.','confirmation-box round');
		//presmerovanie tam odkial som prisiel
		if($this->src == 'vypozicky'){
		    $this->redirect('Vypozicky:', array('firma' => $this->firma));
		} else {
		    $this->redirect('Homepage:', array('firma' => $this->firma));
		}	
    }
    
	
}