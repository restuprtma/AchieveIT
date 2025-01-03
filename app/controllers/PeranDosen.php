<?php

class PeranDosen extends Controller
{
    public function create()
    {
        $this->checkMethod("GET");
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/PeranDosen/create");
    }

    public function store()
    {
        try {
            $this->checkMethod("POST");
            $this->checkRole("Admin", "Super Admin");
            if (isset($_POST['submit'])) {
                $data = [
                    'peran' => htmlspecialchars($_POST['peran'])
                ];
                $isSuccess = $this->model("PeranDosenModel")->store($data);
                if ($isSuccess) {
                    $this->model("LogAdminModel")->storeAdminLog("Tambah Data", "Menambah Data Peran Dosen");
                    Flasher::setFlash("Tambahkan", "Data berhasil ditambahkan", "success", "Dosen/index");
                } else {
                    Flasher::setFlash("Tambahkan", "Data gagal ditambahkan", "error", "Dosen/index");
                }
            }
            header("location:" . BASEURL . "/PeranDosen/create");
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function edit($id_peran)
    {
        try {
            $this->checkMethod("GET");
            $this->checkRole("Admin", "Super Admin");
            $data = $this->model("PeranDosenModel")->getPeranDosenById($id_peran);
            $this->view("Admin/PeranDosen/edit", $data);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function update()
    {
        try {
            $this->checkMethod("POST");
            $this->checkRole("Admin", "Super Admin");
            $data = [
                'id_peran' => htmlspecialchars($_POST['id_peran']),
                'peran' => htmlspecialchars($_POST['peran'])
            ];
            $isSuccess = $this->model("PeranDosenModel")->update($data);
            if ($isSuccess) {
                $this->model("LogAdminModel")->storeAdminLog("Ubah Data", "Mengubah Data Peran Dosen dengan ID " . $data['id_peran']);
                Flasher::setFlash("Perbarui", "Data berhasil diperbarui", "success", "Dosen/index");
            } else {
                Flasher::setFlash("Perbarui", "Data gagal diperbarui", "error", "Dosen/index");
            }
            header('location:' . BASEURL . '/PeranDosen/edit/' . $data['id_peran']);
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }

    public function delete($id_peran)
    {
        $this->checkMethod("GET");
        $this->checkRole("Admin", "Super Admin");
        $id = htmlspecialchars($id_peran);

        Flasher::setFlash("Hapus", "Apakah anda yakin ingin menghapus data ini?", "warning", "PeranDosen/deleting/" . $id);

        header('location:' . BASEURL . '/Dosen/index');
    }

    public function deleting($id)
    {
        try {
            $this->checkRole("Admin", "Super Admin");
            $isSuccess = $this->model("PeranDosenModel")->delete($id);

            if ($isSuccess) {
                $this->model("LogAdminModel")->storeAdminLog("Hapus Data", "Menghapus Data Peran Dosen dengan ID " . $id);
                Flasher::setFlash("Hapus", "Data berhasil dihapus", "success");
            } else {
                Flasher::setFlash("Hapus", "Data gagal dihapus", "error");
            }
            header('location:' . BASEURL . '/Dosen/index');
        } catch (Exception $e) {
            $this->view('exception', $e);
        }
    }
}