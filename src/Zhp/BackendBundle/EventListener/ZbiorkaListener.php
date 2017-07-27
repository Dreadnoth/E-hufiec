<?php
/**
 * Created by PhpStorm.
 * User: dreadnoth
 * Date: 27.07.17
 * Time: 20:07
 */

namespace Zhp\BackendBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Zhp\BackendBundle\Entity\Zbiorka;
use Zhp\BackendBundle\Utils\ZbiorkaUtils;

class ZbiorkaListener implements EventSubscriber
{

    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return array
     */
    public function getSubscribedEvents()
    {
        return array(
            "postPersist",
            "postUpdate"
        );
    }

    public function postPersist(LifecycleEventArgs $args) {
        $this->handleSave($args);
    }

    private function handleSave(LifecycleEventArgs $args) {
        $entity = $args->getObject();
        //tylko ZbiorkaEntity
        if(!($entity instanceof Zbiorka)) {
            return;
        }

        $entity->setIdentyfikator(ZbiorkaUtils::generujIdentyfikator($entity));
        $args->getObjectManager()->persist($entity);

    }
}