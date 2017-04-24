<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecibosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecibosTable Test Case
 */
class RecibosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RecibosTable
     */
    public $Recibos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.recibos',
        'app.facturas',
        'app.reservas',
        'app.factura_productos',
        'app.productos',
        'app.rango_edades',
        'app.categorias',
        'app.calificaciones_productos',
        'app.users',
        'app.fotos_productos',
        'app.reservas_productos',
        'app.remitos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Recibos') ? [] : ['className' => 'App\Model\Table\RecibosTable'];
        $this->Recibos = TableRegistry::get('Recibos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Recibos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
