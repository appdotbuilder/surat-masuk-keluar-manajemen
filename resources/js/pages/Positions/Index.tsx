import React from 'react';
import { Head } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';

export default function PositionsIndex() {
    return (
        <AppLayout>
            <Head title="Positions" />
            <div className="container mx-auto p-6">
                <h1 className="text-2xl font-bold mb-4">💼 Positions</h1>
                <p className="text-gray-600">Manage employee positions and ranks.</p>
            </div>
        </AppLayout>
    );
}