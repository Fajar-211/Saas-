<script setup>
import { computed, onUnmounted, ref, watch } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link, router } from '@inertiajs/vue3';
import Master from '@/Components/Master.vue';
import { onMounted } from 'vue';
import Setting from '@/Components/Setting.vue';
import { useStateLayout } from '@/Stores/StateLayout.js';
import PrimaryNavLink from '@/Components/PrimaryNavLink.vue';
import { usePage } from '@inertiajs/vue3';
import ImageSidebar from '@/Components/Layout/ImageSidebar.vue';
import NavButton from '@/Components/Layout/Admin/NavButton.vue';
import AdminLink from '@/Components/Layout/Admin/AdminLink.vue';

const nav = useStateLayout();
const page = usePage().props.auth?.user;

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
    console.log(nav.layout);
    document.addEventListener('click', handleDocumentClick);
});
watch(
    () => nav.layout,
    (newValue) => {
        if (newValue === 'dashboard') {
            router.visit(route('super.admin.dashboard'))
        }
    }
)
watch(() => nav.layout, (val) => {
    console.log('layout berubah:', val)
})
</script>

<template>
    <div class="min-h-screen bg-primary-admin flex">
        <div class="md:hidden fixed top-4 left-4 z-50">
            <button 
                @click.stop="sidebarOpen = !sidebarOpen"
                class="p-2 bg-white rounded-lg shadow-sm"
            >
                ☰
            </button>
        </div>
        <aside ref="sidebarRef" :class="[sidebarOpen ? 'translate-x-0' : '-translate-x-full', 'md:translate-x-0']" class="fixed md:sticky top-0 left-0 h-screen bg-[#F5F7FF] shadow-lg z-40 transition-transform duration-300 ease-in-out w-[35%] sm:w-[30%] md:w-[25%] lg:w-[20%] xl:w-[15%]">
            <section class="py-2.5 px-3">
                <ImageSidebar />
                <div class="w-full h-px bg-gray-200/70 my-2.5" />
                <div class="grid grid-cols-1 gap-y-1.5">
                    <NavButton @click="nav.layout = 'dashboard'" :class="route().current('super.admin.dashboard') ? 'border-r-2 border-thrid-admin bg-second-admin text-thrid-admin' : 'bg-primary-admin text-forth-admin hover:bg-second-admin hover:text-thrid-admin'">
                        <svg class="fill-current" width="15px" height="18px" viewBox="0 0 24 24" id="meteor-icon-kit__regular-dashboard" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M3 2C2.44772 2 2 2.44772 2 3V6C2 6.55228 2.44772 7 3 7H6C6.55228 7 7 6.55228 7 6V3C7 2.44772 6.55228 2 6 2H3ZM3 0H6C7.65685 0 9 1.34315 9 3V6C9 7.65685 7.65685 9 6 9H3C1.34315 9 0 7.65685 0 6V3C0 1.34315 1.34315 0 3 0ZM14 16H21C22.6569 16 24 17.3431 24 19V21C24 22.6569 22.6569 24 21 24H14C12.3431 24 11 22.6569 11 21V19C11 17.3431 12.3431 16 14 16ZM14 18C13.4477 18 13 18.4477 13 19V21C13 21.5523 13.4477 22 14 22H21C21.5523 22 22 21.5523 22 21V19C22 18.4477 21.5523 18 21 18H14ZM3 11H6C7.65685 11 9 12.3431 9 14V21C9 22.6569 7.65685 24 6 24H3C1.34315 24 0 22.6569 0 21V14C0 12.3431 1.34315 11 3 11ZM3 13C2.44772 13 2 13.4477 2 14V21C2 21.5523 2.44772 22 3 22H6C6.55228 22 7 21.5523 7 21V14C7 13.4477 6.55228 13 6 13H3ZM21 0C22.6569 0 24 1.34315 24 3V11C24 12.6569 22.6569 14 21 14H14C12.3431 14 11 12.6569 11 11V3C11 1.34315 12.3431 0 14 0H21ZM13 3V11C13 11.5523 13.4477 12 14 12H21C21.5523 12 22 11.5523 22 11V3C22 2.44772 21.5523 2 21 2H14C13.4477 2 13 2.44772 13 3Z"/></svg>
                        Dashboard
                    </NavButton>
                    <NavButton @click="nav.layout = 'master'" :class="route().current('super.admin.user') || route().current('super.admin.division')  ? 'border-r-2 border-thrid-admin bg-second-admin text-thrid-admin' : 'bg-primary-admin text-forth-admin hover:bg-second-admin hover:text-thrid-admin'">
                        <svg class="fill-current" width="15px" height="18px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M19,12 L19,8.62081119 C17.3445598,9.50508911 14.8145288,10 12,10 C9.18547122,10 6.65544022,9.50508911 5,8.62081119 L5,12.0000003 C5,12.8370203 8.10127922,14 12,14 C15.8987208,14 19,12.8370203 19,12 Z M19,14.6208112 C17.3445598,15.5050891 14.8145288,16 12,16 C9.18547122,16 6.65544022,15.5050891 5,14.6208112 L5,18 C5,18.8370203 8.10127922,20 12,20 C15.8987208,20 19,18.8370203 19,18 L19,14.6208112 Z M3,6 C3,3.52331179 7.06216478,2 12,2 C16.9378352,2 21,3.52331179 21,6 L21,18 C21,20.4766882 16.9378352,22 12,22 C7.06216478,22 3,20.4766882 3,18 L3,6 Z M12,8 C15.8987208,8 19,6.83702029 19,6 C19,5.16297971 15.8987208,4 12,4 C8.10127922,4 5,5.16297971 5,6 C5,6.83702029 8.10127922,8 12,8 Z"/>
                        </svg>
                        Master
                    </NavButton>
                    <Transition name="slide-fade">
                        <div v-if="nav.layout === 'master'" class="-translate-y-1.5 py-1 ml-8 bg-white/50 backdrop-blur-2xl rounded-sm grid grid-cols-1 gap-y-1">
                            <AdminLink :href="route('super.admin.user')">
                                User
                                <svg class="fill-current" width="15px" height="18px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7,16 L17,16 C19.7614237,16 22,18.2385763 22,21 C22,21.5522847 21.5522847,22 21,22 C20.4871642,22 20.0644928,21.6139598 20.0067277,21.1166211 L19.9949073,20.8237272 C19.9070404,19.3072462 18.6927538,18.0929596 17.1762728,18.0050927 L17,18 L7,18 C5.34314575,18 4,19.3431458 4,21 C4,21.5522847 3.55228475,22 3,22 C2.44771525,22 2,21.5522847 2,21 C2,18.3112453 4.12230671,16.1181819 6.78311038,16.0046195 L7,16 L17,16 L7,16 Z M12,2 C15.3137085,2 18,4.6862915 18,8 C18,11.3137085 15.3137085,14 12,14 C8.6862915,14 6,11.3137085 6,8 C6,4.6862915 8.6862915,2 12,2 Z M12,4 C9.790861,4 8,5.790861 8,8 C8,10.209139 9.790861,12 12,12 C14.209139,12 16,10.209139 16,8 C16,5.790861 14.209139,4 12,4 Z"/>
                                </svg>
                            </AdminLink>
                            <AdminLink :href="route('super.admin.division')">
                                Division
                                <svg class="fill-current" width="15px" height="18px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M10 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM4 8a6 6 0 1 1 12 0A6 6 0 0 1 4 8zm12.828-4.243a1 1 0 0 1 1.415 0 6 6 0 0 1 0 8.486 1 1 0 1 1-1.415-1.415 4 4 0 0 0 0-5.656 1 1 0 0 1 0-1.415zm.702 13a1 1 0 0 1 1.212-.727c1.328.332 2.169 1.18 2.652 2.148.468.935.606 1.98.606 2.822a1 1 0 1 1-2 0c0-.657-.112-1.363-.394-1.928-.267-.533-.677-.934-1.349-1.102a1 1 0 0 1-.727-1.212zM6.5 18C5.24 18 4 19.213 4 21a1 1 0 1 1-2 0c0-2.632 1.893-5 4.5-5h7c2.607 0 4.5 2.368 4.5 5a1 1 0 1 1-2 0c0-1.787-1.24-3-2.5-3h-7z"/></svg>
                            </AdminLink>
                        </div>
                    </Transition>

                    <NavButton @click="nav.layout = 'setting'" :class="route().current('profile.edit') ? 'border-r-2 border-thrid-admin bg-second-admin text-thrid-admin' : 'bg-primary-admin text-forth-admin hover:bg-second-admin hover:text-thrid-admin'">
                        <svg class="fill-current" width="15px" height="18px" viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="M19.9,12.66a1,1,0,0,1,0-1.32L21.18,9.9a1,1,0,0,0,.12-1.17l-2-3.46a1,1,0,0,0-1.07-.48l-1.88.38a1,1,0,0,1-1.15-.66l-.61-1.83A1,1,0,0,0,13.64,2h-4a1,1,0,0,0-1,.68L8.08,4.51a1,1,0,0,1-1.15.66L5,4.79A1,1,0,0,0,4,5.27L2,8.73A1,1,0,0,0,2.1,9.9l1.27,1.44a1,1,0,0,1,0,1.32L2.1,14.1A1,1,0,0,0,2,15.27l2,3.46a1,1,0,0,0,1.07.48l1.88-.38a1,1,0,0,1,1.15.66l.61,1.83a1,1,0,0,0,1,.68h4a1,1,0,0,0,.95-.68l.61-1.83a1,1,0,0,1,1.15-.66l1.88.38a1,1,0,0,0,1.07-.48l2-3.46a1,1,0,0,0-.12-1.17ZM18.41,14l.8.9-1.28,2.22-1.18-.24a3,3,0,0,0-3.45,2L12.92,20H10.36L10,18.86a3,3,0,0,0-3.45-2l-1.18.24L4.07,14.89l.8-.9a3,3,0,0,0,0-4l-.8-.9L5.35,6.89l1.18.24a3,3,0,0,0,3.45-2L10.36,4h2.56l.38,1.14a3,3,0,0,0,3.45,2l1.18-.24,1.28,2.22-.8.9A3,3,0,0,0,18.41,14ZM11.64,8a4,4,0,1,0,4,4A4,4,0,0,0,11.64,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,11.64,14Z"/></svg>
                        Setting
                    </NavButton>
                    <Transition name="slide-fade">
                        <div v-if="nav.layout === 'setting'" class="-translate-y-1.5 py-1 ml-8 bg-white/50 backdrop-blur-2xl rounded-sm grid grid-cols-1 gap-y-1">
                            <AdminLink :href="route('profile.edit')">
                                Profile
                                <svg class="fill-current" width="15px" height="18px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <g id="style=stroke">
                                        <g id="profile">
                                            <path id="vector (Stroke)" fill-rule="evenodd" clip-rule="evenodd" d="M12 2.75C9.92893 2.75 8.25 4.42893 8.25 6.5C8.25 8.57107 9.92893 10.25 12 10.25C14.0711 10.25 15.75 8.57107 15.75 6.5C15.75 4.42893 14.0711 2.75 12 2.75ZM6.75 6.5C6.75 3.6005 9.1005 1.25 12 1.25C14.8995 1.25 17.25 3.6005 17.25 6.5C17.25 9.3995 14.8995 11.75 12 11.75C9.1005 11.75 6.75 9.3995 6.75 6.5Z"/>
                                            <path id="rec (Stroke)" fill-rule="evenodd" clip-rule="evenodd" d="M4.25 18.5714C4.25 15.6325 6.63249 13.25 9.57143 13.25H14.4286C17.3675 13.25 19.75 15.6325 19.75 18.5714C19.75 20.8792 17.8792 22.75 15.5714 22.75H8.42857C6.12081 22.75 4.25 20.8792 4.25 18.5714ZM9.57143 14.75C7.46091 14.75 5.75 16.4609 5.75 18.5714C5.75 20.0508 6.94924 21.25 8.42857 21.25H15.5714C17.0508 21.25 18.25 20.0508 18.25 18.5714C18.25 16.4609 16.5391 14.75 14.4286 14.75H9.57143Z"/>
                                        </g>
                                    </g>
                                </svg>
                            </AdminLink>
                            <Link class="p-2 flex items-center justify-between rounded-lg w-full text-sm font-second text-forth-admin hover:bg-fifth-admin hover:text-thrid-admin transition-all duration-300 focus:scale-105" :href="route('logout')" method="post" as="button">
                                Log out
                                <svg class="fill-current" width="15px" height="18px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2 6.5C2 4.01472 4.01472 2 6.5 2H12C14.2091 2 16 3.79086 16 6V7C16 7.55228 15.5523 8 15 8C14.4477 8 14 7.55228 14 7V6C14 4.89543 13.1046 4 12 4H6.5C5.11929 4 4 5.11929 4 6.5V17.5C4 18.8807 5.11929 20 6.5 20H12C13.1046 20 14 19.1046 14 18V17C14 16.4477 14.4477 16 15 16C15.5523 16 16 16.4477 16 17V18C16 20.2091 14.2091 22 12 22H6.5C4.01472 22 2 19.9853 2 17.5V6.5ZM18.2929 8.29289C18.6834 7.90237 19.3166 7.90237 19.7071 8.29289L22.7071 11.2929C23.0976 11.6834 23.0976 12.3166 22.7071 12.7071L19.7071 15.7071C19.3166 16.0976 18.6834 16.0976 18.2929 15.7071C17.9024 15.3166 17.9024 14.6834 18.2929 14.2929L19.5858 13L11 13C10.4477 13 10 12.5523 10 12C10 11.4477 10.4477 11 11 11L19.5858 11L18.2929 9.70711C17.9024 9.31658 17.9024 8.68342 18.2929 8.29289Z"/>
                                </svg>
                            </Link>
                        </div>
                    </Transition>
                </div>
            </section>
            <section>

            </section>
        </aside>
        <main class="w-full">
            <slot />
        </main>
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