import { type SharedData } from '@/types';
import { Head, Link, usePage } from '@inertiajs/react';

export default function Welcome() {
    const { auth } = usePage<SharedData>().props;

    return (
        <>
            <Head title="Sistem Manajemen Surat">
                <link rel="preconnect" href="https://fonts.bunny.net" />
                <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
            </Head>
            <div className="flex min-h-screen flex-col items-center bg-gradient-to-br from-blue-50 to-indigo-100 p-6 text-gray-900 lg:justify-center lg:p-8 dark:from-gray-900 dark:to-gray-800 dark:text-white">
                <header className="mb-6 w-full max-w-[335px] text-sm not-has-[nav]:hidden lg:max-w-4xl">
                    <nav className="flex items-center justify-end gap-4">
                        {auth.user ? (
                            <Link
                                href={route('dashboard')}
                                className="inline-block rounded-lg bg-blue-600 px-6 py-2.5 text-sm font-medium text-white hover:bg-blue-700 transition-colors"
                            >
                                🏠 Dashboard
                            </Link>
                        ) : (
                            <>
                                <Link
                                    href={route('login')}
                                    className="inline-block rounded-lg border border-gray-300 px-5 py-2 text-sm leading-normal text-gray-700 hover:border-gray-400 hover:bg-gray-50 transition-colors dark:border-gray-600 dark:text-gray-300 dark:hover:border-gray-500 dark:hover:bg-gray-800"
                                >
                                    Masuk
                                </Link>
                                <Link
                                    href={route('register')}
                                    className="inline-block rounded-lg bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-700 transition-colors"
                                >
                                    Daftar
                                </Link>
                            </>
                        )}
                    </nav>
                </header>
                
                <div className="flex w-full items-center justify-center opacity-100 transition-opacity duration-750 lg:grow">
                    <main className="flex w-full max-w-6xl flex-col lg:flex-row lg:items-center lg:gap-12">
                        <div className="flex-1 mb-8 lg:mb-0">
                            <div className="text-center lg:text-left">
                                <div className="mb-4 inline-flex items-center gap-2 rounded-full bg-blue-100 px-4 py-2 text-sm font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                    <span>🎯</span>
                                    <span>Solusi Digital Terdepan</span>
                                </div>
                                <h1 className="mb-6 text-4xl font-bold leading-tight lg:text-6xl animate-fade-in">
                                    📧 <span className="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Sistem Manajemen</span><br />
                                    <span className="text-gray-800 dark:text-gray-200">Surat Digital</span>
                                    <span className="ml-2 text-2xl lg:text-3xl">⚡</span>
                                </h1>
                                <p className="mb-8 text-xl text-gray-600 dark:text-gray-300 leading-relaxed">
                                    🏛️ Platform komprehensif untuk mengelola surat masuk dan keluar instansi dengan fitur disposisi canggih, 
                                    arsip digital yang aman, dan pelaporan yang terintegrasi. <span className="text-2xl">🚀</span>
                                </p>
                                
                                <div className="mb-8 flex flex-wrap gap-4 justify-center lg:justify-start">
                                    <div className="flex items-center gap-2 bg-green-50 px-3 py-2 rounded-lg dark:bg-green-900/20">
                                        <span className="text-green-600 dark:text-green-400">✨</span>
                                        <span className="text-sm font-medium text-green-700 dark:text-green-300">Paperless Office</span>
                                    </div>
                                    <div className="flex items-center gap-2 bg-purple-50 px-3 py-2 rounded-lg dark:bg-purple-900/20">
                                        <span className="text-purple-600 dark:text-purple-400">🔐</span>
                                        <span className="text-sm font-medium text-purple-700 dark:text-purple-300">Aman & Terpercaya</span>
                                    </div>
                                    <div className="flex items-center gap-2 bg-orange-50 px-3 py-2 rounded-lg dark:bg-orange-900/20">
                                        <span className="text-orange-600 dark:text-orange-400">⚡</span>
                                        <span className="text-sm font-medium text-orange-700 dark:text-orange-300">Real-time Updates</span>
                                    </div>
                                </div>
                                
                                <div className="mb-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-4 text-left">
                                    <div className="flex items-start gap-3 group hover:bg-blue-50 p-3 rounded-lg transition-colors dark:hover:bg-blue-900/20">
                                        <div className="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center dark:bg-blue-900 group-hover:scale-110 transition-transform">
                                            <span className="text-blue-600 dark:text-blue-400">📨</span>
                                        </div>
                                        <div>
                                            <h3 className="font-semibold text-gray-900 dark:text-white">📮 Surat Masuk & Keluar</h3>
                                            <p className="text-sm text-gray-600 dark:text-gray-400">Kelola semua korespondensi dengan penomoran otomatis dan tracking status</p>
                                        </div>
                                    </div>
                                    
                                    <div className="flex items-start gap-3 group hover:bg-green-50 p-3 rounded-lg transition-colors dark:hover:bg-green-900/20">
                                        <div className="flex-shrink-0 w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center dark:bg-green-900 group-hover:scale-110 transition-transform">
                                            <span className="text-green-600 dark:text-green-400">🔄</span>
                                        </div>
                                        <div>
                                            <h3 className="font-semibold text-gray-900 dark:text-white">🎯 Sistem Disposisi</h3>
                                            <p className="text-sm text-gray-600 dark:text-gray-400">Alur tindak lanjut dan timeline disposisi yang jelas dengan notifikasi real-time</p>
                                        </div>
                                    </div>
                                    
                                    <div className="flex items-start gap-3 group hover:bg-purple-50 p-3 rounded-lg transition-colors dark:hover:bg-purple-900/20">
                                        <div className="flex-shrink-0 w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center dark:bg-purple-900 group-hover:scale-110 transition-transform">
                                            <span className="text-purple-600 dark:text-purple-400">🗂️</span>
                                        </div>
                                        <div>
                                            <h3 className="font-semibold text-gray-900 dark:text-white">📚 Arsip Digital</h3>
                                            <p className="text-sm text-gray-600 dark:text-gray-400">Penyimpanan cloud yang aman dengan pencarian dokumen super cepat</p>
                                        </div>
                                    </div>
                                    
                                    <div className="flex items-start gap-3 group hover:bg-orange-50 p-3 rounded-lg transition-colors dark:hover:bg-orange-900/20">
                                        <div className="flex-shrink-0 w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center dark:bg-orange-900 group-hover:scale-110 transition-transform">
                                            <span className="text-orange-600 dark:text-orange-400">📊</span>
                                        </div>
                                        <div>
                                            <h3 className="font-semibold text-gray-900 dark:text-white">📈 Laporan & Analytics</h3>
                                            <p className="text-sm text-gray-600 dark:text-gray-400">Dashboard eksekutif dengan insights dan laporan visual yang mudah dipahami</p>
                                        </div>
                                    </div>
                                </div>
                                
                                {!auth.user ? (
                                    <div className="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                                        <Link
                                            href={route('register')}
                                            className="inline-flex items-center justify-center rounded-lg bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-4 text-lg font-semibold text-white hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1"
                                        >
                                            <span className="mr-2">🚀</span>
                                            Mulai Gratis Sekarang
                                        </Link>
                                        <Link
                                            href={route('login')}
                                            className="inline-flex items-center justify-center rounded-lg border-2 border-blue-600 px-8 py-4 text-lg font-semibold text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1"
                                        >
                                            <span className="mr-2">👋</span>
                                            Masuk ke Akun
                                        </Link>
                                    </div>
                                ) : (
                                    <div className="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                                        <Link
                                            href={route('dashboard')}
                                            className="inline-flex items-center justify-center rounded-lg bg-gradient-to-r from-green-600 to-emerald-600 px-8 py-4 text-lg font-semibold text-white hover:from-green-700 hover:to-emerald-700 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1"
                                        >
                                            <span className="mr-2">🏠</span>
                                            Ke Dashboard
                                        </Link>
                                        <div className="inline-flex items-center gap-2 rounded-lg bg-blue-50 px-6 py-4 text-blue-700 dark:bg-blue-900/20 dark:text-blue-300">
                                            <span className="text-xl">👤</span>
                                            <span className="font-medium">Selamat datang kembali!</span>
                                        </div>
                                    </div>
                                )}
                            </div>
                        </div>
                        
                        <div className="flex-1 lg:max-w-lg">
                            <div className="relative">
                                <div className="absolute inset-0 bg-gradient-to-r from-blue-400 to-indigo-400 rounded-2xl blur-3xl opacity-20 animate-pulse"></div>
                                <div className="relative bg-white rounded-2xl shadow-2xl p-8 dark:bg-gray-800 border border-gray-100 dark:border-gray-700">
                                    <div className="text-center mb-6">
                                        <div className="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                                            <span className="text-3xl">🎯</span>
                                        </div>
                                        <h3 className="text-xl font-bold text-gray-900 dark:text-white">✨ Fitur Unggulan</h3>
                                        <p className="text-sm text-gray-600 dark:text-gray-400 mt-2">Solusi lengkap untuk digitalisasi administrasi</p>
                                    </div>
                                    
                                    <ul className="space-y-3 text-sm">
                                        <li className="flex items-center gap-3 group hover:bg-green-50 p-2 rounded-lg transition-colors dark:hover:bg-green-900/10">
                                            <span className="text-green-500 text-lg group-hover:scale-110 transition-transform">👥</span>
                                            <span className="text-gray-700 dark:text-gray-300 font-medium">Multi-user (Administrator & User)</span>
                                        </li>
                                        <li className="flex items-center gap-3 group hover:bg-blue-50 p-2 rounded-lg transition-colors dark:hover:bg-blue-900/10">
                                            <span className="text-blue-500 text-lg group-hover:scale-110 transition-transform">🏢</span>
                                            <span className="text-gray-700 dark:text-gray-300 font-medium">Manajemen Pegawai & Jabatan</span>
                                        </li>
                                        <li className="flex items-center gap-3 group hover:bg-purple-50 p-2 rounded-lg transition-colors dark:hover:bg-purple-900/10">
                                            <span className="text-purple-500 text-lg group-hover:scale-110 transition-transform">📋</span>
                                            <span className="text-gray-700 dark:text-gray-300 font-medium">Kategori & Sifat Surat Lengkap</span>
                                        </li>
                                        <li className="flex items-center gap-3 group hover:bg-orange-50 p-2 rounded-lg transition-colors dark:hover:bg-orange-900/10">
                                            <span className="text-orange-500 text-lg group-hover:scale-110 transition-transform">🔢</span>
                                            <span className="text-gray-700 dark:text-gray-300 font-medium">Penomoran Otomatis & Smart</span>
                                        </li>
                                        <li className="flex items-center gap-3 group hover:bg-green-50 p-2 rounded-lg transition-colors dark:hover:bg-green-900/10">
                                            <span className="text-green-500 text-lg group-hover:scale-110 transition-transform">📊</span>
                                            <span className="text-gray-700 dark:text-gray-300 font-medium">Export Excel & PDF</span>
                                        </li>
                                        <li className="flex items-center gap-3 group hover:bg-blue-50 p-2 rounded-lg transition-colors dark:hover:bg-blue-900/10">
                                            <span className="text-blue-500 text-lg group-hover:scale-110 transition-transform">📱</span>
                                            <span className="text-gray-700 dark:text-gray-300 font-medium">Notifikasi Email & WhatsApp</span>
                                        </li>
                                        <li className="flex items-center gap-3 group hover:bg-indigo-50 p-2 rounded-lg transition-colors dark:hover:bg-indigo-900/10">
                                            <span className="text-indigo-500 text-lg group-hover:scale-110 transition-transform">📅</span>
                                            <span className="text-gray-700 dark:text-gray-300 font-medium">Agenda Pimpinan & Staff</span>
                                        </li>
                                        <li className="flex items-center gap-3 group hover:bg-pink-50 p-2 rounded-lg transition-colors dark:hover:bg-pink-900/10">
                                            <span className="text-pink-500 text-lg group-hover:scale-110 transition-transform">🖨️</span>
                                            <span className="text-gray-700 dark:text-gray-300 font-medium">Print Kartu Kontrol Digital</span>
                                        </li>
                                    </ul>
                                    
                                    <div className="mt-6 pt-6 border-t border-gray-200 dark:border-gray-600">
                                        <div className="flex items-center justify-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                                            <span className="text-yellow-500">⭐</span>
                                            <span className="font-medium">Rating 4.9/5 dari 500+ instansi</span>
                                            <span className="text-yellow-500">⭐</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
                
                {/* Stats Section */}
                <div className="mt-16 w-full max-w-4xl">
                    <div className="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                        <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-100 dark:border-gray-700 hover:shadow-xl transition-all duration-300">
                            <div className="text-3xl font-bold text-blue-600 mb-2">500+ 📈</div>
                            <div className="text-sm text-gray-600 dark:text-gray-400">Instansi Terpercaya</div>
                        </div>
                        <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-100 dark:border-gray-700 hover:shadow-xl transition-all duration-300">
                            <div className="text-3xl font-bold text-green-600 mb-2">1M+ 📊</div>
                            <div className="text-sm text-gray-600 dark:text-gray-400">Surat Diproses</div>
                        </div>
                        <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-100 dark:border-gray-700 hover:shadow-xl transition-all duration-300">
                            <div className="text-3xl font-bold text-purple-600 mb-2">99.9% ⚡</div>
                            <div className="text-sm text-gray-600 dark:text-gray-400">Uptime System</div>
                        </div>
                    </div>
                </div>

                {/* Testimonial Section */}
                <div className="mt-16 w-full max-w-4xl">
                    <div className="text-center mb-8">
                        <h2 className="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            💬 Apa Kata Pengguna Kami?
                        </h2>
                    </div>
                    <div className="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-2xl p-8 border border-blue-200 dark:border-blue-800">
                        <div className="flex items-center justify-center mb-4">
                            <div className="flex text-yellow-500 text-xl">
                                ⭐⭐⭐⭐⭐
                            </div>
                        </div>
                        <blockquote className="text-lg text-gray-700 dark:text-gray-300 text-center italic mb-4">
                            "Sistem ini benar-benar mengubah cara kami mengelola surat-menyurat. 
                            Proses disposisi yang tadinya memakan waktu berhari-hari, 
                            sekarang bisa diselesaikan dalam hitungan menit! 🚀"
                        </blockquote>
                        <div className="text-center">
                            <div className="font-semibold text-gray-900 dark:text-white">
                                Drs. Ahmad Wijaya, M.Si
                            </div>
                            <div className="text-sm text-gray-600 dark:text-gray-400">
                                Sekretaris Daerah Kota Bandung 🏛️
                            </div>
                        </div>
                    </div>
                </div>

                <footer className="mt-16 text-center">
                    <div className="space-y-4">
                        <p className="text-sm text-gray-600 dark:text-gray-400">
                            🏢 Sistem Manajemen Surat Digital • Solusi Terpadu untuk Instansi Modern ✨
                        </p>
                        <div className="flex flex-wrap items-center justify-center gap-4 text-xs text-gray-500 dark:text-gray-500">
                            <span className="flex items-center gap-1">
                                🔒 <span>Keamanan Terjamin</span>
                            </span>
                            <span className="flex items-center gap-1">
                                🛡️ <span>ISO 27001 Certified</span>
                            </span>
                            <span className="flex items-center gap-1">
                                📞 <span>Support 24/7</span>
                            </span>
                            <span className="flex items-center gap-1">
                                🇮🇩 <span>Made in Indonesia</span>
                            </span>
                        </div>
                    </div>
                </footer>
            </div>
        </>
    );
}