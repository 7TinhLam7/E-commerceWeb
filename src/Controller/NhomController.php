<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
/**
 * Nhom Controller
 *
 * @property \App\Model\Table\NhomTable $Nhom
 *
 * @method \App\Model\Entity\Nhom[] paginate($object = null, array $settings = [])
 */
class NhomController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    //Trang index nhóm admin
    public function index()
    {if($this->Auth->user('roles_id') == 1){
        $nhom = $this->paginate($this->Nhom);
        $this->paginate = ['limit'=>10,
        'contain' => [],
        'order'=>['id'=>'asc']
    ]; 
    $nhom = $this->paginate($this->Nhom);
    $this->set(compact('nhom'));
    $this->set('_serialize', ['nhom']);
}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * View method
     *
     * @param string|null $id Nhom id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // Trang xem thông tin nhóm admin
    public function view($id = null)
    {if($this->Auth->user('roles_id') == 1){
        $nhom = $this->Nhom->get($id, [
            'contain' => []
        ]);

        $this->set('nhom', $nhom);
        $this->set('_serialize', ['nhom']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    // Trang thêm nhóm admin
    public function add()
    {if($this->Auth->user('roles_id') == 1){
        $nhom = $this->Nhom->newEntity();
        if ($this->request->is('post')) {
            $nhom = $this->Nhom->patchEntity($nhom, $this->request->getData());
            Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
            $time = Time::now();
            
            $time->timezone = 'Asia/Ho_Chi_Minh';
            // $time= str_replace(array(' ','/',':','_',',','-'),array(''),$time);
            

            $nhom->set('tgtao', $time);
            $nhom->set('tgsua', 'Chưa Có Chỉnh Sửa');
            $nhom->set('idnguoitao',$this->Auth->user('id'));
            if ($this->Nhom->save($nhom)) {
                $this->Flash->success(__('Thành Công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!!'));
        }
        $this->set(compact('nhom'));
        $this->set('_serialize', ['nhom']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Edit method
     *
     * @param string|null $id Nhom id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    // Trang chỉnh sửa nhóm admin
    public function edit($id = null)
    {if($this->Auth->user('roles_id') == 1){
        $nhom = $this->Nhom->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nhom = $this->Nhom->patchEntity($nhom, $this->request->getData());
            Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
            $time = Time::now();
            
            $time->timezone = 'Asia/Ho_Chi_Minh';
            $nhom->set('idnguoisua',$this->Auth->user('id'));
            
            $nhom->set('tgsua', $time);
            if ($this->Nhom->save($nhom)) {
                $this->Flash->success(__('Thành Công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!!'));
        }
        $this->set(compact('nhom'));
        $this->set('_serialize', ['nhom']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Delete method
     *
     * @param string|null $id Nhom id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // Xoá nhóm admin
    public function delete($id = null)
    {if($this->Auth->user('roles_id') == 1){
        $this->request->allowMethod(['post', 'delete']);
        $nhom = $this->Nhom->get($id);
        //Lỗi khoá ngoại
        $this->loadModel('Loai');
        $l = $this->Loai->find('all')
        ->contain(['Nhom'])
        ->where(['nhom_id' => $id]);
        $this->set('l', $l);
        $this->set('_serialize', ['l']);

        if(!$l->isEmpty()){
            $this->Flash->error(__('Có dữ liệu liên kết, không thể xóa!'));
            return $this->redirect(['action' => 'index']);
        } 


        if($l->isEmpty()){
            if ($this->Nhom->delete($nhom)) {
                $this->Flash->success(__('Thành Công'));
            } else {
                $this->Flash->error(__('Lỗi'));
                return $this->redirect(['action'=>'index']);
            }
        }

        return $this->redirect(['action' => 'index']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}
    // Trang tìm kiếm nhóm admin
public function search()
{if($this->Auth->user('roles_id') == 1){
   
    $this->paginate = [
        'contain' => ['Loai']
    ]; 
    if ($this->request->is('post')) {
        $value = $this->request->getData('sr');    
    }
    $kq = $this->Nhom->find('all')
    ->where(['id '=> $value ])        
    ->orWhere(['Nhom.ten LIKE' => '%'.$value.'%']);       
    
    
    $this->set(compact('kq'));
    $this->set('_serialize', ['kq']);

}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}
}
