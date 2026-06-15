<script setup>
import { onUnmounted, ref, watch } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';
import Master from '@/Components/Master.vue';
import { onMounted } from 'vue';
import Setting from '@/Components/Setting.vue';
import { useStateLayout } from '@/Stores/StateLayout.js';
import PrimaryNavLink from '@/Components/PrimaryNavLink.vue';
import { usePage } from '@inertiajs/vue3';

const nav = useStateLayout();
const page = usePage().props.auth?.user;

//master
const masterbutton = ref(false);
const master = (value)=>{
    if(value == true){
        masterbutton.value = true
    }else{
        masterbutton.value = false;
    }
}
//setting
const seetingbutton = ref(false);
const setting = (value)=>{
    if(value == true){
        seetingbutton.value = true
    }else{
        seetingbutton.value = false;
    }
}
const masterMenus = [
    {
        name: 'User',
        route: 'super.admin.user',
    },
    {
        name: 'Division',
        route: 'super.admin.division',
    },
    {
        name: 'Permission',
        route: 'super.admin.permission',
    },
];
const settingMenuMobile = [
    {
        name: 'Profile',
        route: 'profile.edit',
        methode: 'get',
    },
    {
        name: 'Logout',
        route: 'logout',
        methode: 'post',
    },
];
const settingMenuDesktop = [
    {
        name: 'Profile',
        route: 'profile.edit',
        methode: 'get',
    }
];

//reactive side bar
const sidebarOpen = ref(false);
const sidebarRef = ref(null);

const handleDocumentClick = (event) => {
    if (!sidebarOpen.value) return;

    if (
        sidebarRef.value &&
        !sidebarRef.value.contains(event.target)
    ) {
        sidebarOpen.value = false;
    }
};

onMounted(() => {
    document.addEventListener('click', handleDocumentClick);
});

onUnmounted(() => {
    document.removeEventListener('click', handleDocumentClick);
});
</script>

<template>
    <div>
        <div class="min-h-screen bg-white flex">
            <div class="md:hidden fixed top-4 left-4 z-50">
                <button 
                    @click.stop="sidebarOpen = !sidebarOpen"
                    class="p-2 bg-white rounded-lg shadow"
                >
                    ☰
                </button>
            </div>
            <nav ref="sidebarRef" class="fixed md:static top-0 left-0 h-screen md:h-auto w-72 bg-white shadow-xl z-50 transform transition-all duration-700"
                :class="[
                    sidebarOpen ? 'translate-x-0' : '-translate-x-full',
                    'md:translate-x-0'
                ]">
                <div class="grid grid-cols-1">
                    <div class="flex justify-center my-3">
                        <Link :href="route('home')">
                            <ApplicationLogo
                                class="block h-9 w-auto fill-current text-gray-800"
                            />
                        </Link>
                    </div>
                    <div class="md:hidden my-2">
                        <h2 class="text-center text-md font-semibold text-gray-800">
                            {{ page.first_name }}
                        </h2>
                        <div class="my-1.5" />
                        <p class="text-center text-xs text-gray-400">
                            {{ page.division.name }}
                        </p>
                    </div>
                </div>

                <div class="mx-3 grid grid-cols-1 gap-y-2">

                    <!-- Dashboard -->
                    <PrimaryNavLink :href="route('super.admin.dashboard')" :active="route().current('super.admin.dashboard')" @click="nav.layout = 'dashboard'">
                        Dashboard
                    </PrimaryNavLink>

                    <!-- Master -->
                    <Master :masterbutton="masterbutton" @open="master">
                        Master
                    </Master>
                    <TransitionGroup name="slide-fade" tag="div" class="ml-4 flex flex-col">
                        <template v-if="masterbutton">
                            <NavLink v-for="(menu, index) in masterMenus" :key="menu.route" :style="{ transitionDelay: `${index * 100}ms` }" :href="route(`${menu.route}`)" :active="route().current(`${menu.route}`)">
                                {{ menu.name }}
                            </NavLink>
                        </template>
                    </TransitionGroup>

                    <div class="border-t border-gray-200 pb-1 pt-" />
                    
                    <!-- Setting -->
                    <Setting :seetingbutton="seetingbutton" @open="setting">
                        Setting
                    </Setting>
                    <div class="md:hidden">
                        <TransitionGroup name="slide-fade" tag="div" class="ml-4 flex flex-col">
                            <template v-if="seetingbutton">
                                <NavLink v-for="(menu, index) in settingMenuMobile" :key="menu.route" :methode="menu.methode" :style="{ transitionDelay: `${index * 100}ms` }" :href="route(`${menu.route}`)" :active="route().current(`${menu.route}`)">
                                    {{ menu.name }}
                                </NavLink>
                            </template>
                        </TransitionGroup>
                    </div>
                    <div class="hidden md:block">
                        <TransitionGroup name="slide-fade" tag="div" class="ml-4 flex flex-col">
                            <template v-if="seetingbutton">
                                <NavLink v-for="(menu, index) in settingMenuDesktop" :key="menu.route" :methode="menu.methode" :style="{ transitionDelay: `${index * 100}ms` }" :href="route(`${menu.route}`)" :active="route().current(`${menu.route}`)">
                                    {{ menu.name }}
                                </NavLink>
                            </template>
                        </TransitionGroup>
                    </div>

                </div>
            </nav>

            <!-- Page Heading -->
            <section class="w-full">
                <main>
                    <slot />
                </main>
            </section>
        </div>
    </div>
</template>

<style scoped>
.slide-fade-enter-active,
.slide-fade-leave-active {
    transition: all 0.3s ease;
}

.slide-fade-enter-from {
    opacity: 0;
    transform: translateX(-20px);
}

.slide-fade-leave-to {
    opacity: 0;
    transform: translateX(-20px);
}

.slide-fade-move {
    transition: all 0.3s ease;
}
</style>