<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Diemdg Controller
 *
 * @property \App\Model\Table\DiemdgTable $Diemdg
 *
 * @method \App\Model\Entity\Diemdg[] paginate($object = null, array $settings = [])
 */
class DiemdgController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    // Trang index điểm đánh giá
    public function index()
    {if($this->Auth->user('roles_id') == 1){
        $this->paginate = ['limit'=>10,
        'contain' => [],
        'order'=>['id'=>'asc']
    ];
    
    $diemdg = $this->paginate($this->Diemdg);

    $this->set(compact('diemdg'));
    $this->set('_serialize', ['diemdg']);

}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * View method
     *
     * @param string|null $id Diemdg id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // Trang xem thông tin điểm đánh giá
    public function view($id = null)
    {if($this->Auth->user('roles_id') == 1){
       
        $diemdg = $this->Diemdg->get($id, [
            'contain' => ['Danhgia']
        ]);

        $this->set('diemdg', $diemdg);
        $this->set('_serialize', ['diemdg']);

    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    // Trang thêm điểm đánh giá admin
    public function add()
    {if($this->Auth->user('roles_id') == 1){
     
        $diemdg = $this->Diemdg->newEntity();
        if ($this->request->is('post')) {
            $diemdg = $this->Diemdg->patchEntity($diemdg, $this->request->getData());
            Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
            $time = Time::now();
            
            $time->timezone = 'Asia/Ho_Chi_Minh';
            // $time= str_replace(array(' ','/',':','_',',','-'),array(''),$time);
            
            $diemdg->set('tgtao', $time);
            $diemdg->set('tgsua', 'Chưa Có Chỉnh Sửa');
            $diemdg->set('idnguoitao',$this->Auth->user('id'));
            if ($this->Diemdg->save($diemdg)) {
                $this->Flash->success(__('Thành Công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!!'));
        }
        $this->set(compact('diemdg'));
        $this->set('_serialize', ['diemdg']);

    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Edit method
     *
     * @param string|null $id Diemdg id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    // Trang chỉnh sửa điểm đánh giá admin
    public function edit($id = null)
    {if($this->Auth->user('roles_id') == 1){
       
        $diemdg = $this->Diemdg->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $diemdg = $this->Diemdg->patchEntity($diemdg, $this->request->getData());
            Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
            $time = Time::now();
            
            $time->timezone = 'Asia/Ho_Chi_Minh';
            $diemdg->set('idnguoisua',$this->Auth->user('id'));
            
            $diemdg->set('tgsua', $time);
            if ($this->Diemdg->save($diemdg)) {
                $this->Flash->success(__('Thành Công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!!'));
        }
        $this->set(compact('diemdg'));
        $this->set('_serialize', ['diemdg']);

    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Delete method
     *
     * @param string|null $id Diemdg id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    //Xoá điểm đánh giá admin
    public function delete($id = null)
    {if($this->Auth->user('roles_id') == 1){
       
        $this->request->allowMethod(['post', 'delete']);
        $diemdg = $this->Diemdg->get($id);
         //Lỗi khoá ngoại
        $this->loadModel('Danhgia');
        $dg = $this->Danhgia->find('all')
        ->where(['diemdg_id' => $id]);
        $this->set('dg', $dg);
        $this->set('_serialize', ['dg']);

        if(!$dg->isEmpty()){
            $this->Flash->error(__('Có dữ liệu liên kết, không thể xóa!'));
            return $this->redirect(['action' => 'index']);
        } 


        if($dg->isEmpty()){
            if ($this->Diemdg->delete($diemdg)) {
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
    // Trang tìm kiếm điểm đánh giá admin
public function search()
{if($this->Auth->user('roles_id') == 1){
   
    $this->paginate = [
        'contain' => []
    ]; 
    if ($this->request->is('post')) {
        $value = $this->request->getData('sr');    
    }
    $kq = $this->Diemdg->find('all')
    ->where(['id '=> $value ])        
    ->orWhere(['diem '=> $value ]);       
    
    
    $this->set(compact('kq'));
    $this->set('_serialize', ['kq']);

}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}
}
