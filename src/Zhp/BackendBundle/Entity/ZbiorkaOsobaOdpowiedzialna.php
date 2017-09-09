<?php
/**
 * Created by PhpStorm.
 * User: dreadnoth
 * Date: 27.07.17
 * Time: 19:31
 */

namespace Zhp\BackendBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * Class ZbiorkaOsobaOdpowiedzialna
 * @package Zhp\BackendBundle\Entity
 * @ORM\Entity(repositoryClass="Zhp\BackendBundle\Repository\ZbiorkaOsobaOdpowiedzialnaRepository")
 */
class ZbiorkaOsobaOdpowiedzialna
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Zhp\BackendBundle\Entity\Zbiorka", inversedBy="osobaOdpowiedzialna")
     * @ORM\JoinColumn(name="zbiorka_id", referencedColumnName="id")
     */
    private $zbiorka;

    /**
     * @ORM\Column(name="imie", nullable=true)
     */
    private $imie;

    /**
     * @ORM\Column(name="nazwisko", nullable=true)
     */
    private $nazwisko;

    /**
     * @ORM\Column(name="telefon")
     */
    private $telefon;

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
    public function getZbiorka()
    {
        return $this->zbiorka;
    }

    /**
     * @param mixed $zbiorka
     */
    public function setZbiorka($zbiorka)
    {
        $this->zbiorka = $zbiorka;
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
}