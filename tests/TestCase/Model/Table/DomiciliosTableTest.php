<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DomiciliosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DomiciliosTable Test Case
 */
class DomiciliosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DomiciliosTable
     */
    public $Domicilios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.domicilios',
        'app.personas',
        'app.localidades',
        'app.envios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Domicilios') ? [] : ['className' => 'App\Model\Table\DomiciliosTable'];
        $this->Domicilios = TableRegistry::get('Domicilios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Domicilios);

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
