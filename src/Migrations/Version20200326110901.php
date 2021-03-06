<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200326110901 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE legume_mois (legume_id INT NOT NULL, mois_id INT NOT NULL, INDEX IDX_25DAB1C325F18E37 (legume_id), INDEX IDX_25DAB1C3FA0749B8 (mois_id), PRIMARY KEY(legume_id, mois_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mois (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE legume_mois ADD CONSTRAINT FK_25DAB1C325F18E37 FOREIGN KEY (legume_id) REFERENCES legume (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE legume_mois ADD CONSTRAINT FK_25DAB1C3FA0749B8 FOREIGN KEY (mois_id) REFERENCES mois (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE legume CHANGE img img VARCHAR(255) DEFAULT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE variete CHANGE legume_id legume_id INT DEFAULT NULL, CHANGE quantites quantites INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE legume_mois DROP FOREIGN KEY FK_25DAB1C3FA0749B8');
        $this->addSql('DROP TABLE legume_mois');
        $this->addSql('DROP TABLE mois');
        $this->addSql('ALTER TABLE legume CHANGE img img VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'\'\'NULL\'\'\' COLLATE `utf8mb4_unicode_ci`, CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'\'\'NULL\'\'\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE variete CHANGE legume_id legume_id INT DEFAULT NULL, CHANGE quantites quantites INT DEFAULT NULL');
    }
}
