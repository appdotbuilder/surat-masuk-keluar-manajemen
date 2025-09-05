import React from 'react';
import { Head } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';

export default function ReportsIndex() {
    return (
        <AppLayout>
            <Head title="Reports" />
            <div className="container mx-auto p-6">
                <h1 className="text-2xl font-bold mb-4">📊 Reports</h1>
                <p className="text-gray-600">View and generate reports on mail management activities.</p>
            </div>
        </AppLayout>
    );
}