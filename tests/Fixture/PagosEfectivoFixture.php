<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PagosEfectivoFixture
 *
 */
class PagosEfectivoFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'pagos_efectivo';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'reserva_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'recibo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'active' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'reserva_id' => ['type' => 'index', 'columns' => ['reserva_id'], 'length' => []],
            'recibo_id' => ['type' => 'index', 'columns' => ['recibo_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'pagos_efectivo_ibfk_1' => ['type' => 'foreign', 'columns' => ['reserva_id'], 'references' => ['reservas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'pagos_efectivo_ibfk_2' => ['type' => 'foreign', 'columns' => ['recibo_id'], 'references' => ['recibos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'recibo_id' => 1,
            'created' => '2017-06-03 11:54:04',
            'modified' => '2017-06-03 11:54:04',
            'active' => 1
        ],
    ];
}
