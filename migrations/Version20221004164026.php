<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20221004164026 extends AbstractMigration
{
    // Creates table project_tool and tool_measure with OneToMany
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE project_tool (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tool_measure (id INT AUTO_INCREMENT NOT NULL, project_tool_id INT NOT NULL, title VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_9463146619652EA9 (project_tool_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tool_measure ADD CONSTRAINT FK_9463146619652EA9 FOREIGN KEY (project_tool_id) REFERENCES project_tool (id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE tool_measure DROP FOREIGN KEY FK_9463146619652EA9');
        $this->addSql('DROP TABLE project_tool');
        $this->addSql('DROP TABLE tool_measure');
    }
}
