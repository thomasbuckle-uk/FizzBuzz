<?php

namespace App\Command;

use App\Service\Parser\LogFileParserService;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Finder\Finder;

class ImportDeviceTokenFilesCommand extends Command
{
    protected static $defaultName = 'app:import:device-token-files';
    protected static string $defaultDescription = 'Add a short description for your command';
    private LoggerInterface $logger;
    private LogFileParserService $logfileparser;

    public function __construct(
        LogFileParserService $logFileParserService,
        LoggerInterface $logger,
        string $name = null
    ) {
        $this->logger = $logger;
        $this->logfileparser = $logFileParserService;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this
            ->setDescription(self::$defaultDescription);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        #Return all files using logfileparserservice
        #take all results, parse them, insert to db
        #return view of required data, output to .csv results file

        $results = $this->logfileparser->getAllFilesByType();

        # If no results, something went wrong.
        # TODO add better error feedback if this case happens
        if ($results === false) {
            return Command::FAILURE;
        }
        if (get_class($results) === Finder::class) {
            #Handle results returned
            $this->handleResults($results);
            return Command::SUCCESS;
        }


        return Command::FAILURE;
    }

    public function handleResults(Finder $finder)
    {
        foreach ($finder as $file) {
        }
    }
}
