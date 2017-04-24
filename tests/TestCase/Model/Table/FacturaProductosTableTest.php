<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FacturaProductosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FacturaProductosTable Test Case
 */
class FacturaProductosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FacturaProductosTable
     */
    public $FacturaProductos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.factura_productos',
        'app.productos',
        'app.facturas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FacturaProductos') ? [] : ['className' => 'App\Model\Table\FacturaProductosTable'];
        $this->FacturaProductos = TableRegistry::get('FacturaProductos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FacturaProductos);

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
