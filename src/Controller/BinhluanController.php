<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;

/**
 * Binhluan Controller
 *
 * @property \App\Model\Table\BinhluanTable $Binhluan
 *
 * @method \App\Model\Entity\Binhluan[] paginate($object = null, array $settings = [])
 */
class BinhluanController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    // Trang index bình luận admin
    public function index()
    {if($this->Auth->user('roles_id') == 1){
       
        $this->paginate = ['limit'=>10,
        'contain' => ['Users','Sanpham'],
        'order'=>['id'=>'asc']
    ];
    $binhluan = $this->paginate($this->Binhluan);

    $this->set(compact('binhluan'));
    $this->set('_serialize', ['binhluan']);

}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * View method
     *
     * @param string|null $id Binhluan id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // Trang xem thông tin bình luận
    public function view($id = null)
    {if($this->Auth->user('roles_id') == 1){
        
        $binhluan = $this->Binhluan->get($id, [
            'contain' => ['Users', 'Sanpham']
        ]);

        $this->set('binhluan', $binhluan);
        $this->set('_serialize', ['binhluan']);

    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {    if($this->Auth->user('roles_id') == 1){
        
        $binhluan = $this->Binhluan->newEntity();
        if ($this->request->is('post')) {
            $binhluan = $this->Binhluan->patchEntity($binhluan, $this->request->getData());
            $time = Time::now();
            $time->timezone = 'Asia/Ho_Chi_Minh';
            
            $binhluan->set('tgtao',$time);
            $binhluan->set('users_id',$this->Auth->user('id'));
            // $binhluan->set('sanpham_id',$sanpham['id']);
            
            if ($this->Binhluan->save($binhluan)) {
                $this->Flash->success(__('The binhluan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The binhluan could not be saved. Please, try again.'));
        }
        $users = $this->Binhluan->Users->find('list', ['limit' => 200]);
        $sanpham = $this->Binhluan->Sanpham->find('list', ['limit' => 200]);
        $this->set(compact('binhluan', 'users', 'sanpham'));
        $this->set('_serialize', ['binhluan']);

    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Edit method
     *
     * @param string|null $id Binhluan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    public function edit($id = null)
    {if($this->Auth->user('roles_id') == 1){
       
        $binhluan = $this->Binhluan->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $binhluan = $this->Binhluan->patchEntity($binhluan, $this->request->getData());
            if ($this->Binhluan->save($binhluan)) {
                $this->Flash->success(__('The binhluan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The binhluan could not be saved. Please, try again.'));
        }
        $users = $this->Binhluan->Users->find('list', ['limit' => 200]);
        $sanpham = $this->Binhluan->Sanpham->find('list', ['limit' => 200]);
        $this->set(compact('binhluan', 'users', 'sanpham'));
        $this->set('_serialize', ['binhluan']);

    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Delete method
     *
     * @param string|null $id Binhluan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // Xoá bình luận admin
    public function delete($id = null)
    {
       
        $this->request->allowMethod(['post', 'delete']);
        $binhluan = $this->Binhluan->get($id);
        if ($this->Binhluan->delete($binhluan)) {
            $this->Flash->success(__('Thành Công'));
        } else {
            $this->Flash->error(__('Lỗi !!!'));
        }
        return $this->redirect(['action' => 'index']);
    }
    // Xoá bình luận
    public function deletecomment()
    {
        $comment_id = $this->request->data('comment_id');
        
        $this->loadModel('Binhluan');
        $this->Binhluan->query()
        ->delete()
        ->where(['id' => $comment_id])
        ->execute();
        // $query = $comments->query();
        // $query->delete()
        //     ->where(['id' => $$comment_id])
        //     ->execute();

        exit();
    }
    // Thêm bình luận
    public function addcomment()
    {
        $user_id = $this->Auth->user('id');
        $sp_id = $this->request->data('sp_id');
        $noidung = $this->request->data('noidung');
        Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
        $time = Time::now();
        $time->timezone = 'Asia/Ho_Chi_Minh';

        $bls= TableRegistry::get('Binhluan');

        $bl = $bls->newEntity();
        
        $bl['users_id'] = $user_id;
        $bl['sanpham_id'] = $sp_id;
        $bl['noidung'] = $noidung;
        $bl['tgtao'] = $time;

        $bls->save($bl);

        
        
    }
    // Tìm kiếm bình luận admin
    public function search()
    {if($this->Auth->user('roles_id') == 1){
       
        $this->paginate = [
            'contain' => ['Sanpham','Users']
        ]; 
        if ($this->request->is('post')) {
            $value = $this->request->getData('sr');    
        }
        $kq = $this->Binhluan->find('all')
        ->contain(['Sanpham','Users'])
        ->where(['sanpham_id '=> $value ]) 
        ->orWhere(['users_id' => $value])       
        ->orWhere(['Sanpham.ten LIKE' => '%'.$value.'%'])     
        ->orWhere(['Users.ten LIKE' => '%'.$value.'%']);       
        
        
        $this->set(compact('kq'));
        $this->set('_serialize', ['kq']);

    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}



}
