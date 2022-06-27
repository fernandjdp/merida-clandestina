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
                    class="max-w-full py-12 sm:max-w-7xl sm:px-6 lg:px-8 grid mx-auto grid-cols-1 sm:grid-cols-6 sm:grid-rows-2 sm:grid-flow-row gap-4"
                >
                    <div
                        class="sm:row-span-2 sm:col-span-3 block p-6 bg-white rounded-lg border border-gray-200 shadow-md"
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
                        class="sm:row-span-2 sm:col-span-3 block p-6 bg-white rounded-lg border border-gray-200 shadow-md"
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
                    <div
                        class="sm:row-span-2 sm:col-span-6 block p-6 bg-white rounded-lg border border-gray-200 shadow-md"
                    >
                        <div class="mb-6">
                            <div class="my-3 mx-6 grid grid-cols-1 sm:grid-cols-6 sm:grid-rows-1 gap-4" v-if="imageUrls" id="preview">
                                <div class="relative flex justify-center" v-for="url in imageUrls" :key="url">
                                    <img class="w-48 h-48 sm:w-48 sm:h-48 rounded-lg" :src="url" />
                                    <button @click="eraseImage(url)" class="absolute top-0 right-12 sm:right-0 bg-gray-300 text-white p-2 rounded hover:bg-gray-500 m-2">
                                        <XIcon class="w-4 h-4 text-gray-800"></XIcon>
                                    </button>
                                </div>
                            </div>

                            <div class="flex justify-center items-center w-full">
                                <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer">
                                    <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                        <svg class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" type="file" hidden @change="onImageChange" multiple/>
                                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                        {{ form.progress.percentage }}%
                                    </progress>
                                </label>
                            </div> 
                        </div>
                    </div>
                    <button type="submit" class="sm:col-end-5 text-white bg-sky-600 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-full sm:col-span-2 px-5 py-2.5 text-center">Guardar</button>
                </div>
            </form>
        </div>
    </BreezeAdminAuthenticatedLayout>
</template>
<script>
import BreezeAdminAuthenticatedLayout from "@/Layouts/Admin.vue";
import Button from "@/Components/Button.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { XIcon } from "@heroicons/vue/outline";

export default {
    components: {
        BreezeAdminAuthenticatedLayout, Button, Head, Link, XIcon
    },
    setup() {
        const form = useForm({
            name:null,
            description:null,
            duration:null,
            cost:null,
            images: []
        })

        return { form }
    },
    data() {
        return {
            backLink: "",
            imageUrls: [],
        };
    },
    methods: {
        onImageChange(event) {
            for (let [key, file] of Object.entries(event.target.files)) {
                this.imageUrls.push(URL.createObjectURL(file))
            }
        },
        eraseImage(imageValue) {
            this.imageUrls = this.imageUrls.filter(element => element !== imageValue)
        },
        submit() {
            this.$inertia.post(route('admin.tours.store'), this.form)
        },
        goBack() {
            this.backLink = window.history.back();
        },
    },
};
</script>
