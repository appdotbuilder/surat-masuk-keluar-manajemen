import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/react';

interface Stats {
    incoming_mails_today: number;
    outgoing_mails_today: number;
    pending_dispositions: number;
    total_employees: number;
    recent_incoming_mails: Array<{
        id: number;
        mail_number: string;
        sender: string;
        subject: string;
        received_date: string;
        category: { name: string; color: string };
        type: { name: string; priority: string };
    }>;
    recent_outgoing_mails: Array<{
        id: number;
        mail_number: string;
        recipient: string;
        subject: string;
        mail_date: string;
        status: string;
        category: { name: string; color: string };
    }>;
    urgent_dispositions: Array<{
        id: number;
        type: string;
        instruction: string;
        due_date: string;
        incomingMail: { mail_number: string; subject: string };
        toEmployee: { name: string };
    }>;
    announcements: Array<{
        id: number;
        title: string;
        content: string;
        type: string;
        priority: string;
        published_at: string;
    }>;
}

interface Props {
    stats: Stats;
    [key: string]: unknown;
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

export default function Dashboard({ stats }: Props) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard - Sistem Manajemen Surat" />
            
            <div className="space-y-6">
                {/* Welcome Section */}
                <div className="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl p-6 text-white">
                    <div className="flex items-center justify-between">
                        <div>
                            <h1 className="text-2xl font-bold mb-2">📧 Sistem Manajemen Surat</h1>
                            <p className="text-blue-100">Selamat datang di dashboard manajemen surat digital</p>
                        </div>
                        <div className="hidden md:block text-6xl opacity-20">
                            📊
                        </div>
                    </div>
                </div>

                {/* Stats Cards */}
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div className="bg-white rounded-lg shadow-sm border p-6 dark:bg-gray-800 dark:border-gray-700">
                        <div className="flex items-center justify-between">
                            <div>
                                <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Surat Masuk Hari Ini</p>
                                <p className="text-2xl font-bold text-gray-900 dark:text-white">{stats.incoming_mails_today}</p>
                            </div>
                            <div className="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center dark:bg-blue-900">
                                <span className="text-2xl">📨</span>
                            </div>
                        </div>
                    </div>

                    <div className="bg-white rounded-lg shadow-sm border p-6 dark:bg-gray-800 dark:border-gray-700">
                        <div className="flex items-center justify-between">
                            <div>
                                <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Surat Keluar Hari Ini</p>
                                <p className="text-2xl font-bold text-gray-900 dark:text-white">{stats.outgoing_mails_today}</p>
                            </div>
                            <div className="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center dark:bg-green-900">
                                <span className="text-2xl">📤</span>
                            </div>
                        </div>
                    </div>

                    <div className="bg-white rounded-lg shadow-sm border p-6 dark:bg-gray-800 dark:border-gray-700">
                        <div className="flex items-center justify-between">
                            <div>
                                <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Disposisi Pending</p>
                                <p className="text-2xl font-bold text-gray-900 dark:text-white">{stats.pending_dispositions}</p>
                            </div>
                            <div className="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center dark:bg-orange-900">
                                <span className="text-2xl">🔄</span>
                            </div>
                        </div>
                    </div>

                    <div className="bg-white rounded-lg shadow-sm border p-6 dark:bg-gray-800 dark:border-gray-700">
                        <div className="flex items-center justify-between">
                            <div>
                                <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Total Pegawai</p>
                                <p className="text-2xl font-bold text-gray-900 dark:text-white">{stats.total_employees}</p>
                            </div>
                            <div className="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center dark:bg-purple-900">
                                <span className="text-2xl">👥</span>
                            </div>
                        </div>
                    </div>
                </div>

