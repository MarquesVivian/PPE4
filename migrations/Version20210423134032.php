<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210423134032 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appartenir (id INT AUTO_INCREMENT NOT NULL, id_produit_categorie_id INT NOT NULL, id_categorie_produit_id INT DEFAULT NULL, INDEX IDX_A2A0D90C5AAE49F4 (id_produit_categorie_id), INDEX IDX_A2A0D90C9D0D45F3 (id_categorie_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appartenir ADD CONSTRAINT FK_A2A0D90C5AAE49F4 FOREIGN KEY (id_produit_categorie_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE appartenir ADD CONSTRAINT FK_A2A0D90C9D0D45F3 FOREIGN KEY (id_categorie_produit_id) REFERENCES categorie (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE appartenir');
    }
}
