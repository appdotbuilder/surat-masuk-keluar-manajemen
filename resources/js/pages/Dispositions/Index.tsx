import React from 'react';
import { Head } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';

export default function DispositionsIndex() {
    return (
        <AppLayout>
            <Head title="Dispositions" />
            <div className="container mx-auto p-6">
                <h1 className="text-2xl font-bold mb-4">🔄 Dispositions</h1>
                <p className="text-gray-600">Manage mail dispositions and follow-up actions.</p>
            </div>
        </AppLayout>
    );
}