<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221208160548 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cat_human DROP FOREIGN KEY FK_191965188ABD4580');
        $this->addSql('ALTER TABLE cat_human DROP FOREIGN KEY FK_19196518E6ADA943');
        $this->addSql('DROP INDEX IDX_19196518E6ADA943 ON cat_human');
        $this->addSql('DROP INDEX IDX_191965188ABD4580 ON cat_human');
        $this->addSql('ALTER TABLE cat_human ADD id INT AUTO_INCREMENT NOT NULL, ADD master_id INT NOT NULL, ADD servant_id INT NOT NULL, ADD accomodations VARCHAR(255) NOT NULL, DROP cat_id, DROP human_id, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE cat_human ADD CONSTRAINT FK_1919651813B3DB11 FOREIGN KEY (master_id) REFERENCES cat (id)');
        $this->addSql('ALTER TABLE cat_human ADD CONSTRAINT FK_19196518113ADFC0 FOREIGN KEY (servant_id) REFERENCES human (id)');
        $this->addSql('CREATE INDEX IDX_1919651813B3DB11 ON cat_human (master_id)');
        $this->addSql('CREATE INDEX IDX_19196518113ADFC0 ON cat_human (servant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cat_human MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE cat_human DROP FOREIGN KEY FK_1919651813B3DB11');
        $this->addSql('ALTER TABLE cat_human DROP FOREIGN KEY FK_19196518113ADFC0');
        $this->addSql('DROP INDEX IDX_1919651813B3DB11 ON cat_human');
        $this->addSql('DROP INDEX IDX_19196518113ADFC0 ON cat_human');
        $this->addSql('DROP INDEX `PRIMARY` ON cat_human');
        $this->addSql('ALTER TABLE cat_human ADD cat_id INT NOT NULL, ADD human_id INT NOT NULL, DROP id, DROP master_id, DROP servant_id, DROP accomodations');
        $this->addSql('ALTER TABLE cat_human ADD CONSTRAINT FK_191965188ABD4580 FOREIGN KEY (human_id) REFERENCES human (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cat_human ADD CONSTRAINT FK_19196518E6ADA943 FOREIGN KEY (cat_id) REFERENCES cat (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_19196518E6ADA943 ON cat_human (cat_id)');
        $this->addSql('CREATE INDEX IDX_191965188ABD4580 ON cat_human (human_id)');
        $this->addSql('ALTER TABLE cat_human ADD PRIMARY KEY (cat_id, human_id)');
    }
}
