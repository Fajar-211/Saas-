<script setup>
import Header from '@/Components/Header.vue';
import AuthenticatedLayout from '@/Layouts/Admin/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const header = 'Dashboard Admin';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <Header :text="header" />

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        You're logged in!
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
