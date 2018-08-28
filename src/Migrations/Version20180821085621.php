<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180821085621 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE body_type (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body_type VARCHAR(48) NOT NULL)');
        $this->addSql('CREATE TABLE car (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, model_id_id INTEGER NOT NULL, body_type_id_id INTEGER DEFAULT NULL, color_id_id INTEGER DEFAULT NULL, drive_type_id_id INTEGER DEFAULT NULL, fuel_type_id_id INTEGER DEFAULT NULL, transmission_id_id INTEGER DEFAULT NULL, owner_id INTEGER DEFAULT NULL, vin VARCHAR(48) NOT NULL, build_date DATE DEFAULT NULL, model_year DATE DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_773DE69D4107BEA0 ON car (model_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69DE90F9FD3 ON car (body_type_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69DE88CCE5 ON car (color_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69D5EFE7174 ON car (drive_type_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69D9EDB5F2E ON car (fuel_type_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69D5B9F8241 ON car (transmission_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69D7E3C61F9 ON car (owner_id)');
        $this->addSql('CREATE TABLE client (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, first_name VARCHAR(48) NOT NULL, last_name VARCHAR(48) NOT NULL)');
        $this->addSql('CREATE TABLE color (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, color VARCHAR(48) NOT NULL)');
        $this->addSql('CREATE TABLE drive_type (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, drive_type VARCHAR(48) NOT NULL)');
        $this->addSql('CREATE TABLE fuel_type (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fuel_type VARCHAR(48) NOT NULL)');
        $this->addSql('CREATE TABLE make (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, make VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE model (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, make_id_id INTEGER NOT NULL, model VARCHAR(48) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_D79572D99C3A7E96 ON model (make_id_id)');
        $this->addSql('CREATE TABLE phone_number (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id_id INTEGER NOT NULL, number VARCHAR(48) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_6B01BC5BDC2902E0 ON phone_number (client_id_id)');
        $this->addSql('CREATE TABLE transmission (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, transmission VARCHAR(48) NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE body_type');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE drive_type');
        $this->addSql('DROP TABLE fuel_type');
        $this->addSql('DROP TABLE make');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE phone_number');
        $this->addSql('DROP TABLE transmission');
    }
}
