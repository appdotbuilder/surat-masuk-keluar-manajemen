import React from 'react';
import { Head } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';

export default function OrganizationSettingsIndex() {
    return (
        <AppLayout>
            <Head title="Organization Settings" />
            <div className="container mx-auto p-6">
                <h1 className="text-2xl font-bold mb-4">⚙️ Organization Settings</h1>
                <p className="text-gray-600">Configure organization-wide settings and preferences.</p>
            </div>
        </AppLayout>
    );
}