<?php
/**
 * Created by PhpStorm.
 * User: dreadnoth
 * Date: 27.07.17
 * Time: 20:15
 */

namespace Zhp\BackendBundle\Utils;


use Zhp\BackendBundle\Entity\Zbiorka;

class ZbiorkaUtils
{
    public static function generujIdentyfikator(Zbiorka $entity): string {
        $result= date("YYYY/MM/dd")."/";
        $result .= $entity->getId()."/";
        $result .= $entity->getJednostka()->getId()."/";
        $result .= $entity->getO()->getId()."/";

        return $result;
    }
}