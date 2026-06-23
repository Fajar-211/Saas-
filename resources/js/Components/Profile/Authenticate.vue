<script setup>
const emit = defineEmits(['open']);
</script>

<template>
    <div class="p-8 md:p-10 lg:p-12 bg-second-admin">
        <h3 class="font-semibold mb-4 flex items-center gap-x-1.5">
            <svg class="fill-current" width="15px" height="18px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                <g>
                    <path d="M50.027,10.459l-0.018-0.032L16.403,29.831l0.076,0.132v22.893h0.014c0.286,19.111,14.859,34.755,33.519,36.718
                        c18.66-1.962,33.234-17.606,33.519-36.718V29.953l0.066-0.114L50.027,10.459z M50.012,79.556V51.677H26.435V35.651L50.012,22.04
                        v29.637h23.563v1.179h0.017C73.314,66.449,63.153,77.654,50.012,79.556z"/>
                </g>
            </svg>
            Authentication
        </h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 p-4">
            <button type="button" @click="emit('open', true)" class="flex items-center justify-between bg-white p-4 sm:p-5 md:p-6 rounded-lg ring-1 ring-slate-300 hover:scale-105 focus-within:ring-thrid-admin active:scale-100 transition-all duration-300 ease-in-out">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-lg bg-second-admin text-thrid-admin flex items-center justify-center">
                        <svg class="fill-current w-5 h-5" viewBox="0 0 36 36" version="1.1"  preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>lock-line</title>
                            <path class="clr-i-outline clr-i-outline-path-1" d="M18.09,20.59A2.41,2.41,0,0,0,17,25.14V28h2V25.23a2.41,2.41,0,0,0-.91-4.64Z"></path><path class="clr-i-outline clr-i-outline-path-2" d="M26,15V10.72a8.2,8.2,0,0,0-8-8.36,8.2,8.2,0,0,0-8,8.36V15H7V32a2,2,0,0,0,2,2H27a2,2,0,0,0,2-2V15ZM12,10.72a6.2,6.2,0,0,1,6-6.36,6.2,6.2,0,0,1,6,6.36V15H12ZM9,32V17H27V32Z"></path>
                            <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
                        </svg>
                    </div>

                    <div class="mx-2.5">
                        <p class="font-medium text-sm font-second text-left">
                            Change password
                        </p>

                        <p class="text-xs text-gray-400 font-second">
                            Last updated at 1 month ago
                        </p>
                    </div>
                </div>
                
                <div class="text-black">
                    <svg class="fill-current" width="16px" height="16px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#555" fill-rule="evenodd" d="M7.05307007,2.15808105 L14.2962587,9.41418482 C14.4320862,9.5496827 14.5,9.71077067 14.5,9.89744874 C14.5,10.0841268 14.4320862,10.2497803 14.2962587,10.3944092 C11.6760845,12.9498393 9.15095523,15.4168071 6.72087106,17.7953128 C6.5962677,17.912323 6.09560574,18.2032928 5.70989407,17.7705688 C5.3241824,17.3378448 5.55848694,16.9602509 5.70989407,16.8045692 C7.97174895,14.594209 10.3279004,12.2918355 12.7783485,9.89744874 L6.03100586,3.13816833 C5.78524099,2.79925826 5.80526899,2.48632792 6.09108986,2.19937732 C6.37691073,1.91242672 6.6975708,1.8986613 7.05307007,2.15808105 Z"/>
                    </svg>
                </div>
            </button>
        </div>
    </div>
    
</template>