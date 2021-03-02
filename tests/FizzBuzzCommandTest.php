<?php

namespace App\Tests;

use App\Command\StartFizzbuzzCommand;
use App\Kernel;
use App\Service\DivisibleService;
use Monolog\Logger;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class FizzBuzzCommandTest extends TestCase
{
    public function testExecute(): void
    {
        $kernel = $this->createMock(Kernel::class);


        $application = new Application($kernel);
        $application->add(new StartFizzbuzzCommand(
            $this->createMock(DivisibleService::class),
            $this->createMock(Logger::class)
        ));

        $command = $application->find('app:start-fizzbuzz');
        $commandTester = new CommandTester($command);
        $result = $commandTester->execute(
            array(
                'command' => $command->getName()
            )
        );
        self::assertEquals(0, $result);
    }
}
