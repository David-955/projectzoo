<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241217112049 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animals (id INT AUTO_INCREMENT NOT NULL, family_id INT NOT NULL, mainlands_id INT NOT NULL, zoos_id INT NOT NULL, name VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, dangerous TINYINT(1) NOT NULL, INDEX IDX_966C69DDC35E566A (family_id), INDEX IDX_966C69DDF162C9AF (mainlands_id), INDEX IDX_966C69DDD73E1E58 (zoos_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DDC35E566A FOREIGN KEY (family_id) REFERENCES family (id)');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DDF162C9AF FOREIGN KEY (mainlands_id) REFERENCES mainlands (id)');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DDD73E1E58 FOREIGN KEY (zoos_id) REFERENCES zoos (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DDC35E566A');
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DDF162C9AF');
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DDD73E1E58');
        $this->addSql('DROP TABLE animals');
        $this->addSql('DROP TABLE user');
    }
}
