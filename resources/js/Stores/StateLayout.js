import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useStateLayout = defineStore('stateLayout', () => {
    const layout = ref('dashboard');
    return {
        layout
    };
});