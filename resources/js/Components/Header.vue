<script setup>
import { Link, usePage } from '@inertiajs/vue3';

const user = usePage();
const props = defineProps({
    text: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <div class="flex items-center justify-between py-2 px-4 sm:px-6 lg:px-8 bg-[#F3F5FF] shadow-lg">
        <div class="flex items-center justify-center rounded-md px-4 py-2 min-h-[48px]">
            <h2 class="text-xl font-semibold leading-tight text-slate-800 text-center">
                {{ props.text }}
            </h2>
        </div>
        <div class="flex gap-x-4">
            <div class="flex items-center gap-x-4">
                <Link :href="route('profile.edit')">
                    <img :src="user.props.auth?.me?.profile ? 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80' : `https://ui-avatars.com/api/?name=${user.props.auth?.me?.first_name}&background=7DD3FC&color=fff`" title="Profile" alt="Profile" class="size-10 rounded-full" />
                </Link>
                <div class="text-sm/6">
                    <p class="font-semibold text-slate-800 font-second">
                    {{ user.props.auth?.me?.division?.name }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>