<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const user = usePage().props.auth?.user;
const opennav = ref(false);

const toggle = () => {
    opennav.value = !opennav.value;
};
</script>

<template>
    <nav class="flex items-center justify-between fixed z-50 top-0 w-full px-6 md:px-16 lg:px-24 xl:px-32 py-4 border-b border-slate-200 bg-white/40 backdrop-blur-sm">
        <a href="/">
            <img class="h-9 md:h-9.5 w-auto shrink-0" src="/assets/logo.svg" alt="Logo" width="140" height="40">
        </a>

        <!-- Mobile Menu -->
        <div id="mobileMenu" :class="['fixed inset-0 flex flex-col items-center justify-center gap-6 text-lg font-medium bg-white/40 backdrop-blur-md md:hidden transition-all duration-300', opennav ? 'translate-y-5' : '-translate-y-full']">
                <Link v-if="!user" :href="route('login')" @click="toggle" class="hover:text-teal-500 transition-all duration-150">
                    Sign in
                </Link>
                <!-- AMBIL ROUTE DASHBOARD DINAMIS BERDASARKAN DIVISION MELALUI MIDDLEWARE INERTIA -->
                <Link v-else :href="route($page.props.auth.dashboard)" @click="toggle" class="hover:text-indigo-500 transition-all duration-150">
                    Dashboard
                </Link>
            <button @click="toggle" class="aspect-square size-10 p-1 flex items-center justify-center bg-indigo-600 hover:bg-indigo-700 transition text-white rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18"/>
                    <path d="m6 6 12 12"/>
                </svg>
            </button>
        </div>

        <!-- Desktop Menu -->
        <div class="flex items-center gap-4 md:gap-6">
            <Link v-if="!user" :href="route('login')" class="hidden md:block hover:bg-slate-100 transition px-4 py-2 border border-indigo-600 rounded-md">
                Sign in
            </Link>
            <!-- AMBIL ROUTE DASHBOARD DINAMIS BERDASARKAN DIVISION MELALUI MIDDLEWARE INERTIA -->
            <Link v-else :href="route($page.props.auth.dashboard)" class="hidden md:block px-4 py-2 bg-indigo-600 hover:bg-indigo-700 transition text-white rounded-md">
                Dashboard
            </Link>
        </div>
    </nav>
</template>