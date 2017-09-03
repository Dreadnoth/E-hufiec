<?php
/**
 * Created by PhpStorm.
 * User: dreadnoth
 * Date: 27.07.17
 * Time: 19:42
 */

namespace Zhp\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class OperatorDane
 * @package Zhp\BackendBundle\Entity
 * @ORM\Entity(repositoryClass="Zhp\BackendBundle\Repository\OperatorDaneRepository")
 */
class OperatorDane
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @var
     * @ORM\OneToOne(targetEntity="Zhp\BackendBundle\Entity\Operator", inversedBy="operatorDane")
     * @ORM\JoinColumn(name="operator_id", referencedColumnName="id")
     */
    private $operator;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $imie;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $nazwisko;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $telefon;

    /**
     * OperatorDane constructor.
     * @param $operator
     * @param $imie
     * @param $nazwisko
     * @param $telefon
     */
    public function __construct($operator, $imie, $nazwisko, $telefon)
    {
        $this->operator = $operator;
        $this->imie = $imie;
        $this->nazwisko = $nazwisko;
        $this->telefon = $telefon;
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
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @param mixed $operator
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;
    }

    /**
     * @return mixed
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * @param mixed $imie
     */
    public function setImie($imie)
    {
        $this->imie = $imie;
    }

    /**
     * @return mixed
     */
    public function getNazwisko()
    {
        return $this->nazwisko;
    }

    /**
     * @param mixed $nazwisko
     */
    public function setNazwisko($nazwisko)
    {
        $this->nazwisko = $nazwisko;
    }

    /**
     * @return mixed
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * @param mixed $telefon
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;
    }

    public function __toString()
    {
        return "OperatorDane{imie: \"" .$this->getImie() . "\", nazwisko: \"" .$this->getNazwisko() ."\", telefon: \"" .$this->getTelefon() . "\"}";
    }


}