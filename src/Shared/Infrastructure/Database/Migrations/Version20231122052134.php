<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231122052134 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE tasks_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE tasks (id INT NOT NULL, owner_id VARCHAR(26) NOT NULL, status public."task_status" DEFAULT \'todo\' NOT NULL, priority public."task_priority" DEFAULT \'5\' NOT NULL, title VARCHAR(30) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, completed_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, user_id VARCHAR(26) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_505865977E3C61F9 ON tasks (owner_id)');
        $this->addSql('COMMENT ON COLUMN tasks.status IS \'(DC2Type:task_status)\'');
        $this->addSql('COMMENT ON COLUMN tasks.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN tasks.completed_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE users_user (id VARCHAR(26) NOT NULL, email VARCHAR(180) NOT NULL, phone VARCHAR(12) DEFAULT NULL, password VARCHAR(20) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_421A9847E7927C74 ON users_user (email)');
        $this->addSql('ALTER TABLE tasks ADD CONSTRAINT FK_505865977E3C61F9 FOREIGN KEY (owner_id) REFERENCES users_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE tasks_id_seq CASCADE');
        $this->addSql('ALTER TABLE tasks DROP CONSTRAINT FK_505865977E3C61F9');
        $this->addSql('DROP TABLE tasks');
        $this->addSql('DROP TABLE users_user');
    }
}
