<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241216142741 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE family (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mainlands (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zoos (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animals ADD family_id INT NOT NULL, ADD mainlands_id INT NOT NULL, ADD zoos_id INT NOT NULL, DROP mainlands, DROP family, DROP mainland');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DDC35E566A FOREIGN KEY (family_id) REFERENCES family (id)');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DDF162C9AF FOREIGN KEY (mainlands_id) REFERENCES mainlands (id)');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DDD73E1E58 FOREIGN KEY (zoos_id) REFERENCES zoos (id)');
        $this->addSql('CREATE INDEX IDX_966C69DDC35E566A ON animals (family_id)');
        $this->addSql('CREATE INDEX IDX_966C69DDF162C9AF ON animals (mainlands_id)');
        $this->addSql('CREATE INDEX IDX_966C69DDD73E1E58 ON animals (zoos_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DDC35E566A');
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DDF162C9AF');
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DDD73E1E58');
        $this->addSql('DROP TABLE family');
        $this->addSql('DROP TABLE mainlands');
        $this->addSql('DROP TABLE zoos');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('DROP INDEX IDX_966C69DDC35E566A ON animals');
        $this->addSql('DROP INDEX IDX_966C69DDF162C9AF ON animals');
        $this->addSql('DROP INDEX IDX_966C69DDD73E1E58 ON animals');
        $this->addSql('ALTER TABLE animals ADD mainlands VARCHAR(255) NOT NULL, ADD family VARCHAR(255) NOT NULL, ADD mainland VARCHAR(255) NOT NULL, DROP family_id, DROP mainlands_id, DROP zoos_id');
    }
}
