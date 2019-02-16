<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Mau Controller
 *
 * @property \App\Model\Table\MauTable $Mau
 *
 * @method \App\Model\Entity\Mau[] paginate($object = null, array $settings = [])
 */
class MauController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    
    // Trang index màu admin
    public function index()
    {if($this->Auth->user('roles_id') == 1){
        $this->paginate = ['limit'=>10,
        'contain' => [],
        'order'=>['id'=>'asc']
    ]; 
    $mau = $this->paginate($this->Mau);

    $this->set(compact('mau'));
    $this->set('_serialize', ['mau']);
}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * View method
     *
     * @param string|null $id Mau id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    // Trang xem thông tin màu admin
    public function view($id = null)
    {if($this->Auth->user('roles_id') == 1){
        $mau = $this->Mau->get($id, [
            'contain' => ['Sanpham']
        ]);

        $this->set('mau', $mau);
        $this->set('_serialize', ['mau']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */

    // Trang thêm màu admin
    public function add()
    {if($this->Auth->user('roles_id') == 1){
        $mau = $this->Mau->newEntity();
        if ($this->request->is('post')) {
            $mau = $this->Mau->patchEntity($mau, $this->request->getData());
            Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
            $time = Time::now();
            
            $time->timezone = 'Asia/Ho_Chi_Minh';
            // $time= str_replace(array(' ','/',':','_',',','-'),array(''),$time);
            
            $mau->set('tgtao', $time);
            $mau->set('tgsua', 'Chưa Có Chỉnh Sửa');
            $mau->set('idnguoitao',$this->Auth->user('id')); 
            if ($this->Mau->save($mau)) {
                $this->Flash->success(__('Thành Công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!!'));
        }
        $this->set(compact('mau'));
        $this->set('_serialize', ['mau']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Edit method
     *
     * @param string|null $id Mau id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    // Trang chỉnh sửa màu admin
    public function edit($id = null)
    {if($this->Auth->user('roles_id') == 1){
        $mau = $this->Mau->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mau = $this->Mau->patchEntity($mau, $this->request->getData());
            Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
            $time = Time::now();
            
            $time->timezone = 'Asia/Ho_Chi_Minh';
            $mau->set('idnguoisua',$this->Auth->user('id'));
            $mau->set('tgsua', $time);
            if ($this->Mau->save($mau)) {
                $this->Flash->success(__('Thành Công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!!'));
        }
        $this->set(compact('mau'));
        $this->set('_serialize', ['mau']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Delete method
     *
     * @param string|null $id Mau id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // Xoá màu admin
    public function delete($id = null)
    {if($this->Auth->user('roles_id') == 1){
        $this->request->allowMethod(['post', 'delete']);
        $mau = $this->Mau->get($id);
         //Lỗi khoá ngoại
        $this->loadModel('Sanpham');
        $sp = $this->Sanpham->find('all')
        ->where(['mau_id' => $id]);
        $this->set('sp', $sp);
        $this->set('_serialize', ['sp']);

        if(!$sp->isEmpty()){
            $this->Flash->error(__('Có dữ liệu liên kết, không thể xóa!'));
            return $this->redirect(['action' => 'index']);
        } 


        if($sp->isEmpty()){
            if ($this->Mau->delete($mau)) {
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

    //Trang tìm kiếm màu admin
public function search()
{if($this->Auth->user('roles_id') == 1){
   
    $this->paginate = [
        'contain' => []
    ]; 
    if ($this->request->is('post')) {
        $value = $this->request->getData('sr');    
    }
    $kq = $this->Mau->find('all')
    ->where(['id '=> $value ])           
    ->orWhere(['ten LIKE' => '%'.$value.'%']);       
    
    
    $this->set(compact('kq'));
    $this->set('_serialize', ['kq']);

}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}

}
