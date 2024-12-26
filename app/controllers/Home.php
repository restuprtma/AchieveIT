<?php

class Home extends Controller
{
    public function index()
    {
        $this->view('index');
    }

    public function getDataRankingPrestasi()
    {

        // Terima data POST dari JavaScript
        $input = json_decode(file_get_contents("php://input"), true);
        $keyword = $input['keyword'] ?? "";
        $year = $input['year'] ?? "all";
        // $totalPrestasi = $this->model("PrestasiModel")->countPrestasi(); // Total jumlah log

        // Ambil data sesuai tahun
        if ($year === "all") {
            $data = $this->model('PrestasiModel')->getRankingPrestasi($keyword);

        } else {
            $data = $this->model('PrestasiModel')->getRankingPrestasiPerTahun($keyword, $year); // Data sesuai tahun
        }

        // Return data sebagai JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function pageNotFound()
    {
        if (!isset($_SESSION['user'])) {
            $data['url'] = 'Home/index';
        } else {
            if ($_SESSION['user']['role'] == 'Super Admin') {
                $data['url'] = 'Admin/index';
            } else if ($_SESSION['user']['role'] == 'Ketua Jurusan') {
                $data['url'] = 'Kajur/index';
            } else {
                $data['url'] = 'Mahasiswa/index';
            }
        }
        $this->view('pageNotFound', $data);
    }

    public function exception()
    {
        if (!isset($_SESSION['user'])) {
            $data['url'] = 'Home/index';
        } else {
            if ($_SESSION['user']['role'] == 'Super Admin') {
                $data['url'] = 'Admin/index';
            } else if ($_SESSION['user']['role'] == 'Ketua Jurusan') {
                $data['url'] = 'Kajur/index';
            } else {
                $data['url'] = 'Mahasiswa/index';
            }
        }
        $this->view('exception', $data);
    }
}

?>