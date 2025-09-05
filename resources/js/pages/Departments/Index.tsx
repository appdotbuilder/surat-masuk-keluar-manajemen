import React from 'react';
import { Head } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';

export default function DepartmentsIndex() {
    return (
        <AppLayout>
            <Head title="Departments" />
            <div className="container mx-auto p-6">
                <h1 className="text-2xl font-bold mb-4">🏢 Departments</h1>
                <p className="text-gray-600">Manage organizational departments.</p>
            </div>
        </AppLayout>
    );
}