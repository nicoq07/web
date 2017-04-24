<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RemitosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RemitosTable Test Case
 */
class RemitosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RemitosTable
     */
    public $Remitos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.remitos',
        'app.facturas',
        'app.reservas',
        'app.factura_productos',
        'app.productos',
        'app.rango_edades',
        'app.categorias',
        'app.calificaciones_productos',
        'app.users',
        'app.fotos_productos',
        'app.reservas_productos',
        'app.recibos',
        'app.envios',
        'app.domicilios',
        'app.personas',
        'app.telefonos',
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
        $config = TableRegistry::exists('Remitos') ? [] : ['className' => 'App\Model\Table\RemitosTable'];
        $this->Remitos = TableRegistry::get('Remitos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Remitos);

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
