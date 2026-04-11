<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            'Redaksi',
            'Ketentuan Penggunaan',
            'Kebijakan Privasi',
            'Kebijakan Cookie',
            'Pedoman Media Siber',
            'Tentang Kami',
            'Kontak Kami',
            'Disclaimer',
            'Karir',
            'Peta Situs',
        ];

        foreach ($pages as $page) {
            Page::create([
                'title' => $page,
                'slug' => Str::slug($page),
                'content' => <<<EOD
<p>Tirto.id menerjemahkan visi mencerahkan sebagai keharusan menyajikan berita yang jernih, mencerahkan, berwawasan, memiliki konteks, mendalam, dan faktual.</p>
<p>Di tengah arus kompetisi industri media, Tirto.id hadir sebagai air jernih, yang mengalir sekaligus mencerahkan. Filosofi itu akan menjadi wajah kami mengarungi hari-hari depan.</p>
<p>Kami mengambil air sebagai dasar filosofi sebagaimana Thales, satu dari tujuh filsuf Yunani, yang mempopulerkan “air merupakan sumber kehidupan”. Science modern membuktikan bahwa segala yang hidup di bumi butuh air. Tidak terkecuali manusia. Air menjejali separuh lebih organ kita.</p>
<p>Elemen air juga melambangkan positifisme. Sifatnya menyegarkan. Bergerak mengisi wadah kosong. Ia bahkan adaptif, membaur pada zat lain. Kira-kira begitulah ilham nama tirto.id ini.</p>
<p>Seperti air, Tirto.id ingin memiliki sifat mengalir dan menjernihkan. Tulisan-tulisannya harus mengaliri ruang-ruang baca, enak dinikmati dalam nuansa apa saja, menyegarkan, menjadi ‘nutrisi’ akal sehat dan pikiran. Karena itu tirto harus tetap menjernihkan dengan konsep jurnalisme presisinya yang dilengkapi suplemen data-data sahihnya.</p>
<p>Dengan demikian terma “mengalir dan menjernihkan” ini penting kembali dipertegas menjadi sebuah manifesto. Sebab perjalanan yang dilampaui tirto.id sebagai sebuah gatra media tidaklah mudah: diuji berbagai tantangan. Namun tirto.id terus beradaptasi, berbenah dan tidak serampangan.</p>
<p>Apalagi Tirto.id hadir di tengah tantangan disrupsi media seperti sekarang ini, ketika esensi media/pers sebagai “clearing house” mulai tercerabut dari akarnya akibat wabah media sosial (medsos). Dampaknya ketika orang-orang mulai banyak meragukan validitas data berita, sulit memilah apa itu berita fakta, terjerembab dalam kubangan miskonsepsi, isu-isu berita hoaks serta rekayasa berita, kemudian tidak memahami apa itu misinformasi dan disinformasi.</p>
<p>Persoalan ini mengemuka belakangan. Dulu, bicara media online orang akan berfokus pada tiga strategi: konten, teknologi dan distribusi. Dalam konteks distribusi inilah masalah itu muncul. Media sosial dianggap satu-satunya tempat distribusi konten berita paling efektif. Padahal ibarat dua mata pedang, belakangan berbagai riset membuktikan media sosial juga berbahaya.</p>
<p>Dampak ini diuji lewat jajak pendapat Global Reuters Institute. Hasilnya, ada perubahan pola perilaku audience yang mulai bermigrasi dari medsos ke aplikasi percakapan. Meskipun begitu, untuk kepentingan riset berita masih banyak menggunakan media sosial, namun diskusi lanjutan biasanya terjadi di aplikasi percakapakan.</p>
<p>Mereka beralasan ruang kebebasan dan privasi di aplikasi perpesanan lebih baik ketimbang media sosial. Masalah lain, di Medsos juga rawan terjadi debat tak berkesudahan sampai persekusi karena sifatnya yang terlalu terbuka. Taruh saja doxing atau menyebarkan informasi pribadi pada orang lain tanpa izin. Hal lainnya, Medsos juga dianggap rentan terhadap penyebaran hoaks dan fake.</p>
<p>Lalu apakah tirto berubah? Tidak sepenuhnya. Tapi beradaptasi, “iya”. Dari spirit misalnya, kini tidak lagi semata-mata bergulat pada nama dan romantisme sejarah semata (tentang nama besar Tirto Adhi Soerjo), namun ada visi dan ambisi tidak sederhana di dalamnya, yang perlu didefinisikan kembali sebagai sebuah industri media.</p>
<p>Satu sisi Tirto.id masih sepakat bahwa bicara media online tidak hanya soal kecepatan, tapi juga butuh keakuratan, tertib verifikasi, dan kemampuan “menjernihkan”. Walakin, lebih dari itu di saat bersamaan—bicara karya—juga ingin meletakkan target pada porsinya, menyempurnakan metodologi, membangun teknologi pelan-pelan sesuai visi misi tirto.id sebagai industri media.</p>
<p>Oleh sebab itu, ke depan tirto memantapkan langkah bergandengan tangan bersama para pembaca, bersama-sama menyigi berbagai kegelisahan akibat disrupsi media online yang semakin hari semakin mengkhawatirkan ini.</p>
<p>Tapi meski demikian, Tirto.id tetap menjunjung tinggi independensi, berdiri di atas dan untuk semua golongan, serta non-partisan. Tirto.id juga tetap tunduk pada kode etik dari <a href="">Dewan Pers Indonesia</a>.</p>
<p>Salam</p>

<p>Tim Redaksi Tirto.id</p>
EOD
            ]);
        }
    }
}
