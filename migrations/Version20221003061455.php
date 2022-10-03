<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221003061455 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE applicant DROP FOREIGN KEY FK_CAAD101919652EA9');
        $this->addSql('DROP TABLE project_tool');
        $this->addSql('DROP INDEX IDX_CAAD101919652EA9 ON applicant');
        $this->addSql('ALTER TABLE applicant DROP project_tool_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE project_tool (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, tool_measure VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE applicant ADD project_tool_id INT NOT NULL');
        $this->addSql('ALTER TABLE applicant ADD CONSTRAINT FK_CAAD101919652EA9 FOREIGN KEY (project_tool_id) REFERENCES project_tool (id)');
        $this->addSql('CREATE INDEX IDX_CAAD101919652EA9 ON applicant (project_tool_id)');
    }
}
