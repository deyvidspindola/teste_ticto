<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import FormEmployee from "./Partails/FormEmployee.vue";

const form = useForm({
    name: "",
    document: "",
    email: "",
    password: "",
    role: "",
    born_date: "",
    zipcode: "",
    district: "",
    city: "",
    state: "",
    address: "",
    number: "",
    complement: "",
});

const createNewEmployee = () => {
    form.post(route("employee.store"), {
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
                New Employee
            </h2>
            <PrimaryButton @click="goBack()"> Prev </PrimaryButton>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form
                            @submit.prevent="createNewEmployee"
                            class="mt-6 space-y-6"
                        >
                            <FormEmployee :formData="form" />

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
