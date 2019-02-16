<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Event\Event;
/**
 * sanphamcc Controller
 *
 * @property \App\Model\Table\sanphamccTable $sanphamcc
 *
 * @method \App\Model\Entity\sanphamcc[] paginate($object = null, array $settings = [])
 */
class SanphamccController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
// trang index sản phẩm cung cấp    
    public function index()
    {if($this->Auth->user('roles_id') == 1){
        $this->paginate = ['limit' => 10,
        'contain' => ['Sanpham', 'Nhacc'],
        'order'=>['id'=>'asc']
    ];
    $sanphamcc = $this->paginate($this->Sanphamcc);

    $this->set(compact('sanphamcc'));
    $this->set('_serialize', ['sanphamcc']);
}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * View method
     *
     * @param string|null $id sanphamcc id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
// trang xem thông tin sản phẩm cung cấp   
    public function view($id = null)
    {if($this->Auth->user('roles_id') == 1){
        $sanphamcc = $this->Sanphamcc->get($id, [
            'contain' => ['Sanpham', 'Nhacc']
        ]);

        $this->set('sanphamcc', $sanphamcc);
        $this->set('_serialize', ['sanphamcc']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
// thêm sản phẩm cung cấp admin    
    public function add()
    {if($this->Auth->user('roles_id') == 1){
        $sanphamcc = $this->Sanphamcc->newEntity();
        if ($this->request->is('post')) {
            $sanphamcc = $this->Sanphamcc->patchEntity($sanphamcc, $this->request->getData());
            Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
            $time = Time::now();
            
            $time->timezone = 'Asia/Ho_Chi_Minh';
            // $time= str_replace(array(' ','/',':','_',',','-'),array(''),$time);
            
            $sanphamcc->set('tgtao', $time);
            $sanphamcc->set('tgsua', 'Chưa có chỉnh sửa');
            $sanphamcc->set('idnguoitao',$this->Auth->user('id'));

            if ($this->Sanphamcc->save($sanphamcc)) {
                $this->Flash->success(__('Thành Công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!!'));
        }
        $sanpham = $this->Sanphamcc->Sanpham->find('list', ['limit' => 200]);
        $nhacc = $this->Sanphamcc->Nhacc->find('list', ['limit' => 200]);
        $this->set(compact('sanphamcc', 'sanpham', 'nhacc'));
        $this->set('_serialize', ['sanphamcc']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Edit method
     *
     * @param string|null $id sanphamcc id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
// Chỉnh sửa sản phẩm cung cấp admin   
    public function edit($id = null)
    {if($this->Auth->user('roles_id') == 1){
        $sanphamcc = $this->Sanphamcc->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sanphamcc = $this->Sanphamcc->patchEntity($sanphamcc, $this->request->getData());
            Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
            $time = Time::now();
            
            $time->timezone = 'Asia/Ho_Chi_Minh';
            $sanphamcc->set('idnguoisua',$this->Auth->user('id'));
            $sanphamcc->set('tgsua', $time);
            if ($this->Sanphamcc->save($sanphamcc)) {
                $this->Flash->success(__('Thành Công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!!'));
        }
        $sanpham = $this->Sanphamcc->Sanpham->find('list', ['limit' => 200]);
        $nhacc = $this->Sanphamcc->Nhacc->find('list', ['limit' => 200]);
        $this->set(compact('sanphamcc', 'sanpham', 'nhacc'));
        $this->set('_serialize', ['sanphamcc']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Delete method
     *
     * @param string|null $id sanphamcc id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
// xoá sản phẩm cung cấp admin    
    public function delete($id = null)
    {if($this->Auth->user('roles_id') == 1){
        $this->request->allowMethod(['post', 'delete']);
        $sanphamcc = $this->Sanphamcc->get($id);
        if ($this->Sanphamcc->delete($sanphamcc)) {
            $this->Flash->success(__('Thành Công'));
        } else {
            $this->Flash->error(__('Lỗi !!!'));
        }

        return $this->redirect(['action' => 'index']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}
//tìm kiếm sản phẩm cung cấp admin
public function search()
{if($this->Auth->user('roles_id') == 1){
   
    $this->paginate = [
        'contain' => ['Sanpham','Nhacc']
    ]; 
    if ($this->request->is('post')) {
        $value = $this->request->getData('sr');    
    }
    $kq = $this->Sanphamcc->find('all')
    ->contain(['Sanpham','Nhacc'])
    ->where(['Sanphamcc.id '=> $value ])        
    ->orWhere(['Sanphamcc.gia '=> $value ])        
    ->orWhere(['Sanpham.id '=> $value ])        
    ->orWhere(['Nhacc.id '=> $value ])        
    ->orWhere(['Sanpham.ten LIKE' => '%'.$value.'%'])     
    ->orWhere(['Nhacc.ten LIKE' => '%'.$value.'%']);       
    
    
    $this->set(compact('kq'));
    $this->set('_serialize', ['kq']);

}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}
}

