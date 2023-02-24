<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230223164009 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE postlike (id INT AUTO_INCREMENT NOT NULL, post_id INT DEFAULT NULL, INDEX IDX_B84FD43A4B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE postlike ADD CONSTRAINT FK_B84FD43A4B89032C FOREIGN KEY (post_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE codecoupone ADD pourcentage_p INT NOT NULL');
        $this->addSql('ALTER TABLE promotion ADD vote INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE postlike');
        $this->addSql('ALTER TABLE codecoupone DROP pourcentage_p');
        $this->addSql('ALTER TABLE promotion DROP vote');
    }
}
