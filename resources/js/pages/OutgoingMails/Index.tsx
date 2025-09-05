import React from 'react';
import { Head } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';

export default function OutgoingMailsIndex() {
    return (
        <AppLayout>
            <Head title="Outgoing Mails" />
            <div className="container mx-auto p-6">
                <h1 className="text-2xl font-bold mb-4">📤 Outgoing Mails</h1>
                <p className="text-gray-600">Track and manage all outgoing correspondence.</p>
            </div>
        </AppLayout>
    );
}