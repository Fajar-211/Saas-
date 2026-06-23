<script setup>
const props = defineProps({
    percentage: {
        type: Number,
        default: 0
    }
})
</script>

<template>
    <section class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-[9999]">
        <div
            class="relative w-64 h-64 rounded-full flex items-center justify-center"
            :style="{
                background: `conic-gradient(
                    #2563eb 0%,
                    #9333ea 25%,
                    #ec4899 50%,
                    #f97316 75%,
                    #eab308 ${percentage}%,
                    #e5e7eb ${percentage}% 100%
                )`
            }"
        >
            <div class="absolute w-56 h-56 bg-white rounded-full flex flex-col items-center justify-center">
                <h2 class="text-5xl font-light">
                    {{ percentage }}%
                </h2>

                <p class="text-gray-500">
                    Uploading...
                </p>
            </div>
        </div>
    </section>
</template>