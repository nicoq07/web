<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        'app.personas',
        'app.domicilios',
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
        'app.productos',
        'app.rango_edades',
        'app.categorias',
        'app.calificaciones_productos',
        'app.factura_productos',
        'app.fotos_productos',
        'app.reservas_productos',
        'app.recibos',
        'app.telefonos',
        'app.tipo_telefonos',
        'app.roles',
        'app.multas_user',
        'app.pagos_multas'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
