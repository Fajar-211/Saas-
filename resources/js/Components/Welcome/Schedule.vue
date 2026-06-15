<script setup>
const schedules = [
  {
    day: "Sen, 2 Jun",
    name: "Andi P.",
    shift: "08:00–17:00",
    div: "Engineering",
  },
  {
    day: "Sen, 2 Jun",
    name: "Sari D.",
    shift: "09:00–18:00",
    div: "HR",
  },
  {
    day: "Sel, 3 Jun",
    name: "Budi S.",
    shift: "08:00–17:00",
    div: "Marketing",
  },
  {
    day: "Sel, 3 Jun",
    name: "Rina K.",
    shift: "10:00–19:00",
    div: "Finance",
  },
];
</script>
<template>
  <div class="space-y-2 p-4">

    <div
      v-for="(r, i) in schedules"
      :key="i"
      class="flex items-center gap-3 p-2.5 bg-white rounded-lg border border-slate-100 shadow-sm">

      <div
        class="w-2 h-8 rounded-full bg-gradient-to-b from-indigo-500 to-sky-400 shrink-0" />

      <div class="flex-1 min-w-0">
        <p
          class="text-slate-800 truncate text-[0.78rem] font-semibold">
          {{ r.name }} · {{ r.div }}
        </p>

        <p class="text-slate-400 text-[0.7rem]">
          {{ r.day }} · {{ r.shift }}
        </p>
      </div>

      <span
        class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-600 border border-emerald-200 text-[0.65rem] font-semibold">
        ✓
      </span>

    </div>

    <div
      class="mt-3 p-3 rounded-lg bg-indigo-600 text-white text-center text-[0.78rem] font-semibold">

      ✨ Jadwal Juni 2025 siap untuk 128 karyawan

    </div>

  </div>
</template>