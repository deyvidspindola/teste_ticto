<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router, useForm, usePage } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import FormEmployee from "./Partails/FormEmployee.vue";

const employee = usePage().props.employee as any;

const form = useForm({
    name: employee.name,
    document: employee.document,
    email: employee.email,
    password: employee.password,
    role: employee.role,
    born_date: employee.born_date,
    zipcode: employee.zipcode,
    district: employee.district,
    city: employee.city,
    state: employee.state,
    address: employee.address,
    number: employee.number,
    complement: employee.complement,
});

const updateEmployee = () => {
    form.put(route("employee.update", employee.id), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {},
    });
};

const goBack = () => {
    router.get(route("employees"));
};
</script>

<template>
    <Head title="Employees" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit Employee
            </h2>
            <PrimaryButton @click="goBack()"> Prev </PrimaryButton>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form
                            @submit.prevent="updateEmployee"
                            class="mt-6 space-y-6"
                        >
                            <FormEmployee :formData="form" :edit="true" />

                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing"
                                    >Save</PrimaryButton
                                >

                                <Transition
                                    enter-active-class="transition ease-in-out"
                                    enter-from-class="opacity-0"
                                    leave-active-class="transition ease-in-out"
                                    leave-to-class="opacity-0"
                                >
                                    <p
                                        v-if="form.recentlySuccessful"
                                        class="text-sm text-gray-600"
                                    >
                                        Saved.
                                    </p>
                                </Transition>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
