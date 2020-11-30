<?php
/**
 * subscription plugin for Craft CMS 3.x
 *
 * this is a plugin used for subscribing email 
 *
 * @link      kobu.com
 * @copyright Copyright (c) 2020 Kobu
 */

namespace kobu\subscriptiontests\unit;

use Codeception\Test\Unit;
use UnitTester;
use Craft;
use kobu\subscription\Subscription;

/**
 * ExampleUnitTest
 *
 *
 * @author    Kobu
 * @package   Subscription
 * @since     1.0.0
 */
class ExampleUnitTest extends Unit
{
    // Properties
    // =========================================================================

    /**
     * @var UnitTester
     */
    protected $tester;

    // Public methods
    // =========================================================================

    // Tests
    // =========================================================================

    /**
     *
     */
    public function testPluginInstance()
    {
        $this->assertInstanceOf(
            Subscription::class,
            Subscription::$plugin
        );
    }

    /**
     *
     */
    public function testCraftEdition()
    {
        Craft::$app->setEdition(Craft::Pro);

        $this->assertSame(
            Craft::Pro,
            Craft::$app->getEdition()
        );
    }
}
