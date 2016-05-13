<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Investor;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadInvestorData
 */
class LoadInvestorData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $investor = new Investor();
        $investor->setName("John Black Smith");
        $investor->setEmail("smith@investor.co.uk");
        $investor->setPassword("SaesAdedf34s");
        $investor->setRole("ROLE_INVESTOR");

        $manager->persist($investor);
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}