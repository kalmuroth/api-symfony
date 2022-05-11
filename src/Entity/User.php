<?php
// src/Entity/User.php
namespace App\Entity;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    protected $name;

    /**
    * @ORM\Column(type="string", length=255)
    */
    protected $surname;

	/**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8", minMessage="Votre mot de passe doit faire au minimum 8 caractères.")
    */

    protected $password;

    /**
     * @Assert\EqualTo(propertyPath="password", message="Ce champ doit être identique à votre mot de passe.")
     */
    protected $confirm_password;

    /**
     * @ORM\Column(type="array", length=255)
     */
	protected $roles = array('ROLE_USER_TO_CONFIRM');

    public function getId(){
		return strval($this->id);
	}

	public function setId($id){
   		$this->id = strval($id);
   	}

	public function getName(){
   		return $this->name;
   	}

	public function getUsername(){
   		return $this->name;
   	}

	public function setName($name){
   		$this->name = $name;
   	}

	public function getSurname(){
   		return $this->surname;
   	}

	public function setSurname($surname){
   		$this->surname = $surname;
   	}

	public function getPassword(){
   		return $this->password;
   	}

	public function setPassword($password){
   		$this->password = $password;
   	}

    public function getConfirmPassword(){
		return $this->confirm_password;
	}

	public function setConfirmPassword($confirm_password){
   		$this->confirm_password = $confirm_password;
   	}

    public function getRoles(){
        return $this->roles;
    }

	public function addRole($role){
   		$this->roles[] = $role;
   	}

    public function eraseCredentials() {}

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

	public function getSalt() {}
}