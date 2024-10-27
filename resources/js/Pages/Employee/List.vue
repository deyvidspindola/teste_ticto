<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router, useForm, usePage } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Modal from "@/Components/Modal.vue";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

import { ref } from "vue";

const employees = usePage().props.employees as any;

const NewEmployee = () => {
    router.get(route("employee.create"));
};

const confirmingEmployeeDeletion = ref(false);
var employee_Id = "";

const confirDeleteEmployee = (id) => {
    confirmingEmployeeDeletion.value = true;
    employee_Id = id;
};

const form = useForm({});
const deleteUser = () => {
    form.delete(route("employee.delete", employee_Id), {
        preserveScroll: true,
        onSuccess: () => {
            router.get(route("employees"));
        },
        onError: () => {},
        onFinish: () => {},
    });
};

const closeModal = () => {
    confirmingEmployeeDeletion.value = false;

    form.clearErrors();
    form.reset();
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
                            <tr v-for="employee in employees">
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
                                    &nbsp;
                                    <a
                                        @click="
                                            confirDeleteEmployee(employee.id)
                                        "
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                        >Del</a
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <Modal :show="confirmingEmployeeDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Are you sure you want to delete this employee?
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Once this employee is deleted, all of its resources and data
                    will be permanently deleted. Please enter your password to
                    confirm you would like to permanently delete your account.
                </p>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal">
                        Cancel
                    </SecondaryButton>

                    <DangerButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        Delete Employee
                    </DangerButton>
                </div>
            </div>
        </Modal>
    </AuthenticatedLayout>
</template>
