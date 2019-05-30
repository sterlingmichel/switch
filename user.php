<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Entity\User")
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get","put"}
 * )
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=30)
     */
    private $firstname;
    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\NotBlank
     */
    private $lastname;
    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\NotBlank
     */
    private $username;
    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;
    /**
     * @ORM\Column(type="text", length=30)
     */
    private $city;
    /**
     * @ORM\Column(type="text", length=1)
     */
    private $sex;
    /**
     * @ORM\Column(type="text")
     */
    private $roles;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdDate;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastModified;


    public function __construct()
    {
        $this->roles = new ArrayCollection(); // Initialize $roles as a Doctrine collection
    }

    /**
     * @see UserInterface
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @see UserInterface
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }
    /**
     * @see UserInterface
     */
    public function setFirstname(string $firstname): self
    {
        $this->lastname = $firstname;
        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }
    /**
     * @see UserInterface
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }
    /**
     * @see UserInterface
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string)$this->password;
    }
    /**
     * @see UserInterface
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getCity(): ?string
    {
        return $this->city;
    }
    /**
     * @see UserInterface
     */
    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getSex(): ?string
    {
        return $this->sex;
    }
    /**
     * @see UserInterface
     */
    public function setSex(string $sex): self
    {
        $this->sex = $sex;
        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getMemo(): ?string
    {
        return $this->memo;
    }
    /**
     * @see UserInterface
     */
    public function setMemo(?string $memo): self
    {
        $this->memo = $memo;
        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }
    /**
     * @see UserInterface
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getCreatedDate(): ?\DateTimeInterface
    {
        return $this->createdDate;
    }
    /**
     * @see UserInterface
     */
    public function setCreatedDate(?\DateTimeInterface $createdDate): self
    {
        $this->createdDate = $createdDate;
        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getlastModified(): ?\DateTimeInterface
    {
        return $this->lastModified;
    }
    /**
     * @see UserInterface
     */
    public function setLastModified(?\DateTimeInterface $lastModified): self
    {
        $this->lastModified = $lastModified;
        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }
    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        $this->plainPassword = null;
    }
}
