<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180821154028 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__body_type AS SELECT id, body_type FROM body_type');
        $this->addSql('DROP TABLE body_type');
        $this->addSql('CREATE TABLE body_type (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body_type VARCHAR(48) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO body_type (id, body_type) SELECT id, body_type FROM __temp__body_type');
        $this->addSql('DROP TABLE __temp__body_type');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D95AEB4BD95AEB4B ON body_type (body_type)');
        $this->addSql('DROP INDEX IDX_773DE69D4107BEA0');
        $this->addSql('DROP INDEX IDX_773DE69DE90F9FD3');
        $this->addSql('DROP INDEX IDX_773DE69DE88CCE5');
        $this->addSql('DROP INDEX IDX_773DE69D5EFE7174');
        $this->addSql('DROP INDEX IDX_773DE69D9EDB5F2E');
        $this->addSql('DROP INDEX IDX_773DE69D5B9F8241');
        $this->addSql('DROP INDEX IDX_773DE69D7E3C61F9');
        $this->addSql('CREATE TEMPORARY TABLE __temp__car AS SELECT id, model_id_id, body_type_id_id, color_id_id, drive_type_id_id, fuel_type_id_id, transmission_id_id, owner_id, vin, build_date, model_year FROM car');
        $this->addSql('DROP TABLE car');
        $this->addSql('CREATE TABLE car (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, model_id_id INTEGER NOT NULL, body_type_id_id INTEGER DEFAULT NULL, color_id_id INTEGER DEFAULT NULL, drive_type_id_id INTEGER DEFAULT NULL, fuel_type_id_id INTEGER DEFAULT NULL, transmission_id_id INTEGER DEFAULT NULL, owner_id INTEGER DEFAULT NULL, vin VARCHAR(48) NOT NULL COLLATE BINARY, build_date DATE DEFAULT NULL, model_year DATE DEFAULT NULL, CONSTRAINT FK_773DE69D4107BEA0 FOREIGN KEY (model_id_id) REFERENCES model (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_773DE69DE90F9FD3 FOREIGN KEY (body_type_id_id) REFERENCES body_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_773DE69DE88CCE5 FOREIGN KEY (color_id_id) REFERENCES color (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_773DE69D5EFE7174 FOREIGN KEY (drive_type_id_id) REFERENCES drive_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_773DE69D9EDB5F2E FOREIGN KEY (fuel_type_id_id) REFERENCES fuel_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_773DE69D5B9F8241 FOREIGN KEY (transmission_id_id) REFERENCES transmission (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_773DE69D7E3C61F9 FOREIGN KEY (owner_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO car (id, model_id_id, body_type_id_id, color_id_id, drive_type_id_id, fuel_type_id_id, transmission_id_id, owner_id, vin, build_date, model_year) SELECT id, model_id_id, body_type_id_id, color_id_id, drive_type_id_id, fuel_type_id_id, transmission_id_id, owner_id, vin, build_date, model_year FROM __temp__car');
        $this->addSql('DROP TABLE __temp__car');
        $this->addSql('CREATE INDEX IDX_773DE69D4107BEA0 ON car (model_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69DE90F9FD3 ON car (body_type_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69DE88CCE5 ON car (color_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69D5EFE7174 ON car (drive_type_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69D9EDB5F2E ON car (fuel_type_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69D5B9F8241 ON car (transmission_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69D7E3C61F9 ON car (owner_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_773DE69DB1085141 ON car (vin)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__color AS SELECT id, color FROM color');
        $this->addSql('DROP TABLE color');
        $this->addSql('CREATE TABLE color (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, color VARCHAR(48) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO color (id, color) SELECT id, color FROM __temp__color');
        $this->addSql('DROP TABLE __temp__color');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_665648E9665648E9 ON color (color)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__drive_type AS SELECT id, drive_type FROM drive_type');
        $this->addSql('DROP TABLE drive_type');
        $this->addSql('CREATE TABLE drive_type (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, drive_type VARCHAR(48) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO drive_type (id, drive_type) SELECT id, drive_type FROM __temp__drive_type');
        $this->addSql('DROP TABLE __temp__drive_type');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EA2F3768EA2F3768 ON drive_type (drive_type)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__fuel_type AS SELECT id, fuel_type FROM fuel_type');
        $this->addSql('DROP TABLE fuel_type');
        $this->addSql('CREATE TABLE fuel_type (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fuel_type VARCHAR(48) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO fuel_type (id, fuel_type) SELECT id, fuel_type FROM __temp__fuel_type');
        $this->addSql('DROP TABLE __temp__fuel_type');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9CA10F389CA10F38 ON fuel_type (fuel_type)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__make AS SELECT id, make FROM make');
        $this->addSql('DROP TABLE make');
        $this->addSql('CREATE TABLE make (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, make VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO make (id, make) SELECT id, make FROM __temp__make');
        $this->addSql('DROP TABLE __temp__make');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1ACC766E1ACC766E ON make (make)');
        $this->addSql('DROP INDEX IDX_D79572D99C3A7E96');
        $this->addSql('CREATE TEMPORARY TABLE __temp__model AS SELECT id, make_id_id, model FROM model');
        $this->addSql('DROP TABLE model');
        $this->addSql('CREATE TABLE model (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, make_id_id INTEGER NOT NULL, model VARCHAR(48) NOT NULL COLLATE BINARY, CONSTRAINT FK_D79572D99C3A7E96 FOREIGN KEY (make_id_id) REFERENCES make (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO model (id, make_id_id, model) SELECT id, make_id_id, model FROM __temp__model');
        $this->addSql('DROP TABLE __temp__model');
        $this->addSql('CREATE INDEX IDX_D79572D99C3A7E96 ON model (make_id_id)');
        $this->addSql('DROP INDEX IDX_6B01BC5BDC2902E0');
        $this->addSql('CREATE TEMPORARY TABLE __temp__phone_number AS SELECT id, client_id_id, number FROM phone_number');
        $this->addSql('DROP TABLE phone_number');
        $this->addSql('CREATE TABLE phone_number (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id_id INTEGER NOT NULL, number VARCHAR(48) NOT NULL COLLATE BINARY, CONSTRAINT FK_6B01BC5BDC2902E0 FOREIGN KEY (client_id_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO phone_number (id, client_id_id, number) SELECT id, client_id_id, number FROM __temp__phone_number');
        $this->addSql('DROP TABLE __temp__phone_number');
        $this->addSql('CREATE INDEX IDX_6B01BC5BDC2902E0 ON phone_number (client_id_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__transmission AS SELECT id, transmission FROM transmission');
        $this->addSql('DROP TABLE transmission');
        $this->addSql('CREATE TABLE transmission (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, transmission VARCHAR(48) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO transmission (id, transmission) SELECT id, transmission FROM __temp__transmission');
        $this->addSql('DROP TABLE __temp__transmission');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7F87199F7F87199F ON transmission (transmission)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX UNIQ_D95AEB4BD95AEB4B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__body_type AS SELECT id, body_type FROM body_type');
        $this->addSql('DROP TABLE body_type');
        $this->addSql('CREATE TABLE body_type (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body_type VARCHAR(48) NOT NULL)');
        $this->addSql('INSERT INTO body_type (id, body_type) SELECT id, body_type FROM __temp__body_type');
        $this->addSql('DROP TABLE __temp__body_type');
        $this->addSql('DROP INDEX UNIQ_773DE69DB1085141');
        $this->addSql('DROP INDEX IDX_773DE69D4107BEA0');
        $this->addSql('DROP INDEX IDX_773DE69DE90F9FD3');
        $this->addSql('DROP INDEX IDX_773DE69DE88CCE5');
        $this->addSql('DROP INDEX IDX_773DE69D5EFE7174');
        $this->addSql('DROP INDEX IDX_773DE69D9EDB5F2E');
        $this->addSql('DROP INDEX IDX_773DE69D5B9F8241');
        $this->addSql('DROP INDEX IDX_773DE69D7E3C61F9');
        $this->addSql('CREATE TEMPORARY TABLE __temp__car AS SELECT id, model_id_id, body_type_id_id, color_id_id, drive_type_id_id, fuel_type_id_id, transmission_id_id, owner_id, vin, build_date, model_year FROM car');
        $this->addSql('DROP TABLE car');
        $this->addSql('CREATE TABLE car (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, model_id_id INTEGER NOT NULL, body_type_id_id INTEGER DEFAULT NULL, color_id_id INTEGER DEFAULT NULL, drive_type_id_id INTEGER DEFAULT NULL, fuel_type_id_id INTEGER DEFAULT NULL, transmission_id_id INTEGER DEFAULT NULL, owner_id INTEGER DEFAULT NULL, vin VARCHAR(48) NOT NULL, build_date DATE DEFAULT NULL, model_year DATE DEFAULT NULL)');
        $this->addSql('INSERT INTO car (id, model_id_id, body_type_id_id, color_id_id, drive_type_id_id, fuel_type_id_id, transmission_id_id, owner_id, vin, build_date, model_year) SELECT id, model_id_id, body_type_id_id, color_id_id, drive_type_id_id, fuel_type_id_id, transmission_id_id, owner_id, vin, build_date, model_year FROM __temp__car');
        $this->addSql('DROP TABLE __temp__car');
        $this->addSql('CREATE INDEX IDX_773DE69D4107BEA0 ON car (model_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69DE90F9FD3 ON car (body_type_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69DE88CCE5 ON car (color_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69D5EFE7174 ON car (drive_type_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69D9EDB5F2E ON car (fuel_type_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69D5B9F8241 ON car (transmission_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69D7E3C61F9 ON car (owner_id)');
        $this->addSql('DROP INDEX UNIQ_665648E9665648E9');
        $this->addSql('CREATE TEMPORARY TABLE __temp__color AS SELECT id, color FROM color');
        $this->addSql('DROP TABLE color');
        $this->addSql('CREATE TABLE color (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, color VARCHAR(48) NOT NULL)');
        $this->addSql('INSERT INTO color (id, color) SELECT id, color FROM __temp__color');
        $this->addSql('DROP TABLE __temp__color');
        $this->addSql('DROP INDEX UNIQ_EA2F3768EA2F3768');
        $this->addSql('CREATE TEMPORARY TABLE __temp__drive_type AS SELECT id, drive_type FROM drive_type');
        $this->addSql('DROP TABLE drive_type');
        $this->addSql('CREATE TABLE drive_type (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, drive_type VARCHAR(48) NOT NULL)');
        $this->addSql('INSERT INTO drive_type (id, drive_type) SELECT id, drive_type FROM __temp__drive_type');
        $this->addSql('DROP TABLE __temp__drive_type');
        $this->addSql('DROP INDEX UNIQ_9CA10F389CA10F38');
        $this->addSql('CREATE TEMPORARY TABLE __temp__fuel_type AS SELECT id, fuel_type FROM fuel_type');
        $this->addSql('DROP TABLE fuel_type');
        $this->addSql('CREATE TABLE fuel_type (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fuel_type VARCHAR(48) NOT NULL)');
        $this->addSql('INSERT INTO fuel_type (id, fuel_type) SELECT id, fuel_type FROM __temp__fuel_type');
        $this->addSql('DROP TABLE __temp__fuel_type');
        $this->addSql('DROP INDEX UNIQ_1ACC766E1ACC766E');
        $this->addSql('CREATE TEMPORARY TABLE __temp__make AS SELECT id, make FROM make');
        $this->addSql('DROP TABLE make');
        $this->addSql('CREATE TABLE make (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, make VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO make (id, make) SELECT id, make FROM __temp__make');
        $this->addSql('DROP TABLE __temp__make');
        $this->addSql('DROP INDEX IDX_D79572D99C3A7E96');
        $this->addSql('CREATE TEMPORARY TABLE __temp__model AS SELECT id, make_id_id, model FROM model');
        $this->addSql('DROP TABLE model');
        $this->addSql('CREATE TABLE model (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, make_id_id INTEGER NOT NULL, model VARCHAR(48) NOT NULL)');
        $this->addSql('INSERT INTO model (id, make_id_id, model) SELECT id, make_id_id, model FROM __temp__model');
        $this->addSql('DROP TABLE __temp__model');
        $this->addSql('CREATE INDEX IDX_D79572D99C3A7E96 ON model (make_id_id)');
        $this->addSql('DROP INDEX IDX_6B01BC5BDC2902E0');
        $this->addSql('CREATE TEMPORARY TABLE __temp__phone_number AS SELECT id, client_id_id, number FROM phone_number');
        $this->addSql('DROP TABLE phone_number');
        $this->addSql('CREATE TABLE phone_number (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id_id INTEGER NOT NULL, number VARCHAR(48) NOT NULL)');
        $this->addSql('INSERT INTO phone_number (id, client_id_id, number) SELECT id, client_id_id, number FROM __temp__phone_number');
        $this->addSql('DROP TABLE __temp__phone_number');
        $this->addSql('CREATE INDEX IDX_6B01BC5BDC2902E0 ON phone_number (client_id_id)');
        $this->addSql('DROP INDEX UNIQ_7F87199F7F87199F');
        $this->addSql('CREATE TEMPORARY TABLE __temp__transmission AS SELECT id, transmission FROM transmission');
        $this->addSql('DROP TABLE transmission');
        $this->addSql('CREATE TABLE transmission (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, transmission VARCHAR(48) NOT NULL)');
        $this->addSql('INSERT INTO transmission (id, transmission) SELECT id, transmission FROM __temp__transmission');
        $this->addSql('DROP TABLE __temp__transmission');
    }
}
