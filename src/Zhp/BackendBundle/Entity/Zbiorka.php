<?php
/**
 * Created by PhpStorm.
 * User: dreadnoth
 * Date: 27.07.17
 * Time: 19:10
 */

namespace Zhp\BackendBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Zhp\BackendBundle\Repository\ZbiorkaRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Zbiorka
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $identyfikator;

    /**
     * @ORM\Column(type="string")
     */
    private $nazwa;

    /**
     * @ORM\ManyToOne(targetEntity="Zhp\BackendBundle\Entity\Jednostka")
     * @ORM\JoinColumn(name="jednostka_id", referencedColumnName="id")
     */
    private $jednostka;

    /**
     * @ORM\ManyToOne(targetEntity="Zhp\BackendBundle\Entity\Operator")
     * @ORM\JoinColumn(name="operator_opiekun_id", referencedColumnName="id")
     */
    private $operatorOpiekunZbiorki;

    /**
     * @ORM\Column(type="string")
     */
    private $miejsce;

    /**
     * @ORM\Column(type="integer")
     */
    private $liczbaOsob;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dataUtworzenia;

    /**
     * @ORM\Column(type="datetime")
     */
    private $czasTrwaniaOd;

    /**
     * @ORM\Column(type="datetime")
     */
    private $czasTrwaniaDo;

    /**
     * @var
     * @ORM\OneToOne(targetEntity="Zhp\BackendBundle\Entity\ZbiorkaUwagi", mappedBy="zbiorka")
     */
    private $uwagi;

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
    public function getIdentyfikator()
    {
        return $this->identyfikator;
    }

    /**
     * @param mixed $identyfikator
     */
    public function setIdentyfikator($identyfikator)
    {
        $this->identyfikator = $identyfikator;
    }

    /**
     * @return mixed
     */
    public function getNazwa()
    {
        return $this->nazwa;
    }

    /**
     * @param mixed $nazwa
     */
    public function setNazwa($nazwa)
    {
        $this->nazwa = $nazwa;
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
    public function getMiejsce()
    {
        return $this->miejsce;
    }

    /**
     * @param mixed $miejsce
     */
    public function setMiejsce($miejsce)
    {
        $this->miejsce = $miejsce;
    }

    /**
     * @return mixed
     */
    public function getLiczbaOsob()
    {
        return $this->liczbaOsob;
    }

    /**
     * @param mixed $liczbaOsob
     */
    public function setLiczbaOsob($liczbaOsob)
    {
        $this->liczbaOsob = $liczbaOsob;
    }

    /**
     * @return mixed
     */
    public function getDataUtworzenia()
    {
        return $this->dataUtworzenia;
    }

    /**
     * @param mixed $dataUtworzenia
     */
    public function setDataUtworzenia($dataUtworzenia)
    {
        $this->dataUtworzenia = $dataUtworzenia;
    }

    /**
     * @return mixed
     */
    public function getCzasTrwaniaOd()
    {
        return $this->czasTrwaniaOd;
    }

    /**
     * @param mixed $czasTrwaniaOd
     */
    public function setCzasTrwaniaOd($czasTrwaniaOd)
    {
        $this->czasTrwaniaOd = $czasTrwaniaOd;
    }

    /**
     * @return mixed
     */
    public function getCzasTrwaniaDo()
    {
        return $this->czasTrwaniaDo;
    }

    /**
     * @param mixed $czasTrwaniaDo
     */
    public function setCzasTrwaniaDo($czasTrwaniaDo)
    {
        $this->czasTrwaniaDo = $czasTrwaniaDo;
    }

    /**
     * @return mixed
     */
    public function getOperatorOpiekunZbiorki()
    {
        return $this->operatorOpiekunZbiorki;
    }

    /**
     * @param mixed $operatorOpiekunZbiorki
     */
    public function setOperatorOpiekunZbiorki($operatorOpiekunZbiorki)
    {
        $this->operatorOpiekunZbiorki = $operatorOpiekunZbiorki;
    }

    /**
     * @return mixed
     */
    public function getUwagi()
    {
        return $this->uwagi;
    }

    /**
     * @param mixed $uwagi
     */
    public function setUwagi($uwagi)
    {
        $this->uwagi = $uwagi;
    }

    /**
     * @ORM\PrePersist()
     */
    public function prePersist(){
        $this->setDataUtworzenia(new \DateTime());
    }
}