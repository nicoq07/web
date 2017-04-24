<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PagosReservaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PagosReservaTable Test Case
 */
class PagosReservaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PagosReservaTable
     */
    public $PagosReserva;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pagos_reserva',
        'app.reservas',
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
        $config = TableRegistry::exists('PagosReserva') ? [] : ['className' => 'App\Model\Table\PagosReservaTable'];
        $this->PagosReserva = TableRegistry::get('PagosReserva', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PagosReserva);

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
