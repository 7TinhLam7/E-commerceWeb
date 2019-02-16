<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
/**
 * Nhacc Controller
 *
 * @property \App\Model\Table\NhaccTable $Nhacc
 *
 * @method \App\Model\Entity\Nhacc[] paginate($object = null, array $settings = [])
 */
class NhaccController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    //Trang index nhà cung cấp
    public function index()
    {if($this->Auth->user('roles_id') == 1){
        $this->paginate = ['limit'=>10,
        'contain' => [],
        'order'=>['id'=>'asc']
    ]; 
    $nhacc = $this->paginate($this->Nhacc);

    $this->set(compact('nhacc'));
    $this->set('_serialize', ['nhacc']);
}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * View method
     *
     * @param string|null $id Nhacc id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    //Trang xem thông tin nhà cung cấp admin
    public function view($id = null)
    {if($this->Auth->user('roles_id') == 1){
        $nhacc = $this->Nhacc->get($id, [
            'contain' => []
        ]);

        $this->set('nhacc', $nhacc);
        $this->set('_serialize', ['nhacc']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    //Trang thêm nhà cung cấp admin
    public function add()
    {if($this->Auth->user('roles_id') == 1){
        $nhacc = $this->Nhacc->newEntity();
        if ($this->request->is('post')) {
            $nhacc = $this->Nhacc->patchEntity($nhacc, $this->request->getData());
            Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
            $time = Time::now();
            
            $time->timezone = 'Asia/Ho_Chi_Minh';
            // $time= str_replace(array(' ','/',':','_',',','-'),array(''),$time);
            
            $nhacc->set('tgtao', $time);
            $nhacc->set('tgsua', 'Chưa Có Chỉnh Sửa');
            $nhacc->set('idnguoitao', $this->Auth->user('id'));
            if ($this->Nhacc->save($nhacc)) {
                $this->Flash->success(__('Thành Công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!!'));
        }
        $this->set(compact('nhacc'));
        $this->set('_serialize', ['nhacc']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Edit method
     *
     * @param string|null $id Nhacc id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    //Trang chỉnh sửa nhà cung cấp admin
    public function edit($id = null)
    {if($this->Auth->user('roles_id') == 1){
        $nhacc = $this->Nhacc->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nhacc = $this->Nhacc->patchEntity($nhacc, $this->request->getData());
            Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
            $time = Time::now();
            
            $time->timezone = 'Asia/Ho_Chi_Minh';
            // $time= str_replace(array(' ','/',':','_',',','-'),array(''),$time);
            
            
            $nhacc->set('tgsua', $time);
            $nhacc->set('idnguoisua', $this->Auth->user('id'));
            if ($this->Nhacc->save($nhacc)) {
                $this->Flash->success(__('Thành Công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!!'));
        }
        $this->set(compact('nhacc'));
        $this->set('_serialize', ['nhacc']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Delete method
     *
     * @param string|null $id Nhacc id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    //Xoá nhà cung cấp admin
    public function delete($id = null)
    {if($this->Auth->user('roles_id') == 1){
        $this->request->allowMethod(['post', 'delete']);
        $nhacc = $this->Nhacc->get($id);
         //Lỗi khoá ngoại
        $this->loadModel('Sanphamcc');
        $spcc = $this->Sanphamcc->find('all')
        ->where(['nhacc_id' => $id]);
        $this->set('spcc', $spcc);
        $this->set('_serialize', ['spcc']);

        if(!$spcc->isEmpty()){
            $this->Flash->error(__('Có dữ liệu liên kết, không thể xóa!'));
            return $this->redirect(['action' => 'index']);
        } 


        if($spcc->isEmpty()){
            if ($this->Nhacc->delete($nhacc)) {
                $this->Flash->success(__('Thành Công'));
            } else {
                $this->Flash->error(__('Lỗi !!!'));
            }

            return $this->redirect(['action' => 'index']);
        }
        else
            return $this->redirect(['controller'=>'users','action'=>'login']);
    }
}


    // Tìm kiếm nhà cung cấp admin
public function search()
{if($this->Auth->user('roles_id') == 1){
   
    $this->paginate = [
        'contain' => []
    ]; 
    if ($this->request->is('post')) {
        $value = $this->request->getData('sr');    
    }
    $kq = $this->Nhacc->find('all')
    ->where(['id '=> $value ])            
    ->orWhere(['ten LIKE' => '%'.$value.'%']);       
    
    
    $this->set(compact('kq'));
    $this->set('_serialize', ['kq']);

}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}
}
