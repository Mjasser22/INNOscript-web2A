<?php

class Review
{
    private ?int $id;
    private ?int $id_hebergement;
    private ?int $review;

    public function __construct($id = null, $id_hebergement, $review)
    {
        $this->id = $id;
        $this->id_hebergement = $id_hebergement;
        $this->review = $review;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getIdHebergement(): ?int
    {
        return $this->id_hebergement;
    }

    public function setIdHebergement(?int $id_hebergement): self
    {
        $this->id_hebergement = $id_hebergement;
        return $this;
    }

    public function getReview(): ?int
    {
        return $this->review;
    }

    public function setReview(?int $review): self
    {
        // Ensure review is between 1 and 5
        if ($review !== null && ($review < 1 || $review > 5)) {
            throw new InvalidArgumentException('Review must be between 1 and 5.');
        }
        
        $this->review = $review;
        return $this;
    }
}
