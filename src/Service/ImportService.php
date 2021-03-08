<?php


namespace App\Service;

use App\Entity\AppCode;
use App\Entity\Tag;
use App\Entity\TagGroup;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

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

    public function importIniFile(array $array): array
    {
        $errorsArray = [];
        foreach ($array as $code => $name) {
            $appcode = new AppCode();
            $appcode->setCode($code);
            $appcode->setName($name);

            $errors = $this->validator->validate($appcode);
            if (count($errors) > 0) {
                $this->logger->error(" " . $code . ": " . (string)$errors);
            } else {
                $this->em->persist($appcode);
            }
        }
        $this->em->flush();
        return $errorsArray;
    }

    public function importTagGroups(array $array): void
    {
        foreach ($array as $group => $value) {
            $taggroup = new TagGroup();
            $taggroup->setName($group);
            $taggroup->setIsActive(true);
            $errors = $this->validator->validate($taggroup);
            if (count($errors) > 0) {
                $this->logger->error(" " . $group . ": " . (string)$errors);
            } else {
                $this->em->persist($taggroup);
                $this->em->flush();

                //Nested foreach, this is bad but time is short
                $this->importTags($value, $taggroup);
            }
        }
    }

    public function importTags(array $taggoup, TagGroup $groupId): void
    {
        foreach ($taggoup as $tagRow) {
            $tag = new Tag();
            $tag->setTagGroup($groupId);
            $tag->setIsActive(true);
            $tag->setName($tagRow);

            //TODO Repeated Code, remove if time
            $errors = $this->validator->validate($tag);
            if (count($errors) > 0) {
                $this->logger->error(" " . $tagRow . ": " . (string)$errors);
            } else {
                $this->em->persist($tag);
            }
        }
        $this->em->flush();
    }
}
