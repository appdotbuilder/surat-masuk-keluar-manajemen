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
                                <h1 className="mb-6 text-4xl font-bold leading-tight lg:text-6xl animate-fade-in">
                                    📧 <span className="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Sistem Manajemen</span><br />
                                    <span className="text-gray-800 dark:text-gray-200">Surat Digital</span>
                                    <span className="ml-2 text-2xl lg:text-3xl">⚡</span>
                                </h1>
                                <p className="mb-8 text-xl text-gray-600 dark:text-gray-300 leading-relaxed">
                                    Platform komprehensif untuk mengelola surat masuk dan keluar instansi dengan fitur disposisi, 
                                    arsip digital, dan pelaporan yang terintegrasi. <span className="text-2xl">🚀</span>
                                </p>
                                
                                <div className="mb-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-4 text-left">
                                    <div className="flex items-start gap-3">
                                        <div className="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center dark:bg-blue-900">
                                            <span className="text-blue-600 dark:text-blue-400">📨</span>
                                        </div>
                                        <div>
                                            <h3 className="font-semibold text-gray-900 dark:text-white">Surat Masuk & Keluar</h3>
                                            <p className="text-sm text-gray-600 dark:text-gray-400">Kelola semua korespondensi dengan penomoran otomatis</p>
                                        </div>
                                    </div>
                                    
                                    <div className="flex items-start gap-3">
                                        <div className="flex-shrink-0 w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center dark:bg-green-900">
                                            <span className="text-green-600 dark:text-green-400">🔄</span>
                                        </div>
                                        <div>
                                            <h3 className="font-semibold text-gray-900 dark:text-white">Sistem Disposisi</h3>
                                            <p className="text-sm text-gray-600 dark:text-gray-400">Alur tindak lanjut dan timeline disposisi yang jelas</p>
                                        </div>
                                    </div>
                                    
                                    <div className="flex items-start gap-3">
                                        <div className="flex-shrink-0 w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center dark:bg-purple-900">
                                            <span className="text-purple-600 dark:text-purple-400">🗂️</span>
                                        </div>
                                        <div>
                                            <h3 className="font-semibold text-gray-900 dark:text-white">Arsip Digital</h3>
                                            <p className="text-sm text-gray-600 dark:text-gray-400">Penyimpanan dan pencarian dokumen yang efisien</p>
                                        </div>
                                    </div>
                                    
                                    <div className="flex items-start gap-3">
                                        <div className="flex-shrink-0 w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center dark:bg-orange-900">
                                            <span className="text-orange-600 dark:text-orange-400">📊</span>
                                        </div>
                                        <div>
                                            <h3 className="font-semibold text-gray-900 dark:text-white">Laporan & Analytics</h3>
                                            <p className="text-sm text-gray-600 dark:text-gray-400">Dashboard eksekutif dan laporan komprehensif</p>
                                        </div>
                                    </div>
                                </div>
                                
                                {!auth.user && (
                                    <div className="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                                        <Link
                                            href={route('register')}
                                            className="inline-flex items-center justify-center rounded-lg bg-blue-600 px-8 py-3 text-lg font-medium text-white hover:bg-blue-700 transition-colors shadow-lg"
                                        >
                                            🚀 Mulai Sekarang
                                        </Link>
                                        <Link
                                            href={route('login')}
                                            className="inline-flex items-center justify-center rounded-lg border-2 border-blue-600 px-8 py-3 text-lg font-medium text-blue-600 hover:bg-blue-600 hover:text-white transition-colors"
                                        >
                                            👋 Masuk
                                        </Link>
                                    </div>
                                )}
                            </div>
                        </div>
                        
                        <div className="flex-1 lg:max-w-lg">
                            <div className="relative">
                                <div className="absolute inset-0 bg-gradient-to-r from-blue-400 to-indigo-400 rounded-2xl blur-3xl opacity-20"></div>
                                <div className="relative bg-white rounded-2xl shadow-2xl p-8 dark:bg-gray-800">
                                    <div className="text-center mb-6">
                                        <div className="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 dark:bg-blue-900">
                                            <span className="text-3xl">📧</span>
                                        </div>
                                        <h3 className="text-xl font-bold text-gray-900 dark:text-white">Fitur Lengkap</h3>
                                    </div>
                                    
                                    <ul className="space-y-3 text-sm">
                                        <li className="flex items-center gap-3">
                                            <span className="text-green-500">✅</span>
                                            <span className="text-gray-700 dark:text-gray-300">Multi-user (Administrator & User)</span>
                                        </li>
                                        <li className="flex items-center gap-3">
                                            <span className="text-green-500">✅</span>
                                            <span className="text-gray-700 dark:text-gray-300">Manajemen Pegawai & Jabatan</span>
                                        </li>
                                        <li className="flex items-center gap-3">
                                            <span className="text-green-500">✅</span>
                                            <span className="text-gray-700 dark:text-gray-300">Kategori & Sifat Surat</span>
                                        </li>
                                        <li className="flex items-center gap-3">
                                            <span className="text-green-500">✅</span>
                                            <span className="text-gray-700 dark:text-gray-300">Penomoran Otomatis</span>
                                        </li>
                                        <li className="flex items-center gap-3">
                                            <span className="text-green-500">✅</span>
                                            <span className="text-gray-700 dark:text-gray-300">Export ke Excel</span>
                                        </li>
                                        <li className="flex items-center gap-3">
                                            <span className="text-green-500">✅</span>
                                            <span className="text-gray-700 dark:text-gray-300">Notifikasi Email & WhatsApp</span>
                                        </li>
                                        <li className="flex items-center gap-3">
                                            <span className="text-green-500">✅</span>
                                            <span className="text-gray-700 dark:text-gray-300">Agenda Pimpinan & Staff</span>
                                        </li>
                                        <li className="flex items-center gap-3">
                                            <span className="text-green-500">✅</span>
                                            <span className="text-gray-700 dark:text-gray-300">Print Kartu Kontrol</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
                
                <footer className="mt-12 text-center">
                    <p className="text-sm text-gray-600 dark:text-gray-400">
                        🏢 Sistem Manajemen Surat Digital • Solusi Terpadu untuk Instansi Modern ✨
                    </p>
                </footer>
            </div>
        </>
    );
}