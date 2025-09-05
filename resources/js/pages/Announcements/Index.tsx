import React from 'react';
import { Head } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';

export default function AnnouncementsIndex() {
    return (
        <AppLayout>
            <Head title="Announcements" />
            <div className="container mx-auto p-6">
                <h1 className="text-2xl font-bold mb-4">📢 Announcements</h1>
                <p className="text-gray-600">Create and manage organizational announcements.</p>
            </div>
        </AppLayout>
    );
}