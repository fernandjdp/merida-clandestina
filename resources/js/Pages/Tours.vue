<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import TourCard from '@/Components/TourCard.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tours
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Estás en los tours
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto">
            <div v-if="tours" class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-5">
                <div v-for="tour in tours" :key="tour.id">
                    <TourCard
                    :imageSource="tour.image.src"
                    :title="tour.name"
                    :description="tour.description"
                    :cost="tour.cost"
                    :duration="tour.duration"
                    >
                    </TourCard>
                </div>   
            </div>
            <div v-else>
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                    <span class="font-medium">Vacio!</span> No hay tours disponibles en este momento.
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<script>
export default {
    props: ['tours'],
}
</script>
