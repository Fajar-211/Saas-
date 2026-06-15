<script setup>
import {
    CalendarDays,
    Users,
    FileBarChart2,
    Zap,
    Shield,
    Bell,
} from "lucide-vue-next";
import Schedule from "./Schedule.vue";
import Employe from "./Employe.vue";
import Report from "./Report.vue";

const jadwal = [
    "Jadwal 1 bulan dalam < 10 detik",
    "Deteksi konflik jadwal otomatis",
    "Export ke Excel & PDF",
    "Notifikasi perubahan real-time",
]
const karyawan = [
    "Struktur organisasi visual",
    "Multi-level divisi & sub-divisi",
    "Manajemen hak akses per peran",
    "Import karyawan via Excel",
]
const laporan = [
    "Rekap kehadiran real-time",
    "Laporan keterlambatan & absensi",
    "Kirim otomatis ke email manajer",
    "Grafik tren bulanan & mingguan",
]

const extras = [
    {
        icon: Zap,
        title: "Integrasi Cepat",
        desc: "Hubungkan dengan sistem HR, fingerprint, dan payroll dalam 1 klik.",
    },
    {
        icon: Shield,
        title: "Keamanan Data",
        desc: "Data karyawan dilindungi enkripsi end-to-end dan sesuai regulasi.",
    },
    {
        icon: Bell,
        title: "Notifikasi Pintar",
        desc: "Peringatan otomatis untuk perubahan jadwal, absensi, dan laporan.",
    },
];
</script>

