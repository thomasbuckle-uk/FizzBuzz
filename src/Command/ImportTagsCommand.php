<?php

namespace App\Command;

use App\Service\ImportService;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ImportTagsCommand extends Command
{
    protected static $defaultName = 'app:import:tags';
    protected static $defaultDescription = 'Add a short description for your command';
    private ImportService $import;
    private LoggerInterface $logger;

    public function __construct(ImportService $import, LoggerInterface $logger, string $name = null)
    {
        $this->import = $import;
        $this->logger = $logger;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this
            ->setDescription(self::$defaultDescription);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        #Future improvement allowing this to be configured, no time just now!
        $activeTags = [
            "subscription_status" => [
                "active_subscriber",
                "expired_subscriber",
                "never_subscribed",
                "subscription_unknown"
            ],
            "has_downloaded_free_product_status" => [
                "has_downloaded_free_product",
                "not_downloaded_free_product",
                "downloaded_free_product_unknown"
            ],
            "has_downloaded_iap_product_status" => [
                "has_downloaded_iap_product",
                "not_downloaded_free_product",
                "downloaded_iap_product_unknown"
            ]
        ];
        $io = new SymfonyStyle($input, $output);
        #TODO improve so duplicated tags wont be imported OR so that dupicate tag names are allowed
        $this->import->importTagGroups($activeTags);
        return Command::SUCCESS;
    }
}
