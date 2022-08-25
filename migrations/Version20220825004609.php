<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220825004609 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE oc_prescripteur_fonctions (id INT AUTO_INCREMENT NOT NULL, code_fonction VARCHAR(50) DEFAULT NULL, libelle_fonction VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oc_prescripteurs (id INT AUTO_INCREMENT NOT NULL, fonction_prescription_id INT NOT NULL, code_prescripteur VARCHAR(100) NOT NULL, nom_prescripteur VARCHAR(255) NOT NULL, prenom_prescripteur VARCHAR(255) NOT NULL, genre VARCHAR(20) NOT NULL, date_naiss_prescripteur DATE DEFAULT NULL, num_tel_prescripteur VARCHAR(50) DEFAULT NULL, photo_prescriteur LONGTEXT DEFAULT NULL, date_embauche DATE DEFAULT NULL, INDEX IDX_2FB6691B3EA3EC75 (fonction_prescription_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE oc_prescripteurs ADD CONSTRAINT FK_2FB6691B3EA3EC75 FOREIGN KEY (fonction_prescription_id) REFERENCES oc_prescripteur_fonctions (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE oc_prescripteurs DROP FOREIGN KEY FK_2FB6691B3EA3EC75');
        $this->addSql('DROP TABLE oc_prescripteur_fonctions');
        $this->addSql('DROP TABLE oc_prescripteurs');
    }
}
