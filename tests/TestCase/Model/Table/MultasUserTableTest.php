<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MultasUserTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MultasUserTable Test Case
 */
class MultasUserTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MultasUserTable
     */
    public $MultasUser;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.multas_user',
        'app.users',
        'app.pagos_multas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MultasUser') ? [] : ['className' => 'App\Model\Table\MultasUserTable'];
        $this->MultasUser = TableRegistry::get('MultasUser', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MultasUser);

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
