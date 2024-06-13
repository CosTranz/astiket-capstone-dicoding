<?php

namespace App\Controllers;

use App\Models\PlaceModel;


class Place extends BaseController
{

    public function index()
    {
        
        helper('form');
        $model = new PlaceModel();
        $data = [
            'title' => 'Place',
            'content' => 'v_place',
            'getData' => $model->getAllData(),
        ];

        return view('layout/template', $data);
    }

    public function submit()
    {
        helper('form');
        $id = $this->request->getPost('id');
        $model = new PlaceModel();
    
        $file = $this->request->getFile('file');

        // Define the allowed file extensions
        $allowedExtensions = ['png', 'jpg', 'jpeg'];
        
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Get the file extension
            $fileExtension = $file->getExtension();
        
            // Check if the file extension is in the allowed list
            if (in_array($fileExtension, $allowedExtensions)) {
                $file_gambar = $file->getRandomName();
                $file->move(ROOTPATH . 'public/assets/uploads/img/', $file_gambar);
        
                // Set the filename to the data array
                $data['file'] = $file_gambar;
            } else {
                // Invalid file type
                echo 'Invalid file type. Only PNG, JPG, and JPEG are allowed.';
            }
        }
        
    
        $data = array(
            'id_place' => $this->request->getPost('id_place'),
            'name_place' => $this->request->getPost('name_place'),
            'status' => $this->request->getPost('status'),
            'jenis' => $this->request->getPost('jenis'),
            'file' => $file_gambar,
        );
    
        if ($id == "") {
            // Operasi INSERT
            $result = $model->insertData($data);
        } else {
            // Operasi UPDATE
            $result = $model->updateData($id, $data);
        }
    
        if ($result) {
            // Pesan keberhasilan
            session()->setFlashdata('success', 'Data berhasil disimpan.');
        } else {
            // Pesan kesalahan
            session()->setFlashdata('error', 'Data gagal disimpan.');
        }
    
        return redirect()->to('Place');
    }
    
   

public function edit()
{
    $id = $this->request->uri->getSegment(3);
    $model = new PlaceModel();
    $get = $model->getDataById($id);

    $data['id'] = $id;
        $data['id_place'] = $id;
        $data['name_place'] = $get->name_place;
        $data['jenis'] = $get->jenis;
        $data['status'] = $get->status;
       
    return $this->response->setJSON($data);
}

public function update()
{
    helper("form");
    $id_place = $this->request->getPost('id_place');
    $name_place = $this->request->getPost('name_place');
    $status = $this->request->getPost('status');
    $jenis = $this->request->getPost('jenis');

    // // Check if a new image is uploaded
    // $newFile = $this->request->getFile('file');
    
    // if ($newFile && $newFile->isValid() && !$newFile->hasMoved()) {
    //     // Define the allowed file extensions
    //     $allowedExtensions = ['png', 'jpg', 'jpeg'];

    //     // Get the file extension
    //     $fileExtension = $newFile->getExtension();

    //     // Check if the file extension is in the allowed list
    //     if (in_array($fileExtension, $allowedExtensions)) {
    //         $file_gambar = $newFile->getRandomName();
    //         $newFile->move(ROOTPATH . 'public/assets/uploads/img/', $file_gambar);

    //         // Set the new filename to the data array
    //         $data['file'] = $file_gambar;
    //     } else {
    //         // Invalid file type
    //         echo 'Invalid file type. Only PNG, JPG, and JPEG are allowed.';
    //     }
    // }

    $data = array(
        'name_place' => $name_place,
        'jenis' => $jenis,
        'status' => $status,
        // 'file' => $file_gambar,
    );

    $model = new PlaceModel();
    $result = $model->updateData($id_place, $data);

    if ($result) {
        // Pesan keberhasilan
        session()->setFlashdata('success', 'Data berhasil diperbarui.');
        return redirect()->to('Place');
    } else {
        // Pesan kesalahan
        session()->setFlashdata('error', 'Data gagal diperbarui.');
        return redirect()->to('Place/edit/' . $id_place);
    }
}


    public function delete($id)
    {
        $id = $this->request->uri->getSegment(3);
        $model = new PlaceModel();
        $result = $model->deleteData($id);

        if ($result) {
            // Pesan keberhasilan
            session()->setFlashdata('success', 'Data berhasil dihapus.');
        } else {
            // Pesan kesalahan
            session()->setFlashdata('error', 'Data gagal dihapus.');
        }

        return redirect()->to('Place');
    }

    
}
