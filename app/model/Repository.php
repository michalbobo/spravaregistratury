<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SpravaRegistratury;
use Nette;

/**Robi operacie nad databazovou tabulkou*/
abstract class Repository extends Nette\Object
{
    /** @var Nette\Database\Connection */
    protected $connection;
    
    public function __construct(Nette\Database\Connection $db) {
        $this->connection = $db;
    }
    
    /**
     * Vracia objekt repreyentujuci databazovu tabulku.
     * @return Nette\Database\Table\Selection
     */
    protected function getTable(){
        //nazov tabulky odvodime z nazvu triedy
        preg_match('#(\w+)Repository$#', get_class($this), $m);
        return $this->connection->table(lcfirst($m[1]));
    }
    
    /**
     * Vracia vsetky riadky z tabulky
     * @return Nette\Database\Table\Selection
     */
    
    public function findAll(){
        return $this->getTable();
    }
    
    /**
     * Vracia riadky podla filtra, napr. array('name'=> 'John')
     * @return Nette\Database\Table\Selection
     */
    
    public function findBy(array $by){
        return $this->getTable()->where($by);
    }
    
        /**
    * Vracia riadok podla primarneho kluca.
    * @return TableSelection
    */
    public function find($id)
    {
    return $this->getTable()->get($id);
    }

    
    
}
