import React from 'react';
import { Head } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';

export default function EmployeesIndex() {
    return (
        <AppLayout>
            <Head title="Employees" />
            <div className="container mx-auto p-6">
                <h1 className="text-2xl font-bold mb-4">👥 Employees</h1>
                <p className="text-gray-600">Manage employee data and information.</p>
            </div>
        </AppLayout>
    );
}