<script>
import { PencilIcon, TrashIcon } from "@heroicons/vue/outline";

export default {
    components: { PencilIcon, TrashIcon },
    props: {
        items: {
            type: Array,
            required: true
        },
        columns: {
            type: Array,
            required: true
        },
    },
    data() {
        return {

        }
    }
}
</script>

<template>
    <div class="relative overflow-x-auto shadow-lg sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs  text-gray-700 uppercase bg-slate-300">
                <tr>
                    <th v-for="column in columns" :key="column.id" scope="col" class="px-6 py-3">
                        {{ column.name }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in items" :key="item.id" class="bg-white border-b hover:bg-gray-50">
                    <th v-for="column in columns" :key="column.id" scope="row" class="px-6 py-4 font-medium  text-gray-900 whitespace-nowrap">
                        {{ item[column.reference] }}
                    </th>
                    <td class="px-6 py-4 text-center">
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2">
                            <PencilIcon class="w-4 h-4"></PencilIcon>
                        </button>
                        <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2">
                            <TrashIcon class="w-4 h-4"></TrashIcon>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>