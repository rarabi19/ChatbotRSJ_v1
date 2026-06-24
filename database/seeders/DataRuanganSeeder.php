<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataRuangan;
use App\Models\FotoRuangan;

class DataRuanganSeeder extends Seeder
{
    public function run(): void
    {
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DataRuangan::truncate();
        FotoRuangan::truncate();
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 1. Ruang Rapat (Gedung IGD)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Rapat',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'dr. Hanifal Yunis',
            'jabatan_struktural'=> 'Kepala Instalasi Gawat Darurat',
            'navigasi'          => 'Masuk melalui pintu utama IGD, belok kanan, ruangan yang anda cari berada sebelum tangga menuju Lantai 2',
            'kata_kunci' => 'ruang rapat utama igd, ruang rapat lantai 1 igd, meeting room igd utama, rapat direksi utama rs, rapat manajemen puncak igd, ruang pimpinan utama rs, ruang rapat strategis igd, diskusi manajemen igd, briefing direksi rs, rapat kepala instalasi igd, ruang pertemuan direksi igd, rapat pimpinan tertinggi rs, ruang koordinasi pimpinan igd, diskusi strategis direksi, rapat kebijakan rs tingkat pusat, rapat lantai 1 gedung igd, ruang rapat sebelum tangga lt2, rapat operasional manajemen igd, ruang meeting direksi utama, rapat penting pimpinan rs, ruang rapat formal utama rs, rapat direksi lantai 1 igd, ruang pimpinan igd, rapat pimpinan rumah sakit, ruang rapat direksi, ruang rapat manajemen rs, ruang meeting direksi, ruang rapat penting rs',
            'kategori'          => 'Fasilitas Kantor RSJ Tampan',
            'fungsi_ruangan'    => 'sarana koordinasi, komunikasi, dan pengambilan keputusan antar manajemen serta unit kerja dalam rangka perencanaan, evaluasi, dan peningkatan mutu pelayanan kesehatan jiwa.',
        ]);  
        $this->tambahFoto($ruangan->id, ['ruang-rapat-1.jpg', 'ruang-rapat-2.jpg', 'ruang-rapat-3.jpg']);

        // 2. Ruang Resusitasi (Gedung IGD)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Resusitasi',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'dr. Hanifal Yunis',
            'jabatan_struktural'=> 'Kepala Instalasi Gawat Darurat',
            'navigasi'          => 'Lantai 1 IGD',
            'kata_kunci'        => 'penyelamatan nyawa, rjp, kompresi dada, bantuan hidup dasar, kondisi kritis, gawat darurat sekali, henti napas, henti jantung, life saving, stabilisasi darurat, pertolongan pertama igd, tindakan segera, darurat medis, bantuan pernapasan, resusitasi jantung',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat penanganan pasien dengan kondisi gawat darurat yang mengancam nyawa, baik medis maupun psikiatri, untuk dilakukan tindakan penyelamatan jiwa secara cepat dan intensif sampai kondisi pasien stabil.',
        ]);
        $this->tambahFoto($ruangan->id, ['resusitasi-1.jpg', 'resusitasi-2.jpg']);

        // 3. Ruang Tindakan Non Bedah (Gedung IGD)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Tindakan Non Bedah',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'dr. Hanifal Yunis',
            'jabatan_struktural'=> 'Kepala Instalasi Gawat Darurat',
            'navigasi'          => 'Sebelah Kanan Pintu Utama Gedung Rawat Jalan',
            'kata_kunci'        => 'pasang infus, suntik, uap, nebulizer, pasang oksigen, terapi obat, observasi singkat, rawat luka kecil, ganti perban, tindakan medis ringan, infus dewasa, pertolongan non bedah, cek tensi darah, tekanan darah, tensi pasien, pengukuran tekanan darah, cek tekanan, alat tensi, sphygmomanometer, pemberian injeksi, perawatan medis rutin, tindakan igd ringan',
            'kategori'          => 'Fasilitas Penunjang Medis',
            'fungsi_ruangan'    => 'tempat pelaksanaan tindakan medis dan psikiatri tanpa pembedahan, seperti pemberian terapi, penanganan luka ringan, pemasangan infus, observasi singkat, serta tindakan penunjang kegawatdaruratan sesuai indikasi medis.',
        ]);
        $this->tambahFoto($ruangan->id, ['ruang-tindakan-non-bedah-1.jpg', 'ruang-tindakan-non-bedah-2.jpg', 'ruang-tindakan-non-bedah-3.jpg']);

        // 4. Ruang Observasi (Gedung IGD)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Observasi',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'dr. Hanifal Yunis',
            'jabatan_struktural'=> 'Kepala Instalasi Gawat Darurat',
            'navigasi'          => 'Area IGD',
            'kata_kunci'        => 'pantau pasien, ruang transit inap, tunggu kamar, cek kondisi berkala, pemantauan stabil, observasi igd, monitoring pasien, ruang tunggu stabilisasi, transit rawat inap, lihat perkembangan, istirahat observasi, pemulihan sementara, pengawasan nakes, ruang cek medis, monitor tanda vital',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pemantauan sementara kondisi pasien setelah penanganan awal untuk menilai perkembangan, stabilitas, dan menentukan tindak lanjut pelayanan seperti rawat inap, rawat jalan, atau rujukan.',
        ]);
        $this->tambahFoto($ruangan->id, ['ruang-observasi-1.jpg', 'ruang-observasi-2.jpg', 'ruang-observasi-3.jpg']);

        // 5. Ruang Tindakan Anak (Gedung IGD)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Tindakan Anak',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'dr. Hanifal Yunis',
            'jabatan_struktural'=> 'Kepala Instalasi Gawat Darurat',
            'navigasi'          => 'Area IGD',
            'kata_kunci'        => 'penanganan darurat anak, tindakan medis anak igd, pertolongan pertama anak, kondisi gawat anak, infus anak darurat, nebulizer anak darurat, penanganan cepat bayi sakit, tindakan medis segera anak, ruang tindakan igd anak, kondisi kritis anak, bantuan medis cepat anak, perawatan darurat balita, tindakan medis akut anak, unit gawat darurat anak, penanganan anak mendadak sakit',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat penanganan medis dan psikiatri darurat pada pasien anak, dengan pendekatan yang aman dan ramah anak, meliputi pemeriksaan, pemberian terapi, serta tindakan non bedah sesuai kebutuhan klinis.',
        ]);
        $this->tambahFoto($ruangan->id, ['ruang-tindakan-anak-1.jpg', 'ruang-tindakan-anak-2.jpg']);

        // 6. Ruang ECT (Gedung IGD)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang ECT (Electroconvulsive Therapy)',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'dr. Elisa, Sp.PK',
            'jabatan_struktural'=> 'Kepala Laboratorium',
            'navigasi'          => 'Lantai 1, Samping Ruang Radiologi',
            'kata_kunci'        => 'terapi kejut, setrum listrik, terapi listrik, kejut otak, terapi syok, tindakan ect, terapi pingsan, setrum jiwa, stimulasi listrik, terapi elektro, penanganan depresi berat, tindakan medis setrum, ruang ekt, terapi saraf, pengobatan kejut',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => '(Electroconvulsive Therapy) di RSJ Tampan adalah sebagai tempat pelaksanaan terapi kejut listrik secara terkontrol dan aman pada pasien dengan gangguan jiwa tertentu sesuai indikasi medis, di bawah pengawasan tenaga kesehatan profesional.',
        ]);
        $this->tambahFoto($ruangan->id, ['ruang-ect-1.jpg', 'ruang-ect-2.jpg', 'ruang-ect-3.jpg']);

        // 7. Ruang CCTV (Gedung IGD)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang CCTV',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Kolaborasi',
            'jabatan_struktural'=> 'Koordinasi Satpam/IPSRS',
            'navigasi'          => 'Lantai 1 IGD',
            'kata_kunci'        => 'cek rekaman, kamera pengawas, kontrol video, pusat monitor, keamanan rumah sakit, lihat kejadian, bukti video, pantauan kamera, security room igd, ruang kontrol cctv, rekaman hilang, cari barang hilang, pengawasan satpam, pusat pengawasan, layar cctv',
            'kategori'          => 'Fasilitas Petugas RSJ Tampan',
            'fungsi_ruangan'    => 'pusat pemantauan keamanan dan keselamatan lingkungan rumah sakit, khususnya area IGD, untuk mengawasi aktivitas, mencegah risiko gangguan keamanan, serta mendukung respons cepat terhadap kejadian darurat.',
        ]);
        $this->tambahFoto($ruangan->id, ['ruang-cctv-1.jpg', 'ruang-cctv-2.jpg','ruang-cctv-3.jpg']);

        // 8. Ruang Penyimpanan Barang (Gedung IGD) 
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Penyimpanan Barang',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Kolaborasi',
            'jabatan_struktural'=> 'Koordinasi Satpam/IPSRS',
            'navigasi'          => 'Lantai 1 IGD',
            'kata_kunci'        => 'titip barang, loker pasien, simpan tas, penitipan hp, lemari barang, tempat helm, pengamanan barang, loker pengunjung, gudang barang pasien, titipan berharga, simpan dompet, locker igd, tempat penitipan, pengamanan aset, kotak simpan',
            'kategori'          => 'Fasilitas Petugas RSJ Tampan',
            'fungsi_ruangan'    => 'tempat penitipan dan pengamanan barang milik pasien selama menjalani perawatan, guna mencegah kehilangan, penyalahgunaan, serta menjaga keselamatan pasien dan lingkungan perawatan.',
        ]);
        $this->tambahFoto($ruangan->id, ['ruang-penyimpanan-barang-1.jpg', 'ruang-penyimpanan-barang-2.jpg', 'ruang-penyimpanan-barang-3.jpg']);

        // 9. SIMRS 
        $ruangan = DataRuangan::create([ 
            'nama_ruangan' => 'SIMRS', 
            'nama_gedung' => 'SIM RS Jiwa Tampan', 
            'penanggung_jawab' => 'HARMENTO, SE', 
            'jabatan_struktural'=> 'Kepala IT', 
            'navigasi' => 'Jalan lurus melalui koridor di antara Gedung Poliklinik dan IGD sejauh ±25 meter. Ruangan yang Anda cari berada di sisi kanan dan berdiri sendiri, tidak terhubung dengan gedung mana pun.', 
            'kata_kunci' => 'simrs sistem digital rumah sakit, sistem informasi pasien rsj, aplikasi rumah sakit error, login sistem simrs, database pasien digital, server data rumah sakit, jaringan komputer rsj, sistem down rumah sakit, software pelayanan medis, input data pasien komputer, gangguan aplikasi simrs, sistem rekam medis elektronik, bantuan sistem komputer rs, pengelolaan data digital rs, instalasi aplikasi rumah sakit, jaringan internet hilang, komputer rsj lemot, komputer rsj tidak bisa login, simrs error, wifi lelet, wifi lambat, internet lambat, gangguan jaringan, kerusakan sistem, sistem error, aplikasi error, komputer error, jaringan bermasalah, wifi tidak stabil, internet rumah sakit lambat, masalah teknologi informasi, IT support, bantuan IT, teknisi komputer, jaringan wifi mati, koneksi internet putus, server down, aplikasi tidak bisa dibuka, sistem rumah sakit bermasalah, gangguan teknologi rs, masalah komputer rsj, jaringan rumah sakit error',
            'kategori' => 'Fasilitas IT RSJ Tampan', 
            'fungsi_ruangan' => 'unit pengelolaan teknologi informasi untuk pengembangan, pengoperasian, dan pemeliharaan sistem manajemen rumah sakit, guna mendukung integrasi data, kelancaran layanan, keamanan informasi, serta efisiensi operasional di rumah sakit jiwa.', 
        ]);
        
        $this->tambahFoto($ruangan->id, ['simrs-1.jpg', 'simrs-2.jpg', 'simrs-3.jpg', 'simrs-4.jpg', 'simrs-5.jpg']);

        // 10. Humas
        $ruangan = DataRuangan::create([ 
            'nama_ruangan'      => 'Humas',
            'nama_gedung'       => 'Gedung Poliklinik',
            'penanggung_jawab'  => 'Rini Faujiah, S. IKOM',
            'jabatan_struktural'=> 'Kepala Humas',
            'navigasi'          => 'Masuk melalui Gedung Utama Poliklinik, kemudian naik menggunakan tangga sebelah kanan. Ruangan yang Anda cari berada tepat di depan setelah menaiki tangga.',
            'kata_kunci'        => 'humas rumah sakit, hubungan masyarakat rs, publikasi rsj, informasi media rs, customer service utama rs, pusat informasi publik rs, promosi kesehatan rs, layanan pengaduan publik, komunikasi eksternal rsj, kerjasama media rs, protokol rumah sakit, info layanan rsj, berita rsj, penyuluhan publik, pendaftaran informasi publik, tamu dinas rs, humas lantai 2 poliklinik, promosi kesehatan masyarakat, publikasi resmi rsj, informasi pers rs, hubungan masyarakat lantai 2, pusat informasi dan promosi rs',
            'kategori'          => 'Fasilitas Kantor RSJ Tampan',
            'fungsi_ruangan'    => 'ruang pelayanan hubungan masyarakat untuk pengelolaan informasi, komunikasi, dan publikasi rumah sakit, guna membangun citra positif, meningkatkan keterbukaan layanan, serta menjalin hubungan dengan masyarakat dan pemangku kepentingan.',
        ]);
        $this->tambahFoto($ruangan->id, ['humas-1.jpg','humas-2.jpg','humas-3.jpg','humas-4.jpg','humas-5.jpg']);
 
        // 11. Mushola Terdekat Poliklinik dan IGD Lantai 1
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Mushola',
            'nama_gedung'       => 'Area RSJ Tampan',
            'penanggung_jawab'  => 'Pengelola Masjid',
            'jabatan_struktural'=> 'Staf Kerohanian',
            'navigasi'          => 'Mushala yang Anda cari berada tepat di belakang IGD, dapat diakses melalui lorong di antara ruang CCSD dan Farmasi Obat.',
            'kata_kunci'        => 'mushola belakang igd, tempat sholat belakang igd, mushola lorong cc sd farmasi, mushola akses dari lorong, tempat ibadah belakang igd, mushola antara cc sd dan farmasi, lokasi sholat di lorong, mushola lewat lorong igd, tempat doa belakang igd, mushola area belakang, mushola dekat lorong utama, tempat shalat mushala, ingin shalat, ingin sholat, mushola paling belakang igd',
            'kategori'          => 'Fasilitas Umum RSJ Tampan',
            'fungsi_ruangan'    => 'Tempat ibadah bagi pengunjung dan staf Muslim.', 
        ]);
        $this->tambahFoto($ruangan->id, ['mushola-1.jpg', 'mushola-2.jpg', 'mushola-3.jpg', 'mushola-4.jpg', 'mushola-5.jpg']);

        // 12. Farmasi Rawat Inap
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Farmasi Rawat Inap',
            'nama_gedung'       => 'Gedung Rawat Inap',
            'penanggung_jawab'  => 'Kepala Instalasi Farmasi',
            'jabatan_struktural'=> 'Kepala Farmasi',
            'navigasi'          => 'Terletak di area pelayanan farmasi rawat inap',
            'kata_kunci'        => 'farmasi bangsal rawat inap, obat untuk pasien opname, pengambilan obat bangsal inap, layanan obat kamar pasien inap, farmasi khusus pasien rawat inap, distribusi obat ke bangsal, obat pasien menginap, farmasi ruangan rawat inap, pelayanan resep bangsal inap, ambil obat pasien inap di bangsal, obat untuk pasien dirawat inap, layanan farmasi bangsal, depo obat rawat inap, tempat ambil obat pasien opname, farmasi lantai rawat inap, ambil obat pasien inap, tempat ambil obat rawat inap, pengambilan obat rawat inap, obat pasien menginap, farmasi untuk bangsal, distribusi obat inap, layanan obat pasien rawat inap, farmasi gedung rawat inap',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'Layanan penyediaan obat-obatan bagi pasien rawat inap.',
        ]);
        $this->tambahFoto($ruangan->id, ['farmasi-rawat-inap-5.jpg', 'farmasi-rawat-inap-6.jpg', 'farmasi-rawat-inap-4.jpg']);


        // 13. Ruang Tindakan Psikiatri Laki-Laki (Gedung IGD)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Tindakan Psikiatri Laki-laki',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'dr. Hanifal Yunis',
            'jabatan_struktural'=> 'Kepala IGD',
            'navigasi'          => 'Terletak di area pelayanan farmasi rawat inap',
            'kata_kunci'        => 'pasien pria ngamuk, penanganan laki ngamuk, ikat pasien cowok, fiksasi laki, restrain pria, suntik penenang laki, isolasi pria, gawat jiwa laki, rtp laki-laki, gaduh gelisah pria, psikiatri cowok, penanganan agresif laki, bangsal pria igd, tindakan jiwa pria, keamanan pasien laki',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pemberian tindakan dan penanganan psikiatri darurat khusus pasien perempuan, dengan memperhatikan aspek keamanan, privasi, dan kenyamanan sesuai standar pelayanan kesehatan jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['psikiatri-laki-1.jpg', 'psikiatri-laki-2.jpg']);


        // 14. Ruang Tindakan Psikiatri Perempuan (Gedung IGD)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Tindakan Psikiatri Perempuan',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'dr. Hanifal Yunis',
            'jabatan_struktural'=> 'Kepala IGD',
            'navigasi'          => 'Terletak di area pelayanan farmasi rawat inap',
            'kata_kunci'        => 'pasien wanita ngamuk, penanganan cewek histeris, ikat pasien perempuan, fiksasi wanita, restrain cewek, suntik penenang wanita, isolasi perempuan, gawat jiwa wanita, rtp perempuan, gaduh gelisah wanita, psikiatri cewek, penanganan agresif wanita, bangsal cewek igd, tindakan jiwa wanita, keamanan pasien perempuan',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pemberian tindakan dan penanganan psikiatri darurat khusus pasien perempuan, dengan mengutamakan aspek keamanan, pengendalian perilaku, serta keselamatan pasien dan petugas sesuai standar pelayanan kesehatan jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['psikiatri-perempuan-1.jpg', 'psikiatri-perempuan-2.jpg']);


        // 15. Ruang Transit Jenazah (Gedung IGD)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Transit Jenazah IGD',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'dr. Hanifal Yunis',
            'jabatan_struktural'=> 'Kepala Instalasi Gawat Darurat',
            'navigasi'          => 'Terletak di area pelayanan farmasi rawat inap',
            'kata_kunci'        => 'transit jenazah igd, tempat jenazah sementara igd, ruang tunggu jenazah igd, penyimpanan sementara jenazah, sebelum ke kamar jenazah, sebelum menuju kamar jenazah, jenazah sementara igd, jenazah pasien igd, tempat jenazah darurat, lokasi jenazah sementara igd, ruang jenazah sementara, menunggu pemindahan jenazah, transit jenazah rumah sakit, area jenazah igd, tempat jenazah sebelum dipindah ke kamar jenazah, transit mayat, ruang transit mayat, tempat mayat sementara, sebelum ke kamar mayat, jenazah transit, penyimpanan jenazah sementara igd, lokasi transit jenazah, ruang tunggu mayat, tempat penyimpanan mayat sementara, dimana transit jenazah, jenazah menunggu dipindah',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat penyimpanan sementara jenazah pasien sebelum dipindahkan ke ruang pemulasaraan atau diserahkan kepada pihak keluarga sesuai prosedur dan ketentuan yang berlaku.',
        ]);
        $this->tambahFoto($ruangan->id, ['transit-jenazah-1.jpg', 'transit-jenazah-2.jpg', 'transit-jenazah-3.jpg']);


        // 16. Kepala IGD dan Kepala Perawat IGD (Gedung IGD)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Kepala IGD dan Kepala Perawat IGD',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'dr. Hanifal Yunis',
            'jabatan_struktural'=> 'Kepala IGD',
            'navigasi'          => 'Terletak di area pelayanan farmasi rawat inap', 
            'kata_kunci'        => 'kepala igd dan kepala perawat, ruangan ka igd, pimpinan igd, meja kepala igd, penanggung jawab igd, ruang kepala perawat igd, koordinasi perawat igd, ruang dokter kepala igd, kepala instalasi gawat darurat, manajemen igd, pimpinan unit igd, kantor kepala igd, kepala ruangan igd, atasan igd dan perawat, ruang karu igd, administrasi igd dan perawat',
            'kategori'          => 'Fasilitas Kantor RSJ Tampan',
            'fungsi_ruangan'    => 'ruang koordinasi, pengendalian operasional, administrasi, dan pengambilan keputusan dalam penyelenggaraan pelayanan IGD, guna menjamin kelancaran, mutu, dan keselamatan pelayanan kegawatdaruratan.',
        ]);
        $this->tambahFoto($ruangan->id, ['kepala-igd-1.jpg', 'kepala-igd-2.jpg','kepala-igd-3.jpg']);


        // 17. Ruang Ganti Perawat (Gedung IGD)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ganti Perawat',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'dr. Hanifal Yunis',
            'jabatan_struktural'=> 'Kepala IGD',
            'navigasi'          => 'Terletak di area pelayanan farmasi rawat inap',
            'kata_kunci'        => 'ruang ganti baju, loker perawat, ganti seragam, tempat bilas perawat, ruang staf ganti, rg perawat, kamar ganti nakes, tempat simpan baju, ganti pakaian medis, ganti dinas, ruang locker suster, tempat perawat bersiap, ganti baju petugas, fasilitas ganti, ruang privasi perawat',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat perawat berganti pakaian kerja dan menyimpan perlengkapan pribadi, guna menjaga kebersihan, kerapian, serta kesiapan tenaga keperawatan dalam memberikan pelayanan.', 
        ]);
        $this->tambahFoto($ruangan->id, ['ganti-perawat-igd-1.jpg', 'ganti-perawat-igd-2.jpg', 'ganti-perawat-igd-3.jpg']);


        // 18. Ruang Gas Medis  (Gedung IGD)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Gas Medis',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Irsyad Agus, Amd',
            'jabatan_struktural'=> 'Kepala IPSRS',
            'navigasi'          => 'Terletak di area pelayanan farmasi rawat inap',
            'kata_kunci' => 'gas medis, ruang gas igd, tabung oksigen rs, o2 medis, suplai oksigen igd, sentral gas medis, gudang gas rs, distribusi oksigen, alat bantu napas, isi ulang oksigen, stok o2 rs, instalasi gas medis, ruang tabung oksigen, gas untuk pasien, sistem gas rumah sakit',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas penyimpanan dan pengaturan suplai gas medis (seperti oksigen dan gas penunjang lainnya) untuk mendukung tindakan kegawatdaruratan dan pelayanan medis secara aman dan berkesinambungan.',
        ]);
        $this->tambahFoto($ruangan->id, ['gas-medis-1.jpg', 'gas-medis-2.jpg', 'gas-medis-3.jpg']);


        // 19. Ruang Dokter (Gedung IGD)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Dokter',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'dr. Hanifal Yunis',
            'jabatan_struktural'=> 'Kepala IGD',
            'navigasi'          => 'Terletak di area pelayanan farmasi rawat inap',
            'kata_kunci'        => 'ruang kerja dokter igd, tempat dokter jaga, ruang istirahat dokter, ruang piket dokter, meja kerja dokter, ruang diskusi dokter, ruang laporan medis dokter, tempat koordinasi dokter, ruang catatan medis dokter, ruang dokter jaga igd, area kerja dokter, ruang briefing dokter, tempat dokter standby, ruang tugas dokter, ruang internal dokter',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat dokter melakukan pemeriksaan, konsultasi, pencatatan medis, serta koordinasi penanganan pasien, guna menunjang pelayanan kegawatdaruratan yang efektif dan profesional.',
        ]);
        $this->tambahFoto($ruangan->id, ['ruang-dokter-igd-1.jpg', 'ruang-dokter-igd-2.jpg', 'ruang-dokter-igd-3.jpg']);


        // 20. Ruang Renin Kotor (Gedung IGD)
        $ruangan = DataRuangan::create([ 
            'nama_ruangan'      => 'Renin Kotor IGD',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Cleaning Service',
            'jabatan_struktural'=> 'Petugas Kebersihan',
            'navigasi'          => 'Terletak di area pelayanan farmasi rawat inap',
            'kata_kunci' => 'linen kotor igd, tempat linen kotor, ruang kotor igd, penampungan linen bekas, sprei kotor igd, baju pasien kotor igd, limbah linen rs, kain infeksius, tempat cucian kotor, kantong linen igd, area kotor rs, pengumpulan linen bekas, ruang transit linen kotor, sebelum laundry rs, tempat buang linen kotor',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pengumpulan dan penyimpanan sementara linen kotor atau terkontaminasi sebelum dibawa ke unit laundry, guna menjaga kebersihan, mencegah infeksi, dan mendukung pengendalian mutu lingkungan rumah sakit.',
        ]);
        $this->tambahFoto($ruangan->id, ['renin-kotor-igd-1.jpg', 'renin-kotor-igd-2.jpg']);


        // 21. Ruang Administrasi Radiologi (Gedung IGD)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Administrasi Radiologi IGD',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'dr. Hanifal Yunis',
            'jabatan_struktural'=> 'Kepala IGD',
            'navigasi'          => 'Terletak di area pelayanan farmasi rawat inap',
            'kata_kunci'        => 'daftar pemeriksaan radiologi, loket pendaftaran radiologi, tempat daftar rontgen, antrian pemeriksaan radiologi, urus berkas radiologi, meja administrasi radiologi, input data pasien radiologi, pendaftaran pasien rontgen, loket layanan radiologi, serahkan surat rujukan radiologi, cetak bukti pemeriksaan radiologi, daftar pemeriksaan scan, administrasi pasien radiologi, tempat ambil nomor radiologi, meja pelayanan administrasi radiologi',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pengelolaan administrasi pelayanan radiologi, meliputi pendaftaran pasien, pencatatan pemeriksaan, pengarsipan data, serta koordinasi pelayanan penunjang diagnostik.',
        ]); 
        $this->tambahFoto($ruangan->id, ['admin-radiologi-1.jpg', 'admin-radiologi-2.jpg', 'admin-radiologi-3.jpg', 'admin-radiologi-4.jpg', 'admin-radiologi-5.jpg']);


        // 22. Ruang Petugas (Gedung IGD)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Petugas IGD',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Kepala Instalasi Gawat Darurat',
            'jabatan_struktural'=> 'Kepala IGD',
            'navigasi'          => 'Terletak di area pelayanan farmasi rawat inap',
            'kata_kunci'        => 'istirahat petugas jaga igd, ruang siaga tenaga darurat, tempat rehat saat jaga igd, ruang standby petugas igd, istirahat perawat shift malam, ruang kesiapan petugas darurat, tempat jeda kerja igd, ruang tunggu petugas jaga, area istirahat kondisi darurat, tempat siaga tenaga medis igd, ruang rehat tim darurat, lokasi standby perawat igd, ruang istirahat saat tugas darurat, tempat persiapan petugas igd, ruang jaga tenaga medis igd',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat istirahat singkat, koordinasi, dan persiapan kerja petugas, guna menjaga kesiapan, kenyamanan, dan kelancaran pelayanan kegawat daruratan.', 
        ]);
        $this->tambahFoto($ruangan->id, ['ruang-petugas-igd-1.jpg', 'ruang-petugas-igd-2.jpg', 'ruang-petugas-igd-3.jpg']);

        //  23. Ruang CT-Scan (Gedung IGD)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'CT Scan IGD',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'dr. Rora Yosi Deswita, Sp.Rad',
            'jabatan_struktural'=> 'Kepala Instalasi Radiologi',
            'navigasi'          => 'Terletak di area pelayanan farmasi rawat inap',
            'kata_kunci'        => 'alat ct scan rumah sakit, mesin scan tubuh, pemeriksaan ct scan pasien, scan bagian kepala, scan otak detail, pemeriksaan cedera dalam tubuh, alat pencitraan ct scan, scan organ tubuh, pemeriksaan bagian dalam tubuh, alat medis ct scan, proses scan pasien, pemeriksaan otak dengan alat, scan kondisi dalam tubuh, alat radiologi ct scan, pemeriksaan tubuh dengan mesin',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas pemeriksaan pencitraan diagnostik untuk membantu menegakkan diagnosis kondisi medis tertentu, terutama yang berkaitan dengan kelainan otak, cedera kepala, dan gangguan saraf, guna mendukung penanganan medis dan psikiatri secara tepat.',
        ]);
        $this->tambahFoto($ruangan->id, ['ct-scan-igd-1.jpg', 'ct-scan-igd-2.jpg', 'ct-scan-igd-3.jpg']);


        // 24. Ruang X-Ray (Gedung IGD)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang X-Ray IGD',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'dr. Rora Yosi Deswita, Sp.Rad',
            'jabatan_struktural'=> 'Kepala Instalasi Radiologi',
            'navigasi'          => 'Terletak di area pelayanan farmasi rawat inap',
            'kata_kunci'        => 'foto dada, rontgen tulang, ronsen paru, foto xray, cek patah tulang, thorax, foto kaki, foto tangan, rontgen badan, radiologi dasar, hasil ronsen, x-ray medis, foto tulang belakang, penyinaran medis, cek paru-paru',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas pemeriksaan radiologi menggunakan sinar-X untuk membantu diagnosis kondisi medis, seperti kelainan tulang, paru-paru, atau organ lainnya, guna menunjang penegakan diagnosis dan penatalaksanaan pasien.',
        ]);
        $this->tambahFoto($ruangan->id, ['x-ray-igd-1.jpg', 'x-ray-igd-2.jpg']);

        // 25. Toilet Petugas (Gedung IGD)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Toilet Petugas IGD',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Cleaning Service',
            'jabatan_struktural'=> 'Petugas Kebersihan',
            'navigasi'          => 'Terletak di area pelayanan farmasi rawat inap',
            'kata_kunci' => 'toilet petugas igd, wc petugas igd, toilet nakes igd, wc tenaga kesehatan igd, toilet staf igd, wc karyawan igd, toilet internal igd, wc khusus petugas igd, kamar mandi dokter igd, toilet perawat igd',
            'kategori'          => 'Fasilitas Petugas RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas sanitasi khusus bagi tenaga kesehatan dan petugas, guna menjaga kebersihan diri, kenyamanan, serta mendukung kelancaran aktivitas kerja selama bertugas.',
        ]);
        $this->tambahFoto($ruangan->id, ['toilet-petugas-igd-1.jpg', 'toilet-petugas-igd-2.jpg', 'toilet-petugas-igd-3.jpg']);


        // 26. Ruang Linen Bersih (Gedung IGD)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Linen Bersih IGD',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Cleaning Service',
            'jabatan_struktural'=> 'Petugas Kebersihan',
            'navigasi'          => 'Terletak di area pelayanan farmasi rawat inap',
            'kata_kunci'        => 'stok sprei, selimut baru, baju bersih pasien, lemari linen, ambil selimut, minta sprei, linen bersih igd, gudang linen bersih, persediaan kain, kain bersih, sprei steril, sarung bantal baru, gudang selimut, stok linen, linen rapi',
            'kategori'          => 'Fasilitas Petugas RSJ Tampan',
            'fungsi_ruangan'    => 'tempat penyimpanan linen bersih dan steril yang siap digunakan untuk pelayanan pasien, guna menjaga kebersihan, mencegah infeksi, dan menunjang mutu pelayanan kesehatan.',
        ]);
        $this->tambahFoto($ruangan->id, ['linen-bersih-igd-1.jpg', 'linen-bersih-igd-2.jpg', 'linen-bersih-igd-3.jpg']);


        // 27. Keperawatan (Gedung IGD)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Keperawatan IGD',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Elly Hayatinur, SP., M.Kes',
            'jabatan_struktural'=> 'Kepala Farmasi',
            'navigasi'          => 'Terletak di area pelayanan farmasi rawat inap',
            'kata_kunci'        => 'meja perawat, pos suster, nurse station, lapor perawat, cari suster, jaga perawat, ners station, tempat lapor pasien, pusat informasi perawat, administrasi keperawatan, counter perawat, meja jaga suster, panggil perawat, informasi perawat, nakes jaga',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'pusat koordinasi, pengelolaan, dan pendokumentasian asuhan keperawatan, meliputi pengaturan pelayanan keperawatan, pencatatan medis, serta komunikasi antar petugas untuk menjamin keselamatan dan mutu pelayanan kegawatdaruratan sesuai standar RSJ.',
        ]);
        $this->tambahFoto($ruangan->id, ['keperawatan-igd-1.jpg', 'keperawatan-igd-2.jpg', 'keperawatan-igd-3.jpg']);

        // 28. Ruang Tindakan Bedah (IGD Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Tindakan Bedah IGD',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'dr. Hanifal Yunis',
            'jabatan_struktural'=> 'Kepala Instalasi IGD',
            'navigasi'          => 'Terletak di lantai 1 Gedung IGD',
            'kata_kunci'        => 'jahit luka terbuka, tindakan bedah minor igd, penjahitan luka robek, angkat jahitan luka, hecting luka, bedah luka darurat, tindakan luka sobek, operasi kecil darurat, ruang jahit luka igd, tindakan bedah ringan igd, penanganan luka terbuka, buka jahitan luka, tindakan medis bedah kecil, perawatan luka jahit, tindakan luka darurat igd',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pelaksanaan tindakan bedah minor dan kegawatdaruratan terbatas, guna menangani kondisi medis tertentu secara cepat dan aman sebelum pasien dirujuk atau mendapatkan perawatan lanjutan sesuai standar pelayanan rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['tindakan-bedah-igd-1.jpg', 'tindakan-bedah-igd-2.jpg']);

        // 29. Ruang Infeksius (IGD Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Infeksius IGD',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'dr. Hanifal Yunis',
            'jabatan_struktural'=> 'Kepala Instalasi IGD',
            'navigasi'          => 'Terletak di lantai 1 Gedung IGD',
            'kata_kunci'        => 'ruang isolasi pasien infeksi, pasien penyakit menular, isolasi pasien igd, ruang karantina pasien, tempat pasien covid dirawat, ruang pasien tbc, isolasi batuk menular, ruang pasien infeksius, tempat pisah pasien menular, ruang penanganan infeksi langsung, pasien dengan penyakit menular, ruang isolasi darurat, tempat rawat pasien infeksi, ruang khusus pasien menular, isolasi pasien penyakit',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat isolasi dan penanganan pasien dengan dugaan atau terkonfirmasi penyakit infeksi, guna mencegah penularan, melindungi pasien lain dan petugas, serta memastikan pelayanan kegawatdaruratan dilakukan sesuai standar pencegahan dan pengendalian infeksi (PPI) rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['ruang-infeksius-igd-1.jpg', 'ruang-infeksius-igd-2.jpg']);

        // 30. Resepsionis (IGD Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Resepsionis IGD',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Petugas RSJ',
            'jabatan_struktural'=> 'Administasi Pelayanan',
            'navigasi'          => 'Terletak di area depan lantai 1 Gedung IGD (Pintu Masuk)',
            'kata_kunci' => 'pendaftaran igd, masuk igd darurat, daftar pasien gawat darurat, loket masuk igd, meja depan igd, penerimaan pasien darurat, administrasi igd, daftar berobat igd, pasien kecelakaan masuk, pendaftaran cepat igd, triase awal igd, loket emergency, daftar pasien baru igd, resepsionis igd depan, pintu masuk igd',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'pintu masuk pelayanan kegawatdaruratan, yang bertugas melakukan penerimaan awal pasien, pemberian informasi, pencatatan identitas, serta pengaturan alur pelayanan IGD secara cepat, tepat, dan sesuai standar pelayanan rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['resepsionis-igd-1.jpg', 'resepsionis-igd-2.jpg', 'resepsionis-igd-3.jpg', 'resepsionis-igd-4.jpg']);

        // 31. Depo Farmasi IGD (IGD Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Depo Farmasi IGD & Ranap',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'BETTI KRISTINA, S.Farm,Apt',
            'jabatan_struktural'=> 'Instalasi Farmasi',
            'navigasi'          => 'Terletak di lantai 1 Gedung IGD',
            'kata_kunci'        => 'farmasi igd lantai 1, depo obat igd darurat, apotek igd lantai 1, ambil obat gawat darurat igd, tebus resep igd lantai 1, depo obat emergency igd, obat tindakan igd lantai 1, farmasi gawat darurat lantai 1, loket obat igd lantai 1, pelayanan obat igd lantai 1, obat pasien igd lantai 1, apotek gawat darurat lantai 1, depo farmasi igd dan ranap, farmasi igd ranap, ambil obat ranap dari igd, depo obat igd dan rawat inap, farmasi lantai 1 igd', 
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'unit penyediaan, penyimpanan, dan pendistribusian obat serta perbekalan farmasi untuk kebutuhan kegawatdaruratan, guna menjamin ketersediaan obat yang cepat, tepat, aman, dan sesuai standar pelayanan kefarmasian rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['depo-farmasi-igd-1.jpg', 'depo-farmasi-igd-2.jpg', 'depo-farmasi-igd-3.jpg']);

        // 32. WC (IGD Lantai 1) 
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Toilet Umum IGD Lantai 1',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Petugas Kebersihan',
            'jabatan_struktural'=> 'Cleaning Service',
            'navigasi'          => 'Terletak di lantai 1 Gedung IGD',
            'kata_kunci' => 'toilet umum igd lt1, wc umum igd lt1, toilet pengunjung igd lantai 1, wc pasien igd lt1, kamar mandi umum igd lt1, toilet publik igd lantai 1, wc publik igd lt1, toilet luar igd lt1, kamar mandi pengunjung igd lt1, toilet depan igd lt1',
            'kategori'          => 'Fasilitas Umum RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas sanitasi untuk pasien, pengunjung, dan petugas, guna menjaga kebersihan diri, kenyamanan, serta mendukung penerapan standar kesehatan lingkungan dan pencegahan infeksi di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['wc-igd-1.jpg', 'wc-igd-2.jpg', 'wc-igd-3.jpg']);

        // 33. Kepala Bidang Pelayanan Medik (IGD Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Kepala Bidang Pelayanan Medik',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'drg. Jenita Aruma, M.M',
            'jabatan_struktural'=> 'Kepala Bidang pelayanan Medik',
            'navigasi'          => 'Terletak di lantai 2 Gedung IGD',
            'kata_kunci'        => 'kabid pelayanan medik igd, kepala bidang yanmed igd lantai 2, ruang kabid yanmed igd, kantor kepala bidang medik igd, ruangan pimpinan medik igd, manajemen pelayanan medik igd lantai 2, koordinasi dokter igd lantai 2, ruang kerja kabid yanmed, drg jenita aruma lantai 2 igd, pimpinan layanan medis igd, kantor kabid medik bukan poli, pengawasan pelayanan medik igd, ruang struktural medik igd, ruang rapat pelayanan medik igd, tempat koordinasi dokter igd, kepala bidang pelayanan medik igd',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pengelolaan, pengawasan, dan koordinasi pelayanan medik, meliputi perencanaan, pengendalian mutu, evaluasi kinerja tenaga medis, serta penjaminan keselamatan pasien sesuai standar pelayanan rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['kabid-yanmed-igd-1.jpg', 'kabid-yanmed-igd-2.jpg', 'kabid-yanmed-igd-3.jpg']);

        // 34. Kepala Bagian Keuangan (IGD Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Kepala Bagian Keuangan',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Fahrizal, SE., M.Si',
            'jabatan_struktural'=> 'Kepala Bagian Keuangan',
            'navigasi'          => 'Terletak di lantai 2 Gedung IGD',
            'kata_kunci'        => 'kabag keuangan igd, kepala bagian keuangan igd lantai 2, ruang kabag keuangan igd, kantor kepala bagian keuangan igd, pimpinan keuangan igd, manajemen keuangan igd lantai 2, fahrizal keuangan lantai 2, ruang keuangan strategis igd, kontrol keuangan igd lantai 2, pejabat keuangan igd, bagian keuangan igd, kepala finance igd, ruang keputusan keuangan igd, keuangan operasional igd lantai 2, kepala bagian keuangan operasional',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pengelolaan, pengawasan, dan pengendalian administrasi keuangan rumah sakit, meliputi perencanaan anggaran, pengelolaan pendapatan dan belanja, serta pelaporan keuangan guna mendukung keberlangsungan dan akuntabilitas pelayanan sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['kabag-keuangan-igd-1.jpg', 'kabag-keuangan-igd-2.jpg', 'kabag-keuangan-igd-3.jpg']);

        // 35. Wadir Bidang Umum dan Keuangan (IGD Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Wadir Bidang Umum dan Keuangan',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Zulkifli, S. Kep., MH',
            'jabatan_struktural'=> 'Wakil Direktur Umum dan Keuangan',
            'navigasi'          => 'Terletak di lantai 2 Gedung IGD',
            'kata_kunci'        => 'wakil direktur rs, ruang wadir umum keuangan, kantor pimpinan rumah sakit, ruang manajemen rs, wadirum rs tampan, kantor wakil direktur igd, ruang pejabat tinggi rs, ruang kebijakan umum rs, pimpinan operasional rs, kantor direksi rumah sakit, ruang atasan tertinggi kedua, ruang pengambil keputusan rs, ruang manajemen kepegawaian rs, kantor pimpinan besar rs, ruang koordinasi umum keuangan',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pengelolaan, koordinasi, dan pengawasan urusan umum serta keuangan rumah sakit, meliputi administrasi, kepegawaian, sarana prasarana, dan pengelolaan anggaran guna menunjang kelancaran operasional dan akuntabilitas sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['wadir-umum-keuangan-igd-1.jpg', 'wadir-umum-keuangan-igd-2.jpg', 'wadir-umum-keuangan-igd-3.jpg']);

        // 36. Kepala Bagian Tata Usaha (IGD Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Kepala Bagian Tata Usaha',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Andry Rinaldi, S. Sos., M. Si',
            'jabatan_struktural'=> 'Kepala Bagian Tata Usaha',
            'navigasi'          => 'Terletak di lantai 2 Gedung IGD',
            'kata_kunci'        => 'kantor kabag tu, tata usaha rsj, administrasi surat, urusan persuratan, stempel rs, nomor surat masuk, arsip rsj, kantor pak andry, ruangan tu lantai 2, sekretariat rsj, agenda surat, legalisir surat, urusan kepegawaian tu, manajemen administrasi tu, kepala tata usaha',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pengelolaan dan pengendalian administrasi rumah sakit, meliputi persuratan, kearsipan, kepegawaian, dan koordinasi pelayanan administrasi guna mendukung kelancaran operasional serta tata kelola RSJ sesuai standar yang berlaku.',
        ]);
        $this->tambahFoto($ruangan->id, ['kabag-tu-igd-1.jpg', 'kabag-tu-igd-2.jpg', 'kabag-tu-igd-3.jpg']);

        // 37. Laboratorium (IGD Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Laboratorium IGD Lantai 2',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'dr. RICCA FITRIA, Sp.PK',
            'jabatan_struktural'=> 'Kepala Pencegahan dan Pengendalian Infeksi',
            'navigasi'          => 'Terletak di lantai 2 Gedung IGD',
            'kata_kunci'        => 'cek darah lab igd, pemeriksaan urin lab igd, tes kesehatan lab igd lantai 2, ambil sampel darah lab igd, hasil pemeriksaan lab igd, uji sampel medis igd, cek gula darah lab, tes kolesterol lab igd, pemeriksaan spesimen igd, analisis darah pasien igd, layanan laboratorium igd lantai 2, tempat cek kesehatan igd, hasil uji medis igd, pemeriksaan cairan tubuh igd, laboratorium igd lantai dua, lab igd lt2',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas pemeriksaan penunjang diagnostik melalui analisis sampel biologis (darah, urin, dan lainnya) untuk mendukung penegakan diagnosis, pemantauan kondisi pasien, serta perencanaan dan evaluasi terapi sesuai standar pelayanan rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['laboratorium-igd-1.jpg', 'laboratorium-igd-2.jpg', 'laboratorium-igd-3.jpg','laboratorium-igd-4.jpg','laboratorium-igd-5.jpg','laboratorium-igd-6.jpg','laboratorium-igd-7.jpg','laboratorium-igd-8.jpg']);

        // 38. Direktur (IGD Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Direktur',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'dr. Prima Wulandari',
            'jabatan_struktural'=> 'Direktur RSJ Tampan',
            'navigasi'          => 'Terletak di lantai 2 Gedung IGD',
            'kata_kunci'        => 'kantor direktur rsj, ruangan ibu prima, pimpinan tertinggi rs, meja direktur, ruang rapat direktur, manajemen puncak rs, direktur utama, kantor dokter prima, ruangan pimpinan rsj, kebijakan rumah sakit, administrasi direktur, sekretaris direktur, sespri direktur, ruang tamu direktur, pimpinan rumah sakit, dirut, dirut rsj tampan, kepala rumah sakit',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pengambilan keputusan strategis, pengendalian manajemen, dan koordinasi pimpinan rumah sakit, meliputi perencanaan kebijakan, evaluasi kinerja, serta pembinaan seluruh unit kerja guna menjamin mutu, keselamatan, dan keberlangsungan pelayanan sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['direktur-igd-1.jpg', 'direktur-igd-2.jpg', 'direktur-igd-3.jpg','direktur-igd-4.jpg']);

        // 39. Wadir Bidang Medik dan Keperawatan (IGD Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Wadir Bidang Medik dan Keperawatan',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'dr. Elita Sari',
            'jabatan_struktural'=> 'Wakil Direktur Medik dan Keperawatan',
            'navigasi'          => 'Terletak di lantai 2 Gedung IGD',
            'kata_kunci'        => 'wadir medik keperawatan igd, wakil direktur medik keperawatan igd lantai 2, pimpinan keperawatan igd, kantor wadir medik igd, dr elita sari lantai 2, manajemen medik keperawatan igd, koordinasi perawat igd, ruangan wakil direktur medik, kebijakan keperawatan igd, wadir medik rsj igd lantai 2, urusan nakes igd, pimpinan profesi medik igd, kantor wadir medik lantai 2 igd',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pengelolaan, koordinasi, dan pengawasan pelayanan medik serta keperawatan, meliputi pembinaan tenaga kesehatan, pengendalian mutu dan keselamatan pasien, serta evaluasi kinerja pelayanan guna memastikan pelayanan kesehatan jiwa berjalan sesuai standar dan kebijakan rumah sakit.',
        ]);
        $this->tambahFoto($ruangan->id, ['wadir-medik-igd-1.jpg', 'wadir-medik-igd-2.jpg', 'wadir-medik-igd-3.jpg']);


        // 40. WC Perempuan (IGD Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Toilet Wanita IGD Lantai 2',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Petugas Kebersihan',
            'jabatan_struktural'=> 'Cleaning Service',
            'navigasi'          => 'Terletak di lantai 2 Gedung IGD',
            'kata_kunci'        => 'toilet wanita igd lantai 2, wc wanita igd lantai 2, toilet perempuan igd lt2, wc perempuan igd lantai 2, toilet cewek igd lantai 2, kamar mandi wanita igd lt2, ladies toilet igd lantai 2, wc wanita gedung igd lt2, toilet wanita area igd lt2, kamar kecil wanita igd lantai 2, fasilitas toilet wanita igd lt2',
            'kategori'          => 'Fasilitas Umum RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas sanitasi untuk pasien, pengunjung, dan petugas, guna menjaga kebersihan diri, kenyamanan, serta mendukung penerapan standar kesehatan lingkungan dan pencegahan infeksi di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['wc-perempuan-igd-lt2-1.jpg', 'wc-perempuan-igd-lt2-2.jpg', 'wc-perempuan-igd-lt2-3.jpg']);

        // 41. WC Laki-Laki (IGD Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Toilet Pria Lantai 2 IGD',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Petugas Kebersihan',
            'jabatan_struktural'=> 'Cleaning Service',
            'navigasi'          => 'Terletak di lantai 2 Gedung IGD',
            'kata_kunci' => 'toilet pria igd lt2, wc pria igd lt2, toilet laki laki igd lantai 2, wc laki laki igd lt2, toilet cowok igd lt2, urinoir igd lt2, toilet pria gedung igd lantai 2, wc pria area igd lt2, toilet khusus pria igd lt2, kamar kecil pria igd lt2',
            'kategori'          => 'Fasilitas Umum RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas sanitasi untuk pasien, pengunjung, dan petugas, guna menjaga kebersihan diri, kenyamanan, serta mendukung penerapan standar kesehatan lingkungan dan pencegahan infeksi di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['wc-laki-igd-lt2-1.jpg', 'wc-laki-igd-lt2-2.jpg', 'wc-laki-igd-lt2-3.jpg']);

        // 42. Ruang Barang Milik Daerah / Kartu Parkir (IGD Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Barang Milik Daerah',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Juhri Hasibuan',
            'jabatan_struktural'=> 'Staf Pelaksana / Pengadministrasi Umum',
            'navigasi'          => 'Terletak di lantai 2 Gedung IGD',
            'kata_kunci' => 'barang milik daerah rumah sakit, inventaris aset resmi rsj, pencatatan aset barang rs, pengelolaan barang milik daerah, data inventaris rumah sakit, kartu parkir karyawan rs, pembuatan kartu parkir staf, perpanjang kartu parkir pegawai, kartu parkir hilang ganti baru, akses parkir pegawai rsj, administrasi kartu parkir khusus, pengelolaan aset dan parkir, ruangan urus kartu parkir, pencatatan barang inventaris rsj, layanan kartu parkir pegawai, cara membuat kartu parkir, urus kartu parkir, bikin kartu parkir, pembuatan kartu parkir baru, kartu parkir hilang, perpanjang kartu parkir, dimana buat kartu parkir, loket kartu parkir, bmd lantai 2, ruang bmd, barang milik daerah lantai 2, parkir karyawan, kartu parkir pegawai, administrasi parkir rs, juhri hasibuan parkir, ruang juhri hasibuan',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pengelolaan, pencatatan, dan pengawasan aset milik daerah yang digunakan rumah sakit, termasuk pelayanan pembuatan dan pengelolaan kartu parkir, guna menjamin tertib administrasi, keamanan aset, serta kelancaran operasional sesuai ketentuan dan standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['bmd-parkir-igd-1.jpg', 'bmd-parkir-igd-2.jpg', 'bmd-parkir-igd-3.jpg']);

        // 43. Bagian Umum (IGD Lantai 3)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Bagian Umum',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Albert Eko Suyitno, S.T',
            'jabatan_struktural'=> 'Sub Bagian Umum dan Kepegawaian',
            'navigasi'          => 'Terletak di lantai 3 Gedung IGD',
            'kata_kunci'        => 'urus fasilitas rumah sakit, perbaikan sarana prasarana, layanan kebersihan gedung, pengelolaan keamanan rs, pengadaan perlengkapan kantor, pengelolaan aset rumah sakit, inventaris barang rumah sakit, urus barang milik daerah, layanan parkir karyawan, pembuatan kartu parkir, perpanjang kartu parkir, pengelolaan logistik umum, maintenance gedung rumah sakit, pengurusan perlengkapan kerja, layanan operasional umum', 
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'pusat pengelolaan dan koordinasi urusan umum, meliputi administrasi perkantoran, kepegawaian non-medis, sarana dan prasarana, kebersihan, keamanan, serta dukungan logistik, guna menunjang kelancaran operasional rumah sakit sesuai standar tata kelola rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['bagian-umum-igd-lt3-1.jpg', 'bagian-umum-igd-lt3-2.jpg']);

        // 44. Kepala Bagian Umum (IGD Lantai 3)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Kepala Bagian Umum',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Albert Eko Suyitno, S.T',
            'jabatan_struktural'=> 'Sub Bagian Umum dan Kepegawaian',
            'navigasi'          => 'Terletak di lantai 3 Gedung IGD',
            'kata_kunci' => 'kepala bagian umum, kabag umum, ruang kabag umum, kantor kabag umum, pimpinan bagian umum, kepala urusan umum, kepala rumah tangga rs, koordinator umum, urusan sarana prasarana, urusan kebersihan, urusan keamanan, atasan satpam, atasan cleaning service, urusan fasilitas rs, pengelolaan umum rs, bagian umum lantai 3, pak albert eko, ruangan pak albert, kantor pimpinan umum',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pengelolaan, pengawasan, dan koordinasi kegiatan urusan umum, meliputi sarana prasarana, keamanan, kebersihan, dan layanan penunjang non-medis, guna mendukung kelancaran operasional serta pelayanan rumah sakit jiwa sesuai standar yang berlaku.',
        ]);
        $this->tambahFoto($ruangan->id, ['kabag-umum-igd-lt3-1.jpg', 'kabag-umum-igd-lt3-2.jpg']);

        // 45. Kepala Bagian Keuangan (IGD Lantai 3)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Kepala Bagian Keuangan',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Fahrizal, SE., M.Si',
            'jabatan_struktural'=> 'Bagian Keuangan',
            'navigasi'          => 'Terletak di lantai 3 Gedung IGD',
            'kata_kunci' => 'kepala bagian keuangan operasional, kabag keuangan lantai 3, pimpinan keuangan operasional, persetujuan keuangan harian, acc pembayaran operasional, ruang disposisi keuangan, pejabat keuangan lantai 3, verifikasi anggaran operasional, kepala finance lt3, ruang validasi biaya rs, pengawas transaksi keuangan, ruang kontrol pembayaran, kabag keuangan igd lt3, ruangan pak fahrizal lt3, pimpinan keuangan unit',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pengelolaan, pengawasan, dan pengendalian keuangan rumah sakit, meliputi perencanaan anggaran, pengelolaan pendapatan dan belanja, serta penyusunan laporan keuangan guna menjamin akuntabilitas dan keberlangsungan pelayanan sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['kabag-keuangan-igd-lt3-1.jpg', 'kabag-keuangan-igd-lt3-2.jpg', 'kabag-keuangan-igd-lt3-3.jpg']);

        // 46. Bagian Keuangan (IGD Lantai 3)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Bagian Keuangan',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Fahrizal, SE., M. Si',
            'jabatan_struktural'=> 'Bagian Keuangan',
            'navigasi'          => 'Terletak di lantai 3 Gedung IGD',
            'kata_kunci' => 'bagian keuangan staf, admin keuangan rumah sakit, pengolahan transaksi keuangan, pencatatan pembayaran pasien, input data keuangan rs, staf finance rs, pengelola tagihan pasien, administrasi keuangan harian, proses pembayaran rs, staf billing keuangan, unit keuangan operasional, pencatatan kas rumah sakit, pengelolaan transaksi harian, bagian finance lt3, staf keuangan rumah sakit',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'unit pelaksanaan administrasi dan pengelolaan keuangan rumah sakit, meliputi pencatatan transaksi, pengelolaan anggaran, pembayaran, penagihan, serta pelaporan keuangan, guna mendukung kelancaran operasional dan akuntabilitas sesuai standar pengelolaan rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['staf-keuangan-igd-lt3-1.jpg', 'staf-keuangan-igd-lt3-2.jpg', 'staf-keuangan-igd-lt3-3.jpg']);

        // 47. Kepala Bidang Keperawatan (IGD Lantai 3)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Kepala Bidang Keperawatan',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Elly Hayatinur, SP., M.Kes',
            'jabatan_struktural'=> 'Bidang Keperawatan',
            'navigasi'          => 'Terletak di lantai 3 Gedung IGD',
            'kata_kunci'        => 'kabid keperawatan igd, kepala bidang keperawatan igd lantai 3, ruang kabid keperawatan igd, kantor kepala bidang perawat igd, pimpinan keperawatan igd lt3, elly hayatinur lantai 3, manajemen keperawatan igd, koordinasi perawat igd lantai 3, ruangan kepala bidang keperawatan igd, komite keperawatan igd lantai 3, bidang keperawatan igd lt3, urusan perawat igd lantai 3, kepala seluruh perawat igd',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pengelolaan, pembinaan, dan pengawasan pelayanan keperawatan, meliputi pengaturan sumber daya perawat, pengendalian mutu asuhan keperawatan, serta penjaminan keselamatan pasien guna memastikan pelayanan keperawatan berjalan sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['kabid-keperawatan-igd-lt3-1.jpg', 'kabid-keperawatan-igd-lt3-2.jpg', 'kabid-keperawatan-igd-lt3-3.jpg','kabid-keperawatan-igd-lt3-4.jpg']);

        // 48. Bidang Keperawatan (IGD Lantai 3)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Bidang Keperawatan',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'S. Kardiansyah, S.Si',
            'jabatan_struktural'=> 'Sub Bidang Keperawatan Jiwa',
            'navigasi'          => 'Terletak di lantai 3 Gedung IGD',
            'kata_kunci'        => 'bidang keperawatan igd lantai 3, administrasi perawat igd, kantor manajemen perawat igd, sub bidang keperawatan jiwa igd, urusan tenaga perawat igd, asuhan keperawatan igd lt3, jadwal dinas perawat igd, koordinasi perawat igd lantai 3, manajemen asuhan keperawatan igd, pengawas perawat igd lt3, bidang perawat igd lantai 3, staf keperawatan igd lt3',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'unit pengelolaan dan pelaksanaan manajemen keperawatan, meliputi perencanaan, koordinasi, pengaturan tenaga keperawatan, pembinaan kompetensi, serta pemantauan mutu asuhan keperawatan guna mendukung pelayanan kesehatan jiwa sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['staf-keperawatan-igd-lt3-1.jpg', 'staf-keperawatan-igd-lt3-2.jpg', 'staf-keperawatan-igd-lt3-3.jpg']);

        // 49. Bidang Penunjang Medik & Diklit (IGD Lantai 3)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Bidang Penunjang Medik & Diklit',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'ARIEF RAKHMAN, SE, MM, Ak',
            'jabatan_struktural'=> 'Bidang Penunjang Medik & Diklit',
            'navigasi'          => 'Terletak di lantai 3 Gedung IGD',
            'kata_kunci'        => 'bidang penunjang medik diklit igd, diklit igd lantai 3, pendidikan dan pelatihan igd, daftar magang rs igd, urus pkl igd lantai 3, izin penelitian mahasiswa igd, pelatihan nakes igd, program diklat igd lantai 3, seminar medis igd, workshop rs igd lantai 3, orientasi pegawai igd, kegiatan pelatihan igd, pengembangan kompetensi igd, arief rakhman lantai 3, info magang igd, diklit rs lantai 3 igd, cara daftar magang, pengurusan magang, tempat magang rs, pendaftaran magang rumah sakit, magang mahasiswa, praktik kerja lapangan, pkl rs, izin penelitian rs, kegiatan diklat, pelatihan pegawai rs, seminar rs, workshop pegawai, pendidikan klinis, magang keperawatan, magang kedokteran, program internship rs, arief rakhman diklit, ruang diklit, kantor diklit, dimana daftar magang, urus magang, pendaftaran pkl',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'Ruang DIKLIT (Pendidikan dan Pelatihan) di RSJ Tampan adalah sebagai pusat pengelolaan pendidikan, penelitian, dan pelatihan, termasuk pengurusan kegiatan magang, praktik kerja, dan pendidikan klinik, serta pengembangan kompetensi sumber daya manusia guna meningkatkan mutu pelayanan sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['diklit-igd-lt3-1.jpg', 'diklit-igd-lt3-2.jpg', 'diklit-igd-lt3-3.jpg','diklit-igd-lt3-4.jpg']);

        // 50. Kepala Bidang Pelayanan Medik (IGD Lantai 3)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Kepala Bidang Pelayanan Medik',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'drg. Jenita Aruma, M.M',
            'jabatan_struktural'=> 'Bidang Pelayanan Medik',
            'navigasi'          => 'Terletak di lantai 3 Gedung IGD',
            'kata_kunci'        => 'kepala bidang pelayanan medik, kabid pelayanan medik, kabid yanmed, yanmed, ruang yanmed, kantor yanmed, bidang pelayanan medik, pelayanan medis, kabid medis, kepala bidang medis, pimpinan medis, manajemen medis, urusan dokter, atasan dokter, kepala pelayanan medis, drg jenita, ibu jenita, ruangan drg jenita aruma, kantor pelayanan medis lantai 3',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pengelolaan, pengawasan, dan koordinasi pelayanan medik, meliputi perencanaan pelayanan, pembinaan tenaga medis, pengendalian mutu klinis, serta penjaminan keselamatan pasien guna memastikan pelayanan medis berjalan sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['kabid-yanmed-igd-lt3-1.jpg', 'kabid-yanmed-igd-lt3-2.jpg']);

        // 51. Bagian Perencanaan (IGD Lantai 3)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Bagian Perencanaan',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Maya Yosanova, S.Si., Apt',
            'jabatan_struktural'=> 'Sub Bagian Perencanaan Jiwa & NAPZA',
            'navigasi'          => 'Terletak di lantai 3 Gedung IGD',
            'kata_kunci'        => 'ruang susun program rs, tempat buat rencana kerja rs, bagian rencana rumah sakit, unit program dan evaluasi rs, tempat olah data rs, ruang analisis data rumah sakit, bagian statistik rs, tempat buat laporan kinerja rs, unit perencanaan program rs, ruang penyusunan kegiatan rs, bagian data dan laporan rs, tempat evaluasi program rs, ruang rencana kegiatan tahunan, unit informasi program rs, ruang perencanaan lantai 3',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'unit perencanaan, pengendalian, dan evaluasi program rumah sakit, meliputi penyusunan rencana strategis, rencana kerja, pengumpulan dan analisis data, serta pelaporan kinerja guna mendukung pengambilan keputusan dan peningkatan mutu sesuai standar tata kelola rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['bagian-perencanaan-igd-lt3-1.jpg', 'bagian-perencanaan-igd-lt3-2.jpg','bagian-perencanaan-igd-lt3-3.jpg']);

        // 52. Kepala Bagian Perencanaan (IGD Lantai 3)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Kepala Bagian Perencanaan',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Hawari Dinal, S.Sos., M.Si',
            'jabatan_struktural'=> 'Bagian Perencanaan',
            'navigasi'          => 'Terletak di lantai 3 Gedung IGD',
            'kata_kunci'        => 'kepala perencanaan lantai 3, ruang kabag perencanaan lt3, pimpinan perencanaan rs, ruang acc program rs, tempat persetujuan rencana kerja, ruang validasi program rs, pimpinan evaluasi program rs, ruang keputusan strategi rs, kepala program rumah sakit, ruang otorisasi kegiatan rs, pejabat perencanaan rs, ruang kontrol program rs, ruang acc laporan kinerja, atasan bagian perencanaan, kantor kepala perencanaan lt3',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pengelolaan, pengawasan, dan koordinasi kegiatan perencanaan rumah sakit, meliputi penyusunan rencana strategis dan operasional, evaluasi program, serta pengendalian pelaksanaan rencana guna mendukung pengambilan keputusan dan peningkatan mutu pelayanan sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['kabag-perencanaan-igd-lt3-1.jpg', 'kabag-perencanaan-igd-lt3-2.jpg']);

        // 53. WC Perempuan (IGD Lantai 3)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Toilet Wanita Lantai 3 IGD',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Petugas Kebersihan',
            'jabatan_struktural'=> 'Cleaning Service',
            'navigasi'          => 'Terletak di lantai 3 Gedung IGD',
            'kata_kunci'        => 'toilet wanita igd lantai 3, wc wanita igd lt3, toilet perempuan igd lantai 3, wc perempuan igd lt3, toilet cewek igd lt3, kamar mandi wanita igd lantai 3, ladies toilet igd lt3, wc cewek igd lantai 3, toilet wanita gedung igd lantai 3, fasilitas toilet wanita igd lt3, kamar kecil wanita igd lantai 3, wc wanita area lt3 igd',
            'kategori'          => 'Fasilitas Umum RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas sanitasi untuk pasien, pengunjung, dan petugas, guna menjaga kebersihan diri, kenyamanan, serta mendukung penerapan standar kesehatan lingkungan dan pencegahan infeksi di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['wc-perempuan-igd-lt3-1.jpg', 'wc-perempuan-igd-lt3-2.jpg', 'wc-perempuan-igd-lt3-3.jpg']);

        // 54. WC Laki-Laki (IGD Lantai 3)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Toilet Pria Lantai 3 IGD',
            'nama_gedung'       => 'Gedung Instalasi Gawat Darurat (IGD)',
            'penanggung_jawab'  => 'Petugas Kebersihan',
            'jabatan_struktural'=> 'Cleaning Service',
            'navigasi'          => 'Terletak di lantai 3 Gedung IGD',
            'kata_kunci'        => 'toilet pria igd lt3, wc pria lt3 igd, kamar mandi pria lt3, toilet laki laki lt3 igd, wc laki laki lt3, kamar kecil pria lt3, toilet cowok lt3 igd, wc cowok lt3, toilet pria lantai tiga igd, kamar mandi pria igd lt3, toilet khusus pria lt3, wc area pria lt3 igd, toilet pria gedung igd lt3, kamar mandi laki laki lt3 igd, fasilitas toilet pria lt3',
            'kategori'          => 'Fasilitas Umum RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas sanitasi untuk pasien, pengunjung, dan petugas, guna menjaga kebersihan diri, kenyamanan, serta mendukung penerapan standar kesehatan lingkungan dan pencegahan infeksi di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['wc-laki-igd-lt3-1.jpg', 'wc-laki-igd-lt3-2.jpg', 'wc-laki-igd-lt3-3.jpg']);

        // 55. Klinik Forensik (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Klinik Forensik',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'dr. Rina Amtarina, Sp.KJ',
            'jabatan_struktural'=> 'Dokter Spesialis Kedokteran Jiwa',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci'        => 'pemeriksaan kejiwaan hukum, psikiatri forensik, asesmen mental tersangka, evaluasi kejiwaan hukum, konsultasi kasus hukum, pemeriksaan psikiatri pengadilan, penilaian kondisi mental hukum, layanan psikiatri forensik, pemeriksaan saksi ahli jiwa, analisis kejiwaan kasus hukum, klinik hukum kejiwaan, asesmen psikiatri hukum, konsultasi hukum medis jiwa, pemeriksaan mental untuk pengadilan, layanan forensik psikiatri',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pemeriksaan, penilaian, dan penanganan pasien yang terkait aspek hukum, termasuk evaluasi kondisi mental tersangka atau terdakwa, pemberian laporan medis untuk kepentingan peradilan, serta konsultasi psikiatri forensik sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['klinik-forensik-poli-1.jpg', 'klinik-forensik-poli-2.jpg', 'klinik-forensik-poli-3.jpg']);

        // 56. Klinik Gangguan Mental (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Klinik Gangguan Mental',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'dr. Andreas Xaverio Bangun, Sp.KJ',
            'jabatan_struktural'=> 'Dokter Spesialis Kedokteran Jiwa',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci'        => 'klinik gangguan mental organik, poli gmo, psikiatri organik poli, gangguan mental akibat cedera kepala, epilepsi jiwa, kejang gangguan mental, demensia psikiatri, pikun gangguan jiwa, pasca stroke mental, neuropsikiatri poli, gmo poli klinik, dr andreas xaverio gangguan mental, klinik organik jiwa',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pemeriksaan, diagnosis, dan penanganan pasien dengan gangguan mental akibat kondisi medis atau organik, seperti cedera otak, infeksi sistem saraf, atau kelainan metabolik, guna memberikan terapi dan rehabilitasi sesuai standar pelayanan rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['klinik-gmo-poli-1.jpg', 'klinik-gmo-poli-2.jpg', 'klinik-gmo-poli-3.jpg']);

        // 57. Klinik Dewasa (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Klinik Dewasa',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'dr. Willy Jaya Suento, Sp.KJ',
            'jabatan_struktural'=> 'Dokter Spesialis Kedokteran Jiwa',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci'        => 'klinik jiwa dewasa poli, poli jiwa dewasa rsj, rawat jalan jiwa dewasa, psikiatri dewasa poli, konsultasi jiwa dewasa, dr willy jaya sunto dewasa, klinik psikiatri dewasa, terapi jiwa dewasa, pemeriksaan mental dewasa, periksa gangguan jiwa dewasa, kontrol jiwa pasien dewasa, willy jaya sunto poli',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pemeriksaan, diagnosis, dan penanganan pasien dewasa dengan gangguan jiwa, termasuk pemberian terapi medis, konseling, dan pemantauan perkembangan pasien sesuai standar pelayanan kesehatan jiwa rumah sakit.',
        ]);
        $this->tambahFoto($ruangan->id, ['klinik-dewasa-poli-1.jpg', 'klinik-dewasa-poli-2.jpg', 'klinik-dewasa-poli-3.jpg', 'klinik-dewasa-poli-4.jpg']);

        // 59. Klinik Jiwa Usia Lanjut (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Klinik Jiwa Usia Lanjut',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'dr. Nining Gilang Sari, Sp.KJ',
            'jabatan_struktural'=> 'Dokter Spesialis Kedokteran Jiwa',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci'        => 'klinik jiwa usia lanjut poli, poli lansia rsj, geriatri jiwa, psikogeriatri poli, demensia poli, alzheimer jiwa, pikun klinik jiwa, gangguan memori lansia, dr nining gilang sari lansia, pasien tua jiwa, kakek nenek gangguan jiwa, klinik geriatri terpadu jiwa, nining gilang sari poli',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pemeriksaan, diagnosis, dan penanganan pasien lansia dengan gangguan jiwa, termasuk pemberian terapi medis, psikososial, konseling, serta pemantauan kondisi mental dan fisik pasien lansia sesuai standar pelayanan rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['klinik-lansia-poli-1.jpg', 'klinik-lansia-poli-2.jpg', 'klinik-lansia-poli-3.jpg']);

        // 60. Asesmen Keperawatan (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Asesmen Keperawatan',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'S. Kardiansyah, S.Si',
            'jabatan_struktural'=> 'Perawat Penanggung Jawab',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci'        => 'asesmen keperawatan poli, ruang asesmen poliklinik, pengkajian keperawatan poli, timbang berat badan poli, ukur tinggi badan poli, anamnesa poliklinik, screening awal poli, skrining pasien poli, vital sign poli, cek kondisi awal poli, perawat asesmen poli, pak kardiansyah asesmen, ruang perawat sebelum dokter, asesmen pasien baru poli',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat melakukan pengkajian awal kondisi pasien, mencakup evaluasi fisik, mental, dan sosial, untuk menyusun rencana asuhan keperawatan yang tepat serta mendukung penanganan dan pemantauan pasien sesuai standar pelayanan rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['asesmen-keperawatan-poli-1.jpg', 'asesmen-keperawatan-poli-2.jpg', 'asesmen-keperawatan-poli-3.jpg']);

        // 61. Jadwal Konseling Dokter (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Jadwal Konseling Dokter',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'dr. Nuryasmi',
            'jabatan_struktural'=> 'Koordinator Pelayanan',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci'        => 'jadwal konseling dokter poli, info jadwal dokter poliklinik, jam praktek dokter poli, kapan dokter ada poli, pendaftaran konseling poli, jadwal psikiater poli, customer service jadwal poli, tanya jadwal dokter, jam berapa dokter buka poli, dokter siapa hari ini poli, nuryasmi jadwal, papan informasi jadwal poli, loket informasi jadwal',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'Loket Jadwal Konseling Dokter di RSJ Tampan adalah sebagai tempat pelayanan informasi dan pendaftaran pasien untuk mengetahui jadwal konsultasi dengan dokter, mengatur antrean, serta mempermudah pasien mendapatkan layanan medik dan psikiatri sesuai standar pelayanan rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['jadwal-dokter-poli-1.jpg', 'jadwal-dokter-poli-2.jpg', 'jadwal-dokter-poli-3.jpg']);

        // 62. Verifikasi Admin (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Verifikasi Admin',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Satpam',
            'jabatan_struktural'=> 'Petugas Keamanan',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik (Meja Depan/Satpam)',
            'kata_kunci' => 'verifikasi administrasi awal, cek berkas sebelum daftar, validasi rujukan pasien, cek bpjs sebelum pendaftaran, meja satpam poli, pemeriksaan syarat berobat, skrining berkas pasien, cek kelengkapan dokumen, verifikasi awal pasien datang, meja depan satpam, pengecekan surat rujukan, validasi faskes, antrian awal sebelum loket, pos satpam poli klinik, bantuan informasi awal pasien',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'Loket Verifikasi Administrasi di RSJ Tampan adalah sebagai tempat memproses dan memverifikasi dokumen administrasi pasien, seperti pendaftaran, BPJS, atau data rekam medis, guna memastikan kelengkapan, akurasi, dan kelancaran pelayanan sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['verifikasi-admin-poli-1.jpg', 'verifikasi-admin-poli-2.jpg']);

        // 63. Dokter Umum (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Dokter Umum Poli Klinik',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'dr. Nuryasmi',
            'jabatan_struktural'=> 'Dokter Umum',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci' => 'dokter umum, poli umum, klinik umum, periksa umum, berobat umum, sakit apa saja, periksa pertama, cek kesehatan, keluhan ringan, demam batuk pilek, sakit kepala, periksa badan, surat keterangan sehat, surat sehat, cek fisik, screening kesehatan, konsultasi awal, rujukan dokter, layanan umum rs, dokter nuryasmi, dr nuryasmi',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pendaftaran dan pelayanan awal pasien yang akan diperiksa oleh dokter umum, termasuk pencatatan identitas, riwayat kesehatan, serta penjadwalan konsultasi lanjutan, guna mendukung pelayanan medik sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['dokter-umum-poli-1.jpg', 'dokter-umum-poli-2.jpg', 'dokter-umum-poli-3.jpg']);

        // 64. Klinik Spesialis Penyakit Dalam (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Klinik Spesialis Penyakit Dalam',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'dr. Rahmi Sahreni, Sp.PD',
            'jabatan_struktural'=> 'Dokter Spesialis Penyakit Dalam',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci'        => 'klinik spesialis penyakit dalam, poli penyakit dalam, poli dalam, internis, sp.pd, sppd, dokter penyakit dalam, spesialis dalam, diabetes, kencing manis, gula darah, hipertensi, darah tinggi, maag, lambung, gangguan metabolisme, komorbid, sakit gula, dokter rahmi, dr rahmi sahreni, cek gula darah',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pemeriksaan, diagnosis, dan penanganan pasien dengan penyakit internal atau komorbid medis yang memengaruhi kondisi fisik dan mental pasien, guna memberikan terapi yang tepat dan mendukung keselamatan pasien sesuai standar pelayanan rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['poli-penyakit-dalam-1.jpg', 'poli-penyakit-dalam-2.jpg', 'poli-penyakit-dalam-3.jpg']);

        // 65. Klinik Spesialis Saraf (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Klinik Spesialis Saraf',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'dr. Susanti Dwi Ariani, Sp.N',
            'jabatan_struktural'=> 'Dokter Spesialis Saraf',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci'        => 'klinik spesialis saraf, poli saraf, poli syaraf, neurologi, spesialis saraf, dokter saraf, sp.s, stroke, pasca stroke, epilepsi, ayan, kejang, sakit kepala, vertigo, migrain, tremor, parkinson, gegar otak, saraf kejepit, gangguan gerak, dokter susanti, dr susanti dwi ariani, ruangan dr susanti',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pemeriksaan, diagnosis, dan penanganan pasien dengan gangguan neurologis, seperti cedera otak, stroke, epilepsi, atau kelainan saraf lain yang berpengaruh pada kondisi mental, guna memberikan terapi dan pemantauan sesuai standar pelayanan rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['klinik-saraf-poli-1.jpg', 'klinik-saraf-poli-2.jpg', 'klinik-saraf-poli-3.jpg']);

        // 66. Klinik Jiwa Anak dan Remaja (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Klinik Jiwa Anak dan Remaja',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'dr. Nazli Mahdinasari N M.Ked. Sp. KJ, Subsp.AR (K)',
            'jabatan_struktural'=> 'Dokter Spesialis Kedokteran Jiwa Anak',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci' => 'klinik jiwa anak, poli jiwa anak, psikiatri anak, dokter jiwa anak, gangguan jiwa anak, anak autis, autisme, adhd, hiperaktif, anak ngamuk, tantrum, gangguan perilaku anak, masalah emosi anak, konsultasi anak bermasalah, anak berkebutuhan khusus, abk, terapi anak, kontrol anak, dokter nazli, dr nazli mahdinasari, konseling remaja, gangguan mental remaja',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pemeriksaan, diagnosis, dan penanganan pasien anak dan remaja dengan gangguan jiwa, termasuk pemberian terapi psikologis, konseling, serta pemantauan perkembangan mental dan sosial sesuai standar pelayanan rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['klinik-anak-poli-1.jpg', 'klinik-anak-poli-2.jpg', 'klinik-anak-poli-3.jpg', 'klinik-anak-poli-4.jpg']);

        // 67. Ruang Rehabilitasi Medik (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Rehabilitasi Medik Poli Klinik',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'dr. Neidya Karla, Sp.K.F.R',
            'jabatan_struktural'=> 'Dokter Spesialis Rehab Medik',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci'        => 'rehabilitasi medik poli, irm poliklinik, instalasi rehabilitasi medik poli, fisioterapi poli klinik, physiotherapy poli, terapi okupasi poli, occupational therapy poli, terapi wicara poli, pemulihan stroke poli, kaku otot poli, latihan fisik poli, dr neidya karla rehab medik, terapi jalan rehab medik, neidya karla poli',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pelaksanaan terapi fisik, okupasi, dan rehabilitasi fungsional untuk pasien dengan gangguan jiwa atau komorbid medis, guna memulihkan kemampuan fisik dan mendukung kemandirian pasien sesuai standar pelayanan rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['rehab-medik-poli-1.jpg', 'rehab-medik-poli-2.jpg', 'rehab-medik-poli-3.jpg', 'rehab-medik-poli-4.jpg']);

        // 68. Ruang Konsultasi Farmasi (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Konsultasi Farmasi',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'BETTI KRISTINA, S.Farm,Apt',
            'jabatan_struktural'=> 'Apoteker',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci'        => 'cara minum obat yang benar, tanya aturan pakai obat, penjelasan penggunaan obat, edukasi obat pasien, cara konsumsi obat, tanya dosis obat, cara pakai resep dokter, informasi obat untuk pasien, bantuan penggunaan obat, penjelasan obat sehari hari, layanan informasi obat, tanya obat ke apoteker, cara minum obat rutin, pemahaman obat pasien, konsultasi obat ringan',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat konsultasi obat dan terapi bagi pasien, termasuk pemberian informasi mengenai dosis, efek samping, interaksi obat, dan kepatuhan pengobatan, guna mendukung keamanan, efektivitas, dan mutu pelayanan sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['konsultasi-farmasi-poli-1.jpg', 'konsultasi-farmasi-poli-2.jpg', 'konsultasi-farmasi-poli-3.jpg']);

        // 69. Ruang Pojok ASI (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Pojok ASI',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'BETTI KRISTINA, S.Farm,Apt',
            'jabatan_struktural'=> 'Penanggung Jawab Fasilitas',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci'        => 'ruang pojok asi, pojok asi, ruang menyusui, ruang laktasi, nursing room, tempat menyusui, ibu menyusui, busui, area menyusui, pumping asi, perah asi, bilik asi, ruang bayi, ganti popok',
            'kategori'          => 'Fasilitas Umum RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas menyusui dan memerah ASI bagi pasien atau pengunjung ibu, guna mendukung kesehatan ibu dan bayi, menjaga kenyamanan, serta memenuhi standar pelayanan ramah keluarga di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['pojok-asi-poli-1.jpg', 'pojok-asi-poli-2.jpg', 'pojok-asi-poli-3.jpg']);

        // 70. Klinik Fisioterapi (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Klinik Fisioterapi',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'dr. DEWI AFRISANTY, Sp.KJ',
            'jabatan_struktural'=> 'Dokter Spesialis Kedokteran Jiwa',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci'        => 'klinik fisioterapi poli, ruang fisioterapi poliklinik, terapi fisik poli, fisio poli, terapi gerak poli, latihan jalan poli, terapi stroke poli, terapi otot poli, pemulihan fisik poli, kaku sendi poli, terapi panas poli, penyinaran poli, gym medis poli, dr dewi afrisanty fisioterapi, rehabilitasi fisik poli klinik, terapi alat fisioterapi',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pelaksanaan terapi fisik dan rehabilitasi untuk pasien dengan gangguan jiwa atau komorbid medis, termasuk latihan motorik, mobilitas, dan fungsi tubuh, guna mendukung pemulihan fisik, kemandirian, dan kualitas hidup pasien sesuai standar pelayanan rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['fisioterapi-poli-1.jpg', 'fisioterapi-poli-2.jpg', 'fisioterapi-poli-3.jpg']);

        // 71. Resepsionis Farmasi (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Resepsionis Farmasi',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'BETTI KRISTINA, S.Farm,Apt',
            'jabatan_struktural'=> 'Kepala Instalasi Farmasi',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik (Area Depan Farmasi)',
            'kata_kunci'        => 'resepsionis farmasi poli klinik, serahkan resep obat poli, daftar farmasi poli, masuk antrian farmasi poli, loket penerimaan resep poli, awal layanan obat poli, pendaftaran obat pasien poli, antrian resep poli, ambil nomor farmasi poli, loket depan farmasi poli, proses resep masuk poli, input resep obat poli, tempat mulai daftar farmasi poli, pelayanan awal farmasi poli, loket antre resep poli klinik, apotek poli klinik rawat jalan, farmasi poli klinik penerimaan resep, pengambilan obat, ambil obat, tebus resep, lokasi pengambilan obat, apotek poli, tempat ambil obat setelah periksa, dimana ambil obat, farmasi pengambilan resep, loket obat poli, serahkan resep, antrian obat, ambil obat poli klinik',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'pintu layanan awal farmasi, yang bertugas menerima resep, memberikan informasi terkait obat, mengatur antrean, serta memastikan pasien mendapatkan obat and pelayanan farmasi secara tepat, cepat, dan sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['resepsionis-farmasi-poli-1.jpg', 'resepsionis-farmasi-poli-2.jpg', 'resepsionis-farmasi-poli-3.jpg', 'resepsionis-farmasi-poli-4.jpg']);

        // 72. Kasir / Loket Pembayaran (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Kasir',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Petugas Kasir',
            'jabatan_struktural'=> 'Staf Administrasi Keuangan',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci' => 'bayar rumah sakit, loket pembayaran pasien, kasir rs, tempat bayar berobat, pembayaran pasien langsung, bayar obat, bayar rawat jalan, pelunasan biaya rumah sakit, transaksi pasien, loket kasir poli, tempat bayar administrasi rs, kasir depan poli, pembayaran pasien umum, bayar tagihan medis, loket uang pasien',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pelayanan administrasi pembayaran pasien, termasuk pencatatan biaya, penerimaan pembayaran, pembuatan bukti transaksi, dan pemberian informasi biaya pelayanan, guna memastikan proses pembayaran berjalan tertib, transparan, dan sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['kasir-poli-1.jpg', 'kasir-poli-2.jpg', 'kasir-poli-3.jpg', 'kasir-poli-4.jpg']);

        // 73. Loket Pendaftaran (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Loket Pendaftaran',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Petugas Pendaftaran',
            'jabatan_struktural'=> 'Staf Rekam Medis / Admisi',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik (Lobby Utama)',
            'kata_kunci'        => 'meja resepsionis pendaftaran, loket pendaftaran, tempat daftar, registrasi, admisi, admission, ambil antrian, nomor antrian, pasien baru, pasien lama, tprj, tempat pendaftaran rawat jalan, loket daftar, check in, daftar berobat',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'pintu masuk pelayanan pasien, yang bertugas menerima pasien baru atau kunjungan ulang, mencatat data identitas, memverifikasi dokumen administrasi, dan mengarahkan pasien ke unit layanan sesuai kebutuhan, guna menjamin kelancaran alur layanan dan sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id,  ['pendaftaran-poli-1.jpg', 'pendaftaran-poli-2.jpg', 'pendaftaran-poli-3.jpg', 'pendaftaran-poli-4.jpg', 'pendaftaran-poli-5.jpg', 'pendaftaran-poli-6.jpg', 'pendaftaran-poli-7.jpg', 'pendaftaran-poli-8.jpg', 'pendaftaran-poli-9.jpg']);

        // 78. Pengambilan Surat Kontrol dan Resep Obat (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Loket Pengambilan Surat Kontrol',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'BETTI KRISTINA, S.Farm,Apt',
            'jabatan_struktural'=> 'Koordinator Pelayanan Farmasi',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci'        => 'loket pengambilan surat kontrol poli, meja pengambilan surat kontrol dan resep poli, skdp poli, ambil surat kontrol poli, surat keterangan dalam perawatan poli, surat rujukan balik poli, surat balik poli, jadwal kontrol poli, kertas resep poli, resep dokter poli, surat sakit poli, surat periksa kembali poli, legalisasi surat kontrol poli, rencana kontrol poli, kapan kontrol lagi poli, pengambilan surat kontrol poliklinik',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat penyerahan dokumen administrasi dan obat pasien, termasuk pengambilan surat kontrol untuk kunjungan berikutnya serta resep obat yang telah diresepkan dokter, guna memastikan kelancaran tindak lanjut perawatan pasien sesuai standar pelayanan rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['surat-kontrol-poli-1.jpg', 'surat-kontrol-poli-2.jpg']);

        // 75. Klinik Psikoterapi (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Klinik Psikoterapi',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'dr. Andreas Xaverio Bangun, Sp.KJ',
            'jabatan_struktural'=> 'Dokter Spesialis Kedokteran Jiwa',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci'        => 'klinik psikoterapi poli, ruang psikoterapi poliklinik, terapi psikologi poli, konseling psikologis poli, psikolog klinis poli, terapi perilaku poli, terapi kognitif cbt poli, terapi keluarga poli, terapi kelompok poli klinik, hipnoterapi poli, relaksasi poli, pemulihan mental poli, dr andreas xaverio bangun psikoterapi, terapi depresi poli, terapi kecemasan poli, andreas xaverio bangung klinik',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pelaksanaan terapi psikologis bagi pasien dengan gangguan jiwa, termasuk konseling individual, terapi kelompok, dan teknik psikoterapi lainnya, guna mendukung pemulihan mental, kesejahteraan psikososial, dan kualitas hidup pasien sesuai standar pelayanan rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['psikoterapi-poli-1.jpg', 'psikoterapi-poli-2.jpg']);

        // 76. Klinik Perawatan Jiwa (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Klinik Perawatan Jiwa',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Ns. Auliya Akbar, M. Kep, Sp. Kep',
            'jabatan_struktural'=> 'Perawat Spesialis Jiwa',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci'        => 'klinik perawatan jiwa poli, poli perawatan jiwa, rawat jalan jiwa poli, kontrol jiwa poli, periksa rutin jiwa, konsultasi psikiater poli, terapi lanjutan jiwa, perawatan mental poli, auliya akbar perawatan jiwa, ns auliya akbar poli, layanan kesehatan jiwa poli, perawat spesialis jiwa poli',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pemeriksaan, diagnosis, dan penanganan pasien dengan gangguan jiwa, termasuk pemberian terapi medis, psikososial, dan pemantauan kondisi pasien, guna mendukung pemulihan, keselamatan, dan kualitas hidup sesuai standar pelayanan rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['perawatan-jiwa-poli-1.jpg', 'perawatan-jiwa-poli-2.jpg', 'perawatan-jiwa-poli-3.jpg']);

        // 77. Klinik TB-DOTS (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Klinik TB-DOTS',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'dr. Ragil Tribhakti Hotomo, MMR',
            'jabatan_struktural'=> 'Dokter Penanggung Jawab TB',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci'        => 'klinik tb dots, poli tb, poli paru, tbc, tuberkulosis, batuk darah, flek paru, obat tb, obat 6 bulan, cek dahak, bta, mantoux test, penyakit menular, infeksi paru, dots, dokter ragil, dr ragil tribhakti, ambil obat tb',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pemeriksaan, diagnosis, dan pengobatan pasien tuberkulosis (TB) menggunakan metode Directly Observed Treatment, Short-course (DOTS), guna memastikan pasien menjalani terapi TB secara teratur, aman, dan efektif sesuai standar pelayanan rumah sakit dan program pengendalian TB nasional.',
        ]);
        $this->tambahFoto($ruangan->id, ['tb-dots-poli-1.jpg', 'tb-dots-poli-2.jpg', 'tb-dots-poli-3.jpg']);

        // 78. Klinik VCT-CST (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Klinik VCT-CST',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'dr. Welda Wira',
            'jabatan_struktural'=> 'Dokter Konselor VCT',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci'        => 'klinik vct cst, vct, cst, hiv, aids, odha, tes hiv, cek darah hiv, konseling hiv, obat arv, antiretroviral, pita merah, penyakit menular seksual, pms, infeksi menular seksual, ims, serologi, dokter welda, dr welda wira, ambil obat arv',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pemberian layanan konseling dan pemeriksaan HIV secara sukarela (Voluntary Counseling and Testing – VCT) serta Community Support Team (CST), termasuk edukasi, tes HIV, konseling pra dan pasca tes, serta dukungan sosial bagi pasien, guna mendukung deteksi dini, pencegahan penularan, dan perawatan sesuai standar pelayanan rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['vct-cst-poli-1.jpg', 'vct-cst-poli-2.jpg', 'vct-cst-poli-3.jpg']);

        // 79. Klinik IPWL (Gedung Poli Klinik Lantai 1) 
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Klinik IPWL',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'dr. Ihsan Fadilah, Sp. KJ',
            'jabatan_struktural'=> 'Dokter Spesialis Kedokteran Jiwa',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci' => 'klinik ipwl, ipwl rsj, wajib lapor narkoba, rehabilitasi narkoba, layanan pecandu narkoba, terapi adiksi, ketergantungan zat, penyalahgunaan napza, konseling narkoba, poli adiksi lt1, pemulihan pecandu, rehabilitasi medis napza, konsultasi kecanduan obat, program ipwl, layanan wajib lapor rs, dr ihsan fadilah',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pemeriksaan, konseling, dan rehabilitasi medis bagi penyalahguna NAPZA (Narkotika, Psikotropika, dan Zat Adiktif lainnya) sebagai Institusi Penerima Wajib Lapor, guna mendukung pemulihan adiksi dan pemenuhan aspek hukum sesuai standar pelayanan rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['ipwl-poli-1.jpg', 'ipwl-poli-2.jpg', 'ipwl-poli-3.jpg']);

        // 80. Billing System (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Billing System',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'FAHRIZAL, SE.M.Si',
            'jabatan_struktural'=> 'Kepala Bagian Keuangan',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci' => 'rincian biaya pasien, cetak tagihan rumah sakit, detail biaya pengobatan, sistem billing rs, perhitungan biaya medis, total biaya pasien, daftar biaya tindakan, rekap biaya rs, sistem administrasi tagihan, informasi biaya pasien, output rincian biaya, pengolahan data biaya, billing rumah sakit, sistem hitung biaya rs, bukan tempat bayar',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'unit pengelolaan administrasi keuangan pasien, termasuk pencatatan tagihan, perhitungan biaya layanan medis dan non-medis, pengelolaan pembayaran, serta penerbitan bukti transaksi, guna menjamin akuntabilitas, transparansi, dan kelancaran operasional sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['billing-system-poli-1.jpg', 'billing-system-poli-2.jpg', 'billing-system-poli-3.jpg']);

        // 81. Instalasi Rekam Medis (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Instalasi Rekam Medis',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'TARMIZI, SKM',
            'jabatan_struktural'=> 'Kepala Instalasi Rekam Medis',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci'        => 'instalasi rekam medis, rekam medis, rm, medical record, ruang status, berkas pasien, riwayat kesehatan, cari status, data pasien, pendaftaran rekam medis, legalisir medis, arsip medis, gudang status, pak tarmizi, ruangan pak tarmizi, kepala rekam medis',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'unit pengelolaan, penyimpanan, dan pemeliharaan rekam medis pasien, termasuk pencatatan data medis, pengarsipan dokumen, dan penyediaan informasi rekam medis untuk pelayanan klinis, audit, dan penelitian, guna mendukung akurasi, kerahasiaan, dan mutu pelayanan sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['rekam-medis-poli-1.jpg', 'rekam-medis-poli-2.jpg', 'rekam-medis-poli-3.jpg']);

        // 82. Gudang Farmasi (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Gudang Farmasi',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'BETTI KRISTINA, S.Farm,Apt',
            'jabatan_struktural'=> 'Kepala Instalasi Farmasi',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik (Area Belakang Farmasi)',
            'kata_kunci'        => 'ruang penyimpanan farmasi, tempat simpan persediaan obat, gudang penyimpanan farmasi, ruang stok internal farmasi, tempat simpan bahan medis, penyimpanan barang farmasi, ruang penyimpanan logistik medis, tempat simpan alat kesehatan, gudang penyimpanan obat rumah sakit, ruang penyimpanan persediaan medis, tempat penyimpanan bahan habis pakai, gudang internal farmasi rumah sakit, ruang simpan inventaris farmasi, tempat penyimpanan perlengkapan medis, ruang penyimpanan stok farmasi',
            'kategori'          => 'Fasilitas Penunjang RSJ Tampan',
            'fungsi_ruangan'    => 'tempat penyimpanan obat, bahan medis habis pakai, dan perbekalan farmasi dalam jumlah besar, dengan pengaturan suhu, keamanan, dan pencatatan yang sesuai, guna menjamin ketersediaan obat yang aman, tepat, dan mendukung pelayanan pasien sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['gudang-farmasi-poli-1.jpg', 'gudang-farmasi-poli-2.jpg', 'gudang-farmasi-poli-3.jpg']);

        // 83. Farmasi Ruang Layanan IRJA (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Farmasi Ruang Layanan IRJA',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'BETTI KRISTINA, S.Farm,Apt',
            'jabatan_struktural'=> 'Apoteker Penanggung Jawab',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik (Loket Pengambilan Obat)',
            'kata_kunci'        => 'farmasi poli klinik, tebus resep poli klinik, farmasi rawat jalan poli, loket obat rawat jalan poli, obat setelah periksa poli, farmasi irja poli, tebus obat rawat jalan poli, obat pasien kontrol poli, depo obat poli klinik, pelayanan obat poli, loket farmasi irja poli, pengambilan obat poli klinik, apotek poli, farmasi pengambilan obat',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'Ruang Farmasi Layanan IRJA (Instalasi Rawat Jalan) di RSJ Tampan adalah sebagai unit penyediaan dan distribusi obat untuk pasien rawat jalan, termasuk pelayanan pengambilan resep, konseling penggunaan obat, dan pencatatan pemberian obat, guna memastikan pasien menerima terapi yang aman, tepat, dan sesuai standar pelayanan rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['farmasi-irja-poli-1.jpg', 'farmasi-irja-poli-2.jpg']);

        // 84. Ruang ME (Medical Engineering) (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang ME (Medical Engineering)',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Irsyad Agus, Amd',
            'jabatan_struktural'=> 'Kepala IPSRS',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci' => 'medical engineering alat medis, kalibrasi alat medis rsj, perbaikan alat medis pasien, teknisi alat kesehatan khusus, service monitor pasien, alat medis rusak diperbaiki, maintenance alat medis klinis, teknisi peralatan medis rsj, bengkel alat kesehatan internal, pengujian fungsi alat medis, instalasi alat medis rumah sakit, perbaikan mesin medis, teknisi elektromedis rsj, alat kesehatan tidak berfungsi, ruang khusus alat medis',
            'kategori'          => 'Fasilitas Penunjang RSJ Tampan',
            'fungsi_ruangan'    => 'Ruang ME (Medical Engineering) di RSJ Tampan adalah sebagai unit pemeliharaan, perawatan, dan pengelolaan peralatan medis dan elektrikal, termasuk instalasi, kalibrasi, dan perbaikan alat kesehatan, guna memastikan seluruh peralatan berfungsi dengan aman dan mendukung kelancaran pelayanan medis sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['ruang-me-poli-1.jpg', 'ruang-me-poli-2.jpg', 'ruang-me-poli-3.jpg']);

        // 85. Klinik Geriatri Terpadu (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Klinik Geriatri Terpadu',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'dr. Rahmi Sahreni, Sp.PD',
            'jabatan_struktural'=> 'Dokter Spesialis Penyakit Dalam',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci'        => 'klinik giatri terpadu, klinik geriatri, poli geriatri, poli lansia terpadu, kesehatan warga tua, manula, pelayanan lansia, prioritas lansia, gerontologi, usia lanjut, penyakit dalam lansia, komplikasi lansia, periksa kakek nenek, dokter rahmi, dr rahmi sahreni',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pemeriksaan, diagnosis, dan penanganan pasien lansia dengan gangguan kesehatan fisik dan mental secara terpadu, termasuk pemberian terapi medis, psikososial, rehabilitasi, dan pemantauan kondisi pasien, guna mendukung kemandirian, kualitas hidup, dan pelayanan sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['geriatri-poli-1.jpg', 'geriatri-poli-2.jpg', 'geriatri-poli-3.jpg', 'geriatri-poli-4.jpg']);

        // 86. Klinik Spesialis Kulit & Kelamin (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Klinik Spesialis Kulit & Kelamin',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'dr. Lia Septina Pakpahan, Sp.DV',
            'jabatan_struktural'=> 'Dokter Spesialis Dermatovenerologi',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci'        => 'spesialis kulit kelamin, poli kulit, poli kelamin, sp.kk, sp.dve, dermatologi, venereologi, dokter kulit, gatal gatal, alergi kulit, jamur kulit, eksim, pms, penyakit menular seksual, sifilis, gonore, raja singa, herpes, kutil, jerawat, kesehatan kulit, dokter lia, dr lia septina',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pemeriksaan, diagnosis, dan penanganan pasien dengan gangguan kulit dan penyakit menular seksual, termasuk pemberian terapi medis, edukasi pencegahan, dan pemantauan kondisi pasien, guna mendukung kesehatan fisik serta pelayanan sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['kulit-kelamin-poli-1.jpg', 'kulit-kelamin-poli-2.jpg', 'gi.jpg']);

        // 87. Klinik Spesialis Anak (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Klinik Spesialis Anak Poli Klinik',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'dr. Nolitriani, Sp.A',
            'jabatan_struktural'=> 'Dokter Spesialis Anak',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik',
            'kata_kunci'        => 'klinik anak lantai 1, poli anak gedung poli klinik, dokter anak lantai 1, spesialis anak poli utama, sp.a lantai 1, periksa bayi lantai 1, imunisasi anak poli klinik, tumbuh kembang anak umum, anak demam poli lantai 1, batuk pilek anak poli, konsultasi kesehatan fisik anak, layanan bayi dan balita, cek kesehatan anak umum, poli anak biasa bukan jiwa, pemeriksaan fisik anak, ruang anak gedung poli klinik, pelayanan anak lantai satu',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'tempat pemeriksaan, diagnosis, dan penanganan pasien anak, termasuk pemberian terapi medis, pemantauan tumbuh kembang, konseling orang tua, dan edukasi kesehatan anak, guna mendukung keselamatan, perkembangan, dan kualitas hidup pasien anak sesuai standar rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['spesialis-anak-poli-1.jpg', 'spesialis-anak-poli-2.jpg', 'spesialis-anak-poli-3.jpg']);

        // 88. WC Perempuan (Sayap Kiri) (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Toilet Wanita Poli Klinik Lantai 1',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Cleaning Service',
            'jabatan_struktural'=> 'Petugas Kebersihan',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik (Sayap Kiri)',
            'kata_kunci'        => 'wc perempuan poli kiri, wc wanita, wc cewek, toilet perempuan, toilet wanita, toilet cewek, kamar mandi perempuan, kamar mandi wanita, kamar kecil wanita, toilet poli sebelah kiri, toilet pengunjung wanita, ladies, toilet umum',
            'kategori'          => 'Fasilitas Umum RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas sanitasi untuk pasien, pengunjung, dan petugas, guna menjaga kebersihan diri, kenyamanan, serta mendukung penerapan standar kesehatan lingkungan dan pencegahan infeksi di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['wc-cewek-kiri-poli-1.jpg', 'wc-cewek-kiri-poli-2.jpg']);

        // 89. WC Laki-laki (Sayap Kiri) (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Toilet Pria Poli Klinik Lantai 1',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Cleaning Service',
            'jabatan_struktural'=> 'Petugas Kebersihan',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik (Sayap Kiri)',
            'kata_kunci' => 'toilet pria poli kiri, wc pria poli kiri, toilet laki laki poli kiri, wc laki laki poli kiri, toilet pria gedung poli lt1 kiri, wc pria lt1 poli kiri, urinoir poli kiri, toilet pengunjung pria kiri, wc pria area kiri poli, toilet pria sayap kiri poli',
            'kategori'          => 'Fasilitas Umum RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas sanitasi untuk pasien, pengunjung, dan petugas, guna menjaga kebersihan diri, kenyamanan, serta mendukung penerapan standar kesehatan lingkungan dan pencegahan infeksi di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['wc-cowok-kiri-poli-1.jpg', 'wc-cowok-kiri-poli-2.jpg']);

        // 90. WC Perempuan (Sayap Kanan) (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Toilet Wanita Poli Klinik Lantai 1',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Cleaning Service',
            'jabatan_struktural'=> 'Petugas Kebersihan',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik (Sayap Kanan)',
            'kata_kunci' => 'toilet wanita poli kanan, wc wanita poli kanan, toilet perempuan poli kanan, wc perempuan poli kanan, toilet wanita gedung poli lt1 kanan, wc wanita lt1 poli kanan, toilet pengunjung wanita kanan, wc wanita area kanan poli, toilet wanita sayap kanan poli, ladies poli kanan',
            'kategori'          => 'Fasilitas Umum RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas sanitasi untuk pasien, pengunjung, dan petugas, guna menjaga kebersihan diri, kenyamanan, serta mendukung penerapan standar kesehatan lingkungan dan pencegahan infeksi di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['wc-cewek-kanan-poli-1.jpg', 'wc-cewek-kanan-poli-2.jpg','wc-cewek-kanan-poli-3.jpg']);

        // 91. WC Laki-laki (Sayap Kanan) (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([ 
            'nama_ruangan'      => 'Toilet Pria Poli Klinik Lantai 1',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Cleaning Service',
            'jabatan_struktural'=> 'Petugas Kebersihan',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik (Sayap Kanan)',
            'kata_kunci' => 'toilet pria poli kanan, wc pria poli kanan, toilet laki laki poli kanan, wc laki laki poli kanan, toilet pria gedung poli lt1 kanan, wc pria lt1 poli kanan, urinoir poli kanan, toilet pengunjung pria kanan, wc pria area kanan poli, toilet pria sayap kanan poli',
            'kategori'          => 'Fasilitas Umum RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas sanitasi untuk pasien, pengunjung, dan petugas, guna menjaga kebersihan diri, kenyamanan, serta mendukung penerapan standar kesehatan lingkungan dan pencegahan infeksi di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['wc-cowok-kanan-poli-1.jpg', 'wc-cowok-kanan-poli-2.jpg','wc-cowok-kanan-poli-3.jpg','wc-cowok-kanan-poli-4.jpg']);

        // 92. WC Disabilitas (Sayap Kanan) (Gedung Poli Klinik Lantai 1)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Toilet Disabilitas Poli Klinik Lantai 1',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Cleaning Service',
            'jabatan_struktural'=> 'Petugas Kebersihan',
            'navigasi'          => 'Terletak di lantai 1 Gedung Poli Klinik (Sayap Kanan)',
            'kata_kunci' => 'toilet disabilitas poli kanan, wc disabilitas poli kanan, toilet difabel poli kanan, wc kursi roda poli kanan, toilet akses kursi roda poli kanan, wc khusus disabilitas poli kanan, toilet prioritas poli kanan, wc lansia poli kanan, toilet aksesibilitas poli kanan, wc ramah difabel poli kanan',
            'kategori'          => 'Fasilitas Umum RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas sanitasi khusus yang dirancang dengan aksesibilitas bagi penyandang disabilitas, lansia, atau pengguna kursi roda, dilengkapi pegangan rambat dan pintu lebar guna menjamin keamanan, kemandirian, dan kenyamanan sesuai standar pelayanan publik.',
        ]);
        $this->tambahFoto($ruangan->id, ['wc-disabel-poli-1.jpg', 'wc-disabel-poli-2.jpg']);

        // 93. Aula (Gedung Poli Klinik Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Aula',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Irsyad Agus, Amd',
            'jabatan_struktural'=> 'Kepala IPSRS',
            'navigasi'          => 'Terletak di lantai 2 Gedung Poli Klinik (Naik tanggake lantai 2)',
            'kata_kunci' => 'aula poli lt2, aula rsj, ruang aula besar, tempat acara rs, ruang seminar rs, rapat besar rs, rapat akbar rs, workshop rs, sosialisasi rs, diklat pegawai, pelatihan rs, acara resmi rumah sakit, pelantikan rs, gathering pegawai, ruang serbaguna besar, hall rs, auditorium rs, kegiatan massal rs, aula lantai 2 poli, ruang kegiatan besar',
            'kategori'          => 'Fasilitas Penunjang RSJ Tampan',
            'fungsi_ruangan'    => 'Ruang pertemuan utama berkapasitas besar yang digunakan untuk kegiatan resmi rumah sakit, seperti rapat akbar, pelantikan, seminar, diklat, sosialisasi, dan acara seremonial lainnya. Dilengkapi dengan fasilitas audio-visual dan panggung.', 
        ]);
        $this->tambahFoto($ruangan->id, ['aula-poli-lt2-1.jpg', 'aula-poli-lt2-2.jpg', 'aula-poli-lt2-3.jpg']);

        // 94. Klinik Psikologi (Gedung Poli Klinik Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Klinik Psikologi Poli Klinik',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Surya Mulyadi Fadhli S Psi., M.Kes., M Psi, Psikolog',
            'jabatan_struktural'=> 'Psikolog Klinis',
            'navigasi'          => 'Terletak di lantai 2 Gedung Poli Klinik',
            'kata_kunci'        => 'klinik psikologi, poli psikologi, psikolog, konsultasi psikolog, curhat ke psikolog, konseling psikologi, terapi psikologi, kesehatan mental, masalah emosi, stres, cemas, depresi ringan, butuh psikolog, layanan psikologi rs, ruang konseling, konsultasi mental, psikolog klinis, psikolog rsj, pak surya mulyadi, psikolog surya, terapi tanpa obat, konseling profesional',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'ruang pelayanan psikologi klinis untuk konsultasi, konseling, dan psikoterapi pasien gangguan mental dan emosional, guna mendukung asesmen, penanganan, serta pemulihan kesehatan jiwa secara profesional dan berkelanjutan.',
        ]);
        $this->tambahFoto($ruangan->id, ['klinik-psikologi-poli-lt2-1.jpg', 'klinik-psikologi-poli-lt2-2.jpg', 'klinik-psikologi-poli-lt2-3.jpg']);

        // 95. Ruang Tes Psikologi (Gedung Poli Klinik Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Tes Psikologi',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Surya Mulyadi Fadhli S Psi., M.Kes., M Psi, Psikolog',
            'jabatan_struktural'=> 'Psikolog Klinis',
            'navigasi'          => 'Terletak di lantai 2 Gedung Poli Klinik',
            'kata_kunci' => 'ruang tes psikologi lt2, psikotes rsj, tes iq, tes kepribadian, tes minat bakat, mmpi test, asesmen psikologi, periksa psikologi, tes mental rs, evaluasi psikologis, tes kognitif, tes masuk kerja, tes kecerdasan, surat sehat jiwa, surat rohani, ruang psikotes poli, layanan tes psikologi',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'ruang pemeriksaan psikologis untuk pelaksanaan tes intelegensi, kepribadian, dan fungsi kognitif, guna memperoleh data objektif sebagai dasar diagnosis, perencanaan terapi, dan evaluasi kondisi kejiwaan pasien.',
        ]);
        $this->tambahFoto($ruangan->id, ['tes-psikologi-poli-lt2-1.jpg', 'tes-psikologi-poli-lt2-2.jpg', 'tes-psikologi-poli-lt2-3.jpg']);

        // 96. Verifikasi BPJS/JAMKESDA (Gedung Poli Klinik Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Verifikasi BPJS/JAMKESDA',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Fahrizal, SE., M.Si.',
            'jabatan_struktural'=> 'Kepala Bagian Penjaminan',
            'navigasi'          => 'Terletak di lantai 2 Gedung Poli Klinik (Layanan Administrasi)',
            'kata_kunci' => 'verifikasi bpjs lt2, loket bpjs poli lt2, urus bpjs rumah sakit, cek bpjs aktif, validasi bpjs, administrasi bpjs rs, buat sep pasien, surat eligibilitas peserta, cek jaminan kesehatan, jamkesda rs, klaim bpjs pasien, kartu kis, loket jaminan kesehatan, pelayanan bpjs rsj, tempat urus bpjs lt2',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'ruang pelayanan administrasi untuk verifikasi kepesertaan BPJS dan JAMKESDA pasien, guna memastikan kelengkapan dokumen, validitas jaminan pembiayaan, serta kelancaran proses pelayanan kesehatan di rumah sakit jiwa.',
        ]); 
        $this->tambahFoto($ruangan->id, ['verifikasi-bpjs-poli-lt2-1.jpg', 'verifikasi-bpjs-poli-lt2-2.jpg', 'verifikasi-bpjs-poli-lt2-3.jpg', 'verifikasi-bpjs-poli-lt2-4.jpg', 'verifikasi-bpjs-poli-lt2-5.jpg', 'verifikasi-bpjs-poli-lt2-6.jpg', 'verifikasi-bpjs-poli-lt2-7.jpg', 'verifikasi-bpjs-poli-lt2-8.jpg']);

        // 97. Ruang Rapat (Gedung Poli Klinik Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Rapat Poli Klinik Lantai 2',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Irsyad Agus, Amd',
            'jabatan_struktural'=> 'Kepala IPSRS',
            'navigasi'          => 'Terletak di lantai 2 Gedung Poli Klinik',
            'kata_kunci' => 'ruang rapat poli klinik lt2, meeting room poli lantai 2, ruang pertemuan poli lt2, rapat staf poli klinik, ruang diskusi poli lantai 2, briefing pegawai poli lt2, koordinasi unit poli, rapat harian poli klinik, ruang musyawarah poli lt2, rapat bagian poli, staff meeting poli lantai 2, ruang rapat lantai 2 gedung poli klinik, pertemuan internal poli, diskusi pekerjaan poli lt2',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'ruang pertemuan internal untuk koordinasi, diskusi, dan pengambilan keputusan antar unit kerja, guna mendukung kelancaran operasional dan manajemen rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['ruang-rapat-poli-lt2-1.jpg', 'ruang-rapat-poli-lt2-2.jpg', 'ruang-rapat-poli-lt2-3.jpg']);

        // 98. Ruang Rapat Komite (Gedung Poli Klinik Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Rapat Komite Poli Klinik Lantai 2',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Irsyad Agus, Amd',
            'jabatan_struktural'=> 'Kepala IPSRS',
            'navigasi'          => 'Terletak di lantai 2 Gedung Poli Klinik',
            'kata_kunci' => 'ruang rapat komite poli lt2, rapat komite medik poli lantai 2, rapat mutu poli lt2, komite medik poli, komite keperawatan poli, rapat akreditasi poli, ruang sidang komite poli lantai 2, rapat pimpinan komite poli, evaluasi pelayanan poli lt2, rapat audit medis poli, koordinasi komite poli, sekretariat komite poli lt2, ruang rapat formal komite poli, rapat komite gedung poli lantai 2',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'ruang pertemuan khusus komite rumah sakit untuk pembahasan kebijakan, evaluasi mutu, keselamatan pasien, serta penjaminan kualitas pelayanan sesuai standar dan regulasi rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['rapat-komite-poli-lt2-1.jpg', 'rapat-komite-poli-lt2-2.jpg']);

        // 99. Mushola (Gedung Poli Klinik Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Mushola Poli Klinik Lantai 2',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Pengurus Mushola',
            'jabatan_struktural'=> 'DKM / Unit Rohani',
            'navigasi'          => 'Terletak di lantai 2 Gedung Poli Klinik',
            'kata_kunci'        => 'mushola poli klinik lt2, mushola lantai 2 poli, tempat sholat lt2 poli, mushola gedung poli lantai 2, ruang ibadah lt2 poli klinik, masjid kecil lt2 poli, tempat ibadah poli lantai 2, mushola area poli klinik, lokasi sholat lt2 poli, mushola dalam gedung poli lt2, tempat doa lt2 poli klinik, fasilitas ibadah lt2 poli, mushola pasien poli lantai 2, ruang sholat poli lt2, mushola atas poli klinik',
            'kategori'          => 'Fasilitas Umum RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas ibadah bagi pasien, pengunjung, dan petugas rumah sakit, guna memenuhi kebutuhan spiritual, meningkatkan ketenangan batin, serta mendukung proses penyembuhan dan kesejahteraan di rumah sakit jiwa.', 
        ]);
        $this->tambahFoto($ruangan->id, ['mushola-poli-lt2-1.jpg', 'mushola-poli-lt2-2.jpg', 'mushola-poli-lt2-3.jpg', 'mushola-poli-lt2-4.jpg', 'mushola-poli-lt2-5.jpg']);

        // 100. WC Laki-laki (Gedung Poli Klinik Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Toilet Pria Poli Klinik Lantai 2',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Cleaning Service',
            'jabatan_struktural'=> 'Petugas Kebersihan',
            'navigasi'          => 'Terletak di lantai 2 Gedung Poli Klinik',
            'kata_kunci' => 'toilet pria poli lt2, wc pria poli lt2, toilet laki laki poli lantai 2, wc laki laki lt2 poli, toilet pria gedung poli lantai 2, wc pria lantai dua poli, urinoir poli lt2, toilet pengunjung pria lt2, wc pria area lt2 poli, toilet pria poli lantai dua',
            'kategori'          => 'Fasilitas Umum RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas sanitasi untuk pasien, pengunjung, dan petugas, guna menjaga kebersihan diri, kenyamanan, serta mendukung penerapan standar kesehatan lingkungan dan pencegahan infeksi di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['wc-cowok-poli-lt2-1.jpg', 'wc-cowok-poli-lt2-2.jpg','wc-cowok-poli-lt2-3.jpg']);

        // 101. WC Perempuan (Gedung Poli Klinik Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Toilet Wanita Poli Klinik Lantai 2',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Cleaning Service',
            'jabatan_struktural'=> 'Petugas Kebersihan',
            'navigasi'          => 'Terletak di lantai 2 Gedung Poli Klinik',
            'kata_kunci' => 'toilet wanita poli lantai 2, wc wanita poli lantai 2, toilet perempuan poli lt2, wc perempuan poli lantai 2, toilet cewek poli lt2, kamar mandi wanita poli lantai 2, ladies toilet poli lt2, wc wanita gedung poli lantai 2, toilet wanita area poli lt2, kamar kecil wanita poli lantai 2, wc perempuan area lt2 poli',
            'kategori'          => 'Fasilitas Umum RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas sanitasi untuk pasien, pengunjung, dan petugas, guna menjaga kebersihan diri, kenyamanan, serta mendukung penerapan standar kesehatan lingkungan dan pencegahan infeksi di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['wc-cewek-poli-lt2-1.jpg', 'wc-cewek-poli-lt2-2.jpg','wc-cewek-poli-lt2-3.jpg']);

        // 102. Gudang Kebersihan (Gedung Poli Klinik Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Gudang Kebersihan Poli Klinik Lantai 2 ',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Irsyad Agus, Amd',
            'jabatan_struktural'=> 'Kepala IPSRS',
            'navigasi'          => 'Terletak di lantai 2 Gedung Poli Klinik',
            'kata_kunci'        => 'gudang kebersihan poli lt2, ruang janitor poli lantai 2, gudang cs poli, cleaning service poli lt2, simpan alat pel poli, perlengkapan kebersihan poli, gudang lantai 2 poli, tempat alat bersih poli, stok sabun poli, gudang sapu poli, logistik kebersihan poli, area petugas kebersihan poli, gudang sanitasi poli lt2, gudang kebersihan poliklinik lantai 2',
            'kategori'          => 'Fasilitas Penunjang RSJ Tampan',
            'fungsi_ruangan'    => 'ruang penyimpanan khusus peralatan dan perlengkapan kebersihan, guna mendukung kegiatan pemeliharaan kebersihan, sanitasi lingkungan, serta penerapan standar kesehatan dan pencegahan infeksi di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['gudang-cs-poli-lt2-1.jpg', 'gudang-cs-poli-lt2-2.jpg']);

        // 103. Klinik Kesehatan Gigi dan Mulut (Gedung Poli Klinik Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Klinik Kesehatan Gigi dan Mulut',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'drg. Nila Dewi Ratnawati',
            'jabatan_struktural'=> 'Dokter Gigi',
            'navigasi'          => 'Terletak di lantai 2 Gedung Poli Klinik',
            'kata_kunci'        => 'klinik gigi dan mulut, poli gigi, dokter gigi, drg, tambal gigi, cabut gigi, sakit gigi, bersihkan karang gigi, scalling, periksa gigi, kesehatan mulut, odontogram, perawatan gigi, poli gigi dan mulut, konsultasi gigi, dokter nila, drg nila dewi',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'ruang pelayanan kesehatan gigi dan mulut untuk pemeriksaan, perawatan, dan tindakan medis dasar, guna menjaga kesehatan oral pasien serta mendukung kualitas hidup dan perawatan menyeluruh di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['poli-gigi-poli-lt2-1.jpg', 'poli-gigi-poli-lt2-2.jpg', 'poli-gigi-poli-lt2-3.jpg', 'poli-gigi-poli-lt2-4.jpg', 'poli-gigi-poli-lt2-5.jpg']);

        // 104. Ruang Gizi (Gedung Poli Klinik Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Konsultasi Gizi Poli Klinik',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Zara Zettira Amany, S.Gz',
            'jabatan_struktural'=> 'Ahli Gizi (Nutrisionis)',
            'navigasi'          => 'Terletak di lantai 2 Gedung Poli Klinik',
            'kata_kunci' => 'konsultasi gizi pasien, tanya pola makan, ahli gizi rumah sakit, nutrisionis rs, diet pasien, edukasi makanan sehat, konsultasi diet penyakit, gizi klinis, pengaturan pola makan, diet diabetes hipertensi, asuhan gizi pasien, ruang konsultasi nutrisi, layanan gizi klinis, ibu zara ahli gizi, tanya makanan pasien, konsultasi nutrisi',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'ruang pelayanan gizi untuk konsultasi dan edukasi nutrisi pasien, guna mendukung pemenuhan kebutuhan gizi, perbaikan status kesehatan, serta menunjang proses penyembuhan di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['ruang-gizi-poli-lt2-1.jpg', 'ruang-gizi-poli-lt2-2.jpg']);

        // 105. Pusat Informasi & Pengaduan (Gedung Poli Klinik Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Pusat Informasi & Pengaduan',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'H. Zulkifli, S.Kep, MH',
            'jabatan_struktural'=> 'Kepala Bagian Humas / Pengaduan',
            'navigasi'          => 'Terletak di lantai 2 Gedung Poli Klinik',
            'kata_kunci'        => 'pusat informasi pengaduan poli, layanan pengaduan poli lt2, komplain poli klinik, pengaduan pelanggan poli, kotak saran poli, kritik saran poli, customer care poli, pusat bantuan poli, lapor keluhan poli, kepuasan pasien poli, handling complaint poli, meja pengaduan poli, pelaporan pengaduan poli, layanan pelanggan poli lt2, humas pengaduan poli, zulkifli pengaduan',
            'kategori'          => 'Fasilitas Penunjang RSJ Tampan',
            'fungsi_ruangan'    => 'ruang pelayanan untuk pemberian informasi serta penerimaan pengaduan, saran, dan masukan dari pasien dan pengunjung, guna meningkatkan transparansi, kualitas pelayanan, dan kepuasan di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['pengaduan-poli-lt2-1.jpg', 'pengaduan-poli-lt2-2.jpg']);

        // 106. Kantor Staf Psikologi (Gedung Poli Klinik Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Kantor Staf Psikologi Poli Klinik',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Surya Mulyadi Fadhli S Psi., M.Kes., M Psi, Psikolog',
            'jabatan_struktural'=> 'Koordinator Psikolog',
            'navigasi'          => 'Terletak di lantai 2 Gedung Poli Klinik (Area Perkantoran)',
            'kata_kunci'        => 'kantor psikologi, ruang staf psikologi, kepala instalasi psikologi, ruang psikolog, administrasi psikologi, koordinasi psikolog, basecamp psikologi, manajemen psikologi, ruang kerja psikolog, tempat psikolog, sekretariat psikologi, arsip psikologi, rapat psikologi, tim psikologi, instalasi psikologi',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'Kantor pusat berkumpul semua psikolog rumah sakit, digunakan untuk koordinasi, diskusi kasus, supervisi, perencanaan intervensi psikologis, dan kegiatan administrasi psikologi, bukan untuk pelayanan klinik langsung.',
        ]);
        $this->tambahFoto($ruangan->id, ['kantor-psikologi-poli-lt2-1.jpg', 'kantor-psikologi-poli-lt2-2.jpg', 'kantor-psikologi-poli-lt2-3.jpg']);

        // 107. Ruang Istirahat Tenaga Kesehatan (Gedung Poli Klinik Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Istirahat Tenaga Kesehatan Poli Klinik Lantai 2',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Surya Mulyadi Fadhli S Psi., M.Kes., M Psi, Psikolog',
            'jabatan_struktural'=> 'Koordinator Nakes',
            'navigasi'          => 'Terletak di lantai 2 Gedung Poli Klinik',
            'kata_kunci'        => 'ruang istirahat tenaga kesehatan poli, tempat rehat dokter poli, ruang santai staf poli klinik, istirahat setelah pelayanan poli, ruang istirahat lantai 2 poli, tempat duduk santai tenaga medis, ruang rehat pegawai poli, area istirahat karyawan poli, ruang jeda kerja staf poli, tempat istirahat dokter rawat jalan, ruang santai tenaga kesehatan poli, lokasi istirahat staf poli klinik, ruang relaksasi tenaga medis poli, tempat istirahat siang staf poli, ruang istirahat pegawai poli',
            'kategori'          => 'Fasilitas Penunjang RSJ Tampan',
            'fungsi_ruangan'    => 'ruang fasilitas bagi tenaga kesehatan untuk beristirahat, koordinasi, dan persiapan pelayanan, guna menunjang kinerja, kenyamanan, serta kesinambungan pelayanan medis di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['ruang-nakes-poli-lt2-1.jpg', 'ruang-nakes-poli-lt2-2.jpg']);

        // 108. Kantor Komite PPI (Gedung Poli Klinik Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Kantor Komite PPI',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Ketua Komite PPI',
            'jabatan_struktural'=> 'Ketua Komite PPI',
            'navigasi'          => 'Terletak di lantai 2 Gedung Poli Klinik',
            'kata_kunci'        => 'kantor ppi poli, ruang pencegahan infeksi poli, komite ppi poli lantai 2, pengendalian infeksi poli, tim ppi poli, pengawasan infeksi poli, audit infeksi poli, ipcn poli, program ppi poli, ruang rapat pencegahan infeksi poli, standar kebersihan medis poli, komite pencegahan infeksi poli, ppi poliklinik lantai 2',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'ruang kegiatan tim PPI untuk perencanaan, koordinasi, pemantauan, dan evaluasi upaya pencegahan serta pengendalian infeksi, guna menjamin keselamatan pasien, petugas, dan lingkungan di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['ppi-poli-lt2-1.jpg', 'ppi-poli-lt2-2.jpg']);

        // 109. Kantor Komite Keperawatan (Gedung Poli Klinik Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Kantor Komite Keperawatan Poli Klinik Lantai 2',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Ketua Komite Keperawatan',
            'jabatan_struktural'=> 'Ketua Komite Keperawatan',
            'navigasi'          => 'Terletak di lantai 2 Gedung Poli Klinik',
            'kata_kunci'        => 'kantor komite keperawatan poli, ruang komite perawat poli, mutu keperawatan poli, etik keperawatan poli, kredensial perawat poli, pembinaan perawat poli, sub komite etik poli, standar asuhan keperawatan poli, sak keperawatan poli, logbook perawat poli, evaluasi perawat poli, manajemen keperawatan poli, komite keperawatan poliklinik lt2, aulya akbar komite keperawatan',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'ruang kerja komite keperawatan untuk koordinasi, pembinaan, dan evaluasi praktik keperawatan, guna menjamin mutu, profesionalisme, serta keselamatan pelayanan keperawatan di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['komite-perawat-poli-lt2-1.jpg', 'komite-perawat-poli-lt2-2.jpg']);

        // 110. Kantor PKRS (Promosi Kesehatan) (Gedung Poli Klinik Lantai 2)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Kantor PKRS (Promosi Kesehatan)',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'Ns. Aulya Akbar, M.Kep.Sp.Kep.J',
            'jabatan_struktural'=> 'Kepala Unit PKRS',
            'navigasi'          => 'Terletak di lantai 2 Gedung Poli Klinik',
            'kata_kunci'        => 'kantor pkrs poli, promosi kesehatan poli, unit promkes poli, penyuluhan kesehatan poli, edukasi pasien poli, sosialisasi kesehatan poli, tim penyuluh poli, kampanye kesehatan poli, edukator poli, ruang pkrs poli, info sehat poli, kegiatan penyuluhan poli, aulya akbar pkrs, promosi kesehatan poliklinik lt2',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'ruang kegiatan promosi dan edukasi kesehatan bagi pasien, keluarga, dan pengunjung, guna meningkatkan pengetahuan, perilaku hidup sehat, serta mendukung upaya pencegahan dan pemulihan kesehatan di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['pkrs-poli-lt2-1.jpg', 'pkrs-poli-lt2-2.jpg']);

        // 111. Klinik Spesialis Anak (Gedung M. Saleh Hasyim)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Klinik Spesialis Anak ',
            'nama_gedung'       => 'Gedung M. Saleh Hasyim',
            'penanggung_jawab'  => 'dr. Yoseva Hotnauli, M.Ked (K.J), Sp.KJ',
            'jabatan_struktural'=> 'Dokter Spesialis Kedokteran Jiwa (Konsultan Anak)',
            'navigasi'          => 'Terletak di Gedung M. Saleh Hasyim',
            'kata_kunci' => 'klinik anak jiwa, poli anak kejiwaan, dokter anak konsultan jiwa, sp.kj anak, anak gangguan mental, konsultasi psikolog anak, anak hiperaktif rsj, anak autisme rsj, terapi anak jiwa, anak dengan masalah perilaku, konsultasi tumbuh kembang mental, anak emosional tidak stabil, layanan anak psikiatri, poli anak gedung m saleh hasyim, klinik anak khusus jiwa, penanganan mental anak, terapi perilaku anak rsj',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'ruang pelayanan kesehatan anak untuk pemeriksaan, konsultasi, dan penanganan medis sesuai tumbuh kembang, guna menjaga kesehatan fisik dan mental anak di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['klinik-anak-hasyim-1.jpg', 'klinik-anak-hasyim-2.jpg', 'klinik-anak-hasyim-3.jpg', 'klinik-anak-hasyim-4.jpg', 'klinik-anak-hasyim-5.jpg']);

        // 112. Klinik Rehabilitasi Psikologi (Gedung M. Saleh Hasyim)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Klinik Rehabilitasi Psikologi',
            'nama_gedung'       => 'Gedung M. Saleh Hasyim',
            'penanggung_jawab'  => 'dr. Windy Ariyanti',
            'jabatan_struktural'=> 'Dokter Rehabilitasi Medik',
            'navigasi'          => 'Terletak di Gedung M. Saleh Hasyim',
            'kata_kunci'        => 'klinik rehabilitasi psikologi hasyim, rehab mental hasyim, pemulihan mental poli, terapi lanjutan jiwa, pasca perawatan jiwa, pemulihan pasien jiwa, terapi aktivitas kelompok, reintegrasi sosial jiwa, kemandirian pasien jiwa, latihan kerja pasien jiwa, terapi okupasi mental poli, klinik rehab jiwa hasyim, windy ariyanti rehabilitasi, terapi kelompok rehab',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'ruang pelayanan rehabilitasi psikologis bagi pasien gangguan jiwa, guna memulihkan fungsi psikososial, meningkatkan kemandirian, serta mendukung reintegrasi pasien ke lingkungan sosial.',
        ]);
        $this->tambahFoto($ruangan->id, ['rehab-psikologi-hasyim-1.jpg', 'rehab-psikologi-hasyim-2.jpg']);

        // 113. Klinik Psikiatri (Gedung M. Saleh Hasyim)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Klinik Psikiatri',
            'nama_gedung'       => 'Gedung M. Saleh Hasyim',
            'penanggung_jawab'  => 'Kepala Instalasi Rawat Jalan',
            'jabatan_struktural'=> 'Kepala Instalasi Rawat Jalan (Ka. IRJA)',
            'navigasi'          => 'Terletak di Gedung M. Saleh Hasyim',
            'kata_kunci'        => 'klinik psikiatri hasyim, poli jiwa hasyim, dokter jiwa poli, konsultasi psikiater poli, periksa jiwa hasyim, rawat jalan jiwa hasyim, layanan psikiatri hasyim, klinik mental hasyim, diagnosis mental poli, terapi obat jiwa hasyim, psikiatri gedung m saleh hasyim, klinik psikiatri rawat jalan',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'ruang pelayanan kesehatan jiwa untuk pemeriksaan, diagnosis, dan penatalaksanaan gangguan mental oleh psikiater, guna menjamin terapi yang tepat, aman, dan berkelanjutan di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['klinik-psikiatri-hasyim-1.jpg', 'klinik-psikiatri-hasyim-2.jpg', 'klinik-psikiatri-hasyim-3.jpg']);

        // 114. Arsip RSJ Tampan (Gedung M. Saleh Hasyim)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Arsip',
            'nama_gedung'       => 'Gedung M. Saleh Hasyim',
            'penanggung_jawab'  => 'Yulviana',
            'jabatan_struktural'=> 'Staf Unit Kearsipan',
            'navigasi'          => 'Terletak di Gedung M. Saleh Hasyim',
            'kata_kunci'        => 'a, arsip rsj tampan, ruang arsip, penyimpanan dokumen, yulviana, rekam jejak, gudang berkas, administrasi arsip, data rumah sakit, kearsipan, dokumentasi rs, file pasien lama, unit kearsipan, pengelolaan data, pusat arsip',
            'kategori'          => 'Perkantoran RSJ Tampan',
            'fungsi_ruangan'    => 'ruang pengelolaan dan penyimpanan arsip serta dokumen rumah sakit, guna menjamin kerapian, keamanan, kemudahan akses informasi, dan kepatuhan terhadap ketentuan kearsipan di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['arsip-hasyim-1.jpg', 'arsip-hasyim-2.jpg', 'arsip-hasyim-3.jpg', 'arsip-hasyim-4.jpg', 'arsip-hasyim-5.jpg', 'arsip-hasyim-6.jpg', 'arsip-hasyim-7.jpg','arsip-hasyim-8.jpg']);

        // 115. Kantin (Area Belakang / Dekat Gedung M. Saleh Hasyim) 
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Kantin RSJ Tampan',
            'nama_gedung'       => 'Area Belakang (Dekat Gedung M. Saleh Hasyim)',
            'penanggung_jawab'  => 'Pengurus Koperasi Pegawai RSJ Tampan',
            'jabatan_struktural'=> 'Pengelola Kantin',
            'navigasi'          => 'Terletak di area belakang rumah sakit, tepatnya di sebelah kanan pintu gerbang belakang (atau di belakang Gedung M. Saleh Hasyim)',
            'kata_kunci'        => 'kantin rumah sakit, tempat beli makanan, warung makan rs, beli minuman di rs, jajanan rumah sakit, tempat makan pegawai, kedai makanan rs, beli kopi teh rs, makanan ringan rs, tempat sarapan rs, tempat makan siang rs, warung nasi rumah sakit, beli snack rs, area makan pengunjung, tempat beli makanan cepat, nasi, minuman, teh, kopi, gorengan, mie rebus, lontong, soto medan, sarapan pagi, makan siang',
            'kategori'          => 'Fasilitas Umum RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas penyediaan makanan dan minuman bagi pegawai dan pengunjung, guna memenuhi kebutuhan konsumsi harian serta mendukung kenyamanan dan aktivitas di lingkungan rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['kantin-rsj-1.jpg', 'kantin-rsj-2.jpg', 'kantin-rsj-3.jpg', 'kantin-rsj-4.jpg']);

        // 116. Ruang Farmasi Klinis (Gedung Terpisah)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Farmasi Klinis',
            'nama_gedung'       => 'Gedung Terpisah (Kawasan RS)',
            'penanggung_jawab'  => 'BETTI KRISTINA, S.Farm,Apt',
            'jabatan_struktural'=> 'Apoteker Farmasi Klinis',
            'navigasi'          => 'Ruangan berada tepat di belakang Gedung IGD',
            'kata_kunci' => 'farmasi klinis, layanan farmasi klinis, apoteker klinis, konsultasi obat lanjutan, evaluasi terapi obat, analisis obat pasien, review resep dokter, interaksi obat, efek samping obat, monitoring terapi, pemantauan obat pasien, diskusi obat dengan apoteker, optimalisasi terapi, manajemen obat pasien, pengawasan terapi, kajian penggunaan obat, terapi kompleks, konsultasi farmasi lanjutan, tim medis farmasi, pelayanan farmasi klinis',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'ruang pelayanan farmasi untuk kegiatan klinis seperti pemantauan terapi obat, konsultasi farmasi, dan evaluasi penggunaan obat, guna meningkatkan efektivitas, keamanan, dan rasionalitas terapi pasien di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['farmasi-klinis-luar-1.jpg', 'farmasi-klinis-luar-2.jpg', 'farmasi-klinis-luar-3.jpg', 'farmasi-klinis-luar-4.jpg', 'farmasi-klinis-luar-5.jpg']);

        // 117. WC Perempuan (Gedung Terpisah)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Toilet wanita Gedung Terpisah',
            'nama_gedung'       => 'Gedung Terpisah (Kawasan RS)',
            'penanggung_jawab'  => 'Cleaning Service',
            'jabatan_struktural'=> 'Petugas Kebersihan',
            'navigasi'          => 'Terletak di gedung terpisah (Area Sanitasi Luar)',
            'kata_kunci' => 'toilet wanita gedung terpisah area luar, wc wanita kawasan rs belakang, toilet perempuan area luar rsj, wc perempuan gedung luar terpisah, toilet wanita luar gedung utama, wc wanita area belakang kawasan rs, toilet wanita non igd non poli klinik, wc wanita area luar bangunan, toilet perempuan gedung terpisah rsj, ladies toilet area luar rs, toilet wanita kawasan rs terpisah, wc perempuan area belakang rsj, toilet wanita paling luar, wc wanita di luar gedung',
            'kategori'          => 'Fasilitas Umum RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas sanitasi untuk pasien, pengunjung, dan petugas, guna menjaga kebersihan diri, kenyamanan, serta mendukung penerapan standar kesehatan lingkungan dan pencegahan infeksi di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['wc-cewek-luar-1.jpg']);

        // 118. WC Laki-laki (Gedung Terpisah)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Toilet pria Gedung Terpisah',
            'nama_gedung'       => 'Gedung Terpisah (Kawasan RS)',
            'penanggung_jawab'  => 'Cleaning Service',
            'jabatan_struktural'=> 'Petugas Kebersihan',
            'navigasi'          => 'Terletak di gedung terpisah (Area Sanitasi Luar)',
            'kata_kunci' => 'toilet pria gedung terpisah, wc pria gedung luar, toilet laki laki area luar rs, wc laki laki kawasan rs, toilet pria luar gedung, wc pria area belakang rs, toilet pria non igd non poli, wc pria area luar, toilet laki laki gedung terpisah rs, urinoir area luar rs',
            'kategori'          => 'Fasilitas Umum RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas sanitasi untuk pasien, pengunjung, dan petugas, guna menjaga kebersihan diri, kenyamanan, serta mendukung penerapan standar kesehatan lingkungan dan pencegahan infeksi di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['wc-cowok-luar-1.jpg']);

        // 119. CSSD (Central Sterile Supply Department)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'CSSD (Pusat Sterilisasi)',
            'nama_gedung'       => 'Gedung Terpisah (Kawasan RS)',
            'penanggung_jawab'  => 'Ns. Syaparuddin Daud, S.Kep, MM',
            'jabatan_struktural'=> 'Kepala Unit CSSD',
            'navigasi'          => 'Terletak di gedung khusus CSSD (Area Penunjang Medis)',
            'kata_kunci' => 'cssd, pusat sterilisasi alat, central sterile supply, ruang sterilisasi alat medis, unit cssd rumah sakit, tempat sterilisasi alat operasi, cuci alat medis sebelum steril, pengemasan alat steril, packing instrumen medis, autoclave sterilisasi alat, proses sterilisasi alat bedah, distribusi alat steril ke ruangan, penyedia alat operasi steril, bukan untuk pasien, ruang khusus sterilisasi alat, petugas cssd, unit pengolahan alat medis, alur kotor ke bersih alat, sterilisasi instrumen bedah, layanan sterilisasi rumah sakit',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'Unit pelayanan pusat sterilisasi yang bertugas melakukan pencucian, pengemasan, dan sterilisasi alat medis/instrumen bedah, guna menjamin ketersediaan peralatan yang steril, mencegah infeksi nosokomial, dan mendukung keselamatan pasien dalam setiap tindakan medis.',
        ]);
        $this->tambahFoto($ruangan->id, ['cssd-luar-1.jpg', 'cssd-luar-2.jpg']);

        // 120. Tempat Pengambilan Alat Steril (Gedung Terpisah)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Loket Pengambilan Alat Steril',
            'nama_gedung'       => 'Gedung Terpisah (Area CSSD)',
            'penanggung_jawab'  => 'ELI YUSNANI, Amd.Keb.SKM',
            'jabatan_struktural'=> 'Staf Distribusi CSSD',
            'navigasi'          => 'Terletak di Gedung CSSD (Loket Distribusi)',
            'kata_kunci'        => 'tempat pengambilan alat steril, loket alat, distribusi alat medis, ambil instrumen, counter cssd, alat bersih, eli yusnani, stok alat steril, penukaran alat',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'ruang pelayanan untuk pengambilan dan distribusi alat medis steril, guna menjamin ketersediaan peralatan yang aman, mencegah infeksi, serta mendukung kelancaran tindakan medis di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['loket-cssd-1.jpg','loket-cssd-2.jpg']);

        // 121. IGD Lama [Gedung Kosong]
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'IGD Lama (Gedung Kosong)',
            'nama_gedung'       => 'Gedung Terpisah (Non-Aktif)',
            'penanggung_jawab'  => 'Irsyad Agus, Amd',
            'jabatan_struktural'=> 'Kepala IPSRS',
            'navigasi'          => 'Terletak di bangunan lama (Area Non-Pelayanan)',
            'kata_kunci'        => 'igd l, igd lama, gedung kosong, bekas igd, instalasi gawat darurat lama, bangunan tua, gedung tidak terpakai, area kosong, gedung lama, ruang non aktif, bekas ugd, lokasi lama, gedung mangkrak, bangunan kosong, area terlarang, jangan kesini, pindah ke igd baru',
            'kategori'          => 'Fasilitas Penunjang RSJ Tampan',
            'fungsi_ruangan'    => 'Bangunan bekas Instalasi Gawat Darurat yang saat ini tidak difungsikan untuk pelayanan medis (kosong/non-aktif).',
        ]);
        $this->tambahFoto($ruangan->id, ['igd-lama-1.jpg']);

        // 122. Unit Perawatan Intensif Darurat (UPIP)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Unit Perawatan Intensif Psikiatri (UPIP)',
            'nama_gedung'       => 'Gedung Terpisah (Kawasan RS)',
            'penanggung_jawab'  => 'dr. Hanifal Yunis',
            'jabatan_struktural'=> 'Kepala Unit UPIP',
            'navigasi'          => 'Terletak di gedung khusus UPIP / Intensif (Area Perawatan Akut)',
            'kata_kunci'        => 'ruang pasien krisis jiwa, penanganan pasien agresif, pasien tidak terkendali, ruang intensif psikiatri, perawatan pasien kritis jiwa, observasi ketat pasien jiwa, ruang isolasi pasien gangguan berat, penanganan kondisi psikiatri akut, unit perawatan intensif jiwa, pasien gaduh gelisah berat, ruang pengawasan intensif pasien, kondisi darurat kejiwaan berat, stabilisasi pasien krisis jiwa, ruang penanganan pasien ekstrem, unit kontrol ketat pasien jiwa',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'unit pelayanan medis intensif untuk penanganan pasien dalam kondisi gawat darurat dan kritis oleh tim medis termasuk psikiater, guna stabilisasi awal, pemantauan ketat, serta penyelamatan jiwa sebelum perawatan lanjutan di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['upip-luar-1.jpg', 'upip-luar-2.jpg', 'upip-luar-3.jpg']);

        // 123. Dojo Kaido (Gedung Terpisah)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Dojo Kaido (Ruang Olahraga & Rehabilitasi)',
            'nama_gedung'       => 'Gedung Terpisah (Area Rehabilitasi)',
            'penanggung_jawab'  => 'dr. Windy Ariyanti',
            'jabatan_struktural'=> 'Koordinator Rehabilitasi',
            'navigasi'          => 'Terletak di gedung terpisah (Area Rehabilitasi Medik/Olahraga)',
            'kata_kunci'        => 'dojo kaido rsj, ruang olahraga rehabilitasi, tempat latihan fisik pasien, area senam pasien jiwa, latihan kebugaran pasien, terapi fisik gerak aktif, tempat olahraga pasien rsj, lapangan aktivitas pasien, senam pagi rehabilitasi, latihan disiplin pasien jiwa, aktivitas fisik luar ruangan, olahraga kelompok pasien, tempat bela diri pasien, latihan motorik kasar pasien, area kebugaran rehabilitasi, gedung olahraga rsj terpisah, tempat latihan fisik bukan konseling, ruang gerak pasien aktif, aktivitas olahraga terjadwal, terapi fisik dengan gerakan',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'ruang aktivitas terbuka untuk kegiatan olahraga, terapi fisik, dan aktivitas rehabilitatif, guna meningkatkan kebugaran, disiplin, serta pemulihan fisik dan mental pasien di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['dojo-kaido-1.jpg', 'dojo-kaido-2.jpg']);

        // 124. IPSRS (Instalasi Pemeliharaan Sarana RS)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'IPSRS (Instalasi Pemeliharaan Sarana)',
            'nama_gedung'       => 'Gedung Terpisah (Area Teknik)',
            'penanggung_jawab'  => 'Irsyad Agus, Amd',
            'jabatan_struktural'=> 'Kepala IPSRS',
            'navigasi'          => 'Terletak di gedung terpisah (Area Teknik/Workshop)',
            'kata_kunci' => 'ipsrs perbaikan fasilitas gedung, teknisi perbaikan bangunan rsj, laporan kerusakan fasilitas rumah sakit, perbaikan lampu mati gedung, ac ruangan rusak diperbaiki, perbaikan pintu dan jendela rs, kerusakan toilet rumah sakit, teknisi sarana prasarana rsj, perbaikan keran bocor gedung, maintenance bangunan rumah sakit, teknisi fasilitas umum rs, unit perbaikan gedung rsj, layanan teknisi bangunan rs, perbaikan fasilitas non medis, tim teknisi lapangan rsj',
            'kategori'          => 'Fasilitas Penunjang RSJ Tampan',
            'fungsi_ruangan'    => 'Unit yang bertugas merencanakan, melaksanakan, dan mengevaluasi pemeliharaan serta perbaikan seluruh sarana fisik, prasarana, dan peralatan medis maupun non-medis, guna menjamin keamanan, keselamatan, dan kelancaran operasional pelayanan di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['ipsrs-1.jpg', 'ipsrs-2.jpg']);

        // 125. Ruang Rawat Inap Non Akut Sebayang
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Rawat Inap Sebayang (Non Akut)',
            'nama_gedung'       => 'ruang Rawat Inap Non Akut Sebayang',
            'penanggung_jawab'  => 'dr. Indra Yenni',
            'jabatan_struktural'=> 'Kepala Ruangan Sebayang',
            'navigasi'          => 'Terletak di Gedung Rawat Inap Sebayang',
            'kata_kunci'        => 'rri s, rri sebayang, ruang sebayang , bangsal sebayang, rawat inap sebayang, ruang non akut, pasien stabil, rehabilitasi sebayang, kamar sebayang, gedung sebayang, bangsal tenang, rawat inap jiwa, perawatan pemulihan, wisma sebayang, pasien mau pulang, sebayang',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'ruang perawatan bagi pasien gangguan jiwa dalam kondisi stabil atau tidak akut, guna menjalani perawatan lanjutan, rehabilitasi, dan pemulihan fungsi psikososial secara bertahap dan berkesinambungan.',
        ]);
        $this->tambahFoto($ruangan->id, ['sebayang-1.jpg', 'sebayang-2.jpg', 'sebayang-3.jpg']);

        // 126. Ruang Penyimpanan Troli
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Penyimpanan Troli',
            'nama_gedung'       => 'Gedung Terpisah (Area Logistik/Gizi)',
            'penanggung_jawab'  => 'Juhri Hasibuan',
            'jabatan_struktural'=> 'Staf Logistik',
            'navigasi'          => 'Terletak di area pelayanan gizi/logistik',
            'kata_kunci'        => 'rpt, ruang penyimpanan troli, gudang troli, parkir troli, tempat brankar, penyimpanan kursi roda, gudang alat angkut, troli medis, troli makan, troli linen, ruang alat bantu, gudang operasional, tempat kereta dorong, logistik troli, area troli',
            'kategori'          => 'Fasilitas Penunjang RSJ Tampan',
            'fungsi_ruangan'    => 'ruang khusus untuk penyimpanan troli pelayanan medis dan nonmedis, guna menjaga kerapian, keamanan peralatan, serta kelancaran distribusi dan mobilitas layanan di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['gudang-troli-1.jpg', 'gudang-troli-2.jpg', 'gudang-troli-3.jpg', 'gudang-troli-4.jpg']); 

        // 127. Ruang Pencucian Troli
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Pencucian Troli',
            'nama_gedung'       => 'Gedung Terpisah (Area Sanitasi)',
            'penanggung_jawab'  => 'Cleaning Service',
            'jabatan_struktural'=> 'Petugas Kebersihan',
            'navigasi'          => 'Terletak di area sanitasi/belakang',
            'kata_kunci'        => 'ruang cuci troli, tempat bersihkan troli, sanitasi troli, cuci brankar, kebersihan alat angkut, area basah, pencucian kereta dorong, sterilisasi troli makan',
            'kategori'          => 'Fasilitas Penunjang RSJ Tampan',
            'fungsi_ruangan'    => 'fasilitas khusus untuk membersihkan dan mensanitasi troli medis maupun troli makanan, guna mencegah infeksi silang dan menjaga standar kebersihan peralatan operasional rumah sakit.',
        ]);
        $this->tambahFoto($ruangan->id, ['cuci-troli-1.jpg', 'cuci-troli-2.jpg', 'cuci-troli-3.jpg']);

        // 128. Ruang Panel Listrik 
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Panel Listrik',
            'nama_gedung'       => 'Gedung Terpisah (Area Teknik)',
            'penanggung_jawab'  => 'Irsyad Agus, Amd',
            'jabatan_struktural'=> 'Kepala IPSRS',
            'navigasi'          => 'Terletak di area teknik (Dilarang masuk tanpa izin)',
            'kata_kunci' => 'panel listrik utama rsj, ruang distribusi listrik gedung, gardu listrik rumah sakit, pusat kontrol daya listrik, panel induk tegangan tinggi, mcb utama rumah sakit, jalur listrik utama gedung, ruang berbahaya listrik tinggi, kontrol aliran listrik rsj, sistem kelistrikan utama, box panel listrik besar, ruang teknis listrik inti, instalasi listrik utama rs, ruang tegangan listrik tinggi, area panel listrik dilarang masuk',
            'kategori'          => 'Fasilitas Penunjang RSJ Tampan',
            'fungsi_ruangan'    => 'pusat kendali dan distribusi tenaga listrik untuk seluruh area rumah sakit, berisi panel-panel utama yang mengatur aliran daya, guna menjamin kestabilan pasokan listrik operasional.',
        ]);
        $this->tambahFoto($ruangan->id, ['panel-listrik-1.jpg', 'panel-listrik-2.jpg', 'panel-listrik-3.jpg', 'panel-listrik-4.jpg', 'panel-listrik-5.jpg', 'panel-listrik-6.jpg']);

        // 129. Instalasi Gizi 
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Instalasi Gizi (Dapur Utama)',
            'nama_gedung'       => 'Gedung Instalasi Gizi',
            'penanggung_jawab'  => 'Desni, DCN',
            'jabatan_struktural'=> 'Kepala Instalasi Gizi',
            'navigasi'          => 'Terletak di Gedung Instalasi Gizi (Area Belakang)',
            'kata_kunci' => 'dapur rumah sakit, masak makanan pasien, produksi makanan rs, distribusi makanan ke bangsal, dapur gizi rs, penyediaan makan pasien, tempat masak pasien, instalasi dapur rs, pengolahan makanan medis, menu pasien rumah sakit, kirim makanan pasien, unit dapur rs, tempat masak diet pasien, penyajian makanan pasien, logistik makanan rs',
            'kategori'          => 'Fasilitas Penunjang RSJ Tampan',
            'fungsi_ruangan'    => 'unit pelayanan gizi untuk perencanaan, pengolahan, dan distribusi makanan pasien sesuai kebutuhan nutrisi, guna mendukung pemenuhan gizi seimbang, proses penyembuhan, dan peningkatan derajat kesehatan di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['instalasi-gizi-1.jpg', 'instalasi-gizi-2.jpg', 'instalasi-gizi-3.jpg']);

        // 130. Gudang Farmasi/Logistik
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Gudang Logistik Farmasi',
            'nama_gedung'       => 'Gedung Terpisah (Gudang)',
            'penanggung_jawab'  => 'BETTI KRISTINA, S.Farm,Apt',
            'jabatan_struktural'=> 'Kepala Instalasi Farmasi',
            'navigasi'          => 'Terletak di area pergudangan/belakang, depan ruang instalasi Gizi',
            'kata_kunci'        => 'gudang logistik obat, penyimpanan perbekalan farmasi, tempat barang farmasi besar, gudang distribusi obat, stok logistik farmasi, penyimpanan alat medis, gudang suplai rumah sakit, tempat simpan barang farmasi, pusat logistik obat, gudang perbekalan medis, penyimpanan bahan farmasi, gudang inventaris farmasi, tempat distribusi barang medis, gudang stok farmasi terpisah, area simpan logistik',
            'kategori'          => 'Fasilitas Penunjang RSJ Tampan',
            'fungsi_ruangan'    => 'ruang penyimpanan obat dan perbekalan farmasi atau logistik pendukung, guna menata stok, arsip logistik, dan pengelolaan inventaris sesuai standar kefarmasian rumah sakit.',
        ]);
        $this->tambahFoto($ruangan->id, ['gudang-farmasi-lama-1.jpg', 'gudang-farmasi-lama-2.jpg', 'gudang-farmasi-lama-3.jpg']);

        // 131. Laundry (Instalasi Linen)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Laundry (Instalasi Linen)',
            'nama_gedung'       => 'Gedung Terpisah (Area Penunjang)',
            'penanggung_jawab'  => 'Heldy Netty Nillawati Purba',
            'jabatan_struktural'=> 'Kepala Unit Laundry',
            'navigasi'          => 'Terletak di gedung terpisah bagian belakang (Area Penunjang Non-Medis)',
            'kata_kunci' => 'laundry rs, instalasi linen rs, tempat cuci sprei rs, pencucian linen pasien, unit laundry rumah sakit, cuci baju pasien rs, pengelolaan linen bersih, sterilisasi kain rs, pengeringan linen rs, setrika linen rs, distribusi linen bersih, binatu rumah sakit, ruang laundry belakang, layanan linen rsj, unit pencucian kain rs',
            'kategori'          => 'Fasilitas Penunjang RSJ Tampan',
            'fungsi_ruangan'    => 'unit pelayanan penunjang untuk pencucian, pengeringan, dan pengelolaan linen serta pakaian rumah sakit, guna menjaga kebersihan, kenyamanan, dan pencegahan infeksi di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['laundry-1.jpg', 'laundry-2.jpg']);

        // 132. Ruang Rawat Inap Non Akut Indragiri
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Rawat Inap Indragiri (Non Akut)',
            'nama_gedung'       => 'Ruang Rawat Inap Non Akut Indragiri',
            'penanggung_jawab'  => 'Ns. Rahmawati, S. Kep',
            'jabatan_struktural'=> 'Kepala Ruangan Indragiri',
            'navigasi'          => 'Terletak di komplek ruang rawat inap (Wisma Indragiri)',
            'kata_kunci' => 'rawat inap indragiri, bangsal indragiri, ruang pasien indragiri, kamar pasien indragiri, wisma indragiri, tempat pasien dirawat indragiri, inap pasien indragiri, ruang perawatan jiwa indragiri, bangsal non akut indragiri, pasien tinggal indragiri, ruang opname indragiri, kamar rawat inap indragiri, perawatan lanjutan indragiri, ruang pasien stabil indragiri, lokasi rawat inap indragiri',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'ruang perawatan bagi pasien gangguan jiwa dalam kondisi stabil atau tidak akut, guna menjalani perawatan lanjutan, rehabilitasi, dan pemulihan fungsi psikososial secara bertahap dan berkesinambungan.',
        ]);
        $this->tambahFoto($ruangan->id, ['indragiri-1.jpg', 'indragiri-2.jpg', 'indragiri-3.jpg', 'indragiri-4.jpg', 'indragiri-5.jpg', 'indragiri-6.jpg', 'indragiri-7.jpg']);

        // 133. Ruang Rawat Inap Non Akut Siak
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Rawat Inap Siak (Non Akut)',
            'nama_gedung'       => 'Ruang Rawat Inap Non Akut Siak',
            'penanggung_jawab'  => 'dr. Indra Yenni',
            'jabatan_struktural'=> 'Kepala Ruangan Siak',
            'navigasi'          => 'Terletak di komplek ruang rawat inap (Wisma Siak)',
            'kata_kunci' => 'rawat inap siak, bangsal siak, ruang pasien siak, kamar pasien siak, wisma siak, tempat pasien dirawat siak, inap pasien siak, ruang perawatan jiwa siak, bangsal non akut siak, pasien tinggal siak, ruang opname siak, kamar rawat inap siak, perawatan lanjutan siak, ruang pasien stabil siak, lokasi rawat inap siak',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'ruang perawatan bagi pasien gangguan jiwa dalam kondisi stabil atau tidak akut, guna menjalani perawatan lanjutan, rehabilitasi, dan pemulihan fungsi psikososial secara bertahap dan berkesinambungan.',
        ]);
        $this->tambahFoto($ruangan->id, ['siak-1.jpg', 'siak-2.jpg', 'siak-3.jpg']);

        // 134. Ruang Rawat Inap Non Akut Kuantan
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Rawat Inap Kuantan (Non Akut)',
            'nama_gedung'       => 'Gedung Rawat Inap (Kuantan)',
            'penanggung_jawab'  => 'dr. Indra Yenni',
            'jabatan_struktural'=> 'Kepala Ruangan Kuantan',
            'navigasi'          => 'Terletak di komplek ruang rawat inap (Wisma Kuantan)',
            'kata_kunci' => 'rawat inap kuantan, bangsal kuantan, ruang pasien kuantan, kamar pasien kuantan, wisma kuantan, tempat pasien dirawat kuantan, inap pasien kuantan, ruang perawatan jiwa kuantan, bangsal non akut kuantan, pasien tinggal kuantan, ruang opname kuantan, kamar rawat inap kuantan, perawatan lanjutan kuantan, ruang pasien stabil kuantan, lokasi rawat inap kuantan',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'ruang perawatan bagi pasien gangguan jiwa dalam kondisi stabil atau tidak akut, guna menjalani perawatan lanjutan, rehabilitasi, dan pemulihan fungsi psikososial secara bertahap dan berkesinambungan.',
        ]);
        $this->tambahFoto($ruangan->id, ['kuantan-1.jpg', 'kuantan-2.jpg']);

        // 135. Gedung Poli Klinik (Pusat Layanan Rawat Jalan)
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Gedung Poli Klinik (Rawat Jalan)',
            'nama_gedung'       => 'Gedung Poli Klinik',
            'penanggung_jawab'  => 'dr. Nuryasmi',
            'jabatan_struktural'=> 'Kepala Bidang Pelayanan Medik',
            'navigasi'          => 'Gedung utama di bagian depan kawasan RSJ Tampan',
            'kata_kunci' => 'gedung poli klinik, poliklinik rsj, rawat jalan rs, tempat berobat jalan, pendaftaran pasien poli, periksa dokter poli, gedung utama rsj, layanan poli lt1, pusat layanan rawat jalan, klinik rsj tampan, tempat kontrol pasien, daftar berobat, gedung depan rs, poli spesialis rs, layanan pasien jalan, gedung utama',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'Gedung pusat pelayanan rawat jalan yang mencakup berbagai klinik spesialis, pendaftaran, farmasi, dan administrasi layanan kesehatan di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['poli-depan-0.jpeg', 'poli-depan-1.jpeg', 'poli-depan-2.jpeg', 'poli-depan-3.jpeg', 'poli-depan-4.jpeg', 'poli-depan-5.jpeg', 'poli-depan-6.jpg','poli-depan-7.jpg','poli-depan-8.jpg','poli-depan-9.jpg', 'poli-depan-10.jpg']);

        // 136. Kamar Jenazah (Pemulasaraan Jenazah) 
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Kamar Jenazah',
            'nama_gedung'       => 'Gedung Terpisah (Area Pemulasaraan)',
            'penanggung_jawab'  => 'Kepala Instalasi Pemulasaraan Jenazah',
            'jabatan_struktural'=> 'Kepala Instalasi Pemulasaraan',
            'navigasi'          => 'Terletak di area belakang, akses melalui jalur samping gedung utama',
            'kata_kunci' => 'kamar jenazah, ruang jenazah rs, pemulasaraan jenazah, ruang pemulasaraan, tempat jenazah rumah sakit, lokasi jenazah, ruang duka rs, pengurusan jenazah, layanan jenazah rs, penanganan jenazah pasien, tempat simpan jenazah, instalasi jenazah, ruang mayat rs, kamar mayat, jenazah pasien, lokasi orang meninggal rs, tempat ambil jenazah, fasilitas jenazah rs, alur jenazah rumah sakit, area pemulasaraan',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'ruang pelayanan untuk penanganan, perawatan sementara, dan penyimpanan jenazah pasien, guna menjaga kehormatan, kebersihan, serta memenuhi ketentuan medis, etika, dan keagamaan di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['kamar-jenazah-1.jpg', 'kamar-jenazah-2.jpg', 'kamar-jenazah-3.jpg']);

         // 137. Ruang Rawat Inap Non Akut Rokan
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Ruang Rawat Inap Rokan (Non Akut)',
            'nama_gedung'       => 'Ruang Rawat Inap Non Akut Rokan',
            'penanggung_jawab'  => 'dr. Indra Yenni',
            'jabatan_struktural'=> 'Kepala Ruangan Siak',
            'navigasi'          => 'Terletak di komplek ruang rawat inap (Wisma Rokan)',
            'kata_kunci' => 'rawat inap rokan, bangsal rokan, ruang pasien rokan, kamar pasien rokan, wisma rokan, tempat pasien dirawat rokan, inap pasien rokan, ruang perawatan jiwa rokan, bangsal non akut rokan, pasien tinggal rokan, ruang opname rokan, kamar rawat inap rokan, perawatan lanjutan rokan, ruang pasien stabil rokan, lokasi rawat inap rokan',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'ruang perawatan bagi pasien gangguan jiwa dalam kondisi stabil atau tidak akut, guna menjalani perawatan lanjutan, rehabilitasi, dan pemulihan fungsi psikososial secara bertahap dan berkesinambungan.',
        ]);
        $this->tambahFoto($ruangan->id, ['rokan-1.jpg', 'rokan-2.jpg']);

        // 138. Ruang Rawat Jiwa Fisik
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Rawat Jiwa Fisik',
            'nama_gedung'       => 'Ruang Rawat Jiwa Fisik',
            'penanggung_jawab'  => 'dr. Indra Yenni',
            'jabatan_struktural'=> 'Kepala Rawat Jiwa Fisik',
            'navigasi'          => 'Lurus dari jalan antara IGD dan Gedung Poli Klinik sebelum pembelokan sebelum Dojo Kaido',
            'kata_kunci' => 'rawat jiwa fisik, pasien komorbid, rawat gabungan jiwa fisik, bangsal medis psikiatri, pasien sakit fisik dan jiwa, perawatan fisik pasien jiwa, ruang komorbid rsj, rawat inap fisik jiwa, observasi medis pasien jiwa, penyakit organik jiwa, perawatan ganda pasien, ruang medis jiwa fisik, bangsal khusus fisik, layanan medis psikiatri',
            'kategori'          => 'Fasilitas Medis RSJ Tampan',
            'fungsi_ruangan'    => 'ruang perawatan bagi pasien dengan gangguan kesehatan fisik yang memerlukan observasi dan penanganan medis, guna mendukung pemulihan kondisi fisik serta menunjang perawatan kesehatan secara menyeluruh di rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['jiwa-fisik-1.jpg', 'jiwa-fisik-2.jpg']);

        // 139. Gudang Barang
        $ruangan = DataRuangan::create([
            'nama_ruangan'      => 'Gudang Barang',
            'nama_gedung'       => 'Gedung Terpisah',
            'penanggung_jawab'  => 'Cleaning Service',
            'jabatan_struktural'=> 'Kepala Cleaning Service',
            'navigasi'          => 'Terletak di gedung terpisah',
            'kata_kunci'        => 'gudang barang, tempat penyimpanan barang, ruang penyimpanan barang, gudang logistik, gudang barang non medis, tempat penyimpanan logistik, ruang penyimpanan logistik, gudang inventaris barang, fasilitas penyimpanan barang, area penyimpanan barang, tempat penampungan barang, gudang persediaan umum, ruang stok barang non medis, depo penyimpanan barang, gudang perlengkapan umum, pusat penyimpanan barang, gudang manajemen logistik, area logistik umum, ruang penyimpanan aset, fasilitas logistik barang',
            'kategori'          => 'Fasilitas Umum RSJ Tampan',
            'fungsi_ruangan'    => 'Tempat penyimpanan logistik, kebersihan, dan barang inventaris rumah sakit jiwa.',
        ]);
        $this->tambahFoto($ruangan->id, ['gudang-barang-1.jpg', 'gudang-barang-2.jpg']);
    }

    // Helper Tambah Foto
    private function tambahFoto($ruanganId, $photos) {
        foreach ($photos as $path) {
            FotoRuangan::create([
                'data_ruangan_id' => $ruanganId,
                'path_foto' => $path,
                'caption' => 'Tampilan Ruangan'
            ]);
        }
    }
}