<script setup>
import MyInput from '@/Components/MyInput.vue';
import InputError from '@/Components/InputError.vue';
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';

const employee_name = ref(null);
const employee_id = ref(null);
const employee_position = ref(null);
const employee_salary = ref(null);
const employee_schedule = ref(null);

const form = useForm({
    employee_name: '',
    employee_id: '',
    employee_position: '',
    employee_salary: '',
    employee_schedule: '',
})
</script>

<template>
    <div>
        <InputLabel for="employee_name" value="Employee Name" />
        <MyInput id="employee_name" autofocus v-model="form.employee_name" ref="employee_name" />
        <InputError :message="form.employee_name" class="mt-2" />
    </div>
</template>

<style scoped></style>
