<script setup>
import {
  UserPlus,
  Settings2,
  CalendarRange,
  BarChart3
} from 'lucide-vue-next'

const steps = [
  {
    num: '01',
    icon: UserPlus,
    color: 'from-indigo-500 to-indigo-600',
    title: 'Tambah Karyawan & Divisi',
    desc: 'Daftarkan karyawan Anda — bisa satu per satu atau import massal dari Excel. Buat struktur divisi sesuai organisasi perusahaan.',
    duration: 1000
  },
  {
    num: '02',
    icon: Settings2,
    color: 'from-sky-500 to-sky-600',
    title: 'Atur Aturan & Preferensi',
    desc: 'Tentukan jam kerja, aturan shift, hari libur, dan kebijakan cuti. Generator kami akan mematuhi semua aturan yang Anda tetapkan.',
    duration: 1500
  },
  {
    num: '03',
    icon: CalendarRange,
    color: 'from-violet-500 to-violet-600',
    title: 'Generate Jadwal Otomatis',
    desc: 'Klik satu tombol — jadwal 1 bulan penuh langsung jadi. Edit manual tetap bisa jika diperlukan penyesuaian.',
    duration: 2000
  },
  {
    num: '04',
    icon: BarChart3,
    color: 'from-emerald-500 to-emerald-600',
    title: 'Monitor & Laporan Harian',
    desc: 'Pantau kehadiran real-time. Laporan harian dikirim otomatis ke email Anda setiap pagi hari kerja.',
    duration: 2500
  },
]
</script>

<template>
    <section id="cara-kerja" class="py-24 bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900 relative overflow-hidden">
        <div class="absolute top-0 left-1/4 w-80 h-80 bg-indigo-600/20 rounded-full blur-3xl pointer-events-none"/>
        <div class="absolute bottom-0 right-1/4 w-80 h-80 bg-sky-600/20 rounded-full blur-3xl pointer-events-none"/>
        <div class="relative max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <div data-aos="zoom-in-up" class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/10 border border-white/20 text-sky-300 mb-4">
                    <span class="text-[0.78rem] font-semibold">
                    CARA KERJA
                    </span>
                </div>
                <h2 data-aos="fade-up" class="text-white mb-4 font-extrabold leading-tight text-[clamp(1.75rem,4vw,2.5rem)]">
                    Mulai dalam 4 langkah mudah
                </h2>
                <p data-aos="fade-down" class="text-slate-400 text-base leading-7">
                    Tidak perlu training panjang. Tim Anda bisa langsung produktif dari
                    hari pertama.
                </p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div v-for="(step, i) in steps" :key="step.num" class="relative group" data-aos="zoom-in-up" :data-aos-duration="step.duration">
                    <div v-if="i < steps.length - 1" class="hidden lg:block absolute top-10 left-full w-full h-px bg-gradient-to-r from-white/20 to-transparent z-0 -translate-x-1/2"/>
                    <div class="relative z-10 bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6 hover:bg-white/10 transition-all hover:border-white/20 hover:-translate-y-1">
                        <span class="text-white/20 text-[2.5rem] font-black leading-none block mb-3">
                            {{ step.num }}
                        </span>
                        <div :class="[ 'w-12 h-12 rounded-xl bg-gradient-to-br flex items-center justify-center text-white mb-4 shadow-lg', step.color]">
                            <component :is="step.icon" class="w-6 h-6"/>
                        </div>
                        <h3 class="text-white text-base font-bold mb-2">
                            {{ step.title }}
                        </h3>
                        <p class="text-slate-400 text-sm leading-[1.65]">
                            {{ step.desc }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>