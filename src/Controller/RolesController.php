<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 *
 * @method \App\Model\Entity\Role[] paginate($object = null, array $settings = [])
 */
class RolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
// trang index chức vụ admin    
    public function index()
    {if($this->Auth->user('roles_id') == 1){
        $roles = $this->paginate($this->Roles);
        $this->paginate = ['limit'=>10,
        'contain' => [],
        'order'=>['id'=>'asc']
    ]; 
    $roles = $this->paginate($this->Roles);
    $this->set(compact('roles'));
    $this->set('_serialize', ['roles']);
}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
// Xem thông tin chức vụ    
    public function view($id = null)
    {if($this->Auth->user('roles_id') == 1){
        $role = $this->Roles->get($id, [
            'contain' => []
        ]);

        $this->set('role', $role);
        $this->set('_serialize', ['role']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
// thêm chức vụ admin    
    public function add()
    {if($this->Auth->user('roles_id') == 1){
        $role = $this->Roles->newEntity();
        if ($this->request->is('post')) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
            $time = Time::now();
            
            $time->timezone = 'Asia/Ho_Chi_Minh';
            // $time= str_replace(array(' ','/',':','_',',','-'),array(''),$time);
            
            $role->set('tgtao', $time);
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('Thành Công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!!.'));
        }
        $this->set(compact('role'));
        $this->set('_serialize', ['role']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Edit method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
// trang chỉnh sửa chức vụ admin    
    public function edit($id = null)
    {if($this->Auth->user('roles_id') == 1){
        $role = $this->Roles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('Thành Công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!!'));
        }
        $this->set(compact('role'));
        $this->set('_serialize', ['role']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Delete method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
// Xoá chức vụ admin    
    public function delete($id = null)
    {if($this->Auth->user('roles_id') == 1){
        $this->request->allowMethod(['post', 'delete']);
        $role = $this->Roles->get($id);
         //Lỗi khoá ngoại
        $this->loadModel('Users');
        $u = $this->Users->find('all')
        ->where(['roles_id' => $id]);
        $this->set('u', $u);
        $this->set('_serialize', ['u']);

        if(!$u->isEmpty()){
            $this->Flash->error(__('Có dữ liệu liên kết, không thể xóa!'));
            return $this->redirect(['action' => 'index']);
        } 

        if($u->isEmpty()){
            if ($this->Roles->delete($role)) {
                $this->Flash->success(__('Thành Công'));
            } else {
                $this->Flash->error(__('Lỗi !!!'));
            }
        }

        return $this->redirect(['action' => 'index']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}
// trang tìm kiếm chức vụ admin
public function search()
{if($this->Auth->user('roles_id') == 1){
   
    $this->paginate = [
        'contain' => []
    ]; 
    if ($this->request->is('post')) {
        $value = $this->request->getData('sr');    
    }
    $kq = $this->Roles->find('all')
    ->where(['id '=> $value ])            
    ->orWhere(['ten LIKE' => '%'.$value.'%']);       
    
    
    $this->set(compact('kq'));
    $this->set('_serialize', ['kq']);

}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}
}
