<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Investor
 *
 * @ORM\Table(name="investor")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InvestorRepository")
 */
class Investor implements UserInterface, \Serializable, \JsonSerializable
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var array
     *
     * @ORM\Column(name="role", type="string", columnDefinition="ENUM('ROLE_INVESTOR')")
     */
    private $role;

    /**
     * @var Investment
     * @ORM\OneToMany(targetEntity="Investment", mappedBy="investor_id")
     */
    private $investments;

    /**
     * Investor constructor.
     */
    public function __construct()
    {
        $this->investments = new ArrayCollection();
    }


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
     * Set name
     *
     * @param string $name
     * @return Investor
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Investor
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Investor
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set role
     *
     * @param array $role
     * @return Investor
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return array
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @return Investment|ArrayCollection
     */
    public function getInvestments()
    {
        return $this->investments;
    }

    public function eraseCredentials()
    {
    }

    public function getRoles()
    {
        return ['ROLE_INVESTOR'];
    }

    public function getSalt()
    {
        return null;
    }

    /**
     * Alias the Email field for the Username
     * @return string
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * For Serializeing the Entity to JSON back in the response...
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'investments' => $this->investments
        ];
    }

    /**
     * Persist the User Object to Session Storage
     *
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->email,
            $this->name,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /**
     * Persist the User Object to Session Storage
     *
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->email,
            $this->name,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }
}
