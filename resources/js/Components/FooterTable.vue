<script setup>
import { ref } from 'vue';
import { watch } from 'vue';

const props = defineProps(['bg', 'pagination']);
const emit = defineEmits(['change']);
const from = ref('');
const to = ref('');
const of = ref('');
watch(()=>props.pagination, (newpagination)=>{
    from.value = newpagination.from;
    to.value = newpagination.to;
    of.value = newpagination.total;
    //console.log('pagination dari footer : ', newpagination);
},{immediate:true})
</script>

<template>
    <nav :class="`flex flex-col bg-${props.bg} md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4`" aria-label="Table navigation">
        <span class="text-sm font-second text-gray-500">
            Showing
            <span class="font-semibold text-gray-900">{{ from }}-{{ to }}</span>
            of
            <span class="font-semibold text-gray-900">{{ of }}</span>
        </span>
        <ul class="inline-flex items-stretch -space-x-px">
            <li v-for="(links, index) in props.pagination.links" :key="index">
                <button v-if="links.label === 'pagination.previous'" type="button" @click="emit('change', links.page)" :disabled="props.pagination.current_page == 1" :class="props.pagination.current_page == 1 ? ' opacity-50 cursor-not-allowed' : 'opacity-100 cursor-pointer hover:bg-gray-100 hover:text-gray-700'" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300">
                    <span class="sr-only">Previous</span>
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
                <button v-else-if="links.label === 'pagination.next'" type="button" @click="emit('change', links.page)" :disabled="props.pagination.current_page == props.pagination.last_page" :class="props.pagination.current_page == props.pagination.last_page ? 'opacity-50 cursor-not-allowed' : 'opacity-100 cursor-pointer hover:bg-gray-100 hover:text-gray-700'" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300">
                    <span class="sr-only">Next</span>
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
                <button v-else type="button" @click="emit('change', links.page)" :class="links.active ? 'text-primary-600 bg-primary-50 border-primary-300' : 'text-gray-500 bg-white border-gray-300'" class="flex items-center font-second justify-center text-sm py-2 px-3 leading-tight border hover:bg-gray-100 hover:text-gray-700">{{ links.page }}</button>
            </li>
        </ul>
    </nav>
</template>