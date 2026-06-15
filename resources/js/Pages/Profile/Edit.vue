<script setup>
import AuthenticatedLayout from '@/Layouts/Admin/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';
import Header from '@/Components/Header.vue';
import HeaderProfile from '@/Components/Profile/HeaderProfile.vue';
import Image from '@/Components/Profile/Image.vue';
import General from '@/Components/Profile/General.vue';
import Authenticate from '@/Components/Profile/Authenticate.vue';

const header = 'Profile';
defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <Header :text="header" />
        <main class="flex-1 p-4 md:p-8">
            <HeaderProfile />
            <div class="bg-white rounded-3xl mt-6 overflow-hidden shadow-sm">
                <div class="p-4 md:p-8">
                    <Image />
                    <General />
                    <Authenticate />
                </div>
            </div>
        </main>
    </AuthenticatedLayout>
</template>
