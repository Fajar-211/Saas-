<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, router, useForm } from '@inertiajs/vue3';
import { ref, computed, onMounted, onUnmounted, watch } from 'vue';
import { usePage } from '@inertiajs/vue3';
import axios from 'axios';
import { eror } from '@/Helper/Toast';

const page = usePage();
const same = ref(false);
const err = ref({});
const props = defineProps({
    email: {
        type: String,
        required: true,
    },
    token: {
        type: String,
        required: true,
    },
});
const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});
const loading = ref(false);
const link = computed(()=>{
    return page?.props?.auth?.me ? route(page?.props?.auth?.dashboard) : route('home')
});
watch(()=> form.password_confirmation, (newconfirm)=>{
    if(newconfirm != form.password){
        same.value = true;
    }else{
        same.value = false;
    }
}, {immediate:true})
watch(()=> form.password, (newpas)=>{
    if(newpas != form.password_confirmation){
        same.value = true;
    }else{
        same.value = false;
    }
},{immediate:true})
const strength = computed(() => {
    let score = 0

    if (form.password.length >= 8) score += 20
    if (/[A-Z]/.test(form.password)) score += 20
    if (/[a-z]/.test(form.password)) score += 20
    if (/[0-9]/.test(form.password)) score += 20
    if (/[^A-Za-z0-9]/.test(form.password)) score += 20

    return score
})
const balok = computed(()=>{
    return strength.value / 20;
})
const color = ['#DC2626', '#F97316', '#FACC15', '#4648D4', '#16A34A'];
const totalSeconds = ref(5 * 60) // 5 menit

const countdown = computed(() => {
    const minutes = Math.floor(totalSeconds.value / 60)
    const seconds = totalSeconds.value % 60

    return `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`
})

let interval

onMounted(() => {
    interval = setInterval(() => {
        if (totalSeconds.value > 0) {
            totalSeconds.value--
        } else {
            clearInterval(interval)

            // Redirect atau aksi lain
            router.visit(route(link))
        }
    }, 1000)
})

onUnmounted(() => clearInterval(interval))

const submit = async () => {
    try{
        loading.value = true;
        const response = await axios.patch(`/api/change-password?email=${encodeURIComponent(props.email)}&token=${encodeURIComponent(props.token)}`, form);
        console.log(response?.data)
    }catch(error){
        if(error?.response?.status !== 422){
            eror(error?.response?.status, error?.response?.data?.message)
        }
        err.value = error?.response?.data?.errors;
        console.log(error?.response?.data?.errors)
    }finally{
        loading.value = false;
    }
};
</script>

<template>
    <GuestLayout :reset="true">
        <Head title="Reset Password" />

        <form @submit.prevent="submit">
            <div class="mt-4">
                <InputLabel data-aos="fade-up" data-aos-anchor-placement="center-center" for="password" value="Password" />

                <TextInput
                    data-aos="fade-down"
                    data-aos-anchor-placement="center-center"
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError v-if="err?.password" v-for="(err, index) in err.password" :key="index" class="mt-2" :message="err" />

                <div class="mt-4">
                    <div class="flex items-center justify-between mb-2">
                        <span data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine" class="text-sm font-medium text-forth-admin font-second">
                            Password Strength
                        </span>

                        <span data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine" class="text-sm font-medium text-thrid-admin font-second">
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

            <div class="mt-4">
                <InputLabel data-aos="fade-up"
                    data-aos-anchor-placement="center-center"
                    for="password_confirmation"
                    value="Confirm Password"
                />

                <TextInput
                    data-aos="fade-up"
                    data-aos-anchor-placement="center-center"
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError
                    class="mt-2" v-if="same"
                    :message="'Password is not same'"
                />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <PrimaryButton
                    :class="[loading ? 'opacity-25' : 'opacity-100', same ? 'cursor-not-allowed' : 'cursor-pointer']"
                    :disabled="loading | same"
                >
                    Reset Password
                </PrimaryButton>
            </div>
        </form>
        <ul class="space-y-3 text-sm text-slate-600 font-second">
            <li class="flex items-center gap-2 requirement-item" style="--delay:0s">
                <span class="text-thrid-admin">✓</span>
                At least 8 characters
            </li>

            <li class="flex items-center gap-2 requirement-item" style="--delay:.2s">
                <span class="text-thrid-admin">✓</span>
                One uppercase letter
            </li>

            <li class="flex items-center gap-2 requirement-item" style="--delay:.4s">
                <span class="text-thrid-admin">✓</span>
                One lowercase letter
            </li>

            <li class="flex items-center gap-2 requirement-item" style="--delay:.6s">
                <span class="text-thrid-admin">✓</span>
                One number
            </li>

            <li class="flex items-center gap-2 requirement-item" style="--delay:.8s">
                <span class="text-thrid-admin">✓</span>
                One special character
            </li>
        </ul>
    </GuestLayout>
</template>

<style scoped>
.requirement-item {
    display: flex;
    align-items: center;
    gap: .5rem;

    opacity: 0;
    transform: translateY(15px) scale(.95);

    animation: zoomIn .5s ease forwards;
    animation-delay: var(--delay);
}

@keyframes zoomIn {
    from {
        opacity: 0;
        transform: translateY(15px) scale(.95);
    }

    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}
</style>
