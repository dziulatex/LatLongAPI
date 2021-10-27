<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211027161006 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE geolocation_zip_code ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE geolocation_zip_code MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE geolocation_zip_code DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE geolocation_zip_code DROP id');
        $this->addSql('ALTER TABLE geolocation_zip_code ADD PRIMARY KEY (zipcode)');
    }
}
