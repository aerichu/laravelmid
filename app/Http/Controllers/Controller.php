<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\M_burger; // gunakan "Models" dengan huruf kapital sesuai PSR-4
use Illuminate\Http\Request; // Pastikan untuk mengimport class Request
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function user()
    {
        $model = new M_burger();
        $data['jel'] = $model->tampil('user');
        echo view('header');
        echo view('menu', $data);
        echo view('user', $data);
    }
    public function t_user()
    {
        $model= new M_burger;
        $data['jel']= $model->tampil('user');
        echo view('header');
        echo view('menu', $data);
        echo view('t_user',$data);
    }
    public function aksi_t_user()
    {
        $a = $this->request->getPost('nama');
        $b = md5($this->request->getPost('pass'));
        $c = $this->request->getPost('jk');
        $u = $this->request->getPost('level');

    // Prepare the data for inserting into the 'user' table
        $sis = array(
            'level' => $u,
            'username' => $a,
            'pw' => $b,
            'jk' => $c
        );

    // Instantiate the model and add the new user data
        $model = new M_burger;
        $model->tambah('user', $sis); 

    // Redirect the user after the operation is completed
        return redirect()->to('Controller.user');
    }
    public function h_user($id)
    {
        $model = new M_burger();
        $id_user = session()->get('id');
        $kil = array('id_user' => $id);
        $model->hapus('user', $kil);
        $model->logActivity($id_user, 'user', 'User deleted a user data.');
        return redirect()->to('Controller.user');
    }
    public function aksi_e_user()
    {
        $model= new M_burger;
        $a= $this->request->getPost('username');
        $b= md5($this->request->getPost('pw'));
        $c= $this->request->getPost('jk');
        $d= $this->request->getPost('level');
        $id=$this->request->getPost('id');
        $where = array('id_user'=>$id);
        $isi= array(
            'username'=>$a,
            'pw'=>$b,
            'jk'=>$c,
            'level'=>$d);
        $model->edit('user',$isi,$where);
        return redirect()->to('Controller.user');
    }

}
