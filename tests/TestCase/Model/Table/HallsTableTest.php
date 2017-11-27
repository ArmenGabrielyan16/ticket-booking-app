<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HallsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HallsTable Test Case
 */
class HallsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HallsTable
     */
    public $Halls;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.halls',
        'app.cinemas',
        'app.bookings',
        'app.movies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Halls') ? [] : ['className' => HallsTable::class];
        $this->Halls = TableRegistry::get('Halls', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Halls);

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
