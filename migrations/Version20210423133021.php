<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210423133021 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ligne_du_pagnier (id INT AUTO_INCREMENT NOT NULL, id_panier_id INT NOT NULL, id_produit_id INT NOT NULL, quantiter INT NOT NULL, prix_unitaire NUMERIC(10, 2) NOT NULL, INDEX IDX_D0B41D7577482E5B (id_panier_id), INDEX IDX_D0B41D75AABEFE2C (id_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ligne_du_pagnier ADD CONSTRAINT FK_D0B41D7577482E5B FOREIGN KEY (id_panier_id) REFERENCES panier (id)');
        $this->addSql('ALTER TABLE ligne_du_pagnier ADD CONSTRAINT FK_D0B41D75AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('DROP TABLE ligne_panier');
        $this->addSql('ALTER TABLE panier ADD id_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF279F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_24CC0DF279F37AE5 ON panier (id_user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ligne_panier (id INT AUTO_INCREMENT NOT NULL, id_panier_id INT NOT NULL, id_produit_id INT NOT NULL, quantiter INT NOT NULL, prix_unitaire_produit NUMERIC(10, 2) NOT NULL, INDEX IDX_21691B4AABEFE2C (id_produit_id), INDEX IDX_21691B477482E5B (id_panier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ligne_panier ADD CONSTRAINT FK_21691B477482E5B FOREIGN KEY (id_panier_id) REFERENCES panier (id)');
        $this->addSql('ALTER TABLE ligne_panier ADD CONSTRAINT FK_21691B4AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('DROP TABLE ligne_du_pagnier');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF279F37AE5');
        $this->addSql('DROP INDEX IDX_24CC0DF279F37AE5 ON panier');
        $this->addSql('ALTER TABLE panier DROP id_user_id');
    }
}
