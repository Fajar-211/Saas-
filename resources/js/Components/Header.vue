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
    <div class="flex items-center justify-between py-2 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-blue-200 to-yellow-100">
        <div class="flex items-center justify-center rounded-md px-4 py-2 min-h-[48px]">
            <h2 class="text-xl font-semibold leading-tight text-slate-800 text-center">
                {{ props.text }}
            </h2>
        </div>
        <div class="md:flex hidden gap-x-4">
            <div class="flex items-center gap-x-4">
                <Link :href="route('profile.edit')">
                    <img :src="user.props.auth?.me?.profile ? 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80' : `https://ui-avatars.com/api/?name=${user.props.auth?.me?.first_name}&background=7DD3FC&color=fff`" title="Profile" alt="Profile" class="size-10 rounded-full" />
                </Link>
                <div class="text-sm/6">
                    <p class="font-semibold text-slate-800">
                    {{ user.props.auth?.me?.first_name }}
                    </p>
                    <p class="text-gray-400">{{ user.props.auth?.me?.division?.name }}</p>
                </div>
            </div>
            <div class="flex inset-0">
                <Link class="w-8 hover:cursor-pointer active:scale-90 transition-all duration-150" :href="route('logout')" method="post" as="button">
                    <svg fill="#000000" viewBox="0 0 24 24" id="sign-out-alt-3" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><path id="primary" d="M13.23,2.71a2,2,0,0,0-1.72-.37l-6,1.5A2,2,0,0,0,4,5.78V18.22a2,2,0,0,0,1.51,1.94l6,1.5a2,2,0,0,0,.48.06,2,2,0,0,0,1.23-.43A2,2,0,0,0,14,19.72V4.28A2,2,0,0,0,13.23,2.71Z" style="fill: rgb(0, 0, 0);"></path><path id="secondary" d="M18,4H15V20h3a2,2,0,0,0,2-2V6A2,2,0,0,0,18,4Z" style="fill: rgb(44, 169, 188);"></path></svg>
                </Link>
            </div>
        </div>
    </div>
</template>