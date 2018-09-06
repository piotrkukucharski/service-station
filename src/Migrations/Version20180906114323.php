<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180906114323 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_773DE69D7E3C61F9');
        $this->addSql('DROP INDEX IDX_773DE69D5B9F8241');
        $this->addSql('DROP INDEX IDX_773DE69D9EDB5F2E');
        $this->addSql('DROP INDEX IDX_773DE69D5EFE7174');
        $this->addSql('DROP INDEX IDX_773DE69DE88CCE5');
        $this->addSql('DROP INDEX IDX_773DE69DE90F9FD3');
        $this->addSql('DROP INDEX IDX_773DE69D4107BEA0');
        $this->addSql('DROP INDEX UNIQ_773DE69DB1085141');
        $this->addSql('CREATE TEMPORARY TABLE __temp__car AS SELECT id, model_id_id, body_type_id_id, color_id_id, drive_type_id_id, fuel_type_id_id, transmission_id_id, owner_id, vin, build_date, model_year FROM car');
        $this->addSql('DROP TABLE car');
        $this->addSql('CREATE TABLE car (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, model_id_id INTEGER NOT NULL, body_type_id_id INTEGER DEFAULT NULL, color_id_id INTEGER DEFAULT NULL, drive_type_id_id INTEGER DEFAULT NULL, fuel_type_id_id INTEGER DEFAULT NULL, transmission_id_id INTEGER DEFAULT NULL, owner_id INTEGER DEFAULT NULL, vin VARCHAR(48) NOT NULL COLLATE BINARY, build_date DATE DEFAULT NULL, model_year DATE DEFAULT NULL, CONSTRAINT FK_773DE69D4107BEA0 FOREIGN KEY (model_id_id) REFERENCES model (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_773DE69DE90F9FD3 FOREIGN KEY (body_type_id_id) REFERENCES body_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_773DE69DE88CCE5 FOREIGN KEY (color_id_id) REFERENCES color (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_773DE69D5EFE7174 FOREIGN KEY (drive_type_id_id) REFERENCES drive_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_773DE69D9EDB5F2E FOREIGN KEY (fuel_type_id_id) REFERENCES fuel_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_773DE69D5B9F8241 FOREIGN KEY (transmission_id_id) REFERENCES transmission (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_773DE69D7E3C61F9 FOREIGN KEY (owner_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO car (id, model_id_id, body_type_id_id, color_id_id, drive_type_id_id, fuel_type_id_id, transmission_id_id, owner_id, vin, build_date, model_year) SELECT id, model_id_id, body_type_id_id, color_id_id, drive_type_id_id, fuel_type_id_id, transmission_id_id, owner_id, vin, build_date, model_year FROM __temp__car');
        $this->addSql('DROP TABLE __temp__car');
        $this->addSql('CREATE INDEX IDX_773DE69D7E3C61F9 ON car (owner_id)');
        $this->addSql('CREATE INDEX IDX_773DE69D5B9F8241 ON car (transmission_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69D9EDB5F2E ON car (fuel_type_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69D5EFE7174 ON car (drive_type_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69DE88CCE5 ON car (color_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69DE90F9FD3 ON car (body_type_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69D4107BEA0 ON car (model_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_773DE69DB1085141 ON car (vin)');
        $this->addSql('DROP INDEX IDX_27BA704BC3C6F69F');
        $this->addSql('DROP INDEX IDX_27BA704B19EB6921');
        $this->addSql('CREATE TEMPORARY TABLE __temp__history AS SELECT id, client_id, car_id, description, date_time FROM history');
        $this->addSql('DROP TABLE history');
        $this->addSql('CREATE TABLE history (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER DEFAULT NULL, car_id INTEGER DEFAULT NULL, description VARCHAR(2048) NOT NULL COLLATE BINARY, date_time DATETIME NOT NULL, CONSTRAINT FK_27BA704B19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_27BA704BC3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO history (id, client_id, car_id, description, date_time) SELECT id, client_id, car_id, description, date_time FROM __temp__history');
        $this->addSql('DROP TABLE __temp__history');
        $this->addSql('CREATE INDEX IDX_27BA704BC3C6F69F ON history (car_id)');
        $this->addSql('CREATE INDEX IDX_27BA704B19EB6921 ON history (client_id)');
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
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

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
        $this->addSql('CREATE UNIQUE INDEX UNIQ_773DE69DB1085141 ON car (vin)');
        $this->addSql('CREATE INDEX IDX_773DE69D4107BEA0 ON car (model_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69DE90F9FD3 ON car (body_type_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69DE88CCE5 ON car (color_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69D5EFE7174 ON car (drive_type_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69D9EDB5F2E ON car (fuel_type_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69D5B9F8241 ON car (transmission_id_id)');
        $this->addSql('CREATE INDEX IDX_773DE69D7E3C61F9 ON car (owner_id)');
        $this->addSql('DROP INDEX IDX_27BA704B19EB6921');
        $this->addSql('DROP INDEX IDX_27BA704BC3C6F69F');
        $this->addSql('CREATE TEMPORARY TABLE __temp__history AS SELECT id, client_id, car_id, description, date_time FROM history');
        $this->addSql('DROP TABLE history');
        $this->addSql('CREATE TABLE history (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER DEFAULT NULL, car_id INTEGER DEFAULT NULL, description VARCHAR(2048) NOT NULL, date_time DATETIME NOT NULL)');
        $this->addSql('INSERT INTO history (id, client_id, car_id, description, date_time) SELECT id, client_id, car_id, description, date_time FROM __temp__history');
        $this->addSql('DROP TABLE __temp__history');
        $this->addSql('CREATE INDEX IDX_27BA704B19EB6921 ON history (client_id)');
        $this->addSql('CREATE INDEX IDX_27BA704BC3C6F69F ON history (car_id)');
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
    }
}
