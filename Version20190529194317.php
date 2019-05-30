<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190529194317 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id VARCHAR(180) NOT NULL, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, username VARCHAR(30) NOT NULL, password VARCHAR(255) NOT NULL, city TINYTEXT NOT NULL, sex TINYTEXT NOT NULL, roles LONGTEXT NOT NULL, created_date DATETIME DEFAULT NULL, last_modified DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE users');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(30) DEFAULT NULL COLLATE latin1_swedish_ci, lastname VARCHAR(30) DEFAULT NULL COLLATE latin1_swedish_ci, username VARCHAR(30) DEFAULT NULL COLLATE latin1_swedish_ci, password VARCHAR(100) DEFAULT NULL COLLATE latin1_swedish_ci, city VARCHAR(30) DEFAULT NULL COLLATE latin1_swedish_ci, sex CHAR(1) DEFAULT NULL COLLATE latin1_swedish_ci, memo TEXT DEFAULT NULL COLLATE latin1_swedish_ci, roles TEXT DEFAULT NULL COLLATE latin1_swedish_ci, createdDate DATE DEFAULT NULL, lastModified TIME DEFAULT NULL, INDEX idx_sex (sex), INDEX idx_username (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE user');
    }
}
