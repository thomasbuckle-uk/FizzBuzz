<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ImportTagsCommand extends Command
{
    protected static $defaultName = 'app:import:tags';
    protected static $defaultDescription = 'Add a short description for your command';

    protected function configure()
    {
        $this
            ->setDescription(self::$defaultDescription)
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
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

        return Command::SUCCESS;
    }
}