<template>
    <section id="fitur" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Header -->
            <div class="text-center max-w-2xl mx-auto mb-16">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-indigo-50 border border-indigo-100 text-indigo-600 mb-4">
                    <span class="text-xs font-semibold">
                        FITUR UNGGULAN
                    </span>
                </div>
                <h2
                    class="text-slate-900 mb-4 text-3xl md:text-5xl font-second font-bold">
                    Semua yang dibutuhkan tim HRD Anda
                </h2>
                <p class="text-slate-500 leading-8 font-second">
                    Dari jadwal otomatis hingga laporan harian — satu platform
                    lengkap untuk manajemen SDM modern.
                </p>
            </div>

            <!-- Main Feature -->
            <div class="space-y-12 grid grid-cols-1 gap-y-2 md:gap-y-5">
                <div class="grid lg:grid-cols-2 gap-10 items-center">
                    <div data-aos="zoom-in-up" class="space-y-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-500 to-indigo-600 flex items-center justify-center text-white shadow-lg">
                                <component :is="CalendarDays" class="w-6 h-6" />
                            </div>
                            <span class="px-3 py-1 rounded-full text-sm font-semibold font-second bg-indigo-100 text-indigo-700">
                                Inti Utama
                            </span>
                        </div>
                        <div>
                            <h3 class="text-slate-900 mb-3 text-2xl font-bold font-second">
                                Generate Jadwal Otomatis
                            </h3>
                            <p class="text-slate-500 leading-7 font-second">
                                Buat jadwal shift karyawan selama 1 bulan penuh hanya dalam hitungan detik.
                            </p>
                        </div>
                        <ul class="space-y-3">
                            <li v-for="point in jadwal" :key="point" class="flex items-start gap-3">
                                <div class="w-5 h-5 rounded-full bg-indigo-50 border-indigo-100 border flex items-center justify-center shrink-0 mt-0.5 font-second">
                                    <span class="text-indigo-600">
                                        ✓
                                    </span>
                                </div>
                                <span class="text-slate-600">
                                    {{ point }}
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div data-aos="zoom-in-up">
                        <schedule />
                    </div>
                </div>
                <div class="grid lg:grid-cols-2 gap-10 items-center">
                    <div data-aos="zoom-in-up" class="space-y-6 md:hidden">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-sky-500 to-sky-600 flex items-center justify-center text-white shadow-lg">
                                <component :is="Users" class="w-6 h-6" />
                            </div>
                            <span class="px-3 py-1 rounded-full text-sm font-semibold font-second bg-sky-100 text-sky-700">
                                Manajemen
                            </span>
                        </div>
                        <div>
                            <h3 class="text-slate-900 mb-3 text-2xl font-bold font-second">
                                Manajemen Karyawan & Divisi
                            </h3>
                            <p class="text-slate-500 leading-7 font-second">
                                Kelola semua data karyawan dan struktur organisasi dengan mudah.
                            </p>
                        </div>
                        <ul class="space-y-3">
                            <li v-for="point in karyawan" :key="point" class="flex items-start gap-3">
                                <div class="w-5 h-5 rounded-full bg-sky-50 border-sky-100 border flex items-center justify-center shrink-0 mt-0.5 font-second">
                                    <span class="text-sky-600">
                                        ✓
                                    </span>
                                </div>
                                <span class="text-slate-600">
                                    {{ point }}
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div data-aos="zoom-in-up">
                        <employe />
                    </div>
                    <div data-aos="zoom-in-up" class="space-y-6 hidden md:block">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-sky-500 to-sky-600 flex items-center justify-center text-white shadow-lg">
                                <component :is="Users" class="w-6 h-6" />
                            </div>
                            <span class="px-3 py-1 rounded-full text-sm font-semibold font-second bg-sky-100 text-sky-700">
                                Manajemen
                            </span>
                        </div>
                        <div>
                            <h3 class="text-slate-900 mb-3 text-2xl font-bold font-second">
                                Manajemen Karyawan & Divisi
                            </h3>
                            <p class="text-slate-500 leading-7 font-second">
                                Kelola semua data karyawan dan struktur organisasi dengan mudah.
                            </p>
                        </div>
                        <ul class="space-y-3">
                            <li v-for="point in karyawan" :key="point" class="flex items-start gap-3">
                                <div class="w-5 h-5 rounded-full bg-sky-50 border-sky-100 border flex items-center justify-center shrink-0 mt-0.5 font-second">
                                    <span class="text-sky-600">
                                        ✓
                                    </span>
                                </div>
                                <span class="text-slate-600">
                                    {{ point }}
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="grid lg:grid-cols-2 gap-10 items-center">
                    <div data-aos="zoom-in-up" class="space-y-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center text-white shadow-lg">
                                <component :is="FileBarChart2" class="w-6 h-6" />
                            </div>
                            <span class="px-3 py-1 rounded-full text-sm font-semibold font-second bg-emerald-100 text-emerald-700">
                                Laporan
                            </span>
                        </div>
                        <div>
                            <h3 class="text-slate-900 mb-3 text-2xl font-bold font-second">
                                Laporan Harian Karyawan
                            </h3>
                            <p class="text-slate-500 leading-7 font-second">
                                Pantau kehadiran, produktivitas, dan performa karyawan setiap hari.
                            </p>
                        </div>
                        <ul class="space-y-3">
                            <li v-for="point in laporan" :key="point" class="flex items-start gap-3">
                                <div class="w-5 h-5 rounded-full bg-emerald-50 border-emerald-100 border flex items-center justify-center shrink-0 mt-0.5 font-second">
                                    <span class="text-emerald-600">
                                        ✓
                                    </span>
                                </div>
                                <span class="text-slate-600">
                                    {{ point }}
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div data-aos="zoom-in-up">
                        <report />
                    </div>
                </div>
            </div>

            <!-- Extra Feature -->
            <div class="grid md:grid-cols-3 gap-6 mt-16 pt-12 border-t border-slate-100">
                <div data-aos="flip-up" data-aos-duration="1000" class="flex gap-4 p-5 rounded-2xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-200">
                    <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center">
                        <component :is="Zap" class="w-5 h-5" />
                    </div>
                    <div>
                        <p class="text-slate-800 mb-1 font-semibold font-second">
                            Integrasi Cepat
                        </p>

                        <p class="text-slate-500 text-sm leading-6 font-second">
                            Hubungkan dengan sistem HR, fingerprint, dan payroll dalam 1 klik.
                        </p>
                    </div>
                </div>
                <div data-aos="flip-up" data-aos-duration="1500" class="flex gap-4 p-5 rounded-2xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-200">
                    <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center">
                        <component :is="Shield" class="w-5 h-5" />
                    </div>
                    <div>
                        <p class="text-slate-800 mb-1 font-semibold font-second">
                            Keamanan Data
                        </p>

                        <p class="text-slate-500 text-sm leading-6 font-second">
                            Data karyawan dilindungi enkripsi end-to-end dan sesuai regulasi.
                        </p>
                    </div>
                </div>
                <div data-aos="flip-up" data-aos-duration="2000" class="flex gap-4 p-5 rounded-2xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-200">
                    <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center">
                        <component :is="Bell" class="w-5 h-5" />
                    </div>
                    <div>
                        <p class="text-slate-800 mb-1 font-semibold font-second">
                            Notifikasi Pintar
                        </p>

                        <p class="text-slate-500 text-sm leading-6 font-second">
                            Peringatan otomatis untuk perubahan jadwal, absensi, dan laporan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>