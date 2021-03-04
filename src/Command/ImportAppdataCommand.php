<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ImportAppdataCommand extends Command
{
    protected static $defaultName = 'app:import:appdata';
    protected static string $defaultDescription = 'Import Appdata.ini file to database';

    protected function configure()
    {
        $this
            ->setDescription(self::$defaultDescription)
            ->addOption(
                'dir',
                null,
                InputOption::VALUE_REQUIRED,
                'Location of appdata.ini',
                '%kernel.project_dir%/tests/parse_test/appCodes.ini'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        if ($input->getOption('dir')) {
            // ...
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
