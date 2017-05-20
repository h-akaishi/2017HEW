<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MyCartsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MyCartsTable Test Case
 */
class MyCartsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MyCartsTable
     */
    public $MyCarts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.my_carts',
        'app.items',
        'app.item_types',
        'app.item_imgs',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MyCarts') ? [] : ['className' => 'App\Model\Table\MyCartsTable'];
        $this->MyCarts = TableRegistry::get('MyCarts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MyCarts);

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
