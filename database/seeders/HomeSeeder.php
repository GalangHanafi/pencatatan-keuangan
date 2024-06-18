<?php

namespace Database\Seeders;

use App\Models\Benefit;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feature::create(
            [
                'name' => 'Pencatatan Pengeluaran dan Pemasukan.',
                'description' => 'Pantau setiap pengeluaran Anda tanpa ribet',
                'icon' => 'bx bx-receipt',
            ],
            [
                'name' => 'Laporan Keuangan.',
                'description' => 'Lihat laporan keuangan harian, mingguan, atau bulanan dengan visual yang mudah dipahami',
                'icon' => 'bx bx-atom',
            ],
        );

        Benefit::create(
            ['benefit' => 'Mudah Digunakan: Antarmuka yang user-friendly membuat siapa saja bisa menggunakan KantongKu tanpa kesulitan.',],
            ['benefit' => 'Akses Kapan Saja, Di Mana Saja: Aplikasi ini dapat diakses menggunakan browser, sehingga Anda bisa mengakses keuangan Anda di mana saja..'],
            ['benefit' => 'Gratis: Nikmati semua fitur dasar tanpa biaya tambahan. Upgrade ke Premium untuk fitur lebih lanjut.'],
        );

        Faq::create(
            [
                'question' => 'Apa itu KantongKu?',
                'answer' => 'KantongKu adalah aplikasi berbasis web yang memudahkan Anda untuk memantau dan mengelola keuangan Anda. Mulai dari pengeluaran, pemasukan, dan laporan keuangan.'
            ],
            [
                'question' => 'Bagaimana cara mendaftar di KantongKu?',
                'answer' => 'Anda bisa mendaftar dengan mengunduh aplikasi KantongKu dari Google Play Store atau App Store, kemudian mengikuti langkah-langkah pendaftaran yang tersedia di aplikasi.'
            ],
            [
                'question' => 'Apakah KantongKu gratis?',
                'answer' => 'Ya, KantongKu menawarkan fitur dasar secara gratis.'
            ],
            [
                'question' => 'Bagaimana cara mencatat pengeluaran dan pemasukan? ',
                'answer' => ' Setelah masuk ke dalam aplikasi, Anda bisa menambahkan transaksi baru dengan menekan tombol "Tambah Transaksi". Isi detail transaksi seperti jumlah, kategori, dan tanggal, lalu simpan.'
            ],
            [
                'question' => 'Apakah data saya aman di KantongKu?',
                'answer' => ' Kami menggunakan enkripsi tingkat tinggi untuk melindungi data Anda. Privasi dan keamanan data pengguna adalah prioritas utama kami.'
            ],
        );
    }
}
