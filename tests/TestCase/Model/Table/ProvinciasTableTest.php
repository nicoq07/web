<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProvinciasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProvinciasTable Test Case
 */
class ProvinciasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProvinciasTable
     */
    public $Provincias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.provincias',
        'app.paises',
        'app.localidades'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Provincias') ? [] : ['className' => 'App\Model\Table\ProvinciasTable'];
        $this->Provincias = TableRegistry::get('Provincias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Provincias);

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
