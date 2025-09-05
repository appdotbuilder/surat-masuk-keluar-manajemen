import React from 'react';
import { Head } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';

export default function MailCategoriesIndex() {
    return (
        <AppLayout>
            <Head title="Mail Categories" />
            <div className="container mx-auto p-6">
                <h1 className="text-2xl font-bold mb-4">🏷️ Mail Categories</h1>
                <p className="text-gray-600">Manage categories for incoming and outgoing mail.</p>
            </div>
        </AppLayout>
    );
}