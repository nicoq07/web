<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TelefonosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TelefonosTable Test Case
 */
class TelefonosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TelefonosTable
     */
    public $Telefonos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.telefonos',
        'app.personas',
        'app.domicilios',
        'app.localidades',
        'app.provincias',
        'app.paises',
        'app.envios',
        'app.remitos',
        'app.facturas',
        'app.reservas',
        'app.users',
        'app.estados_reservas',
        'app.pagos_reserva',
        'app.medios_pagos',
        'app.productos',
        'app.rango_edades',
        'app.categorias',
        'app.calificaciones_productos',
        'app.factura_productos',
        'app.fotos_productos',
        'app.reservas_productos',
        'app.recibos',
        'app.tipo_telefonos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Telefonos') ? [] : ['className' => 'App\Model\Table\TelefonosTable'];
        $this->Telefonos = TableRegistry::get('Telefonos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Telefonos);

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
