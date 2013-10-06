<?php

use Nette\Security,
	Nette\Utils\Strings;


/*
CREATE TABLE users (
	id int(11) NOT NULL AUTO_INCREMENT,
	username varchar(50) NOT NULL,
	password char(60) NOT NULL,
	role varchar(20) NOT NULL,
	PRIMARY KEY (id)
);
*/

/**
 * Users authenticator.
 */
class Authenticator extends Nette\Object implements Security\IAuthenticator
{
	/** @var Nette\Database\Connection */
        /**
         *
         nepotrebujem celu databazu ale iba users, ktorzch ziskam z user repo
	private $database;
        */
    
        private $users;

	public function __construct(SpravaRegistratury\UzivateliaRepository $users)
	{
		$this->users = $users;
	}


	/**
	 * Performs an authentication.
	 * @return Nette\Security\Identity
	 * @throws Nette\Security\AuthenticationException
	 */
	public function authenticate(array $credentials)
	{
		list($username, $password) = $credentials;
		$row = $this->users->findByName($username);

		if (!$row) {
			throw new Security\AuthenticationException("Užívateľ ' $username ' nebol nájdený.", self::IDENTITY_NOT_FOUND);
		}

		if ($row->password !== $this->calculateHash($password, $row->password)) {
			throw new Security\AuthenticationException('Heslo je nesprávne.', self::INVALID_CREDENTIAL);
		}
                
		unset($row['password']);
		return new Nette\Security\Identity($row->id_uzivatel, NULL, $row->toArray());
	}


	/**
	 * Computes salted password hash.
	 * @param  string
	 * @return string
	 */
	public static function calculateHash($password, $salt = NULL)
	{
		if ($salt === NULL){
                    $salt = '$2a$07$' . Nette\Utils\Strings::random(22);
		}
		return crypt($password, $salt);
	}

}
