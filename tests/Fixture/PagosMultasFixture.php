<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PagosMultasFixture
 *
 */
class PagosMultasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'multas_user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'medio_pago_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'monto' => ['type' => 'decimal', 'length' => 30, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'pagado' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_pago_multa_idx' => ['type' => 'index', 'columns' => ['multas_user_id'], 'length' => []],
            'fk_medio_pago_idx' => ['type' => 'index', 'columns' => ['medio_pago_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_medio_pago' => ['type' => 'foreign', 'columns' => ['medio_pago_id'], 'references' => ['medios_pagos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_pago_multa' => ['type' => 'foreign', 'columns' => ['multas_user_id'], 'references' => ['multas_user', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'multas_user_id' => 1,
            'medio_pago_id' => 1,
            'monto' => 1.5,
            'created' => '2017-04-24 14:16:41',
            'modified' => '2017-04-24 14:16:41',
            'pagado' => 1
        ],
    ];
}
