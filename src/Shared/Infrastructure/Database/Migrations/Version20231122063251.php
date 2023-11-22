<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231122063251 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tasks DROP CONSTRAINT fk_505865977e3c61f9');
        $this->addSql('DROP INDEX idx_505865977e3c61f9');
        $this->addSql('ALTER TABLE tasks DROP owner_id');
        $this->addSql('ALTER TABLE tasks ALTER completed_at DROP NOT NULL');
        $this->addSql('ALTER TABLE tasks ADD CONSTRAINT FK_50586597A76ED395 FOREIGN KEY (user_id) REFERENCES users_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_50586597A76ED395 ON tasks (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE tasks DROP CONSTRAINT FK_50586597A76ED395');
        $this->addSql('DROP INDEX IDX_50586597A76ED395');
        $this->addSql('ALTER TABLE tasks ADD owner_id VARCHAR(26) NOT NULL');
        $this->addSql('ALTER TABLE tasks ALTER completed_at SET NOT NULL');
        $this->addSql('ALTER TABLE tasks ADD CONSTRAINT fk_505865977e3c61f9 FOREIGN KEY (owner_id) REFERENCES users_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_505865977e3c61f9 ON tasks (owner_id)');
    }
}
