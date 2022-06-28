<?php
namespace App\Entity;
use FOS\RestBundle\Controller\Annotations as Rest;
use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
	 * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="products")
	 */
	private $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCategory(): ?Category
	{
		return $this->category;
	}

	public function setCategory(?Category $category): self
   	{
   		$this->category = $category;
   
   		return $this;
   	}
}
