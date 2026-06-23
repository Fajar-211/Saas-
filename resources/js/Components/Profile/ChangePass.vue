<script setup>
import { computed, ref, watch } from 'vue'
import { ArrowLeft, Eye, EyeOff, Lock, ShieldCheck } from 'lucide-vue-next'

const same = ref(false);
const showPassword = ref({
    current: false,
    new: false,
    confirm: false,
})
const form = ref({
    current: '',
    new: '',
    confirm: ''
})
function reset(){
    form.value.current = '';
    form.value.new = '';
    form.value.confirm = ''
}
const strength = computed(() => {
    let score = 0

    if (form.value.new.length >= 8) score += 20
    if (/[A-Z]/.test(form.value.new)) score += 20
    if (/[a-z]/.test(form.value.new)) score += 20
    if (/[0-9]/.test(form.value.new)) score += 20
    if (/[^A-Za-z0-9]/.test(form.value.new)) score += 20

    return score
})
watch(()=> form.value.confirm, (newconfirm)=>{
    if(newconfirm != form.value.new){
        same.value = true;
    }else{
        same.value = false;
    }
}, {immediate:true})
watch(()=> form.value.new, (newpas)=>{
    if(newpas != form.value.confirm){
        same.value = true;
    }else{
        same.value = false;
    }
},{immediate:true})
const balok = computed(()=>{
    return strength.value / 20;
})
const color = ['#DC2626', '#F97316', '#FACC15', '#4648D4', '#16A34A'];

async function changepass() {
    if(form.value.current === '' || form.value.new === '' || form.value.confirm == ''){
        return;
    }
    try{
        console.log('ok');
    }catch(error){

    }finally{

    }
}
</script>

<template>
    <section class="w-full mx-auto">
        <div class="p-12 bg-white">

            <!-- Back -->
            <button class="flex items-center gap-2 mb-8 font-medium text-thrid-admin font-second hover:opacity-80 transition-all">
                <ArrowLeft :size="18" />
                <span>Back</span>
            </button>

            <!-- Header -->
            <div class="mb-10">
                <div class="flex items-center justify-center w-16 h-16 mb-6 rounded-2xl bg-primary-admin">
                    <ShieldCheck :size="28" class="text-thrid-admin" />
                </div>

                <h1 class="mb-3 text-5xl text-forth-admin font-title">
                    Change Password
                </h1>

                <p class="max-w-lg text-slate-500 font-second">
                    Update your password to keep your account secure and protect your personal information.
                </p>
            </div>
            <form @submit.prevent="changepass" action="">
                <!-- Content -->
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                    <div class="space-y-6 lg:col-span-2">

                        <!-- Current Password -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-forth-admin font-second">
                                Current Password
                            </label>

                            <div class="relative">
                                <Lock :size="18" class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" />

                                <input
                                    :type="showPassword.current ? 'text' : 'password'"
                                    v-model="form.current"
                                    placeholder="Enter your current password"
                                    class="w-full h-14 pl-12 pr-12 rounded-2xl border border-second-admin bg-primary-admin font-second outline-none transition-all focus:border-thrid-admin focus:ring-4 focus:ring-blue-100"
                                />

                                <button
                                    type="button"
                                    @click="showPassword.current = !showPassword.current"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-thrid-admin transition-colors"
                                >
                                    <Eye v-if="!showPassword.current" :size="18" />
                                    <EyeOff v-else :size="18" />
                                </button>
                            </div>
                        </div>

                        <!-- New Password -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-forth-admin font-second">
                                New Password
                            </label>

                            <div class="relative">
                                <Lock :size="18" class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" />

                                <input
                                    :type="showPassword.new ? 'text' : 'password'"
                                    v-model="form.new"
                                    placeholder="Enter your new password"
                                    class="w-full h-14 pl-12 pr-12 rounded-2xl border border-second-admin bg-primary-admin font-second outline-none transition-all focus:border-thrid-admin focus:ring-4 focus:ring-blue-100"
                                />

                                <button
                                    type="button"
                                    @click="showPassword.new = !showPassword.new"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-thrid-admin transition-colors"
                                >
                                    <Eye v-if="!showPassword.new" :size="18" />
                                    <EyeOff v-else :size="18" />
                                </button>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-forth-admin font-second">
                                Confirm Password
                            </label>

                            <div class="relative">
                                <Lock :size="18" class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" />
                                <input
                                    :type="showPassword.confirm ? 'text' : 'password'"
                                    v-model="form.confirm"
                                    placeholder="Confirm your new password"
                                    class="w-full h-14 pl-12 pr-12 rounded-2xl border border-second-admin bg-primary-admin font-second outline-none transition-all focus:border-thrid-admin focus:ring-4 focus:ring-blue-100"
                                />

                                <button
                                    type="button"
                                    @click="showPassword.confirm = !showPassword.confirm"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-thrid-admin transition-colors"
                                >
                                    <Eye v-if="!showPassword.confirm" :size="18" />
                                    <EyeOff v-else :size="18" />
                                </button>
                            </div>
                            <p v-if="same" class="mt-1.5 text-red-400 text-sm">
                                Password tidak sama
                            </p>
                        </div>

                    </div>
                    <!-- Password Requirements -->
                    <div class="p-6 border rounded-3xl border-second-admin bg-primary-admin">
                        <h3 class="mb-4 text-xl font-title text-forth-admin">
                            Password Requirements
                        </h3>

                        <ul class="space-y-3 text-sm text-slate-600 font-second">
                            <li class="flex items-center gap-2">
                                <span class="text-thrid-admin">✓</span>
                                At least 8 characters
                            </li>

                            <li class="flex items-center gap-2">
                                <span class="text-thrid-admin">✓</span>
                                One uppercase letter
                            </li>

                            <li class="flex items-center gap-2">
                                <span class="text-thrid-admin">✓</span>
                                One lowercase letter
                            </li>

                            <li class="flex items-center gap-2">
                                <span class="text-thrid-admin">✓</span>
                                One number
                            </li>

                            <li class="flex items-center gap-2">
                                <span class="text-thrid-admin">✓</span>
                                One special character
                            </li>
                        </ul>

                        <!-- Strength -->
                        <div class="mt-8">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-forth-admin font-second">
                                    Password Strength
                                </span>

                                <span class="text-sm font-medium text-thrid-admin font-second">
                                    {{ strength }} %
                                </span>
                            </div>
                            <div class="grid grid-cols-5 gap-x-1.5">
                                <div v-for="(brick, index) in balok" class="h-2 overflow-hidden rounded-full bg-second-admin">
                                    <div class="w-full h-full rounded-full" :style="{ backgroundColor: color[index] }"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Footer -->
                <div class="flex justify-end gap-4 pt-8 mt-10 border-t border-second-admin">
                    <button type="submit" class="h-12 px-6 rounded-xl bg-thrid-admin text-white font-second font-medium shadow-lg shadow-[#4648D4]/20 hover:scale-105 transition-all">
                        Update Password
                    </button>
                </div>
            </form>
        </div>
    </section>
</template>