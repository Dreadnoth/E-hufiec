<?php
/**
 * Created by PhpStorm.
 * User: dreadnoth
 * Date: 27.07.17
 * Time: 19:30
 */

namespace Zhp\BackendBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class ZbiorkaUwagi
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\OneToOne(targetEntity="Zhp\BackendBundle\Entity\Zbiorka", inversedBy="uwagi")
     * @ORM\JoinColumn(name="zbiorka_id", referencedColumnName="id")
     */
    private $zbiorka;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tekst;

    /**
     * ZbiorkaUwagi constructor.
     * @param $zbiorka
     * @param $tekst
     */
    public function __construct($zbiorka, $tekst)
    {
        $this->zbiorka = $zbiorka;
        $this->tekst = $tekst;
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
    public function getTekst()
    {
        return $this->tekst;
    }

    /**
     * @param mixed $tekst
     */
    public function setTekst($tekst)
    {
        $this->tekst = $tekst;
    }
}