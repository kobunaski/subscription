<?php
/**
 * subscription plugin for Craft CMS 3.x
 *
 * this is a plugin used for subscribing email 
 *
 * @link      kobu.com
 * @copyright Copyright (c) 2020 Kobu
 */

namespace kobu\subscription\controllers;

use kobu\subscription\Subscription;

use Craft;
use craft\web\Controller;
use kobu\subscription\records\Subscription as RecordsSubscription;

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
class SubscriptionController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['index', 'subscribe'];

    // Public Methods
    // =========================================================================

    /**
     * Handle a request going to our plugin's index action URL,
     * e.g.: actions/subscription/subscription
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $subscriptions = Subscription::find()->orderBy("id")->all();
        // $subscriptionsList['email'] = ['email', 'klsajdlfk'];
        // return Json::encode($subscriptionsList);
        // Craft::dd($subscriptions);
        $this->renderTemplate('subscription-module/subscription/index', ['subscriptions' => $subscriptions]);
    }

    /**
     * Handle a request going to our plugin's actionDoSomething URL,
     * e.g.: actions/subscription/subscription/do-something
     *
     * @return mixed
     */

    public function actionSubscribe()
    {
        //Storing a new mailing list signup
        $this->requirePostRequest();
        $request = Craft::$app->getRequest();
        $email = $request->getParam('email');

        $subscription = new RecordsSubscription();
        $subscription->email = $email;
        $subscription->save();

        $this->renderTemplate('subscription/index');
    }
}
