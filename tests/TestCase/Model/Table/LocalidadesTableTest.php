<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LocalidadesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LocalidadesTable Test Case
 */
class LocalidadesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LocalidadesTable
     */
    public $Localidades;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.localidades',
        'app.provincias'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Localidades') ? [] : ['className' => 'App\Model\Table\LocalidadesTable'];
        $this->Localidades = TableRegistry::get('Localidades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Localidades);

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
