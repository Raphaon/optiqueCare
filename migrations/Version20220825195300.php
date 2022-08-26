<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220825195300 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bulletin_examens (id INT AUTO_INCREMENT NOT NULL, consultation_id INT DEFAULT NULL, ref_bulletin_examen VARCHAR(50) NOT NULL, date_prescription DATE NOT NULL, observation LONGTEXT DEFAULT NULL, INDEX IDX_B130A61162FF6CDF (consultation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bulletin_examens_oc_examens (bulletin_examens_id INT NOT NULL, oc_examens_id INT NOT NULL, INDEX IDX_99191E27A5212705 (bulletin_examens_id), INDEX IDX_99191E278659B99F (oc_examens_id), PRIMARY KEY(bulletin_examens_id, oc_examens_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bulletin_prescriptions (id INT AUTO_INCREMENT NOT NULL, consultation_id INT DEFAULT NULL, date_prescription DATE NOT NULL, posologie LONGTEXT DEFAULT NULL, INDEX IDX_D33ECEC762FF6CDF (consultation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bulletin_prescriptions_oc_produits (bulletin_prescriptions_id INT NOT NULL, oc_produits_id INT NOT NULL, INDEX IDX_3671A94366B9A24D (bulletin_prescriptions_id), INDEX IDX_3671A94350B222D6 (oc_produits_id), PRIMARY KEY(bulletin_prescriptions_id, oc_produits_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oc_consultation (id INT AUTO_INCREMENT NOT NULL, patient_id INT DEFAULT NULL, prescripteur_id INT DEFAULT NULL, date_consultation DATE NOT NULL, histoire_maladie LONGTEXT DEFAULT NULL, plaintes LONGTEXT DEFAULT NULL, antecedants_patient LONGTEXT DEFAULT NULL, antecedants_familiaux LONGTEXT DEFAULT NULL, diagnostic_patient LONGTEXT DEFAULT NULL, bilan_consultation LONGTEXT DEFAULT NULL, date_prochain_rdv DATE DEFAULT NULL, INDEX IDX_F2B08EE66B899279 (patient_id), INDEX IDX_F2B08EE6D486E642 (prescripteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oc_patient_parameters (id INT AUTO_INCREMENT NOT NULL, patient_id INT DEFAULT NULL, aog VARCHAR(10) DEFAULT NULL, aod VARCHAR(10) DEFAULT NULL, aodg VARCHAR(10) DEFAULT NULL, poid DOUBLE PRECISION DEFAULT NULL, taille DOUBLE PRECISION DEFAULT NULL, ddr DATE DEFAULT NULL, poue VARCHAR(10) DEFAULT NULL, tabg DOUBLE PRECISION DEFAULT NULL, tabd DOUBLE PRECISION DEFAULT NULL, p VARCHAR(10) DEFAULT NULL, INDEX IDX_2408FFEB6B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oc_produit_lunettes (id INT AUTO_INCREMENT NOT NULL, ref_produit_id INT DEFAULT NULL, modele_verre VARCHAR(100) DEFAULT NULL, grandeur_verre VARCHAR(5) DEFAULT NULL, sphere_r DOUBLE PRECISION DEFAULT NULL, cylindre_r DOUBLE PRECISION DEFAULT NULL, axe_r DOUBLE PRECISION DEFAULT NULL, add_r DOUBLE PRECISION DEFAULT NULL, pd_r DOUBLE PRECISION DEFAULT NULL, visus_r VARCHAR(10) DEFAULT NULL, sphere_l DOUBLE PRECISION DEFAULT NULL, cylindre_l DOUBLE PRECISION DEFAULT NULL, axe_l DOUBLE PRECISION DEFAULT NULL, add_l DOUBLE PRECISION DEFAULT NULL, pd_l DOUBLE PRECISION DEFAULT NULL, grandeur_l DOUBLE PRECISION DEFAULT NULL, visus_l VARCHAR(10) DEFAULT NULL, UNIQUE INDEX UNIQ_EF5E2D909F191E5 (ref_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oc_produit_medicaments (id INT AUTO_INCREMENT NOT NULL, ref_produit_id INT DEFAULT NULL, ref_medoc VARCHAR(50) NOT NULL, date_exp DATE NOT NULL, num_lot VARCHAR(50) NOT NULL, date_achat DATE NOT NULL, UNIQUE INDEX UNIQ_FE7C8E5C9F191E5 (ref_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oc_produits (id INT AUTO_INCREMENT NOT NULL, type_prod_id INT DEFAULT NULL, ref_prod VARCHAR(50) NOT NULL, libelle_prod VARCHAR(255) NOT NULL, prix_achat DOUBLE PRECISION DEFAULT NULL, prix_vente DOUBLE PRECISION DEFAULT NULL, marque_prod VARCHAR(255) DEFAULT NULL, description_prod LONGTEXT DEFAULT NULL, couleurs_prod VARCHAR(30) DEFAULT NULL, INDEX IDX_E49FE22329E95080 (type_prod_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bulletin_examens ADD CONSTRAINT FK_B130A61162FF6CDF FOREIGN KEY (consultation_id) REFERENCES oc_consultation (id)');
        $this->addSql('ALTER TABLE bulletin_examens_oc_examens ADD CONSTRAINT FK_99191E27A5212705 FOREIGN KEY (bulletin_examens_id) REFERENCES bulletin_examens (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bulletin_examens_oc_examens ADD CONSTRAINT FK_99191E278659B99F FOREIGN KEY (oc_examens_id) REFERENCES oc_examens (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bulletin_prescriptions ADD CONSTRAINT FK_D33ECEC762FF6CDF FOREIGN KEY (consultation_id) REFERENCES oc_consultation (id)');
        $this->addSql('ALTER TABLE bulletin_prescriptions_oc_produits ADD CONSTRAINT FK_3671A94366B9A24D FOREIGN KEY (bulletin_prescriptions_id) REFERENCES bulletin_prescriptions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bulletin_prescriptions_oc_produits ADD CONSTRAINT FK_3671A94350B222D6 FOREIGN KEY (oc_produits_id) REFERENCES oc_produits (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE oc_consultation ADD CONSTRAINT FK_F2B08EE66B899279 FOREIGN KEY (patient_id) REFERENCES oc_patients (id)');
        $this->addSql('ALTER TABLE oc_consultation ADD CONSTRAINT FK_F2B08EE6D486E642 FOREIGN KEY (prescripteur_id) REFERENCES oc_prescripteurs (id)');
        $this->addSql('ALTER TABLE oc_patient_parameters ADD CONSTRAINT FK_2408FFEB6B899279 FOREIGN KEY (patient_id) REFERENCES oc_patients (id)');
        $this->addSql('ALTER TABLE oc_produit_lunettes ADD CONSTRAINT FK_EF5E2D909F191E5 FOREIGN KEY (ref_produit_id) REFERENCES oc_produits (id)');
        $this->addSql('ALTER TABLE oc_produit_medicaments ADD CONSTRAINT FK_FE7C8E5C9F191E5 FOREIGN KEY (ref_produit_id) REFERENCES oc_produits (id)');
        $this->addSql('ALTER TABLE oc_produits ADD CONSTRAINT FK_E49FE22329E95080 FOREIGN KEY (type_prod_id) REFERENCES oc_type_produit (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bulletin_examens DROP FOREIGN KEY FK_B130A61162FF6CDF');
        $this->addSql('ALTER TABLE bulletin_examens_oc_examens DROP FOREIGN KEY FK_99191E27A5212705');
        $this->addSql('ALTER TABLE bulletin_examens_oc_examens DROP FOREIGN KEY FK_99191E278659B99F');
        $this->addSql('ALTER TABLE bulletin_prescriptions DROP FOREIGN KEY FK_D33ECEC762FF6CDF');
        $this->addSql('ALTER TABLE bulletin_prescriptions_oc_produits DROP FOREIGN KEY FK_3671A94366B9A24D');
        $this->addSql('ALTER TABLE bulletin_prescriptions_oc_produits DROP FOREIGN KEY FK_3671A94350B222D6');
        $this->addSql('ALTER TABLE oc_consultation DROP FOREIGN KEY FK_F2B08EE66B899279');
        $this->addSql('ALTER TABLE oc_consultation DROP FOREIGN KEY FK_F2B08EE6D486E642');
        $this->addSql('ALTER TABLE oc_patient_parameters DROP FOREIGN KEY FK_2408FFEB6B899279');
        $this->addSql('ALTER TABLE oc_produit_lunettes DROP FOREIGN KEY FK_EF5E2D909F191E5');
        $this->addSql('ALTER TABLE oc_produit_medicaments DROP FOREIGN KEY FK_FE7C8E5C9F191E5');
        $this->addSql('ALTER TABLE oc_produits DROP FOREIGN KEY FK_E49FE22329E95080');
        $this->addSql('DROP TABLE bulletin_examens');
        $this->addSql('DROP TABLE bulletin_examens_oc_examens');
        $this->addSql('DROP TABLE bulletin_prescriptions');
        $this->addSql('DROP TABLE bulletin_prescriptions_oc_produits');
        $this->addSql('DROP TABLE oc_consultation');
        $this->addSql('DROP TABLE oc_patient_parameters');
        $this->addSql('DROP TABLE oc_produit_lunettes');
        $this->addSql('DROP TABLE oc_produit_medicaments');
        $this->addSql('DROP TABLE oc_produits');
    }
}
