<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230215232324 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animal (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, latin_name VARCHAR(255) NOT NULL, vernacular_name VARCHAR(255) NOT NULL, arrival_date DATE NOT NULL, departure_date DATE DEFAULT NULL, comment LONGTEXT DEFAULT NULL, photo LONGTEXT DEFAULT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE care (id INT AUTO_INCREMENT NOT NULL, animal_id INT NOT NULL, user_id INT DEFAULT NULL, date DATETIME NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_6113A8458E962C16 (animal_id), INDEX IDX_6113A845A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE care_type_of_care (care_id INT NOT NULL, type_of_care_id INT NOT NULL, INDEX IDX_613800F0F270FD45 (care_id), INDEX IDX_613800F01206DAD1 (type_of_care_id), PRIMARY KEY(care_id, type_of_care_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE follow_up (id INT AUTO_INCREMENT NOT NULL, animal_id INT NOT NULL, user_id INT DEFAULT NULL, date DATETIME NOT NULL, weight INT DEFAULT NULL, size INT DEFAULT NULL, health_status VARCHAR(255) DEFAULT NULL, observations LONGTEXT DEFAULT NULL, INDEX IDX_7BBC5A9C8E962C16 (animal_id), INDEX IDX_7BBC5A9CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, phone VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE refuge (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, street VARCHAR(255) DEFAULT NULL, postal_code VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, phone VARCHAR(50) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_of_care (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE care ADD CONSTRAINT FK_6113A8458E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE care ADD CONSTRAINT FK_6113A845A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE care_type_of_care ADD CONSTRAINT FK_613800F0F270FD45 FOREIGN KEY (care_id) REFERENCES care (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE care_type_of_care ADD CONSTRAINT FK_613800F01206DAD1 FOREIGN KEY (type_of_care_id) REFERENCES type_of_care (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE follow_up ADD CONSTRAINT FK_7BBC5A9C8E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE follow_up ADD CONSTRAINT FK_7BBC5A9CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE care DROP FOREIGN KEY FK_6113A8458E962C16');
        $this->addSql('ALTER TABLE care DROP FOREIGN KEY FK_6113A845A76ED395');
        $this->addSql('ALTER TABLE care_type_of_care DROP FOREIGN KEY FK_613800F0F270FD45');
        $this->addSql('ALTER TABLE care_type_of_care DROP FOREIGN KEY FK_613800F01206DAD1');
        $this->addSql('ALTER TABLE follow_up DROP FOREIGN KEY FK_7BBC5A9C8E962C16');
        $this->addSql('ALTER TABLE follow_up DROP FOREIGN KEY FK_7BBC5A9CA76ED395');
        $this->addSql('DROP TABLE animal');
        $this->addSql('DROP TABLE care');
        $this->addSql('DROP TABLE care_type_of_care');
        $this->addSql('DROP TABLE follow_up');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE refuge');
        $this->addSql('DROP TABLE type_of_care');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
