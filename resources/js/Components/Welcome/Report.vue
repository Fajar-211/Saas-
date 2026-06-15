<script setup>
    const present = [
        {
            day: 'Sn-Jm',
            presentase: 80
        },
        {
            day: 'Sn-Sb',
            presentase: 60
        },
        {
            day: 'Sn-Mg',
            presentase: 90
        },
        {
            day: 'Sn-Sn',
            presentase: 75
        },
        {
            day: 'Sn-Sl',
            presentase: 85
        },
    ]
</script>
<template>
    <div class="grid grid-cols-3 my-3 gap-4">
        <div class="flex justify-center py-5 rounded-lg ring-1 ring-slate-200">
            <div class="max-w-max">
                <p class="block text-center text-emerald-600 font-semibold">112</p>
                <p class="block text-center text-xs font-light text-slate-500">Hadir</p>
            </div>
        </div>
        <div class="flex justify-center py-5 rounded-lg ring-1 ring-orange-200 bg-orange-100">
            <div class="max-w-max">
                <p class="block text-center text-orange-500 font-semibold">8</p>
                <p class="block text-center text-xs font-light text-slate-500">Terlambat</p>
            </div>
        </div>
        <div class="flex justify-center py-5 rounded-lg ring-1 ring-pink-200 bg-pink-100">
            <div class="max-w-max">
                <p class="block text-center text-pink-500 font-semibold">8</p>
                <p class="block text-center text-xs font-light text-slate-500">Terlambat</p>
            </div>
        </div>
    </div>
    <div class="p-4 space-y-3">
        <div v-for="(item, index) in present" :key="index" class="grid grid-cols-1">
            <div class="flex gap-x-3">
                <div class="flex w-[10%] text-xs text-slate-400">
                    {{ item.day }}
                </div>
                <div class="h-2 rounded-full bg-slate-200 overflow-hidden w-[80%]">
                    <div class="h-full rounded-full bg-emerald-500"
                    :style="{ width: `${item.presentase}%` }" />
                </div>
                <div class="flex w-[10%] text-xs text-slate-400">
                    {{ item.presentase }}
                </div>
            </div>
        </div>
    </div>
</template>