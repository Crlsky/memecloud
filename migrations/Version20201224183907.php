<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201224183907 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE memes ADD doubled INT NOT NULL');
        $this->addSql('ALTER TABLE user_settings DROP FOREIGN KEY FK1_theme_color');
        $this->addSql('ALTER TABLE user_settings DROP FOREIGN KEY FK2_bg_image');
        $this->addSql('DROP INDEX FK2_bg_image ON user_settings');
        $this->addSql('DROP INDEX FK1_theme_color ON user_settings');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE memes DROP doubled');
        $this->addSql('ALTER TABLE user_settings ADD CONSTRAINT FK1_theme_color FOREIGN KEY (theme_color) REFERENCES color_palette (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE user_settings ADD CONSTRAINT FK2_bg_image FOREIGN KEY (bg_image) REFERENCES background_image (id) ON UPDATE CASCADE');
        $this->addSql('CREATE INDEX FK2_bg_image ON user_settings (bg_image)');
        $this->addSql('CREATE INDEX FK1_theme_color ON user_settings (theme_color)');
    }
}
