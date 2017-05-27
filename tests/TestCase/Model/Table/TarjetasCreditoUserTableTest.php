<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TarjetasCreditoUserTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TarjetasCreditoUserTable Test Case
 */
class TarjetasCreditoUserTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TarjetasCreditoUserTable
     */
    public $TarjetasCreditoUser;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tarjetas_credito_user',
        'app.users',
        'app.roles',
        'app.calificaciones_productos',
        'app.productos',
        'app.rango_edades',
        'app.categorias',
        'app.factura_productos',
        'app.facturas',
        'app.reservas',
        'app.estados_reservas',
        'app.envios',
        'app.remitos',
        'app.domicilios',
        'app.localidades',
        'app.provincias',
        'app.paises',
        'app.pagos_reserva',
        'app.medios_pagos',
        'app.reservas_productos',
        'app.recibos',
        'app.fotos_productos',
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
        $config = TableRegistry::exists('TarjetasCreditoUser') ? [] : ['className' => 'App\Model\Table\TarjetasCreditoUserTable'];
        $this->TarjetasCreditoUser = TableRegistry::get('TarjetasCreditoUser', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TarjetasCreditoUser);

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
