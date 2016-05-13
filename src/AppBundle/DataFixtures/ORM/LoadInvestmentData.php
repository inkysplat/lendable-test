<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Investment;
use AppBundle\Entity\Investor;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadInvestorData
 */
class LoadInvestmentData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $investment = new Investment();
        $investment->setAmount(1500.00);
        $investment->setCurrency('GBP');
        $investment->setDepositedAt(new \DateTime());
        $investment->setTax(1.2);

        $investor = $manager->find(Investor::class, 1);
        $investment->setInvestor($investor);

        $manager->persist($investment);
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}