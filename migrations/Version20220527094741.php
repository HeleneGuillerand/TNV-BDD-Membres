<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220527094741 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE member (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, date_of_birth DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', place_of_birth VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, zipcode SMALLINT NOT NULL, city VARCHAR(255) NOT NULL, first_phone SMALLINT DEFAULT NULL, second_phone SMALLINT DEFAULT NULL, mobile_phone SMALLINT DEFAULT NULL, first_email VARCHAR(400) NOT NULL, second_email VARCHAR(400) DEFAULT NULL, sponsor VARCHAR(400) NOT NULL, job VARCHAR(400) DEFAULT NULL, pouvoir_ag TINYINT(1) DEFAULT NULL, donation SMALLINT DEFAULT NULL, total_payed SMALLINT DEFAULT NULL, registered_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', first_registeration DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', fft_number INT DEFAULT NULL, ffta_number VARCHAR(255) DEFAULT NULL, fftpm_number VARCHAR(255) DEFAULT NULL, last_known_season VARCHAR(10) DEFAULT NULL, attestation TINYINT(1) DEFAULT NULL, second_club VARCHAR(500) DEFAULT NULL, status SMALLINT NOT NULL, note VARCHAR(500) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE member');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
