<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190504090928 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lien DROP FOREIGN KEY FK_A532B4B5CCD7E912');
        $this->addSql('DROP INDEX IDX_A532B4B5CCD7E912 ON lien');
        $this->addSql('ALTER TABLE lien DROP menu_id');
        $this->addSql('ALTER TABLE menu ADD titre VARCHAR(255) NOT NULL, ADD url VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lien ADD menu_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lien ADD CONSTRAINT FK_A532B4B5CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('CREATE INDEX IDX_A532B4B5CCD7E912 ON lien (menu_id)');
        $this->addSql('ALTER TABLE menu DROP titre, DROP url');
    }
}
