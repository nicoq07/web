<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CalificacionesProductosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CalificacionesProductosTable Test Case
 */
class CalificacionesProductosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CalificacionesProductosTable
     */
    public $CalificacionesProductos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.calificaciones_productos',
        'app.users',
        'app.productos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CalificacionesProductos') ? [] : ['className' => 'App\Model\Table\CalificacionesProductosTable'];
        $this->CalificacionesProductos = TableRegistry::get('CalificacionesProductos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CalificacionesProductos);

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
