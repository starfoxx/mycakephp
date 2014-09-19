<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class RankingController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();
    
    public function webappanalytics() {
        /*
         * Basic usage example:
         * - Redirect to the oAuth page if no access token is present
         * - Handles the 'code' return from the oAuth page,
         * fetches an access token save it in a session variable
         * - Makes an API request using the access token in the session var
         *
         * Make sure to request your API-key first at:
         * https://console.developers.google.com
         */
// From the APIs console
        $client_id = '243946155097-37g4jppn184d6r1lfeq33u21fmro7kgd.apps.googleusercontent.com';
// From the APIs console
        $client_secret = 'RxElSfCYRNC-Swsp6O2YL0BY';
// Url to your this page, must match the one in the APIs console
        $redirect_uri = 'http://funmatome.codeloversvietnam.com/statistic/webappanalytics';
// Analytics account id like, 'ga:xxxxxxx'
        $account_id = 'ga:81437221';
        session_start();
        include(VENDOR_DIR . 'google-analytics/GoogleAnalyticsAPI.class.php');

        $ga = new GoogleAnalyticsAPI();
        $ga->auth->setClientId($client_id);
        $ga->auth->setClientSecret($client_secret);
        $ga->auth->setRedirectUri($redirect_uri);
        if (isset($_GET['force_oauth'])) {
            $_SESSION['oauth_access_token'] = null;
        }
        /*
         * Step 1: Check if we have an oAuth access token in our session
         * If we've got $_GET['code'], move to the next step
         */
        if (!isset($_SESSION['oauth_access_token']) && !isset($_GET['code'])) {
// Go get the url of the authentication page, redirect the client and go get that token!
            $url = $ga->auth->buildAuthUrl();
            header("Location: " . $url);
        }
        /*
         * Step 2: Returning from the Google oAuth page, the access token should be in $_GET['code']
         */
        if (!isset($_SESSION['oauth_access_token']) && isset($_GET['code'])) {
            $auth = $ga->auth->getAccessToken($_GET['code']);
            if ($auth['http_code'] == 200) {
                $accessToken = $auth['access_token'];
                $refreshToken = $auth['refresh_token'];
                $tokenExpires = $auth['expires_in'];
                $tokenCreated = time();
// For simplicity of the example we only store the accessToken
// If it expires use the refreshToken to get a fresh one
                $_SESSION['oauth_access_token'] = $accessToken;
            } else {
                die("Sorry, something went wrong retrieving the oAuth tokens");
            }
        }
        /*
         * Step 3: Do real stuff!
         * If we're here, we sure we've got an access token
         */
        $ga->setAccessToken($_SESSION['oauth_access_token']);
        $ga->setAccountId('ga:xxxxxxx');
        // Load profiles
        $profiles = $ga->getProfiles();
        $accounts = array();
        foreach ($profiles['items'] as $item) {
            $id = "ga:{$item['id']}";
            $name = $item['name'];
            $accounts[$id] = $name;
        }
        
        $this->view->accounts = $accounts;
        $ga->setAccountId($account_id);
// Set the default params. For example the start/end dates and max-results
        $defaults = array(
            'start-date' => date('Y-m-d', strtotime('-1 month')),
            'end-date' => date('Y-m-d'),
        );
        $ga->setDefaultQueryParams($defaults);
        $params = array(
            'metrics' => 'ga:visits',
            'dimensions' => 'ga:date',
        );
        $visits = $ga->query($params);
       
    }

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
}
