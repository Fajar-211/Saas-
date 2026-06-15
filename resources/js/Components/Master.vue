<script setup>
import { useStateLayout } from '@/Stores/StateLayout.js';

const nav = useStateLayout();
const emit = defineEmits(['open']);
const props = defineProps(['masterbutton']);
const handle = ()=>{
    if(props.masterbutton == false){
        nav.layout = 'master';
        emit('open', true);
    }else{
        emit('open', false);
    }
}
</script>

<template>
    <button type="button" @click="handle" :class="['p-2 text-sm md:text-lg font-medium text-left hover:ring-2 hover:ring-sky-200 rounded-lg flex justify-between group', nav.layout == 'master' ? 'bg-sky-100' : 'bg-white']">
        <div class="flex gap-x-2">
            <slot />
            <div v-if="props.masterbutton" class="w-5 group-active:scale-50 transition-all duration-500">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 470 470" style="enable-background:new 0 0 470 470;" xml:space="preserve">
                <g>
                    <rect x="137.5" y="190" width="315" height="280"/>
                    <path d="M192.5,102.5V160h30v-57.5C222.5,45.981,176.519,0,120,0S17.5,45.981,17.5,102.5V190h30v-87.5
                        C47.5,62.523,80.023,30,120,30S192.5,62.523,192.5,102.5z"/>
                </g>
                </svg>
            </div>
            <div v-else class="w-5 group-active:scale-50 transition-all duration-500">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 470 470" style="enable-background:new 0 0 470 470;" xml:space="preserve">
                <g>
                    <path d="M162.5,102.5c0-39.977,32.523-72.5,72.5-72.5s72.5,32.523,72.5,72.5V160h30v-57.5C337.5,45.981,291.519,0,235,0
                        S132.5,45.981,132.5,102.5V160h30V102.5z"/>
                    <rect x="77.5" y="190" width="315" height="280"/>
                </g>
                </svg>
            </div>
        </div>

        <div class="flex inset-0">
            <svg
                :class="['m-auto h-4 w-4', props.masterbutton ? 'rotate-180' : 'rotate-0', 'transition-all duration-200']"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
            >
                <path
                    fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                />
            </svg>
        </div>
    </button>
</template>