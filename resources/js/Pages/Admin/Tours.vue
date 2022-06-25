<script setup>
import BreezeAdminAuthenticatedLayout from '@/Layouts/Admin.vue';
import Datatable from "@/Components/Datatable.vue";
import TourCard from '@/Components/TourCard.vue';
import Button from '@/Components/Button.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Dashboard" />

    <BreezeAdminAuthenticatedLayout>
        <template #header>
            <h2 class="flex justify-between font-semibold text-xl text-gray-800 leading-tight">
                Tours desde Admin
                <Button @click="memes">Nuevo</Button>
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
                    <Datatable :items="tours" :columns="columns"></Datatable>
                </div>
            </div>
        </div>
        
    </BreezeAdminAuthenticatedLayout>
</template>
<script>

export default {

    data(){
        return {
            tours: [
                {'id':1, 'name':'Tour 1', 'description':'Un tour muy bonito 1', 'duration':8, 'cost':40 },
                {'id':2, 'name':'Tour 2', 'description':'Un tour muy bonito 2', 'duration':10, 'cost':35 },
                {'id':3, 'name':'Tour 3', 'description':'Un tour muy bonito 3', 'duration':4, 'cost':50 },
                {'id':4, 'name':'Tour 4', 'description':'Un tour muy bonito 4', 'duration':12, 'cost':20 },
            ],
            columns: [
                {'name': 'Nombre', 'reference':'name'},
                {'name':'Descripcion', 'reference':'description'},
                {'name':'Duracion', 'reference':'duration'},
                {'name':'Coste', 'reference':'cost'}
            ]
        };
    },
    methods: {
        memes() {
            console.log("memes")
        },
        onEditRecord($event) {

        },
        onDeleteRecord($event) {

        },
        onNewRecord($event) {

        },
    },
};
</script>
