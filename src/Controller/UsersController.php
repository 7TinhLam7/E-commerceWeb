<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Mailer\AbstractTransport;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
   
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {if($this->Auth->user('roles_id') == 1){
       
        $this->paginate = ['limit'=>10,
        'contain' => ['Roles'],
        'order'=>['id'=>'asc']
    ];
    $user = $this->paginate($this->Users);
    $this->set(compact('user'));
    $this->set('_serialize', ['user']);
}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}

public function trangcanhan($id = null)
{

    $this->viewBuilder()->layout('frontend');
    $user = $this->Users->get($id, [
        'contain' => ['Roles','Danhgia']
    ]);
    $this->set(compact('user'));
    $this->set('_serialize', ['user']);

    $sp = $this->Users->Danhgia->find('all')
    ->contain(['Sanpham'])
    ->where(['users_id' => $this->Auth->user('id')]);
    $this->set(compact('sp'));
    $this->set('_serialize', ['sp']);
}

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {if($this->Auth->user('roles_id') == 1){
       
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);

    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * logind method
     *
     * @return \Cake\Http\Response|null Redirects on successful logind, renders view otherwise.
     */
    
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */


    public function editTC($id = null)
    {
        
     $this->viewBuilder()->layout('frontend');

     $user = $this->Users->get($id, [
        'contain' => []
    ]);
     
     if ($this->request->is(['patch', 'post', 'put'])) {
        $user = $this->Users->patchEntity($user, $this->request->getData());
        if($user['hinhuser'] != null){
            $user->set('hinhmacdinh','');
        }
        Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
        $time = Time::now();
        
        $time->timezone = 'Asia/Ho_Chi_Minh';
        $user->set('idnguoisua',$this->Auth->user('id'));
        
        $user->set('tgsua', $time);
        if ($this->Users->save($user)) {
            

            return $this->redirect(['action' => 'trangcanhan',$user['id']]);
        }
        $this->Flash->error(__('Lỗi !!!'));
    }
    $role = $this->Users->Roles->find('list', ['limit' => 200]);


    $this->set('user', $user);
    
    $this->set(compact('role'));
    $this->set('_serialize', ['user']);
}

public function edit($id = null)
{if($this->Auth->user('roles_id') == 1){
    
    $user = $this->Users->get($id, [
        'contain' => ['Roles']
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
        $user = $this->Users->patchEntity($user, $this->request->getData());
        $user->set('hinhmacdinh','');
        Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
        $time = Time::now();
        
        $time->timezone = 'Asia/Ho_Chi_Minh';
        $user->set('idnguoisua',$this->Auth->user('id'));
        
        $user->set('tgsua', $time);
        if ($this->Users->save($user)) {
            $this->Flash->success(__('Thành công'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Lỗi !!'));
    }
    $role = $this->Users->Roles->find('list', ['limit' => 200]);
    $this->set(compact('user','role'));
    $this->set('_serialize', ['user']);

}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {if($this->Auth->user('roles_id') == 1){
        
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        //Lỗi khoá ngoại
        $this->loadModel('Nhom');
        $n = $this->Nhom->find('all')
        ->where(['idnguoitao' => $id]);
        $this->set('n', $n);
        $this->set('_serialize', ['n']);

        if(!$n->isEmpty()){
            $this->Flash->error(__('Có dữ liệu liên kết, không thể xoá !!'));
            return $this->redirect(['action' => 'index']);
        } 

        //Lỗi khoá ngoại
        $this->loadModel('Tag');
        $t = $this->Tag->find('all')
        ->where(['idnguoitao' => $id]);
        $this->set('t', $t);
        $this->set('_serialize', ['t']);

        if(!$t->isEmpty()){
            $this->Flash->error(__('Có dữ liệu liên kết, không thể xoá !!'));
            return $this->redirect(['action' => 'index']);
        }

         //Lỗi khoá ngoại
        $this->loadModel('Mau');
        $m = $this->Mau->find('all')
        ->where(['idnguoitao' => $id]);
        $this->set('m', $m);
        $this->set('_serialize', ['m']);

        if(!$m->isEmpty()){
            $this->Flash->error(__('Có dữ liệu liên kết, không thể xoá !!'));
            return $this->redirect(['action' => 'index']);
        } 

         //Lỗi khoá ngoại
        $this->loadModel('Hangsx');
        $h = $this->Hangsx->find('all')
        ->where(['idnguoitao' => $id]);
        $this->set('h', $h);
        $this->set('_serialize', ['h']);

        if(!$h->isEmpty()){
            $this->Flash->error(__('Có dữ liệu liên kết, không thể xoá !!'));
            return $this->redirect(['action' => 'index']);
        }

         //Lỗi khoá ngoại
        $this->loadModel('Nhacc');
        $ncc = $this->Nhacc->find('all')
        ->where(['idnguoitao' => $id]);
        $this->set('ncc', $ncc);
        $this->set('_serialize', ['ncc']);

        if(!$ncc->isEmpty()){
            $this->Flash->error(__('Có dữ liệu liên kết, không thể xoá !!'));
            return $this->redirect(['action' => 'index']);
        }

         //Lỗi khoá ngoại
        $this->loadModel('Diemdg');
        $dg = $this->Diemdg->find('all')
        ->where(['idnguoitao' => $id]);
        $this->set('dg', $dg);
        $this->set('_serialize', ['dg']);

        if(!$dg->isEmpty()){
            $this->Flash->error(__('Có dữ liệu liên kết, không thể xoá !!'));
            return $this->redirect(['action' => 'index']);
        }


        if($n->isEmpty() && $t->isEmpty() && $m->isEmpty() && $h->isEmpty() && $ncc->isEmpty() && $dg->isEmpty()){
            if ($this->Users->delete($user)) {
                $this->Flash->success(__('Thành công'));
            } else {
                $this->Flash->error(__('Thất bại'));
            }
        }

        return $this->redirect(['action' => 'index']);

    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}


public function login()
{ if($this->Auth->user('id'))
{
   return $this->redirect(['controller'=>'Sanpham','action'=>'home']);        
}
else{
    
    if ($this->request->is('post')) {
        $user = $this->Auth->identify();
        if ($user) {
            $this->Auth->setUser($user);
            
            return $this->redirect($this->referer());
        }
        $this->Flash->error(__('Tên đăng nhập hoặc mật khẩu sai !!!!'));
        return $this->redirect($this->referer());
    }
}
}

public function logout()
{
   $this->Auth->logout();
   return $this->redirect($this->referer());
}



public function search()
{if($this->Auth->user('roles_id') == 1){
   
   $this->paginate = [
    'contain' => ['Roles'],
    'order'=>['id'=>'asc']
];

if ($this->request->is('post')) {
    $value = $this->request->getData('sr');    
}
$kq = $this->Users->find('all')
->contain(['Roles'])
->where(['users.ten LIKE '=> '%'.$value.'%' ]) 
->orWhere(['email LIKE' => $value])
->orWhere(['sdt' => $value])
->orWhere(['users.id' => $value])
->orWhere(['Roles.ten LIKE' => '%'.$value.'%']);       

        // $kq = $this->paginate($this->Users);
$this->set(compact('kq'));
$this->set('_serialize', ['kq']);

}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}

public function add()
{if($this->Auth->user('roles_id') == 1){
   
    $user = $this->Users->newEntity();
    
    if ($this->request->is('post')) {
        $user = $this->Users->patchEntity($user, $this->request->getData());
        if($user['hinhuser'] == null){
            $user->set('hinhmacdinh','\user.png');
            $user->set('hinhuser_dd','webroot\files\Users\hinhnd');
        }
        Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
        $time = Time::now();
        
        $time->timezone = 'Asia/Ho_Chi_Minh';
            // $time= str_replace(array(' ','/',':','_',',','-'),array(''),$time);
        
        $user->set('tgtao', $time); 
        if ($this->Users->save($user)) {
            $this->Flash->success(__('Thành Công'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Lỗi !!!'));
    }
    
    $role = $this->Users->Roles->find('list', ['limit' => 200]);
    $this->set(compact('user','role'));
    $this->set('_serialize', ['user']);
}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}

public function register()
{
    $user = $this->Users->newEntity();
    if($this->request->is('post')){
        $user = $this->Users->patchEntity($user, $this->request->data);
        
        $user->set('hinhuser','');
        $user->set('hinhmacdinh','\user.png');
        $user->set('hinhuser_dd','webroot\files\Users\hinhnd');
        
        $user->set('roles_id','2');
        Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
        $time = Time::now();
        
        $time->timezone = 'Asia/Ho_Chi_Minh';
            // $time= str_replace(array(' ','/',':','_',',','-'),array(''),$time);
        
        $user->set('tgtao', $time);
        
        if($this->Users->save($user)){
            $this->Flash->success(' Đăng Ký Thành Công');
            return $this->redirect(['controller'=>'users','action'=>'login']);
        }else{

            $this->Flash->error('Đăng Ký Thất Bại');
        }
    }
    $this->set(compact('user'));
    $this->set('_serialize',['user']);
}

public function getpass(){
    if($this->request->is(['patch','post','put'])){
        $email1 = $this->request->data('email');
        $this->loadModel('Users');
        $users = $this->Users->find('all')
        ->where(['email'=>$email1]);

        if($users->isEmpty()){
            $this->Flash->error(__('Email chưa được đăng ký'));
        }else{
            $min = 100000;
            $max = 999999;
            $newpass= rand($min,$max);
        //gui mail
            $email = new Email('default');
            $email->from(['viet161095@gmail.com' => 'Website So Sánh Sản Phẩm'])
            ->to($email1)
            ->subject('Thay đổi mật khẩu')
            ->send('Mật khẩu mới : '.$newpass);
            
        //cap nhat csdl
            $idUser= '';
            $emailUser='';
            foreach($users as $user ){
                $idUser =$user['id'];
                $emailUser = $user['email'];
            }
            

            $usersTable = TableRegistry::get('Users');
            $user = $usersTable->get($idUser);
            $user->password = $newpass;
            $usersTable->save($user);

            $this->Flash->success(__('Mật khẩu đã được gửi tới mail của bạn'));
            return $this->redirect(['action'=>'login']);
        }   
    } 
}



}
