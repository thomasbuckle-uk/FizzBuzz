<?php


namespace App\Service\Parser;

use Psr\Log\LoggerInterface;
use Symfony\Component\Finder\Finder;

/**
 * Class LogFileParserService
 * @package App\Service
 * */
class LogFileParserService
{
    private LoggerInterface $logger;
    private Finder $finder;
    private string $projectDir;

    public function __construct(LoggerInterface $logger, string $projectDir)
    {
        $this->logger = $logger;
        $this->finder = new Finder();
        $this->projectDir = $projectDir;
    }

    /**
     * Returns Found Files
     *
     *
     * @param string|null $depth The Depth Level expression - IE '>1' will start matching at level 1. Default = Recursive
     * @param string $startLocation Starting Directory relative to %kernel.project_dir%
     * @param string $fileType File type eg '.log' or '.csv' etc
     * @return bool|Finder
     */
    public function getAllFilesByType(
        string $depth = null,
        string $startLocation = '/parser_test',
        string $fileType = ".log"
    ): bool|Finder {
        ##Get new Finder object to force a reset, not sure if actually needed
        ##Recursive toggle not set
        $this->finder = new Finder();
        $this->finder->files()->name('*' . $fileType)->ignoreUnreadableDirs()->in($this->projectDir . $startLocation);
        if ($this->finder->hasResults()) {
            return $this->finder;
        }
        return false;
    }

    public function parseColumns()
    {
    }
}
