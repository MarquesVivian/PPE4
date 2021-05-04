<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210422143858 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ligne_produit (id INT AUTO_INCREMENT NOT NULL, id_panier_id INT NOT NULL, id_produit_id INT DEFAULT NULL, quantier INT DEFAULT NULL, prix_unitaire_produit NUMERIC(10, 2) DEFAULT NULL, INDEX IDX_B63CD21E77482E5B (id_panier_id), INDEX IDX_B63CD21EAABEFE2C (id_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, id_utilisateur_id INT NOT NULL, dateachat DATETIME NOT NULL, prix NUMERIC(10, 2) DEFAULT NULL, INDEX IDX_24CC0DF2C6EE5C49 (id_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, desciption VARCHAR(255) NOT NULL, prix NUMERIC(10, 2) NOT NULL, quantiter INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ligne_produit ADD CONSTRAINT FK_B63CD21E77482E5B FOREIGN KEY (id_panier_id) REFERENCES panier (id)');
        $this->addSql('ALTER TABLE ligne_produit ADD CONSTRAINT FK_B63CD21EAABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_produit DROP FOREIGN KEY FK_B63CD21E77482E5B');
        $this->addSql('ALTER TABLE ligne_produit DROP FOREIGN KEY FK_B63CD21EAABEFE2C');
        $this->addSql('DROP TABLE ligne_produit');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE produit');
    }
}
