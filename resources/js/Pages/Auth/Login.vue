<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

const bounce = ref(false);
const top = ref(false);
const btn = ref(false);
onMounted(()=>{
    bounce.value = true
    top.value = true;
    btn.value = true;
})
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
            {{ status }}
        </div>
        <div class="px-5 py-7">
            <form @submit.prevent="submit">
                <Transition name="bounce">
                    <h2 v-if="bounce" class="text-2xl font-bold mb-9 text-center text-gray-800">Sign Up</h2>
                </Transition>

                <Transition name="slide-b">
                    <div v-if="btn">
                        <div class="flex items-center my-2 border bg-indigo-500/5 border-gray-500/10 rounded gap-1 pl-2">
                            <svg width="18" height="18" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="m2.5 4.375 3.875 2.906c.667.5 1.583.5 2.25 0L12.5 4.375" stroke="#6B7280" stroke-opacity=".6" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M11.875 3.125h-8.75c-.69 0-1.25.56-1.25 1.25v6.25c0 .69.56 1.25 1.25 1.25h8.75c.69 0 1.25-.56 1.25-1.25v-6.25c0-.69-.56-1.25-1.25-1.25Z" stroke="#6B7280" stroke-opacity=".6" stroke-width="1.3" stroke-linecap="round"/>
                            </svg>
                            <TextInput
                                id="email"
                                type="email"
                                class="my-1 mx-2 block w-full"
                                v-model="form.email"
                                required
                                autofocus
                                autocomplete="username"
                            />
                        </div>
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>
                </Transition>

                <Transition name="slide-t">
                    <div v-if="top" class="mt-4">
                        <div class="flex items-center mt-2 mb-8 border bg-indigo-500/5 border-gray-500/10 rounded gap-1 pl-2">
                            <svg width="18" height="18" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="m2.5 4.375 3.875 2.906c.667.5 1.583.5 2.25 0L12.5 4.375" stroke="#6B7280" stroke-opacity=".6" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M11.875 3.125h-8.75c-.69 0-1.25.56-1.25 1.25v6.25c0 .69.56 1.25 1.25 1.25h8.75c.69 0 1.25-.56 1.25-1.25v-6.25c0-.69-.56-1.25-1.25-1.25Z" stroke="#6B7280" stroke-opacity=".6" stroke-width="1.3" stroke-linecap="round"/>
                            </svg>
                            <TextInput
                                id="password"
                                type="password"
                                class="my-1 mx-2 block w-full"
                                v-model="form.password"
                                required
                                autocomplete="current-password"
                            />
                        </div>
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>
                </Transition>

                <div class="mt-4 block">
                    <label class="flex items-center">
                        <Checkbox name="remember" v-model:checked="form.remember" />
                        <span class="ms-2 text-sm text-gray-600"
                            >Remember me</span
                        >
                    </label>
                </div>

                <div class="mt-4 flex items-center justify-between">
                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                        Forgot your password?
                    </Link>

                    <PrimaryButton
                        class="max-w-max mb-3 bg-indigo-500 hover:bg-indigo-600 transition-all active:scale-95 py-2.5 rounded text-white font-medium"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Log in
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </GuestLayout>
</template>

<style scoped>
/* we will explain what these classes do next! */
.v-enter-active,
.v-leave-active {
  transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}

.bounce-enter-active {
  animation: bounce-in 0.8s;
}
.bounce-leave-active {
  animation: bounce-in 0.8s reverse;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.25);
  }
  100% {
    transform: scale(1);
  }
}

/*
  bawah ke atas
*/
.slide-b-enter-active {
  transition: all 0.8s ease-out;
}

.slide-b-leave-active {
  transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-b-enter-from,
.slide-b-leave-to {
  transform: translateY(40px);
  opacity: 0;
}

/*
  atas ke bawah
*/
.slide-t-enter-active {
  transition: all 0.8s ease-out;
}

.slide-t-leave-active {
  transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-t-enter-from,
.slide-t-leave-to {
  transform: translateY(-40px);
  opacity: 0;
}
</style>
