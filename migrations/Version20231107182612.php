<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231107182612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cloth DROP FOREIGN KEY FK_22F16BBE1C69348D');
        $this->addSql('ALTER TABLE cloth DROP FOREIGN KEY FK_22F16BBEDB3A1DE1');
        $this->addSql('DROP INDEX IDX_22F16BBE1C69348D ON cloth');
        $this->addSql('DROP INDEX UNIQ_22F16BBEDB3A1DE1 ON cloth');
        $this->addSql('ALTER TABLE cloth ADD user_id INT DEFAULT NULL, ADD home_id INT DEFAULT NULL, DROP cloth_to_home_id, DROP cloths_user_id');
        $this->addSql('ALTER TABLE cloth ADD CONSTRAINT FK_22F16BBEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cloth ADD CONSTRAINT FK_22F16BBE28CDC89C FOREIGN KEY (home_id) REFERENCES home (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_22F16BBEA76ED395 ON cloth (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_22F16BBE28CDC89C ON cloth (home_id)');
        $this->addSql('ALTER TABLE user_home DROP FOREIGN KEY FK_B574019D2E6BA52');
        $this->addSql('ALTER TABLE user_home DROP FOREIGN KEY FK_B57401970C0D696');
        $this->addSql('DROP INDEX IDX_B57401970C0D696 ON user_home');
        $this->addSql('DROP INDEX IDX_B574019D2E6BA52 ON user_home');
        $this->addSql('ALTER TABLE user_home ADD user_id INT DEFAULT NULL, ADD home_id INT DEFAULT NULL, DROP user_home_id, DROP homes_user_id');
        $this->addSql('ALTER TABLE user_home ADD CONSTRAINT FK_B574019A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_home ADD CONSTRAINT FK_B57401928CDC89C FOREIGN KEY (home_id) REFERENCES home (id)');
        $this->addSql('CREATE INDEX IDX_B574019A76ED395 ON user_home (user_id)');
        $this->addSql('CREATE INDEX IDX_B57401928CDC89C ON user_home (home_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cloth DROP FOREIGN KEY FK_22F16BBEA76ED395');
        $this->addSql('ALTER TABLE cloth DROP FOREIGN KEY FK_22F16BBE28CDC89C');
        $this->addSql('DROP INDEX UNIQ_22F16BBEA76ED395 ON cloth');
        $this->addSql('DROP INDEX UNIQ_22F16BBE28CDC89C ON cloth');
        $this->addSql('ALTER TABLE cloth ADD cloth_to_home_id INT DEFAULT NULL, ADD cloths_user_id INT DEFAULT NULL, DROP user_id, DROP home_id');
        $this->addSql('ALTER TABLE cloth ADD CONSTRAINT FK_22F16BBE1C69348D FOREIGN KEY (cloths_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cloth ADD CONSTRAINT FK_22F16BBEDB3A1DE1 FOREIGN KEY (cloth_to_home_id) REFERENCES home (id)');
        $this->addSql('CREATE INDEX IDX_22F16BBE1C69348D ON cloth (cloths_user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_22F16BBEDB3A1DE1 ON cloth (cloth_to_home_id)');
        $this->addSql('ALTER TABLE user_home DROP FOREIGN KEY FK_B574019A76ED395');
        $this->addSql('ALTER TABLE user_home DROP FOREIGN KEY FK_B57401928CDC89C');
        $this->addSql('DROP INDEX IDX_B574019A76ED395 ON user_home');
        $this->addSql('DROP INDEX IDX_B57401928CDC89C ON user_home');
        $this->addSql('ALTER TABLE user_home ADD user_home_id INT DEFAULT NULL, ADD homes_user_id INT DEFAULT NULL, DROP user_id, DROP home_id');
        $this->addSql('ALTER TABLE user_home ADD CONSTRAINT FK_B574019D2E6BA52 FOREIGN KEY (homes_user_id) REFERENCES home (id)');
        $this->addSql('ALTER TABLE user_home ADD CONSTRAINT FK_B57401970C0D696 FOREIGN KEY (user_home_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_B57401970C0D696 ON user_home (user_home_id)');
        $this->addSql('CREATE INDEX IDX_B574019D2E6BA52 ON user_home (homes_user_id)');
    }
}
