<script setup lang="ts">
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm } from "@inertiajs/vue3";
import axios from "axios";
import { ref } from "vue";

const props = defineProps({
    checkpoints: {
        type: Object,
        required: true,
    },
});

const points = ref(props.checkpoints);

const form = useForm({
    start_date: "",
    end_date: "",
});

const filter = async () => {
    await axios
        .post(route("checkpoint.filter"), {
            start_date: form.start_date,
            end_date: form.end_date,
        })
        .then((response) => {
            points.value = response.data;
        });
};
</script>

<template>
    <div>
        <div class="flex mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid gap-6 mb-6 md:grid-cols-3">
                <div>
                    <InputLabel for="start_date" value="Start Date" />

                    <TextInput
                        id="start_date"
                        v-model="form.start_date"
                        type="date"
                        class="mt-1 block w-full"
                    />
                </div>

                <div>
                    <InputLabel for="end_date" value="End Date" />

                    <TextInput
                        id="end_date"
                        v-model="form.end_date"
                        type="date"
                        class="mt-1 block w-full"
                    />
                </div>

                <div class="mt-6 flex">
                    <PrimaryButton @click="filter"> Filter </PrimaryButton>
                </div>
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
            >
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Role</th>
                        <th scope="col" class="px-6 py-3">Age</th>
                        <th scope="col" class="px-6 py-3">Manager</th>
                        <th scope="col" class="px-6 py-3">Point</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="point in points">
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                        >
                            {{ point.id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ point.name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ point.role }}
                        </td>
                        <td class="px-6 py-4">
                            {{ point.age }}
                        </td>
                        <td class="px-6 py-4">
                            {{ point.manager }}
                        </td>
                        <td class="px-6 py-4">
                            {{ point.checkpoint }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
