<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230112154232 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animal (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, latin_name VARCHAR(255) NOT NULL, vernacular_name VARCHAR(255) NOT NULL, arrival_date DATE NOT NULL, departure_date DATE DEFAULT NULL, comment LONGTEXT DEFAULT NULL, photo LONGTEXT DEFAULT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE animal_animal_keeper (animal_id INT NOT NULL, animal_keeper_id INT NOT NULL, INDEX IDX_EC87B26D8E962C16 (animal_id), INDEX IDX_EC87B26D83D86AEC (animal_keeper_id), PRIMARY KEY(animal_id, animal_keeper_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE animal_keeper (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE care (id INT AUTO_INCREMENT NOT NULL, animal_id INT NOT NULL, animal_keeper_id INT NOT NULL, date DATETIME NOT NULL, description LONGTEXT NOT NULL, result LONGTEXT DEFAULT NULL, INDEX IDX_6113A8458E962C16 (animal_id), INDEX IDX_6113A84583D86AEC (animal_keeper_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE refuge (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, street VARCHAR(255) DEFAULT NULL, postal_code VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, phone VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animal_animal_keeper ADD CONSTRAINT FK_EC87B26D8E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animal_animal_keeper ADD CONSTRAINT FK_EC87B26D83D86AEC FOREIGN KEY (animal_keeper_id) REFERENCES animal_keeper (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE care ADD CONSTRAINT FK_6113A8458E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE care ADD CONSTRAINT FK_6113A84583D86AEC FOREIGN KEY (animal_keeper_id) REFERENCES animal_keeper (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal_animal_keeper DROP FOREIGN KEY FK_EC87B26D8E962C16');
        $this->addSql('ALTER TABLE animal_animal_keeper DROP FOREIGN KEY FK_EC87B26D83D86AEC');
        $this->addSql('ALTER TABLE care DROP FOREIGN KEY FK_6113A8458E962C16');
        $this->addSql('ALTER TABLE care DROP FOREIGN KEY FK_6113A84583D86AEC');
        $this->addSql('DROP TABLE animal');
        $this->addSql('DROP TABLE animal_animal_keeper');
        $this->addSql('DROP TABLE animal_keeper');
        $this->addSql('DROP TABLE care');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE refuge');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
