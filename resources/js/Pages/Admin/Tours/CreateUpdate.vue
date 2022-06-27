<template>
    <Head title="Crear Tour" />

    <BreezeAdminAuthenticatedLayout>
        <template #header>
            <h2
                class="flex justify-between font-semibold text-xl text-gray-800 leading-tight"
            >
                Administración de Tours
                <Button @click="goBack" :href="backLink">Back</Button>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Estás en la creacion de tours
                    </div>
                </div>
            </div>
            <form @submit.prevent="submit">
                <div
                    class="max-w-full py-12 sm:max-w-7xl sm:px-6 lg:px-8 grid mx-auto grid-cols-1 sm:grid-cols-5 sm:grid-rows-4 sm:grid-flow-col gap-4"
                >
                    <div
                        class="sm:row-span-3 sm:col-span-3 block p-6 bg-white rounded-lg border border-gray-200 shadow-md"
                    >
                        <div class="mb-6">
                            <label
                                for="name"
                                class="block mb-2 text-md font-medium text-gray-900"
                                >Nombre</label
                            >
                            <input
                                type="text"
                                v-model="form.name"
                                id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required
                            />
                        </div>
                        <div class="mb-6">
                            <label
                                for="description"
                                class="block mb-2 text-md font-medium text-gray-900"
                                >Descripcion</label
                            >
                            <input
                                type="text"
                                v-model="form.description"
                                id="description"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required
                            />
                        </div>
                    </div>
                    <div
                        class="sm:row-span-3 sm:col-span-2 block p-6 bg-white rounded-lg border border-gray-200 shadow-md"
                    >
                        <div class="mb-6">
                            <label
                                for="cost"
                                class="block mb-2 text-md font-medium text-gray-900"
                                >Coste en dólares</label
                            >
                            <input
                                type="number"
                                v-model="form.cost"
                                id="cost"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required
                            />
                        </div>
                        <div class="mb-6">
                            <label
                                for="duration"
                                class="block mb-2 text-md font-medium text-gray-900"
                                >Duración en horas</label
                            >
                            <input
                                type="number"
                                v-model="form.duration"
                                id="duration"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required
                            />
                        </div>
                    </div>
                    <button type="submit" @click="showAlert" class="text-white bg-sky-600 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-full sm:col-span-2 px-5 py-2.5 text-center">Submit</button>
                </div>
            </form>
        </div>
    </BreezeAdminAuthenticatedLayout>
</template>
<script>
import BreezeAdminAuthenticatedLayout from "@/Layouts/Admin.vue";
import Button from "@/Components/Button.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeAdminAuthenticatedLayout, Button, Head, Link
    },
    setup() {
        const form = useForm({
            name:null,
            description:null,
            duration:null,
            cost:null
        })
        return { form }
    },
    data() {
        return {
            backLink: "",
            columns: [
                { name: "Nombre", reference: "name" },
                { name: "Descripcion", reference: "description" },
                { name: "Duracion", reference: "duration" },
                { name: "Coste", reference: "cost" },
            ],
        };
    },
    methods: {
        submit() {
            this.$inertia.post(route('admin.tours.store'), this.form)
        },
        goBack() {
            this.backLink = window.history.back();
        },
    },
};
</script>
