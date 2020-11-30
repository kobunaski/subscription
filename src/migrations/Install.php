<?php

/**
 * subscription plugin for Craft CMS 3.x
 *
 * this is a plugin used for subscribing email 
 *
 * @link      kobu.com
 * @copyright Copyright (c) 2020 Kobu
 */

namespace kobu\subscription\migrations;

use kobu\subscription\Subscription;

use Craft;
use craft\db\Migration;

/**
 * Subscription Controller
 *
 * Generally speaking, controllers are the middlemen between the front end of
 * the CP/website and your plugin’s services. They contain action methods which
 * handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering
 * post data, saving it on a model, passing the model off to a service, and then
 * responding to the request appropriately depending on the service method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what
 * the method does (for example, actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 *
 * @author    Kobu
 * @package   Subscription
 * @since     1.0.0
 */


class Install extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableSchema = Craft::$app->db->schema->getTableSchema('{{%subscriptions}}');

        if ($tableSchema === null) {
            $this->createTable(
                '{{%subscriptions}}',
                [
                    'id' => $this->primaryKey(),
                    'email' => $this->string(255)->notNull()->defaultValue(''),
                    'uid' => $this->uid(),
                    'sourceId' => $this->integer()->defaultValue(null),
                    'dateCreated' => $this->dateTime()->notNull(),
                    'dateUpdated' => $this->dateTime()->notNull(),
                ]
            );

            //Unique index on email
            $this->createIndex(
                $this->db->getIndexName(
                    '{{%subscriptions}}',
                    'email',
                    true
                ),
                '{{%subscriptions}}',
                'email',
                true
            );

            //Index on date created for filtering
            $this->createIndex(
                $this->db->getIndexName(
                    '{{%subscriptions}}',
                    'dateCreated',
                    false
                ),
                '{{%subscriptions}}',
                'dateCreated',
                false
            );
        }
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTableIfExists('{{%subscriptions}}');
    }
}
