<?php

namespace ConstructionsIncongrues\ComThibaultHuertasWwwBundle\Entity;

class ContactMessage
{
	private $name;
	private $company;
	private $email;
	private $phone;
	private $message;

	public function getName()
	{
		return $this->name;
	}
	
	public function setName($name)
	{
		$this->name = $name;
	}

	public function getCompany()
	{
		return $this->company;
	}
	
	public function setCompany($company)
	{
		$this->company = $company;
	}

	public function getEmail()
	{
		return $this->email;
	}
	
	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getPhone()
	{
		return $this->phone;
	}
	
	public function setPhone($phone)
	{
		$this->phone = $phone;
	}

	public function getMessage()
	{
		return $this->message;
	}
	
	public function setMessage($message)
	{
		$this->message = $message;
	}
}