import React from 'react';
import { Head } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';

export default function IncomingMailsIndex() {
    return (
        <AppLayout>
            <Head title="Incoming Mails" />
            <div className="container mx-auto p-6">
                <h1 className="text-2xl font-bold mb-4">📨 Incoming Mails</h1>
                <p className="text-gray-600">Manage and track all incoming correspondence.</p>
            </div>
        </AppLayout>
    );
}