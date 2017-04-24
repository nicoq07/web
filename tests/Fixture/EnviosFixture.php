<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EnviosFixture
 *
 */
class EnviosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'remito_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'reserva_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'domicilio_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'active' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_envio_remito_idx' => ['type' => 'index', 'columns' => ['remito_id'], 'length' => []],
            'fk_envio_reserva_idx' => ['type' => 'index', 'columns' => ['reserva_id'], 'length' => []],
            'fk_envio_domicilio_idx' => ['type' => 'index', 'columns' => ['domicilio_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_envio_domicilio' => ['type' => 'foreign', 'columns' => ['domicilio_id'], 'references' => ['domicilios', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_envio_remito' => ['type' => 'foreign', 'columns' => ['remito_id'], 'references' => ['remitos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_envio_reserva' => ['type' => 'foreign', 'columns' => ['reserva_id'], 'references' => ['reservas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_spanish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'remito_id' => 1,
            'reserva_id' => 1,
            'domicilio_id' => 1,
            'created' => '2017-04-24 14:16:40',
            'modified' => '2017-04-24 14:16:40',
            'active' => 1
        ],
    ];
}
