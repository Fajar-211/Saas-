<script setup>
const props = defineProps(['span'])
</script>

<template>
    <tr>
        <td :colspan="props.span" class="py-3 font-primary text-center">
            <slot />
        </td>
    </tr>
</template>