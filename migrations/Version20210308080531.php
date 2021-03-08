<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210308080531 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tag DROP CONSTRAINT fk_389b78333a1cfd0');
        $this->addSql('DROP INDEX idx_389b78333a1cfd0');
        $this->addSql('ALTER TABLE tag DROP tag_group_id_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE tag ADD tag_group_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tag ADD CONSTRAINT fk_389b78333a1cfd0 FOREIGN KEY (tag_group_id_id) REFERENCES tag_group (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_389b78333a1cfd0 ON tag (tag_group_id_id)');
    }
}