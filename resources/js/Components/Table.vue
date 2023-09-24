
<script >

// data
// onshow data
// onshow cols
// action

import { router } from '@inertiajs/vue3';
export default {
    components: { router },
    props: {
        col: {
            type: Array,
            required: true,
        },
        rows: {
            type: Array,
            default: [],
        },
    },
    methods: {
        edit(id) {
            console.log(id);
            router.get(route('dashboard.employees.edit', { id: id }));
        },
    },

}
</script>
<template>
    <div class="overflow-x-auto ">
        <table class="table w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th v-for="th in col">{{ th }}</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                <tr v-for="row in rows">
                    <td>
                        <div class="flex items-center space-x-3">
                            <div class="font-bold">{{ row["id"] }}</div>
                        </div>
                    </td>
                    <td>
                        <div class="flex items-center space-x-3">
                            <div class="avatar">
                                <div class="mask mask-squircle w-12 h-12">
                                    <!--  <img src="/tailwind-css-component-profile-3@56w.png"
                                        alt="Avatar Tailwind CSS Component" /> -->
                                </div>
                            </div>
                            <div>
                                <div class="font-bold">{{ row["name"] }}<!-- row["th"] to make dynamic--></div>
                            </div>
                        </div>
                    </td>
                    <td>
                        {{ row["email"] }} <!-- row["th"] to make dynamic-->
                        <br />
                        <span class="badge badge-ghost badge-sm"></span>
                    </td>
                    <td>Purple</td>
                    <th>
                        <button class="btn btn-xs" @click="edit(row['id'])">details</button>
                    </th>
                </tr>
            </tbody>
            <!-- foot -->
            <tfoot>
                <tr>
                    <th v-for="th in col">{{ th }}</th>
                </tr>
            </tfoot>

        </table>
    </div>
</template>

