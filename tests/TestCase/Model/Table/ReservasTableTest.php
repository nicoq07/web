<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReservasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReservasTable Test Case
 */
class ReservasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReservasTable
     */
    public $Reservas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reservas',
        'app.users',
        'app.estados_reservas',
        'app.envios',
        'app.remitos',
        'app.facturas',
        'app.factura_productos',
        'app.productos',
        'app.rango_edades',
        'app.categorias',
        'app.calificaciones_productos',
        'app.fotos_productos',
        'app.reservas_productos',
        'app.recibos',
        'app.domicilios',
        'app.personas',
        'app.telefonos',
        'app.localidades',
        'app.provincias',
        'app.paises',
        'app.pagos_reserva',
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
        $config = TableRegistry::exists('Reservas') ? [] : ['className' => 'App\Model\Table\ReservasTable'];
        $this->Reservas = TableRegistry::get('Reservas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Reservas);

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
