<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DomiciliosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DomiciliosTable Test Case
 */
class DomiciliosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DomiciliosTable
     */
    public $Domicilios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.domicilios',
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
        'app.pagos_reserva',
        'app.medios_pagos',
        'app.reservas_productos',
        'app.recibos',
        'app.fotos_productos',
        'app.multas_user',
        'app.pagos_multas',
        'app.telefonos',
        'app.personas',
        'app.tipo_telefonos',
        'app.localidades',
        'app.provincias',
        'app.paises'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Domicilios') ? [] : ['className' => 'App\Model\Table\DomiciliosTable'];
        $this->Domicilios = TableRegistry::get('Domicilios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Domicilios);

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
