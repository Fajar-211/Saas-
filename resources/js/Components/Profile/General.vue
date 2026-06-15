<script setup>
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import { ref } from 'vue';

const loading = ref(false);
const form = ref({
    first_name: '',
    last_name: '',
    middle_name: '',
    phone: '',
    gender: '',
    date_of_birth: '',
    address: ''
})
const errors = ref({})
const submit = async () => {
    try {
        loading.value = true;
        const response = await axios.patch('/api/profile/update', form.value);
    } catch (error) {
        if(error?.response?.status == 422){
            errors.value = error?.response?.data?.errors
        }
    }finally {
        loading.value = false;
    }
}
</script>

<template>
    <form @submit.prevent="submit">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-8">
            <div>
                <div>
                    <InputLabel>
                        First Name
                    </InputLabel>
                    <TextInput
                        type="text"
                        class="my-1 mx-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        v-model="form.first_name"
                        autocomplete="firstname"
                        
                        placeholder="Enter your first name"
                    />
                    <InputError class="mt-2" :message="errors?.first_name?.[0]" />
                </div>

                <div>
                    <InputLabel>
                        Last Name
                    </InputLabel>
                    <TextInput
                        type="text"
                        class="my-1 mx-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        v-model="form.last_name"
                        autocomplete="lastname"
                        placeholder="Enter your last name"
                    />
                    <InputError class="mt-2" :message="errors?.last_name?.[0]" />
                </div>

                <div>
                    <InputLabel>
                        Gender
                    </InputLabel>
                    <select class="my-1 mx-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" v-model="form.gender">
                        <option value="" disabled>Select your gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <InputError class="mt-2" :message="errors?.gender?.[0]" />
                </div>

                <div>
                    <InputLabel>
                        Date of Birth
                    </InputLabel>
                    <TextInput
                        type="date"
                        v-model="form.date_of_birth"
                        class="my-1 mx-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    />
                    <InputError class="mt-2" :message="errors?.date_of_birth?.[0]" />
                </div>
            </div>

            <div>
                <div>
                    <InputLabel>
                        Middle Name
                    </InputLabel>
                    <TextInput
                        type="text"
                        class="my-1 mx-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        v-model="form.middle_name"
                        autocomplete="middlename"
                        placeholder="Enter your middle name"
                    />
                    <InputError class="mt-2" :message="errors?.middle_name?.[0]" />
                </div>

                <div>
                    <InputLabel>
                        Phone
                    </InputLabel>
                    <div class="flex my-1 w-full">
                        <div class="my-1 mx-2 rounded-md border-gray-300 flex items-center justify-center">
                            <span>
                                +62
                            </span>
                        </div>
                        <TextInput
                            type="tel"
                            class="my-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            v-model="form.phone"
                            autocomplete="phone"
                            placeholder="Enter your phone number"
                        />
                    </div>
                    <InputError class="mt-2" :message="errors?.phone?.[0]" />
                </div>

                <div>
                    <InputLabel>
                        Address
                    </InputLabel>
                    <textarea class="my-1 mx-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" v-model="form.address" placeholder="Enter your address"></textarea>
                    <InputError class="mt-2" :message="errors?.address?.[0]" />
                </div>
            </div>
            
        </div>
        <button type="submit" :disabled="loading" :class="[loading ? 'cursor-not-allowed opacity-50' : 'cursor-pointer opacity-100', 'bg-blue-500 text-white px-5 py-2 rounded-full w-full my-2 hover:bg-blue-600 transition-all duration-200']">
            {{ loading ? 'Saving' : 'Edit' }}
        </button>
    </form>
</template>