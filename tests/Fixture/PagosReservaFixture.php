<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PagosReservaFixture
 *
 */
class PagosReservaFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'pagos_reserva';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'reserva_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'medio_pago_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'pagado' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_reserva_pago_idx' => ['type' => 'index', 'columns' => ['reserva_id'], 'length' => []],
            'fk_medio_pago_reserva_idx' => ['type' => 'index', 'columns' => ['medio_pago_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_medio_pago_reserva' => ['type' => 'foreign', 'columns' => ['medio_pago_id'], 'references' => ['medios_pagos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_reserva_pago' => ['type' => 'foreign', 'columns' => ['reserva_id'], 'references' => ['reservas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'reserva_id' => 1,
            'user_id' => 1,
            'medio_pago_id' => 1,
            'created' => '2017-04-24 14:16:41',
            'modified' => '2017-04-24 14:16:41',
            'pagado' => 1
        ],
    ];
}
