<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231108112412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE invitation DROP FOREIGN KEY FK_F11D61A2A76ED395');
        $this->addSql('DROP INDEX UNIQ_F11D61A2A76ED395 ON invitation');
        $this->addSql('ALTER TABLE invitation CHANGE user_id user_invitation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE invitation ADD CONSTRAINT FK_F11D61A24DD3D7A0 FOREIGN KEY (user_invitation_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F11D61A24DD3D7A0 ON invitation (user_invitation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE invitation DROP FOREIGN KEY FK_F11D61A24DD3D7A0');
        $this->addSql('DROP INDEX UNIQ_F11D61A24DD3D7A0 ON invitation');
        $this->addSql('ALTER TABLE invitation CHANGE user_invitation_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE invitation ADD CONSTRAINT FK_F11D61A2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F11D61A2A76ED395 ON invitation (user_id)');
    }
}
