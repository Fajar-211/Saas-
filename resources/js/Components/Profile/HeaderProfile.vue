<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { timeNow } from '@/Helper/DateNow.js';

const user = usePage().props.auth?.user;
const dateNow = timeNow();
</script>

<template>
    <div class="flex flex-col gap-4 md:flex-row md:justify-between md:items-center">
        <div>
            <h1 class="text-xl font-semibold font-second">
                Welcome, {{ user.first_name }}
            </h1>

            <p class="text-gray-500 text-sm">
                {{ dateNow }}
            </p>
        </div>
    </div>
</template>