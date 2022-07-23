<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220723205230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurants ADD user_id VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE restaurants ALTER status TYPE SMALLINT');
        $this->addSql('ALTER TABLE restaurants ALTER status DROP DEFAULT');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE restaurants DROP user_id');
        $this->addSql('ALTER TABLE restaurants ALTER status TYPE SMALLINT');
        $this->addSql('ALTER TABLE restaurants ALTER status DROP DEFAULT');
    }
}
