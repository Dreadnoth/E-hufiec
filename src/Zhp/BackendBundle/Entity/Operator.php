<?php
/**
 * Created by PhpStorm.
 * User: dreadnoth
 * Date: 27.07.17
 * Time: 19:38
 */

namespace Zhp\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Operator
 * @package Zhp\BackendBundle\Entity
 * @ORM\Entity
 */
class Operator
{
    /**
     * @var
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
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
}