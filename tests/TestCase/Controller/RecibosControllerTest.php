<?php
namespace App\Test\TestCase\Controller;

use App\Controller\RecibosController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\RecibosController Test Case
 */
class RecibosControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.recibos',
        'app.facturas',
        'app.reservas',
        'app.reservas_productos',
        'app.productos',
        'app.rango_edades',
        'app.categorias',
        'app.calificaciones_productos',
        'app.users',
        'app.factura_productos',
        'app.fotos_productos',
        'app.remitos'
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
