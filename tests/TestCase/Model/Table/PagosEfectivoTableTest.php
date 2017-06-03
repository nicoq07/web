<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PagosEfectivoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PagosEfectivoTable Test Case
 */
class PagosEfectivoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PagosEfectivoTable
     */
    public $PagosEfectivo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pagos_efectivo',
        'app.reservas',
        'app.users',
        'app.roles',
        'app.calificaciones_productos',
        'app.productos',
        'app.rango_edades',
        'app.categorias',
        'app.factura_productos',
        'app.facturas',
        'app.recibos',
        'app.remitos',
        'app.envios',
        'app.domicilios',
        'app.localidades',
        'app.provincias',
        'app.paises',
        'app.fotos_productos',
        'app.reservas_productos',
        'app.multas_user',
        'app.pagos_multas',
        'app.medios_pagos',
        'app.pagos_reserva',
        'app.telefonos',
        'app.tipo_telefonos',
        'app.tarjetas_credito_user',
        'app.estados_reservas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PagosEfectivo') ? [] : ['className' => 'App\Model\Table\PagosEfectivoTable'];
        $this->PagosEfectivo = TableRegistry::get('PagosEfectivo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PagosEfectivo);

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
