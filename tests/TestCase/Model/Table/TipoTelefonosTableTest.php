<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoTelefonosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoTelefonosTable Test Case
 */
class TipoTelefonosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoTelefonosTable
     */
    public $TipoTelefonos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tipo_telefonos',
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
        'app.recibos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TipoTelefonos') ? [] : ['className' => 'App\Model\Table\TipoTelefonosTable'];
        $this->TipoTelefonos = TableRegistry::get('TipoTelefonos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TipoTelefonos);

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
