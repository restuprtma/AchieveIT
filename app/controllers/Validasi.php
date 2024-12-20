<?php

class Validasi extends Controller
{
    public function index()
    {
        $this->checkRole("Admin", "Super Admin");

        $data = [
            'mahasiswa' => $this->model("MahasiswaModel")->getNotValidatedMahasiswa()
        ];

        $this->view('Admin/Validasi/index', $data);
    }

    public function show($id_mahasiswa)
    {
        $this->checkRole("Admin", "Super Admin");
        $data = $this->model("MahasiswaModel")->getNotValidatedMahasiswaById($id_mahasiswa);

        $this->view("Admin/Validasi/show", $data);
    }

    public function validate($id_mahasiswa, $input)
    {
        $this->checkRole("Admin", "Super Admin");
        $id_mahasiswa = htmlspecialchars($id_mahasiswa);
        $id_admin = $_SESSION['user']['id_admin'];
        $bool = filter_var($input, FILTER_VALIDATE_BOOLEAN);

        if ($bool == true) {
            $isSuccess = $this->model("MahasiswaModel")->validate($id_mahasiswa,$id_admin, 'Valid');
        } else {
            $isSuccess = $this->model("MahasiswaModel")->validate($id_mahasiswa,$id_admin, 'Invalid');
        }

        if ($isSuccess) {
            Flasher::setFlash("Perbarui", "Mahasiswa berhasil divalidasi", "success");
        } else {
            Flasher::setFlash("Perbarui", "Mahasiswa gagal divalidasi", "error");
        }

        header("location:" . BASEURL . "/Validasi");
    }
}
