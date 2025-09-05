import { NavFooter } from '@/components/nav-footer';
import { NavMain } from '@/components/nav-main';
import { NavUser } from '@/components/nav-user';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/react';
import { 
    BookOpen, 
    Folder, 
    LayoutGrid,
    Mail,
    MailOpen,
    FileText,
    Archive,
    Bell,
    BarChart3,
    Building2,
    Users,
    Briefcase,
    Tag,
    Type
} from 'lucide-react';
import AppLogo from './app-logo';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
    },
    {
        title: 'Surat Masuk',
        href: '/incoming-mails',
        icon: Mail,
    },
    {
        title: 'Surat Keluar',
        href: '/outgoing-mails',
        icon: MailOpen,
    },
    {
        title: 'Disposisi',
        href: '/dispositions',
        icon: FileText,
    },
    {
        title: 'Data Pegawai',
        href: '/employees',
        icon: Users,
    },
    {
        title: 'Pengumuman',
        href: '/announcements',
        icon: Bell,
    },
    {
        title: 'Laporan',
        href: '/reports',
        icon: BarChart3,
    },
    {
        title: 'Arsip Digital',
        href: '/archives',
        icon: Archive,
    },
    {
        title: 'Pengaturan',
        href: '/organization-settings',
        icon: Building2,
        items: [
            {
                title: 'Pengaturan Jabatan',
                href: '/positions',
                icon: Briefcase,
            },
            {
                title: 'Departemen',
                href: '/departments',
                icon: Building2,
            },
            {
                title: 'Kategori Surat',
                href: '/mail-categories',
                icon: Tag,
            },
            {
                title: 'Sifat Surat',
                href: '/mail-types',
                icon: Type,
            },
        ],
    },
];

const footerNavItems: NavItem[] = [
    {
        title: 'Repository',
        href: 'https://github.com/laravel/react-starter-kit',
        icon: Folder,
    },
    {
        title: 'Documentation',
        href: 'https://laravel.com/docs/starter-kits#react',
        icon: BookOpen,
    },
];

export function AppSidebar() {
    return (
        <Sidebar collapsible="icon" variant="inset">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton size="lg" asChild>
                            <Link href="/dashboard" prefetch>
                                <AppLogo />
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>

            <SidebarContent>
                <NavMain items={mainNavItems} />
            </SidebarContent>

            <SidebarFooter>
                <NavFooter items={footerNavItems} className="mt-auto" />
                <NavUser />
            </SidebarFooter>
        </Sidebar>
    );
}
