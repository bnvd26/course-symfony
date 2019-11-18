<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LabelRepository")
 */
class Label
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Record", mappedBy="label", orphanRemoval=true)
     */
    private $name;

    public function __construct()
    {
        $this->name = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Record[]
     */
    public function getName(): Collection
    {
        return $this->name;
    }

    public function addName(Record $name): self
    {
        if (!$this->name->contains($name)) {
            $this->name[] = $name;
            $name->setLabel($this);
        }

        return $this;
    }

    public function removeName(Record $name): self
    {
        if ($this->name->contains($name)) {
            $this->name->removeElement($name);
            // set the owning side to null (unless already changed)
            if ($name->getLabel() === $this) {
                $name->setLabel(null);
            }
        }

        return $this;
    }
}
