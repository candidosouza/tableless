<?php

namespace Tableless\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Timestampable abstract class
 * @ORM\MappedSuperclass
 */
abstract class Timestampable
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Assert\NotBlank
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     * @Assert\NotBlank
     */
    private $updatedAt;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * Set createdAt
     *
     * @param $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get CreatedAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set UpdatedAt
     *
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
    /**
     * Get UpdateAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}