                {/* Main Content Grid */}
                <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    {/* Recent Incoming Mails */}
                    <div className="bg-white rounded-lg shadow-sm border dark:bg-gray-800 dark:border-gray-700">
                        <div className="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h2 className="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                                📨 Surat Masuk Terbaru
                            </h2>
                        </div>
                        <div className="p-6">
                            {stats.recent_incoming_mails.length > 0 ? (
                                <div className="space-y-4">
                                    {stats.recent_incoming_mails.map((mail) => (
                                        <div key={mail.id} className="flex items-center gap-4 p-3 rounded-lg border border-gray-200 dark:border-gray-700">
                                            <div className="w-2 h-2 rounded-full" style={{ backgroundColor: mail.category.color }}></div>
                                            <div className="flex-1 min-w-0">
                                                <p className="text-sm font-medium text-gray-900 dark:text-white truncate">
                                                    {mail.subject}
                                                </p>
                                                <p className="text-xs text-gray-500 dark:text-gray-400">
                                                    {mail.sender} • {mail.mail_number}
                                                </p>
                                            </div>
                                            <div className="text-xs text-gray-500 dark:text-gray-400">
                                                {new Date(mail.received_date).toLocaleDateString('id-ID')}
                                            </div>
                                        </div>
                                    ))}
                                </div>
                            ) : (
                                <div className="text-center py-8 text-gray-500 dark:text-gray-400">
                                    <span className="text-4xl mb-4 block">📭</span>
                                    <p>Belum ada surat masuk terbaru</p>
                                </div>
                            )}
                        </div>
                    </div>

                    {/* Recent Outgoing Mails */}
                    <div className="bg-white rounded-lg shadow-sm border dark:bg-gray-800 dark:border-gray-700">
                        <div className="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h2 className="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                                📤 Surat Keluar Terbaru
                            </h2>
                        </div>
                        <div className="p-6">
                            {stats.recent_outgoing_mails.length > 0 ? (
                                <div className="space-y-4">
                                    {stats.recent_outgoing_mails.map((mail) => (
                                        <div key={mail.id} className="flex items-center gap-4 p-3 rounded-lg border border-gray-200 dark:border-gray-700">
                                            <div className="w-2 h-2 rounded-full" style={{ backgroundColor: mail.category.color }}></div>
                                            <div className="flex-1 min-w-0">
                                                <p className="text-sm font-medium text-gray-900 dark:text-white truncate">
                                                    {mail.subject}
                                                </p>
                                                <p className="text-xs text-gray-500 dark:text-gray-400">
                                                    {mail.recipient} • {mail.mail_number}
                                                </p>
                                            </div>
                                            <div className="flex flex-col items-end">
                                                <span className={`text-xs px-2 py-1 rounded-full ${
                                                    mail.status === 'sent' 
                                                        ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300'
                                                        : mail.status === 'draft'
                                                        ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300'
                                                        : 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-300'
                                                }`}>
                                                    {mail.status === 'sent' ? 'Terkirim' : 
                                                     mail.status === 'draft' ? 'Draft' : 'Arsip'}
                                                </span>
                                                <div className="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                                    {new Date(mail.mail_date).toLocaleDateString('id-ID')}
                                                </div>
                                            </div>
                                        </div>
                                    ))}
                                </div>
                            ) : (
                                <div className="text-center py-8 text-gray-500 dark:text-gray-400">
                                    <span className="text-4xl mb-4 block">📭</span>
                                    <p>Belum ada surat keluar terbaru</p>
                                </div>
                            )}
                        </div>
                    </div>
                </div>

                {/* Bottom Section */}
                <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    {/* Urgent Dispositions */}
                    <div className="bg-white rounded-lg shadow-sm border dark:bg-gray-800 dark:border-gray-700">
                        <div className="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h2 className="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                                🚨 Disposisi Mendesak
                            </h2>
                        </div>
                        <div className="p-6">
                            {stats.urgent_dispositions.length > 0 ? (
                                <div className="space-y-4">
                                    {stats.urgent_dispositions.map((disposition) => (
                                        <div key={disposition.id} className="p-4 bg-red-50 border border-red-200 rounded-lg dark:bg-red-900/20 dark:border-red-800">
                                            <div className="flex items-start justify-between">
                                                <div className="flex-1 min-w-0">
                                                    <p className="text-sm font-medium text-gray-900 dark:text-white truncate">
                                                        {disposition.incomingMail.subject}
                                                    </p>
                                                    <p className="text-xs text-gray-600 dark:text-gray-400 mt-1">
                                                        Kepada: {disposition.toEmployee.name}
                                                    </p>
                                                    <p className="text-xs text-gray-500 dark:text-gray-400 mt-1 truncate">
                                                        {disposition.instruction}
                                                    </p>
                                                </div>
                                                <div className="text-xs text-red-600 dark:text-red-400 ml-4">
                                                    {disposition.due_date ? new Date(disposition.due_date).toLocaleDateString('id-ID') : 'Tidak ada batas'}
                                                </div>
                                            </div>
                                        </div>
                                    ))}
                                </div>
                            ) : (
                                <div className="text-center py-8 text-gray-500 dark:text-gray-400">
                                    <span className="text-4xl mb-4 block">✅</span>
                                    <p>Tidak ada disposisi mendesak</p>
                                </div>
                            )}
                        </div>
                    </div>

