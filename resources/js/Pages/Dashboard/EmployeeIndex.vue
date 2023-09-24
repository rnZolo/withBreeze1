<script setup >
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Table from '@/Components/Table.vue';
import { Head } from '@inertiajs/vue3';

const table = defineProps({
    data: Array // table th
});
const th = ['name', 'position', 'contact', 'Schedule', 'status'];
</script>

<template>
    <Head title="Dashboard | Employee" />
    <AuthenticatedLayout>
        {{ table.data }}
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard | Employee</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <Table :col="th" :rows="table.data"></Table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
