<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * SDG cell
 */
class SDGCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display($id=null)
    {
        $this->loadModel('Danhgia');
         $sdg = $this->Sanpham->Danhgia->get($sanpham_id, [
            'contain' => ['Sanpham']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdg = $this->Sanpham->Danhgia->patchEntity($sdg, $this->request->getData());
            // Time::setToStringFormat('yyyy-MM-dd HH:mm:ss');
            // $time = Time::now();
               
            // $time->timezone = 'Asia/Ho_Chi_Minh';
            // $sanpham->set('idnguoisua',$this->Auth->user('id'));
            
            // $sanpham->set('tgsua', $time);
            if ($this->Sanpham->danhgia->save($sanpham)) {
                $this->Flash->success(__('Đã Lưu .'));

                return $this->redirect(['Controller'=>'Sanpham','action' => 'xem',$sanpham['id']]);
            }
            $this->Flash->error(__('Lỗi !!!. Please, try again.'));
        }
        $this->set(compact('sdg'));
        $this->set('_serialize', ['sdg']);
        
    }
}
