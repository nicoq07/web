<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstadosReservasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstadosReservasTable Test Case
 */
class EstadosReservasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EstadosReservasTable
     */
    public $EstadosReservas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.estados_reservas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EstadosReservas') ? [] : ['className' => 'App\Model\Table\EstadosReservasTable'];
        $this->EstadosReservas = TableRegistry::get('EstadosReservas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EstadosReservas);

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
}
