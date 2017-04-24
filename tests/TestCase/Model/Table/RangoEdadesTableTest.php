<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RangoEdadesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RangoEdadesTable Test Case
 */
class RangoEdadesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RangoEdadesTable
     */
    public $RangoEdades;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rango_edades'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RangoEdades') ? [] : ['className' => 'App\Model\Table\RangoEdadesTable'];
        $this->RangoEdades = TableRegistry::get('RangoEdades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RangoEdades);

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
