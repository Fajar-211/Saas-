<script setup>
import { ref } from 'vue';
import axios from 'axios';

const email = ref('');
const loading = ref(false);
const err = ref('');
const sending = ref(false);
const emit = defineEmits(['error', 'succes', 'close']);
async function send() {
    try{
        loading.value = true;
        const response = await axios.post('/api/forget-password', {
            email: email.value
        });
        sending.value = true;
    }catch(error){
        if(error?.response?.status === 422){
            err.value = error?.response?.data?.message;
        }else{
            emit('error', { message:error?.response?.data?.message, code:error?.response?.status});
        }
    }finally{
        loading.value = false;
    }
}
function reset (){
    err.value = '';
    email.value = '';
    sending.value = false;
}
function close(){
    if(loading.value == false){
        reset();
        emit('close');
    };
}
</script>

<template>
    <div @click="close" class="fixed inset-0 z-[9999] bg-black/50 flex items-center justify-center p-6">
        <div @click.stop class="w-full max-w-2xl rounded-[32px] bg-white/10 backdrop-blur-xl border border-white/10 shadow-[0_20px_80px_rgba(0,0,0,0.4)] p-8">
            <p class="mb-8 font-second text-second-admin">
                Set up 2-step verification to protect your account.
            </p>
             <form @submit.prevent="send" action="">
                <div class="mb-6">
                    <h2 class="text-white font-semibold mb-2">
                        Enter your email address
                    </h2>
                    <div class="h-14">
                        <p class="text-second-admin text-sm mb-2 font-primary">
                            We will send token to your email.
                        </p>
                        <p v-if="sending" class="font-primary text-sm text-emerald-300 flex items-center gap-x-1.5">
                            <svg class="fill-current" width="15px" height="15px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M18.71,7.21a1,1,0,0,0-1.42,0L9.84,14.67,6.71,11.53A1,1,0,1,0,5.29,13l3.84,3.84a1,1,0,0,0,1.42,0l8.16-8.16A1,1,0,0,0,18.71,7.21Z"/></svg>
                            Token has been successfully sent to your email.
                        </p>
                    </div>
                    <input type="email" v-model="email" class="w-full h-14 rounded-2xl bg-white/5 font-primary border border-cyan-400 text-center text-white text-xl font-bold outline-none focus:border-blue-500 transition-all" placeholder="email addres" />
                    <p v-if="err" class="text-red-300 font-second my-2">{{ err }}</p>
                </div>
                <button type="submit" :disabled="loading || sending" :class="loading || sending ? 'opacity-50 cursor-not-allowed' : 'opacity-100 cursor-pointer'" class="h-14 w-full rounded-2xl font-second text-white bg-gradient-to-r from-blue-500 to-violet-500 active:scale-105 duration-300 ease-in-out">
                    {{ sending ? 'Check your email' : loading === true ? 'Sending' : 'Send' }}
                </button>
            </form>
        </div>
    </div>
</template>

<style scoped>

</style>