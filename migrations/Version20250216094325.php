<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250216094325 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE film_category DROP FOREIGN KEY FK_A4CBD6A812469DE2');
        $this->addSql('ALTER TABLE film_category DROP FOREIGN KEY FK_A4CBD6A8567F5183');
        $this->addSql('DROP TABLE film_category');
        $this->addSql('ALTER TABLE category ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE film_category (category_id INT NOT NULL, film_id INT NOT NULL, INDEX IDX_A4CBD6A812469DE2 (category_id), INDEX IDX_A4CBD6A8567F5183 (film_id), PRIMARY KEY(category_id, film_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE film_category ADD CONSTRAINT FK_A4CBD6A812469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film_category ADD CONSTRAINT FK_A4CBD6A8567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category DROP created_at, DROP updated_at');
    }
}
