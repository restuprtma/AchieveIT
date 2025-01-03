<?php

class AuthModel extends Connection
{

    public function getSuperAdmin()
    {
        $stmt = "SELECT * FROM admin WHERE role = ?";
        $params = array('Super Admin');
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ?? [];
        
        return $data ?? [];
    }

    public function getAdmin()
    {
        $stmt = "SELECT * FROM admin WHERE role = ?";
        $params = array('Admin');
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ?? [];

        return $data ?? [];
    }

    public function getKajur()
    {
        $stmt = "SELECT * FROM admin WHERE role = ?";
        $params = array('Ketua Jurusan');
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        $data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ?? [];
            
        return $data ?? [];
    }


    public function registrasi($username, $password)
    {
        $stmt = "INSERT INTO mahasiswa (nim, password) VALUES (?, ?)";
        $params = array($username, $password);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

    public function gantiSandi($password, $username)
    {
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['role'] == 'Mahasiswa') {
                $stmt = "UPDATE mahasiswa
                 SET password = ?
                 WHERE nim = ?;";
            } else {
                $stmt = "UPDATE admin
                 SET password = ?
                 WHERE nip = ?;";
            }
        } else {
            $stmt = "UPDATE mahasiswa
             SET password = ?
             WHERE nim = ?;";
        }

        $params = array($password, $username);
        $result = sqlsrv_query($this->conn, $stmt, $params);

        if ($result === false) {
            throw new Exception("Database Error: " . print_r(sqlsrv_errors(), true));
        }

        return $result;
    }

}
?>