<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200525145156 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE agent (id INT AUTO_INCREMENT NOT NULL, phone VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, category_name VARCHAR(255) NOT NULL, alias VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, country VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, locality_name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price (id INT AUTO_INCREMENT NOT NULL, price_value INT NOT NULL, period VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, property_type_id INT DEFAULT NULL, category_id INT DEFAULT NULL, location_id INT DEFAULT NULL, agent_id INT DEFAULT NULL, price_id INT DEFAULT NULL, property_params_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, description LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_8BF21CDE77153098 (code), INDEX IDX_8BF21CDEC54C8C93 (type_id), INDEX IDX_8BF21CDE9C81C6EB (property_type_id), INDEX IDX_8BF21CDE12469DE2 (category_id), UNIQUE INDEX UNIQ_8BF21CDE64D218E (location_id), INDEX IDX_8BF21CDE3414710B (agent_id), UNIQUE INDEX UNIQ_8BF21CDED614C7E7 (price_id), UNIQUE INDEX UNIQ_8BF21CDE4273C8B2 (property_params_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property_params (id INT AUTO_INCREMENT NOT NULL, renovation VARCHAR(255) DEFAULT NULL, new_flat TINYINT(1) DEFAULT NULL, deal_status VARCHAR(255) DEFAULT NULL, building_name VARCHAR(255) DEFAULT NULL, rooms INT DEFAULT NULL, floor INT DEFAULT NULL, floors_total INT DEFAULT NULL, phone TINYINT(1) DEFAULT NULL, internet TINYINT(1) DEFAULT NULL, room_furniture TINYINT(1) DEFAULT NULL, rubbish_chute TINYINT(1) DEFAULT NULL, with_children TINYINT(1) DEFAULT NULL, with_pets TINYINT(1) DEFAULT NULL, refrigerator TINYINT(1) DEFAULT NULL, washing_machine TINYINT(1) DEFAULT NULL, dishwasher TINYINT(1) DEFAULT NULL, television TINYINT(1) DEFAULT NULL, air_conditioner TINYINT(1) DEFAULT NULL, shower TINYINT(1) DEFAULT NULL, parcking TINYINT(1) DEFAULT NULL, bathroom_unit VARCHAR(255) DEFAULT NULL, window_view VARCHAR(255) DEFAULT NULL, building_type VARCHAR(255) DEFAULT NULL, area DOUBLE PRECISION DEFAULT NULL, living_space DOUBLE PRECISION DEFAULT NULL, kitchen_space DOUBLE PRECISION DEFAULT NULL, rent_pledge TINYINT(1) DEFAULT NULL, utilities_included TINYINT(1) DEFAULT NULL, build_year INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property_type (id INT AUTO_INCREMENT NOT NULL, property_type_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, type_name VARCHAR(255) NOT NULL, alias VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDEC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE9C81C6EB FOREIGN KEY (property_type_id) REFERENCES property_type (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE64D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE3414710B FOREIGN KEY (agent_id) REFERENCES agent (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDED614C7E7 FOREIGN KEY (price_id) REFERENCES price (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE4273C8B2 FOREIGN KEY (property_params_id) REFERENCES property_params (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE3414710B');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE12469DE2');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE64D218E');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDED614C7E7');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE4273C8B2');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE9C81C6EB');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDEC54C8C93');
        $this->addSql('DROP TABLE agent');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE price');
        $this->addSql('DROP TABLE property');
        $this->addSql('DROP TABLE property_params');
        $this->addSql('DROP TABLE property_type');
        $this->addSql('DROP TABLE type');
    }
}
