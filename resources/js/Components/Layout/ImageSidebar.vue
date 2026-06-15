<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { onMounted } from 'vue';

const user = usePage().props?.auth?.me;
</script>

<template>
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
        <div class="flex items-center flex-wrap gap-4 justify-center">
            <a :href="route('home')" class="rounded-lg ring-2 ring-white shadow-lg max-w-max max-h-max overflow-hidden focus:ring-emerald-100">
                <img :src="user.avatar ? '' : `https://ui-avatars.com/api/?name=${user?.first_name}&background=7DD3FC&color=fff`" class="w-16 h-16"/>
            </a>
            <div>
                <h2 class="font-semibold text-xs md:text-sm text-center font-second">
                    {{ user?.first_name }}
                </h2>

                <p class="text-gray-500 text-xs md:text-sm text-center">
                    {{ user?.email }}
                </p>
            </div>
        </div>
    </div>
</template>
