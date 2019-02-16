<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;


/**
 * Phankhuc Controller
 *
 * @property \App\Model\Table\PhankhucTable $Phankhuc
 *
 * @method \App\Model\Entity\Phankhuc[] paginate($object = null, array $settings = [])
 */
class PhankhucController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
// trang index phân khúc admin    
    public function index()
    {if($this->Auth->user('roles_id') == 1){
        $this->paginate = ['limit'=>10,
        'contain' => ['Dong'],
        'order'=>['id'=>'asc']
    ];
    $phankhuc = $this->paginate($this->Phankhuc);

    $this->set(compact('phankhuc'));
    $this->set('_serialize', ['phankhuc']);
}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * View method
     *
     * @param string|null $id Phankhuc id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

// trang xem thông tin phân khúc admin    
    public function view($id = null)
    {if($this->Auth->user('roles_id') == 1){
        $phankhuc = $this->Phankhuc->get($id, [
            'contain' => ['Dong']
        ]);

        $this->set('phankhuc', $phankhuc);
        $this->set('_serialize', ['phankhuc']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
// trang thêm phân khúc admin    
    public function add()
    {if($this->Auth->user('roles_id') == 1){
        $phankhuc = $this->Phankhuc->newEntity();
        if ($this->request->is('post')) {
            $phankhuc = $this->Phankhuc->patchEntity($phankhuc, $this->request->getData());
            Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
            $time = Time::now();
            
            $time->timezone = 'Asia/Ho_Chi_Minh';
            // $time= str_replace(array(' ','/',':','_',',','-'),array(''),$time);
            
            $phankhuc->set('tgtao', $time);
            $phankhuc->set('tgsua', 'Chưa Có Chỉnh Sửa');
            $phankhuc->set('idnguoitao',$this->Auth->user('id'));
            if ($this->Phankhuc->save($phankhuc)) {
                $this->Flash->success(__('Thành Công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!'));
        }
        $dong = $this->Phankhuc->Dong->find('list', ['limit' => 200]);
        $this->set(compact('phankhuc', 'dong'));
        $this->set('_serialize', ['phankhuc']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Edit method
     *
     * @param string|null $id Phankhuc id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
// Trang chỉnh sửa phân khúc admin    
    public function edit($id = null)
    {if($this->Auth->user('roles_id') == 1){
        $phankhuc = $this->Phankhuc->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $phankhuc = $this->Phankhuc->patchEntity($phankhuc, $this->request->getData());
            Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
            $time = Time::now();
            
            $time->timezone = 'Asia/Ho_Chi_Minh';
            $phankhuc->set('idnguoisua',$this->Auth->user('id'));
            
            $phankhuc->set('tgsua', $time);
            if ($this->Phankhuc->save($phankhuc)) {
                $this->Flash->success(__('Thành Công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!!'));
        }
        $dong = $this->Phankhuc->Dong->find('list', ['limit' => 200]);
        $this->set(compact('phankhuc', 'dong'));
        $this->set('_serialize', ['phankhuc']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Delete method
     *
     * @param string|null $id Phankhuc id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // Xoá phân khúc admin
    public function delete($id = null)
    {if($this->Auth->user('roles_id') == 1){
        $this->request->allowMethod(['post', 'delete']);
        $phankhuc = $this->Phankhuc->get($id);
        //Lỗi khoá ngoại
        $this->loadModel('Sanpham');
        $sp = $this->Sanpham->find('all')
        ->where(['phankhuc_id' => $id]);
        $this->set('sp', $sp);
        $this->set('_serialize', ['sp']);

        if(!$sp->isEmpty()){
            $this->Flash->error(__('Có dữ liệu liên kết, không thể xóa!'));
            return $this->redirect(['action' => 'index']);
        } 


        if($sp->isEmpty()){
            if ($this->Phankhuc->delete($phankhuc)) {
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


// Trang sản phẩm theo phân khúc 
public function phankhuc($id = null){
   $this->viewBuilder()->layout('frontend');
   $phankhuc = $this->Phankhuc->get($id, [
    'contain' => ["Sanpham"]]);
   $this->set('phankhuc', $this->paginate($this->Phankhuc));    
   $this->set(compact('phankhuc'));
   $this->set('_serialize', ['phankhuc']);
   
   $this->loadModel('Nhom');
   $nhom = $this->Nhom->find('all');
   $this->set(compact('nhom'));
   $this->set('_serialize', ['nhom']);

   $this->loadModel('Loai');
   $loai = $this->Loai->find('all')
   ->contain(['Dong']);
   $this->set(compact('loai'));
   $this->set('_serialize', ['loai']);

   $this->loadModel('Dong');
   $dong = $this->Dong->find('all')
   ->contain(['Phankhuc']);
   $this->set(compact('dong'));
   $this->set('_serialize', ['dong']);    

   

   $this->loadModel('Mau');
   $colors = $this->Mau->find('all');
   $this->set(compact('colors'));
   $this->set('_serialize', ['colors']);
   
   $this->loadModel('Sanpham');
   $tags = $this->Sanpham->find('all')
   ->contain(['Tag'])
   ->where(['phankhuc_id'=> $phankhuc->id])
   ->distinct(['tag_id']);
   $this->set(compact('tags'));
   $this->set('_serialize', ['tags']); 


   

   $this->loadModel('Diemdg');
   $sod= $this->Diemdg->find('all');
   $this->set(compact('sod'));
   $this->set('_serialize', ['sod']);
}


// Trang tìm kiếm nâng cao theo phân khúc
public function searchphankhuc($id = null){
    $this->viewBuilder()->layout('frontend');
    $this->paginate=[
       'contain' => []
   ];
   $phankhuc = $this->Phankhuc->get($id, [
    'contain' => ['Sanpham']]);
   $this->set('phankhuc', $this->paginate($this->Phankhuc));    
   $this->set(compact('phankhuc'));
   $this->set('_serialize', ['phankhuc']);

   $this->loadModel('Nhom');
   $nhom = $this->Nhom->find('all');
   $this->set(compact('nhom'));
   $this->set('_serialize', ['nhom']);

   $this->loadModel('Loai');
   $loai = $this->Loai->find('all')
   ->contain(['Dong']);
   $this->set(compact('loai'));
   $this->set('_serialize', ['loai']);

   $this->loadModel('Dong');
   $dong = $this->Dong->find('all')
   ->contain(['Phankhuc']);
   $this->set(compact('dong'));
   $this->set('_serialize', ['dong']); 

   

   $noidung = '';
   $colors='';
   $giamins= '';
   $giamaxs= '';
   $tags ='';
   $ddgs= '';
   if ($this->request->is(['patch', 'post', 'put'])) {
    $noidung = $this->request->data('noidung');
    
    $colors = $this->request->data('color'); 

    $giamins  = $this->request->data('giamin');

    $giamaxs  = $this->request->data('giamax');    
    
    $ddgs  = $this->request->data('ddg');
    
    $tags  = $this->request->data('tag');


}
if($giamaxs == NULL)
{
    $giamaxs = '9999999999';
}
if($giamins == NULL)
{
    $giamins = '0';
}
if($ddgs == NULL)
{
    $ddgs = '0';
}


$this->loadModel('Sanpham');
$kqtk = $this->Sanpham->find('all')
->contain(['Hangsx', 'Tag', 'Phankhuc','Mau','Diemdg'])
->where([
    'Sanpham.ten LIKE ' => '%'.$noidung.'%',
    'Mau.ten LIKE' => '%'.$colors.'%',
    'Sanpham.diemtb >=' => $ddgs,
    'Tag.ten LIKE' => '%'.$tags.'%',
])
->order(['luotxem'=>'DESC']);
$this->set(compact('kqtk'));
$this->set('_serialize', ['kqtk']);

$this->loadModel('Sanphamcc');
$giasp = $this->Sanphamcc->find('all')
->contain(['Sanpham'])
->where([
    'gia >=' =>$giamins,
    'gia <=' => $giamaxs,
])
->distinct(['sanpham_id']);
$this->set(compact('giasp'));
$this->set('_serialize', ['giasp']);

$this->loadModel('Sanpham');
$tagss = $this->Sanpham->find('all')
->contain(['Tag'])
->where(['phankhuc_id'=> $phankhuc->id])
->distinct(['tag_id']);
$this->set(compact('tagss'));
$this->set('_serialize', ['tagss']); 



$this->loadModel('Mau');
$colorss= $this->Mau->find('all');
$this->set(compact('colorss'));
$this->set('_serialize', ['colorss']);

$this->loadModel('Diemdg');
$sod= $this->Diemdg->find('all');
$this->set(compact('sod'));
$this->set('_serialize', ['sod']);
}
// Trang tìm kiếm phân khúc admin
public function search()
{if($this->Auth->user('roles_id') == 1){
   
    $this->paginate = [
        'contain' => ['Dong']
    ]; 
    if ($this->request->is('post')) {
        $value = $this->request->getData('sr');    
    }
    $kq = $this->Phankhuc->find('all')
    ->contain(['Dong'])
    ->where(['Phankhuc.id '=> $value ])        
    ->orWhere(['Dong.id '=> $value ])        
    ->orWhere(['Dong.ten LIKE' => '%'.$value.'%'])     
    ->orWhere(['Phankhuc.ten LIKE' => '%'.$value.'%']);       
    
    
    $this->set(compact('kq'));
    $this->set('_serialize', ['kq']);

}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}
}
