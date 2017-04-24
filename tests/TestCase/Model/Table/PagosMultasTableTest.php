<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PagosMultasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PagosMultasTable Test Case
 */
class PagosMultasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PagosMultasTable
     */
    public $PagosMultas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pagos_multas',
        'app.multas_user',
        'app.users',
        'app.medios_pagos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PagosMultas') ? [] : ['className' => 'App\Model\Table\PagosMultasTable'];
        $this->PagosMultas = TableRegistry::get('PagosMultas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PagosMultas);

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
