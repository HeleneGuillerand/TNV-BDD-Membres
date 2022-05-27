<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220527101016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE member_peculiarity (member_id INT NOT NULL, peculiarity_id INT NOT NULL, INDEX IDX_D90DD1507597D3FE (member_id), INDEX IDX_D90DD150882BA09 (peculiarity_id), PRIMARY KEY(member_id, peculiarity_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member_rate_fft (member_id INT NOT NULL, rate_fft_id INT NOT NULL, INDEX IDX_2BD1CBB77597D3FE (member_id), INDEX IDX_2BD1CBB7A6B7D58B (rate_fft_id), PRIMARY KEY(member_id, rate_fft_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE member_peculiarity ADD CONSTRAINT FK_D90DD1507597D3FE FOREIGN KEY (member_id) REFERENCES member (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE member_peculiarity ADD CONSTRAINT FK_D90DD150882BA09 FOREIGN KEY (peculiarity_id) REFERENCES peculiarity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE member_rate_fft ADD CONSTRAINT FK_2BD1CBB77597D3FE FOREIGN KEY (member_id) REFERENCES member (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE member_rate_fft ADD CONSTRAINT FK_2BD1CBB7A6B7D58B FOREIGN KEY (rate_fft_id) REFERENCES rate_fft (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE box ADD member_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE box ADD CONSTRAINT FK_8A9483A7597D3FE FOREIGN KEY (member_id) REFERENCES member (id)');
        $this->addSql('CREATE INDEX IDX_8A9483A7597D3FE ON box (member_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE member_peculiarity');
        $this->addSql('DROP TABLE member_rate_fft');
        $this->addSql('ALTER TABLE box DROP FOREIGN KEY FK_8A9483A7597D3FE');
        $this->addSql('DROP INDEX IDX_8A9483A7597D3FE ON box');
        $this->addSql('ALTER TABLE box DROP member_id');
    }
}
