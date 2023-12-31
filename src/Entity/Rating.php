<?php

namespace App\Entity;

use App\Repository\RatingRepository;
#use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RatingRepository::class)]
class Rating
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    ##[ORM\ManyToMany(targetEntity: Photo::class, inversedBy: 'ratings')]
    #private Collection $photo;

    #[ORM\ManyToOne(inversedBy: 'ratings')]
    private ?Photo $photo = null;

    ##[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'ratings')]
    #private Collection $rater;

    #[ORM\ManyToOne(inversedBy: 'ratings')]
    private ?User $rater = null;

    #[ORM\Column]
    private ?float $score = null;

    public function __construct()
    {
    #    $this->photo = new ArrayCollection();
    #    $this->rater = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Photo>
     */
    public function getPhoto(): ?Photo
    {
        return $this->photo;
    }

    public function setPhoto(Photo|null $photo): static
    {
        #if (!$this->photo->contains($photo)) {
        #    $this->photo->add($photo);
        #}

        $this->photo = $photo;

        return $this;
    }

    #public function removePhoto(Photo $photo): static
    #{
    #    $this->photo->removeElement($photo);
    #
    #    return $this;
    #}

    /**
     * @return Collection<int, User>
     */
    public function getRater(): ?User
    {
        return $this->rater;
    }

    public function setRater(User|null $rater): static
    {
        #if (!$this->rater->contains($rater)) {
        #    $this->rater->add($rater);
        #}

        $this->rater = $rater;

        return $this;
    }

    #public function removeRater(User $rater): static
    #{
    #    $this->rater->removeElement($rater);
    #
    #    return $this;
    #}

    public function getScore(): ?float
    {
        return $this->score;
    }

    public function setScore(float $score): static
    {
        $this->score = $score;

        return $this;
    }
}
