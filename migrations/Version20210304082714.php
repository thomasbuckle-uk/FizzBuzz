<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210304082714 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE device_token_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE device_token_entry_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE device_token_entry (id INT NOT NULL, app_code_id INT NOT NULL, device_id VARCHAR(255) NOT NULL, contactable BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FA7FCDF7CA877E5A ON device_token_entry (app_code_id)');
        $this->addSql('ALTER TABLE device_token_entry ADD CONSTRAINT FK_FA7FCDF7CA877E5A FOREIGN KEY (app_code_id) REFERENCES app_code (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE device_token');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE device_token_entry_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE device_token_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE device_token (id INT NOT NULL, app_code_id INT NOT NULL, device_id VARCHAR(255) NOT NULL, contactable BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_99b2415cca877e5a ON device_token (app_code_id)');
        $this->addSql('ALTER TABLE device_token ADD CONSTRAINT fk_99b2415cca877e5a FOREIGN KEY (app_code_id) REFERENCES app_code (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE device_token_entry');
    }
}
