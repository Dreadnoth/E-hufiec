<?php
/**
 * Created by PhpStorm.
 * User: dreadnoth
 * Date: 22.08.17
 * Time: 20:18
 */

namespace Zhp\BackendBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Zhp\BackendBundle\Entity\Jednostka;
use Zhp\BackendBundle\Entity\Operator;
use Zhp\BackendBundle\Entity\OperatorDane;
use Zhp\BackendBundle\Entity\Role;

class LoadAdminData implements FixtureInterface, ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $unit = $this->createJednostka($manager);
        $role = $this->createRole($manager);
        $user = $this->createAdminUser($manager, $unit, $role);

        $manager->flush();
    }

    private function createRole(ObjectManager $manager) {
        $adminRole = new Role("ROLE_ADMIN");
        $manager->persist($adminRole);
        return $adminRole;
    }

    private function createJednostka(ObjectManager $manager) {
        $testUnit = new Jednostka("Testowa");
        $manager->persist($testUnit);
        return $testUnit;
    }

    private function createAdminUser(ObjectManager $manager, Jednostka $unit , Role $role) {
        $user = new Operator();
        $user->setEmail("admin@example.com");
        $user->setEnabled(true);
        $user->getRolesCollection()->add($role);
        $user->setJednostka($unit);

        $encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($user, 'admin');
        $user->setPassword($password);

        $userData = new OperatorDane($user, "admin", "admin", "111-222-333");
        $user->setOperatorDane($userData);

        $manager->persist($userData);
        $manager->persist($user);

        return $user;
    }

    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}