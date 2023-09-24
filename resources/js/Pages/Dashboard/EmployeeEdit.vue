<script setup >
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import BasicInformationForm from './Partials/BasicInformationForm.vue';
import MyInput from '@/Components/MyInput.vue';

</script>

<template>
    <AuthenticatedLayout>
        <BasicInformationForm />
    </AuthenticatedLayout>
</template>

<style scoped></style>
