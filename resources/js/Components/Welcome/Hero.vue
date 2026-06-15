<script setup>
import {
    Users,
    CalendarDays,
    FileBarChart2,
    TrendingUp,
    Clock
} from 'lucide-vue-next'

const stats = [
    {
        label: 'Karyawan Aktif',
        value: '128',
        color: 'from-indigo-500 to-indigo-600',
        icon: Users
    },
    {
        label: 'Jadwal Bulan Ini',
        value: '31',
        color: 'from-sky-500 to-sky-600',
        icon: CalendarDays
    },
    {
        label: 'Laporan Hari Ini',
        value: '24',
        color: 'from-emerald-500 to-emerald-600',
        icon: FileBarChart2
    }
]

const employees = [
    {
        name: 'Andi Pratama',
        div: 'Engineering',
        shift: '08:00–17:00',
        status: 'hadir'
    },
    {
        name: 'Sari Dewi',
        div: 'HR',
        shift: '09:00–18:00',
        status: 'hadir'
    },
    {
        name: 'Budi Santoso',
        div: 'Marketing',
        shift: '08:00–17:00',
        status: 'cuti'
    },
    {
        name: 'Rina Kartika',
        div: 'Finance',
        shift: '10:00–19:00',
        status: 'hadir'
    }
]

const initials = (name) => {
    return name
        .split(' ')
        .map(n => n[0])
        .join('')
        .slice(0, 2)
}
</script>

<template>
    <div class="relative my-6 w-3/4 md:w-1/2">
        <div class="relative overflow-hidden rounded-2xl border border-slate-200/60 bg-white shadow-2xl shadow-indigo-100/60">
            <div class="flex items-center gap-2 border-b border-slate-100 bg-slate-50/50 px-5 py-3.5">
                <div class="flex gap-1.5">
                    <div class="h-3 w-3 rounded-full bg-red-400"></div>
                    <div class="h-3 w-3 rounded-full bg-amber-400"></div>
                    <div class="h-3 w-3 rounded-full bg-emerald-400"></div>
                </div>

                <div class="mx-4 flex h-5 flex-1 items-center rounded-md bg-slate-200/60 px-3">
                    <span class="text-xs text-slate-400">
                        app.shiftsync.id/dashboard
                    </span>
                </div>
            </div>

            <div class="space-y-4 p-5">
                <div class="grid grid-cols-3 gap-3">
                    <div
                        v-for="item in stats"
                        :key="item.label"
                        class="rounded-xl border border-slate-100 bg-slate-50 p-3.5"
                    >
                        <div
                            :class="[
                                'mb-2 flex h-8 w-8 items-center justify-center rounded-lg bg-linear-to-br',
                                item.color
                            ]"
                        >
                            <component
                                :is="item.icon"
                                class="h-4 w-4 text-white"
                            />
                        </div>

                        <p class="text-xl font-bold text-slate-800">
                            {{ item.value }}
                        </p>

                        <p class="text-xs text-slate-400">
                            {{ item.label }}
                        </p>
                    </div>
                </div>

                <div class="overflow-hidden rounded-xl border border-slate-100">

                    <div class="flex items-center justify-between bg-linear-to-r from-indigo-600 to-sky-500 px-4 py-2.5">
                        <span class="text-sm font-semibold text-white">
                            Jadwal Juni 2025
                        </span>

                        <div class="flex items-center gap-1 text-white/80">
                            <Clock class="h-3.5 w-3.5" />
                            <span class="text-xs">
                                Auto-generated
                            </span>
                        </div>
                    </div>

                    <div class="divide-y divide-slate-100">

                        <div
                            v-for="employee in employees"
                            :key="employee.name"
                            class="flex items-center gap-3 px-4 py-2.5 hover:bg-slate-50"
                        >
                            <div
                                class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-linear-to-br from-indigo-400 to-sky-500 text-xs font-bold text-white"
                            >
                                {{ initials(employee.name) }}
                            </div>

                            <div class="min-w-0 flex-1">
                                <p class="truncate text-sm font-semibold text-slate-800">
                                    {{ employee.name }}
                                </p>

                                <p class="text-xs text-slate-400">
                                    {{ employee.div }} · {{ employee.shift }}
                                </p>
                            </div>

                            <span
                                :class="[
                                    'rounded-full px-2 py-0.5 text-xs',
                                    employee.status === 'hadir'
                                        ? 'border border-emerald-200 bg-emerald-50 text-emerald-600'
                                        : 'border border-amber-200 bg-amber-50 text-amber-600'
                                ]"
                            >
                                {{ employee.status }}
                            </span>
                        </div>

                    </div>
                </div>

                <div class="flex items-center gap-3 rounded-xl border border-indigo-100 bg-indigo-50 p-3">

                    <TrendingUp class="h-5 w-5 shrink-0 text-indigo-600" />

                    <div class="flex-1">
                        <p class="text-sm font-semibold text-indigo-800">
                            Kehadiran bulan ini naik 12%
                        </p>

                        <div class="mt-1.5 h-1.5 overflow-hidden rounded-full bg-indigo-200">
                            <div class="h-full w-4/5 rounded-full bg-linear-to-r from-indigo-500 to-sky-400"></div>
                        </div>
                    </div>

                    <span class="font-bold text-indigo-600">
                        80%
                    </span>
                </div>

            </div>
        </div>

        <div class="absolute -right-4 -top-4 max-w-[200px] rounded-xl border border-slate-200 bg-white px-4 py-3 shadow-lg">
            <div class="mb-1 flex items-center gap-2">
                <div class="h-2 w-2 animate-pulse rounded-full bg-emerald-400"></div>

                <span class="text-xs font-semibold text-emerald-600">
                    Jadwal dibuat!
                </span>
            </div>

            <p class="text-xs text-slate-600">
                31 hari jadwal untuk 128 karyawan siap.
            </p>
        </div>

        <div class="absolute -bottom-4 -left-4 flex items-center gap-3 rounded-xl border border-slate-200 bg-white px-4 py-3 shadow-lg">
            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-linear-to-br from-sky-500 to-indigo-500">
                <TrendingUp class="h-5 w-5 text-white" />
            </div>

            <div>
                <p class="font-bold text-slate-800">
                    98.5%
                </p>

                <p class="text-xs text-slate-400">
                    Akurasi jadwal otomatis
                </p>
            </div>
        </div>
    </div>
</template>