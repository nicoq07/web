<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PagosEfectivoController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\PagosEfectivoController Test Case
 */
class PagosEfectivoControllerTest extends IntegrationTestCase
{

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
