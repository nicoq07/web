<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FotosProductosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FotosProductosTable Test Case
 */
class FotosProductosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FotosProductosTable
     */
    public $FotosProductos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fotos_productos',
        'app.productos',
        'app.rango_edades',
        'app.categorias',
        'app.calificaciones_productos',
        'app.users',
        'app.roles',
        'app.domicilios',
        'app.personas',
        'app.localidades',
        'app.provincias',
        'app.paises',
        'app.envios',
        'app.remitos',
        'app.facturas',
        'app.reservas',
        'app.estados_reservas',
        'app.pagos_reserva',
        'app.medios_pagos',
        'app.reservas_productos',
        'app.factura_productos',
        'app.recibos',
        'app.multas_user',
        'app.pagos_multas',
        'app.telefonos',
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
        $config = TableRegistry::exists('FotosProductos') ? [] : ['className' => 'App\Model\Table\FotosProductosTable'];
        $this->FotosProductos = TableRegistry::get('FotosProductos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FotosProductos);

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
