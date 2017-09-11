<?php

namespace PlatypusBundle\Entity;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;
use PlatypusBundle\Entity\User;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Post
 * 
 * @ORM\Table(name="post")
 * @UniqueEntity(fields="title", message="Post title already taken, please change")
 * @ORM\Entity(repositoryClass="PlatypusBundle\Repository\PostRepository")
 */
class Post
{
    
    public function __construct() {
        $this->creationDate = new \DateTime();
        $this->modificationDate = new \DateTime();
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
     * @var string
     * @Assert\NotBlank(message="This value should not be blank.")
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     */
    private $title;
 
    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="PlatypusBundle\Entity\User", inversedBy="posts", cascade="persist")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $user;

    /**
     * @var string
     * @Assert\NotBlank(message="This value should not be blank.")
     * @ORM\Column(name="content", type="string", length=255)
     * 
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime")
     */
    private $creationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modification_date", type="datetime")
     */
    private $modificationDate;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Post
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set modificationDate
     *
     * @param \DateTime $modificationDate
     *
     * @return Post
     */
    public function setModificationDate($modificationDate)
    {
        $this->modificationDate = $modificationDate;

        return $this;
    }

    /**
     * Get modificationDate
     *
     * @return \DateTime
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    /**
     * Set user
     *
     * @param \PlatypusBundle\Entity\User $user
     *
     * @return Post
     */
    public function setUser(\PlatypusBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \PlatypusBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
