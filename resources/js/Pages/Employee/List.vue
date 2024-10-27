<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

defineProps({ employess: Object });
const NewEmployee = () => {
    router.get("/employee/create");
};
</script>

<template>
    <Head title="Employees" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Employees
            </h2>
            <PrimaryButton @click="NewEmployee()"> New Employee </PrimaryButton>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table
                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                    >
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50"
                        >
                            <tr>
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">Document</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">Role</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="employee in employess">
                                <th
                                    scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                                >
                                    {{ employee.name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ employee.document }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ employee.email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ employee.role }}
                                </td>
                                <td class="px-6 py-4">
                                    <a
                                        :href="
                                            route('employee.edit', employee.id)
                                        "
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                        >Edit</a
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
