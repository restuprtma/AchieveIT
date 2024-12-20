<?php


class PrestasiModel extends Connection
{

    // Get All Prestasi Mahasiswa
    public function getAllPrestasi()
    {
        $stmt = "SELECT * FROM prestasi";
        $result = sqlsrv_query($this->conn, $stmt);

        $data = [];

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getDaftarPrestasi()
    {
        $stmt = "SELECT * FROM vw_PrestasiMahasiswa ORDER BY poin DESC;";
        $result = sqlsrv_query($this->conn, $stmt);

        $data = [];

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getPrestasiByNim($nim)
    {
        $stmt = "EXEC usp_GetPrestasiMahasiswa @nim = ?";
        $params = array($nim);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        $data = [];

        if ($result != false) {
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function getDetailPrestasi($id)
    {
        $stmt = "EXEC usp_GetDetailPrestasi @id_prestasi = ?";
        $params = array($id);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        return $data;
    }

    public function getPrestasiById($id)
    {
        $stmt = "SELECT * FROM prestasi WHERE id_prestasi = ?";
        $params = array($id);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        return $data;
    }

    public function getDetailPrestasiDataMahasiswa($id)
    {
        $stmt = "EXEC usp_GetDetailPrestasiDataMahasiswa @id_prestasi = ?";
        $params = array($id);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        $data = [];

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }

        return $data;
    }

    public function getDetailPrestasiDataDosen($id)
    {
        $stmt = "EXEC usp_GetDetailPrestasiDataDosen @id_prestasi = ?";
        $params = array($id);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        $data = [];

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }

        return $data;
    }

    public function getDetailPrestasiDataPoin($id)
    {
        $stmt = "EXEC usp_GetDetailPrestasiDataPoin @id_prestasi = ?";
        $params = array($id);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);


        return $data;
    }

    public function printPrestasiUmum($keyword = "", $filterQ = "10", $filterY = "2024")
    {
        $stmt = "EXEC usp_GetRankingMahasiswaPerTahun @keyword = '$keyword', @quantity = $filterQ, @year = $filterY;";
        $result = sqlsrv_query($this->conn, $stmt);

        $data = [];

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getStatistikPrestasi()
    {
        $stmt = "SELECT * FROM vw_StatistikPrestasi;";
        $result = sqlsrv_query($this->conn, $stmt);

        $data[] = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        return $data;
    }

    public function getGrafikPrestasi()
    {

    }

    public function getTahunPrestasi()
    {
        $stmt = "SELECT
                DISTINCT YEAR(tanggal_selesai_kompetisi) as tahun
                FROM prestasi;";
        $result = sqlsrv_query($this->conn, $stmt);

        $data = [];

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;

    }

    public function getGrafikDiagramLingkaran($type = "Kategori")
    {
        $stmt = "EXEC usp_GetAnalisisPrestasi @type = ?;";
        $params = array($type);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        $data = [];

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }

        return $data;
    }

    public function getGrafikPerTahun($type = "kategori")
    {
        $stmt = "EXEC usp_GetAnalisisPrestasiPerTahun @type = ?;";
        $params = array($type);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        $data = [];

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }

        return $data;
    }
    public function getGrafikPerBulan($type = "kategori", $year = "2024")
    {
        $stmt = "EXEC usp_GetAnalisisPrestasiPerBulan @tahun = ?, @type = ?;";
        $params = array($year, $type);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        $data = [];

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }

        return $data;
    }

    public function getExportData()
    {
        $stmt = "SELECT * FROM vw_DataPrestasi";
        $result = sqlsrv_query($this->conn, $stmt);

        $data = [];

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }

        $stmt2 = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'vw_DataPrestasi'";
        $result2 = sqlsrv_query($this->conn, $stmt2);

        while ($row = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC)) {
            $header[] = $row['COLUMN_NAME'];
        }

        return ['data' => $data, 'header' => $header];
    }

    public function store($data)
    {
        $stmt = "INSERT INTO prestasi(
        id_kategori, 
        id_juara, 
        id_tingkat_penyelenggara, 
        id_tingkat_kompetisi, 
        nama_kompetisi, 
        tanggal_mulai_kompetisi, 
        tanggal_selesai_kompetisi, 
        penyelenggara_kompetisi, 
        tempat_kompetisi, 
        surat_tugas, 
        poster_kompetisi, 
        foto_juara, 
        proposal, 
        sertifikat, 
        poin_prestasi) OUTPUT INSERTED.id_prestasi VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $params = array(
            $data['kategori'],
            $data['juara'],
            $data['tingkat_penyelenggara'],
            $data['tingkat_kompetisi'],
            $data['nama_kompetisi'],
            $data['tanggal_mulai'],
            $data['tanggal_selesai'],
            $data['penyelenggara'],
            $data['tempat_kompetisi'],
            $data['surat_tugas'],
            $data['poster'],
            $data['foto_juara'],
            $data['proposal'],
            $data['sertifikat'],
            $data['poin_prestasi'],
        );

        $idResource = sqlsrv_query($this->conn, $stmt, $params);

        if (!$idResource) {
            die(print_r(sqlsrv_errors(), true));
        }

        // Fetch the inserted ID
        $idRow = sqlsrv_fetch_array($idResource, SQLSRV_FETCH_NUMERIC);
        $insertedId = $idRow[0];

        return (int) $insertedId;
    }

    public function update($data)
    {
        $stmt = "UPDATE prestasi
        SET
            id_kategori = ?,
            id_juara = ?,
            id_tingkat_penyelenggara = ?,
            id_tingkat_kompetisi = ?,
            nama_kompetisi = ?,
            tanggal_mulai_kompetisi = ?,
            tanggal_selesai_kompetisi = ?,
            penyelenggara_kompetisi = ?,
            tempat_kompetisi = ?,
            surat_tugas = ?, 
            poster_kompetisi = ?, 
            foto_juara = ?, 
            proposal = ?, 
            sertifikat = ?, 
            poin_prestasi = ?,
            status = ?";

        $params = array(
            $data['kategori'],
            $data['juara'],
            $data['tingkat_penyelenggara'],
            $data['tingkat_kompetisi'],
            $data['nama_kompetisi'],
            $data['tanggal_mulai'],
            $data['tanggal_selesai'],
            $data['penyelenggara'],
            $data['tempat_kompetisi'],
            $data['surat_tugas'],
            $data['poster'],
            $data['foto_juara'],
            $data['proposal'],
            $data['sertifikat'],
            $data['poin_prestasi'],
            $data['status']
        );

        if ($data['status'] !== 'Not Validated') {
            $stmt .= ", id_admin = ?, validated_at = GETDATE()";
            $params[] = $data['id_admin'];
        }

        // Tambahkan WHERE id_prestasi
        $stmt .= " WHERE id_prestasi = ?";
        $params[] = $data['id_prestasi'];

        $isSuccess = sqlsrv_query($this->conn, $stmt, $params);

        if (!$isSuccess) {
            die(print_r(sqlsrv_errors(), true)); // Debug errors
        }
    }

    public function delete($id_prestasi)
    {
        $stmt = "DELETE FROM prestasi WHERE id_prestasi = ?";
        $params = array($id_prestasi);

        return sqlsrv_query($this->conn, $stmt, $params);
    }
}

?>