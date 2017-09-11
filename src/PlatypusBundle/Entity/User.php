<?php

namespace PlatypusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use PlatypusBundle\Validator\Constraints as CustomAssert;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="PlatypusBundle\Repository\UserRepository")
 * @UniqueEntity(fields="email", message="Email already taken")
 * @UniqueEntity(fields="username", message="Username already taken")
 * @ORM\HasLifecycleCallbacks()
 * 
 * 
 */
class User implements UserInterface, \Serializable {

    const ROLE_DEFAULT = 'ROLE_BLOGGER';

    public function __construct() {
        $this->creationDate = new \DateTime();
        $this->roles = array('ROLE_BLOGGER');
        $this->posts = new ArrayCollection();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var ArrayCollection
     * @ORM\OrderBy({"modificationDate" = "DESC"})
     * @ORM\OneToMany(targetEntity="PlatypusBundle\Entity\Post", mappedBy="user")
     */
    private $posts;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     * @Assert\Length(min="5", minMessage="Username must be at least of 5 characters")
     * @Assert\Regex(
     *   pattern="/^[A-Za-z]+\d*$/",
     *   match=true,
     *   message="Your username cannot contain special characters or space"
     * )
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     * 
     */
    private $password;
    
     /**
     * @var string
     * 
     * @CustomAssert\CheckPassword()
     * 
     */
    private $plainPassword;

    /**
     * @var string
     */
    private $passwordConfirm;

    /**
     * @var string
     *
     * @CustomAssert\CheckOldPassword()
     * 
     */
    private $oldPassword;

    /**
     * @var string
     *
     * @CustomAssert\CheckNewPassword()
     */
    private $newPassword;

    /**
     * @var string
     */
    private $newPasswordConfirm;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     * @Assert\Email(message="You must fill in a valid email address")
     * @Assert\NotNull(message="Email cannot be empty")
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255)
     * 
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $lastName;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="array")
     */
    private $roles;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime")
     */
    private $creationDate;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password) {
        if (!is_null($password)) {
            $this->password = $password;
        }

        return $this;
    }
      /**
     * Set password
     *
     * @param string $plainPassword
     *
     * @return User
     */
    public function setPlainPassword($plainPassword) {
        $this->plainPassword = $plainPassword;

        return $this;
    }
     /**
     * Set passwordConfirm
     *
     * @param string $password
     *
     * @return User
     */
    public function setPasswordConfirm($password) {
        $this->passwordConfirm = $password;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $oldPassword
     *
     * @return User
     */
    public function setOldPassword($oldPassword) {
        $this->oldPassword = $oldPassword;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $newPassword
     *
     * @return User
     */
    public function setNewPassword($newPassword) {
        $this->newPassword = $newPassword;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $newPasswordConfirm
     *
     * @return User
     */
    public function setNewPasswordConfirm($newPasswordConfirm) {
        $this->$newPasswordConfirm = $newPasswordConfirm;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }
     /**
     * Get plainPassword
     *
     * @return string
     */
    public function getPlainPassword() {
        return $this->plainPassword;
    }
    
     /**
     * Get passwordConfirm
     *
     * @return string
     */
    public function getPasswordConfirm() {
        return $this->passwordConfirm;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getOldPassword() {
        return $this->oldPassword;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getNewPassword() {
        return $this->newPassword;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getNewPasswordConfirm() {
        return $this->newPasswordConfirm;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName) {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return User
     */
    public function setRoles($roles) {
        $this->roles = array($roles);

        return $this;
    }

    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles() {
        return $this->roles;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return User
     */
    public function setCreationDate($creationDate) {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate() {
        return $this->creationDate;
    }

    public function getSalt() {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function eraseCredentials() {
        
    }

    /**
     * @inheritDoc
     */
    public function serialize() {
        return serialize([
            $this->id,
            $this->username,
            $this->password
        ]);
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized) {
        list(
                $this->id,
                $this->username,
                $this->password
                ) = unserialize($serialized);
    }


    /**
     * Add post
     *
     * @param \PlatypusBundle\Entity\Post $post
     *
     * @return User
     */
    public function addPost(\PlatypusBundle\Entity\Post $post)
    {
        $this->posts[] = $post;

        return $this;
    }

    /**
     * Remove post
     *
     * @param \PlatypusBundle\Entity\Post $post
     */
    public function removePost(\PlatypusBundle\Entity\Post $post)
    {
        $this->posts->removeElement($post);
    }

    /**
     * Get posts
     * 
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPosts()
    {
        return $this->posts;
    }
}
