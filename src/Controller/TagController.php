<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Tag Controller
 *
 * @property \App\Model\Table\TagTable $Tag
 *
 * @method \App\Model\Entity\Tag[] paginate($object = null, array $settings = [])
 */
class TagController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {   $this->paginate = ['limit'=>10,
    'contain' => [],
    'order'=>['id'=>'asc']
];
$tag = $this->paginate($this->Tag);

$this->set(compact('tag'));
$this->set('_serialize', ['tag']);
}

    /**
     * View method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tag = $this->Tag->get($id, [
            'contain' => []
        ]);

        $this->set('tag', $tag);
        $this->set('_serialize', ['tag']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tag = $this->Tag->newEntity();
        if ($this->request->is('post')) {
            $tag = $this->Tag->patchEntity($tag, $this->request->getData());
            Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
            $time = Time::now();
            
            $time->timezone = 'Asia/Ho_Chi_Minh';
            
            $tag->set('tgtao', $time);
            $tag->set('tgsua', 'Chưa Có Chỉnh Sửa');
            $tag->set('idnguoitao',$this->Auth->user('id'));
            if ($this->Tag->save($tag)) {
                $this->Flash->success(__('Thành Công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!!'));
        }
        $this->set(compact('tag'));
        $this->set('_serialize', ['tag']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tag = $this->Tag->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tag = $this->Tag->patchEntity($tag, $this->request->getData());
            Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
            $time = Time::now();
            
            $time->timezone = 'Asia/Ho_Chi_Minh';
            $tag->set('idnguoisua',$this->Auth->user('id'));
            
            $tag->set('tgsua', $time);
            if ($this->Tag->save($tag)) {
                $this->Flash->success(__('Thành Công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!!'));
        }
        $this->set(compact('tag'));
        $this->set('_serialize', ['tag']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tag = $this->Tag->get($id);
        //Lỗi khoá ngoại
        $this->loadModel('Sanpham');
        $sp = $this->Sanpham->find('all')
        ->where(['tag_id' => $id]);
        $this->set('sp', $sp);
        $this->set('_serialize', ['sp']);

        if(!$sp->isEmpty()){
            $this->Flash->error(__('Có dữ liệu liên kết, không thể xóa!'));
            return $this->redirect(['action' => 'index']);
        } 


        if($sp->isEmpty()){
            if ($this->Tag->delete($tag)) {
                $this->Flash->success(__('Thành Công'));
            } else {
                $this->Flash->error(__('Lỗi !!!'));
            }
        }

        return $this->redirect(['action' => 'index']);
    }

    public function search()
    {if($this->Auth->user('roles_id') == 1){
       
        $this->paginate = [
            'contain' => []
        ]; 
        if ($this->request->is('post')) {
            $value = $this->request->getData('sr');    
        }
        $kq = $this->Tag->find('all')
        ->where(['id '=> $value ])          
        ->orWhere(['ten LIKE' => '%'.$value.'%']);       
        
        
        $this->set(compact('kq'));
        $this->set('_serialize', ['kq']);

    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}
}
