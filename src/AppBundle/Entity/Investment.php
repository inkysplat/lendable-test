<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Investment
 *
 * @ORM\Table(name="investment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InvestmentRepository")
 */
class Investment implements \JsonSerializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=5, scale=3)
     */
    private $amount;

    /**
     * @var array
     *
     * @ORM\Column(name="currency", type="string", columnDefinition="ENUM('GBP','EUR','USD')")
     */
    private $currency;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deposited_at", type="datetime")
     */
    private $depositedAt;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Investor")
     * @ORM\JoinColumn(name="investor_id", referencedColumnName="id")
     */
    private $investor;

    /**
     * @var string
     *
     * @ORM\Column(name="tax", type="decimal", precision=5, scale=3)
     */
    private $tax;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set amount
     *
     * @param string $amount
     * @return Investment
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set currency
     *
     * @param array $currency
     * @return Investment
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return array
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set depositedAt
     *
     * @param \DateTime $depositedAt
     * @return Investment
     */
    public function setDepositedAt($depositedAt)
    {
        $this->depositedAt = $depositedAt;

        return $this;
    }

    /**
     * Get depositedAt
     *
     * @return \DateTime
     */
    public function getDepositedAt()
    {
        return $this->depositedAt->format('Y-m-d H:i:s');
    }

    /**
     * Set investor
     *
     * @param \stdClass $investor
     * @return Investment
     */
    public function setInvestor(Investor $investor)
    {
        $this->investor = $investor;

        return $this;
    }

    /**
     * Get investor
     *
     * @return \stdClass
     */
    public function getInvestor()
    {
        return $this->investor;
    }

    /**
     * Set tax
     *
     * @param string $tax
     * @return Investment
     */
    public function setTax($tax)
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * Get tax
     *
     * @return string
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'amount' => $this->amount,
            'currency' => $this->currency,
            'deposited_at' => $this->depositedAt,
            'tax' => $this->tax
        ];
    }
}
