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
                'parser_test/appCodes.ini'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $file_location = 'parser_test/appCodes.ini';
        if ($input->getOption('dir')) {
            $file_location = $input->getOption('dir');
        }

        $results = parse_ini_file($file_location, false, INI_SCANNER_TYPED);
        if ($results === false) {
            $io->error("Unable to parse appCodes.ini at the given location - " . $file_location);
            return Command::FAILURE;
        }

        $entityManager = $this->getDoctrine()->getManager();
        foreach ( $results as $result) {

        }
        $io->success('Success!');
        return Command::SUCCESS;
    }
}
