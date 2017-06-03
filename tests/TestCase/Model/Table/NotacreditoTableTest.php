<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NotacreditoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NotacreditoTable Test Case
 */
class NotacreditoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NotacreditoTable
     */
    public $Notacredito;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.notacredito',
        'app.facturas',
        'app.reservas',
        'app.users',
        'app.roles',
        'app.calificaciones_productos',
        'app.productos',
        'app.rango_edades',
        'app.categorias',
        'app.factura_productos',
        'app.fotos_productos',
        'app.reservas_productos',
        'app.domicilios',
        'app.localidades',
        'app.provincias',
        'app.paises',
        'app.envios',
        'app.remitos',
        'app.multas_user',
        'app.pagos_multas',
        'app.medios_pagos',
        'app.pagos_reserva',
        'app.telefonos',
        'app.tipo_telefonos',
        'app.tarjetas_credito_user',
        'app.estados_reservas',
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
        $config = TableRegistry::exists('Notacredito') ? [] : ['className' => 'App\Model\Table\NotacreditoTable'];
        $this->Notacredito = TableRegistry::get('Notacredito', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Notacredito);

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
