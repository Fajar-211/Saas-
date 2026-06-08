<script setup>
import { Link } from '@inertiajs/vue3';


</script>

<template>
    <footer class="relative px-6 md:px-16 lg:px-24 xl:px-32 mt-40 w-full text-slate-500">
        <div class="flex flex-col md:flex-row justify-between w-full gap-10 border-b border-gray-200 pb-6">
            <div class="md:max-w-114">
                <img id="logo-footer" class="h-9 md:h-9.5 w-auto shrink-0" src="/assets/logo.svg" alt="Logo"
                    width={140} height={40} priority fetchPriority="high" />
                <p class="mt-6">
                    Launch your SaaS product in record time with our all-in-one platform designed for speed, flexibility
                    and growth. Whether you`&apos;re a solo founder or a fast-moving team, we provide everything you
                    need.
                </p>
            </div>
            <div class="flex-1 flex items-start md:justify-end gap-20">
                <div>
                    <h2 class="font-semibold mb-5">Company</h2>
                    <ul class="space-y-2">
                        <li>
                            <Link :href="route('home')" class="hover:text-indigo-600 transition">Home</Link>
                        </li>
                        <li>
                            <Link :href="route('login')" class="hover:text-indigo-600 transition">Sign in</Link>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="font-semibold mb-5">Get in touch</h2>
                    <div class="space-y-2">
                        <p>+1-212-456-7890</p>
                        <p>contact@example.com</p>
                    </div>
                </div>
            </div>
        </div>
        <p class="pt-4 text-center pb-5">
            Copyright 2026 © <a href="https://prebuiltui.com?utm_source=saasly">PrebuiltUI</a>. All Right Reserved.
        </p>
    </footer>
</template>

<style scoped>

</style>