<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

use Cake\I18n\Time;
use Cake\Event\Event;
use Cake\View\Helper\FormHelper;
use Cake\View\View;
use Cake\View\ViewBuilder;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
/**
 * Sanpham Controller
 *
 * @property \App\Model\Table\SanphamTable $Sanpham
 *
 * @method \App\Model\Entity\Sanpham[] paginate($object = null, array $settings = [])
 */
class SanphamController extends AppController
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
        $this->loadComponent('Paginator');
        $this->loadModel('Sanpham');   
    }
    
// trang index sản phẩm admin
    public function index()
    {
        if($this->Auth->user('roles_id') == 1){

            $this->paginate = ['limit'=>10,
            'contain' => ['Hangsx','Mau'],
            'order'=>['id'=>'asc']
        ];
        $sanpham = $this->paginate($this->Sanpham);
        $this->set('sanpham', $this->paginate());
        
        $this->set(compact('sanpham'));
        $this->set('_serialize', ['sanpham']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * View method
     *
     * @param string|null $id Sanpham id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

// trang chi tiết sản phẩm  
    public function xem($id = null)
    {
        
        $this->viewBuilder()->layout('frontend');   
        
        $sanpham = $this->Sanpham->get($id, [
            'contain' => ["Users","Nhacc",'Phankhuc','Danhgia','Hangsx','Binhluan','Tag']]);
        $this->set(compact('sanpham','users','phankhuc','danhgia','hangsx','binhluan','tag'));
        $this->set('_serialize', ['sanpham']);

        $sp = $this->Sanpham->find('all')
        ->contain(['Mau'])
        ->where(['tag_id'=> $sanpham->tag_id]);
        $this->set(compact('sp'));
        $this->set('_serialize', ['sp']);

        $pk = $this->Sanpham->Phankhuc->find('all');
        
        $this->set(compact('pk','dong'));
        $this->set('_serialize', ['pk']);
        
        $dong = $this->Sanpham->Phankhuc->Dong->find('all');       
        $this->set(compact('dong'));
        $this->set('_serialize', ['dong']); 

        $loai = $this->Sanpham->Phankhuc->Dong->Loai->find('all');
        $this->set(compact('loai'));
        $this->set('_serialize', ['loai']);

        $nhom = $this->Sanpham->Phankhuc->Dong->Loai->Nhom->find('all') ;
        $this->set(compact('nhom'));
        $this->set('_serialize', ['nhom']);
        $nguoi = $this->Auth->user('id');
        $nguoidung = $this->Sanpham->Users->find('all')
        ->where(['id' => $nguoi]);
        $this->set(compact('nguoidung'));
        $this->set('_serialize', ['nguoidung']);


        //lay  luot xem
        $view = $sanpham->luotxem;
        $sanpham['luotxem'] = $view + 1;
        $this->Sanpham->save($sanpham);


            // biến điểm
        $diem = $this->Sanpham->Danhgia->find('all')
        ->contain(['Diemdg'])
        ->where(['sanpham_id'=>$sanpham->id]);
        $this->set(compact('diem'));
        $this->set('_serialize', ['diem']);
           // biến đếm
        $count = $this->Sanpham->Danhgia->find();
        $count->select(['dem'=> $count->func()->count('diemdg_id')])->where(['sanpham_id'=> $sanpham->id]);
        $this->set(compact('count'));
        $this->set('_serialize', ['count']);
        
          // diem trung binh
        $sanphamTable = TableRegistry::get('Sanpham');
        $diemsp = $sanphamTable->get($sanpham['id']);
        foreach($count as $c){};
        $y='0';
        $z='0';
        foreach($diem as $d){
         $y=$y+$d->diemdg->diem;
     };
     if($c->dem == 0)
     {
      $z ='0';
  }
  else{
   $z= $y/$c->dem ;
}
$diemsp->diemtb =$z;
$sanphamTable->save($diemsp);


$dtb =$this->Sanpham->Diemdg->find('all');
$thaydoi = $this->Sanpham->Danhgia->find('all')
->where(['sanpham_id' => $sanpham['id']])
->andwhere(['users_id' => $this->Auth->user('id')]);
$this->set(compact('dtb','z','thaydoi'));
$this->set('_serialize', ['dtb']);


/*them-danhgia-*/      
$danhgia = $this->Sanpham->Danhgia->newEntity();       
if ($this->request->is('post')) {
    $danhgia = $this->Sanpham->Danhgia->patchEntity($danhgia, $this->request->getData());

    $time = Time::now();
    $time->timezone = 'Asia/Ho_Chi_Minh';
    
    $danhgia->set('tgtao',$time);
    $danhgia->set('users_id',$this->Auth->user('id'));
    $danhgia->set('sanpham_id',$sanpham['id']);
    if ($this->Sanpham->Danhgia->save($danhgia)) {
        
     $view = $sanpham->luotxem;
     $sanpham['luotxem'] = $view - 2;
     $this->Sanpham->save($sanpham);
     return $this->redirect(['Controller'=>'Sanpham','action' => 'xem', $sanpham['id']]);
 }
 $this->Flash->error(__('Lỗi !!!'));
}

$diemdg = $this->Sanpham->Danhgia->Diemdg->find('list', ['limit' => 200]);
$this->set(compact('danhgia','diemdg'));
$this->set('_serialize', ['danhgia']);

$dg = $this->Sanpham->Danhgia->find('all')
->contain(['Diemdg'])
->where(['users_id' => $this->Auth->user('id'),'sanpham_id' => $sanpham->id ]);
$this->set(compact('dg'));
$this->set('_serialize', ['dg']);

        // top 5 san pham cung cap   
$spcc = $this->Sanpham->Sanphamcc->find('all',['limit'=>5])
->contain(['Nhacc'])
->where(['sanpham_id' => $sanpham->id])
->order(['gia' => 'ASC']);
$this->set(compact('spcc'));
$this->set('_serialize', ['spcc']);

        // danh sach san pham cung cap   
$lscc = $this->Sanpham->Sanphamcc->find('all')
->contain(['Nhacc'])
->where(['sanpham_id' => $sanpham->id])
->order(['gia' => 'ASC']);
$this->set(compact('lscc'));
$this->set('_serialize', ['lscc']);


         // xoa binh luan
$xoabl = $this->Auth->user('id');
$this->set(compact('xoabl'));
$this->set('_serialize', ['xoabl']);

        // hien thi binh luan

$htbl = $this->Sanpham->Binhluan->find('all')
->contain(['Users'])
->Where(['sanpham_id'=> $sanpham->id])
->order(['binhluan.id'=>'DESC']);
$this->set(compact('htbl'));
$this->set('_serialize', ['htbl']);

        // san pham cung hang
$hang = $this->Sanpham->find('all',['limit'=>6])
->contain(['Hangsx'])
->where(['hangsx_id' => $sanpham->hangsx->id])
->order(['diemtb' => 'DESC']);
$this->set(compact('hang'));
$this->set('_serialize', ['hang']);


}
// trang thông tin sản phẩm admin
public function view($id = null)
{if($this->Auth->user('roles_id') == 1){
   
    $sanpham = $this->Sanpham->get($id, [
        'contain' => ['Phankhuc','Hangsx','Tag','Mau']
    ]);

    $this->set('sanpham', $sanpham);
    $this->set('_serialize', ['sanpham']);

}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Add method_exists(object, method_name)
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
// trang thêm sản phẩm admin  
    public function add()
    {if($this->Auth->user('roles_id') == 1){
       
        $sanpham = $this->Sanpham->newEntity();
        
        if ($this->request->is('post')) {
            $sanpham = $this->Sanpham->patchEntity($sanpham, $this->request->getData()); 
            

            Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
            $time = Time::now();
            
            $time->timezone = 'Asia/Ho_Chi_Minh';
            
            $sanpham->set('tgtao', $time);
            $sanpham->set('tgsua', 'Chưa Có Chỉnh Sửa');
            $sanpham->set('idnguoitao',$this->Auth->user('id')); 
            $sanpham->set('diemtb','0');
            
            if ($this->Sanpham->save($sanpham)) {
                $this->Flash->success(__('Thành Công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!!'));
        }
        $phankhuc = $this->Sanpham->Phankhuc->find('list', ['limit' => 200]);
        $mau = $this->Sanpham->Mau->find('list', ['limit' => 200]);
        $hangsx = $this->Sanpham->Hangsx->find('list', ['limit' => 200]);
        $tag = $this->Sanpham->Tag->find('list', ['limit' => 200]);
        $this->set(compact('sanpham','hangsx','phankhuc','mau','tag'));
        $this->set('_serialize', ['sanpham']);
    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Edit method
     *
     * @param string|null $id Sanpham id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
// trang chỉnh sửa sản phẩm   
    public function edit($id = null)
    {if($this->Auth->user('roles_id') == 1){
       
        $sanpham = $this->Sanpham->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sanpham = $this->Sanpham->patchEntity($sanpham, $this->request->getData());
            Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
            $time = Time::now();
            
            $time->timezone = 'Asia/Ho_Chi_Minh';
            $sanpham->set('idnguoisua',$this->Auth->user('id'));
            
            $sanpham->set('tgsua', $time);
            if ($this->Sanpham->save($sanpham)) {
                $this->Flash->success(__('Thành Công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Lỗi !!!'));
        }
        
        $phankhuc = $this->Sanpham->Phankhuc->find('list', ['limit' => 200]);
        $hangsx = $this->Sanpham->Hangsx->find('list', ['limit' => 200]);
        $tag = $this->Sanpham->Tag->find('list', ['limit' => 200]);
        
        
        $mau = $this->Sanpham->Mau->find('list', ['limit' => 200]);
        
        $this->set(compact('sanpham','hangsx','mau','phankhuc','tag'));
        $this->set('_serialize', ['sanpham']);

    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}

    /**
     * Delete method
     *
     * @param string|null $id Sanpham id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
// trang xoá sản ohẩm
    public function delete($id = null)
    {if($this->Auth->user('roles_id') == 1){
       
        $this->request->allowMethod(['post', 'delete']);
        $sanpham = $this->Sanpham->get($id);
        if ($this->Sanpham->delete($sanpham)) {
            $this->Flash->success(__('Thành Công'));
        } else {
            $this->Flash->error(__('Lỗi !!!'));
        }

        return $this->redirect(['action' => 'index']);

    }
    else
        return $this->redirect(['controller'=>'users','action'=>'login']);
}



// trang tim kiem san pham admin
public function search()
{if($this->Auth->user('roles_id') == 1){
   
    $this->paginate = [
        'contain' => ['Phankhuc']
    ]; 
    if ($this->request->is('post')) {
        $value = $this->request->getData('sr');    
    }
    $kq = $this->Sanpham->find('all')
    ->contain(['Phankhuc','Tag','Mau','Hangsx'])
    ->where(['Sanpham.id '=> $value ])        
    ->orWhere(['Phankhuc.id '=> $value ])        
    ->orWhere(['Sanpham.barcode '=> $value ])        
    ->orWhere(['Sanpham.ten LIKE' => '%'.$value.'%'])     
    ->orWhere(['Phankhuc.ten LIKE' => '%'.$value.'%'])       
    ->orWhere(['Mau.ten LIKE' => '%'.$value.'%'])       
    ->orWhere(['Tag.ten LIKE' => '%'.$value.'%'])     
    ->orWhere(['Hangsx.ten LIKE' => '%'.$value.'%']);       
    
    
    $this->set(compact('kq'));
    $this->set('_serialize', ['kq']);

}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}
// trang thong ke    
public function thongke()
{if($this->Auth->user('roles_id') == 1){
   
    // thong ke diem trung binh
    $sanpham= $this->Sanpham->find('all',['limit' => 5])
    ->order(['diemtb'=>'DESC']);
    $this->set(compact('sanpham'));
    $this->set('_serialize', ['sanpham']);
     // thong ke luot xem
    $sanpham1= $this->Sanpham->find('all',['limit' => 5])
    ->order(['luotxem'=>'DESC']);
    $this->set(compact('sanpham1'));
    $this->set('_serialize', ['sanpham1']);
    
}
else
    return $this->redirect(['controller'=>'users','action'=>'login']);
}
// trang chu
public function home(){
    $this->viewBuilder()->layout('frontend');
    $sanpham = $this->Sanpham->find('all',['limit'=>18]
)
    ->order(['luotxem'=>'DESC']);
    $this->set(compact('sanpham'));
    $sanphamdg = $this->Sanpham->find('all',['limit'=>5]
)
    ->order(['diemtb'=>'DESC']);
    $this->set(compact('sanphamdg'));

    $spmoi = $this->Sanpham->find('all',['limit'=>4 ]
)
    ->order(['id'=>'DESC']);
    $this->set(compact('spmoi'));
}
// tìm kiếm trên thanh header
public function searchhome()
{$this->viewBuilder()->layout('frontend');
if ($this->request->is('post')) {
    $value = $this->request->getData('sr');
            // $value= str_replace(array(' ','/',':','_',',','-'),array(''),$value);    
}


$kq = $this->Sanpham->find('all')
->contain(['Hangsx','Mau'])            
->where(['Sanpham.ten LIKE' => '%'.$value.'%'])      
->orWhere(['Sanpham.barcode ' => $value])      
->orWhere(['Mau.ten LIKE' => '%'.$value.'%'])       
->orWhere(['Hangsx.ten LIKE' => '%'.$value.'%']);  



$this->set(compact('kq','value'));
$this->set('_serialize', ['kq']);
}


// xuất file exel cửa hàng
public function export($id = null) {
        // lấy dữ liệu
    $this->loadModel('Sanphamcc');
    $spcc = $this->Sanphamcc->find('all')
    ->contain(['Sanpham','Nhacc'])
    ->where(['sanpham_id' => $id])
    ->order(['gia'=>'ASC']);
    $this->set(compact('spcc'));
    $this->set('_serialize', ['spcc']);
    // đổ vào mảng
    $i='0';
    foreach($spcc as $sp){
        $noiban[$i]= $sp->nhacc->ten;
        $giaban[$i] = $sp->gia;
        $i =$i+1;
    }
      // ghép mảng
    $data = array(array('Cửa Hàng',' Giá') );
    for ($y=0; $y < $i ; $y++) { 
     $temp = array( array($noiban[$y], $giaban[$y]));
     $data = array_merge($data, $temp);
 }
 
 // lưu vào thư mục chương trình
 $file = fopen("../webroot/files/ThongTin/".$sp->sanpham->ten.".csv","w");
 fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
 foreach ($data as $line)
 {
  fputcsv($file,$line);
}

fclose($file);
// cho tải file về
$FileName = '../webroot/files/ThongTin/'.$sp->sanpham->ten.'.csv';
header('Content-disposition: attachment;filename='.$sp->sanpham->ten.'.csv');
readfile($FileName);
exit();
}


}
