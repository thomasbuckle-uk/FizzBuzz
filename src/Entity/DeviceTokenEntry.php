<?php

namespace App\Entity;

use App\Repository\DeviceTokenEntryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeviceTokenEntryRepository::class)
 */
class DeviceTokenEntry
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=AppCode::class, inversedBy="deviceTokenEntries")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?AppCode $appCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $deviceId;

    /**
     * @ORM\Column(type="boolean")
     */
    private $contactable;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAppCode(): ?AppCode
    {
        return $this->appCode;
    }

    public function setAppCode(?AppCode $appCode): self
    {
        $this->appCode = $appCode;

        return $this;
    }

    public function getApp(): ?string
    {
        return $this->app;
    }

    public function setApp(?string $app): self
    {
        $this->app = $app;

        return $this;
    }

    public function getDeviceId(): ?string
    {
        return $this->deviceId;
    }

    public function setDeviceId(string $deviceId): self
    {
        $this->deviceId = $deviceId;

        return $this;
    }

    public function getContactable(): ?bool
    {
        return $this->contactable;
    }

    public function setContactable(bool $contactable): self
    {
        $this->contactable = $contactable;

        return $this;
    }
}
