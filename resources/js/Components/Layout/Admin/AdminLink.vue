<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    href: {
        type: String,
        required: true,
    }
})
</script>

<template>
    <Link
        :href="props.href"
        class="p-2 flex items-center justify-between rounded-lg w-full text-sm font-second text-forth-admin hover:bg-fifth-admin hover:text-thrid-admin transition-all duration-300 focus:scale-105"
    >
        <slot />
    </Link>
</template>