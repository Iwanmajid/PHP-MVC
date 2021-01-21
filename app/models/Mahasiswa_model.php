<?php 

class Mahasiswa_model{
    
    private $table = 'mahasiswa'; //table
    private $db;

    //
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();

        // return $this->mhs ;


        // $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        // $this->stmt->execute();
        // return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa VALUES ('', :nama, :nim, :email, :jurusan)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET nama = :nama, nim = :nim, email = :email, jurusan = :jurusan WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataMahasiswa()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resultSet();
    }


    // private $mhs = [
    //     [
    //         "nama" => "Iwan Majid",
    //         "nim" => "165150600111008",
    //         "email" => "iwanmajid@student.ub.ac.id",
    //         "jurusan" => "Sistem Informasi"
    //     ],
    //     [
    //         "nama" => "Rizky Tri Sulistyo",
    //         "nim" => "165150600111009",
    //         "email" => "rizkytrisulistyo@student.ub.ac.id",
    //         "jurusan" => "Sistem Informasi"
    //     ],
    //     [
    //         "nama" => "Andre Diofanu",
    //         "nim" => "165150600111001",
    //         "email" => "andrediofanu@student.ub.ac.id",
    //         "jurusan" => "Sistem Informasi"
    //     ],
    //     [
    //         "nama" => "Sila Nur Ma'rifah",
    //         "nim" => "165150600111004",
    //         "email" => "silanurm@student.ub.ac.id",
    //         "jurusan" => "Sistem Informasi"
    //     ]
    // ];
}