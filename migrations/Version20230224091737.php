<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230224091737 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agence ADD activites_id INT DEFAULT NULL, ADD activite_id INT NOT NULL');
        $this->addSql('ALTER TABLE agence ADD CONSTRAINT FK_64C19AA95B8C31B7 FOREIGN KEY (activites_id) REFERENCES activite (id)');
        $this->addSql('ALTER TABLE agence ADD CONSTRAINT FK_64C19AA99B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id)');
        $this->addSql('CREATE INDEX IDX_64C19AA95B8C31B7 ON agence (activites_id)');
        $this->addSql('CREATE INDEX IDX_64C19AA99B0F88B1 ON agence (activite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agence DROP FOREIGN KEY FK_64C19AA95B8C31B7');
        $this->addSql('ALTER TABLE agence DROP FOREIGN KEY FK_64C19AA99B0F88B1');
        $this->addSql('DROP INDEX IDX_64C19AA95B8C31B7 ON agence');
        $this->addSql('DROP INDEX IDX_64C19AA99B0F88B1 ON agence');
        $this->addSql('ALTER TABLE agence DROP activites_id, DROP activite_id');
    }
}
