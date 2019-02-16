<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Hangsx Controller
 *
 * @property \App\Model\Table\HangsxTable $Hangsx
 *
 * @method \App\Model\Entity\Hangsx[] paginate($object = null, array $settings = [])
 */
class HangsxController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    // Trang index hãng sản phẩm 
    public function index()
    {if($this->Auth->user('roles_id') == 1){
        $this->paginate = ['limit'=>10,
        'contain' => [],
        'order'=>['id'=>'asc']
    ];
    
    $hangsx = $this->paginate($this->Hangsx);

    $this->set(compact('hangsx'));
    $this->set('_serialize', ['hangsx']);

}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * View method
     *
     * @param string|null $id Hangsx id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // Trang xem thông tin hãng sản phẩm
    public function view($id = null)
    {if($this->Auth->user('roles_id') == 1){
       
        $hangsx = $this->Hangsx->get($id, [
            'contain' => []
        ]);

        $this->set('hangsx', $hangsx);
        $this->set('_serialize', ['hangsx']);

    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    // Trang thêm hãng sản xuất admin
    public function add()
    {if($this->Auth->user('roles_id') == 1){
       
        $hangsx = $this->Hangsx->newEntity();
        if ($this->request->is('post')) {
            $hangsx = $this->Hangsx->patchEntity($hangsx, $this->request->getData());
            Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
            $time = Time::now();
            
            $time->timezone = 'Asia/Ho_Chi_Minh';
            // $time= str_replace(array(' ','/',':','_',',','-'),array(''),$time);
            
            $hangsx->set('tgtao', $time);
            $hangsx->set('tgsua', 'Chưa Có Chỉnh Sửa');
            $hangsx->set('idnguoitao',$this->Auth->user('id'));
            if ($this->Hangsx->save($hangsx)) {
                $this->Flash->success(__('Thành Công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!!'));
        }
        $this->set(compact('hangsx'));
        $this->set('_serialize', ['hangsx']);

    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Edit method
     *
     * @param string|null $id Hangsx id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    // Trang chỉnh sửa hãng sản xuất admin
    public function edit($id = null)
    {if($this->Auth->user('roles_id') == 1){
       
        $hangsx = $this->Hangsx->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hangsx = $this->Hangsx->patchEntity($hangsx, $this->request->getData());
            Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
            $time = Time::now();
            
            $time->timezone = 'Asia/Ho_Chi_Minh';
            $hangsx->set('tgsua', $time);
            $hangsx->set('idnguoisua',$this->Auth->user('id'));
            if ($this->Hangsx->save($hangsx)) {
                $this->Flash->success(__('Thành Công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!!'));
        }
        $this->set(compact('hangsx'));
        $this->set('_serialize', ['hangsx']);
        
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Delete method
     *
     * @param string|null $id Hangsx id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // Xoá hãng sản xuất admin
    public function delete($id = null)
    {if($this->Auth->user('roles_id') == 1){
        
        $this->request->allowMethod(['post', 'delete']);
        $hangsx = $this->Hangsx->get($id);
         //Lỗi khoá ngoại
        $this->loadModel('Sanpham');
        $sp = $this->Sanpham->find('all')
        ->where(['hangsx_id' => $id]);
        $this->set('sp', $sp);
        $this->set('_serialize', ['sp']);

        if(!$sp->isEmpty()){
            $this->Flash->error(__('Có dữ liệu liên kết, không thể xóa!'));
            return $this->redirect(['action' => 'index']);
        } 


        if($sp->isEmpty()){
            if ($this->Hangsx->delete($hangsx)) {
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
    //Trang sản phẩm theo hãng sản xuất
public function hangsx($id = null){
   $this->viewBuilder()->layout('frontend');
   $this->paginate=[
       'contain' => []
   ];
   $hangsx = $this->Hangsx->get($id, [
    'contain' => ["Sanpham"]]);
   
   $this->loadModel('Sanpham');
   $sp= $this->Sanpham->find('all')
   ->where(['hangsx_id'=>$hangsx->id])
   ->order(['luotxem'=>'DESC']);
   $this->set(compact('sp'));
   $this->set('_serialize', ['sp']);
   
   $this->set(compact('hangsx'));
   $this->set('_serialize', ['hangsx']);

   

   $this->loadModel('Sanpham');
   $tags = $this->Sanpham->find('all')
   ->contain(['Tag'])
   ->where(['hangsx_id'=> $hangsx->id])
   ->distinct(['tag_id']);
   $this->set(compact('tags'));
   $this->set('_serialize', ['tags']);
   
   $this->loadModel('Loai');
   $l = $this->Loai->find('all')
   ->contain(['Dong']);
   $this->set(compact('l'));
   $this->set('_serialize', ['l']);

   $this->loadModel('Dong');
   $d = $this->Dong->find('all')
   ->contain(['Phankhuc']);
   $this->set(compact('d'));
   $this->set('_serialize', ['d']);

   $this->loadModel('Phankhuc');
   $k = $this->Phankhuc->find('all')
   ->contain(['Sanpham']);
   $this->set(compact('k'));
   $this->set('_serialize', ['k']); 

   $this->loadModel('Mau');
   $colors = $this->Mau->find('all');
   $this->set(compact('colors'));
   $this->set('_serialize', ['colors']);

   $this->loadModel('Diemdg');
   $sod= $this->Diemdg->find('all');
   $this->set(compact('sod'));
   $this->set('_serialize', ['sod']);


}
    //Trang tìm kiếm sản phẩm theo hãng sản xuất
public function searchhang($id = null){
    $this->viewBuilder()->layout('frontend');
    $this->paginate=[
       'contain' => []
   ];
   $hangsx = $this->Hangsx->get($id, [
    'contain' => ["Sanpham"]]);
   $noidung = '';
   $tags = '';
   $colors='';
   $giamins= '';
   $giamaxs= '';
   $ls='';
   $ddgs= '';
   
   if ($this->request->is(['patch', 'post', 'put'])) {
    
    $noidung = $this->request->data('noidung');
    
    $ls = $this->request->data('kind');
    
    $tags = $this->request->data('tag');
    
    $colors = $this->request->data('color');
    
    $giamins  = $this->request->data('giamin');

    $giamaxs  = $this->request->data('giamax');    
    
    $ddgs  = $this->request->data('ddg');          
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
->contain(['Hangsx', 'Tag', 'Phankhuc','Mau'])
->where([
    'Sanpham.ten LIKE ' => '%'.$noidung.'%',
    'Tag.ten LIKE' => '%'.$tags.'%',
    'Mau.ten LIKE' => '%'.$colors.'%',
    'Sanpham.hangsx_id' => $hangsx->id,
    'Sanpham.diemtb >=' => $ddgs,
]);
$this->set(compact('kqtk','tags','hangsx','tagss','colors'));
$this->set('_serialize', ['kqtk','tags']);

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

$this->loadModel('Loai');
$l = $this->Loai->find('all')
->contain(['Dong'])
->where([
    'Loai.ten LIKE ' => '%'.$ls.'%',
]);
$this->set(compact('l'));
$this->set('_serialize', ['l']);

$lsl = $this->Loai->find('all')
->contain(['Dong']);
$this->set(compact('lsl'));
$this->set('_serialize', ['lsl']);

$this->loadModel('Dong');
$d = $this->Dong->find('all')
->contain(['Phankhuc']);
$this->set(compact('d'));
$this->set('_serialize', ['d']);

$this->loadModel('Phankhuc');
$k = $this->Phankhuc->find('all')
->contain(['Sanpham']);
$this->set(compact('k'));
$this->set('_serialize', ['k']);

$this->loadModel('Sanpham');
$tagss = $this->Sanpham->find('all')
->contain(['Tag'])
->where(['hangsx_id'=> $hangsx->id])
->distinct(['tag_id']);

$this->loadModel('Mau');
$colorss = $this->Mau->find('all');
$this->set(compact('colorss'));
$this->set('_serialize', ['colorss']);

$this->loadModel('Diemdg');
$sod= $this->Diemdg->find('all');
$this->set(compact('sod'));
$this->set('_serialize', ['sod']);      

$this->set(compact('kqtk','tags','hangsx','tagss','colors'));
$this->set('_serialize', ['kqtk','tags']);


}
    //Trang tìm kiếm hãng sản xuất admin
public function search()
{if($this->Auth->user('roles_id') == 1){
   
    $this->paginate = [
        'contain' => []
    ]; 
    if ($this->request->is('post')) {
        $value = $this->request->getData('sr');    
    }
    $kq = $this->Hangsx->find('all')
    ->where(['id '=> $value ])        
    ->orWhere(['ten LIKE' => '%'.$value.'%']);       
    
    
    $this->set(compact('kq'));
    $this->set('_serialize', ['kq']);

}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}


}
