<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Danhgia Controller
 *
 * @property \App\Model\Table\DanhgiaTable $Danhgia
 *
 * @method \App\Model\Entity\Danhgium[] paginate($object = null, array $settings = [])
 */
class DanhgiaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    // Trang index đánh giá
    public function index()
    {if($this->Auth->user('roles_id') == 1){
        
        $this->paginate = ['limit'=>10,
        'contain' => ['Users', 'Sanpham', 'Diemdg'],
        'order'=>['id'=>'asc']
    ];
    $danhgia = $this->paginate($this->Danhgia);

    $this->set(compact('danhgia'));
    $this->set('_serialize', ['danhgia']);

}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * View method
     *
     * @param string|null $id Danhgium id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function view($id = null)
    {
        $danhgium = $this->Danhgia->get($id, [
            'contain' => ['Users', 'Sanphams', 'Diemdgs']
        ]);

        $this->set('danhgium', $danhgium);
        $this->set('_serialize', ['danhgium']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        $danhgium = $this->Danhgia->newEntity();
        if ($this->request->is('post')) {
            $danhgium = $this->Danhgia->patchEntity($danhgium, $this->request->getData());
            if ($this->Danhgia->save($danhgium)) {
                $this->Flash->success(__('The danhgium has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The danhgium could not be saved. Please, try again.'));
        }
        $users = $this->Danhgia->Users->find('list', ['limit' => 200]);
        $sanphams = $this->Danhgia->Sanpham->find('list', ['limit' => 200]);
        $diemdgs = $this->Danhgia->Diemdg->find('list', ['limit' => 200]);
        $this->set(compact('danhgium', 'users', 'sanpham', 'diemdg'));
        $this->set('_serialize', ['danhgium']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Danhgium id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    public function edit($id = null)
    {
        $danhgium = $this->Danhgia->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $danhgium = $this->Danhgia->patchEntity($danhgium, $this->request->getData());
            if ($this->Danhgia->save($danhgium)) {
                $this->Flash->success(__('The danhgium has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The danhgium could not be saved. Please, try again.'));
        }
        $users = $this->Danhgia->Users->find('list', ['limit' => 200]);
        $sanphams = $this->Danhgia->Sanphams->find('list', ['limit' => 200]);
        $diemdgs = $this->Danhgia->Diemdgs->find('list', ['limit' => 200]);
        $this->set(compact('danhgium', 'users', 'sanphams', 'diemdgs'));
        $this->set('_serialize', ['danhgium']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Danhgium id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // Xoá đánh giá
    public function delete($id = null)
    {if($this->Auth->user('roles_id') == 1){

        $this->request->allowMethod(['post', 'delete']);
        $danhgium = $this->Danhgia->get($id);
        $sp = $this->Danhgia->Sanpham->find('all')
        ->where(['id'=> $danhgium->sanpham_id]);
        $this->set(compact('sp'));
        foreach($sp as $sps)
            {};

        if ($this->Danhgia->delete($danhgium)) {
         
            $view = $sps->luotxem;
            $sps->luotxem= $view - 1;
            $this->Danhgia->Sanpham->save($sps);
        } else {
            $this->Flash->error(__('Lỗi !!!'));
        }

        return $this->redirect($this->referer());
        
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}
    // Tìm kiếm đánh giá admin
public function search()
{if($this->Auth->user('roles_id') == 1){
   
    $this->paginate = [
        'contain' => ['Sanpham','Users']
    ]; 
    if ($this->request->is('post')) {
        $value = $this->request->getData('sr');    
    }
    $kq = $this->Danhgia->find('all')
    ->contain(['Sanpham','Users'])
    ->where(['sanpham_id '=> $value ]) 
    ->orWhere(['users_id' => $value])      
    ->orWhere(['Users.ten LIKE' => '%'.$value.'%'])     
    ->orWhere(['Sanpham.ten LIKE' => '%'.$value.'%']);     
    
    
    
    $this->set(compact('kq'));
    $this->set('_serialize', ['kq']);

}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}
}
