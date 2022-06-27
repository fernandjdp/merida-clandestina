<script setup>
import BreezeAdminAuthenticatedLayout from '@/Layouts/Admin.vue';
import Datatable from "@/Components/Datatable.vue";
import TourCard from '@/Components/TourCard.vue';
import Button from '@/Components/Button.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3'
</script>

<template>
    <Head title="Dashboard" />

    <BreezeAdminAuthenticatedLayout>
        <template #header>
            <h2 class="flex justify-between font-semibold text-xl text-gray-800 leading-tight">
                Administración de Tours
                <Button @click="gotToCreateTour">Nuevo</Button>
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
                    <Datatable 
                    :items="$attrs.items" 
                    :columns="columns"
                    :delete-method="deleteTour"
                    :update-method="updateTour"
                    ></Datatable>
                </div>
            </div>
        </div>
        
    </BreezeAdminAuthenticatedLayout>
</template>
<script>
    export default {
        data(){
            return {
                columns: [
                    {'name': 'Nombre', 'reference':'name'},
                    {'name':'Descripcion', 'reference':'description'},
                    {'name':'Duracion', 'reference':'duration'},
                    {'name':'Coste', 'reference':'cost'}
                ]
            };
        },
        methods: {
            gotToCreateTour() {
                this.$inertia.get(this.$attrs.create_url)
            },
            deleteTour(itemId) {
                this.$swal({
                    title: 'Estás seguro?',
                    text: "Una vez borrado no lo podrás recuperar!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, bórralo!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.$inertia.delete(route('admin.tours.destroy', itemId));
                        this.$swal(
                        'Eliminado!',
                        'El registro ha sido borrado exitosamente',
                        'success'
                        )
                    }
                })
            },
            updateTour(itemId) {
                console.log(itemId);
            }
        },
    };
</script>
