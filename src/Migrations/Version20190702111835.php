<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190702111835 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE resultado (id INT AUTO_INCREMENT NOT NULL, equipolocal_id INT NOT NULL, equipo_id INT NOT NULL, puntoslocal INT NOT NULL, puntosvisitante INT NOT NULL, cancha VARCHAR(255) NOT NULL, fecha DATETIME NOT NULL, INDEX IDX_B2ED91C643C565E (equipolocal_id), INDEX IDX_B2ED91C23BFBED (equipo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipo (id INT AUTO_INCREMENT NOT NULL, categoria VARCHAR(255) NOT NULL, sexo VARCHAR(255) NOT NULL, num_jugadores INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE resultado ADD CONSTRAINT FK_B2ED91C643C565E FOREIGN KEY (equipolocal_id) REFERENCES equipo (id)');
        $this->addSql('ALTER TABLE resultado ADD CONSTRAINT FK_B2ED91C23BFBED FOREIGN KEY (equipo_id) REFERENCES equipo (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE resultado DROP FOREIGN KEY FK_B2ED91C643C565E');
        $this->addSql('ALTER TABLE resultado DROP FOREIGN KEY FK_B2ED91C23BFBED');
        $this->addSql('DROP TABLE resultado');
        $this->addSql('DROP TABLE equipo');
    }
}
