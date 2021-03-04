<?php

namespace App\Entity;

use App\Repository\AppCodeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AppCodeRepository::class)
 */
class AppCode
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=DeviceTokenEntry::class, mappedBy="appCode", orphanRemoval=true)
     */
    private ArrayCollection $deviceTokenEntries;

    public function __construct()
    {
        $this->deviceTokenEntries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @return ArrayCollection
     */
    public function getDeviceTokenEntries(): ArrayCollection
    {
        return $this->deviceTokenEntries;
    }

    public function addDeviceTokenEntry(DeviceTokenEntry $deviceTokenEntry): self
    {
        if (!$this->deviceTokenEntries->contains($deviceTokenEntry)) {
            $this->deviceTokenEntries[] = $deviceTokenEntry;
            $deviceTokenEntry->setAppCode($this);
        }

        return $this;
    }

    public function removeDeviceTokenEntry(DeviceTokenEntry $deviceTokenEntry): self
    {
        if ($this->deviceTokenEntries->removeElement($deviceTokenEntry)) {
            // set the owning side to null (unless already changed)
            if ($deviceTokenEntry->getAppCode() === $this) {
                $deviceTokenEntry->setAppCode(null);
            }
        }

        return $this;
    }
}
