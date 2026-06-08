<script setup>
const emit = defineEmits(['open']);
const props = defineProps(['masterbutton']);
const handle = ()=>{
    if(props.masterbutton == false){
        emit('open', true);
    }else{
        emit('open', false);
    }
}
</script>

<template>
    <button type="button" @click="handle" class="p-2 text-sm md:text-lg font-medium text-left hover:ring-2 hover:ring-sky-200 rounded-lg flex justify-between">
        <slot />

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