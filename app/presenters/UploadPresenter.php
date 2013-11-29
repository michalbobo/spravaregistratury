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
    private $firmyRepository;
    private $suboryRepository;
    private $kopieRepository;
    
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
			    SpravaRegistratury\KopieRepository $kopieRepository){
			    
	    $this->firmyRepository = $firmyRepository;
	    $this->ulozneJednotkyRepository = $ulozneJednotkyRepository;
	    $this->regZnackyRepository = $regZnackyRepository;
	    $this->suboryRepository = $suboryRepository;
	    $this->kopieRepository = $kopieRepository;
	}
	
    public function actionDefault($jednotka, $firma){
	$this->template->aktualnyZaznam = $this->ulozneJednotkyRepository->find($jednotka);
	$this->template->firma = $firma;
	$this->template->spolocnost = $this->firmyRepository->find($firma);
	$this->firma = $firma;
	$this->jednotka = $jednotka;
	
	
    }
    
    public function createComponentUploadForm() {
	
             
        $form = new Form();
	
	$form->addUpload('subor','Súbor:')
                ->setAttribute('class','default-width-input');
	$form->addHidden('MAX_FILE_SIZE','2000000');
        $form->addSubmit('upload','Nahrať')
		->setAttribute('class','button round blue text-upper ic-right-arrow image-right');
		
	$form->onSuccess[] = $this->uploadFormSubmitted;
        return $form;
	
    }
    
    public function uploadFormSubmitted($form){
	$tempfile = $_FILES['subor']['tmp_name'] ;
                
            // addslashes so as not to break anything :)
            $data = addslashes(fread(fopen($tempfile, "rb"), filesize($tempfile)));
            
            // pull out useful bits in case they are needed. 
            $filetype = $_FILES['subor']['type'];
            $filesize = $_FILES['subor']['size'];
            $filename = $_FILES['subor']['name'];
	    
	    
		$this->suboryRepository->upload($data,$filetype,$filesize,$filename);
		$lastId = $this->suboryRepository->findMax()->fetch();
		$this->kopieRepository->newKopia($this->jednotka,$lastId->id_subor);
		$this->flashMessage('Súbor bol úspešne nahraný.','confirmation-box round');
		$this->redirect('Homepage:', array('firma'=> $this->firma));
	  
    }
    
	
}