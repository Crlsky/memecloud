<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200911070934 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('
            CREATE TABLE `user_settings` (
                `id_user` INT(11) NOT NULL,
                `theme_color` INT(11) NOT NULL,
                `bg_image` INT(11) NOT NULL,
                `show_directories` INT(11) NOT NULL,
                PRIMARY KEY (`id_user`) USING BTREE,
                INDEX `FK1_theme_color` (`theme_color`) USING BTREE,
                INDEX `FK2_bg_image` (`bg_image`) USING BTREE,
                CONSTRAINT `FK1_theme_color` FOREIGN KEY (`theme_color`) REFERENCES `memonator`.`color_palette` (`id`) ON UPDATE CASCADE ON DELETE RESTRICT,
                CONSTRAINT `FK2_bg_image` FOREIGN KEY (`bg_image`) REFERENCES `memonator`.`background_image` (`id`) ON UPDATE CASCADE ON DELETE RESTRICT
            )
            COLLATE=`utf8mb4_unicode_ci`
            ENGINE=InnoDB
        ');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_settings');
    }
}
