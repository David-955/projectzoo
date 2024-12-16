<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241216150956 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DDC35E566A FOREIGN KEY (family_id) REFERENCES family (id)');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DDD73E1E58 FOREIGN KEY (zoos_id) REFERENCES zoos (id)');
        $this->addSql('CREATE INDEX IDX_966C69DDC35E566A ON animals (family_id)');
        $this->addSql('CREATE INDEX IDX_966C69DDD73E1E58 ON animals (zoos_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DDC35E566A');
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DDD73E1E58');
        $this->addSql('DROP INDEX IDX_966C69DDC35E566A ON animals');
        $this->addSql('DROP INDEX IDX_966C69DDD73E1E58 ON animals');
    }
}
