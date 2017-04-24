<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductosFixture
 *
 */
class ProductosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'rango_edad_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'categoria_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'descripcion' => ['type' => 'string', 'length' => 280, 'null' => false, 'default' => null, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'informacion' => ['type' => 'string', 'length' => 280, 'null' => false, 'default' => null, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'dimensiones' => ['type' => 'string', 'length' => 80, 'null' => false, 'default' => null, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'precio' => ['type' => 'decimal', 'length' => 30, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'active' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_rango_edad_idx' => ['type' => 'index', 'columns' => ['rango_edad_id'], 'length' => []],
            'fk_categoria_prod_idx' => ['type' => 'index', 'columns' => ['categoria_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_categoria_prod' => ['type' => 'foreign', 'columns' => ['categoria_id'], 'references' => ['categorias', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_rango_edad' => ['type' => 'foreign', 'columns' => ['rango_edad_id'], 'references' => ['rango_edades', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'rango_edad_id' => 1,
            'categoria_id' => 1,
            'descripcion' => 'Lorem ipsum dolor sit amet',
            'informacion' => 'Lorem ipsum dolor sit amet',
            'dimensiones' => 'Lorem ipsum dolor sit amet',
            'precio' => 1.5,
            'created' => '2017-04-24 14:16:41',
            'modified' => '2017-04-24 14:16:41',
            'active' => 1
        ],
    ];
}
