<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220722095533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE member CHANGE first_phone first_phone VARCHAR(20) DEFAULT NULL, CHANGE second_phone second_phone VARCHAR(20) DEFAULT NULL, CHANGE mobile_phone mobile_phone VARCHAR(20) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE member CHANGE first_phone first_phone VARCHAR(12) DEFAULT NULL, CHANGE second_phone second_phone VARCHAR(12) DEFAULT NULL, CHANGE mobile_phone mobile_phone VARCHAR(12) DEFAULT NULL');
    }
}
