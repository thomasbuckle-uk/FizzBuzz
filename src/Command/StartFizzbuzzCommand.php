<?php /** @noinspection InconsistentLineSeparators */

namespace App\Command;

use App\Service\DivisibleService;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * @property SymfonyStyle io
 * @property DivisibleService DivisibleService
 * @property LoggerInterface logger
 */
class StartFizzbuzzCommand extends Command
{
    protected static $defaultName = 'app:start-fizzbuzz';
    protected static string $defaultDescription = 'Add a short description for your command';

    public function __construct(DivisibleService $isDivisible, LoggerInterface $fizzbuzzLogger)
    {
        $this->DivisibleService = $isDivisible;
        $this->logger = $fizzbuzzLogger;
        parent::__construct();
    }


    protected function configure()
    {
        $this
            ->setDescription("Prints Numbers 1-500, if a number is divisible by 3 'FIZZ' is printed, if 5 'BUZZ' is printed. If divisible by both 3 and 5 then 'FIZZBUZZ' is printed. Finally if a prime number 'FIZZBUZZ++' will be printed")
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        //Move start, end to configure() to enable user configuration
        $start = 1;
        $end = 500;

        $io->note("test");

        while ($start <= $end) {
            $stringOutput = null;
            $io->writeln($start);
            if ($this->DivisibleService->isDivisible($start, 3)) {
                $stringOutput .= 'FIZZ';
            }
            if ($this->DivisibleService->isDivisible($start, 5)) {
                $stringOutput .= 'BUZZ';
            }

            if ($this->DivisibleService->isPrime($start)) {
                $stringOutput .= ' FIZZBUZZ++';
            }


            if ($stringOutput) {
                $io->success($stringOutput);
                $this->logger->log('info', 'Number: ' . $start . ' Result: ' . $stringOutput);
            }


            $start++;
        }

        return Command::SUCCESS;
    }
}
