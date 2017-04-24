<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReservasProductosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReservasProductosTable Test Case
 */
class ReservasProductosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReservasProductosTable
     */
    public $ReservasProductos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reservas_productos',
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
        $config = TableRegistry::exists('ReservasProductos') ? [] : ['className' => 'App\Model\Table\ReservasProductosTable'];
        $this->ReservasProductos = TableRegistry::get('ReservasProductos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReservasProductos);

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
