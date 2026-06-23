<script setup>
import AuthenticatedLayout from '@/Layouts/Admin/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Header from '@/Components/Header.vue';
import HeaderProfile from '@/Components/Profile/HeaderProfile.vue';
import Image from '@/Components/Profile/Image.vue';
import General from '@/Components/Profile/General.vue';
import Authenticate from '@/Components/Profile/Authenticate.vue';
import Otp from '@/Components/Otp.vue';
import { ref } from 'vue';
import ChangePass from '@/Components/Profile/ChangePass.vue';

const header = 'Profile';
defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
const modalOTP = ref(false);
const handleopenOTP = (value)=>{
    modalOTP.value = value ?? true;
}
const handlcloseOTP = ()=>{
    setTimeout(()=>modalOTP.value = false, 500);
}
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <Header :text="header" />
        <main class="flex-1 p-4 md:p-8">
            <HeaderProfile />
            <div class="bg-white rounded-xl mt-6 overflow-hidden shadow-sm">
                <div>
                    <Image />
                    <General />
                    <Authenticate @open="handleopenOTP" />
                </div>
            </div>
        </main>
        <Transition name="fold" :duration="{enter:0, leave:400}">
            <Otp v-if="modalOTP" @close="handlcloseOTP" />
        </Transition>
        <ChangePass />
    </AuthenticatedLayout>
</template>

<style scoped>
.fold-enter-active,
.fold-leave-active {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.fold-enter-from {
    opacity: 0;
    transform: scaleY(0);
}

.fold-enter-to {
    opacity: 1;
    transform: scaleY(1);
}

.fold-leave-from {
    opacity: 1;
    transform: scaleY(1);
}

.fold-leave-to {
    opacity: 0;
    transform: scaleY(0);
}
</style>
