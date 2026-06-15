<script setup>
    const divisions = [
        {
            div: 'Engineering',
            count: 42,
            color: 'bg-sky-200',
            pct: 22
        },
        {
            div: 'Marketing',
            count: 28,
            color: 'bg-green-400',
            pct: 18
        },
        {
            div: 'Finance',
            count: 21,
            color: 'bg-red-400',
            pct: 15
        },
         {
            div: 'HR',
            count: 18,
            color: 'bg-orange-400',
            pct: 12
        },
         {
            div: 'Operation',
            count: 19,
            color: 'bg-emerald-400',
            pct: 13
        }
    ]
</script>
<template>
  <div class="p-4 space-y-3">

    <div
      v-for="item in divisions"
      :key="item.div"
      class="space-y-1">

      <div class="flex justify-between">
        <span class="text-slate-700 text-[0.78rem] font-semibold">
          {{ item.div }}
        </span>

        <span class="text-slate-400 text-[0.75rem]">
          {{ item.count }} org
        </span>
      </div>

      <div class="h-2 rounded-full bg-slate-100 overflow-hidden">
        <div
          :class="`h-full rounded-full ${item.color}`"
          :style="{ width: `${item.pct * 3}%` }" />
      </div>

    </div>

    <div
      class="flex items-center justify-between pt-2 border-t border-slate-100">

      <span class="text-slate-500 text-[0.75rem]">
        Total karyawan
      </span>

      <span class="text-slate-800 font-bold">
        128 orang
      </span>

    </div>

  </div>
</template>