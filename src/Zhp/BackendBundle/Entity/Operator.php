<?php
/**
 * Created by PhpStorm.
 * User: dreadnoth
 * Date: 27.07.17
 * Time: 19:38
 */

namespace Zhp\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class Operator
 * @package Zhp\BackendBundle\Entity
 * @ORM\Entity
 */
class Operator implements UserInterface
{
    /**
     * @var
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity="Zhp\BackendBundle\Entity\Jednostka")
     * @ORM\JoinColumn(name="jednostka_id", referencedColumnName="id")
     */
    private $jednostka;

    /**
     * @ORM\OneToOne(targetEntity="Zhp\BackendBundle\Entity\OperatorDane", mappedBy="operator")
     */
    private $operatorDane;
    /**
     * @ORM\Column(type="boolean")
     */
    private $enabled;

    /**
     * @var
     * @ORM\ManyToMany(targetEntity="Zhp\BackendBundle\Entity\Role")
     * @ORM\JoinTable(name="operator_roles",
     *      joinColumns={@ORM\JoinColumn(name="operator_id",referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="role_id",referencedColumnName="id")}
     * )
     */
    private $roles;

    /**
     * Operator constructor.
     */
    public function __construct()
    {
        $this->roles = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getJednostka()
    {
        return $this->jednostka;
    }

    /**
     * @param mixed $jednostka
     */
    public function setJednostka($jednostka)
    {
        $this->jednostka = $jednostka;
    }

    /**
     * @return mixed
     */
    public function getOperatorDane()
    {
        return $this->operatorDane;
    }

    /**
     * @param mixed $operatorDane
     */
    public function setOperatorDane($operatorDane)
    {
        $this->operatorDane = $operatorDane;
    }

    /**
     * @return mixed
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param mixed $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getRolesCollection() {
        return $this->roles;
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        $roleArray = array();
        foreach($this->getRolesCollection() as $role) {
            $roleArray[] = $role->getName();
        }
        return $roleArray;
    }

    /**
     * @param mixed $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->getEmail();
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}