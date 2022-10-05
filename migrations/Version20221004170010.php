<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221004170010 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE applicant_tool_measure (applicant_id INT NOT NULL, tool_measure_id INT NOT NULL, INDEX IDX_A4C65E2697139001 (applicant_id), INDEX IDX_A4C65E26D00E9581 (tool_measure_id), PRIMARY KEY(applicant_id, tool_measure_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE applicant_tool_measure ADD CONSTRAINT FK_A4C65E2697139001 FOREIGN KEY (applicant_id) REFERENCES applicant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE applicant_tool_measure ADD CONSTRAINT FK_A4C65E26D00E9581 FOREIGN KEY (tool_measure_id) REFERENCES tool_measure (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE applicant_tool_measure DROP FOREIGN KEY FK_A4C65E2697139001');
        $this->addSql('ALTER TABLE applicant_tool_measure DROP FOREIGN KEY FK_A4C65E26D00E9581');
        $this->addSql('DROP TABLE applicant_tool_measure');
    }
}
