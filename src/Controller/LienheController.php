<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Lienhe Controller
 *
 * @property \App\Model\Table\LienheTable $Lienhe
 *
 * @method \App\Model\Entity\Lienhe[] paginate($object = null, array $settings = [])
 */
class LienheController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    // Trang index liên hệ admin
    public function index()
    {if($this->Auth->user('roles_id') == 1){
        $this->paginate = ['limit'=>10,
        'contain' => [],
        'order'=>['id'=>'asc']
    ]; 
    
    $lienhe = $this->paginate($this->Lienhe);

    $this->set(compact('lienhe'));
    $this->set('_serialize', ['lienhe']);

}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * View method
     *
     * @param string|null $id Lienhe id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {if($this->Auth->user('roles_id') == 1){
     
        $lienhe = $this->Lienhe->get($id, [
            'contain' => []
        ]);

        $this->set('lienhe', $lienhe);
        $this->set('_serialize', ['lienhe']);

    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    // Form thêm liên hệ
    public function add()
    {
        $lienhe = $this->Lienhe->newEntity();
        if ($this->request->is('post')) {
            $lienhe = $this->Lienhe->patchEntity($lienhe, $this->request->getData());
            
            if ($this->Lienhe->save($lienhe)) {
                $this->Flash->success(__('The lienhe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lienhe could not be saved. Please, try again.'));
        }
        $this->set(compact('lienhe'));
        $this->set('_serialize', ['lienhe']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Lienhe id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    // Trang đọc liên hệ admin
    public function edit($id = null)
    {
        $lienhe = $this->Lienhe->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lienhe = $this->Lienhe->patchEntity($lienhe, $this->request->getData());
            $lienhe->set('trangthai', 'Đã Đọc');
            $lienhe->set('idnguoidoc',$this->Auth->user('id'));
            if ($this->Lienhe->save($lienhe)) {
                $this->Flash->success(__('Đã Đọc'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!!'));
        }
        $this->set(compact('lienhe'));
        $this->set('_serialize', ['lienhe']);
    }



    /**
     * Delete method
     *
     * @param string|null $id Lienhe id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    //Xoá liên hệ  
    public function delete($id = null)
    {if($this->Auth->user('roles_id') == 1){
     
        $this->request->allowMethod(['post', 'delete']);
        $lienhe = $this->Lienhe->get($id);
        if($lienhe['trangthai'] == 'Đã Đọc'){
            if ($this->Lienhe->delete($lienhe)) {
                $this->Flash->success(__('Thành Công'));
            }
        }
        else {
            $this->Flash->error(__('Lỗi !!! Liên Hệ Chưa Đọc'));
        } 

        return $this->redirect(['action' => 'index']);
        
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

// Trang liên hệ
public function lienhe(){
    $this->viewBuilder()->layout('frontend');
    $ad = $this->Lienhe->Users->find('all',['limit'=>1])
    ->where(['roles_id' => 1]);
    $this->set(compact('ad'));
    $this->set('_serialize', ['ad']);

    $lienhe = $this->Lienhe->newEntity();
    if ($this->request->is('post')) {
        $lienhe = $this->Lienhe->patchEntity($lienhe, $this->request->getData());
        $time = Time::now();
        $time->timezone = 'Asia/Ho_Chi_Minh';

        $u = $this->Lienhe->Users->find('all')
        ->where(['roles_id'=> 1]);
        $this->set(compact('u'));
        $this->set('_serialize', ['u']);
        foreach ($u as $us) {
        }
        $lienhe->set('tgtao', $time);
        $lienhe->set('trangthai', 'Chưa Đọc');
        $lienhe->set('users_id',$us['id']);
        if ($this->Lienhe->save($lienhe)) {
            $this->Flash->success(__('Thành Công'));

            return $this->redirect(['action' => 'lienhe']);
        }
        $this->Flash->error(__('LỖI !!!'));
    }
    $this->set(compact('lienhe'));
    $this->set('_serialize', ['lienhe']);
    $this->set(compact('Lienhe'));
}
// Trang tìm kiếm liên hệ admin
public function search()
{if($this->Auth->user('roles_id') == 1){
 
    $this->paginate = [
        'contain' => []
    ]; 
    if ($this->request->is('post')) {
        $value = $this->request->getData('sr');    
    }
    $kq = $this->Lienhe->find('all')
    ->where(['sdt'=> $value ])             
    ->orWhere(['trangthai LIKE' => '%'.$value.'%'])       
    ->orWhere(['email LIKE' => '%'.$value.'%']);       
    
    
    $this->set(compact('kq'));
    $this->set('_serialize', ['kq']);

}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}
}
