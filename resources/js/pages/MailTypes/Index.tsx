import React from 'react';
import { Head } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';

export default function MailTypesIndex() {
    return (
        <AppLayout>
            <Head title="Mail Types" />
            <div className="container mx-auto p-6">
                <h1 className="text-2xl font-bold mb-4">✉️ Mail Types</h1>
                <p className="text-gray-600">Manage types/properties for incoming and outgoing mail.</p>
            </div>
        </AppLayout>
    );
}