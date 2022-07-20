<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220720131301 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE member_rate_ffta (member_id INT NOT NULL, rate_ffta_id INT NOT NULL, INDEX IDX_BD9949A77597D3FE (member_id), INDEX IDX_BD9949A767ADCF4C (rate_ffta_id), PRIMARY KEY(member_id, rate_ffta_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rate_ffta (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(10) NOT NULL, label VARCHAR(255) NOT NULL, entry_fee SMALLINT DEFAULT NULL, cotisation SMALLINT DEFAULT NULL, licence SMALLINT DEFAULT NULL, amount SMALLINT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE member_rate_ffta ADD CONSTRAINT FK_BD9949A77597D3FE FOREIGN KEY (member_id) REFERENCES member (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE member_rate_ffta ADD CONSTRAINT FK_BD9949A767ADCF4C FOREIGN KEY (rate_ffta_id) REFERENCES rate_ffta (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE member CHANGE place_of_birth place_of_birth VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE member_rate_ffta DROP FOREIGN KEY FK_BD9949A767ADCF4C');
        $this->addSql('DROP TABLE member_rate_ffta');
        $this->addSql('DROP TABLE rate_ffta');
        $this->addSql('ALTER TABLE member CHANGE place_of_birth place_of_birth VARCHAR(255) NOT NULL');
    }
}
