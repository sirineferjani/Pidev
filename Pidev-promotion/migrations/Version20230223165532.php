<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230223165532 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE codecoupone (id INT AUTO_INCREMENT NOT NULL, id_c INT NOT NULL, code VARCHAR(255) NOT NULL, pourcentage_p INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE postlike (id INT AUTO_INCREMENT NOT NULL, post_id INT DEFAULT NULL, INDEX IDX_B84FD43A4B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, codecoupone_id INT DEFAULT NULL, dated DATE NOT NULL, datef DATE NOT NULL, description VARCHAR(255) NOT NULL, pourcentage INT NOT NULL, vote INT NOT NULL, INDEX IDX_C11D7DD1F9D9603A (codecoupone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE postlike ADD CONSTRAINT FK_B84FD43A4B89032C FOREIGN KEY (post_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1F9D9603A FOREIGN KEY (codecoupone_id) REFERENCES codecoupone (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1F9D9603A');
        $this->addSql('ALTER TABLE postlike DROP FOREIGN KEY FK_B84FD43A4B89032C');
        $this->addSql('DROP TABLE codecoupone');
        $this->addSql('DROP TABLE postlike');
        $this->addSql('DROP TABLE promotion');
    }
}
