<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221208155407 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cat_human (cat_id INT NOT NULL, human_id INT NOT NULL, INDEX IDX_19196518E6ADA943 (cat_id), INDEX IDX_191965188ABD4580 (human_id), PRIMARY KEY(cat_id, human_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cat_human ADD CONSTRAINT FK_19196518E6ADA943 FOREIGN KEY (cat_id) REFERENCES cat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cat_human ADD CONSTRAINT FK_191965188ABD4580 FOREIGN KEY (human_id) REFERENCES human (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cat_human DROP FOREIGN KEY FK_19196518E6ADA943');
        $this->addSql('ALTER TABLE cat_human DROP FOREIGN KEY FK_191965188ABD4580');
        $this->addSql('DROP TABLE cat_human');
    }
}
