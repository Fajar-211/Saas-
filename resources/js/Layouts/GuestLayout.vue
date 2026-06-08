<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
const mobile = ref(false);

onMounted(()=>{
    mobile.value = true;
})
</script>

<template>
    <div
        class="flex min-h-screen flex-col items-center bg-white pt-6 justify-center sm:pt-0"
    >
        <!-- <div>
            <Link href="/">
                <ApplicationLogo class="h-20 w-20 fill-current text-gray-500" />
            </Link>
        </div> -->

        <div
            class="mt-6 w-full overflow-hidden shadow-md sm:max-w-md sm:rounded-lg grid grid-cols-1 md:grid-cols-2 md:max-w-4xl"
        >
            <div class="content-end relative">
                <img src="/assets/login.png" class="hidden md:block">
                <Transition name="slide-b">
                    <img v-if="mobile" src="/assets/login2.png" alt="" class="md:hidden max-w-64 mx-auto translate-y-3">
                </Transition>
            </div>
            <div class="bg-slate-100">
                <slot />
            </div>
        </div>
    </div>
</template>

<style scoped>
.slide-b-enter-active {
  transition: all 1s ease-out;
}

.slide-b-leave-active {
  transition: all 1s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-b-enter-from,
.slide-b-leave-to {
  transform: translateY(-40px);
  opacity: 0;
}
</style>
