<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Dong Controller
 *
 * @property \App\Model\Table\DongTable $Dong
 *
 * @method \App\Model\Entity\Dong[] paginate($object = null, array $settings = [])
 */
class DongController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    // Trang index dòng admin
    public function index()
    {if($this->Auth->user('roles_id') == 1){
       
        $this->paginate = ['limit'=>10,
        'contain' => ['Loai'],
        'order'=>['id'=>'asc']
    ];
    
    $dong = $this->paginate($this->Dong);

    $this->set(compact('dong'));
    $this->set('_serialize', ['dong']);

}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * View method
     *
     * @param string|null $id Dong id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // Trang xem thông tin dòng admin
    public function view($id = null)
    {
        if($this->Auth->user('roles_id') == 1){
           
            $dong = $this->Dong->get($id, [
                'contain' => ['Loai']
            ]);

            $this->set('dong', $dong);
            $this->set('_serialize', ['dong']);

        }
        else
            return $this->redirect(['controller'=>'users','action'=>'login']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    // Trang thêm dòng admin
    public function add()
    {if($this->Auth->user('roles_id') == 1){
        
        $dong = $this->Dong->newEntity();
        if ($this->request->is('post')) {
            $dong = $this->Dong->patchEntity($dong, $this->request->getData());
            Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
            $time = Time::now();
            
            $time->timezone = 'Asia/Ho_Chi_Minh';
            // $time= str_replace(array(' ','/',':','_',',','-'),array(''),$time);
            
            $dong->set('tgtao', $time);
            $dong->set('tgsua', 'Chưa Có Chỉnh Sửa');
            $dong->set('idnguoitao',$this->Auth->user('id'));

            if ($this->Dong->save($dong)) {
                $this->Flash->success(__('Thành Công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!!'));
        }
        $loai = $this->Dong->Loai->find('list', ['limit' => 200]);
        $this->set(compact('dong','loai'));
        $this->set('_serialize', ['dong']);

    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Edit method
     *
     * @param string|null $id Dong id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    // Trang chỉnh sửa dòng admin
    public function edit($id = null)
    {if($this->Auth->user('roles_id') == 1){
       
        $dong = $this->Dong->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dong = $this->Dong->patchEntity($dong, $this->request->getData());
            Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
            $time = Time::now();
            
            $time->timezone = 'Asia/Ho_Chi_Minh';
            $dong->set('idnguoisua',$this->Auth->user('id'));
            
            $dong->set('tgsua', $time);
            if ($this->Dong->save($dong)) {
                $this->Flash->success(__('Thành Công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!!'));
        }
        $loai = $this->Dong->Loai->find('list', ['limit' => 200]);
        $this->set(compact('dong','loai'));
        $this->set('_serialize', ['dong']);

    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Delete method
     *
     * @param string|null $id Dong id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // Xoá dòng admin
    public function delete($id = null)
    {if($this->Auth->user('roles_id') == 1){
       
        $this->request->allowMethod(['post', 'delete']);
        $dong = $this->Dong->get($id);
        //Lỗi khoá ngoại
        $this->loadModel('Phankhuc');
        $pk = $this->Phankhuc->find('all')
        ->where(['dong_id' => $id]);
        $this->set('pk', $pk);
        $this->set('_serialize', ['pk']);

        if(!$pk->isEmpty()){
            $this->Flash->error(__('Có dữ liệu liên kết, không thể xóa!'));
            return $this->redirect(['action' => 'index']);
        } 


        if($pk->isEmpty()){
            if ($this->Dong->delete($dong)) {
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

    // Trang sản phẩm theo dòng
public function dong($id = null){
   $this->viewBuilder()->layout('frontend');
   $dong = $this->Dong->get($id, [
    'contain' => ["Phankhuc"]]);
   $this->set('dong', $this->paginate($this->Dong));    
   $this->set(compact('dong'));
   $this->set('_serialize', ['dong']);
   
   $this->loadModel('Nhom');
   $nhom = $this->Nhom->find('all');
   $this->set(compact('nhom'));
   $this->set('_serialize', ['nhom']);

   $this->loadModel('Loai');
   $loai = $this->Loai->find('all')
   ->contain(['Dong']);
   $this->set(compact('loai'));
   $this->set('_serialize', ['loai']);    

   $this->loadModel('Phankhuc');
   $pk = $this->Phankhuc->find('all')
   ->contain(['Sanpham']);
   $this->set(compact('pk'));
   $this->set('_serialize', ['pk']);

   $this->loadModel('Mau');
   $colors = $this->Mau->find('all');
   $this->set(compact('colors'));
   $this->set('_serialize', ['colors']);


   $this->loadModel('Sanpham');
   $sph= $this->Sanpham->find('all')
   ->contain(['Hangsx'])
   ->distinct(['hangsx_id']);
   $this->set(compact('sph'));
   $this->set('_serialize', ['sph']);

   $this->loadModel('Diemdg');
   $sod= $this->Diemdg->find('all');
   $this->set(compact('sod'));
   $this->set('_serialize', ['sod']);

}

    //Tìm kiếm sản phẩm theo dòng
public function searchdong($id = null){
    $this->viewBuilder()->layout('frontend');
    $this->paginate=[
       'contain' => []
   ];
   $dong = $this->Dong->get($id, [
    'contain' => ['Phankhuc']]);
   $this->set('dong', $this->paginate($this->Dong));    
   $this->set(compact('dong'));
   $this->set('_serialize', ['dong']);

   $this->loadModel('Nhom');
   $nhom = $this->Nhom->find('all');
   $this->set(compact('nhom'));
   $this->set('_serialize', ['nhom']);

   $this->loadModel('Loai');
   $loai = $this->Loai->find('all')
   ->contain(['Dong']);
   $this->set(compact('loai'));
   $this->set('_serialize', ['loai']); 

   $noidung = '';
   $colors='';
   $hangs='';
   
   $phankhucs='';
   $giamins= '';
   $giamaxs= '';
   $ddgs= '';
   if ($this->request->is(['patch', 'post', 'put'])) {
    $noidung = $this->request->data('noidung');
    
    $colors = $this->request->data('color'); 

    $hangs  = $this->request->data('hang'); 

    

    $phankhucs  = $this->request->data('phankhuc');   

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
->contain(['Hangsx', 'Tag', 'Phankhuc','Mau','Diemdg'])
->where([
    'Sanpham.ten LIKE ' => '%'.$noidung.'%',
    'Mau.ten LIKE' => '%'.$colors.'%',
    'Hangsx.ten LIKE' => '%'.$hangs.'%',
    'Sanpham.diemtb >=' => $ddgs,
])
->order(['luotxem'=>'DESC']);

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


$this->loadModel('Phankhuc');
$pk = $this->Phankhuc->find('all')
->contain(['Sanpham']);
$this->set(compact('pk'));
$this->set('_serialize', ['pk']);

$this->loadModel('Mau');
$colorss= $this->Mau->find('all');
$this->set(compact('colorss'));
$this->set('_serialize', ['colorss']);


$this->set(compact('kqtk'));
$this->set('_serialize', ['kqtk']);



$this->loadModel('Phankhuc');
$pkss = $this->Phankhuc->find('all')
->contain(['Sanpham'])
->where([
    'ten LIKE' => '%'.$phankhucs.'%',
    
]);
$this->set(compact('pkss'));
$this->set('_serialize', ['pkss']);

$this->loadModel('Sanpham');
$sph= $this->Sanpham->find('all')
->contain(['Hangsx'])
->distinct(['hangsx_id']);
$this->set(compact('sph'));
$this->set('_serialize', ['sph']);

$this->loadModel('Diemdg');
$sod= $this->Diemdg->find('all');
$this->set(compact('sod'));
$this->set('_serialize', ['sod']);
}

  //Tìm kiếm dòng admin
public function search()
{if($this->Auth->user('roles_id') == 1){
   
    $this->paginate = [
        'contain' => ['Loai']
    ]; 
    if ($this->request->is('post')) {
        $value = $this->request->getData('sr');    
    }
    $kq = $this->Dong->find('all')
    ->contain(['Loai'])
    ->where(['Dong.id '=> $value ])        
    ->orWhere(['Loai.id '=> $value ])        
    ->orWhere(['Dong.ten LIKE' => '%'.$value.'%'])     
    ->orWhere(['Loai.ten LIKE' => '%'.$value.'%']);       
    
    
    $this->set(compact('kq'));
    $this->set('_serialize', ['kq']);

}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}


}
