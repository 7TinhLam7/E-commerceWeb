<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authError' => 'Bạn không có quyền truy cập !!!'
        ]);

        // login fb
        //  $this->loadComponent('Auth', [
        //     'authenticate' => [
        //         'Form' => [
        //             'fields' => ['username' => 'email']
        //         ],
        //         'ADmad/HybridAuth.HybridAuth' => [
        //             // All keys shown below are defaults
        //             'fields' => [
        //                 'provider' => 'provider',
        //                 'openid_identifier' => 'openid_identifier',
        //                 'email' => 'email'
        //             ],
        //             'profileModel' => 'ADmad/HybridAuth.SocialProfiles',
        //             'profileModelFkField' => 'user_id',
        //             'userModel' => 'Users',
        //             'hauth_return_to' => [
        //                 'controller' => 'Users',
        //                 'action' => 'social_login',
        //                 'prefix' => false,
        //                 'plugin' => false
        //             ]
        //         ]
        //     ]
        // ]);
    }

    // /**
     // * Before render callback.
     // *
     // * @param \Cake\Event\Event $event The beforeRender event.
     // * @return void
     // **/
    public function isAuthorized($user)
    {
    // Admin can access every action
        if (isset($user['roles']) && $user['roles'] === '1') {
            return true;
        }

    // Default deny
        return false;
    }

    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
    }

        // Login Check
    if($this->request->session()->read('Auth.User')){
     $this->set('loggedIn', true);   
 } else {
    $this->set('loggedIn', false); 
}

$this->loadModel('Nhom');
$n = $this->Nhom->find('all')
->contain(['Loai']);
$this->set(compact('n',$n));
$this->set('_serialize',['n']);

$this->loadModel('Dong');
$d = $this->Dong->find('all')
->contain(['Loai','Phankhuc']);
$this->set(compact('d',$d));
$this->set('_serialize',['d']);




$this->loadModel('Users');
$ad = $this->Users->find('all',['limit'=>1])
->where(['roles_id' => 1]);
$this->set(compact('ad'));
$this->set('_serialize',['ad']);

$this->loadModel('Nhacc');
$ncc = $this->Nhacc->find('all');
$this->set(compact('ncc'));
$this->set('_serialize',['ncc']);

$this->loadModel('Hangsx');
$hsx = $this->Hangsx->find('all');
$this->set(compact('hsx'));
$this->set('_serialize',['hsx']);


    // $this->loadModel('Loai');
    // $loai = $this->Loai->find('all')
    // ;
    // $this->set(compact('loai'));
    // $this->set('_serialize',['loai']); 
}
public function beforeFilter(Event $event){
 $this->Auth->allow(['contactus','register','home','loai','searchhome','xem','lienhe','dong','phankhuc','hangsx','getpass','searchloai','searchdong','searchphankhuc','searchhang','export']);
 $this->set('userInfo',$this->Auth->user());

//        if($this->request->prefix == 'admin'){
//     $this->Auth->loginAction = array('controller' => 'users', 'action' => 'index', 'plugin' => false);
// }
}   
       // \Cake\Event\EventManager::instance()->on('HybridAuth.newUser', [$this, 'createUser']);
}

   // login fb

   // public function createUser(\Cake\Event\Event $event) {
   //      // Entity representing record in social_profiles table
   //      $profile = $event->data()['profile'];

   //      $user = $this->newEntity([
   //          'email' => $profile->email,
   //          'password' => time()
   //      ]);
   //      $user = $this->save($user);

   //      if (!$user) {
   //          throw new \RuntimeException('Unable to save new user');
   //      }

   //      return $user;





