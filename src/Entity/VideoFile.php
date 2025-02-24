<?php

namespace App\Entity;

use App\Repository\VideoFileRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VideoFileRepository::class)]
class VideoFile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $videokey = null;

    #[ORM\Column(length: 255)]
    private ?string $filename = null;

    #[ORM\Column(length: 255)]
    private ?string $filepath = null;

    #[ORM\Column(length: 255)]
    private ?string $library = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getVideokey(): ?string
    {
        return $this->videokey;
    }

    public function setVideokey(string $videokey): static
    {
        $this->videokey = $videokey;

        return $this;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): static
    {
        $this->filename = $filename;

        return $this;
    }

    public function getFilepath(): ?string
    {
        return $this->filepath;
    }

    public function setFilepath(string $filepath): static
    {
        $this->filepath = $filepath;

        return $this;
    }

    public function getLibrary(): ?string
    {
        return $this->library;
    }

    public function setLibrary(string $library): static
    {
        $this->library = $library;

        return $this;
    }
}
