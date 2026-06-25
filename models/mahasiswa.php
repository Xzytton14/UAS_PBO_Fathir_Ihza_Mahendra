<?php
abstract class Mahasiswa {
    // ENKAPSULASI: Atribut diset private
    private $idMahasiswa;
    private $namaMahasiswa;
    private $nim;
    private $semester;
    private $tarifUKTNominal;

    // Constructor PHP menggunakan __construct
    public function __construct($idMahasiswa, $namaMahasiswa, $nim, $semester, $tarifUKTNominal) {
        $this->idMahasiswa = $idMahasiswa;
        $this->namaMahasiswa = $namaMahasiswa;
        $this->nim = $nim;
        $this->semester = $semester;
        $this->tarifUKTNominal = $tarifUKTNominal;
    }

    // ENKAPSULASI: Getter dan Setter
    public function getIdMahasiswa() { return $this->idMahasiswa; }
    public function setIdMahasiswa($id) { $this->idMahasiswa = $id; }

    public function getNamaMahasiswa() { return $this->namaMahasiswa; }
    public function setNamaMahasiswa($nama) { $this->namaMahasiswa = $nama; }

    public function getNim() { return $this->nim; }
    public function setNim($nim) { $this->nim = $nim; }

    public function getSemester() { return $this->semester; }
    public function setSemester($semester) { $this->semester = $semester; }

    public function getTarifUKTNominal() { return $this->tarifUKTNominal; }
    public function setTarifUKTNominal($ukt) { $this->tarifUKTNominal = $ukt; }

    // METODE ABSTRAK: Wajib diimplementasikan ulang oleh kelas anak
    abstract public function hitungTagihanSemester();
    abstract public function tampilkanSpesifikAkademik();

    // Metode Reguler
    public function tampilkanProfilGlobal() {
        echo "ID Mahasiswa    : " . $this->idMahasiswa . "<br>";
        echo "NIM             : " . $this->nim . "<br>";
        echo "Nama            : " . $this->namaMahasiswa . "<br>";
        echo "Semester        : " . $this->semester . "<br>";
    }
}
?>