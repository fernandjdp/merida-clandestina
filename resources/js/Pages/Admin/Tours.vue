<script setup>
import BreezeAdminAuthenticatedLayout from '@/Layouts/Admin.vue';
import Datatable from "@/Components/Datatable.vue";
import TourCard from '@/Components/TourCard.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Dashboard" />

    <BreezeAdminAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tours desde Admin
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Estás en los tours desde admin
                    </div>
                </div>
            </div>
        </div>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <Datatable></Datatable>
                </div>
            </div>
        </div>
        
    </BreezeAdminAuthenticatedLayout>
</template>
<script>

export default {

    data(){
        return {
            products: [
                {'code':'1', 'name':'memes1', 'link':'link1'},
                {'code':'2', 'name':'memes2', 'link':'link2'},
                {'code':'3', 'name':'memes3', 'link':'link3'},
            ]
        };
    },
    methods: {
        onEditRecord($event) {

        },
        onDeleteRecord($event) {

        },
        onNewRecord($event) {

        },
    },
};
</script>
