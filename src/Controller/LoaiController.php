<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Loai Controller
 *
 * @property \App\Model\Table\LoaiTable $Loai
 *
 * @method \App\Model\Entity\Loai[] paginate($object = null, array $settings = [])
 */
class LoaiController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function initialize(){
      parent::initialize();
      $this->loadComponent('Flash');
    // Set the layout
      $this->loadModel('Loai');

      $this->loadModel('Sanpham');

    }
    // Trang index loại admin
    public function index()
    {if($this->Auth->user('roles_id') == 1){
     
      $this->paginate = [
        'contain' => ['Nhom'],
            'limit' => 10,// mỗi page có 10 record
            'order' => ['id'=> 'asc']
          ];
          $loai = $this->paginate($this->Loai);

          $this->set(compact('loai'));
          $this->set('_serialize', ['loai']);
        }
        else
          return $this->redirect(['controller'=>'users','action'=>'login']);
      }

//Trang san phẩm theo loại
      public function loai($id = null){
       $this->viewBuilder()->layout('frontend');
       $loai = $this->Loai->get($id, [
        'contain' => ["Dong"]]);
       $this->set('loai', $this->paginate($this->Loai));    
       $this->set(compact('loai'));
       $this->set('_serialize', ['loai']);
       
       $nhom = $this->Sanpham->Phankhuc->Dong->Loai->Nhom->find('all');
       $this->set(compact('nhom'));
       $this->set('_serialize', ['nhom']);

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

// Trang tìm kiếm theo loại 
     public function searchloai($id = null){
      $this->viewBuilder()->layout('frontend');
      $this->paginate=[
       'contain' => []
     ];
     $loai = $this->Loai->get($id, [
      'contain' => ['Dong']]);
     $this->set('loai', $this->paginate($this->Loai));    
     $this->set(compact('loai'));
     $this->set('_serialize', ['loai']);

     $nhom = $this->Sanpham->Phankhuc->Dong->Loai->Nhom->find('all');
     $this->set(compact('nhom'));
     $this->set('_serialize', ['nhom']);

     $noidung = '';
     $colors='';
     $hangs='';
     $dongs='';
     $phankhucs='';
     $giamins= '';
     $giamaxs= '';
     $ddgs= '';
     if ($this->request->is(['patch', 'post', 'put'])) {
      $noidung = $this->request->data('noidung');
      
      $colors = $this->request->data('color'); 

      $hangs  = $this->request->data('hang'); 

      $dongs  = $this->request->data('dong');

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
    ]);

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

    $this->loadModel('Dong');
    $dongss = $this->Dong->find('all')
    ->where([
      'ten LIKE' => '%'.$dongs.'%',
    ]);

    $this->set(compact('dongss'));
    $this->set('_serialize', ['dongss']);

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




    /**
     * View method
     *
     * @param string|null $id Loai id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // Trang xem thông tin loại admin
    public function view($id = null)
    {if($this->Auth->user('roles_id') == 1){
      $loai = $this->Loai->get($id, [
        'contain' => ['Nhom']
      ]);

      $this->set('loai', $loai);
      $this->set('_serialize', ['loai']);
    }
    else
      return $this->redirect(['controller'=>'users','action'=>'login']);
  }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    // Trang thêm loại admin
    public function add()
    {if($this->Auth->user('roles_id') == 1){
      $loai = $this->Loai->newEntity();
      if ($this->request->is('post')) {
        $loai = $this->Loai->patchEntity($loai, $this->request->getData());
        Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
        $time = Time::now();
        
        $time->timezone = 'Asia/Ho_Chi_Minh';
            // $time= str_replace(array(' ','/',':','_',',','-'),array(''),$time);
        

        $loai->set('tgtao', $time);
        $loai->set('tgsua', 'Chưa Có Chỉnh Sửa');
        $loai->set('idnguoitao',$this->Auth->user('id'));
        if ($this->Loai->save($loai)) {
          $this->Flash->success(__('Thành Công'));

          return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Lỗi !!!'));
      }
      $nhom = $this->Loai->Nhom->find('list', ['limit' => 200]);
      $this->set(compact('loai','nhom'));
      $this->set('_serialize', ['loai']);
    }
    else
      return $this->redirect(['controller'=>'users','action'=>'login']);
  }

    /**
     * Edit method
     *
     * @param string|null $id Loai id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    //Trang chỉnh sửa admin
    public function edit($id = null)
    {if($this->Auth->user('roles_id') == 1){
      $loai = $this->Loai->get($id, [
        'contain' => []
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
        $loai = $this->Loai->patchEntity($loai, $this->request->getData());
        Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
        $time = Time::now();
        
        $time->timezone = 'Asia/Ho_Chi_Minh';
        $loai->set('idnguoisua',$this->Auth->user('id'));
        
        $loai->set('tgsua', $time);
        if ($this->Loai->save($loai)) {
          $this->Flash->success(__('Thành Công'));

          return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Lỗi !!!'));
      }
      $nhom = $this->Loai->Nhom->find('list', ['limit' => 200]);
      $this->set(compact('loai','nhom'));
      $this->set('_serialize', ['loai']);
    }
    else
      return $this->redirect(['controller'=>'users','action'=>'login']);
  }  

    /**
     * Delete method
     *
     * @param string|null $id Loai id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // Xoá loại admin
    public function delete($id = null)
    {if($this->Auth->user('roles_id') == 1){
      $this->request->allowMethod(['post', 'delete']);
      $loai = $this->Loai->get($id);
        //Lỗi khoá ngoại
      $this->loadModel('Dong');
      $d = $this->Dong->find('all')
      ->where(['loai_id' => $id]);
      $this->set('d', $d);
      $this->set('_serialize', ['d']);

      if(!$d->isEmpty()){
        $this->Flash->error(__('Có dữ liệu liên kết, không thể xóa!'));
        return $this->redirect(['action' => 'index']);
      } 


      if($d->isEmpty()){
        if ($this->Loai->delete($loai)) {
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
    //Tìm kiếm loại admin
  public function search()
  {if($this->Auth->user('roles_id') == 1){
   
    $this->paginate = [
      'contain' => ['Nhom']
    ]; 
    if ($this->request->is('post')) {
      $value = $this->request->getData('sr');    
    }
    $kq = $this->Loai->find('all')
    ->contain(['Nhom'])
    ->where(['Loai.id '=> $value ])        
    ->orWhere(['Nhom.id '=> $value ])        
    ->orWhere(['Nhom.ten LIKE' => '%'.$value.'%'])     
    ->orWhere(['Loai.ten LIKE' => '%'.$value.'%']);       
    
    
    $this->set(compact('kq'));
    $this->set('_serialize', ['kq']);

  }
  else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}


}
