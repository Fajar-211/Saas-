<script setup>
const emit = defineEmits(['delete', 'cancel']);
</script>

<template>
    <div class="overflow-y-auto bg-black/40 h-full overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center content-center w-full md:inset-0 max-h-full">
        <div @click.stop="emit('cancel')" class="relative w-full max-w-md max-h-full mx-auto">
            <div class="relative p-4 text-center bg-white rounded-lg shadow sm:p-5">
                <div class="text-slate-500 flex inset-0 justify-center">
                    <svg class="fill-current" width="20px" height="20px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10 3h3v1h-1v9l-1 1H4l-1-1V4H2V3h3V2a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v1zM9 2H6v1h3V2zM4 13h7V4H4v9zm2-8H5v7h1V5zm1 0h1v7H7V5zm2 0h1v7H9V5z"/></svg>
                </div>
                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                <div class="flex justify-center items-center space-x-4">
                    <button type="button" @click="emit('cancel')" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10">No, cancel</button>
                    <button type="submit" @click="emit('delete')" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300">Yes, I'm sure</button>
                </div>
            </div>
        </div>
    </div>
</template>