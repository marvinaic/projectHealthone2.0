<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210111124921 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recept ADD medicijn_id INT NOT NULL, CHANGE medicijn datum VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE recept ADD CONSTRAINT FK_B92268A1DFC35CB FOREIGN KEY (medicijn_id) REFERENCES drug (id)');
        $this->addSql('CREATE INDEX IDX_B92268A1DFC35CB ON recept (medicijn_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recept DROP FOREIGN KEY FK_B92268A1DFC35CB');
        $this->addSql('DROP INDEX IDX_B92268A1DFC35CB ON recept');
        $this->addSql('ALTER TABLE recept DROP medicijn_id, CHANGE datum medicijn VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
