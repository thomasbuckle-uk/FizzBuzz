<?php


namespace App\Service;

use App\Entity\AppCode;
use Doctrine\DBAL\Driver\Result;
use Doctrine\DBAL\Driver\ResultStatement;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use function Sodium\add;

/**
 * Class ImportService
 * @package App\Service
 */
class ImportService
{
    private EntityManagerInterface $em;
    private ValidatorInterface $validator;
    private LoggerInterface $logger;

    public function __construct(EntityManagerInterface $em, ValidatorInterface $validator, LoggerInterface $logger)
    {
        $this->em = $em;
        $this->validator = $validator;
        $this->logger = $logger;
    }

    public function importIniFile(array $array) :array
    {
        $errorsArray= [];
        foreach ($array as $code=>$name) {
            $appcode = new AppCode();
            $appcode->setCode($code);
            $appcode->setName($name);
            $errors = $this->validator->validate($appcode);
            if (count($errors) > 0) {
                $this->logger->error(" " . $code . ": " . (string) $errors);
            }

        }

        $this->em->flush();
        return  $errorsArray;

    }
}
