<?php

namespace App\Model;

/**
 * Class Product
 * @package App\Model
 * @Doctrine\ORM\Mapping\Entity
 * @Doctrine\ORM\Mapping\Table("Product")
 */
class Product extends \Framework\Model {
    /**
     * @Doctrine\ORM\Mapping\Id
     * @Doctrine\ORM\Mapping\GeneratedValue(strategy="AUTO")
     * @Doctrine\ORM\Mapping\Column(type="integer", length=11, name="identifier")
     * @var integer
     */
    private $identifier;

    /**
     * @Doctrine\ORM\Mapping\Column(type="string", length=128, name="name", nullable=false)
     * @var string
     */
    private $name;

    /**
     * @Doctrine\ORM\Mapping\Column(type="string", length=256, name="image", nullable=true)
     * @var string
     */
    private $image;

    /**
     * @Doctrine\ORM\Mapping\Column(type="decimal", name="price", nullable=false)
     * @var float
     */
    private $price;

    /**
     * @Doctrine\ORM\Mapping\Column(type="text", name="description", nullable=true)
     * @var string
     */
    private $description;

    /**
     * @return int
     */
    public function getIdentifier() {
        return $this->identifier;
    }

    /**
     * @param int $identifier
     */
    public function setIdentifier($identifier) {
        $this->identifier = $identifier;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image) {
        $this->image = $image;
    }

    /**
     * @return float
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price) {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }
}