                    {/* Announcements */}
                    <div className="bg-white rounded-lg shadow-sm border dark:bg-gray-800 dark:border-gray-700">
                        <div className="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h2 className="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                                📢 Pengumuman
                            </h2>
                        </div>
                        <div className="p-6">
                            {stats.announcements.length > 0 ? (
                                <div className="space-y-4">
                                    {stats.announcements.map((announcement) => (
                                        <div key={announcement.id} className="p-4 border border-gray-200 rounded-lg dark:border-gray-700">
                                            <div className="flex items-start justify-between">
                                                <div className="flex-1 min-w-0">
                                                    <p className="text-sm font-medium text-gray-900 dark:text-white">
                                                        {announcement.title}
                                                    </p>
                                                    <p className="text-xs text-gray-500 dark:text-gray-400 mt-1 line-clamp-2">
                                                        {announcement.content}
                                                    </p>
                                                </div>
                                                <span className={`text-xs px-2 py-1 rounded-full ml-4 ${
                                                    announcement.priority === 'urgent' 
                                                        ? 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300'
                                                        : announcement.priority === 'high'
                                                        ? 'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-300'
                                                        : 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300'
                                                }`}>
                                                    {announcement.priority === 'urgent' ? 'Mendesak' :
                                                     announcement.priority === 'high' ? 'Penting' : 'Normal'}
                                                </span>
                                            </div>
                                            <div className="text-xs text-gray-500 dark:text-gray-400 mt-2">
                                                {new Date(announcement.published_at).toLocaleDateString('id-ID')}
                                            </div>
                                        </div>
                                    ))}
                                </div>
                            ) : (
                                <div className="text-center py-8 text-gray-500 dark:text-gray-400">
                                    <span className="text-4xl mb-4 block">📝</span>
                                    <p>Belum ada pengumuman</p>
                                </div>
                            )}
                        </div>
                    </div>
                </div>

                {/* Quick Actions */}
                <div className="bg-white rounded-lg shadow-sm border p-6 dark:bg-gray-800 dark:border-gray-700">
                    <h2 className="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                        ⚡ Aksi Cepat
                    </h2>
                    <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <Link
                            href="#"
                            className="flex items-center gap-3 p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition-colors dark:border-gray-600 dark:hover:border-blue-400 dark:hover:bg-blue-900/20"
                        >
                            <span className="text-2xl">📨</span>
                            <div>
                                <p className="font-medium text-gray-900 dark:text-white">Surat Masuk Baru</p>
                                <p className="text-sm text-gray-500 dark:text-gray-400">Daftarkan surat masuk</p>
                            </div>
                        </Link>
                        
                        <Link
                            href="#"
                            className="flex items-center gap-3 p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition-colors dark:border-gray-600 dark:hover:border-blue-400 dark:hover:bg-blue-900/20"
                        >
                            <span className="text-2xl">📤</span>
                            <div>
                                <p className="font-medium text-gray-900 dark:text-white">Surat Keluar Baru</p>
                                <p className="text-sm text-gray-500 dark:text-gray-400">Buat surat keluar</p>
                            </div>
                        </Link>
                        
                        <Link
                            href="#"
                            className="flex items-center gap-3 p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition-colors dark:border-gray-600 dark:hover:border-blue-400 dark:hover:bg-blue-900/20"
                        >
                            <span className="text-2xl">🔄</span>
                            <div>
                                <p className="font-medium text-gray-900 dark:text-white">Buat Disposisi</p>
                                <p className="text-sm text-gray-500 dark:text-gray-400">Disposisikan surat</p>
                            </div>
                        </Link>
                        
                        <Link
                            href="#"
                            className="flex items-center gap-3 p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition-colors dark:border-gray-600 dark:hover:border-blue-400 dark:hover:bg-blue-900/20"
                        >
                            <span className="text-2xl">📊</span>
                            <div>
                                <p className="font-medium text-gray-900 dark:text-white">Lihat Laporan</p>
                                <p className="text-sm text-gray-500 dark:text-gray-400">Analisis data surat</p>
                            </div>
                        </Link>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}