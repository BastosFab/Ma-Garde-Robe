<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231107235437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cloth (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, home_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, color LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_22F16BBEA76ED395 (user_id), UNIQUE INDEX UNIQ_22F16BBE28CDC89C (home_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cloth ADD CONSTRAINT FK_22F16BBEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cloth ADD CONSTRAINT FK_22F16BBE28CDC89C FOREIGN KEY (home_id) REFERENCES home (id)');
        $this->addSql('ALTER TABLE clothes DROP FOREIGN KEY FK_3079B48C28CDC89C');
        $this->addSql('ALTER TABLE clothes DROP FOREIGN KEY FK_3079B48CA76ED395');
        $this->addSql('DROP TABLE clothes');
        $this->addSql('ALTER TABLE home DROP token');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE clothes (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, home_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, color LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_3079B48C28CDC89C (home_id), INDEX IDX_3079B48CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE clothes ADD CONSTRAINT FK_3079B48C28CDC89C FOREIGN KEY (home_id) REFERENCES home (id)');
        $this->addSql('ALTER TABLE clothes ADD CONSTRAINT FK_3079B48CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cloth DROP FOREIGN KEY FK_22F16BBEA76ED395');
        $this->addSql('ALTER TABLE cloth DROP FOREIGN KEY FK_22F16BBE28CDC89C');
        $this->addSql('DROP TABLE cloth');
        $this->addSql('ALTER TABLE home ADD token VARCHAR(255) NOT NULL');
    }
}
