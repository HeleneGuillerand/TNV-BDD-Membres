<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220720133218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rate_fft CHANGE entry_fee entry_fee DOUBLE PRECISION DEFAULT NULL, CHANGE cotisation cotisation DOUBLE PRECISION DEFAULT NULL, CHANGE licence licence DOUBLE PRECISION DEFAULT NULL, CHANGE amount amount DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rate_fft CHANGE entry_fee entry_fee SMALLINT DEFAULT NULL, CHANGE cotisation cotisation SMALLINT DEFAULT NULL, CHANGE licence licence SMALLINT DEFAULT NULL, CHANGE amount amount SMALLINT DEFAULT NULL');
    }
}
