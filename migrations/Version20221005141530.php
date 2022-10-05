<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221005141530 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE applicant_project_tool (applicant_id INT NOT NULL, project_tool_id INT NOT NULL, INDEX IDX_29C7BC8997139001 (applicant_id), INDEX IDX_29C7BC8919652EA9 (project_tool_id), PRIMARY KEY(applicant_id, project_tool_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE applicant_project_tool ADD CONSTRAINT FK_29C7BC8997139001 FOREIGN KEY (applicant_id) REFERENCES applicant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE applicant_project_tool ADD CONSTRAINT FK_29C7BC8919652EA9 FOREIGN KEY (project_tool_id) REFERENCES project_tool (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE applicant_project_tool DROP FOREIGN KEY FK_29C7BC8997139001');
        $this->addSql('ALTER TABLE applicant_project_tool DROP FOREIGN KEY FK_29C7BC8919652EA9');
        $this->addSql('DROP TABLE applicant_project_tool');
    }
}
