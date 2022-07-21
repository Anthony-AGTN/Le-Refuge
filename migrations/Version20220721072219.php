<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220721072219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animal_animal_keeper (animal_id INT NOT NULL, animal_keeper_id INT NOT NULL, INDEX IDX_EC87B26D8E962C16 (animal_id), INDEX IDX_EC87B26D83D86AEC (animal_keeper_id), PRIMARY KEY(animal_id, animal_keeper_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animal_animal_keeper ADD CONSTRAINT FK_EC87B26D8E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animal_animal_keeper ADD CONSTRAINT FK_EC87B26D83D86AEC FOREIGN KEY (animal_keeper_id) REFERENCES animal_keeper (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE animal_animal_keeper');
    }
}
