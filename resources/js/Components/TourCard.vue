<template>
    <div class="hover:-translate-y-1 duration-300 rounded-xl overflow-hidden shadow-lg">
        <img class="w-full" :src="'/storage/'+imageSource" alt="Mountain" />
        <div class="px-6 pt-3">
            <div class="font-bold text-xl mb-2">{{ title }}</div>
            <p class="text-gray-700 text-base">{{ description }}</p>
        </div>
        <div class="flex justify-end px-6 pt-1 pb-2">
            <span
                class="flex bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"
            ><ClockIcon class="w-4"></ClockIcon>{{ duration }} horas</span
            >
            <span
                class="flex bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"
            ><CashIcon class="w-4"></CashIcon> {{ cost }}$</span
            >
        </div>
        <button
            class="bg-teal-600 w-full flex justify-center py-2 text-white font-semibold transition duration-300 hover:bg-teal-500"
        >
            <ShoppingCartIcon class="h-6 mr-1 text-white"></ShoppingCartIcon>
            Agregar al carrito
        </button>
    </div>
</template>


<script>
import { ShoppingCartIcon, ClockIcon, CashIcon } from "@heroicons/vue/solid";

export default {
    components: { ShoppingCartIcon, ClockIcon, CashIcon },
    props: {
        imageSource: {
            type: String,
            required: true
        },
        title: {
            type: String,
            required: true
        },
        description: {
            type: String,
            required: true
        },
        cost: {
            type: Number,
            required: true
        },
        duration: {
            type: Number,
            required: true
        }
    },
};
</script>
